$('.collapse-list .collapse-item').each(function(){
    $(this).find('.item-title').append('<div class="toogle"></div>');
    $(this).find('.item-title').on('click', function(){
        if( $(this).closest('.collapse-item').hasClass('open') ) {
            $(this).closest('.collapse-item').find('.item-body').slideUp();
            $(this).closest('.collapse-item').removeClass('open');
        } else {
            $(this).closest('.collapse-item').find('.item-body').slideDown();
            $(this).closest('.collapse-item').addClass('open');
        }
    });
});

$('#tab-qa, #tab-change-refund').on('click', function(){
    $('.tab-item.active').removeClass('active');
    $(this).addClass('active');
    if( $(this).attr('id') === 'tab-qa' ) {
        $('#change-refund').fadeOut(200);
        $('#qa').fadeIn(200);
    } else {
        $('#qa').fadeOut(200);
        $('#change-refund').fadeIn(200);
    }
});