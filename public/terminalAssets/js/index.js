$(function(){
    let $win = $(window);
    let scrolled = $win.scrollTop();
    let nav_height = $('#js-nav-bar').innerHeight();

    // To anchor
    let hash = window.location.hash;
    if (hash) {
        $('#home').hide();
        $('body').removeClass('home-modal');
        window.history.replaceState(null, null, ' ');
    }

    // section hide target effect
    let $hidden_section = $('.js-hidden-section');
    let $hidden_targets = $('.js-hidden-target');
    let hidden_section_height = $hidden_section.innerHeight();

    // anchor menu effect
    let $anchor_menu = $('.js-anchor-menu');
    let $anchor_sections = $(".js-anchor-section");
    let $active_item = '';

    // mobile - nav
    let $mobile_nav_bar_btn = $('.js-nav-bar-btn');
    let $mobile_nav_bar_btn_text = $mobile_nav_bar_btn.find('.menu-btn-text');

    let $is_opend = false;
    let $end_time = (new Date("2022-10-31 23:59:59")).getTime();

    // section hide target effect
    function sectionHideTargetEffect(scrolled) {
        if ( scrolled > 100 ) {
        // if ( scrolled > hidden_section_height - nav_height - 5 ) {
            $hidden_targets.removeClass('target-hidden');
            if($end_time>(new Date().getTime()) && !$is_opend){
                $('#staticBackdrop').modal('show');
                $is_opend = true;
            }
        } else {
            $hidden_targets.addClass('target-hidden');
        }
    }

    // anchor menu effect
    function anchorMenuEffect(scrolled) {
        let sectionIds = {}; // key: section_id, value: section offset top
        $anchor_sections.each(function () {
            sectionIds[$(this).attr("id")] = $(this).offset().top;
        });
        
        for (key in sectionIds) {
            if (scrolled >= sectionIds[key] - nav_height - 5) {
                $active_item = $anchor_menu.find(`.menu-item[data-id="${key}"]`);

                // section is target
                if ($active_item.length != 0) {
                    $anchor_menu.find('.menu-item').removeClass('active');
                    $active_item.addClass('active');
                }
            }
        }
    }

    // mobile - set nav bar section text
    function setNavBarSectionText() {
        if ($active_item.length != 0) {
            $mobile_nav_bar_btn_text.find('.text-section').text($active_item.first().text());
        } else {
            $mobile_nav_bar_btn_text.find('.text-section').text('');
        }
    }

    // scroll event: window
    $win.scroll(function (event) {
        scrolled = $(this).scrollTop();

        // anchor menu effect
        anchorMenuEffect(scrolled);

        // section hide target effect
        // sectionHideTargetEffect(scrolled);

        // mobile - set nav bar section text
        setNavBarSectionText();
    });

    function timeoff() {
        function showTime() {
            const nowDate = new Date();
            const endDate = new Date($('.timetable .number').attr('data-end'));
            // '2023-06-27 24:00:00'

            const timeDiff = endDate.getTime() - nowDate.getTime();

            const daysDiff = String(Math.floor(timeDiff / (1000 * 60 * 60 * 24))).padStart(2, '0')
            const hoursDiff = String(Math.floor((timeDiff / (1000 * 60 * 60)) % 24)).padStart(2, '0')
            const minutesDiff = String(Math.floor((timeDiff / (1000 * 60)) % 60)).padStart(2, '0')

            // console.log("相差天数：", daysDiff);
            // console.log("相差小时数：", hoursDiff);
            // console.log("相差分钟数：", minutesDiff);

            handleDigitalbodyElement(daysDiff, "day-1", 0);
            handleDigitalbodyElement(daysDiff, "day-2", 1);
            handleDigitalbodyElement(hoursDiff, "hour-1", 0);
            handleDigitalbodyElement(hoursDiff, "hour-2", 1);
            handleDigitalbodyElement(minutesDiff, "min-1", 0);
            handleDigitalbodyElement(minutesDiff, "min-2", 1);
        }
        function handleDigitalbodyElement(targetArray, targetElement, targetIndex) {
            const tmpElement = document.getElementById(targetElement).classList;
            tmpElement.remove(tmpElement.item(2));
            tmpElement.add("num-" + targetArray[targetIndex]);
        }
        // setInterval(showTime, 1000);
    }

    /* init */

    // anchor menu effect
    anchorMenuEffect(scrolled);

    // section hide target effect
    // sectionHideTargetEffect(scrolled);

    // mobile - set nav bar section text
    setNavBarSectionText();

    timeoff();

});

$('#home .sun-wrapper, #home .enter-btn').on('click', function() {
    $('#home').fadeOut(600, function() {
        $('body').removeClass('home-modal');
        $('.main-kv').addClass('animating');
    });
});

// var lastday = function(y,m){ return  new Date(y, m +1, 0).getDate(); }
// var booking_date = $("#homeDatepicker");
// var enableDays = [];
// var dateSite = [];
// $.get('/terminal/GetAjaxData',{
//     'act': 'getBypople',
//     'pople': 1,
//     'ticketType': '',
// },function(data){
//     for(i=0;i<data.length;i++){
//         enableDays.push(data[i].day);
//         dateSite[data[i].day] = data[i].per
//     }
//     var minD = 0;
//     if(enableDays.length>0){
//         minD = enableDays[0];
//     }
//     var maxD;
//     var date = new Date();
//     var newDate = addMonths(date, 2);
//     maxD = new Date(newDate.getFullYear(), newDate.getMonth(), lastday(newDate.getFullYear(), newDate.getMonth()));
//     // console.log(maxD);
//     booking_date.datepicker("destroy");
//     booking_date.datepicker({
//         minDate: minD,// minD,
//         maxDate: maxD,//'+3m',// new Date(2022, 1, 28),
//         dateFormat: 'yy-mm-dd', 
//         beforeShowDay: enableAllTheseDays,
//         onSelect: function(dateText) {
//             window.location.href = '/terminal/booking_pay?day='+dateText;
//         },
//         onUpdateDatepicker: function(inst) {
//             var currentYear = inst.selectedYear;
//             var currentMonth = inst.selectedMonth + 1;
//             var padd = (currentMonth.toString().length == 1) ? '0' : '';
//             var notOpen = true;
//             enableDays.forEach((val) => { if(val.indexOf(currentYear+'-'+padd+currentMonth)!=-1){ notOpen = false; } });
//             if(notOpen){ booking_date.find('.ui-datepicker-year').after('<span class="datepicker-closed">（尚未開放）</span>'); }
// /*
//             if (currentYear === 2024 && currentMonth === 3) {
//                 booking_date.find('.ui-datepicker-year').after('<span class="datepicker-closed">（尚未開放）</span>');
//             }*/
//         }
//     });
// },'json');

$.get('/terminal/GetAjaxData',{
    'act': 'getBypopleHome',
    'pople': 1,
    'ticketType': '',
},function(data){
    var dateSite = {};
    var allData = data;
    var allowDates = allData.map(function(item){
        return item.day;
    });
    allData.forEach(function(item){
        dateSite[item.day] = item.per;
    });

    if (allData.length > 0) {
        var startDate = allData[0].day.split('-');
        var startYear = parseInt(startDate[0]);
        var startMonth = parseInt(startDate[1]) - 1;
    } else {
        var today = new Date();
        var startYear = today.getFullYear();
        var startMonth = today.getMonth();
    }

    $('.tk-datepicker').tkdatepicker({
        startYear: startYear,
        startMonth: startMonth,
        allowDates: allowDates,
        onInit: function(datepicker) {
            loading = false;

            datepicker.find('.tk-datepicker-body .grid').each(function(idx, el) {
                var date = $(el).data('date');
                
                if (allowDates.indexOf(date) < 0) {
                    $(el).addClass('disabled');
                } else {
                    if(dateSite[date]<50){
                        $(el).addClass('sold-out-soon');
                        $(el).attr('title', '即將完售');
                    } else if(dateSite[date]>=50){
                        $(el).addClass('still-vacancy');
                        $(el).attr('title', '好評熱賣');
                    }
                    
                    $(el).on('click', function() {
                        var date = $(this).data('date');
                        window.location.href = '/terminal/booking_pay?day=' + date;
                    })
                }
            });

            datepicker.css({height: 'auto', opacity: 1});
        },
    });
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
        if(dateSite[sdate]<50){
            myDateClass = "sold-out-soon";
            myDateTip = "即將完售";
        } else if(dateSite[sdate]>=50){
            myDateClass = "still-vacancy";
            myDateTip = "好評熱賣";
        }
        /*
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
        */
        return [true,myDateClass,myDateTip];
    }
    return [false];
}

function addMonths(date, months) {
    date.setMonth(date.getMonth() + months);
    return date;
}

$('#introduce .project-item').on('mouseenter', function() {
    $(this).addClass('item-hover');
});

$('#introduce .project-item').on('mouseleave', function() {
    $(this).removeClass('item-hover');
});

$('#introduce .project-item').on('touchstart', function() {
    if ( $(this).hasClass('item-hover') ) {
        $(this).removeClass('item-hover');
    } else {
        $(this).addClass('item-hover');
    }
});