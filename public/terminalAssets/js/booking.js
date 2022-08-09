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
    let $btn_next5 = $('#js-next-btn4');
    let $s2_tr = $('#selected-ticket-tr');
    let $dropdown = $('.js-dropdown');
    let $dropdown_items = $dropdown.find('.dropdown-item');
    
    let $dropdown_ticket = $('#dropdownMenuButtonTicket');
    let $dropdown_count = $('#dropdownMenuButtonCount');
    let maxDateVal = "+3m";

    let $ticket_value = '';
    let $people_value = 0;
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
        switch(val){
            case '微醺列車': max = 6; $ticket_value = 'train'; break;
            case 'FLIGHT': max = 30; $ticket_value = 'flight'; break;
            case 'Boat for ONE': max = 1; $ticket_value = 'boat'; break;
            case '套票A：車票+飛機票': max = 6; $ticket_value = 'A'; break;
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
                    boat_date_enble = true;
                break;
                case 'A':
                    $s2_tr.removeClass('tr-bg-dark');
                    $s2_tr.addClass('tr-bg-light');
                    $s2_tr.find('.name').text('套票A');
                    $s2_tr.find('.name').removeClass('name-en').addClass('name-ch');
                    $s2_tr.find('.item-price').text('$1,650');
                    $s2_tr.find('.item-origin-price').text('原價 $ 1,750');
                    $s2_tr.find('td').eq(0).html('<i class="icon-step-done"></i>');
                    $s2_tr.find('td').eq(1).html('<i class="icon-step-done"></i>');
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
                    train_date_enble = true;
                    flight_date_enble = true;
                    boat_date_enble = true;
                break;
            }
            $('.form-wrap-step-2 fieldset').hide();
            // 讀取可選場次
            if(train_date_enble){
                let booking_date = $("#js-datepicker-train");
                createDatepicker(booking_date);
                $('.from-block-train').show();
            }
            if(flight_date_enble){
                let booking_date = $("#js-datepicker-flight");
                createDatepicker(booking_date);
                $('.from-block-flight').show();
            }
            if(boat_date_enble){
                let booking_date = $("#js-datepicker-boat");
                createDatepicker(booking_date);
                $('.from-block-boat').show();
            }




            $step1_scenes.hide();
            $step2_scenes.show();
            $("html,body").animate({scrollTop: 0}, 300);
        } else {
            $(this).addClass('status-disabled');
        }
    });
    function createDatepicker(item){
        let booking_date = item;
        let enableDays = [];
        if(!isNaN($people_value)){
            $.blockUI();
            $.get('/terminal/GetAjaxData',{
                'act':'getBypople',
                'pople':$people_value,
                'ticketType':$ticket_value,
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
                        if($.inArray(sdate, enableDays) !== -1) { return [true]; }
                        return [false];
                    },
                    beforeShow: function (input, inst) {
                        let $top = $(this).offset().top + $(this).outerHeight() + 6;
                        setTimeout(function () {inst.dpDiv.css({top: $top});}, 0);
                    },
                });
                $.unblockUI();
            },'json');
        }
    }


    // step 2


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
        } else {
            $(this).addClass('status-disabled');
        }
    });
    // step 3


    // back to step 2
    $btn_prev3.on('click', function(){
        $step3_scenes.hide();
        $step2_scenes.show();
    });
    // step 4


    // back to step 3
    $btn_prev4.on('click', function(){
        $step4_scenes.hide();
        $step3_scenes.show();
    });
});
