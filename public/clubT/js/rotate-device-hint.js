$(document).ready(function () {
    let win = $(window);
    let win_width = win.width();
    let win_height = win.height();

    let hint_wrapper = $('.hint-wrapper');
    let hint_img = $('.hint-img');
    let hint_text = $('.hint-text');

    if (isMobile.phone) {
        hint_img.find('img').attr('src', 'img/icon/rotate_turn-s.gif');
        hint_text.text('請使用直式觀看，以獲得最佳體驗');

        if (win_width > win_height) {
            // 手機橫式時，顯示提示
            hint_wrapper.show();
            hint_img.show();
            hint_text.show();
        } else {
            // 手機直式時，隱藏提示
            hint_wrapper.hide();
            hint_img.hide();
            hint_text.hide();
        }
    } else if (isMobile.tablet) {
        hint_img.find('img').attr('src', 'img/icon/rotate_turn-h.gif');
        hint_text.text('請使用橫式觀看，以獲得最佳體驗');

        if (win_width < win_height) {
            // 平板直式時，顯示提示
            hint_wrapper.show();
            hint_img.show();
            hint_text.show();
        } else {
            // 平板橫式時，隱藏提示
            hint_wrapper.hide();
            hint_img.hide();
            hint_text.hide();
        }
    }

    win.resize(function () {
        let win_width = win.width();
        let win_height = win.height();

        if (isMobile.phone) {
            hint_img.find('img').attr('src', 'img/icon/rotate_turn-s.gif');
            hint_text.text('請使用直式觀看，以獲得最佳體驗');

            if (win_width > win_height) {
                // 手機橫式時，顯示提示
                hint_wrapper.show();
                hint_img.show();
                hint_text.show();
            } else {
                // 手機直式時，隱藏提示
                hint_wrapper.hide();
                hint_img.hide();
                hint_text.hide();
            }
        } else if (isMobile.tablet) {
            hint_img.find('img').attr('src', 'img/icon/rotate_turn-h.gif');
            hint_text.text('請使用橫式觀看，以獲得最佳體驗');

            if (win_width < win_height) {
                // 平板直式時，顯示提示
                hint_wrapper.show();
                hint_img.show();
                hint_text.show();
            } else {
                // 平板橫式時，隱藏提示
                hint_wrapper.hide();
                hint_img.hide();
                hint_text.hide();
            }
        }
    });
});
