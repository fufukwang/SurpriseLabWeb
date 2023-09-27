$('#main-header .mob-toggle').on('click', function(){
    if( $('#main-header').hasClass('open') ) {
        $('#main-header').removeClass('open');
    } else {
        $('#main-header').addClass('open');
    }
});