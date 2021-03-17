let data2 = [
    {"id": "TM953NMMCS", "password": "0000", "fileName": "test.mp3"},
    {"id": "EF915URJFK", "password": "1111", "fileName": ""} // 音檔刪除
];

let current_user_pw = "";
let current_user_file = "";

let id_rule = /^[a-zA-Z\d]{10}$/;
let password_rule = /^[\d]{4}$/;


function timeFormat(time) {
    return (time < 10 ) ? `0${time}` : time;
}

/* update system clock */
function updateClock() {
    let today = new Date();
    let year = today.getFullYear();
    let month = today.getMonth() + 1;
    let date = today.getDate();
    let hour = today.getHours();
    let min = today.getMinutes();
    let sec = today.getSeconds();
    
    $('#js-time-wrap').text(`${year}/${timeFormat(month)}/${timeFormat(date)} ${timeFormat(hour)}:${timeFormat(min)}:${timeFormat(sec)}`);
}

/* init */
setInterval(updateClock, 1000);


$(function() {
    let $switch_page_wrap = $('#js-switch-page-wrap');
    let $switch_login_wrap = $('#js-switch-login-wrap');
    let $phone_inner_wrap = $('#js-phone-inner-wrap');
    let $subtitle_wrap = $('#js-subtitle-wrap');

    // audio
    let $phone_audio_countdown_wrap = $('#js-audio-countdown');
    let audio_player = new Audio();
    let total_sec = 0;

    // button
    let $login_enter_btn = $('#js-login-enter-btn');
    let $login_identification_btn = $('#js-login-identification-btn');
    let $login_password_btn = $('#js-login-password-btn');
    
    let $phone_control_btn = $('#js-phone-control-btn');
    let $phone_download_btn = $('#js-phone-download-btn');
    
    let $modal_delete_btn = $('#js-delete-btn');
    let $locked_btn = $('#js-locked-password-btn');
    let $message_back_btn = $('#js-back-btn');
    let $modal_get_out_btn = $('#js-get-out-btn');

    // input
    let $identification_input = $('#js-identification');
    let $password_input = $('#js-password');


    /* change view */
    function changeView($target, direction) {
        let $switch_items = $target.find('.switch-item-wrap');
        let $current_item = $switch_items.filter('.active');
        $current_item.removeClass('active');
        
        switch (direction) {
            case 'prev':
                let $prev_item = $current_item.prev();
                $prev_item.addClass('active');
                break;
            case 'next':
                let $next_item = $current_item.next();
                $next_item.addClass('active');
                break;
        }
    }

    /* change subtitle */
    function changeSubtitle() {
        let $current_subtitle = $subtitle_wrap.find('.subtitle').filter('.show');
        $current_subtitle.removeClass('show');
        $current_subtitle.siblings().addClass('show');
    }

    /* set audio */
    function setAudioData() {
        // load audio
        audio_player.src = `./audio/${current_user_file}`;
        audio_player.load();

        // set download file
        $phone_download_btn.attr('href', `./audio/${current_user_file}`);
        $phone_download_btn.attr('download', current_user_file);
    }


    /* update countdown timer */
    function updateTime(currentTime) {
        let rest_sec = Math.floor(total_sec - currentTime);
        let format_sec = timeFormat(rest_sec);
        $phone_audio_countdown_wrap.text(`00:00:${format_sec}`);

        if ( (total_sec - currentTime) == 0 ) {
            $phone_audio_countdown_wrap.text(`00:00:${timeFormat(Math.floor(total_sec))}`);
        }
    }

    /* data format verification */
    function verifyDataFormat(value, rule) {
        return rule.test(value);
    }

    /* data value verification - id */
    function verifyIdValue(value) {
        let flag = 'not-user';
        
        for ( let i=0 ; i < data2.length ; i++ ) {
            // 正確序號
            if ( value == data2[i].id ) {
                current_user_pw = data2[i].password;
                // 音檔未刪除
                if ( data2[i].fileName != "" ) {
                    flag = 'new-user';
                    current_user_file = data2[i].fileName;
                    setAudioData(current_user_file);
                // 音檔已刪除
                } else {
                    flag = 'past-user';
                }
            }
        }
        return flag;
    }

    /* data value verification - password */
    function verifyPasswordValue(value) {
        return (value == current_user_pw) ? true : false;
    }

    /* login - enter */
    $login_enter_btn.on('click', function(){
        changeView($switch_login_wrap, 'next');
    });

    /* login - identification */
    $login_identification_btn.on('click', function(){
        let id_value = $identification_input.val();
        let format_flag = verifyDataFormat(id_value, id_rule);      
        
        // check format
        if ( format_flag ) {
            // check value
            let id_result = verifyIdValue(id_value);
            switch (id_result) {
                case 'new-user':
                    changeView($switch_login_wrap, 'next');
                    break;
                case 'past-user':
                    $('#disappearPastBackdrop').modal('show');
                    break;
                case 'not-user':
                    $('#identificationBackdrop').modal('show');
                    break;
            }
        } else {
            $('#identificationBackdrop').modal('show');
        }
    });

    /* login - password */
    $login_password_btn.on('click', function(){
        let password_value = $password_input.val();
        let format_flag = verifyDataFormat(password_value, password_rule);
        
        // check format
        if (format_flag) {
            // check value
            let value_flag = verifyPasswordValue(password_value);
            if ( value_flag ) {
                $phone_inner_wrap.addClass('zoom');
                changeView($switch_page_wrap, 'next');
                changeSubtitle();
            } else {
                $('#passwordBackdrop').modal('show');
            }
        } else {
            $('#passwordBackdrop').modal('show');
        }
    });

    /* phone - play or pause */
    $phone_control_btn.on('click', function(){
        let $current_btn = $(this).children('.active');

        if ( $current_btn.hasClass('play') ) {
            audio_player.play();
        } else {
            audio_player.pause();
        }
    });

    /* phone modal - delete btn */
    $modal_delete_btn.on('click', function(){
        audio_player.pause(); // pause audio
        $phone_audio_countdown_wrap.text('00:00:00'); // reset countdown
        $phone_inner_wrap.removeClass('zoom');
        changeView($switch_page_wrap, 'next');
        changeSubtitle();
    });

    /* finish - locked btn */
    $locked_btn.on('mouseover', function(){
        $('#js-message-wrap').fadeIn();
    });

    /* message - back btn */
    $message_back_btn.on('click', function(){
        $('#js-message-wrap').fadeOut();
        changeView($switch_page_wrap, 'prev');
        changeView($switch_page_wrap, 'prev');
        changeView($switch_login_wrap, 'prev');
        changeView($switch_login_wrap, 'prev');
        $switch_login_wrap.find('.switch-item-wrap').first().addClass('active');
        $identification_input.val(""); // clear input
        $password_input.val(""); // clear input
    });

    /* past sound - get out btn */
    $modal_get_out_btn.on('click', function(){
        $identification_input.val(""); // clear input
        changeView($switch_login_wrap, 'prev');
    });

    /* when audio file ready */
    audio_player.onloadeddata = function() {
        // set countdown timer
        total_sec = audio_player.duration;

        // update countdown timer
        updateTime(audio_player.currentTime);
    };

    /* when audio current time change */
    audio_player.ontimeupdate = function() {
        // update countdown timer
        updateTime(audio_player.currentTime);
    };

    /* when audio player pause */
    audio_player.onpause = function() {
        $phone_control_btn.find('.play').addClass('active');
        $phone_control_btn.find('.pause').removeClass('active');

        $phone_audio_countdown_wrap.siblings('.dynamic').removeClass('show');
        $phone_audio_countdown_wrap.siblings('.static').addClass('show');
    };

    /* when audio player play */
    audio_player.onplay = function() {
        $phone_control_btn.find('.pause').addClass('active');
        $phone_control_btn.find('.play').removeClass('active');

        $phone_audio_countdown_wrap.siblings('.static').removeClass('show');
        $phone_audio_countdown_wrap.siblings('.dynamic').addClass('show');
    };
});