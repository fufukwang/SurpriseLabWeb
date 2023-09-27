var currentStep = 1;
var allowNext = false;
// discount
var discount_code = '';
var discount_money = 0;
var coupon_code = '';
var coupon_money = 0;
var money = 0;

// ============================== #step1 - START
var booking_date = $('#step1 #booking_date');

// 所有 select 套用 select2
$('#step1 select').each(function () {
    var placeholder = $(this).data('placeholder');
    $(this).select2({
        placeholder: placeholder,
        minimumResultsForSearch: Infinity,
        dropdownParent: $(this).closest('.input-group').find('.select-wrapper')
    });
});
// 調整票種
$('#step1 .type select').on('change', function (e) {
    var val = $(this).val();
    switch(val){
        case '單人獨舞票': changeGuestNumber(20); break;
        case '雙人共舞票': changeGuestNumber(10); break;
        case '四人群舞票': changeGuestNumber(5); break;
    }
    function changeGuestNumber(num){
        var $guest_select = $('#step1 .guests select');
        $guest_select.empty();
        var data = [];
        for(i=1;i<=num;i++) data.push({id: i,text: i})
        $guest_select.select2({
            data: data,
            placeholder: $guest_select.data('placeholder'),
            minimumResultsForSearch: Infinity,
            dropdownParent: $guest_select.closest('.input-group').find('.select-wrapper')
        });
        $guest_select.val(null).trigger('change');
        $('#step1 .date').css({opacity: 0, 'pointer-events': 'none'});
        $('#step1 .time').css({opacity: 0, 'pointer-events': 'none'});
        $('#step1 .go-next').addClass('disabled');
    }
});
// 選擇&人數時
$('#step1 .guests select').on('select2:select', function (e) {
    var enableDays = [];
    var dateSite = [];
    
    if($('.type select').val() !== '' && $('.guests select').val() !== '') {
        // blockUI
        $.blockUI({message: null});

        // disable go next
        allowNext = false;
        $('#step1 .go-next').addClass('disabled');

        // set date
        booking_date.val('');
        booking_date.datepicker("destroy");
        $.get('/lebaldeparis/GetAjaxData',{
            'act': 'getBypople',
            'ticketType': $('.type select').val(),
            'pople': $('.guests select').val()
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
                $('#ui-datepicker-div').appendTo('.calender-wrapper');
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

            $('#step1 .date').css({opacity: 1, 'pointer-events': 'inherit'});
        },'json');

        // hide time
        $('#step1 .time').css({opacity: 0, 'pointer-events': 'none'});
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
        $('#step1 .go-next').addClass('disabled');

        // show time
        $.get('/lebaldeparis/GetAjaxData',{
            'act': 'getBydartpart',
            'ticketType': $('.type select').val(),
            'day':$('#booking_date').val(),
            'pople': $('.guests select').val()
        },function(data){
            $.unblockUI();
            var returndata = data;
            data = data.map(function(item){
                return {
                    id: item.id,
                    text: item.rang_start.substring(0,5) + ' - ' + item.rang_end.substring(0,5) + ' 剩餘' + item.sites + '位'
                }
            });

            var $time_select = $('#step1 .time select');
            $time_select.empty();
            $time_select.select2({
                data: data,
                placeholder: $time_select.data('placeholder'),
                minimumResultsForSearch: Infinity,
                dropdownParent: $time_select.closest('.input-group').find('.select-wrapper')
            });
            $time_select.val(null).trigger('change');

            $('#step1 .time').css({opacity: 1, 'pointer-events': 'inherit'});
            // 寫出價格
            returndata.forEach((row) => {
                $('select[name=booking_time] option[value='+row.id+']').data('p1',row.p1);
                $('select[name=booking_time] option[value='+row.id+']').data('p2',row.p2);
                $('select[name=booking_time] option[value='+row.id+']').data('p4',row.p4);
            });


        },'json');
    }
});

// 選擇時段
$('#step1 .time select').on('select2:select', function (e) {
    if($(this).val() != '') {
        // allow go next
        allowNext = true;
        $('#step1 .go-next').removeClass('disabled');
    }
});

$('#step1 .go-next').on('click', function (e) {
    if(allowNext) {
        $('#step1').hide();
        $('#step2').show();
        allowNext = false;
        window.scrollTo(0, 0);

        // // 手機國碼
        // var data = PHONE_CODE.map()
        // var $select = $('#step2 select.code');
        // $select.empty();
        // $select.select2({
        //     data: data,
        //     placeholder: $select.data('placeholder'),
        //     minimumResultsForSearch: Infinity,
        //     dropdownParent: $select.closest('.input-group').find('.select-wrapper')
        // });
        // $select.val('0').trigger('change');

        // 體驗語言人數
        $('#step2 select.lang_zh, #step2 select.lang_en').each(function () {
            $select = $(this);

            var maxVal = $('#step1 .guests select').val();
            // 實際人數
            if($('.type select').val() == '雙人共舞票'){
                maxVal = maxVal * 2;
            } else if($('.type select').val() == '四人群舞票'){
                maxVal = maxVal * 4;
            }
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
    }
});
// ============================== #step1 - END


// ============================== #step2 - START

// 手機國碼
var data = PHONE_CODE.map(function(item){
    return {
        id: item.phoneCode,
        text: item.phoneCode + ' ' + item.countryNameTw
        // text: item.countryNameTw + '(' + item.phoneCode + ')'
    }
});
var $select = $('#step2 select.code');
$select.empty();
$select.select2({
    data: data,
    placeholder: $select.data('placeholder'),
    minimumResultsForSearch: Infinity,
    dropdownParent: $select.closest('.input-group').find('.select-wrapper')
});
$select.val('+886').trigger('change');

function checkStep2Field() {
    allowNext = true;
    $('#step2 .error').remove();

    // 檢查必填
    $('#step2 input[type=text].required').each(function () {
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
    var phone = $('#step2 input.phone').val();
    if( phone !== '' && !/^09\d{8}$/.test(phone) ) {
        var $inputGroup = $('#step2 input.phone').closest('.input-group');
        if($inputGroup.find('.error').length === 0) {
            $inputGroup.append('<div class="error">手機格式錯誤</div>');
        } else {
            $inputGroup.find('.error').text('手機格式錯誤');
        }
        allowNext = false;
    }

    // 檢查Email格式
    var email = $('#step2 input.email').val();
    if( email !== '' && !/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/.test(email) ) {
        var $inputGroup = $('#step2 input.email').closest('.input-group');
        if($inputGroup.find('.error').length === 0) {
            $inputGroup.append('<div class="error">Email格式錯誤</div>');
        } else {
            $inputGroup.find('.error').text('Email格式錯誤');
        }
        allowNext = false;
    }

    // 檢查統編格式
    var tax = $('#step2 input.tax').val();
    if( tax !== '' && !/^[0-9]*$/.test(tax) ) {
        var $inputGroup = $('#step2 input.tax').closest('.input-group');
        if($inputGroup.find('.error').length === 0) {
            $inputGroup.append('<div class="error">統一編號格式錯誤</div>');
        } else {
            $inputGroup.find('.error').text('統一編號格式錯誤');
        }
        allowNext = false;
    }

    // // 檢查載具格式 
    // var invoices = $('#step2 input.invoices').val();
    // if( invoices !== '' && !/^[a-zA-Z0-9]*$/.test(invoices) ) {
    //     var $inputGroup = $('#step2 input.invoices').closest('.input-group');
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

$('#step2 input[type=checkbox]').on('change', function() {
    var disable = false;
    $('#step2 input[type=checkbox]').each(function(){
        if(!$(this).is(":checked")) {
            disable = true;
        }
    });
    if(disable) {
        $('#step2 .go-next').addClass('disabled');
    } else {
        $('#step2 .go-next').removeClass('disabled');
    }
});

$('#step2 .go-next').on('click', function(){
    if( !$(this).hasClass('disabled') ) {
        checkStep2Field();

        if(allowNext) {
            setStep3Contents();

            $('#step2').hide();
            $('#step3').show();
            window.scrollTo(0, 0);
        }
    }
});

$('#step2 .go-prev').on('click', function(){
    $('#step2').hide();
    $('#step1').show();
    allowNext = true;
});

// 折扣碼
$('#discount').bind('blur',function(){
    $.blockUI({message: null});
    var disVal = $(this).val().trim().toUpperCase();
    $.post('/lebaldeparis/PostAjaxData',{
        'act':'CheckParisDiscount',
        'ticket': $('.type select').val(),
        'num': $('#booking_time').val(),
        'code':disVal
    },function(data){
        if(data.success == 'Y'){
            discount_code = disVal;
            discount_money = data.money;
            $('.discount_note').html('折扣碼' + discount_code + ' 折扣 ' + discount_money + '<a href="javascript:;" class="arm"></a>');
            $('#discount').attr('readonly',true);
        } else {
            $('.discount_note').html(data.message);
        }
        $.unblockUI();
    },'json');
});
$('.discount_note').on('click','.arm',function(){
    discount_code = '';
    discount_money = 0;
    $('#discount').val('');
    $('.discount_note').html('');
    $('#discount').attr('readonly',false);
});
// 禮物卡
$('#gift').bind('blur',function(){
    $.blockUI({message: null});
    var disVal = $(this).val().trim().toUpperCase();
    $.post('/lebaldeparis/PostAjaxData',{
        'act': 'CheckParisCoupon',
        'ticket': $('.type select').val(),
        'num': $('#booking_time').val(),
        'code': disVal
    },function(data){
        if(data.success == 'Y'){
            coupon_code = disVal;
            coupon_money = data.money;
            $('.gift_note').html('禮物卡' + coupon_code + ' 抵用 ' + coupon_money + '<a href="javascript:;" class="arm"></a>');
            $('#gift').attr('readonly',true);
        } else {
            $('.gift_note').html(data.message);
        }
        $.unblockUI();
    },'json');
});
$('.gift_note').on('click','.arm',function(){
    discount_code = '';
    discount_money = 0;
    $('#gift').val('');
    $('.gift_note').html('');
    $('#gift').attr('readonly',false);
});
// ============================== #step2 - END
$('.submitForm').bind('click',function(){
    $('#booking_form').attr('action','/lebaldeparis/Neweb.OrderPay');
    $('#booking_form').submit();
});
function setStep3Contents() {
    $('#step2 input, #step2 select, #step2 textarea').each(function (idx) {
        var val = $(this).val();
        if( $(this)[0].nodeName.toLowerCase() == 'textarea' ) {
            val = val.replace(/\n/g, "<br />");
            $('#step3 .filed-value').eq(idx).html(val);
        } else {
            $('#step3 .filed-value').eq(idx).text(val);
        }
    });
    if($('.type select').val() == '雙人共舞票'){
        money = parseInt($('select[name=booking_time] option:selected').data('p2')) * parseInt($('.guests select').val());
    } else if($('.type select').val() == '四人群舞票'){
        money = parseInt($('select[name=booking_time] option:selected').data('p4')) * parseInt($('.guests select').val());
    } else {
        money = parseInt($('select[name=booking_time] option:selected').data('p1')) * parseInt($('.guests select').val());
    }
    money = formatPrice(money - discount_money - coupon_money);
    $('div.ticket > table > tbody > tr:nth-child(1) > td:nth-child(2)').text($('.type select').val());
    $('div.ticket > table > tbody > tr:nth-child(2) > td:nth-child(2)').text($('.guests select').val());
    $('div.ticket > table > tbody > tr:nth-child(3) > td:nth-child(2)').text($('#booking_date').val());
    $('div.ticket > table > tbody > tr:nth-child(4) > td:nth-child(2)').text($('#booking_time').text().substr(0, 13));
    $('div.ticket > table > tbody > tr:nth-child(5) > td:nth-child(2)').text(money+' 元');
    $('.submitForm').text('前往付款 '+money+' 元');
    if(discount_money>0){
        $('div.discount').text('已折扣'+discount_money+'元');
    } else {
        $('div.discount').text('');
    }
    if(discount_money>0){
        $('div.gift').text('已抵用'+coupon_money+'元');
    } else {
        $('div.gift').text('');
    }
}

$('#step3 .go-prev').on('click', function(){
    $('#step3').hide();
    $('#step2').show();
    allowNext = true;
});
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


// ========================== # booking leading
function onFormSubmit() {
    $.blockUI();
    var code = $('#leading .invite-code input').val();
    $('#leading .error').removeClass('show');

    if( code == '' ) {
        $('#leading .error').addClass('show');
        
    } else {

        if(code == 'BEMYGUEST' || code == 'JUSTDANCE'){
            $('#leading').hide();
            $('#notice').show();
            $('html,body').animate({scrollTop: 0}, 300);
        } else {
            $('#leading .error').addClass('show');
        }
        
    }
    $.unblockUI();
    return false;
}

// ========================= # booking notice
$('.notice-btn').bind('click',function(){
    $.blockUI();
    $('#notice').hide();
    $('#booking').show();
    $('html,body').animate({scrollTop: 0}, 300);
    $.unblockUI();
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