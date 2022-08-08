$(function(){
    let $btn_next = $('#js-next-btn');

    let $input_name = $('#name');
    let $input_tel = $('#telephone');
    let $input_email = $('#email');
    let $checkbox_agree_rules = $('#agree-rules');
    let $checkbox_agree_privacy = $('#agree-privacy');

    let flag_name = false;
    let flag_tel = false;
    let flag_email = false;
    let flag_agree_rules = false;
    let flag_agree_privacy = false;

    let format_flag_tel = false;
    let format_flag_email = false;

    let next_page = 'booking_check.html';

    let tel_rule = /^09\d{8}$/;
    let email_rule = /^(\w|\.|\-)+@(\w|\.|\-)+\.(\w|\.|\-)+$/;


    // control next button disabled
    function controlButton() {
        if ( flag_name && flag_tel && flag_email && flag_agree_rules && flag_agree_privacy ) {
            $btn_next.removeClass('status-disabled');
        } else {
            $btn_next.addClass('status-disabled');
        }
    }

    // verify input
    function verifyInput() {
        flag_name = $input_name.val().length == 0 ? false : true;
        flag_tel = $input_tel.val().length == 0 ? false : true;
        flag_email = $input_email.val().length == 0 ? false : true;
        controlButton();
    }

    // verify checkbox
    function verifyCheckbox() {
        flag_agree_rules = $checkbox_agree_rules.prop('checked');
        flag_agree_privacy = $checkbox_agree_privacy.prop('checked');
        controlButton();
    }


    // verify input
    $('input[type="text"]').on('input', function(){
        verifyInput();
    });

    // verify checkbox
    $('input[type="checkbox"]').parents('.form-group').on('click', function(){
        verifyCheckbox();
    });

    // next button
    $btn_next.on('click', function(){
        
        if ( !$(this).hasClass('status-disabled') ) {
            
            // verify format
            format_flag_tel = tel_rule.test($input_tel.val());
            format_flag_email = email_rule.test($input_email.val());

            if ( format_flag_tel ) {
                $input_tel.parents('.form-group').removeClass('error-style');
            } else {
                $input_tel.parents('.form-group').addClass('error-style');
            }

            if ( format_flag_email ) {
                $input_email.parents('.form-group').removeClass('error-style');
            } else {
                $input_email.parents('.form-group').addClass('error-style');
            }

            // enabled
            if ( format_flag_tel && format_flag_email ) {
                $(this).removeClass('status-disabled');
                $(this).attr('href', next_page);
            } else {
                $(this).addClass('status-disabled');
                $(this).attr('href', 'javascript://');
            }
        }
    });

    /* init */
    verifyInput();
    verifyCheckbox();
});