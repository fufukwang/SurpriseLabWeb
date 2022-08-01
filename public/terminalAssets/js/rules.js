jQuery(function($){
    let sections = $('.anchor-section');
    let nav = $('.anchor-wrapper');
    let header = $('.logo');
    let navHeight = header.outerHeight();
    let social = $('.social-wrapper');
    let win = $(window);
    let scrollHeight = win.height() - 200;
    let smoothScroll = $('.smoothScroll');
    let mobileCurrent = $('.current-section');

    function setIntervalX(callback, delay, repetitions) {
        let x = 0;
        let intervalID = window.setInterval(function () {

            callback();

            if (++x === repetitions) {
                window.clearInterval(intervalID);
            }
        }, delay);
    }

    // Rules slider
    let owl = $('.rules.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        items: 1,
        dots: true,
        autoHeight: true,
        dotsContainer: '#rules-tab-switcher',
    });

    setIntervalX(function(){
        owl.trigger('refresh.owl.carousel');
    }, 300 , 5);

    win.on('load', function () {
        owl.trigger('refresh.owl.carousel');
    });

    // Rules fadeIn
    let rulesTab = $('#rules-tab-switcher');

    rulesTab.on('click', 'li', function () {
        window.clickTab = $(this);

        $('html, body').animate({
            scrollTop: 0
        }, 300, function() {
            owl.trigger('to.owl.carousel', [$(window.clickTab).index(), 300, true]);
        });
    });

    $('.to-presale-rules').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 300, function() {
            owl.trigger('to.owl.carousel', [1, 300, true]);
        });
    });

    $('.to-change-and-refund').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 300, function() {
            owl.trigger('to.owl.carousel', [2, 300, true]);
        });
    });

    // Fix QA toggle icon issue
    let qa = $('.rule-according').collapse();
    qa.on('show.bs.collapse', function (e) {
        qa.find('h6').removeClass('is-open');
        $(e.target).prev().find('h6').addClass('is-open');
    }).on('hide.bs.collapse', function (e) {
        $(e.target).prev().find('h6').removeClass('is-open');
    }).on('click', function () {
        setTimeout(function () {
            owl.trigger('refresh.owl.carousel');
        }, 300);
    });

    let qa_content = $('.rule-according .card-body');
    qa_content.on('click', function () {
        let qa_toggler = $(this).parent().prev().find('h6');
        if (qa_toggler.hasClass('is-open')) {
            qa_toggler.click();
        }
    });

    // mobile hamburger button effect
    let hamburger = $('.hamburger');
    let iconBar = $('.icon-bar');
    let currentMenu = $('.current-menu');
    let body = $('body');

    mobileCurrent.html('Rules');

    hamburger.on('click', function () {
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
});
