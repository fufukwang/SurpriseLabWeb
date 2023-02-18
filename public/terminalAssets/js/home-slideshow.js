$(function() {
    // Owl Carousel
    let $owl = $('.owl-carousel');

    $owl.each(function(){
        const $this = $(this)
        let $btnPrev = $this.find('.custom-owl-prev');
        let $btnNext = $this.find('.custom-owl-next');
    
        $this.owlCarousel({
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
            $this.trigger('prev.owl.carousel');
        });
    
        $btnNext.on('click', function(){
            $this.trigger('next.owl.carousel');
        });
    })
});