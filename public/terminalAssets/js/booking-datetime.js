$(function() {
    let $btn_next = $('#js-next-btn');
    let $dropdown = $('.js-dropdown');

    let $dropdown_period_1 = $('#dropdownMenuButtonPeriod-1');
    let $dropdown_time_1 = $('#dropdownMenuButtonTime-1');

    let $dropdown_period_2 = $('#dropdownMenuButtonPeriod-2');
    let $dropdown_time_2 = $('#dropdownMenuButtonTime-2');

    let $dropdown_period_3 = $('#dropdownMenuButtonPeriod-3');
    let $dropdown_time_3 = $('#dropdownMenuButtonTime-3');

    let flag_datepicker_1 = false;
    let flag_period_1 = false;
    let flag_time_1 = false;

    let flag_datepicker_2 = false;
    let flag_period_2 = false;
    let flag_time_2 = false;

    let flag_datepicker_3 = false;
    let flag_period_3 = false;
    let flag_time_3 = false;
    
    let next_page = 'booking_client.html';

    let disabled_dates = ["2022-07-29", "2022-07-09"];


    // control next button disabled
    function controlButton() {
        if ( flag_datepicker_1 && flag_period_1 && flag_time_1 && flag_datepicker_2 && flag_period_2 && flag_time_2 && flag_datepicker_3 && flag_period_3 && flag_time_3 ) {
            $btn_next.removeClass('status-disabled');
        } else {
            $btn_next.addClass('status-disabled');
        }
    }


    $("#js-datepicker-1").datepicker({
        // disabled date
        beforeShowDay: function(date){
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [ disabled_dates.indexOf(string) == -1 ]
        },
        dateFormat: 'yy-mm-dd',
        beforeShow: function (input, inst) {
            let $top = $(this).offset().top + $(this).outerHeight() + 6;
            
            setTimeout(function () {
                inst.dpDiv.css({
                    top: $top
                });
            }, 0);
        },
        // verify datepicker empty
        onClose: function(dateText){
            flag_datepicker_1 = dateText.length == 0 ? false : true;
            controlButton();
        }
    });

    $("#js-datepicker-2").datepicker({
        // disabled date
        beforeShowDay: function(date){
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [ disabled_dates.indexOf(string) == -1 ]
        },
        dateFormat: 'yy-mm-dd',
        beforeShow: function (input, inst) {
            let $top = $(this).offset().top + $(this).outerHeight() + 6;
            
            setTimeout(function () {
                inst.dpDiv.css({
                    top: $top
                });
            }, 0);
        },
        // verify datepicker empty
        onClose: function(dateText){
            flag_datepicker_2 = dateText.length == 0 ? false : true;
            controlButton();
        }
    });

    $("#js-datepicker-3").datepicker({
        // disabled date
        beforeShowDay: function(date){
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [ disabled_dates.indexOf(string) == -1 ]
        },
        dateFormat: 'yy-mm-dd',
        beforeShow: function (input, inst) {
            let $top = $(this).offset().top + $(this).outerHeight() + 6;
            
            setTimeout(function () {
                inst.dpDiv.css({
                    top: $top
                });
            }, 0);
        },
        // verify datepicker empty
        onClose: function(dateText){
            flag_datepicker_3 = dateText.length == 0 ? false : true;
            controlButton();
        }
    });


    // verify dropdown
    $dropdown.on('click', function(){
        flag_period_1 = $dropdown_period_1.hasClass('no-value') ? false : true;
        flag_time_1 = $dropdown_time_1.hasClass('no-value') ? false : true;
        flag_period_2 = $dropdown_period_2.hasClass('no-value') ? false : true;
        flag_time_2 = $dropdown_time_2.hasClass('no-value') ? false : true;
        flag_period_3 = $dropdown_period_3.hasClass('no-value') ? false : true;
        flag_time_3 = $dropdown_time_3.hasClass('no-value') ? false : true;
        controlButton();
    });

    // next button
    $btn_next.on('click', function(){
        // enabled
        if ( !$(this).hasClass('status-disabled') ) { 
            $(this).removeClass('status-disabled');
            $(this).attr('href', next_page);
        } else {
            $(this).addClass('status-disabled');
            $(this).attr('href', 'javascript://');
        }
    });

});