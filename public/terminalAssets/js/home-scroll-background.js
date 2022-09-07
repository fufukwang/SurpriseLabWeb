$(function() {
    // 背景捲動效果
    let $win = $(window);
    let page_height = $(document).height();

    let $bg_light = $('.js-background-light');

    let current_position = $(this).scrollTop(); // 文檔目前捲動距離
    let offset_end_position_desktop = (-1 * 60); // 位移終點
    let offset_end_position_mobile = (-1 * 70); // 位移終點
    let offset = 0; // 位移量

    //------------------
    // function
    //------------------

    // 計算位移量 for Desktop
    function scrollDistanceDesktop(current_position) {
        offset = (-1 * current_position / page_height * 100);

        if (offset <= offset_end_position_desktop) {
            $bg_light.css('bottom', `${offset_end_position_desktop}%`);
        } else {
            $bg_light.css('bottom', `${offset}%`);
        }
    }

    // 計算位移量 for Mobile
    function scrollDistanceMobile(current_position) {
        offset = (-1 * current_position / page_height * 100);

        if (offset <= offset_end_position_mobile) {
            $bg_light.css('bottom', `${offset_end_position_mobile}%`);
        } else {
            $bg_light.css('bottom', `${offset}%`);
        }
    }

    // 偵測螢幕寬度，提供對應的定位點
    function responsiveBackground() {
        if ($win.width() > 1200) {
            scrollDistanceDesktop(current_position);
        } else {
            scrollDistanceMobile(current_position);
        }
    }

    //------------------
    // Event binding
    //------------------

    // 捲動事件
    $win.on('scroll', function (event) {
        current_position = $(this).scrollTop();

        // 偵測螢幕寬度，提供對應的定位點
        responsiveBackground();
    });

    /* init */

    // 偵測螢幕寬度，提供對應的定位點
    responsiveBackground();
});