$(function() {
    // Owl Carousel
    let $owl = $('.owl-carousel');
    let $btnPrev = $('.custom-owl-prev');
    let $btnNext = $('.custom-owl-next');

    $owl.owlCarousel({
        center: true,
        loop: true,
        margin: 60,
        nav: false,
        lazyLoad: true,
        responsive: {
            0: {
                items: 1,
                dots: true
            },
            1200: {
                items: 2.27,
                dots: false
            },
            1441: {
                items: 2.27,
                dots: false
            }
        }
    });

    $btnPrev.on('click', function(){
        $owl.trigger('prev.owl.carousel');
    });

    $btnNext.on('click', function(){
        $owl.trigger('next.owl.carousel');
    });
});