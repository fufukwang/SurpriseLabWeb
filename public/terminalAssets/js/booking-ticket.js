$(function() {
    let $btn_next = $('#js-next-btn');
    let $dropdown = $('.js-dropdown');
    
    let $dropdown_ticket = $('#dropdownMenuButtonTicket');
    let $dropdown_count = $('#dropdownMenuButtonCount');

    let flag_ticket = false;
    let flag_count = false;

    let next_page = 'booking_datetime.html';


    // control next button disabled
    function controlButton() {
        if ( flag_ticket && flag_count ) {
            $btn_next.removeClass('status-disabled');
        } else {
            $btn_next.addClass('status-disabled');
        }
    }


    // verify dropdown
    $dropdown.on('click', function(){
        flag_ticket = $dropdown_ticket.hasClass('no-value') ? false : true;
        flag_count = $dropdown_count.hasClass('no-value') ? false : true;
        controlButton();
    });

    // next button
    $btn_next.on('click', function(){
        // enabled
        if ( !$(this).hasClass('status-disabled') ) { 
            $(this).removeClass('status-disabled');
            // $(this).attr('href', next_page);
        } else {
            $(this).addClass('status-disabled');
            $(this).attr('href', 'javascript://');
        }
    });

});