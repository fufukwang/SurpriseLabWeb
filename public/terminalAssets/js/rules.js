$(function() {
    let $scroll_top_target = $('.js-scroll-top');

    $scroll_top_target.on('click', function () {
        $('html, body').animate({
            'scrollTop': 0
        }, 0);
    });
});

var policyTab = new bootstrap.Tab(document.querySelector('#change-tab'));
$('.changeToPolicy').on('click', function(event) {
    event.preventDefault();
    policyTab.show();
    $('html, body').animate({
        'scrollTop': 0
    }, 0);
})