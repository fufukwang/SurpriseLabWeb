$(document).ready(function () {
    
    // 售票進度 API
    var progress_api_SaleStep1 = 'https://surpriselab.backme.tw/api/projects/1397json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep2 = 'https://surpriselab.backme.tw/api/projects/1444json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep3 = 'https://surpriselab.backme.tw/api/projects/1493json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep4 = 'https://surpriselab.backme.tw/api/projects/1559json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep5 = 'https://surpriselab.backme.tw/api/projects/1592json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep6 = 'https://surpriselab.backme.tw/api/projects/1681json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep7 = 'https://surpriselab.backme.tw/api/projects/1821json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep8 = 'https://surpriselab.backme.tw/api/projects/1987json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep9 = 'https://surpriselab.backme.tw/api/projects/2143json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep10 = 'https://surpriselab.backme.tw/api/projects/2245json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep11 = 'https://surpriselab.backme.tw/api/projects/2265json?token=15171aa66ababafd4464a1c194b66102';
    var progress_api_SaleStep12 = 'https://surpriselab.backme.tw/api/projects/2296json?token=15171aa66ababafd4464a1c194b66102';

    //$.getJSON(progress_api_SaleStep5, function (data) {
    
    $.when(
      $.getJSON(progress_api_SaleStep9),
      $.getJSON(progress_api_SaleStep12)
    ).done(function(data1, data12) {

        // data1 = data1[0];
        var data = data12[0];

        // 階段總人數
        // var SaleStep1_amount = data1['pledged_unit_count'];
        /*
        // 第一階段已售出總票數
        var SaleStep1_amount = data1['pledged_count'];
        var SaleStep2_amount = data2['pledged_count'];
        var SaleStep3_amount = data3['pledged_count'];
        var SaleStep4_amount = data4['pledged_count'];
        var SaleStep5_amount = data5['pledged_count'];
        var SaleStep6_amount = data6['pledged_count'];
        */
        /*
        // 售出的總人數(API有提供不用自己算了)
        var item1_amount = data['rewards'][0].pledged_count;
        var item2_amount = data['rewards'][1].pledged_count * 2;
        var item3_amount = data['rewards'][2].pledged_count * 6;
        */
        var before = 18700; // 之前的總票數
        var goal = before + 830;//2750; // 目標張數 /* SaleStep1_amount + 1500 */
        //var amount = data["pledged_count"] /*+ SaleStep1_amount + SaleStep2_amount + SaleStep3_amount + SaleStep4_amount + SaleStep5_amount + SaleStep6_amount*/; //已售出總票數
        //var amount = item1_amount + item2_amount + item3_amount;
        var amount = data["pledged_unit_count"];
        var sale_progress = (before + amount) / goal * 100; // 募款進度
        var rest_tickets = goal - before - amount; // 剩餘可銷售票數

        // 售票進度最小整數
        sale_progress = Math.floor(sale_progress);
        // 測試用
        //sale_progress = 50;

        // 雙人共享票
        var ticket_matinee = $('.type-great-tipsy');
        var timeLimit_sale = data['rewards'][3].pledged_count; // 已銷售張數
        var timeLimit_limit = data['rewards'][3].quantity_limit; // 限量張數
        var timeLimit_wait = data['rewards'][3].wait_pledged_count; // 等待付款中張數
        var timeLimit_rest = timeLimit_limit - timeLimit_sale - timeLimit_wait; // 剩餘可銷售張數
        
        //timeLimit_rest = 0;  // 歸零
        
        if (timeLimit_rest <= 0) {
            //timeLimit_rest = 0;
            ticket_matinee.addClass('sold');
            ticket_matinee.find('.img-fluid.d-sm-block').attr('src', 'img/tickets/ticket_face_2_soldout.png?v=0.5');
            ticket_matinee.find('.img-fluid.d-sm-none').attr('src', 'img/tickets/ticket_face_2_soldout_mobile.png?v=0.5');
            ticket_matinee.find('.ticket-state').html('已售完');
        }

        var timeLimit = $('.timeLimit');
        timeLimit.find('.total-ticket').html(timeLimit_limit); // 更新時間有點限制票限量張數
        timeLimit.find('.rest-ticket').html(timeLimit_rest); // 更新時間有點限制票剩餘可銷售張數
        timeLimit.fadeTo(300, 1);


        // 六人共享票 票銷售完之後改顯示sold out圖
        var ticket_group = $('.type-group');
        var groupTicket_sale = data['rewards'][4].pledged_count; // 已銷售張數
        var groupTicket_limit = data['rewards'][4].quantity_limit; // 限量張數
        var groupTicket_wait = data['rewards'][4].wait_pledged_count; // 等待付款中張數
        var groupTicket_rest = groupTicket_limit - groupTicket_sale - groupTicket_wait; // 剩餘可銷售張數
        
        //groupTicket_rest = 0;  // 歸零
        
        if (groupTicket_rest <= 0) {
            ticket_group.addClass('sold');
            ticket_group.find('.img-fluid.d-sm-block').attr('src', 'img/tickets/ticket_face_3_soldout.png?v=0.5');
            ticket_group.find('.img-fluid.d-sm-none').attr('src', 'img/tickets/ticket_face_3_soldout_mobile.png?v=0.5');
            ticket_group.find('.ticket-state').html('已售完');
        }

        
        var sixShare = $('.sixShare');
        sixShare.find('.total-ticket').html(groupTicket_limit); // 更新時間有點限制票限量張數
        sixShare.find('.rest-ticket').html(groupTicket_rest); // 更新時間有點限制票剩餘可銷售張數
        sixShare.fadeTo(300, 1);

        var sale_info = $('.sale-progress-info');
        sale_info.find('.total-sale').html((parseInt(amount) + parseInt(before))); // 更新總售出張數
        sale_info.find('.total-rest').html(rest_tickets); // 更新剩餘張數
        sale_info.find('.progress-percent').html(sale_progress); // 更新完成進度百分比

        // 百分比進度條
        var progress = $('.progress');
        var progress_counter = 0;

        var animate_progress = setInterval(function() {
            if (progress_counter > sale_progress || sale_progress === 0) {
                clearInterval(animate_progress);
            }
            progress.find('.progress-bar').css('width', progress_counter + '%');
            progress_counter++;
        }, 10);

        // if (sale_progress >= 80) {
        //     // 進度超過80％時，區塊上移
        //     $('.sec-ticket-status').addClass('up').appendTo('.sec-experience');

        //     if (sale_progress >= 100) {
        //         // 進度超過100％時，不顯示剩餘張數
        //         $('.over-2000').hide();
        //     }
        // }

        sale_info.fadeTo(300, 1);
        var timer = setInterval(function () {
            // 剩餘時間倒數器
            var Today = new Date();
            var EndDay = new Date(data.end_date);
            var distance = EndDay - Today;
            var time_rest = $('.time-rest');
            var days, hours, minutes, seconds;

            if (distance > 0) {

                days = Math.floor(distance / (1000 * 60 * 60 * 24));
                hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                seconds = Math.floor((distance % (1000 * 60)) / 1000);

                time_rest.find('.days').html(days);
                time_rest.find('.hours').html(hours);
                time_rest.find('.minutes').html(minutes);
                time_rest.find('.seconds').html(seconds);
            } else {
                // 第一階段售票時間結束時，售票狀況區塊上移，不顯示剩餘張數，不顯示倒數器，不顯示完成進度百分比
                // $('.sec-ticket-status').addClass('up').appendTo('.sec-experience');
                // $('.over-2000').hide();
                // $('.time-counter').remove();
                // $('.progress-percent-area').remove();
                // clearInterval(timer);
            }
        }, 1000);
    });

    // 當時間有點限制票售完時
    $('.type-item').on('click', function () {
        if ($(this).hasClass('sold')) {
            return false;
        }
    });

    // mobile hamburger button effect
    var body = $('body');
    var nav = $('.anchor-wrapper');
    var hamburger = $('.hamburger');
    var iconBar = $('.icon-bar');
    var currentMenu = $('.current-menu');
    var mobileCurrent = $('.current-section');

    hamburger.on('click', function () {
        var $el = $(this);
        var $el_offset = $el.offset().top;

        if (win.scrollTop() < $el_offset) {
            $('html, body').animate({
                scrollTop: $el_offset
            }, 0, function () {}).promise().done(function () {
                hanburgerTrigger()
            });
        } else {
            hanburgerTrigger()
        }

        function hanburgerTrigger() {
            if (!hamburger.hasClass('menu-open')) {
                hamburger.addClass('menu-open');
                iconBar.addClass('active');
                mobileCurrent.hide();
                currentMenu.fadeIn();
                nav.addClass('menu-open');
                body.addClass('menu-open');
            } else {
                hamburger.removeClass('menu-open');
                iconBar.removeClass('active');
                currentMenu.hide();
                mobileCurrent.fadeIn();
                nav.removeClass('menu-open');
                body.removeClass('menu-open');
            }
        }
    });

    nav.find('a').on('click', function () {
        setTimeout(function () {
            hamburger.removeClass('menu-open');
            iconBar.removeClass('active');
            currentMenu.hide();
            mobileCurrent.fadeIn();
            nav.removeClass('menu-open');
            body.removeClass('menu-open');
        }, 1000);
    });

    // remove mobile menu effect in PC
    $(window).resize(function () {
        if ($(window).width() >= 1024) {
            hamburger.removeClass('menu-open');
            iconBar.removeClass('active');
            currentMenu.hide();
            mobileCurrent.fadeIn();
            nav.removeClass('menu-open');
        }
    });

    /* Loading animation */
    document.body.classList.add('render');
    setTimeout(function(){
        // Image Loading
        imagesLoaded(document.body, function(){
            document.body.classList.remove('loading');
        })
    }, 1000);
});
