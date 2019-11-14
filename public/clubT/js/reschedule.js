// Variable
var progressWrapper = $('.bar-wrapper');
var progress = $('#progressbar li');
var progress_title = $('.progress-title');
var filedset = $('fieldset');
var reschedule_date = $("#reschedule_date");
var phoneField = $('#field_phone');
var order = $('.order');

// Step
var current_fs, next_fs, prev_fs, title;
var activeIndex;
var isAllowToNextStep; // 是否可以進入下一步
var reschedule_people = 0;
var reschedule_id = 0;

// ===================================
// Form Default Start
// ===================================

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

    if($(this).hasClass('orderToggler')) { // 取得訂單資訊/重新輸入按鈕

        if(current_fs.hasClass('open')) { // 按鈕為「重新輸入」時
            clearField(current_fs); // 清空先前已填過的資料
            $('.step-2').toggleClass('open');

        } else {
            verificationChecker(current_fs); // 驗證欄位格式

            if (current_fs.hasClass('error')) { // 欄位驗證錯誤

            } else { // 欄位驗證成功
                var fieldInfo = getFieldInfo(current_fs); // 取得欄位資料
                $('.loading-wrapper.is-load').addClass('show'); // 載入中Loading動畫
                $('.orders').html(''); // 清空訂單列表
                // 驗證並取得訂單資訊
                $.post('/clubtomorrow/PostAjaxData',{
                    phone     : fieldInfo['field_phone'],
                    dial_code : fieldInfo['dial-code'],
                    email     : fieldInfo['email'],
                    act       : 'myOrder'
                },function(data){
                    $('.loading-wrapper').removeClass('show');
                    if(data.success==true){
                        // data.order 輸出訂單資料
                        var html = '';
                        for(var i=0;i<data.order.length;i++){
                            if(data.order[i].status === '更改場次'){
                                var rescheduledClass = " is-rescheduled";
                                var rescheduledText  = "<span>已改期成功</span>";
                            } else if(data.order[i].status === '已付款'){
                                var rescheduledClass = "";
                                var rescheduledText  = "";
                            } else {

                            }
                            var sn = i+1;
                            html += '<div class="order'+rescheduledClass+'" data-people="'+data.order[i].people+'" data-id="'+data.order[i].id+'"><div class="order-header d-flex align-items-center"><div class="before-icon"></div><h4>訂單資料 '+sn+rescheduledText+'</h4><i class="icon icon-arrow ml-auto"></i></div><div class="order-info"><table class="order-data"><tr><td>姓名</td><td>'+data.order[i].name+'</td></tr><tr><td>電話</td><td>'+data.order[i].dial_code+' '+data.order[i].phone+'</td></tr><tr><td>電子信箱</td><td>'+data.order[i].email+'</td></tr><tr><td>票券</td><td>'+data.order[i].ticket+'</td></tr><tr><td>人數</td><td>'+data.order[i].people+'</td></tr><tr class="date"><td>日期</td><td><span>'+data.order[i].day+'</span>'+data.order[i].cday+'</td></tr><tr class="time"><td>時段</td><td><span>'+data.order[i].time+'</span>'+data.order[i].ctime+'</td></tr><tr class="notice"><td>其他備註</td><td>'+data.order[i].notes+'</td></tr></table></div></div>';
                        }

                        $('.orders').html(html);
                        $('.step-2').toggleClass('open').find('.next').attr('disabled', true);

                    } else {
                        clearField(current_fs); // 清空資料
                        $('.loading-wrapper.error').addClass('show');
                    }
                },'json').fail(function() {
                    $('.loading-wrapper').removeClass('show');
                    clearField(current_fs); // 清空資料
                    console.log('取得訂單錯誤');
                    $('.loading-wrapper.error').addClass('show');
                });



            }
        }

    } else if (next_fs.hasClass('step-4')) {
        filledDataChecker();
        toNextStep(next_fs);
    } else {
        toNextStep(next_fs);
    }

    // 重新判別用戶是否可點選下一步按鈕
    next_fs.find('.next, .submit').attr('disabled', true);
    allowChecker(next_fs);
});

/**
 * 當用戶點選訂單
 */
$('.orders').on('click','.order', function () {
    thisOrder = $(this);
    thisStep = thisOrder.closest('fieldset');

    if (thisOrder.hasClass('is-open')) { // 如果該訂單為展開狀態
        thisOrder.toggleClass('is-open');
        thisStep.find('.next').attr('disabled', true);

    } else { // 如果該訂單為收合狀態
        $('.order').removeClass('is-open');
        thisOrder.toggleClass('is-open');

        if (thisOrder.hasClass('is-rescheduled')) { // 如果該筆訂單已改期成功
            thisStep.find('.next').attr('disabled', true);
        } else {
            thisStep.find('.next, .submit').attr('disabled', false);
            // 紀錄訂單人數與表格內容
            reschedule_people = thisOrder.data('people');
            reschedule_id     = thisOrder.data('id');
            $('#filled-order-info').html(thisOrder.find('.order-data tbody').html());
            updateDatePicker(); // 更新日期
            clearField(); // 清空步驟三的資料
        }
    }
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
    title =  next_fs.data('title');
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

/**
 * 欄位驗證
 * @returns {boolean}
 */
function verificationChecker(thisStep) {
    var verification_fields = thisStep.find('.has-verification');
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

    if (!isValid) {
        thisStep.addClass('error');
    } else {
        thisStep.removeClass('error');
    }
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
 * 生成步驟3頁面的確認資料
 */
function filledDataChecker() {
    var checker_name, filled_val;

    $('.filled').each(function () {
        checker_name = $(this).data('filled');
        console.log(checker_name);

        if (checker_name === 'reschedule_time'){

            // 取得被選取的選項文字
            filled_val = $('[name=' + checker_name + ']').find(':selected').text().substr(0,13);

        } else {

            // 取得使用者填入的值
            filled_val = $('[name=' + checker_name + ']').val();

        }

        $(this).html(filled_val);
    });
}

/**
 * 每當欄位資料變動時，重新判別是否可啟用下一步按鈕
 */
$('input, select').on('change keyup', function () {
    allowChecker($(this).closest('fieldset'));
});

// ===================================
// Form Default End
// ===================================

/**
 * 暫時不送出表單，待前後台串接後可移除
 */
$(".submit").click(function(){
    $('.submit').attr('disabled', true);
    $('.loading-wrapper.is-load').addClass('show');
    if(reschedule_id === 0){
        $('#submit-main').hide();
        $('#submit-error').addClass("d-flex").show();
        console.log('編號錯誤');
        return false;
    }
    var obj = {
        'order_id' : reschedule_id,
        'pro_id'   : $('[name=reschedule_time]').find(':selected').val(),
        'act'      : 'changeOrder',
        'people'   : reschedule_people
    };
    $('<link>').appendTo('head')
        .attr({
            type: 'text/css', 
            rel: 'stylesheet',
            href: '/clubT/css/submit.css'
        });
    $.post('/clubtomorrow/PostAjaxData',obj,function(data){
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
        $('#submit-main').hide();
        $('#submit-error').addClass("d-flex").show();
        console.log('錯誤');
        $('.loading-wrapper').removeClass('show');
    });
});

// ===================================
// Form Steps Start
// ===================================

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

    if (nextFieldID === 'reschedule_time') { // 時間
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
        nextField.html('').trigger('change');
        $.get('/clubtomorrow/GetAjaxData',{
            'act':'getByday',
            'day':$('#reschedule_date').val(),
            'pople':reschedule_people
        },function(obj){
            data = [];
            proObject = [];
            if(obj.length>0){
                proObject = obj;
                for(i=0;i<obj.length;i++){
                    var range = obj[i].rang_start.substring(0,5) + ' - ' + obj[i].rang_end.substring(0,5) + ' 剩餘'+obj[i].sites+'位';
                    nextField.append('<option value="'+obj[i].id+'" data-money="'+obj[i].money+'">'+range+'</option>');
                }
                updateOptions(nextField, data);
                nextField.val(null).trigger('change');
            }
        },'json');
    }

    // 更新下拉選單的選項
    updateOptions(nextField, data);

    // 每次重新點選選項後，除了下一個選項會重新載入外，後面的選項都會隱藏並清空值
    updateField(nextFieldset, accessHide);

});

/**
 * 更新日期
 */
function updateDatePicker() {
    reschedule_date.on('focus', function () {
        $('#ui-datepicker-div').appendTo('.calender-wrapper');
    });

    // 可選擇的日期
    var enableDays = [];
    if(!isNaN(reschedule_people)){
        $.get('/clubtomorrow/GetAjaxData',{
            'act':'getBypople',
            'pople':reschedule_people,
        },function(data){
            for(i=0;i<data.length;i++){
                enableDays.push(data[i].day);
            }
            reschedule_date.datepicker("destroy");
            reschedule_date.datepicker({
                maxDate:"+5m",
                dateFormat: 'yy-mm-dd', 
                beforeShowDay: enableAllTheseDays
            });
        },'json');
    }
    //var enableDays = ["2019-08-24", "2019-08-25", "2019-08-26", "2019-08-27", "2019-08-28", "2019-08-29", "2019-08-30", "2019-08-31", "2019-09-01", "2019-09-03", "2019-09-06", "2019-09-07", "2019-11-07", "2019-11-09"];

    //reschedule_date.datepicker("destroy");
    //reschedule_date.datepicker({dateFormat: 'yy-mm-dd', beforeShowDay: enableAllTheseDays});

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
 * 清空該步驟資料
 */
function clearField(thisStep) {
    $(thisStep).find('.form-group').each(function () {
        $(this).find('input, select').val('').trigger('change');
    }).removeClass('show-field');
}

/**
 * 取得欄位資料（抓取訂單資料用），並回傳array
 * @param thisStep
 * @returns {Array}
 */
function getFieldInfo(thisStep) {
    var field = [];

    thisStep.find('input').each(function () {
        var thisField = $(this);
        field[thisField.attr('name')] = thisField.val();
    });

    return field;
}

/**
 * 可於此Ajax取得訂單資料
 * @param fieldInfo {array}
 * @returns {boolean}
 */
function getOrderInfo(fieldInfo) {
    if ((fieldInfo['field_phone'] === '912345678' && fieldInfo['dial-code'] === '+886') ||
      fieldInfo['email'] === '123@gmail.com') {
        return false; // 測試用，當為以上資料時，呈現失敗狀態
    } else {
        return true;
    }
}

/**
 * 重新輸入資料
 */
$('.refilled').on('click', function () {
    $('.loading-wrapper').removeClass('show');
});

// ===================================
// Form Steps End
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
