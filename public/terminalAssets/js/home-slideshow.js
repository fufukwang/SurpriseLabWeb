$(function() {
    // Owl Carousel
    const $owl = $('.owl-carousel');

    $owl.each(function(){
        const $this = $(this)
        const $btnPrev = $this.next('.custom-owl-nav').find('.custom-owl-prev');
        const $btnNext = $this.next('.custom-owl-nav').find('.custom-owl-next');
    
        $this.owlCarousel({
            center: true,
            // loop: true,
            loop: $this.attr('id') === 'owl-train' || $this.attr('id') === 'owl-bistro' ? false : true,
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

        // if($this.attr('id') === 'owl-bistro') {
        //     $btnPrev.hide();
        //     $btnNext.hide();
        // }
    })
});