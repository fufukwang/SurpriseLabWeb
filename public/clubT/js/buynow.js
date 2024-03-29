// Aos fadeIn effect
AOS.init({
    offset: 0,
    duration: 800,
    easing: 'ease-in-sine',
    delay: 600,
    once: false
});

$(document).ready(function () {
    // glitch 文字雜訊效果
    let glitch = $('.glitch');
    glitch.glitch({
        layers: ['#FF66D2', '#15FFBC'],
        offset: [10, 0]
    });

    // Image Loading
    document.body.classList.add('render');

    setTimeout(function () {
        imagesLoaded(document.body, function () {
            document.body.classList.remove('loading');
        })
    }, 1000);


    $('#teamDetail').on('shown.bs.modal', function () {
        $.scrollify.disable();
    }).on('hidden.bs.modal', function () {
        $.scrollify.enable();
    });
    $('.fbTrack').bind('click',function(){
        fbq('track', "AddToCart");
    })
});

$(document).ready(function () {
    // Anchor Smooth Scroll
    let win = $(window);
    let win_width = win.width();
    let win_height = win.height();
    let home = $('.home');
    let bg_city = $('.homepage');
    let nav = $('.anchor-wrapper, .mobile-menu');
    let mobile_nav = $('.mobile-menu');
    let socialLink = $('.social-wrapper');
    let smoothScroll = $('.smoothScroll');
    let header = $('header');
    let navHeight = header.outerHeight();
    let sections = $('.fixed-scroll-anchor');
    let intro_btn = $('.intro-btn');
    let intro_wrapper = $('#Home');

    // 首次進入網頁，偵測目前所在位置
    let curPos = win.scrollTop();
    let currentPage = $('.current-page');

    sections.each(function () {
        let top = Math.floor($(this).offset().top);
        let bottom = top + Math.floor($(this).outerHeight());

        if (curPos >= top && curPos < bottom) {
            let ref = $(this).attr('data-section-name');

            nav.find('.active').removeClass('active');
            sections.removeClass('active');

            $(this).addClass('active');
            nav.find('a[href="#' + $(this).attr('data-section-name') + '"]').parent().addClass('active');
            currentPage.text('_' + ref);

            if (ref === 'Home') {
                header.fadeOut();
                nav.fadeOut();
                socialLink.fadeOut();
            }
        }
    });

    // 當使用者位在 Landing
    intro_btn.on('click', function () {
        // 淡出 Landing 畫面
        intro_wrapper.addClass('hide-intro-wrapper');
        // 
        fbq('track', "ViewContent");
        // 移除 Landing 淡出效果
        setTimeout(function(){
            intro_wrapper.removeClass('hide-intro-wrapper');
        }, 1000);
    });

    // Full Page Scroll
    // https://github.com/lukehaas/scrollify
    home.addClass('home-fullpage-effect');
    $.scrollify({
        section : '.fixed-scroll-anchor',
        setHeights: false,
        sectionName: 'section-name',
        updateHash: false,
        scrollbars: false,
        scrollSpeed: 800,
        before:function(i,panels) {

            let ref = panels[i].attr("data-section-name");
            let activeLi = nav.find("a[href=\"#" + ref + "\"]");
            let currentPage = $('.current-page');

            if (activeLi.length > 0) {
                nav.find('.active').removeClass("active");
                activeLi.parent().addClass("active");
                currentPage.text('_' + ref);

                if (ref === 'Home') {
                    header.fadeOut();
                    nav.fadeOut();
                    socialLink.fadeOut();
                } else {
                    if (win_width >= 1200) {
                        header.fadeIn();
                        nav.fadeIn();
                        socialLink.fadeIn();
                    } else {
                        header.fadeIn();
                        nav.fadeOut();
                        mobile_nav.fadeIn();
                        socialLink.fadeOut();
                        mobile_nav.find('.social-wrapper').fadeIn();
                    }
                }
            }
        },
        after: function () {
            history.replaceState(null, null, ' ');
        }
    });

    // To anchor
    let hash = window.location.hash;
    if (hash) {
        history.replaceState(null, null, ' ');
    }

    // Smooth scroll: You can use class ".smoothScroll" in "a" tag. If you want to add smooth scroll effect.
    smoothScroll.on('click', function () {
        if ($('body').hasClass('home-fullpage-effect')) {
            $.scrollify.move($(this).attr("href"));
        } else {
            let $el = $(this);
            let id = $el.attr('href');

            $.scrollify.setOptions({
                before:function() {
                    if (win.scrollTop() === 0) {
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
        }
    });
});
