var current_fs, next_fs, prev_fs, title;
var progressWrapper = $('.bar-wrapper');
var progress = $('#progressbar li');
var progress_title = $('.progress-title');
var filedset = $('fieldset');
var activeIndex;
var isAllowToNextStep; // 是否可以進入下一步
var passTimes = 1; // 票券代碼輸入次數
var amountToGo = $('.amountToGo'); // 完成劃位金額
/*
var ticketInfos = [
    { type: 0, name: '暢行無阻票', price: 2000},
    { type: 1, name: '時間有點限制票', price: 2000},
    { type: 2, name: '四人沈醉票', price: 2000}
];
*/
var usedCoupons = []; // 暫存已輸入的票券代碼
var submitDatas = []; // 暫存所有欄位資料
var proObject   = []; // 暫存的
var proSingle  = 0; // 單價
var cutPelple  = 0; // 折抵人數
var paidAmount = 0; // 已折抵金額
var restAmount = 0; // 剩餘折抵金額
var discountCode = '';
var discountAmount = 0;

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

    // 取得可定位日期
    if (next_fs.hasClass('step-3')) {
        var booking_date = $("#booking_date");

        booking_date.on('focus', function () {
            $('#ui-datepicker-div').appendTo('.calender-wrapper');
        });

        // 可選擇的日期
        var enableDays = [];
        // console.log(submitDatas['booking_people']);
        if(!isNaN(submitDatas['booking_people'])){
            $.blockUI();
            $.get('/thegreattipsy/GetAjaxData',{
                'act':'getSpecialBypople',
                'pople':submitDatas['booking_people'],
                'ticketType':$('input[name="ticket-type"]:checked').val(),
            },function(data){
                for(i=0;i<data.length;i++){
                    enableDays.push(data[i].day);
                }
                var minD = 0;
                if(enableDays.length>0){
                    minD = enableDays[0];
                }
                booking_date.datepicker("destroy");
                booking_date.datepicker({
                    minDate: "2022-04-22",// minD,
                    maxDate: "2022-05-02",// new Date(2022, 1, 28),
                    dateFormat: 'yy-mm-dd', 
                    beforeShowDay: enableAllTheseDays
                });
                $.unblockUI();
            },'json');
        }
        

        function enableAllTheseDays(date) {
            var sdate = $.datepicker.formatDate( 'yy-mm-dd', date);

            if($.inArray(sdate, enableDays) !== -1 /*&& $.inArray(sdate, ['2022-02-08','2022-02-09','2022-02-10','2022-02-15','2022-02-16','2022-02-17']) !== -1*/) {
                return [true];
            }
            return [false];
        }
        // console.log('取得日期');
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
    $('#filled_pv').text(parseInt($('[name="booking_people"]').val()) - parseInt($('[name="vegetarian_food"]').val()));
    // 寫入價格
    amountToGo.text(formatPrice($('#booking_people option:selected').data('money')));
    /*
    if(cutPelple == 0){
        for(var i=0;i<proObject.length;i++){
            if(proObject[i].id == $('#booking_time').val()){
                proSingle = proObject[i].money;
            }
            var summary = formatPrice(($('[name="booking_people"]').val() * proSingle) * 1.1 - discountAmount); // 數字變成貨幣格式

            // 更新完成劃位金額
            amountToGo.text(summary);
        }
    }
    */
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

                }/* else {

                    // 票券種類
                    if (!$('input:radio[name="ticket-type"]').is(":checked")) {
                        isAllowToNextStep = false;
                        return false;
                    }

                }*/
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
/*
$(".submit").click(function(){
    return false;
});
*/
// ===================================
// Form Steps Start
// ===================================
// Step 2 - 選擇人數
$('.step-2 input, .step-2 select').on('change', function () {
    // 當用戶選擇人數時，更新葷素區塊及完成劃位所需金額
    if ($(this).attr('id') === 'booking_people') {
        submitDatas['booking_people'] = parseInt($(this).find(':selected').val());
        $('#vegetarian_food').html('');
        for(var pc=0;pc<=submitDatas['booking_people'];pc++){
            $('#vegetarian_food').append('<option value="'+pc+'">'+pc+'</option>');
        }
        //update_isVegetarian(submitDatas['booking_people']);
        //update_amountToGo(submitDatas['booking_people']);

        usedCoupons = []; // 清空已使用的票券代碼

        if (!$(this).val()) {
            accessHide = false;
        }
    }

});
// Step 3 - 日期、時段選擇
$('.step-3 input, .step-3 select').on('change', function () {

    // 取得下一個欄位的標籤名稱
    var nextFieldset = $(this).closest('.form-group').next();
    var nextField = nextFieldset.find('input, select');
    var nextElementType = nextField.prop('tagName');
    var accessHide = true;
    if (nextElementType === 'SELECT') {
        var nextFieldID = nextField.attr('id');
        var data;

        if (nextFieldID === 'booking_time_slot') { // 時段
            nextField.html('');
            if($('#booking_date').val()!=''){
                $.get('/thegreattipsy/GetAjaxData',{
                    'act':'getByday',
                    'ticketType':$('input[name="ticket-type"]:checked').val(),
                    'day':$('#booking_date').val(),
                    'pople':submitDatas['booking_people']
                },function(obj){
                    data = [];
                    if(obj.length>0){
                        for(i=0;i<obj.length;i++){
                            data.push({
                                id   : obj[i].day_parts,
                                text : obj[i].day_parts
                            });
                        }
                        updateOptions(nextField, data);
                    } else {
                        if($('#booking_date').val() != ''){
                            alert("此日期午場座位不足喔!!\n請再重新選擇日期!");
                            return false;
                        }
                    }
                    nextField.val(null).trigger('change');
                    updateField(nextFieldset, accessHide);
                },'json');
            }
            
        } else if (nextFieldID === 'booking_time') { // 時間
            nextField.html('').trigger('change');
            if($('#booking_date').val()!='' && $('#booking_time_slot').val() != ''){
                $.get('/thegreattipsy/GetAjaxData',{
                    'act':'getBydartpart',
                    'ticketType':$('input[name="ticket-type"]:checked').val(),
                    'day':$('#booking_date').val(),
                    'day_parts':$('#booking_time_slot').val(),
                    'pople':submitDatas['booking_people']
                },function(obj){
                    data = [];
                    proObject = [];
                    if(obj.length>0){
                        proObject = obj;
                        for(i=0;i<obj.length;i++){
                            var range = obj[i].rang_start.substring(0,5) + ' - ' + obj[i].rang_end.substring(0,5) + ' 剩餘'+obj[i].sites+'位'
                            data.push({
                                id   : obj[i].id,
                                text : range
                            });
                        }
                        updateOptions(nextField, data);
                        nextField.val(null).trigger('change');
                    }
                },'json');
            }
        }
        // 優惠券初始化
        usedCoupons = [];
        cutPelple = 0;
        passTimes = 1;
        $('.submit-coupon-wrapper').html('');
        // 更新下拉選單的選項
        //updateOptions(nextField, data);
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

$('.verification-code').on('click', function () {
    var coupon = $('input[name="coupon"]');
    var couponVal = coupon.val(); // 取得用戶輸入的票券代碼
/*
    // 票券代碼是否存在
    var couponIndex = coupons.map(function (couponData) {
        return couponData.couponcode;
    }).indexOf(couponVal);
    */
    if(submitDatas['booking_people'] - cutPelple == 0){
        alert('已經不需要扣抵囉!');
        return false;
    }
    // 清除空白並驗證
    couponVal = couponVal.trim();
    // console.log(couponVal.length);
    couponVal = couponVal.toUpperCase();
    if(discountCode == ''){
        $.get('/thegreattipsy/GetAjaxData',{
            'act':'CheckDiscount',
            'code':couponVal,
            'day':$('#booking_date').val(),
            'pople':submitDatas['booking_people'] - cutPelple,
            'day_parts':$('#booking_time_slot').val(),
            'useType': 'sp',
            'coupon':usedCoupons
        },function(data){
            if(data.success == 'Y'){
                discountCode = couponVal;
                discountAmount = data.money;
                $('.submit-coupon-wrapper').append('<p class="submit-coupon">折扣碼' + discountCode + ' 折抵 ' + discountAmount +'</p>');

                // 改寫金額
                amountToGo.text(formatPrice(parseInt($('#booking_people option:selected').data('money')) - discountAmount));
                $('#discount').val(discountCode);
            } else {
                alert('折扣碼 '+couponVal+" 無法使用!\n" + data.message);
            }
        },'json');






/*
        // tipsyagain
        discountCode = couponVal;
        if(couponVal == 'TIPSYAGAIN' || couponVal == 'TWATIPSY'){
            discountAmount = 100;
        } else if(couponVal == 'SHOPEETIPSY' || couponVal == 'GARENATIPSY' || couponVal == 'LINEBANKTIPSY' || couponVal == 'YOXITIPSY' || couponVal == 'COMPALTIPSY' || couponVal == 'NANSHANTIPSY' || couponVal == 'MIXERBOXTIPSY' || couponVal == 'YAHOOTIPSY' || couponVal == 'MICROSOFTTIPSY' || couponVal == 'GOOGLETIPSY' || couponVal == 'CTBCTIPSY' || couponVal == 'ESLITETIPSY'){
            discountAmount = 220;
        } else if(couponVal == 'TIPSYAGAIN01' || couponVal == 'TIPSYAGAIN02' || couponVal == 'TIPSYAGAIN03'){
            discountAmount = 200;
        }
        

        amountToGo.text(formatPrice(parseInt($('#booking_people option:selected').data('money')) - discountAmount));
        $('#discount').val(discountCode);
        */
        coupon.val('');
        return false;
    } else {
        alert('折扣碼錯誤或多次輸入!');
        coupon.val('');
        return false;
    }
    if(couponVal.length != 8){
        alert('一次請輸入一組序號，／與／之間是不同序號');
        return false;
    }
    coupon.val('').trigger('change');
    
    return false;
});
/*
function couponAmount(couponType, price) {
    // 如果票券序號為四人沈醉
    // 則票券折扣額為當下的票券金額 X 4
    return couponType == 2 ? price * 4 : price;
}
*/
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
    // ajax 送出 token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*
    $('#SurePay').bind('click',function(){
        TPDirect.card.getPrime(function(result) {
            if (result.status !== 0) {
                alert('卡片資料有誤!無法取得認證!');
                console.log('getPrime error');
                return false;
            }
            var prime = result.card.prime
            console.log('getPrime success');
            $('#lightbox2pay').fadeToggle(700);
            SendOrderData('online',prime);
        })
    });
    */
    $('#CanalPay').bind('click',function(){
        $('#lightbox2pay').fadeToggle(700);
    });
    $('#btn-online-submit').bind('click',function(){
        // 判斷是否到達可過關的地方
        if($('[name="booking_people"]').val() - cutPelple == 0){
            SendOrderData('online','');
        } else {
            // 改成送到 藍新
            $('form#booking').attr('action','/thegreattipsy/Special.OrderPay');
            $('form#booking').submit();
            // 開啟刷卡介面
            // $('#lightbox2pay').fadeToggle(700);   
        }
    });
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


// 送出資料
function SendOrderData(Pay,prime){
    $.blockUI();
    var people = $('[name="booking_people"]').val();
    var obj = {
        'name'  : $('[name=name]').val(),
        'tel'   : $('[name=phone]').val(),
        'email' : $('[name=email]').val(),
        'notes' : $('[name=notice]').val(),
        'pro_id': $('[name=booking_time]').find(':selected').val(),
        'Pople' : people,
        'prime' : prime,
        'Pay'   : Pay,
        'coupon': usedCoupons,
        'is_overseas':2,
        'vegetarian': $('#vegetarian_food').val(),
    };
    $.post('/thegreattipsy/ReOrderData',obj,function(data){
        $('<link>').appendTo('head')
            .attr({
                type: 'text/css', 
                rel: 'stylesheet',
                href: '/thegreattipsy/css/submit.css?v=1'
            });
        $('#bookingPage').hide();
        if(data.success==true){
            $('#bookingSuccess').show();
            console.log('成功')
        } else {
            $('#bookingError').show();
            console.log('失敗')
        }
        $.unblockUI();
    },'json').fail(function() {
        alert('服務繁忙中請稍後在試!');
        window.location.reload(true);
        console.log('錯誤')
        $.unblockUI();
    }).always(function() {
        
    });
}
