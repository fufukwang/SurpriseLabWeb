// banner enter
$('#banner .enter').on('click', function(){
    $('html, body').animate({
        scrollTop: $("#sec-about").offset().top - $('#main-header').height()
    }, 1000);
});

// ====================== 輪播們
$("#sec-booking .owl-carousel").owlCarousel({
    center: true,
    items: 1.5,
    loop: false,
    margin: 27,
    startPosition: 1,
    dots: true
});

$("#sec-play .owl-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    dots: true,
    nav: true,
    lazyLoad: true,
    navText: ['<div class="pa-prev"></div>', '<div class="pa-next"></div>']
});

$("#sec-play .owl-carousel, #sec-media .owl-carousel, #sec-experience .owl-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    dots: true,
    nav: true,
    lazyLoad: true,
    navText: ['<div class="pa-prev"></div>', '<div class="pa-next"></div>']
});

// pin
ScrollTrigger.create({
    trigger: "#banner",
    pin: '#main-header',
    // pinReparent: true,
    start: "bottom top",
    endTrigger: "#main-footer",
    end: "bottom top",
    pinSpacing: false,
    onToggle: function(self) {
        if(self.isActive) {
            $('#main-header').addClass('fixed');
            gsap.set('#main-header .mob-toggle, #main-header .mob-lang, #fixed-booking', {display: 'block', opacity: 0});
            gsap.to('.mob-toggle, .mob-lang', {opacity: 1, duration: 0.3});
            gsap.to('#fixed-booking', {opacity: 0.95, duration: 0.3});
        } else {
            $('#main-header').removeClass('fixed');
            gsap.set('#main-header .mob-toggle, #main-header .mob-lang', {display: 'none'});
            gsap.to('#fixed-booking', {
                opacity: 0, 
                duration: 0.3,
                onComplete: function(){
                    gsap.set('#fixed-booking', {display: 'none'});
                }
            });
        }
    },
});

// click 選單連結
$('#main-header nav a').on('click', function(e){
    if( $(this).hasClass('scrollto') ){
        e.preventDefault();
        
        $('html, body').animate({
            scrollTop: $('#sec-' + $(this).data('sec')).offset().top - $('#main-header').height()
        }, 1000);

        $('nav a.active').removeClass('active');
        $(this).addClass('active');

        $('#main-header').removeClass('open');
        $('body').css({'overflow': ''});
        ScrollTrigger.refresh();
    }
});

$('section').each(function(idx, el){
    ScrollTrigger.create({
        trigger: $(el)[0],
        start: "top bottom",
        end: "bottom top",
        onEnter: function() {
            var sec = $(el).attr('id').substring(4);
            if( $(el).attr('id') === 'sec-'+sec && $('#main-header nav a[data-sec='+sec+']').length > 0 ) {
                $('#main-header nav a.active').removeClass('active');
                $('#main-header nav a[data-sec='+sec+']').addClass('active');
            }
        },
        onEnterBack: function() {
            var sec = $(el).attr('id').substring(4);
            if( $(el).attr('id') === 'sec-'+sec && $('#main-header nav a[data-sec='+sec+']').length > 0 ) {
                $('#main-header nav a.active').removeClass('active');
                $('#main-header nav a[data-sec='+sec+']').addClass('active');
            }
        },
    });
})

$('#sec-group .tab').on('click', function(e){
    if( !$(this).hasClass('active') ){
        var group = $(this).data('group');
        var tab = $(this);
        $('#sec-group .tab-content.active').fadeOut(200, function() {
            $('#sec-group .tab-content.active').removeClass('active');

            $('#sec-group .tab-content.' + group).fadeIn(200);
            $('#sec-group .tab-content.' + group).addClass('active');
            
            $('#sec-group .tab.active').removeClass('active');
            tab.addClass('active');

            // Scrollbar.destroy();
            // Scrollbar.init(document.querySelector('#sec-group .tab-content.active'), {
            //     alwaysShowTracks: true
            // });

            ScrollTrigger.refresh();
        });
    }
});

var Scrollbar = window.Scrollbar;
$('#sec-group .g2, #sec-group .g3, #sec-group .g4, #sec-group .g5').each(function(idx, el) {
    Scrollbar.init(el, {
        alwaysShowTracks: true
    });
});

function setEnterDialogSize() {
    var wrapperRatio = $('#enter-dialog').width() / $('#enter-dialog').height();
    var contentRatio = $('#enter-dialog .dialog-content').width() / $('#enter-dialog .dialog-content').height();
    var contentH = $('#enter-dialog .dialog-inner').height();
    var imgH = contentH - 6 - 32;
    var maxImgW = window.matchMedia("(min-width: 768px)").matches ? (1440 * imgH / 1024) : (390 * imgH / 844);
    $('#enter-dialog .dialog-content').css('width', wrapperRatio < contentRatio ? '100%' : (maxImgW + 'px'));
}

if ( sessionStorage.getItem('paris_dialog_noshow_en') !== 'true' ) {
    $('#enter-dialog').fadeIn();
    setEnterDialogSize();
}

$(window).on('resize', function(){
    setEnterDialogSize();
});

$('#enter-dialog .dialog-close').on('click', function(event) {
    $('#enter-dialog').fadeOut();
});

$('#enter-dialog .txt').on('click', function(){
    sessionStorage.setItem('paris_dialog_noshow_en', 'true');
    $('#enter-dialog').fadeOut();
});

// $('#enter-dialog .img').on('click', function(){
//     $('#enter-dialog').fadeOut();

//     $('html, body').animate({
//         scrollTop: $('#About').offset().top - $('.logo').outerHeight() + 0.5
//     }, 800);
// });

var endDate = $('#home .countdown').data('date');
function countdown(){
    var endDateDate = new Date(endDate);
    var currentDate = new Date();

    var totalSeconds = (endDateDate-currentDate)/1000;
    var days = Math.floor(totalSeconds / 3600 / 24);
    var hours = Math.floor(totalSeconds / 3600 ) % 24;
    var minutes = Math.floor(totalSeconds / 60 ) % 60;

    $('#home .countdown .days').text(days < 0 ? '00' : formatTime(days));
    $('#home .countdown .hours').text(hours < 0 ? '00' : formatTime(hours));
    $('#home .countdown .minutes').text(minutes < 0 ? '00' : formatTime(minutes));   
}
countdown();

function formatTime(time){
    return time < 10 ? `0${time}` : time;
}

setInterval(countdown, 500);