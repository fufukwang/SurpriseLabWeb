jQuery(function($){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Image Loading 頁面載入動畫
    document.body.classList.add('render');

    setTimeout(function(){
        imagesLoaded(document.body, function(){
            document.body.classList.remove('loading');
        })
    }, 1000);

    var glitch = $('.glitch');
    var glitch_origin = glitch.html();
    var introWrapper = $('.intro-wrapper');
    var startGameButton = $('.start-game');
    var timeout = false;
    var phoneField = $('#phone');
    var agreeCheckbox = $('#agree');
    var shell = $('.shell');
    var submitInfo = $('#submitInfo');
    var modalMessage = [
        {
            'title': 'you are connected',
            'tw': '請即刻檢查你的通訊裝置',
            'en': 'I have a message for you'
        },
        {
            'title': 'already connected ',
            'tw': '已寄過此通訊裝置',
            'en': 'Check your message box again'
        }
    ];
    var modalContent = modalMessage[0];

    // ----------------------------
    // glitch 文字雜訊效果
    // ----------------------------
    glitch.glitch({
        layers: ['#FF66D2', '#15FFBC'],
        offset: [10, 0]
    });

    // 方便測試資料重複時的畫面，串接後可刪除
    // =================================
    /*
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
          sURLVariables = sPageURL.split('&'),
          sParameterName,
          i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };

    var get_value = getUrlParameter('status');

    if (get_value === 'data-repeat') { // 電話號碼重複
        glitch.html('').html(glitch_origin); // 清除文字雜訊效果
        modalContent = modalMessage[1];
        showModal(modalContent);
    } else if (get_value === 'timeout') { // 超過倒數日
        timeout = true;
    }
    */
    // =================================

    // ----------------------------
    // International Telephone Input
    // ----------------------------
    var input = document.querySelector("#phone"),
      errorMsg = document.querySelector("#error-msg");

    // initialise plugin
    var iti = window.intlTelInput(input, {
        onlyCountries: ["tw","hk","mc","ch","my","sn"],
        initialCountry: "tw",
        separateDialCode: true,
        formatOnDisplay: true,
        nationalMode: true,
        utilsScript: "utils.js"
    });

    var reset = function() {
        input.classList.add("error");
        errorMsg.innerHTML = "";
    };

    // on keyup, countrychange: validate field
    var eventList = ['keyup', 'countrychange'];
    for(event of eventList) {
        input.addEventListener(event, function() {
            reset();
            if (input.value.trim()) {
                if (iti.isValidNumber()) {
                    input.classList.remove("error");
                } else {
                    input.classList.add("error");
                    errorMsg.innerHTML = '格式錯誤，請重新輸入號碼';
                }
            }
        });
    }

    // ----------------------------
    // Time Counter
    // ----------------------------
    var time_rest = $('.time-rest');
    var days, hours, minutes, seconds;

    var timer = setInterval(function () {
        var Today = new Date();
        var EndDay = new Date(2019,8,3);
        var distance = EndDay - Today;

        if (distance > 0 && !timeout) {

            days = Math.floor(distance / (1000 * 60 * 60 * 24));
            hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            seconds = Math.floor((distance % (1000 * 60)) / 1000);

            time_rest.find('.days').html(digitsFormat(days));
            time_rest.find('.hours').html(digitsFormat(hours));
            time_rest.find('.minutes').html(digitsFormat(minutes));
            time_rest.find('.seconds').html(digitsFormat(seconds));

        } else {
            RandomTimer();
            clearInterval(timer);
        }
    }, 1000);

    function RandomTimer() {
        setInterval(function () {
            days = Math.floor((Math.random() * 50));
            time_rest.find('.days').html(digitsFormat(days));
        }, 700);

        setInterval(function () {
            hours = Math.floor((Math.random() * 24));
            time_rest.find('.hours').html(digitsFormat(hours));
        }, 200);

        setInterval(function () {
            minutes = Math.floor((Math.random() * 60));
            time_rest.find('.minutes').html(digitsFormat(minutes));
        }, 300);

        setInterval(function () {
            seconds = Math.floor((Math.random() * 60));
            time_rest.find('.seconds').html(digitsFormat(seconds));
        }, 500);
    }

    /**
     * 自動把數字補齊為2位數
     */
    function digitsFormat(num) {
        num = num.toString().length < 2 ? '0' + num : num;
        return num;
    }

    // ----------------------------
    // Custom Caret
    // ----------------------------
    $(function () {
        return phoneField.val(shell.text());
    });

    textCheck = function () {
        var cur, oldVal;
        cur = phoneField.val();
        if (cur !== oldVal) {
            shell.text(phoneField.val());
        }
        return oldVal = cur;
    };

    var sentinel = setInterval(textCheck, .1);

    // ----------------------------
    // Form Checker
    // ----------------------------
    /**
     * 用戶點擊按鈕「點擊進入」後，展開表單
     */
    glitch.on('click', function () {
        introWrapper.addClass('el-fill').trigger('change');
        glitch.html('').html(glitch_origin); // 清除文字雜訊效果
    });

    /**
     * 表單展開時自動Focus電話欄位
     */
    introWrapper.on('change', function () {
       if ($(this).hasClass('el-fill')) {
           phoneField.focus();
       }
    });

    /**
     * 驗證電話格式及確認是否已勾選隱私條款
     * 通過後才可以送出表單
     */
    $('input').on('change keyup countrychange', function () {
        startGameButton.attr('disabled', true);

        if (agreeCheckbox.is(':checked') && phoneField.val()) {
            startGameButton.attr('disabled', false);
        }
    });

    /**
     * 表單送出
     */
    startGameButton.on('click', function () {
        var dialCode = $('.iti__selected-dial-code').text();
        if (dialCode === '+886') {
            // 去除多餘的0
            phoneField.val(parseInt(phoneField.val()).toString());
        }
        $('input[name="dial-code"]').val($('.iti__selected-dial-code').text());
        if (phoneValChecker()) {
            //showModal(modalContent);
            $.post('/clubtomorrow/getting_intro_sms',{
                act       : 'checker',
                agree     : $('input[name="agree"]').prop('checked') ? 1 : 0,
                dial_code : $('input[name="dial-code"]').val(),
                phone     : $('#phone').val(),
            },function(data){
                if(data.success==true){
                    showModal(modalMessage[0]);
                } else {
                    showModal(modalMessage[1]);
                }
            },'json').fail(function() {
                showModal(modalMessage[1]);
            })
        }
    });

    function phoneValChecker() {
        if (phoneField.hasClass('error')) {
            // errorMsg.innerHTML = "電話號碼重複，請重新輸入";
            errorMsg.classList.add("show");
            phoneField.val('').focus();
            startGameButton.attr('disabled', true);

            return false;

        } else {
            return true;
        }
    }

    /**
     * 隱私權條款，閱讀完畢＆同意後，自動勾選同意及Focus電話欄位
     */
    $('#personalCapital .close').on('click', function () {
        agreeCheckbox.prop('checked', 'true').trigger('change');
        phoneField.focus();
    });

    /**
     * 表單成功送出視窗，點擊Ok後，恢復成剛進入頁面的樣式
     */
    submitInfo.find('.close').on('click', function () {
        introWrapper.toggleClass('el-fill').change();
    });

    /**
     * 限制電話欄位僅能輸入數字
     */
    phoneField.bind('keyup paste', function() {
        this.value = this.value.replace(/[^0-9 ]/g, '');
    });

    /**
     * Custom Scroll Bar
     */
    new SimpleBar($('.modal-body-container')[0], {
        autoHide: true,
        scrollbarMinSize: 6
    });

    /**
     * 切換內容並開啟Modal
     * @param modalContent json
     */
    function showModal(modalContent) {
        submitInfo.find('.modal-title').html(modalContent.title);
        submitInfo.find('.modal-body h2').html(modalContent.tw);
        submitInfo.find('.modal-body h6').html(modalContent.en);
        submitInfo.modal('show');
    }
});
