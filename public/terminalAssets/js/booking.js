$(function() {
    let $step1_scenes = $('#step1');
    let $step2_scenes = $('#step2');
    let $step3_scenes = $('#step3');
    let $step4_scenes = $('#step4');
    /* 不是 tappay
    let $step_success_scenes = $('#booking_success');
    let $step_fail_scenes = $('#booking_fail');
    */
    let $btn_next1 = $('#js-next-btn1');
    let $btn_prev2 = $('#js-prev-btn2');
    let $btn_next2 = $('#js-next-btn2');
    let $btn_prev3 = $('#js-prev-btn3');
    let $btn_next3 = $('#js-next-btn3');
    let $btn_prev4 = $('#js-prev-btn4');
    let $btn_next4 = $('#js-next-btn4');
    let $s2_tr = $('#selected-ticket-tr');
    let $dropdown = $('.js-dropdown');
    let $dropdown_items = $dropdown.find('.dropdown-item');
    
    let $dropdown_ticket = $('#dropdownMenuButtonTicket');
    let $dropdown_count = $('#dropdownMenuButtonCount');
    let maxDateVal = "2023-09-30";//"+3m";
    var usedCoupons = [];

    let $ticket_value = '';
    let $people_value = 0;
    let $pro_train = 0;
    let $pro_flight = 0;
    let $pro_boat = 0;

    let singleMoney = 0;
    let discountCode = '';
    let discountAmount = 0;
/*
    let flag_ticket = false;
    let flag_count = false;

    let next_page = 'booking_datetime.html';
*/
    $dropdown_items.each(function(index){
        $(this).on('click', function(){
            let $dropdown_active_item = $(this).parents('.js-dropdown').find('.dropdown-toggle');
            $dropdown_active_item.text($(this).text());
            $dropdown_active_item.removeClass('no-value');
        });
    });



    // 票券
    $dropdown_ticket.bind('hide.bs.dropdown', function () {
        let val = $(this).text();
        let max = 0;
        switch(val.trim()){
            case '微醺列車': max = 24; $ticket_value = 'train'; break;
            case 'FLIGHT': max = 30; $ticket_value = 'flight'; break;
            case 'Boat for ONE': max = 1; $ticket_value = 'boat'; break;
            case '套票：車票+飛機票': max = 24; $ticket_value = 'A'; break;
            case '套票B：車票+飛機票+船票': max = 1; $ticket_value = 'B'; break;
        }
        if(max>0){
            $dropdown_count.prop('disabled',false);
            let html = '';
            for(i=1;i<=max;i++){
                html += '<li class="dropdown-item body-04">'+i+' 人</li>';
            }
            $('ul[aria-labelledby=dropdownMenuButtonCount]').html(html);
            $dropdown_count.text('選擇人數');
            $people_value = 0;
        } else {
            $dropdown_count.prop('disabled',true);
            $ticket_value = '';
        }
        controlStep2Button();
    });

    // 人數
    $dropdown_count.parent().on('click','ul li',function(){
        let val = $(this).text();
        $dropdown_count.text(val);
        $people_value = val.replace('人','').trim();
        controlStep2Button();
    });

    // control next button disabled
    function controlStep2Button() {
        if ( $people_value>0 && $ticket_value!='' ) {
            $btn_next1.removeClass('status-disabled');
        } else {
            $btn_next1.addClass('status-disabled');
        }
    }
    // go step 2 button
    $btn_next1.on('click', function(){
        // enabled
        if ( !$(this).hasClass('status-disabled') ) { 
            let train_date_enble = false;
            let flight_date_enble = false;
            let boat_date_enble = false;
            $s2_tr.find('td').html('');
            switch($ticket_value){
                case 'train': 
                    $s2_tr.removeClass('tr-bg-light');
                    $s2_tr.removeClass('tr-bg-dark');
                    $s2_tr.find('.name').text('微醺列車');
                    $s2_tr.find('.name').removeClass('name-en').addClass('name-ch');
                    $s2_tr.find('.item-price').text('$1,250');
                    $s2_tr.find('.item-origin-price').text('');
                    $s2_tr.find('td').eq(0).html('<i class="icon-step-done"></i>');
                    singleMoney = 1250;
                    train_date_enble = true;
                break;
                case 'flight':
                    $s2_tr.removeClass('tr-bg-light');
                    $s2_tr.removeClass('tr-bg-dark');
                    $s2_tr.find('.name').text('FLIGHT');
                    $s2_tr.find('.name').removeClass('name-ch').addClass('name-en');
                    $s2_tr.find('.item-price').text('$500');
                    $s2_tr.find('.item-origin-price').text('');
                    $s2_tr.find('td').eq(1).html('<i class="icon-step-done"></i>');
                    singleMoney = 500;
                    flight_date_enble = true;
                break;
                case 'boat':
                    $s2_tr.removeClass('tr-bg-light');
                    $s2_tr.removeClass('tr-bg-dark');
                    $s2_tr.find('.name').text('Boat for ONE');
                    $s2_tr.find('.name').removeClass('name-ch').addClass('name-en');
                    $s2_tr.find('.item-price').text('$800');
                    $s2_tr.find('.item-origin-price').text('');
                    $s2_tr.find('td').eq(2).html('<i class="icon-step-done"></i>');
                    singleMoney = 800;
                    boat_date_enble = true;
                break;
                case 'A':
                    $s2_tr.removeClass('tr-bg-dark');
                    $s2_tr.addClass('tr-bg-light');
                    $s2_tr.find('.name').text('套票');
                    $s2_tr.find('.name').removeClass('name-en').addClass('name-ch');
                    $s2_tr.find('.item-price').text('$1,650');
                    $s2_tr.find('.item-origin-price').text('原價 $ 1,750');
                    $s2_tr.find('td').eq(0).html('<i class="icon-step-done"></i>');
                    $s2_tr.find('td').eq(1).html('<i class="icon-step-done"></i>');
                    singleMoney = 1650;
                    train_date_enble = true;
                    flight_date_enble = true;
                break;
                case 'B':
                    $s2_tr.removeClass('tr-bg-light');
                    $s2_tr.addClass('tr-bg-dark');
                    $s2_tr.find('.name').text('套票B');
                    $s2_tr.find('.name').removeClass('name-en').addClass('name-ch');
                    $s2_tr.find('.item-price').text('$2,400');
                    $s2_tr.find('.item-origin-price').text('原價 $ 2,550');
                    $s2_tr.find('td').html('<i class="icon-step-done"></i>');
                    singleMoney = 2400;
                    train_date_enble = true;
                    flight_date_enble = true;
                    boat_date_enble = true;
                break;
            }
            $('.form-wrap-step-2 fieldset').hide(); // 整個日期選項
            $('.dropdown-time').hide(); // dropdown 選項
            $('.notice-item-area').hide(); // 最後的時間顯示
            // 讀取可選場次
            if(train_date_enble){
                let booking_date = $("#js-datepicker-train");
                $('.from-block-train,.notice-item-train').show();
                createDatepicker(booking_date,'train');
            }
            if(flight_date_enble){
                let booking_date = $("#js-datepicker-flight");
                $('.from-block-flight,.notice-item-flight').show();
                createDatepicker(booking_date,'flight');
            }
            if(boat_date_enble){
                let booking_date = $("#js-datepicker-boat");
                $('.from-block-boat,.notice-item-boat').show();
                createDatepicker(booking_date,'boat');
            }
            $step1_scenes.hide();
            $step2_scenes.show();
            $("html,body").animate({scrollTop: 0}, 300);
        } else {
            $(this).addClass('status-disabled');
        }
    });
    function createDatepicker(item,type){
        let booking_date = item;
        let enableDays = [];
        if(!isNaN($people_value)){
            $.blockUI();
            $.get('/terminal/GetAjaxData',{
                'act':'getBypople',
                'pople':$people_value,
                'ticketType': type,
            },function(data){
                for(i=0;i<data.length;i++){ enableDays.push(data[i].day); }
                var minD = 0;
                if(enableDays.length>0){ minD = enableDays[0]; }
                booking_date.datepicker("destroy");
                booking_date.datepicker({
                    minDate: minD,
                    maxDate: maxDateVal,
                    dateFormat: 'yy-mm-dd', 
                    beforeShowDay: function(date){
                        var sdate = $.datepicker.formatDate( 'yy-mm-dd', date);
                        var allowSelected = false;
                        var className = '';
                        if($.inArray(sdate, enableDays) !== -1) {
                            allowSelected = true;
                        }
                        // if(type == 'train' || type == 'flight') {
                        //     var startDate = 20230922;
                        //     var endDate = 20231015;
                        //     var formatedDate = parseInt($.datepicker.formatDate( 'yymmdd', date));
                        //     if (formatedDate == startDate) {
                        //         className = 'have-bg have-bg-start';
                        //     } else if (formatedDate > startDate && formatedDate < endDate) {
                        //         className = 'have-bg';
                        //     } else if (formatedDate == endDate) {
                        //         className = 'have-bg have-bg-end';
                        //     }
                        // }
                        return [allowSelected, className];
                    },
                    beforeShow: function (input, inst) {
                        let $top = $(this).offset().top + $(this).outerHeight() + 6;
                        setTimeout(function () {inst.dpDiv.css({top: $top});}, 0);
                    },
                    onSelect: function(date, inst){
                        $.get('/terminal/GetAjaxData',{
                            'act':'getByday',
                            'ticketType': type,
                            'day':date,
                            'pople':$people_value,
                        },function(obj){
                            if(obj.length>0){
                                let html = '';
                                for(i=0;i<obj.length;i++){ html += '<li class="dropdown-item body-04">'+obj[i].day_parts+'</li>'; }
                                $('ul[aria-labelledby=dropdownMenuButtonPeriod-'+type+']').html(html);
                                $('.dropdownMenuButtonPeriod-'+type).text('選擇時段');
                                $('.dropdown-datepart-'+type).show();
                                $('.dropdown-time-'+type).hide();
                                if(type == 'train'){ $pro_train = 0; }
                                if(type == 'flight'){ $pro_flight = 0; }
                                if(type == 'boat'){ $pro_boat = 0; }
                                controlStep3Button();
                            } else {
                                alert("此日期座位不足喔!!\n請再重新選擇日期!");
                                return false;
                            }
                        },'json');
                    }
                });
                $.unblockUI();
            },'json');
        }
    }

    // step 2
    $('#dropdownMenuButtonPeriod-train').parent().on('click','ul li',function(){
        let val = $(this).text();
        $('#dropdownMenuButtonPeriod-train').text(val);
        $pro_train = 0;
        getActivateId('train');
    });
    $('#dropdownMenuButtonPeriod-flight').parent().on('click','ul li',function(){
        let val = $(this).text();
        $('#dropdownMenuButtonPeriod-flight').text(val);
        $pro_flight = 0;
        getActivateId('flight');
    });
    $('#dropdownMenuButtonPeriod-boat').parent().on('click','ul li',function(){
        let val = $(this).text();
        $('#dropdownMenuButtonPeriod-boat').text(val);
        $pro_boat = 0;
        getActivateId('boat');
    });
    function getActivateId(type){
        $.get('/terminal/GetAjaxData',{
            'act':'getBydartpart',
            'ticketType': type,
            'day': $('#js-datepicker-'+type).val(),
            'day_parts': $('#dropdownMenuButtonPeriod-'+type).text(),
            'pople': $people_value,
        },function(obj){
            if(obj.length>0){
                let html = '';
                for(i=0;i<obj.length;i++){ 
                    var range = obj[i].rang_start.substring(0,5) + ' - ' + obj[i].rang_end.substring(0,5) + ' 剩餘'+obj[i].sites+'位'
                    html += '<li class="dropdown-item body-04" data-id="'+obj[i].id+'">'+range+'</li>'; 
                }
                $('ul[aria-labelledby=dropdownMenuButtonTime-'+type+']').html(html);
                $('#dropdownMenuButtonTime-'+type).text('選擇時間');
                $('.dropdown-time-'+type).show();
                controlStep3Button();
            }
        },'json');
    }
    $('#dropdownMenuButtonTime-train').parent().on('click','ul li',function(){
        let val = $(this).text();
        $('#dropdownMenuButtonTime-train').text(val);
        $pro_train = $(this).data('id');
        $('.notice-item-train').find('.list-item').eq(0).text('日期 '+$("#js-datepicker-train").val());
        $('.notice-item-train').find('.list-item').eq(1).text('時段 '+val.substr(0,13));
        controlStep3Button();
    });
    $('#dropdownMenuButtonTime-flight').parent().on('click','ul li',function(){
        let val = $(this).text();
        $('#dropdownMenuButtonTime-flight').text(val);
        $pro_flight = $(this).data('id');
        $('.notice-item-flight').find('.list-item').eq(0).text('日期 '+$("#js-datepicker-flight").val());
        $('.notice-item-flight').find('.list-item').eq(1).text('時段 '+val.substr(0,13));
        controlStep3Button();
    });
    $('#dropdownMenuButtonTime-boat').parent().on('click','ul li',function(){
        let val = $(this).text();
        $('#dropdownMenuButtonTime-boat').text(val);
        $pro_boat = $(this).data('id');
        $('.notice-item-boat').find('.list-item').eq(0).text('日期 '+$("#js-datepicker-boat").val());
        $('.notice-item-boat').find('.list-item').eq(1).text('時段 '+val.substr(0,13));
        controlStep3Button();
    });
    // control next button disabled
    function controlStep3Button() {
        if (
            (($('.from-block-train').is(":visible") && $pro_train>0) || $('.from-block-train').is(":hidden")) &&
            (($('.from-block-flight').is(":visible") && $pro_flight>0) || $('.from-block-flight').is(":hidden")) &&
            (($('.from-block-boat').is(":visible") && $pro_boat>0) || $('.from-block-boat').is(":hidden"))
        ) {
            $btn_next2.removeClass('status-disabled');
        } else {
            $btn_next2.addClass('status-disabled');
        }
    }
    // back to step 1
    $btn_prev2.on('click', function(){
        $step2_scenes.hide();
        $step1_scenes.show();
    });
    // go step 3 button
    $btn_next2.on('click', function(){
        // enabled
        if ( !$(this).hasClass('status-disabled') ) { 
            $step2_scenes.hide();
            $step3_scenes.show();
            $("html,body").animate({scrollTop: 0}, 300);
        } else {
            $(this).addClass('status-disabled');
        }
    });


    // step 3
    // Only number
    $('#telephone').bind('keyup paste', function(){
        this.value = this.value.replace(/[^0-9\+\-\ ]/g, '');
    });
    let $input_name = $('#name');
    let $input_tel = $('#telephone');
    let $input_email = $('#email');
    let $checkbox_agree_rules = $('#agree-rules');
    let $checkbox_agree_privacy = $('#agree-privacy');

    let flag_name = false;
    let flag_tel = false;
    let flag_email = false;
    let flag_agree_rules = false;
    let flag_agree_privacy = false;

    let format_flag_tel = false;
    let format_flag_email = false;

    let tel_rule = /^\d+$/;
    // /^09\d{8}$/;
    let email_rule = /^(\w|\.|\-)+@(\w|\.|\-)+\.(\w|\.|\-)+$/;


    // control next button disabled
    function controlButton() {
        if ( flag_name && flag_tel && flag_email && flag_agree_rules && flag_agree_privacy ) {
            $btn_next3.removeClass('status-disabled');
        } else {
            $btn_next3.addClass('status-disabled');
        }
    }

    // verify input
    function verifyInput() {
        flag_name = $input_name.val().length == 0 ? false : true;
        flag_tel = $input_tel.val().length == 0 ? false : true;
        flag_email = $input_email.val().length == 0 ? false : true;
        controlButton();
    }

    // verify checkbox
    function verifyCheckbox() {
        flag_agree_rules = $checkbox_agree_rules.prop('checked');
        flag_agree_privacy = $checkbox_agree_privacy.prop('checked');
        controlButton();
    }


    // verify input
    $('input[type="text"]').on('input', function(){
        verifyInput();
    });

    // verify checkbox
    $('input[type="checkbox"]').parents('.form-group').on('click', function(){
        verifyCheckbox();
    });

    // go step 4 button
    $btn_next3.on('click', function(){
        
        if ( !$(this).hasClass('status-disabled') ) {
            
            // verify format
            format_flag_tel = tel_rule.test($input_tel.val());
            format_flag_email = email_rule.test($input_email.val());

            if ( format_flag_tel ) {
                $input_tel.parents('.form-group').removeClass('error-style');
            } else {
                $input_tel.parents('.form-group').addClass('error-style');
            }

            if ( format_flag_email ) {
                $input_email.parents('.form-group').removeClass('error-style');
            } else {
                $input_email.parents('.form-group').addClass('error-style');
            }

            // enabled
            if ( format_flag_tel && format_flag_email ) {
                $(this).removeClass('status-disabled');
                $('#filled-name').text($input_name.val());
                $('#filled-telephone').text($input_tel.val());
                $('#filled-email').text($input_email.val());
                $('#filled-remark').text($('#remark').val());
                $('.filled-people').text($('#dropdownMenuButtonCount').text());
                $('#js-next-btn4').html("前往購買<br>$"+($people_value * singleMoney));
                $step3_scenes.hide();
                $step4_scenes.show();
                $("html,body").animate({scrollTop: 0}, 300);
            } else {
                $(this).addClass('status-disabled');
            }
        }
    });

    /* init */
    verifyInput();
    verifyCheckbox();

    // back to step 2
    $btn_prev3.on('click', function(){
        $step3_scenes.hide();
        $step2_scenes.show();
    });

    // step 4
    $('.verification-code').on('click', function () {
        var coupon = $('input[name="coupon"]');
        var couponVal = coupon.val(); // 取得用戶輸入的票券代碼
        // 清除空白並驗證
        couponVal = couponVal.trim();
        couponVal = couponVal.toUpperCase();
        if(discountCode == ''){
            if(($people_value - usedCoupons.length) * singleMoney <= 0){
                $('.not-found').html('已不需要折扣' );
                $('.not-found').addClass('active');
                return false;
            }
            $.get('/terminal/GetAjaxData',{
                'act':'CheckDiscount',
                'code':couponVal,
                'pople':$people_value,
                'ticketType':$ticket_value,
                'useType': 'pay',
                'coupon':usedCoupons
            },function(data){
                if(data.success == 'Y' && data.discount == 'Y'){
                    if(usedCoupons.length > 0){
                        $('.not-found').html('已使用禮物卡無法使用折扣碼' );
                        $('.not-found').addClass('active');
                        return false;
                    }
                    discountCode = couponVal;
                    discountAmount = data.money;
                    $('.use-discount').html('折扣碼' + discountCode + ' 折抵 ' + discountAmount );
                    $('.use-discount').addClass('active');
                    $('.verify-layout').removeClass('error-style');
                    $('.not-found').removeClass('active');

                    // $('#discount').val(discountCode);
                    $('.verification-code').addClass('status-disabled');
                    $('input[name=coupon]').prop('readonly',true);
                    $('#js-next-btn4').html("前往購買<br>$"+($people_value * singleMoney - discountAmount));
                } else if(data.success == 'Y' && data.discount == 'N'){
                    usedCoupons.push(couponVal);
                    $('.use-discount').append('折扣碼' + couponVal + ' 折抵 ' + data.money + '<br>');
                    $('.use-discount').addClass('active');
                    $('.verify-layout').removeClass('error-style');
                    $('.not-found').removeClass('active');
                    $('#js-next-btn4').html("前往購買<br>$"+(($people_value - usedCoupons.length) * singleMoney));

                } else {
                    $('.verify-layout').addClass('error-style');
                     
                    $('.not-found').html('找不到此筆折扣序號' );
                    $('.not-found').addClass('active');
                }
            },'json');
            coupon.val('');
            return false;
        } else {
            // alert('折扣碼錯誤或多次輸入!');
            $('.not-found').html('折扣碼限用一組' );
            $('.not-found').addClass('active');
            return false;
        }
        
        return false;
    });

    // back to step 3
    $btn_prev4.on('click', function(){
        $step4_scenes.hide();
        $step3_scenes.show();
    });
    // 去結帳
    $btn_next4.on('click', function(){
        $.blockUI();
        $('input[name=train]').val($pro_train);
        $('input[name=flight]').val($pro_flight);
        $('input[name=boat]').val($pro_boat);
        $('input[name=booking_people]').val($people_value);
        $('input[name=ticket_type]').val($ticket_value);
        $('input[name=discount]').val(discountCode);
        $.each( usedCoupons, function( key, val ) {
            $('#final-form').append('<input type="hidden" name="coupon[]" value="'+val+'" />');
        });
        
        $('#final-form').submit();
    });
});

