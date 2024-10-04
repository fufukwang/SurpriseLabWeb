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
        var enableDays = [];
        var dateSite = [];
        $.get('/dininginthedark3/GetAjaxData',{
            'act':'getBypople',
            'pople':2,
            'ticketType':'',
        },function(data){
            for(i=0;i<data.length;i++){
                enableDays.push(data[i].day);
                dateSite[data[i].day] = data[i].sites
            }
            var minD = 0;
            if(enableDays.length>0){
                minD = enableDays[0];
            }
            var maxD;
            const date = new Date();
            const newDate = addMonths(date, 2);
            maxD = new Date(newDate.getFullYear(), newDate.getMonth(), lastday(newDate.getFullYear(), newDate.getMonth()));
// console.log(maxD);
            booking_date.datepicker("destroy");
            booking_date.datepicker({
                minDate: minD,// minD,
                maxDate: maxD,//'+3m',// new Date(2022, 1, 28),
                dateFormat: 'yy-mm-dd', 
                beforeShowDay: enableAllTheseDays,
                onSelect: function(dateText) {
                    window.location.href = '/dininginthedark3/booking_pay.html?day='+dateText;
                }
            });
            /*
            $('a.ui-state-active').bind('click',function(){
                let tr_day = booking_date.datepicker( "getDate" );
                let sp_date = tr_day.getDate();
                let sp_mont = (tr_day.getMonth() + 1);
                let sp_year = tr_day.getFullYear();
                let out_date = sp_year + '-' + sp_mont + '-' + sp_date;
                window.location.href = '/dininginthedark3/booking_pay.html?utm_source=website&utm_medium=calendar&day='+out_date;
            });
            */
            // $.unblockUI();
        },'json');
        function enableAllTheseDays(date) {
            var sdate = $.datepicker.formatDate( 'yy-mm-dd', date);
            var getMaxDate = $.datepicker._determineDate( booking_date, booking_date.datepicker( "option", "maxDate" ) );
            var startDate = new Date(sdate);
            var endDate   = new Date(getMaxDate);

            if($.inArray(sdate, enableDays) !== -1 && endDate>=startDate) {
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
                return [true,myDateClass,myDateTip];
            }
            return [false];
        }

        $('#homeDatepicker a').on('click',function(){
            window.location.href = '/dininginthedark3/booking_pay.html?utm_source=website&utm_medium=calendar'
        })
    }


    indexViewDatepicker()
});

function addMonths(date, months) {
  date.setMonth(date.getMonth() + months);

  return date;
}
var lastday = function(y,m){ return  new Date(y, m +1, 0).getDate(); }

// webp-detect
window.addEventListener('DOMContentLoaded', function() {
    var hasSupport = false;
    var pixel = new Image();
    pixel.setAttribute('src', 'data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA'); // 開始載入測試圖
    pixel.addEventListener('load', function() {
        if(pixel.width > 0 && pixel.height > 0) {
            hasSupport = true;
        }
        document.documentElement.classList.add(hasSupport ? 'webp' : 'no-webp');
    });
    pixel.addEventListener('error', function() {
        document.documentElement.classList.add(hasSupport ? 'webp' : 'no-webp');
    });
});

$('#owl-team .item').on('mouseenter', function() {
    $(this).addClass('item-hover');
});

$('#owl-team .item').on('mouseleave', function() {
    $(this).removeClass('item-hover');
});

$('#owl-team .item').on('touchstart', function() {
    if ( $(this).hasClass('item-hover') ) {
        $(this).removeClass('item-hover');
    } else {
        $(this).addClass('item-hover');
    }
});

function setEnterDialogSize() {
    var wrapperRatio = $('#enter-dialog').width() / $('#enter-dialog').height();
    var contentRatio = $('#enter-dialog .dialog-content').width() / $('#enter-dialog .dialog-content').height();
    var contentH = $('#enter-dialog .dialog-inner').height();
    var imgH = contentH - 6 - 32;
    var maxImgW = window.matchMedia("(min-width: 768px)").matches ? (1440 * imgH / 1024) : (390 * imgH / 844);
    $('#enter-dialog .dialog-content').css('width', wrapperRatio < contentRatio ? '100%' : (maxImgW + 'px'));
}

document.body.classList.add('render');
setTimeout(function(){
    imagesLoaded(document.body, function(){
        document.body.classList.remove('loading');
        
        setTimeout(function() {
            if ( sessionStorage.getItem('dialog_noshow') !== 'true' ) {
                $('#enter-dialog').fadeIn();
                setEnterDialogSize();
            }
        }, 500);
    })
}, 0);

$(window).on('resize', function(){
    setEnterDialogSize();
});

$('#enter-dialog .dialog-close').on('click', function(event) {
    $('#enter-dialog').fadeOut();
});

$('#enter-dialog .txt').on('click', function(){
    sessionStorage.setItem('dialog_noshow', 'true');
    $('#enter-dialog').fadeOut();
});

var second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;
var countDown = $('.dashboard').data('date');
if (countDown) {
    countDown = new Date(countDown).getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDown - now;
    
        $('.dashboard .days').text( Math.floor(distance / (day)) );
        $('.dashboard .hours').text( Math.floor((distance % (day)) / (hour)) );
        $('.dashboard .minutes').text( Math.floor((distance % (hour)) / (minute)) );
        $('.dashboard .seconds').text( Math.floor((distance % (minute)) / second) );
        
        if (distance < 0) {
            clearInterval(x);
            $('.dashboard .days').text('0');
            $('.dashboard .hours').text('0');
            $('.dashboard .minutes').text('0');
            $('.dashboard .seconds').text('0');
        }
    }, 50);
}