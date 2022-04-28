$(function() {
    let $window = $(window);
    let $body = $('html, body');
    
    // Introduction - Accordion
    let $accordion_control = $('.js-accordion-control');
    let $accordion_content_lower = $('.js-content-lower');
    let accordion_content_lower_h = $accordion_content_lower.height();
   
    // Notes - Bootstrap Carousel
    let $carousel_info = $('#carouselINote-info');
    let $carousel_image = $('#carouselINote-image');
    let $carousel_manually_btn_prev = $('#js-carousel-manually-btn-prev');
    let $carousel_manually_btn_next = $('#js-carousel-manually-btn-next');
    let $carousel_items = $carousel_info.find('.carousel-item');
    let carousel_total_page = $carousel_items.length;

    // Review - Card
    let $review_card_items = $('.js-review-card').find('.review-card');

    // Review - Owl Carousel
    let $review_owl_carousel = $('.owl-carousel');
    let $review_owl_carousel_manually_btn_prev = $('.js-carousel-prev');
    let $review_owl_carousel_manually_btn_next = $('.js-carousel-next');
    let review_owl_carousel_stagePadding = 0;


    /* Function */

    // Function - format number
    function formatNumber(num) {
        return (num < 10 ? `0${num}` : num);
    }

    // Function - Introduction -- Accordion --- open 
    function openAccordion() {
        $accordion_content_lower.css('height', accordion_content_lower_h);
    }

    // Function - Introduction -- Accordion --- closed 
    function closedAccordion() {
        $accordion_content_lower.css('height', 0);
    }

    // Function - Notes -- Bootstrap Carousel --- update page number
    function updateNotesPageNumber() {
        $carousel_items.each(function(index){
            let $current_page = $(this).find('.current-page');
            let $total_page = $(this).find('.total-page');

            $current_page.text(formatNumber($(this).index() + 1));
            $total_page.text(formatNumber(carousel_total_page));
        });
    }

    // Function - Review -- Card --- update card number
    function updateReviewCardsNumber() {
        $review_card_items.each(function(index){
            $(this).find('.card-number').text(formatNumber(index + 1));
        });
    }

    // Function - Review -- Owl Carousel --- get stage padding
    function getReviewStagePadding() {
        review_owl_carousel_stagePadding = $body.width() >= 1199.9 ? $body.width()* 0.217 : 60;
    }

    // Function - Review -- Owl Carousel -- reinit
    function reInitReviewCarousel() {
        var $owl = $('.owl-carousel');
        
        // destroy
        $owl.trigger('destroy.owl.carousel');
        $owl.html($owl.find('.owl-stage-outer').html()).removeClass('owl-loaded');
        
        // init
        $owl.owlCarousel({
            loop: false,
            stagePadding: review_owl_carousel_stagePadding,
            margin: 16,
            nav: false,
            dots: false,
            responsive:{
                0: {
                    items: 1
                },
                1199.98: {
                    items: 3
                }
            }
        });
    }


    /* Event Binding */

    // Event - Introduction -- Accordion Control
    $accordion_control.on('click', function(){
        let $current_item = $(this).find('.active');
        let $goal_item = $current_item.siblings('.accordion-control-item');
        let action = $current_item.attr('data-action');

        // item
        $goal_item.addClass('active');
        $current_item.removeClass('active');

        // content
        switch (action) {
            case 'open':
                openAccordion();
                break;
            case 'closed':
                closedAccordion();
                break;
        }
    });

    // Event - Notes -- Bootstrap Carousel --- prev
    $carousel_manually_btn_prev.on('click', function(){
        // switch to prev
        $carousel_info.find('.carousel-control-prev').click();
        $carousel_image.find('.carousel-control-prev').click();
    });

    // Event - Notes -- Bootstrap Carousel --- next
    $carousel_manually_btn_next.on('click', function(){
        // switch to next
        $carousel_info.find('.carousel-control-next').click();
        $carousel_image.find('.carousel-control-next').click();
    });

    // Event - Review -- Owl Carousel --- prev
    $review_owl_carousel_manually_btn_prev.on('click', function() {
        $review_owl_carousel.trigger('prev.owl.carousel');
    });

    // Event - Review -- Owl Carousel --- next
    $review_owl_carousel_manually_btn_next.on('click', function() {
        $review_owl_carousel.trigger('next.owl.carousel');
    });

    // Event - window resize
    $window.on('resize', function(){
        // Review -- Owl Carousel --- get stage padding
        getReviewStagePadding();

        // Review -- Owl Carousel -- reinit
        reInitReviewCarousel();
    });


    /* init */

    // Introduction -- Accordion --- closed 
    closedAccordion();

    // Notes -- Bootstrap Carousel --- update page number
    updateNotesPageNumber();

    // Review -- Card --- update card number
    updateReviewCardsNumber();

    // Review -- Owl Carousel --- get stage padding
    getReviewStagePadding();

    // Review -- Owl Carousel -- init
    $review_owl_carousel.owlCarousel({
        loop: false,
        stagePadding: review_owl_carousel_stagePadding,
        margin: 16,
        nav: false,
        dots: false,
        responsive:{
            0: {
                items: 1
            },
            1199.98: {
                items: 3
            }
        }
    });
});