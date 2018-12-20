var current_fs, next_fs, prev_fs, title;
var progressWrapper = $('.bar-wrapper');
var progress = $('#progressbar li');
var progress_title = $('.progress-title');
var filedset = $('fieldset');
var activeIndex;
var isAllowToNextStep; // 是否可以進入下一步
var passTimes = 1; // 票券代碼輸入次數
var amountToGo = $('.amountToGo'); // 完成劃位金額
var ticketInfos = [
    { type: 0, name: '暢行無阻票', price: 2000},
    { type: 1, name: '時間有點限制票', price: 1750},
    { type: 2, name: '四人沈醉票', price: 1750}
];
var usedCoupons = []; // 暫存已輸入的票券代碼
var submitDatas = []; // 暫存所有欄位資料
var paidAmount = 0; // 已折抵金額
var restAmount = 0; // 剩餘折抵金額

// ===================================
// Form Default Start
// ===================================

// Go to Next/Prev Step
$(".action-button").on('click', function(){
    prev_fs = true;
    current_fs = $(this).closest('fieldset');

    // 如果用戶點擊的按鈕為下一步，則切換下一步
    // 反之，則切換至前一步
    if ($(this).hasClass('next')) {
        next_fs = current_fs.next();
        prev_fs = false;
    } else {
        next_fs = current_fs.prev();
    }

    // 第一步驟時，隱藏步驟進度條
    activeIndex = filedset.index(next_fs);
    stepWrapperChecker(activeIndex);

    // 更新步驟進度條
    progress.removeClass('active');
    progress.eq(activeIndex - 1).addClass("active");

    // 更新步驟標題
    title =  next_fs.attr('title');
    progress_title.html(title);

    // 如果下一步為最後一步驟，抓取已填寫的資料使用
    if (next_fs.hasClass('step-5')) {
        filledDataChecker();
    }

    // 重新判別用戶是否可點選下一步按鈕
    next_fs.find('.next, .submit').attr('disabled', true);
    allowChecker(next_fs);

    if (current_fs.hasClass('step-4') && !prev_fs) {
        if (verificationChecker()) {
            current_fs.hide();
            next_fs.show();
        }
    } else {
        // 隱藏目前欄位，並顯示下一步的欄位
        current_fs.hide();
        next_fs.show();
        $(window).scrollTop(0);
    }
});

function stepWrapperChecker(index) {
    // 當第一步驟時，隱藏步驟條
    if (index == 0) {
        progressWrapper.addClass('hide-steps');
    } else {
        progressWrapper.removeClass('hide-steps');
    }
}

function filledDataChecker() {
    var checker_name, filled_val, food_types;

    $('.filled').each(function () {
       checker_name = $(this).data('filled');

       if (checker_name === 'food-type') {
           
           food_types = radioGroupChecker();
           filled_val = food_types.join(' / ');

       } else if (checker_name === 'booking_time'){

           // 取得被選取的選項文字
           filled_val = $('[name=' + checker_name + ']').find(':selected').text();

       } else {

           // 取得使用者填入的值
           filled_val = $('[name=' + checker_name + ']').val();

       }

       $(this).html(filled_val);

       submitDatas[checker_name] = filled_val;

       food_types = '';
    });
}

// 取得陣列型態的葷素食選項
function radioGroupChecker() {
    var i, foodTypes = [];
    var people = $('[name="booking_people"]').val();

    for (i = 0; i < people; i++) {
        foodTypes.push($('[name="food-type[' + i + ']"]:checked').val());
    }

    return foodTypes;
}

// 每當欄位資料變動時，重新判別是否可啟用下一步按鈕
$('input, select').on('change', function () {
    allowChecker($(this).closest('fieldset'));
});

// 檢查是否可以進入下一步
function allowChecker(thisStep){
    isAllowToNextStep = true;

    if (thisStep.hasClass('step-5')) {

        // 最後一步驟要確認已輸入的票券代碼數量是否與人數相符
        if (restAmount != 0) {
            isAllowToNextStep = false;
        }

    } else {

        thisStep.find('input, select').each(function () {
            var element = $(this);

            if (element.attr('type') === 'checkbox') {

                if (!element.is(':checked')) {
                    isAllowToNextStep = false;
                    return false;
                }

            } else if (element.attr('type') === 'radio') {
                if (thisStep.hasClass('step-4')) {

                    // 餐點選擇(葷素)
                    for (var p = 0; p < submitDatas['booking_people']; p++) {
                        var tmp_radioGroup = $('input[name="food-type[' + p + ']"]');

                        if (!tmp_radioGroup.is(":checked")) {
                            isAllowToNextStep = false;
                            return false;
                        }
                    }

                } else {

                    // 票券種類
                    if (!$('input:radio[name="ticket-type"]').is(":checked")) {
                        isAllowToNextStep = false;
                        return false;
                    }

                }
            } else {

                if (!$(this).val()) {
                    isAllowToNextStep = false;
                    return false;
                }

            }
        });

    }

    if (isAllowToNextStep) {
        thisStep.find('.next, .submit').attr('disabled', false);
    } else {
        thisStep.find('.next, .submit').attr('disabled', true);
    }
}

function verificationChecker() {
    var verification_field = $('.has-verification');
    var isValid = true;
    var tmpVal = verification_field.val();
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!regex.test(tmpVal)) {

        $(verification_field).prev().find('.error-msg').html('請填寫正確的格式');
        gotoErrorField($(verification_field));
        isValid = false;
        return false;

    } else {

        $(verification_field).prev().find('.error-msg').html('');
    }

    return isValid;
}

function gotoErrorField(field) {
    var offset = field.parent().offset().top - parseInt($('header').height()) - 50;

    $('html, body').animate({
        scrollTop: offset
    }, 800);
}

// ===================================
// Form Default End
// ===================================

// 暫時不送出表單，待前後台串接後可移除
$(".submit").click(function(){
    return false;
});

// ===================================
// Form Steps Start
// ===================================

// Step 2 - 選擇票券
$('input[name="ticket-type"]').on('click', function () {
    if ($(this).val() == 2) {
        // 選擇四人沈醉票時，人數自動選擇四人
        $('#booking_people').val(4).prop('disabled', true).trigger('change');
    } else {
        // 選擇其他票種時，清空已選擇人數
        $('#booking_people').val('').prop('disabled', false).trigger('change');
    }
});

// Step 3 - 人數、日期、時段選擇
$('.step-3 input, .step-3 select').on('change', function () {

    // 取得下一個欄位的標籤名稱
    var nextFieldset = $(this).closest('.form-group').next();
    var nextField = nextFieldset.find('input, select');
    var nextElementType = nextField.prop('tagName');
    var accessHide = true;

    // 當用戶選擇人數時，更新葷素區塊及完成劃位所需金額
    if ($(this).attr('id') === 'booking_people') {
        submitDatas['booking_people'] = parseInt($(this).find(':selected').text());
        update_isVegetarian(submitDatas['booking_people']);
        update_amountToGo(submitDatas['booking_people']);

        usedCoupons = []; // 清空已使用的票券代碼

        if (!$(this).val()) {
            accessHide = false;
        }
    }

    // 如果下一個欄位是日期，且人數的值不為空值
    if (nextElementType === 'INPUT' && accessHide) {
        
        var booking_date = $("#booking_date");

        booking_date.on('focus', function () {
            $('#ui-datepicker-div').appendTo('.calender-wrapper');
        });

        // 可選擇的日期
        var enableDays = ["2018-12-21", "2018-12-22", "2018-12-23",  "2018-12-28",  "2018-12-29",  "2018-12-30"];

        booking_date.datepicker("destroy");
        booking_date.datepicker({dateFormat: 'yy-mm-dd', beforeShowDay: enableAllTheseDays});

        function enableAllTheseDays(date) {
            var sdate = $.datepicker.formatDate( 'yy-mm-dd', date);

            if($.inArray(sdate, enableDays) !== -1) {
                return [true];
            }
            return [false];
        }
    } else if (nextElementType === 'SELECT') {
        var nextFieldID = nextField.attr('id');
        var data;

        if (nextFieldID === 'booking_time_slot') { // 時段
            data = [
                {
                    id: 0,
                    text: '上午',
                },
                {
                    id: 1,
                    text: '下午',
                }
            ];
        } else if (nextFieldID === 'booking_time') { // 時間
            data = [
                {
                    id: 0,
                    text: '09:00-10:30',
                },
                {
                    id: 1,
                    text: '18:00-19:30',
                },
                {
                    id: 2,
                    text: '20:00-21:30'
                }
            ];
        }

        // 更新下拉選單的選項
        updateOptions(nextField, data);
    }

    // 每次重新點選選項後，除了下一個選項會重新載入外，後面的選項都會隱藏並清空值
    updateField(nextFieldset, accessHide);

});

// 更新餐點選擇的顧客數
function update_isVegetarian(people) {
    var radioGroup = $('.isVegetarian-Group');
    radioGroup.removeClass('show-radioGroup').removeClass('last-row');
    radioGroup.slice(0,people).addClass('show-radioGroup');
    $('.show-radioGroup').last().addClass('last-row');
}

// 更新完成劃位所需金額
function update_amountToGo(people) {
    ticketInfo = ticketInfos[$('input[name="ticket-type"]:checked').val()];

    var summary = formatPrice(people * ticketInfo.price); // 數字變成貨幣格式

    // 更新完成劃位金額
    amountToGo.text(summary);
    $('.submit-coupon').remove();

    // 並清空已輸入的折扣碼 / 已折抵金額 / 重置輸入次數
    usedCoupons = [];
    paidAmount = 0;
    passTimes = 1;
}

// 更新下拉選項的 Option 值
function updateOptions(select_filed, data) {
    var placeholder = select_filed.data('placeholder');

    // Ajax 參考文件
    // https://select2.org/data-sources/ajax
    select_filed.select2({
        data: data,
        placeholder: placeholder,
        minimumResultsForSearch: Infinity
    });
}

function updateField(fieldGroup, accessHide) {
    // 每次重新點選選項後，除了下一個選項會重新載入外，後面的選項都會隱藏並清空值
    // 避免使用者又回到前面的選項選取時，下方的選項沒改變造成誤會
    var hidefield = $('.step-3 .form-group').slice(fieldGroup.index());

    hidefield.each(function () {
        $(this).find('input, select').val('').trigger('change');
    }).removeClass('show-field');

    if (accessHide) {
        // 如果人數為不為空值時，顯示下一個欄位
        fieldGroup.addClass('show-field');
    }
}

// ===================================
// Form Steps End
// ===================================


// ===================================
// Coupon Code Start
// ===================================
var coupons = [ // 測試用票券代碼
    { type: '0', couponcode: '054JXQH8'},
    { type: '0', couponcode: '3MNF5RUE'},
    { type: '0', couponcode: '5NIJD3FC'},
    { type: '0', couponcode: '7Y0CJCYB'},
    { type: '0', couponcode: '920T9603'},
    { type: '0', couponcode: 'BWCWASDU'},
    { type: '1', couponcode: 'D4EX2INA'},
    { type: '1', couponcode: 'ETL738NF'},
    { type: '1', couponcode: 'HSTJKWYX'},
    { type: '1', couponcode: 'I90NS2IQ'},
    { type: '1', couponcode: 'L9KQPCVF'},
    { type: '1', couponcode: 'M4ZVGYZR'},
    { type: '2', couponcode: 'P18PR5I9'},
    { type: '2', couponcode: 'QIARITDN'},
    { type: '2', couponcode: 'TUN07VAB'},
    { type: '2', couponcode: 'UPVEJT6U'}
];

$('.verification-code').on('click', function () {
    var coupon = $('input[name="coupon"]');
    var couponVal = coupon.val(); // 取得用戶輸入的票券代碼

    // 票券代碼是否存在
    var couponIndex = coupons.map(function (couponData) {
        return couponData.couponcode;
    }).indexOf(couponVal);

    // 票券是否在表單送出前重複使用
    var isAllow = $.inArray(couponVal, usedCoupons);

    // 如果票券代碼可使用，且代碼的票券類型等於已選擇類型
    var typeInCouponInfo = coupons[couponIndex]; // 取得用戶選擇的票券資訊
    if (couponIndex !== -1 && isAllow == -1) {

        // 時間有點限制票，且選擇的時段不符
        if (typeInCouponInfo.type == 1 && submitDatas['booking_time'] === '09:00-10:30') {

            $(this).closest('td').find('.submit-coupon-wrapper').append('<p class="submit-coupon">劃位序號' + passTimes + ' ' + couponVal + ' 票券選擇時間錯誤</p>');

        } else {

            // 更新暫存已使用代碼
            usedCoupons.push(couponVal);

            // 更新完成劃位所需金額
            paidAmount = paidAmount + couponAmount(typeInCouponInfo.type, ticketInfo.price);
            restAmount = submitDatas['booking_people'] * ticketInfo.price - paidAmount;
            console.log(paidAmount, restAmount);
            amountToGo.text(formatPrice(restAmount));

            $(this).closest('td').find('.submit-coupon-wrapper').append('<p class="submit-coupon">劃位序號' + passTimes + ' ' + couponVal + ' ' + ticketInfo.name +'</p>');
        }

    } else {

        $(this).closest('td').find('.submit-coupon-wrapper').append('<p class="submit-coupon">劃位序號' + passTimes + ' ' + couponVal + ' 序號錯誤或已使用</p>');

    }

    coupon.val('').trigger('change');
    passTimes++;
    return false;
});

function couponAmount(couponType, price) {
    // 如果票券序號為四人沈醉
    // 則票券折扣額為當下的票券金額 X 4
    return couponType == 2 ? price * 4 : price;
}

// ===================================
// Coupon Code End
// ===================================

// ===================================
// Form Select Plugin Start
// ===================================

jQuery(function($){
    // 頁面載入時預先Init一次 Selec2 外掛，避免樣式跑掉
    $('select').each(function () {
        var placeholder = $(this).data('placeholder');
        $(this).select2({
            placeholder: placeholder,
            minimumResultsForSearch: Infinity
        })
    })
});

// ===================================
// Form Select Plugin End
// ===================================

// ===================================
// 數字轉貨幣格式
// ===================================
function formatPrice(n) {
    var t = parseInt(n), i, r;
    for (t = t.toString().replace(/^(\d*)$/, "$1."), t = (t + "00").replace(/(\d*\.\d\d)\d*/, "$1"), t = t.replace(".", ","), i = /(\d)(\d{3},)/; i.test(t);)
        t = t.replace(i, "$1,$2");
    return t = t.replace(/,(\d\d)$/, ".$1"), r = t.split("."), r[1] == "00" && (t = r[0]), t
}

// Only number
$('#phone').bind('keyup paste', function(){
    this.value = this.value.replace(/[^0-9\+\-\ ]/g, '');
});
