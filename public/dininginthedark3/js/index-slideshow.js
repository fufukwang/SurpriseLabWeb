$(function() {
    // Owl Carousel
    let $owl = $('#owl-01, #owl-03, #owl-04, #owl-05');

    // Slideshow Nav
    let $btnPrev = $('.custom-owl-prev');
    let $btnNext = $('.custom-owl-next');

    // 觸發 Owl Carousel
    $owl.each(function(){
        $(this).owlCarousel({
            center: true,
            loop: true,
            margin: 60,
            nav: false,
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1.24,
                    dots: true,
                    margin: 20,
                    loop: false
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
    });

    // Custom Prev Button
    $btnPrev.on('click', function(){
        $(this).closest('.content-inner--slideshow-cover').find('.owl-carousel').trigger('prev.owl.carousel');
    });

    // Custom Next Button
    $btnNext.on('click', function(){
        $(this).closest('.content-inner--slideshow-cover').find('.owl-carousel').trigger('next.owl.carousel');
    });
});