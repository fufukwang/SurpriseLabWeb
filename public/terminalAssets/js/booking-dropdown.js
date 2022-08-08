$(function() {
    let $dropdown = $('.js-dropdown');
    let $dropdown_items = $dropdown.find('.dropdown-item');
    
    $dropdown_items.each(function(index){
        $(this).on('click', function(){
            let $dropdown_active_item = $(this).parents('.js-dropdown').find('.dropdown-toggle');
            $dropdown_active_item.text($(this).text());
            $dropdown_active_item.removeClass('no-value');
        });
    });
});