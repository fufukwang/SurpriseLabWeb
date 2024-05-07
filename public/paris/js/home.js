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

$('form button').bind('click',function(){
    var message = '';

    var name = $('form input[type=text]:eq(0)').val();
    if(name == ''){ message += '請輸入姓名<br />'; }
    var phone = $('form input[type=text]:eq(1)').val();
    if(phone == ''){ message += '請輸入電話<br />'; }
    var email = $('form input[type=email]').val();
    if(email == ''){ message += '請輸入信箱<br />'; }
    if( email !== '' && !/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/.test(email) ) {
        message += '信箱格式錯誤<br />';
    }
    var notes = $('form textarea').val();
    if(notes == ''){ message += '請輸入備註內容<br />'; }
    if(message===''){
        $.blockUI({message: null});
        $.post('/lebaldeparis/PostAjaxData',{
            'act':'BookingAllDay',
            name,
            phone,
            email,
            notes,
        },function(data){
            if(data.success == 'Y'){
                $('form input[type=text]:eq(0),form input[type=text]:eq(1),form input[type=email],form textarea').val('');
                alert('您的需求已成功送出，我們會盡快回覆!');
            } else {
                alert('錯誤請稍後再嘗試一次!');
            }
            $.unblockUI();
        },'json');
    }
    $('.form-error').html(message);
});
$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});