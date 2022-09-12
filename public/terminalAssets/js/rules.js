$(function() {
    let $scroll_top_target = $('.js-scroll-top');

    $scroll_top_target.on('click', function () {
        $('html, body').animate({
            'scrollTop': 0
        }, 0);
    });
});