//let navigation_type = performance.getEntriesByType("navigation")[0].type;

let navigation_type = ''; // default to safari below 15 
try {
    navigation_type = performance.getEntriesByType("navigation")[0].type;
} catch {

}

let is_inner_page = /rules|booking/.test(document.referrer);
let is_show = new URL(window.location.href).searchParams.get("effect") == 'show';

$(function() {
    // modal
    let $enter_modal = $('#js-enter-modal');
    let $enter_modal_btn = $('#js-enter-btn');

    // board
    let $drag_wrap = $('#js-drag-area');
    let $arrow_left_btn = $('#js-arrow-left');
    let $arrow_right_btn = $('#js-arrow-right');
    let $rotate_target = $('#js-rotate-target');

    let drag_start_x = 0;
    let drag_flag = false;
    let wheel_count = 0;
    let wheel_timestamps = [];
    let rotate_deg = 0;

    let rotate_level = $rotate_target.attr('data-rotate-level');
    let limit_deg = 0;

    switch (rotate_level) {
        case '1':
            limit_deg = 30;
            break;
        case '2':
            limit_deg = 60;
            break;
        case '3':
            limit_deg = 90;
            break;
        case '4':
            limit_deg = 120;
            break;
        case '5':
            limit_deg = 150;
            break;
        case '6':
            limit_deg = 180;
            break;
    }
    

    //------------------
    // function
    //------------------

    // modal enter button
    $enter_modal_btn.on('click', function(event) {
        $enter_modal.fadeOut(250, function () {
            $('body').removeClass('modal-open');
            if ( sessionStorage.getItem('dialog_noshow') !== 'true' ) {
                $('#enter-dialog').fadeIn();
                setEnterDialogSize();
            }
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

    $(window).on('resize', function(){
        setEnterDialogSize();
    });

    $('#enter-dialog .dialog-close').on('click', function(event) {
        $('#enter-dialog').fadeOut();
    });

    $('#enter-dialog .txt').on('click', function(){
        sessionStorage.setItem('dialog_noshow', 'true');
        $('#enter-dialog').fadeOut();
    });

    $('#enter-dialog .img').on('click', function(){
        $('#enter-dialog').fadeOut();

        $('html, body').animate({
            scrollTop: $('#About').offset().top - $('.logo').outerHeight() + 0.5
        }, 800);
    });
    

    











    // Rotate clockwise
    function rotateClockwise(change_deg) {
        change_deg = Math.abs(change_deg) == 0 ? 1 : change_deg;
        rotate_deg+=Math.abs(change_deg);

        // limit rotate degree
        if ( limit_deg != 180 ) {
            if ( rotate_deg > limit_deg ) {
                rotate_deg = limit_deg;
            }
        }

        $rotate_target.css({'transform': `rotate(${rotate_deg}deg)`});
    }

    // Rotate anticlockwise
    function rotateAnticlockwise(change_deg) {
        change_deg = Math.abs(change_deg) == 0 ? 1 : change_deg;
        rotate_deg-=Math.abs(change_deg);

        // limit rotate degree
        if ( limit_deg != 180 ) {
            if ( Math.abs(rotate_deg) > Math.abs(limit_deg) ) {
                rotate_deg = -limit_deg;
            }
        }

        $rotate_target.css({'transform': `rotate(${rotate_deg}deg)`});
    }


    //------------------
    // Event binding
    //------------------

    // mouse down, touch start
    $drag_wrap.on('mousedown touchstart', function(event) {
        // touch
        if (event.originalEvent.touches) {
            drag_start_x = event.touches[0].clientX;
        // mouse
        } else {
            drag_start_x = event.clientX;
        }

        // update drag flag
        drag_flag = true;
    });

    // mousemove, touchmove
    $drag_wrap.on('mousemove touchmove', function(event) {
        if ( drag_flag ) {
            let drag_current_x = 0;
            let drag_offset_x = 0;
            let denominator = event.type == 'mousemove' ? 100 : 20;

            // touch
            if (event.originalEvent.touches) {
                drag_current_x = event.touches[0].clientX;
                drag_offset_x = drag_current_x - drag_start_x;
            // mouse
            } else {
                drag_current_x = event.clientX;
                drag_offset_x = drag_current_x - drag_start_x;
            }

            // drag from right to left
            if ( drag_start_x > drag_current_x ) {
                // rotate clockwise
                rotateClockwise( Math.ceil(drag_offset_x / denominator) );
            // drag from left to right
            } else if ( drag_start_x < drag_current_x ) {
                // rotate anticlockwise
                rotateAnticlockwise( Math.ceil(drag_offset_x / denominator) );
            }
        }       
    });

    // mouse up, touch end
    $drag_wrap.on('mouseup touchend', function(event) {
        // update drag flag
        drag_flag = false;
    });

    
    // mouse wheel
    window.addEventListener('wheel', function(event) {
        // record
        let now = new Date();
        wheel_timestamps.push(now.getTime());
        wheel_count++;
        
        // mouse wheel at a time: about 6 
        // touchpad wheel at a time: about 16 ~ 30
        if ( wheel_count <= 6 ) {
            // scrolling up
            if ( event.deltaY < 0 ) {
                // rotate anticlockwise
                rotateAnticlockwise(2);
            // scrolling down
            } else if ( event.deltaY > 0 ) {
                // rotate clockwise
                rotateClockwise(2);
            }
        }

        // reset
        if ( wheel_timestamps[wheel_count-1] - wheel_timestamps[wheel_count-2] > 35 ) {
            wheel_count = 0;
            wheel_timestamps = [];
        }
    });

    // arrow left button
    $arrow_left_btn.on('click', function(event) {
        // rotate anticlockwise
        rotateAnticlockwise(15);
    });

    // arrow right button
    $arrow_right_btn.on('click', function(event) {
        // rotate clockwise
        rotateClockwise(15);
    });


    /* init */
    switch (navigation_type) {
        case 'reload':
            if ( is_show ) {
                window.location.href = 'index.html';
            }
            break;
        case 'navigate':
            if ( is_inner_page && !is_show ) {
                $('body').removeClass('modal-open');
                $enter_modal.fadeOut();
            }
            break;
    }

});