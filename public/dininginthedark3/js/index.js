$(document).ready(function () {

    // Anchor Smooth Scroll
    let win = $(window);

    let sections = $('.anchor-section');
    let nav = $('.anchor-wrapper');

    let header = $('.logo');
    let navHeight = header.outerHeight();
    let introHeight = $('#Intro').outerHeight();

    let social = $('.social-wrapper');
    let smoothScroll = $('.smoothScroll');
    let mobileCurrent = $('.current-section');

    // modal
    let $open_modal_btn = $('#js-open-btn');
    let $ticket_modal = $('#js-ticket-modal');
    let $close_modal_btn = $('#js-close-btn');

    // Full Page Scroll
    // https://github.com/lukehaas/scrollify
    $.scrollify({
        section : ".fixed-scroll-anchor",
        setHeights: false,
        sectionName: false,
        updateHash: false,
    });

    // To anchor
    let hash = window.location.hash;
    if (hash) {
        $.scrollify.disable();
        $('html, body').animate({
            scrollTop: $(hash).offset().top - navHeight
        }, 800, function () {
            $.scrollify.enable();
            history.replaceState(null, null, ' ');
        });
    }

    if (win.width() < 1200) {
        $.scrollify.destroy();
    }

    win.on('resize', function () {
        if (win.width() < 1200) {
            $.scrollify.destroy();
        } else {
            $.scrollify({
                section : ".fixed-scroll-anchor",
                setHeights: false,
                sectionName: false,
                updateHash: false,
            });
        }
    });

    win.on('scroll', function () {
        let curPos = $(this).scrollTop();

        sections.each(function () {
            let top = Math.floor($(this).offset().top) - navHeight;
            let bottom = top + Math.floor($(this).outerHeight());

            if (curPos >= top && curPos <= bottom) {
                nav.find('li').removeClass('active');
                sections.removeClass('active');

                $(this).addClass('active');
                nav.find('a[href="#' + $(this).attr('id') + '"]').parent().addClass('active');
                let str = nav.find('a[href="#' + $(this).attr('id') + '"]').text();

                if (str !== 'Intro') {
                    mobileCurrent.html(str);
                }

                if (str === 'Intro') {
                    header.addClass('scroll-background-color');
                } else {
                    header.removeClass('scroll-background-color');
                }

                // saves the new position for iteration.
                scrollPos = (document.body.getBoundingClientRect()).top;
            }
        });
    });

    // Smooth scroll: You can use class ".smoothScroll" in "a" tag. If you want to add smooth scroll effect.
    smoothScroll.on('click', function () {
        let $el = $(this);
        let id = $el.attr('href');

        $.scrollify.setOptions({
            before:function() {
                if (win.scrollTop() > $('#About').offset().top - navHeight || win.scrollTop() === 0) {
                    return false;
                }
            },
        });

        $('html, body').animate({
            scrollTop: $(id).offset().top - navHeight + 0.5
        }, 800, function () {}).promise().done(function () {
            setTimeout(function () {
                $.scrollify.setOptions({
                    before:function() {},
                })
            }, 300);
        });

        return false;
    });

    // Aos fadeIn effect
    AOS.init({
        offset: 200,
        duration: 1200,
        easing: 'ease-in-sine',
        delay: 100,
        once: true
    });

    // Ticket Modal
    // modal close button
    $open_modal_btn.on('click', function(event) {
        $ticket_modal.fadeIn(250, function () {
            $('body').addClass('menu-open');
        });
    });

    $close_modal_btn.on('click', function(event) {
        $ticket_modal.fadeOut(250, function () {
            $('body').removeClass('menu-open');
        });
    });

    const indexViewDatepicker = () =>{
        const booking_date = $("#homeDatepicker");

        // booking_date.on('focus', function () {
        //     $('#ui-datepicker-div').appendTo('.calender-wrapper');
        // });

        $.get('/dininginthedark3/GetAjaxData',{
                'act':'getBypople',
                'pople':2,
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
                    minDate: minD,// minD,
                    maxDate: maxDateVal,// new Date(2022, 1, 28),
                    dateFormat: 'yy-mm-dd', 
                    beforeShowDay: enableAllTheseDays
                });
                // $.unblockUI();
            },'json');
        // 可選擇的日期
        var enableDays = [];
        // if(!isNaN(submitDatas['booking_people'])){
        //     // $.blockUI();
            
        // }
        

        function enableAllTheseDays(date) {
            var sdate = $.datepicker.formatDate( 'yy-mm-dd', date);

            if($.inArray(sdate, enableDays) !== -1 /*&& $.inArray(sdate, ['2022-02-08','2022-02-09','2022-02-10','2022-02-15','2022-02-16','2022-02-17']) !== -1*/) {
                return [true];
            }
            return [false];
        }
        console.log('取得日期');
    }
    indexViewDatepicker()
});