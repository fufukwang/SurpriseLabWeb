// Variable
var progressWrapper = $('.bar-wrapper');
var progress = $('#progressbar li');
var progress_title = $('.progress-title');
var filedset = $('fieldset');
var verificationCode = $('.verification-code');
var bookingPeople = $('#booking_people');
var booking_date = $("#booking_date");
var ticketTypeField = $('[data-filled="ticket-type"]');
var phoneField = $('#field_phone');

// Step
var current_fs, next_fs, prev_fs, title;
var activeIndex;
var isAllowToNextStep; // 是否可以進入下一步

// Ticket
var usedCoupons = []; // 暫存已輸入的票券代碼
var submitDatas = []; // 暫存所有欄位資料
var paidAmount = 0; // 已折抵金額
var restAmount = 0; // 剩餘折抵金額
var selectType = 0; // 用戶選擇的票種
var passTimes = 1; // 票券代碼輸入次數
var amountToGo = $('.amountToGo'); // 完成劃位金額
var restPeople = 0; // 尚須折抵人數


var ticketInfos = [
    { type: 'p1', name: '單人票', price: 2000, counter: 0},
    { type: 'p4', name: '四人票', price: 1850, counter: 0},
    { type: 'p10', name: '十人票', price: 1750, counter: 0}
];

// ===================================
// Form Default Start
// ===================================

// 載入人數下拉選單
updateOptions(bookingPeople, getPeopleData());

function getPeopleData() {
    var obj = {};
    var data = [];

    for (var i = 1; i <= 30; i++) {
        obj = {
            id: i,
            text: i
        };

        data.push(obj);
    }

    return data;
}

/**
 * Go to Next/Prev Step
 */
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

    if (next_fs.hasClass('step-5')) {

        // 如果下一步為最後一步驟，抓取已填寫的資料使用
        filledDataChecker();
    }


    if (current_fs.hasClass('step-2') && $(this).hasClass('next')) {
        // 模擬人數選擇完畢後的Loading

        $('.loading-wrapper').addClass('show');

        setTimeout(function () {
            $('.loading-wrapper').removeClass('show');

            setTimeout(function () {
                toNextStep(next_fs);
            }, 400);

        }, 3000);

    } else if (current_fs.hasClass('step-4') && !prev_fs) {
        if (verificationChecker()) {
            current_fs.hide();
            next_fs.show();
            toNextStep(next_fs);
        }
    } else {
        toNextStep(next_fs);
    }

    // 重新判別用戶是否可點選下一步按鈕
    next_fs.find('.next, .submit').attr('disabled', true);
    allowChecker(next_fs);
});

/**
 * 進入下一步
 */
function toNextStep(next_fs) {
    // 第一步驟時，隱藏步驟進度條
    activeIndex = filedset.index(next_fs);
    stepWrapperChecker(activeIndex);

    // 更新步驟進度條
    progress.removeClass('active');
    progress.eq(activeIndex - 1).addClass("active");

    // 更新步驟標題
    title =  next_fs.attr('title');
    progress_title.html(title);

    // 隱藏目前欄位，並顯示下一步的欄位
    current_fs.hide();
    next_fs.show();
    $(window).scrollTop(0);
}

/**
 * 檢查是否可以進入下一步
 */
function allowChecker(thisStep){
    isAllowToNextStep = true;

    if (thisStep.hasClass('step-5')) {

        // 最後一步驟要確認已輸入的票券代碼數量是否與人數相符
        if (restAmount === 0) {
            if (usedCoupons.length === 0) {
                isAllowToNextStep = false;
            }
        } else {
            isAllowToNextStep = false;
        }

    } else {

        thisStep.find('input:not([type="hidden"]), select').each(function () {
            var element = $(this);

            if (element.attr('type') === 'checkbox') {

                if (!element.is(':checked')) {
                    isAllowToNextStep = false;
                    return false;
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

/**
 * 當所在位置為第一步驟時，隱藏步驟條
 */
function stepWrapperChecker(index) {
    if (index === 0) {
        progress_title.addClass('d-none');
        progressWrapper.addClass('hide-steps');
    } else {
        progressWrapper.removeClass('hide-steps');
        progress_title.removeClass('d-none');
    }
}

function verificationChecker() {
    var verification_fields = $('.has-verification');
    var isValid = true;
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    verification_fields.each(function (index, verification_field) {
        var tmp = $(verification_field);
        var tmpVal = tmp.val();

        if (tmp.hasClass('phone')) {
            isPhoneNumber(input);

            if (tmp.hasClass('error')) {
                tmp.closest('.form-group').find('.error-msg').html('號碼長度有誤或非手機號碼，請重新輸入');
                gotoErrorField(tmp);
                isValid = false;
                return false;
            } else {
                tmp.prev().find('.error-msg').html('');
                var dialCode = $('.iti__selected-dial-code').text();
                if (dialCode === '+886') {
                    // 去除多餘的0
                    phoneField.val(parseInt(phoneField.val()).toString());
                }
                $('input[name="dial-code"]').val($('.iti__selected-dial-code').text());

            }
        } else {
            if (!regex.test(tmpVal)) {
                tmp.prev().find('.error-msg').html('請確認信箱是否正確');
                gotoErrorField(tmp);
                isValid = false;
                return false;
            } else {
                tmp.prev().find('.error-msg').html('');
            }
        }
    });

    return isValid;
}

/**
 * 畫面平移至錯誤欄位的位置
 * @param field
 */
function gotoErrorField(field) {
    var offset = field.parent().offset().top - parseInt($('header').height()) - 50;

    $('html, body').animate({
        scrollTop: offset
    }, 800);
}

/**
 * 生成步驟4頁面的確認資料
 */
function filledDataChecker() {
    var checker_name, filled_val;

    $('.filled').each(function () {
        checker_name = $(this).data('filled');

        if (checker_name === 'booking_time'){

            // 取得被選取的選項文字
            filled_val = $('[name=' + checker_name + ']').find(':selected').text();

        } else if (checker_name === 'ticket-type') {

            filled_val = '';

        } else {

            // 取得使用者填入的值
            filled_val = $('[name=' + checker_name + ']').val();

        }

        $(this).html(filled_val);

        submitDatas[checker_name] = filled_val;
    });
}

/**
 * 每當欄位資料變動時，重新判別是否可啟用下一步按鈕
 */
$('input, select').on('change', function () {
    allowChecker($(this).closest('fieldset'));
});

/**
 * 輸入票券代碼才可以按確認鈕
 */
$('input[name="coupon"]').on('keyup', function () {
    if($(this).val() !== '') {
        verificationCode.attr('disabled', false);
    } else {
        verificationCode.attr('disabled', true);
    }
});

// ===================================
// Form Default End
// ===================================

/**
 * 暫時不送出表單，待前後台串接後可移除
 */
$(".submit").click(function(){
    var people = $('[name="booking_people"]').val();
    var obj = {
        'name'  : $('[name=name]').val(),
        'tel'   : $('[name=field_phone]').val(),
        'dial_code' : $('[name="dial-code"]').val(),
        'email' : $('[name=email]').val(),
        'notes' : $('[name=notice]').val(),
        'pro_id': $('[name=booking_time]').find(':selected').val(),
        'pople' : people,
        'prime' : '',
        'Pay'   : 'online',
        'coupon': usedCoupons,
        'is_overseas':0,
    };
    $('.loading-wrapper').addClass('show');
    $('<link>').appendTo('head')
        .attr({
            type: 'text/css', 
            rel: 'stylesheet',
            href: '/clubT/css/submit.css'
        });
    $.post('/clubtomorrow/ReOrderData',obj,function(data){
        $('#submit-main').hide();
        if(data.success==true){
            $('#submit-success').addClass("d-flex").show();
            console.log('成功');
        } else {
            $('#submit-error').addClass("d-flex").show();
            console.log('失敗');
        }


        $('.loading-wrapper').removeClass('show');

    },'json').fail(function() {
        $('#submit-error').addClass("d-flex").show();
        console.log('錯誤');
        $('.loading-wrapper').removeClass('show');
    });
    return false;
});

// ===================================
// Form Steps Start
// ===================================

/**
 * Step 2 - 選擇人數
 */
$('select[name="booking_people"]').on('change', function () {
    // 當用戶選擇人數時，更新完成劃位所需金額
    submitDatas['booking_people'] = parseInt($(this).find(':selected').text());
    update_amountToGo(submitDatas['booking_people']);

    usedCoupons = []; // 清空已使用的票券代碼
    updateDatePicker(); // 更新日期
    clearField(); // 清空步驟三的資料
});

/**
 * Step 3 - 日期、時段選擇
 */
$('.step-3 input, .step-3 select').on('change', function () {

    // 取得下一個欄位的標籤名稱
    var nextFieldset = $(this).closest('.form-group').next();
    var nextField = nextFieldset.find('input, select');
    var accessHide = true;
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


        nextField.html('').trigger('change');
        if($('#booking_date').val()!=''){
            $.get('/clubtomorrow/GetAjaxData',{
                'act':'getByday',
                'day':$('#booking_date').val(),
                'pople':submitDatas['booking_people']
            },function(obj){
                data = [];
                proObject = [];
                if(obj.length>0){
                    proObject = obj;
                    for(i=0;i<obj.length;i++){
                        var range = obj[i].rang_start.substring(0,5) + ' - ' + obj[i].rang_end.substring(0,5) + ' 剩餘'+obj[i].sites+'位';
                        nextField.append('<option value="'+obj[i].id+'" data-money="'+obj[i].money+'">'+range+'</option>');
                        /*
                        data.push({
                            id   : obj[i].id,
                            text : range
                        });*/
                    }
                    updateOptions(nextField, data);
                    nextField.val(null).trigger('change');
                }
            },'json');
        }






/*
        data = [
            {
                id: 0,
                text: ' 18:00 - 19:30 剩餘 1 位',
            },
            {
                id: 1,
                text: '20:00 - 21:30 剩餘 6 位'
            }
        ];
        */
    }

    // 更新下拉選單的選項
    updateOptions(nextField, data);

    // 每次重新點選選項後，除了下一個選項會重新載入外，後面的選項都會隱藏並清空值
    updateField(nextFieldset, accessHide);

});

/**
 * 更新完成劃位所需金額
 */
function update_amountToGo(people) {
    restPeople = people;
    var summary = formatPrice(people * 2000); // 數字變成貨幣格式

    // 更新完成劃位金額
    amountToGo.text(summary);
    $('.submit-coupon').remove();

    // 清空已輸入的折扣碼 / 已折抵金額 / 重置輸入次數
    usedCoupons = [];
    paidAmount = 0;
    passTimes = 1;
}

/**
 * 更新日期
 */
function updateDatePicker() {
    booking_date.on('focus', function () {
        $('#ui-datepicker-div').appendTo('.calender-wrapper');
    });

    // 可選擇的日期
    //var enableDays = ["2019-08-24", "2019-08-25", "2019-08-26", "2019-08-27", "2019-08-28", "2019-08-29", "2019-08-30", "2019-08-31", "2019-09-01", "2019-09-03", "2019-09-06", "2019-09-07"];
    var enableDays = [];
    if(!isNaN(submitDatas['booking_people'])){
        $.get('/clubtomorrow/GetAjaxData',{
            'act':'getBypople',
            'pople':submitDatas['booking_people'],
        },function(data){
            for(i=0;i<data.length;i++){
                enableDays.push(data[i].day);
            }
            booking_date.datepicker("destroy");
            booking_date.datepicker({
                minDate:new Date(2019, 10, 1),  // 11月過後要調整
                maxDate:"+5m",
                dateFormat: 'yy-mm-dd', 
                beforeShowDay: enableAllTheseDays
            });
        },'json');
    }

    //booking_date.datepicker("destroy");
    //booking_date.datepicker({dateFormat: 'yy-mm-dd', beforeShowDay: enableAllTheseDays});

    function enableAllTheseDays(date) {
        var sdate = $.datepicker.formatDate( 'yy-mm-dd', date);

        if($.inArray(sdate, enableDays) !== -1) {
            return [true];
        }
        return [false];
    }
}

/**
 * 更新下拉選項的 Option 值
 */
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

/**
 * 每次重新點選選項後，除了下一個選項會重新載入外，後面的選項都會隱藏並清空值
 * 避免使用者又回到前面的選項選取時，下方的選項沒改變造成誤會
 */
function updateField(fieldGroup, accessHide) {
    var hidefield = $('.step-3 .form-group').slice(fieldGroup.index());

    hidefield.each(function () {
        $(this).find('input, select').val('').trigger('change');
    }).removeClass('show-field');

    if (accessHide) {
        // 如果人數為不為空值時，顯示下一個欄位
        fieldGroup.addClass('show-field');
    }
}

/**
 * 清空步驟3資料
 */
function clearField() {
    $('.step-3 .form-group').each(function () {
        $(this).find('input, select').val('').trigger('change');
    }).removeClass('show-field');
}

/**
 * Custom Scroll Bar
 */
new SimpleBar($('.modal-body-container')[0], {
    autoHide: true,
    scrollbarMinSize: 6
});

$('.simplebar-scroll-content').on('scroll', function () {
    var o = this;
    var modalContainer = $('.modal-body-container');

    if(o.offsetHeight + o.scrollTop == o.scrollHeight)
    {
        modalContainer.addClass('toEnd');
    } else {
        modalContainer.removeClass('toEnd');
    }
});

// ===================================
// Form Steps End
// ===================================


// ===================================
// Coupon Code Start
// ===================================
/*
var coupons = [ // 測試用票券代碼
    { type: '0', couponcode: '054JXQH8', amount: 1},
    { type: '0', couponcode: '3MNF5RUE', amount: 1},
    { type: '0', couponcode: '5NIJD3FC', amount: 1},
    { type: '0', couponcode: '7Y0CJCYB', amount: 1},
    { type: '0', couponcode: '920T9603', amount: 1},
    { type: '0', couponcode: 'BWCWASDU', amount: 1},
    { type: '1', couponcode: 'D4EX2INA', amount: 4},
    { type: '1', couponcode: 'ETL738NF', amount: 4},
    { type: '1', couponcode: 'HSTJKWYX', amount: 4},
    { type: '1', couponcode: 'M4ZVGYZR', amount: 4},
    { type: '2', couponcode: 'P18PR5I9', amount: 10},
    { type: '2', couponcode: 'QIARITDN', amount: 10},
    { type: '2', couponcode: 'TUN07VAB', amount: 10},
    { type: '2', couponcode: '4MIUFV8I', amount: 10},
];
*/

/**
 * 票券代碼，確認按鈕點擊時
 */
verificationCode.on('click', function () {
    var coupon = $('input[name="coupon"]');
    var couponVal = coupon.val(); // 取得用戶輸入的票券代碼
    var couponMsg = $('.coupon-code-message .error-message');
    couponVal = couponVal.toUpperCase().trim();

    couponMsg.html('');
/*
    // 票券代碼是否存在
    var couponIndex = coupons.map(function (couponData) {
        return couponData.couponcode;
    }).indexOf(couponVal);
*/
    // 代碼長度是否正確
    if(couponVal.length !== 8){
        couponMsg.append('<p>序號錯誤</p>');
        return false;
    }
    // 票券是否在表單送出前重複使用
    var isAllow = $.inArray(couponVal, usedCoupons);
    if (couponVal.includes('/')) couponMsg.append('<p>一次請輸入一組序號，「／」為兩組序號之間的分隔</p>');
    if (isAllow !== -1){
        couponMsg.append('<p>序號錯誤或已使用</p>');
        return false;
    }

    if(restPeople <= 0){
        console.log('test1')
        if (couponVal.includes('/')) couponMsg.append('<p>已經不需要扣抵囉</p>');
    } else {
        $.get('/clubtomorrow/GetAjaxData',{
            'act':'CheckCoupon',
            'code':couponVal,
            'day':$('#booking_date').val(),
            'pople':submitDatas['booking_people'] ,
            'restPeople':restPeople,
            'coupon':usedCoupons
        },function(data){
            if(data.success == 'Y'){
                var ticketAmount = data.ticketAmount;
                var ticketMoney  = $('#booking_time option:selected').data('money');
                restPeople = restPeople - ticketAmount;

                // 更新暫存已使用代碼
                usedCoupons.push(couponVal);

                // 更新完成劃位所需金額
                paidAmount = paidAmount + ticketAmount * ticketMoney;
                restAmount = submitDatas['booking_people'] * ticketMoney - paidAmount ;

                amountToGo.text(formatPrice(restAmount));
                verificationCode.closest('td').find('.submit-coupon-wrapper').append('<p class="submit-coupon">劃位序號' + passTimes + ' ' + couponVal + ' ' + data.ticket +'</p>');
                $.each(ticketInfos, function (index, ticket) {
                    if(ticket.type === data.ticketType) ticket.counter++;
                });// 該票券使用次數+1
                ///ticketInfos[data.ticketType].counter++; 
                updateTicketField();
                passTimes++; // 通過人數
                coupon.val('').trigger('change');
            } else {
                couponMsg.append('<p>'+data.message+'</p>');
            }
        },'json');
    }

/*

    // 如果票券代碼可使用，且尚未重複輸入
    if (couponIndex !== -1 && isAllow == -1) {
        var thisCoupon = coupons[couponIndex]; // 目前使用的折扣碼資訊
        var ticketType = thisCoupon.type; // 折扣碼票種
        var ticketAmount = thisCoupon.amount; // 代碼可折抵人數
        var ticketInfo = ticketInfos[ticketType]; // 該票券種類詳細資訊

        if (restPeople >= ticketAmount) {
            ticketInfos[ticketType].counter++; // 該票券使用次數+1
            restPeople = restPeople - ticketAmount;

            // 更新暫存已使用代碼
            usedCoupons.push(couponVal);

            // 更新完成劃位所需金額
            paidAmount = paidAmount + ticketAmount * 2000;
            restAmount = submitDatas['booking_people'] * 2000 - paidAmount ;

            amountToGo.text(formatPrice(restAmount));
            $(this).closest('td').find('.submit-coupon-wrapper').append('<p class="submit-coupon">劃位序號' + passTimes + ' ' + couponVal + ' ' + ticketInfo.name +'</p>');

            updateTicketField();
            passTimes++;

        } else {
            couponMsg.append('<p>您輸入的序號已超過剩餘折抵人數，請重新檢查</p>');
        }

    } else if (couponVal.includes('/')) {
            couponMsg.append('<p>一次請輸入一組序號，「／」為兩組序號之間的分隔</p>');
    } else {
        couponMsg.append('<p>序號錯誤或已使用</p>');
    }

*/





    coupon.val('').trigger('change');
    return false;
});

function updateTicketField() {
    var html = '';

    $.each(ticketInfos, function (index, ticket) {
        if (ticket.counter > 0) {
            html += ticket.name + ' ' + ticket.counter + ' 張';

            if (index !== ticketInfos.length - 1) {
                html += '<br/>';
            }
        }
    });

    ticketTypeField.html(html);
}

// ===================================
// Coupon Code End
// ===================================

/**
 * Form Select Plugin Start
 */
jQuery(function($){
    // 頁面載入時預先Init一次 Selec2 外掛，避免樣式跑掉
    $('select').each(function () {
        var placeholder = $(this).data('placeholder');
        $(this).select2({
            placeholder: placeholder,
            minimumResultsForSearch: Infinity
        })
    });
    // 送出 csrf-token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

/**
 * 數字轉貨幣格式
 */
function formatPrice(n) {
    var t = parseInt(n), i, r;
    for (t = t.toString().replace(/^(\d*)$/, "$1."), t = (t + "00").replace(/(\d*\.\d\d)\d*/, "$1"), t = t.replace(".", ","), i = /(\d)(\d{3},)/; i.test(t);)
        t = t.replace(i, "$1,$2");
    return t = t.replace(/,(\d\d)$/, ".$1"), r = t.split("."), r[1] == "00" && (t = r[0]), t
}

/**
 * 隱私權條款，閱讀完畢＆同意後，自動勾選同意及Focus電話欄位
 */
var agreeCheckbox = $('#agree');

$('#personalCapital .close').on('click', function () {
    agreeCheckbox.prop('checked', 'true').trigger('change');
});

/**
 * 限制電話欄位僅能輸入數字
 */
phoneField.bind('keyup paste', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// ----------------------------
// International Telephone Input
// ----------------------------
var input = document.querySelector("#field_phone"),
  errorMsg = document.querySelector('.field_phone_label .error-msg');

// initialise plugin
var iti = window.intlTelInput(input, {
    onlyCountries: ["tw","cn" ,"hk", "mo", "my", "sg"],
    initialCountry: "tw",
    separateDialCode: true,
    formatOnDisplay: true,
    nationalMode: true,
    utilsScript: "utils.js"
});

var reset = function() {
    input.classList.add("error");
    errorMsg.innerHTML = "";
};

// on keyup, countrychange: validate field
var eventList = ['keyup', 'countrychange'];
for(event of eventList) {
    input.addEventListener(event, function() {
        reset();
        isPhoneNumber(input);
    });
}

/**
 * 號碼是否符合選擇的國碼長度
 */
function isPhoneNumber(input) {
    if (input.value.trim()) {
        if (iti.isValidNumber() && isTwPhone(input.value, iti)) {
            input.classList.remove("error");
        } else {
            input.classList.add("error");
        }
    }
}

/**
 * 如國碼為886，判斷是否為手機號碼
 */
function isTwPhone(number, iti) {
    if (iti.selectedCountryData.iso2 === 'tw') {
        if (
          number.length === 10 && number.substring(0, 2) === '09' ||
          number.length === 9 && number.substring(0, 1) === '9') {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}
