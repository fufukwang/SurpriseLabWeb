jQuery(function($){
    // Element
    var channel = 0;
    var screen = $('.radio-screen');
    var switchBotton = $('.radio-switch-button');
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
    switchBotton.on('click', function () {
        window.clearInterval(window.timer); // 重置提示動畫
        radioMessage.text(''); // 清空提示訊息
        radioInput.val(''); // 清空密碼欄位

        $(this).hasClass('forward') ? channel++ : channel--;

        if (channel === 0) {
            playMusic();
            radioInput.attr('placeholder', '無須密碼，直接收聽');
        } else {
            StopMusic();
            resetPlaceholder();
        }

        var imgRoute = 'img/radio/3_screen-' + radioList[channel].num + '.png';
        screen.addClass('fade');

        setTimeout(() => {
            screen.find('img').attr('src', imgRoute);
            screen.removeClass('fade')
        }, 500);

        switchChecker(); // 確認按鈕是否需要隱藏
    });

    /**
     * 確認頻道按鈕是否需要隱藏
     */
    function switchChecker() {
        var channelLength = radioList.length;

        switchBotton.removeClass('fade');

        if (channel === 0) {
            switchBack.addClass('fade');
        } else if (channel === (channelLength - 1)) {
            switchForward.addClass('fade');
        }
    }

    /**
     * 播放音檔
     */
    function playMusic() {
        audioElement.setAttribute('src', 'audio/' + radioList[channel].sound_url);
        audioElement.play();
        audiojQuery.animate({
            volume: 0.4
        }, 500);
    }

    /**
     * 停止音檔
     */
    function StopMusic() {
        audiojQuery.animate({
            volume: 0
        }, 2000);
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
});

