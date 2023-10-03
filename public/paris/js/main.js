$('#main-header .mob-toggle').on('click', function(){
    if( $('#main-header').hasClass('open') ) {
        $('#main-header').removeClass('open');
        $('body').css({'overflow': ''});
    } else {
        $('#main-header').addClass('open');
        $('body').css({'overflow': 'hidden'});
    }
    if(typeof ScrollTrigger !== 'undefined') {
        ScrollTrigger.refresh();
    }
});