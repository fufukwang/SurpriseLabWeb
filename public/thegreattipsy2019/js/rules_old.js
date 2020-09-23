jQuery(function($){
    var sections = $('.anchor-section');
    var nav = $('.anchor-wrapper');
    var header = $('.logo');
    var navHeight = header.outerHeight();
    var social = $('.social-wrapper');
    var win = $(window);
    var scrollHeight = win.height() - 200;
    var smoothScroll = $('.smoothScroll');
    var mobileCurrent = $('.current-section');

    // Rules slider
    var owl = $('.rules.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        items: 1,
        dots: true,
        autoHeight: true,
        dotsContainer: '#rules-tab-switcher',
    });

    // Rules fadeIn
    var rulesTab = $('#rules-tab-switcher');

    rulesTab.on('click', 'li', function () {
        window.clickTab = $(this);

        $('html, body').animate({
            scrollTop: 0
        }, 300, function() {
            owl.trigger('to.owl.carousel', [$(window.clickTab).index(), 300]);
        });
    });

    $('.to-change-and-refund').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 300, function() {
            owl.trigger('to.owl.carousel', [2, 300]);
        });
    });

    // Fix QA toggle icon issue
    var qa = $('#qa-according').collapse();
    qa.on('show.bs.collapse', function (e) {
        qa.find('h6').removeClass('is-open');
        $(e.target).prev().find('h6').addClass('is-open');
    }).on('hide.bs.collapse', function (e) {
        $(e.target).prev().find('h6').removeClass('is-open');
    });

    var qa_content = $('#qa-according .card-body');
    qa_content.on('click', function () {
        var qa_toggler = $(this).parent().prev().find('h6');
        if (qa_toggler.hasClass('is-open')) {
            qa_toggler.click();
        }
    });

    // mobile hamburger button effect
    var hamburger = $('.hamburger');
    var iconBar = $('.icon-bar');
    var currentMenu = $('.current-menu');
    var body = $('body');

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
