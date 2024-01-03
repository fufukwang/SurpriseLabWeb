var allowNext = false;
var people = 0; // 人數
var usedCoupons = []; // 禮物卡陣列
// ============================== #notice - START
$('#notice .notice-btn').on('click', function (e) {
    $.blockUI();
    $('#notice').hide();
    $('#booking').show();
    $('html,body').animate({scrollTop: 0}, 300);
    $.unblockUI();
});
// ============================== #notice - END

// ============================== #step1 - START
$(document).on('click', '#step1 .tickets button', function (e) {
// $('#step1 .tickets button').on('click', function (e) {
    var $this = $(this);
    var input = $(this).closest('.input-group').find('input');
    var number = input.val();
        
    if(number !== '') {
        $.blockUI({message: null});
        var disVal = number.trim().toUpperCase();
        $.post('/lebaldeparis/PostAjaxData',{
            'act': 'CheckParisCoupons',
            'code': disVal
        },function(data){
            if(data.success == 'Y'){
                $this.closest('.input-group').find('.msg')
                    .text('劃位序號  ' + number + ' ' + data.type)
                    .css('opacity', 1);
                // 確認序號後的處理
                $this.prop('disabled',true);
                input.prop('disabled',true);
                $('#step1 .tickets .fields').append(`<div class="input-group">
                                                <input type="text" placeholder="輸入序號" />
                                                <button type="button">確認</button>
                                                <div class="msg"></div>
                                            </div>`);
                // 紀錄人數與輸入的序號
                people += data.cut;
                usedCoupons.push(number);
                // 前往下一步
                allowNext = true;
                $('#step1 .go-next').removeClass('disabled');
            } else {
                $this.closest('.input-group').find('.msg')
                    .text(data.message)
                    .css('opacity', 1);
            }
            $.unblockUI();
        },'json');
    }
});

$('#step1 .go-prev').on('click', function (e) {
    $('#booking').hide();
    $('#notice').show();
    window.scrollTo(0, 0);
    allowNext = true;
});

$('#step1 .go-next').on('click', function (e) {
    if(allowNext) {
        $.blockUI();
        $('#step1').hide();
        $('#step2').show();
        window.scrollTo(0, 0);
    }
    
    // #step2 select 套用 select2
    $('#step2 select').each(function () {
        var placeholder = $(this).data('placeholder');
        $(this).select2({
            placeholder: placeholder,
            minimumResultsForSearch: Infinity,
            dropdownParent: $(this).closest('.input-group').find('.select-wrapper'),
        });
    });

    getAvailableDate();
});
// ============================== #step1 - END

// ============================== #step2 - START
var booking_date = $('#step2 #booking_date');
var enableDays = [];
var dateSite = [];

function getAvailableDate() {
    $.get('/lebaldeparis/GetAjaxData',{
        'act': 'getBypople',
        'ticketType': '',
        'pople': people
    },function(data){
        $.unblockUI();
    
        for(i=0;i<data.length;i++){
            enableDays.push(data[i].day);
            dateSite[data[i].day] = data[i].sites
        }
        
        booking_date.datepicker({
            minDate: enableDays.length > 0 ? enableDays[0] : 0,
            maxDate: '+2m',
            dateFormat: 'yy-mm-dd',
            beforeShowDay: enableAllTheseDays,
            onSelect: dateOnSelect
        });
    
        booking_date.on('focus', function () {
            $('#ui-datepicker-div').appendTo('#step2 .calender-wrapper');
            setTimeout(() => {
                if($('.calender-ps').length == 0){
                    $('#ui-datepicker-div').append(`<div class="calender-ps">
                        <div>
                            <p style="color: #EFCEA3">好評熱賣</p>
                        </div>
                        <div>
                            <p style="color: #E85455">即將完售</p>
                        </div>
                        <div>
                            <p style="color: #AA8495">已售完</p>
                        </div>
                    </div>`)
                }
            }, 100);
        });
    },'json');
}

function enableAllTheseDays(date) {
    var sdate = $.datepicker.formatDate( 'yy-mm-dd', date);
    if($.inArray(sdate, enableDays) !== -1) {
        var myDateClass = ""; // 加入的樣式
        var myDateTip = "";  // tooltip 文字
        var myDateDay = date.getDay();
        if(myDateDay === 0 || myDateDay === 6){
            if(dateSite[sdate]<=50){
                myDateClass = "sold-out-soon";
                myDateTip = "即將完售";
            } else if(dateSite[sdate]<=108){
                myDateClass = "still-vacancy";
                myDateTip = "好評熱賣";
            }
        } else {
            if(dateSite[sdate]<=50){
                myDateClass = "sold-out-soon";
                myDateTip = "即將完售";
            } else if(dateSite[sdate]<=72){
                myDateClass = "still-vacancy";
                myDateTip = "好評熱賣";
            }
        }
        return [true, myDateClass, myDateTip];
    }
    return [false, '', ''];
}

// 選擇日期
function dateOnSelect() {
    // blockUI
    $.blockUI({message: null});

    // disable go next
    allowNext = false;
    $('#step2 .go-next').addClass('disabled');

    // show time
    $.get('/lebaldeparis/GetAjaxData',{
        'act': 'getBydartpart',
        'ticketType': '',
        'day': $('#booking_date').val(),
        'pople': people
    },function(data){
        $.unblockUI();
        // var returndata = data;
        data = data.map(function(item){
            return {
                id: item.id,
                text: item.rang_start.substring(0,5) + ' - ' + item.rang_end.substring(0,5) + ' 剩餘' + item.sites + '位'
            }
        });

        var $time_select = $('#step2 .time select');
        $time_select.empty();
        $time_select.select2({
            data: data,
            placeholder: $time_select.data('placeholder'),
            minimumResultsForSearch: Infinity,
            dropdownParent: $time_select.closest('.input-group').find('.select-wrapper'),
        });
        $time_select.val(null).trigger('change');
    },'json');
}

// 選擇時段
$('#step2 .time select').on('select2:select', function (e) {
    if($(this).val() != '') {
        allowNext = true;
        $('#step2 .go-next').removeClass('disabled');
    }
});

$('#step2 .go-prev').on('click', function (e) {
    $('#step2').hide();
    $('#step1').show();
    window.scrollTo(0, 0);
    allowNext = true;
});

$('#step2 .go-next').on('click', function (e) {
    if(allowNext) {
        $('#step2').hide();
        $('#step3').show();
        window.scrollTo(0, 0);
    }

    // 體驗語言人數
    $('#step3 select.lang_zh, #step3 select.lang_en').each(function () {
        $select = $(this);

        var maxVal = people;
        var data = [];
        for (let i = 0; i <= maxVal; i++) {
            data.push({
                id: i,
                text: i
            });
        }
        
        $select.empty();
        $select.select2({
            data: data,
            placeholder: $select.data('placeholder'),
            minimumResultsForSearch: Infinity,
            dropdownParent: $select.closest('.input-group').find('.select-wrapper')
        });
        $select.val('0').trigger('change');
    });
});
// ============================== #step2 - END

// ============================== #step3 - START
// 手機國碼
var data = PHONE_CODE.map(function(item){
    return {
        id: item.phoneCode,
        text: item.phoneCode + ' ' + item.countryNameTw
    }
});
var $select = $('#step3 select.code');
$select.empty();
$select.select2({
    data: data,
    placeholder: $select.data('placeholder'),
    minimumResultsForSearch: Infinity,
    dropdownParent: $select.closest('.input-group').find('.select-wrapper')
});
$select.val('+886').trigger('change');



function checkStep3Field() {
    allowNext = true;
    $('#step3 .error').remove();

    // 檢查必填
    $('#step3 input[type=text].required').each(function () {
        if($(this).val() === '') {
            var $inputGroup = $(this).closest('.input-group');
            if($inputGroup.find('.error').length === 0) {
                $inputGroup.append('<div class="error">此欄位為必填</div>');
            } else {
                $inputGroup.find('.error').text('此欄位為必填');
            }
            allowNext = false;
        }
    });

    // 檢查手機格式
    var phone = $('#step3 input.phone').val();
    if( phone !== '' && !/^09\d{8}$/.test(phone) ) {
        var $inputGroup = $('#step3 input.phone').closest('.input-group');
        if($inputGroup.find('.error').length === 0) {
            $inputGroup.append('<div class="error">手機格式錯誤</div>');
        } else {
            $inputGroup.find('.error').text('手機格式錯誤');
        }
        allowNext = false;
    }

    // 檢查Email格式
    var email = $('#step3 input.email').val();
    if( email !== '' && !/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/.test(email) ) {
        var $inputGroup = $('#step3 input.email').closest('.input-group');
        if($inputGroup.find('.error').length === 0) {
            $inputGroup.append('<div class="error">Email格式錯誤</div>');
        } else {
            $inputGroup.find('.error').text('Email格式錯誤');
        }
        allowNext = false;
    }

    // // 檢查統編格式
    // var tax = $('#step3 input.tax').val();
    // if( tax !== '' && !/^[0-9]*$/.test(tax) ) {
    //     var $inputGroup = $('#step3 input.tax').closest('.input-group');
    //     if($inputGroup.find('.error').length === 0) {
    //         $inputGroup.append('<div class="error">統一編號格式錯誤</div>');
    //     } else {
    //         $inputGroup.find('.error').text('統一編號格式錯誤');
    //     }
    //     allowNext = false;
    // }
    
    // // 檢查載具格式 
    // var invoices = $('#step3 input.invoices').val();
    // // if( invoices !== '' && !/^\/[\\da-zA-Z0-9+-\\.]{7}$/.test(invoices) ) { // 載具格式
    // if( invoices !== '' && !/^[a-zA-Z0-9!@#$%^&*(),.?\":{}|<>_\-+=;/\'~\[\]\\`]+$/.test(invoices) ) { // 英數+半形符號，不限長度or組成
    //     var $inputGroup = $('#step3 input.invoices').closest('.input-group');
    //     if($inputGroup.find('.error').length === 0) {
    //         $inputGroup.append('<div class="error">手機載具格式錯誤</div>');
    //     } else {
    //         $inputGroup.find('.error').text('手機載具格式錯誤');
    //     }
    //     allowNext = false;
    // }

    if(!allowNext) {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    }
}

$('#step3 input[type=checkbox]').on('change', function() {
    allowNext = false;
    $('#step3 input[type=checkbox]').each(function(){
        if(!$(this).is(":checked")) {
            allowNext = true;
        }
    });
    if(allowNext) {
        $('#step3 .go-next').addClass('disabled');
    } else {
        $('#step3 .go-next').removeClass('disabled');
    }
});

$('#step3 .go-next').on('click', function(){
    if( !$(this).hasClass('disabled') ) {
        checkStep3Field();

        if(allowNext) {
            setStep4Contents();

            $('#step3').hide();
            $('#step4').show();
            window.scrollTo(0, 0);
            fillTicketInfo('ticket-info');
        }
    }
});

$('#step3 .go-prev').on('click', function(){
    $('#step3').hide();
    $('#step2').show();
    window.scrollTo(0, 0);
    allowNext = true;
});
// ============================== #step3 - END

// ============================== #step4 - START
function setStep4Contents() {
    $('#step3 input, #step3 select, #step3 textarea').each(function (idx) {
        var val = $(this).val();
        if( $(this)[0].nodeName.toLowerCase() == 'textarea' ) {
            val = val.replace(/\n/g, "<br />");
            $('#step4 .filed-value').eq(idx).html(val);
        } else {
            $('#step4 .filed-value').eq(idx).text(val);
        }
    });
}

$('#step4 .go-prev').on('click', function(){
    $('#step4').hide();
    $('#step3').show();
    allowNext = true;
});
// ============================== #step4 - END

// ===================================
// 數字轉貨幣格式
// ===================================
function formatPrice(n) {
    var t = parseInt(n), i, r;
    for (t = t.toString().replace(/^(\d*)$/, "$1."), t = (t + "00").replace(/(\d*\.\d\d)\d*/, "$1"), t = t.replace(".", ","), i = /(\d)(\d{3},)/; i.test(t);)
        t = t.replace(i, "$1,$2");
    return t = t.replace(/,(\d\d)$/, ".$1"), r = t.split("."), r[1] == "00" && (t = r[0]), t
}
$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

MicroModal.init({
    openTrigger: 'data-custom-open',
    closeTrigger: 'data-custom-close',
    disableFocus: true,
    disableScroll: true,
    awaitOpenAnimation: true,
    awaitCloseAnimation: true,
    debugMode: true
});

function fillTicketInfo(id){
    $('#'+id+' .tPeople').text(people+' 人');
    $('#'+id+' .tDay').text($('#booking_date').val());
    $('#'+id+' .tTime').text($('#booking_time option:selected').text().substr(0, 13));
    $('#'+id+' .tCount').text(usedCoupons.length+' 張');
}

$('.sendOrderBtn').bind('click',function(){
    SendOrderData();
});

function SendOrderData(){
    $.blockUI();
    var obj = {
        'name'  : $('[name=name]').val(),
        'area_code': $('[name=area_code]').val(),
        'phone' : $('[name=phone]').val(),
        'email' : $('[name=email]').val(),
        'notes' : $('[name=notice]').val(),
        'pro_id': $('[name=booking_time]').val(),
        'need_chinese' : $('[name=need_chinese]').val(),
        'need_english' : $('[name=need_english]').val(),
        'company_tax_ID' : $('[name=company_tax_ID]').val(),
        'company_name' : $('[name=company_name]').val(),
        'vehicle': $('[name=vehicle]').val(),
        'people': people,
        'coupons': usedCoupons,
    };
    $.post('/lebaldeparis/ReOrderData',obj,function(data){
        $('#booking').hide();
        if(data.success=='Y'){
            fillTicketInfo('ticket-success');
            $('#booking-success').show();
        } else {
            $('#booking-fail').show();
        }
        
    },'json').fail(function() {
        alert('意外性錯誤!如持續發生請聯繫客服!');
        window.location.reload(true);
    }).always(function() {
        $.unblockUI();
    });
}