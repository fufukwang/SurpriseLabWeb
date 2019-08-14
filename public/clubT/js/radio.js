jQuery(function($){
    // Element
    var channel = 0;
    var screen = $('.radio-screen');
    var switchButton = $('.radio-switch-button');
    var switchForward = $('.forward');
    var switchBack = $('.back');

    // Input
    var submit = $('.submit');
    var radioInput = $('#radio-password');
    var noticeText = '請輸入密碼';
    var radioMessage = $('.radio-message');

    // Radio
    var audiojQuery = $('#audio');
    var audioElement = document.getElementById('audio');
    var radioList = [
        {
            num: 1,
            password: '',
            sound_url: 'Channel-01-WELCOME.mp3',
        },
        {
            num: 2,
            password: 'freedom',
            sound_url: 'Channel-02-welcome.mp3',
        },
        {
            num: 3,
            password: 'freedom1212323',
            sound_url: 'Channel-02-welcome.mp3',
        },
        {
            num: 4,
            password: 'freedom242335',
            sound_url: 'Channel-02-welcome.mp3',
        }
    ];
    var channelLength = radioList.length - 1;

    // 預設為靜音
    audioElement.volume = 0;
    audioElement.load();

    /**
     * 用戶開始輸入後，停止Placeholder
     */
    radioInput.on('keyup', function () {
        window.clearInterval(window.timer);
    });

    /**
     * 收聽按鈕
     * 成功時播放
     * 失敗時顯示錯誤訊息
     */
    submit.on('click', function () {
        var password = radioList[channel].password;

        if (radioInput.val() === password) {
            playMusic();
            radioInput.val(''); // 清空密碼欄位
            radioMessage.text('');
        } else {
            radioMessage.text('密碼長度或大小寫有誤，請重新輸入');
        }
    });

    /**
     * 頻道切換按鈕
     * 更新 Channel 並更換頻道圖
     */
    switchButton.on('click', function () {
        var isSwitch = true; // 判定本次是否要有畫面切換

        $(this).hasClass('forward') ? channel++ : channel--; // 預算點擊後會到哪個頻道

        if (channel < 0) { // 是否超過頻道範圍
            channel = 0;
            isSwitch = false;
        } else if (channel > channelLength) {
            channel = channelLength;
            isSwitch = false;
        }

        if (isSwitch) {
            window.clearInterval(window.timer); // 重置提示動畫
            radioMessage.text(''); // 清空提示訊息
            radioInput.val(''); // 清空密碼欄位

            if ( channel === 0 ) {
                radioInput.attr('placeholder', '無須密碼，直接收聽');
            } else {
                StopMusic();
                resetPlaceholder();
            }

            var imgRoute = '/clubT/img/radio/3_screen-' + radioList[channel].num + '.png';
            screen.addClass('fade');

            setTimeout(() => {
                screen.find('img').attr('src', imgRoute);
                screen.removeClass('fade')
            }, 500);

            switchChecker(); // 確認按鈕是否需要隱藏
        }
    });

    /**
     * 確認頻道按鈕是否需要隱藏
     */
    function switchChecker() {
        switchButton.removeClass('is-disabled');

        if (channel === 0) {
            switchBack.addClass('is-disabled');
        } else if (channel === (channelLength)) {
            switchForward.addClass('is-disabled');
        }
    }

    /**
     * 播放音檔
     */
    function playMusic() {
        audioElement.setAttribute('src', '/clubT/audio/' + radioList[channel].sound_url);
        audioElement.play();
        audioElement.volume = 0.4;
    }

    /**
     * 停止音檔
     */
    function StopMusic() {
        if (isMobile.any) {
            audioElement.pause();
        } else {
            audiojQuery.animate({
                volume: 0
            }, 2000);
        }
    }

    /**
     * Placeholder 提示動畫
     */
    function resetPlaceholder() {
        radioInput.attr('placeholder', '');
        var doc = true;

        window.timer = window.setInterval(( () => {
            if (doc) {
                radioInput.attr('placeholder', noticeText + '.');
                doc = false;
            } else {
                radioInput.attr('placeholder', noticeText);
                doc = true;
            }
        } ), 400);
    }

    /**
     * 禁止圖片拖曳
     */
    $('img').on('dragstart', function(event) { event.preventDefault(); });
});

