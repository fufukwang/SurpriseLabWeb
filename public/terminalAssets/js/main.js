$(function(){
    let $body = $('body');

    // mobile nav
    let $mobile_nav = $('.js-mobile-nav');
    let $mobile_nav_bar_btn = $('.js-nav-bar-btn');
    let $mobile_nav_bar_btn_text = $mobile_nav_bar_btn.find('.menu-btn-text');
    let $mobile_nav_menu_items = $mobile_nav.find('.menu-item');


    // mobile - switch nav bar text
    function switchNavBarTextEffect() {
        if ( $mobile_nav.hasClass('active') ) {
            $mobile_nav_bar_btn_text.find('.text-menu').addClass('active');
            $mobile_nav_bar_btn_text.find('.text-section').removeClass('active');
        } else {
            $mobile_nav_bar_btn_text.find('.text-menu').removeClass('active');
            $mobile_nav_bar_btn_text.find('.text-section').addClass('active');
        }
    }

    // mobile - modal open effect
    function ModalOpenEffect() {
        if ( $mobile_nav.hasClass('active') ) {
            $body.addClass('modal-open');
        } else {
            $body.removeClass('modal-open');
        }
    }

    // click event: mobile - nav bar button
    $mobile_nav_bar_btn.on('click', function() {
        $mobile_nav.toggleClass('active');

        // mobile - modal open effect
        ModalOpenEffect();

        // mobile - switch nav bar text
        switchNavBarTextEffect();
    });

    // click event: mobile - nav menu item
    $mobile_nav_menu_items.on('click', function() {
        $mobile_nav.removeClass('active');

        // mobile - modal open effect
        ModalOpenEffect();

        // mobile - switch nav bar text
        switchNavBarTextEffect();
    });   


    /* init */

    /* Loading動畫 */
    document.body.classList.add('render');
    setTimeout(function(){
        // Image Loading
        imagesLoaded(document.body, function(){
            document.body.classList.remove('loading');
        })
    }, 1000);
});