$(function() {
    // Owl Carousel
    let $owl = $('#owl-01, #owl-03, #owl-04, #owl-05');

    // 觸發 Owl Carousel
    $owl.each(function(){
        $(this).owlCarousel({
            center: true,
            loop: false,
            nav: true,
            navText: ['<img src="img/home/landing/btn-left.svg" alt="btn-left"/>', '<img src="img/home/landing/btn-right.svg" alt="btn-right"/>'],
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1.24,
                    dots: true,
                    margin: 20
                },
                1200: {
                    items: 2.27,
                    dots: false,
                    margin: 60
                },
                1441: {
                    items: 2.27,
                    dots: false,
                    margin: 60
                }
            }
        });
    });
});
