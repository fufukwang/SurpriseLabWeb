jQuery(function($){
    var header = $('header');
    var win = $(window);

    function setIntervalX(callback, delay, repetitions) {
        var x = 0;
        var intervalID = window.setInterval(function () {

            callback();

            if (++x === repetitions) {
                window.clearInterval(intervalID);
            }
        }, delay);
    }

    // Rules slider
    var owl = $('.rules.owl-carousel').owlCarousel({
        margin: 10,
        items: 1,
        dots: true,
        autoHeight: true,
        dotsContainer: '#rules-tab-switcher',
        animateIn: 'fadeIn',
        responsive : {
            // breakpoint from 0 up
            0 : {
                loop: true,
                mouseDrag: true,
                touchDrag: true,
            },
            // breakpoint from 768 up
            768 : {
                loop: false,
                mouseDrag: false,
                touchDrag: false,
            }
        }
    });

    setIntervalX(function(){
        owl.trigger('refresh.owl.carousel');
    }, 300 , 5);

    win.on('load resize', function () {
        owl.trigger('refresh.owl.carousel');
    });

    // Rules fadeIn
    var rulesTab = $('#rules-tab-switcher');

    rulesTab.find('li').on('click', function () {
        window.clickTab = this;

        $('html, body').animate({
            scrollTop: 0
        }, 300, function() {
            owl.trigger('to.owl.carousel', [$(window.clickTab).index(), 300, true]);
        });
    });

    $('.to-presale-rules').on('click', function (e) {
        owl.trigger('to.owl.carousel', [1, 300, true]);

        setTimeout(function () {
            $('html, body').animate({
                scrollTop: 0
            }, 300);
        },300);
    });

    $('.to-change-and-refund').on('click', function (e) {
        owl.trigger('to.owl.carousel', [2, 300, true]);

        setTimeout(function () {
            $('html, body').animate({
                scrollTop: 0
            }, 300);
        },300);
    });

    // Fix QA toggle icon issue
    var qa = $('#qa-according').collapse();
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

    var qa_card = $('#qa-according .card');

    qa_card.on('click', function () {
        var offset = $(this).offset().top - header.height() - rulesTab.height();
        var prevCard = qa_card.slice(0, parseInt($(this).index()));

        if (prevCard.find('h6').hasClass('is-open')) {
            offset = offset - prevCard.find('h6.is-open').parent().next().height();

            $('html, body').animate({
                scrollTop: offset
            }, 300);
        }
    });

    var qa_content = $('#qa-according .card-body');
    qa_content.on('click', function () {
        var qa_toggler = $(this).parent().prev().find('h6');
        if (qa_toggler.hasClass('is-open')) {
            qa_toggler.click();
        }
    });
});
