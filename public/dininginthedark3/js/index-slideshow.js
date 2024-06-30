$(function() {
    // Owl Carousel
    let $owl = $('#owl-01, #owl-03, #owl-04, #owl-05, #owl-06, #owl-team');

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

    let $owlReview = $('#owl-review-01');
    // 觸發 Owl Carousel
    $owlReview.each(function(){
        $(this).owlCarousel({
            center: true,
            loop: false,
            nav: true,
            navText: ['<img src="img/home/landing/btn-left.svg" alt="btn-left"/>', '<img src="img/home/landing/btn-right.svg" alt="btn-right"/>'],
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1.24,
                    dots: false,
                    margin: 20
                },
                767: {
                    items: 3.1,
                    dots: false,
                    margin: 20
                },
                992: {
                    items: 3.5,
                    dots: false,
                    margin: 20
                },
                1200: {
                    items: 3.5,
                    dots: false,
                    margin: 60
                },
                1441: {
                    items: 5,
                    dots: false,
                    margin: 60
                }
            }
        });
    });
    
    $('#owl-experience-01').owlCarousel({
        center: true,
        loop: true,
        // margin: 60,
        nav: true,
        navText: ['<img src="img/home/landing/btn-left.svg" alt="btn-left"/>', '<img src="img/home/landing/btn-right.svg" alt="btn-right"/>'],
        lazyLoad: true,
        responsive: {
            0: {
                items: 1,
                dots: true
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

    // Owl Carousel
    let $owlStory = $('#owl-story');

    // 觸發 Owl Carousel
    $owlStory.each(function(){
        $(this).owlCarousel({
            center: true,
            loop: false,
            nav: true,
            navText: ['<img src="img/home/landing/btn-left.svg" alt="btn-left"/>', '<img src="img/home/landing/btn-right.svg" alt="btn-right"/>'],
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1,
                    dots: true,
                    // margin: 20
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

    let $owlRecommend = $('#owl-recommend1, #owl-recommend2, #owl-recommend3');

    $('#Recommend .tab-pane:eq(1), #Recommend .tab-pane:eq(2)').addClass('active');
    $owlRecommend.each(function(){
        const $this = $(this)
        $this.owlCarousel({
            center: true,
            loop: true,
            // margin: 60,
            nav: true,
            navText: ['<img src="img/home/landing/btn-left.svg" alt="btn-left"/>', '<img src="img/home/landing/btn-right.svg" alt="btn-right"/>'],
            lazyLoad: true,
            responsive: {
                0: {
                    items: 1,
                    dots: true
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
    $('#Recommend .tab-pane:eq(1), #Recommend .tab-pane:eq(2)').removeClass('active');
});
