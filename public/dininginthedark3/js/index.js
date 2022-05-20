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

        win.resize(function () {
            if (win.width() >= 1200) {
                
                // anchor fadeIn effect
                let scrollTop = win.scrollTop();

                if (scrollTop >= introHeight) {
                    if (!nav.hasClass('anchor-show')) {
                        nav.addClass('anchor-show');
                        nav.fadeIn(800);
                        social.fadeIn(800);
                        header.addClass('anchor-show');
                    }
                } else {
                    nav.removeClass('anchor-show');
                    nav.fadeOut(300);
                    social.fadeOut(300);
                    header.removeClass('anchor-show');
                }     
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
});