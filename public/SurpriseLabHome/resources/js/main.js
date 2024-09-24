$(function() {
    let $window = $(window);
    let view_height = window.screen.availHeight; // 裝置螢幕高度
    let lastScrollTop = window.pageYOffset; // 文檔距離窗口左上角的捲動距離
    let scrolled = $window.scrollTop(); // 捲軸距離頂端的高度

    // nav
    let $nav_wrap = $('#js-surpri-nav');
    let $nav_pc = $('#js-nav-pc');
    let $nav_mobile_menu_btn = $('#js-mobile-menu-btn');
    let $nav_mobile_menu_content = $('#js-mobile-content');

    // footer
    let $footer_mobile = $('.js-surpri-footer'); 

    // nav target
    let $nav_target = $('.js-nav-target'); // nav 觸發元素
    let nav_target_offset = $nav_target.length > 0 ? $nav_target.offset().top : 0; // nav 觸發元素與文件頂端的距離
    
    // fixed btn target
    let $fixed_btn_target = $('.js-fixed-btn-target'); // fixed btn 觸發元素
    let fixed_btn_target_half_height = $fixed_btn_target.height() / 2;
    let fixed_btn_target_offset = $fixed_btn_target.length > 0 ? $fixed_btn_target.offset().top + fixed_btn_target_half_height : 0; // CTA 觸發元素與文件頂端的距離

    // button
    let $hint_btn = $('.js-hint-btn');
    let $cta_pc_btn = $('.js-pc-cta-btn');
    let $cta_mobile_btn = $('.js-mobile-cta-btn');

    // Video
    let $video_play_btn = $('.js-video-wrap').find('.video-play-btn');
    let $video_modal_closed_btn = $('.js-video-modal').find('.btn-close');

    // Hero
    let $js_hero_banner_wrap = document.querySelector('.background-fixed');
    let $hero_banner_wrap = $('.background-fixed')
    let hero_banner_value = $('.background-fixed').attr('data-banner');
    let hero_section_height = $('.js-hero-banner').height();


    /* Function */

    // Function -  scrolling down -- control hero banner
    function controlHeroBanner(scrolled) {
        if ( $hero_banner_wrap.length != 0 ) {
            if ( scrolled < hero_section_height * 1.5 ) {
                $js_hero_banner_wrap.style.setProperty('--hero-bg-path', hero_banner_value);
            } else {
                $js_hero_banner_wrap.style.setProperty('--hero-bg-path', 'none');
            }
        }
    }

    // Function - scrolling down -- hide pc nav
    function hidePCNav(scrolled) {
        if ( scrolled > lastScrollTop ) {
            $nav_pc.addClass('scroll-down-hide');
        } else {
            $nav_pc.removeClass('scroll-down-hide');
        }
        
        // For Mobile or negative scrolling
        lastScrollTop = scrolled <= 0 ? 0 : scrolled;
    }

    // Function - more than section -- change nav theme
    function changeNavTheme(scrolled) {
        if ( nav_target_offset != 0 ) {
            if ( scrolled > nav_target_offset ) {
                $nav_wrap.removeClass('theme-default');
                $nav_wrap.addClass('theme-dark');
            } else {
                $nav_wrap.addClass('theme-default');
                $nav_wrap.removeClass('theme-dark');
            }
        }
    }

    // Function - less than half banner -- hide fixed button
    function hideFixedButton(scrolled) {
        if ( fixed_btn_target_offset != 0 ) {
            if ( scrolled < fixed_btn_target_offset ) {
                $hint_btn.addClass('in-banner-hide');
                $cta_pc_btn.addClass('in-banner-hide');
                $cta_mobile_btn.addClass('in-banner-hide');
            } else {
                $hint_btn.removeClass('in-banner-hide');
                $cta_pc_btn.removeClass('in-banner-hide');
                $cta_mobile_btn.removeClass('in-banner-hide');
            }
        }
    }

    // Function - more than footer -- hide CTA mobile button
    function hideCTAMobileButton(scrolled) {
        let footer_offset = $footer_mobile.offset().top; // footer 與文件頂端的距離

        if ( scrolled > footer_offset - view_height ) {
            $cta_mobile_btn.addClass('in-footer-hide');
        } else {
            $cta_mobile_btn.removeClass('in-footer-hide');
        }
    }


    /* Event Binding */

    // Event - Scroll
    $window.scroll(function (event) {
        scrolled = $(this).scrollTop(); // 目前距離頂端的高度

        // scrolling down -- control hero banner
        controlHeroBanner(scrolled);

        // scrolling down -- hide pc nav
        hidePCNav(scrolled);

        // more than section -- change nav theme
        changeNavTheme(scrolled);

        // less than half banner - hide fixed btn
        hideFixedButton(scrolled);

        // more than footer - hide CTA mobile button
        hideCTAMobileButton(scrolled);
    });

    // Event - control nav mobile menu
    $nav_mobile_menu_btn.on('click', function(){
        $(this).toggleClass('open');
        $nav_mobile_menu_content.toggleClass('active');
    });

    // Event - Loading Video
    $video_play_btn.on('click', function(){
        $(this).parent().addClass('hide');
        let $iframe = $(this).parents('.js-video-wrap').find('iframe');
        $iframe.attr('src', $iframe.attr('data-src'));
    });

    // Event - Init Video in modal
    $video_modal_closed_btn.on('click', function(){
        $(this).parents('.js-video-modal').find('.video-cover-wrap').removeClass('hide');
        let $iframe = $(this).parents('.js-video-modal').find('iframe');
        $iframe.attr('src', '');
    });


    /* init */
    
    // load resources - logo svg
    $('.js-logo-dark').load('/SurpriseLabHome/assets/images/general/svg_fixed/brand.svg');
    $('.js-logo-white').load('/SurpriseLabHome/assets/images/general/svg_fixed/brand.svg');
    $('.js-logo-footer').load('/SurpriseLabHome/assets/images/general/svg_fixed/brand_footer.svg');

    // scrolling down -- control hero banner
    controlHeroBanner(scrolled);

    // more than section -- change nav theme
    changeNavTheme(scrolled);

    // less than banner - hide fixed btn
    hideFixedButton(scrolled);

    // more than footer - hide CTA mobile button
    hideCTAMobileButton(scrolled);

    // AOS fadeIn effect
    AOS.init({
        offset: 0,
        duration: 1000,
        easing: 'ease-in-sine',
        delay: 100,
        once: true
    });

    /* Loading animation */
    document.body.classList.add('render');
    setTimeout(function(){
        // Image Loading
        imagesLoaded(document.body, function(){
            document.body.classList.remove('loading');
        })
    }, 1000);

    $('.sign-up-link').on('click', function(e) {
        e.preventDefault();

        $nav_mobile_menu_btn.removeClass('open');
        $nav_mobile_menu_content.removeClass('active');

        $('#signupModal').modal('show');
    });

    $('#signupModal .btn-primary').on('click', function() {
        $('#signupModal').modal('hide');
        $('#signinModal').modal('show');
    });

    $('#signinModal .btn-primary').on('click', function() {
        $('#signupModal').modal('show');
        $('#signinModal').modal('hide');
    });
});