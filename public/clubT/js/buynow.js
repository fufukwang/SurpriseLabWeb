// Aos fadeIn effect
AOS.init({
    offset: 0,
    duration: 800,
    easing: 'ease-in-sine',
    delay: 600,
    once: false
});

$(document).ready(function () {

    // Image Loading
    document.body.classList.add('render');

    setTimeout(function () {
        imagesLoaded(document.body, function () {
            document.body.classList.remove('loading');
        })
    }, 1000);
});