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


    // section hide target effect
    function sectionHideTargetEffect(scrolled) {
        if ( scrolled > hidden_section_height - nav_height - 5 ) {
            $hidden_targets.removeClass('target-hidden');
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
   

    /* init */

    // anchor menu effect
    anchorMenuEffect(scrolled);

    // section hide target effect
    sectionHideTargetEffect(scrolled);

    // mobile - set nav bar section text
    setNavBarSectionText();

});