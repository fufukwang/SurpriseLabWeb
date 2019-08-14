// Aos fadeIn effect
AOS.init({
    offset: 0,
    duration: 800,
    easing: 'ease-in-sine',
    delay: 600,
    once: false
});

$(document).ready(function () {

    // Image Loading
    document.body.classList.add('render');

    setTimeout(function(){
        imagesLoaded(document.body, function(){
            document.body.classList.remove('loading');
        })
    }, 1000);

    // Header Menu Hover Effect
    let menuLink = $('.menu-link');
    let win = $(window);

    menuLink.on('click', function () {
        window.location.href = $(this).find('.dropdown-toggle').attr('href');
    });

    menuLink.find('.dropdown-toggle').on('click', function (e) {
        e.stopPropagation();
    });

    menuLink.mouseenter(function () {
        menuLink.css('opacity', '0.5');
        $(this).css('opacity', '1');
    });

    menuLink.mouseleave(function () {
        menuLink.css('opacity', '0.5');

        if(menuLink.hasClass('active')) {
            menuLink.css('opacity', '');
        }
    });

    // Dropdown Menu Hover Effect
    let dropDownLink = $('.dropdown-item');

    dropDownLink.on('click', function (e) {
        e.stopPropagation();
    });

    dropDownLink.mouseenter(function () {
        dropDownLink.css('opacity', '0.5');
        $(this).css('opacity', '1');
    });

    dropDownLink.mouseleave(function () {
        dropDownLink.css('opacity', '');
    });

    // mobile hamburger button effect
    let hamburger = $('.hamburger');
    let menu = $('.mobile-menu');
    let iconBar = $('.icon-bar');
    let currentPage = $('.current-page');
    let currentMenu = $('.current-menu');
    let body = $('body');
    let main = $('main');

    hamburger.on('click', function () {
        let $el = $(this);
        let $el_offset = $el.offset().top;

        if (win.scrollTop() < $el_offset) {
            // $('html, body').animate({
            //     scrollTop: $el_offset
            // }, 0, function () {}).promise().done(function () {
            //     hanburgerTrigger()
            // });
            hamburgerTrigger()
        } else {
            hamburgerTrigger()
        }

        function hamburgerTrigger() {
            if (!hamburger.hasClass('menu-open')) {
                hamburger.addClass('menu-open');
                iconBar.addClass('active');
                currentPage.hide();
                currentMenu.fadeIn();
                body.addClass('menu-open');
                menu.addClass('menu-open');
                main.addClass('menu-open');
            } else {
                hamburger.removeClass('menu-open');
                iconBar.removeClass('active');
                currentMenu.hide();
                currentPage.fadeIn();
                menu.removeClass('menu-open');
                body.removeClass('menu-open');
                main.removeClass('menu-open');
            }
        }
    });

    menu.find('a').on('click', function () {
        setTimeout(function () {
            hamburger.removeClass('menu-open');
            iconBar.removeClass('active');
            currentMenu.hide();
            currentPage.fadeIn();
            menu.removeClass('menu-open');
            body.removeClass('menu-open');
            main.removeClass('menu-open');
        }, 500);
    });

    // remove mobile menu effect in PC
    win.resize(function () {
        if (win.width() > 1024 && win.width() < 1200) {
            hamburger.removeClass('menu-open');
            iconBar.removeClass('active');
            currentMenu.hide();
            currentPage.fadeIn();
            menu.removeClass('menu-open');
            body.removeClass('menu-open');
            main.removeClass('menu-open');
        } else if (win.width() >= 1440) {
            hamburger.removeClass('menu-open');
            iconBar.removeClass('active');
            currentMenu.hide();
            currentPage.fadeIn();
            menu.removeClass('menu-open');
            body.removeClass('menu-open');
            main.removeClass('menu-open');
        } else if (win.width() > 1199 && win.width() < 1440 && win.height() <=899) {
            hamburger.removeClass('menu-open');
            iconBar.removeClass('active');
            currentMenu.hide();
            currentPage.fadeIn();
            menu.removeClass('menu-open');
            body.removeClass('menu-open');
            main.removeClass('menu-open');
        }
    });
    $('.fbpx').bind('click',function(){
        var event = $(this).data('event');
        if(event==="ViewContent" || event==="AddToCart" || event==='Lead'){
            fbq('track', event);
        } else {
            fbq('trackCustom', event);
        }
    });
});
