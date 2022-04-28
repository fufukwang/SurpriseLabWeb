$(function() {
    // lightbox
    let $lightbox = $('.js-photo-gallery');

    let lightbox = $lightbox.find('.js-photo-item').simpleLightbox({
        className: 'lightbox-modal',
        overlay: true,
        overlayOpacity: 0.7,
        nav: true,
        navText: ['<i class="icon-arrow-slides-left"></i>','<i class="icon-arrow-slides-right"></i>'],
        close: true,
        closeText: '<i class="icon-close"></i>',
        showCounter: true,
        widthRatio: 1,
        heightRatio: 0.68,
        scaleImageToRatio: true,
        animationSlide: true,
        animationSpeed: 300,
        loop: true,
        scrollZoom: false,
        preloading: true
    });
});
