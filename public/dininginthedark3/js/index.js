$(document).ready(function () {

    // Anchor Smooth Scroll
    var sections = $('.anchor-section');
    var nav = $('.anchor-wrapper');
    var header = $('.logo');
    var navHeight = header.outerHeight();
    var social = $('.social-wrapper');
    var win = $(window);
    var scrollHeight = header.offset().top;
    var smoothScroll = $('.smoothScroll');
    var mobileCurrent = $('.current-section');

    // Full Page Scroll
    // https://github.com/lukehaas/scrollify
    $.scrollify({
        section : ".fixed-scroll-anchor",
        setHeights: false,
        sectionName: false,
        updateHash: false,
    });

    // To anchor
    var hash = window.location.hash;
    if (hash) {
        $.scrollify.disable();
        $('html, body').animate({
            scrollTop: $(hash).offset().top - navHeight
        }, 800, function () {
            $.scrollify.enable();
            history.replaceState(null, null, ' ');
        });
    }

    if (win.width() < 480) {
        $.scrollify.destroy();
    }

    win.on('resize', function () {
        if (win.width() < 480) {
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
        var curPos = $(this).scrollTop();

        sections.each(function () {
            var top = Math.floor($(this).offset().top) - navHeight;
            var bottom = top + Math.floor($(this).outerHeight());

            if (curPos >= top && curPos <= bottom) {
                nav.find('li').removeClass('active');
                sections.removeClass('active');

                $(this).addClass('active');
                nav.find('a[href="#' + $(this).attr('id') + '"]').parent().addClass('active');
                var str = nav.find('a[href="#' + $(this).attr('id') + '"]').text();

                if (str !== 'Welcome') {
                    mobileCurrent.html(str);
                }

                if (str === 'About' || str === 'Rules') {
                    header.addClass('scroll-background-color');
                } else {
                    header.removeClass('scroll-background-color');
                }

                // saves the new position for iteration.
                scrollPos = (document.body.getBoundingClientRect()).top;
            }
        });

        // anchor fadeIn effect
        // var scrollTop = win.scrollTop();

        // if (scrollTop >= scrollHeight) {
        //     if (!nav.hasClass('anchor-show')) {
        //         nav.addClass('anchor-show');
        //         nav.fadeIn(800);
        //         social.fadeIn(800);
        //         header.addClass('anchor-show');
        //     }
        // } else {
        //     nav.removeClass('anchor-show');
        //     nav.fadeOut(300);
        //     social.fadeOut(300);
        //     header.removeClass('anchor-show');
        // }
    });

    // Smooth scroll: You can use class ".smoothScroll" in "a" tag. If you want to add smooth scroll effect.
    smoothScroll.on('click', function () {
        var $el = $(this);
        var id = $el.attr('href');

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