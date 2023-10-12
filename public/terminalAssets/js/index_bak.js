$(function(){
    let $win = $(window);
    let scrolled = $win.scrollTop();
    let nav_height = $('#js-nav-bar').innerHeight();

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
        if ( scrolled > hidden_section_height - nav_height - 5 ) {
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
        sectionHideTargetEffect(scrolled);

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
        setInterval(showTime, 1000);
    }

    /* init */

    // anchor menu effect
    anchorMenuEffect(scrolled);

    // section hide target effect
    sectionHideTargetEffect(scrolled);

    // mobile - set nav bar section text
    setNavBarSectionText();

    timeoff();

});