$(document).ready(function () {
    // glitch 文字雜訊效果
    let glitch = $('.glitch');
    glitch.glitch({
        layers: ['#FF66D2', '#15FFBC'],
        offset: [10, 0]
    });

    // v2 Styling
    let header_logo = $('.logo').find('img');
    let v2_sec = $('.homepage, #About, .about-sec');
    let v2_copywriting = $('.v2-styling');
    let v2_hightlight = $('.v2-highlight');
    let v2_visible = $('.v2-visible');
    let submitInfo = $('#submitInfo');
    let modalMessage = [
        {
            'title': 'Success',
            'tw': '您的資訊已成功送出',
            'en': 'You are connected'
        },
        {
            'title': 'already connected ',
            'tw': '已送過重複手機或Email',
            'en': 'Duplicate contact info'
        }
    ];

    if (isMobile.any) {
        header_logo.attr('src', '/clubT/img/logo_2_mobile@2x.png');

        v2_copywriting.on('touchstart', function(){
            $(this).addClass('v2-shake');
            v2_sec.addClass('v2-glitch-effect');
            header_logo.attr('src', '/clubT/img/landing/1.2_logo_mobile@2x.png');
            v2_hightlight.css('color', '#ffe000');
            v2_visible.css('opacity', 1);
        }).on('touchend', function(){
            $(this).removeClass('v2-shake');
            v2_sec.removeClass('v2-glitch-effect');
            header_logo.attr('src', '/clubT/img/logo_2_mobile@2x.png');
            v2_hightlight.css('color', '#01ffff');
            v2_visible.css('opacity', 0);
        });
    } else {
        v2_copywriting.on('mouseenter', function(){
            $(this).addClass('v2-shake');
            v2_sec.addClass('v2-glitch-effect');
            header_logo.attr('src', '/clubT/img/landing/1.2_logo.png');
            v2_hightlight.css('color', '#ffe000');
            v2_visible.css('opacity', 1);
        }).on('mouseleave', function(){
            $(this).removeClass('v2-shake');
            v2_sec.removeClass('v2-glitch-effect');
            header_logo.attr('src', '/clubT/img/header_logo.png');
            v2_hightlight.css('color', '#01ffff');
            v2_visible.css('opacity', 0);
        });
    }

    // Homepage Video
    let btnPlay = $('.video-play');
    let btnVideoClose = $('.btn-close-video');
    let videoWrapper = $('.video-wrapper');
    let video = $('.video');
    let hintWrapper = $('.hint-wrapper');

    btnPlay.on('click', function () {
        let videoEmbed = $(this).data('video-embed');
        let videoPlaylist = $(this).data('video-playlist');

        video.append('<iframe src="https://www.youtube.com/embed/' + videoEmbed + '?showinfo=0&autoplay=1&repeat=1&loop=1&rel=0&controls=0&playlist=' + videoPlaylist + '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="allowfullscreen" autoplay="autoplay"></iframe>');
        hintWrapper.css('display', 'none');
        videoWrapper.fadeIn();
    });

    btnVideoClose.on('click', function () {
        videoWrapper.hide();
        video.empty();
        hintWrapper.css('display', '');
    });

    // 選擇票券
    let ticket = $('.ticket-frame');

    ticket.on('mouseenter', function () {
        ticket.addClass('has-not-hover');
        $(this).removeClass('has-not-hover');
    }).on('mouseleave', function(){
        ticket.removeClass('has-not-hover');
    });

    // 售票進度 API
    // let progress_api_SaleStep1 = 'https://surpriselab.backme.tw/api/projects/1066json?token=15171aa66ababafd4464a1c194b66102';
    // let progress_api_SaleStep2 = 'https://surpriselab.backme.tw/api/projects/1136json?token=15171aa66ababafd4464a1c194b66102';
    // let progress_api_SaleStep3 = 'https://surpriselab.backme.tw/api/projects/1200json?token=15171aa66ababafd4464a1c194b66102';
    // let progress_api_SaleStep4 = 'https://surpriselab.backme.tw/api/projects/1241json?token=15171aa66ababafd4464a1c194b66102';
    let progress_api_SaleStep5 = 'https://surpriselab.backme.tw/api/projects/1255json?token=15171aa66ababafd4464a1c194b66102';

    // $.when(
    //   $.getJSON(progress_api_SaleStep1),
    //   $.getJSON(progress_api_SaleStep2),
    //   $.getJSON(progress_api_SaleStep3),
    //   $.getJSON(progress_api_SaleStep4),
    //   $.getJSON(progress_api_SaleStep5)
    // ).done(function (data1, data2, data3, data4, data5) {
    $.getJSON(progress_api_SaleStep5, function(data) {

        // data1 = data1[0];
        // data2 = data2[0];
        // data3 = data3[0];
        // data4 = data4[0];
        // var data = data5[0];

        const goal = 1500; // 本次銷售目標票數
        let prev_amount = 0; // 過去售出總票數
        let current_amount = 0; // 現階段售出總票出

        // $.each(data1['rewards'], function (index, ticket) {
        //     // 計算第一階段已售出總票數
        //     prev_amount = prev_amount + parseInt(ticket.pledged_count) * parseInt(ticket.unit);
        // });

        // $.each(data2['rewards'], function (index, ticket) {
        //     // 計算第二階段已售出總票數
        //     prev_amount = prev_amount + parseInt(ticket.pledged_count) * parseInt(ticket.unit);
        // });

        // $.each(data3['rewards'], function (index, ticket) {
        //     // 計算第三階段已售出總票數
        //     prev_amount = prev_amount + parseInt(ticket.pledged_count) * parseInt(ticket.unit);
        // });
        // $.each(data4['rewards'], function (index, ticket) {
        //     // 計算第四階段已售出總票數
        //     prev_amount = prev_amount + parseInt(ticket.pledged_count) * parseInt(ticket.unit);
        // });
        $.each(data['rewards'], function (index, ticket) {
            // 計算第五階段已售出總票數
            current_amount = current_amount + parseInt(ticket.pledged_count) * parseInt(ticket.unit);
        });

        console.log(prev_amount, current_amount);

        let sale_progress = (prev_amount + current_amount) / (prev_amount + goal) * 100; // 募款進度
        let rest_tickets = goal - current_amount; // 剩餘可銷售票數

        // 售票進度最小整數
        sale_progress = Math.floor(sale_progress);

        // 單人票
        let set_1_sale = data['rewards'][0].pledged_count; // 已銷售張數
        let set_1_limit = data['rewards'][0].quantity_limit; // 限量張數
        let set_1_rest = set_1_limit - set_1_sale; // 剩餘可銷售張數

        let set_1 = $('.type-single-player');
        // set_1.find('.total-ticket').html(set_1_limit); // 更新時間有點限制票限量張數
        // set_1.find('.rest-ticket').html(set_1_rest); // 更新時間有點限制票剩餘可銷售張數
        set_1.fadeTo(300, 1);

        if (set_1_rest === 0 && set_1_limit !== 0) {
            set_1.find('.ticket-frame').attr({
                'href': 'javascript://',
                'target': '_self'
            }).addClass('soldout');
            set_1.find('.d-none').attr('src', '/clubT/img/landing/ticket_0319_single_big_soldout.png');
            set_1.find('.d-block').attr('src', '/clubT/img/landing/ticket_0319_single_soldout.png')
        }

        // 四人票
        let set_4_sale = data['rewards'][1].pledged_count; // 已銷售張數
        let set_4_limit = data['rewards'][1].quantity_limit; // 限量張數
        let set_4_rest = set_4_limit - set_4_sale; // 剩餘可銷售張數

        let set_4 = $('.type-multiplayer-for-4');
        // set_4.find('.total-ticket').html(set_4_limit); // 更新時間有點限制票限量張數
        // set_4.find('.rest-ticket').html(set_4_rest); // 更新時間有點限制票剩餘可銷售張數
        set_4.fadeTo(300, 1);

        if (set_4_rest === 0 & set_4_limit !== 0) {
            set_4.find('.ticket-frame').attr({
                'href': 'javascript://',
                'target': '_self'
            }).addClass('soldout');
            set_4.find('.d-none').attr('src', '/clubT/img/landing/ticket_0319_four_big_soldout.png');
            set_4.find('.d-block').attr('src', '/clubT/img/landing/ticket_0319_four_soldout.png')
        }

        // 十人票
        let set_10_sale = data['rewards'][2].pledged_count; // 已銷售張數
        let set_10_limit = data['rewards'][2].quantity_limit; // 限量張數
        let set_10_rest = set_10_limit - set_10_sale; // 剩餘可銷售張數

        let set_10 = $('.type-multiplayer-for-10');
        // set_10.find('.total-ticket').html(set_10_limit); // 更新時間有點限制票限量張數
        // set_10.find('.rest-ticket').html(set_10_rest); // 更新時間有點限制票剩餘可銷售張數
        set_10.fadeTo(300, 1);

        if (set_10_rest === 0 & set_10_limit !== 0) {
            set_10.find('.ticket-frame').attr({
                'href': 'javascript://',
                'target': '_self'
            }).addClass('soldout');
            set_10.find('.d-none').attr('src', '/clubT/img/landing/ticket_0319_ten_big_soldout.png');
            set_10.find('.d-block').attr('src', '/clubT/img/landing/ticket_0319_ten_soldout.png')
        }

        let sale_info = $('.sale-progress-info');
        // sale_info.find('.total-sale').html(prev_amount + current_amount); // 更新總售出張數
        sale_info.find('.total-sale-number').html(prev_amount + current_amount); // 更新總售出張數
        // sale_info.find('.total-rest').html(rest_tickets); // 更新剩餘張數
        sale_info.find('.progress-percent').html(sale_progress); // 更新完成進度百分比

        // 進度超過70％時，區塊上移
        if (sale_progress >= 70) {
            var ticketSec = $('.ticket-sec-status');

            $('#ticketSec').after(ticketSec.clone());
            ticketSec.remove();

            // if (sale_progress >= 100) {
            //     // 進度超過100％時，不顯示剩餘張數
            //     $('.over-sale').hide();
            // }
        }

        sale_info.fadeTo(300, 1);

        // 百分比進度條
        let progress = $('.progress');
        let progress_counter = 0;

        let animate_progress = setInterval(function() {
            if (progress_counter > sale_progress || sale_progress === 0) {
                clearInterval(animate_progress);
            }
            progress.find('.progress-bar').css('width', progress_counter + '%');
            progress_counter++;
        }, 10);

        let timer = setInterval(function () {
            // 剩餘時間倒數器
            let Today = new Date();
            let EndDay = new Date(data.end_date); // 結束時間
            let distance = EndDay - Today;
            let time_rest = $('.time-rest');
            let days, hours, minutes, seconds;

            if (Today < EndDay) {

                days = Math.floor(distance / (1000 * 60 * 60 * 24));
                hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                seconds = Math.floor((distance % (1000 * 60)) / 1000);

                time_rest.find('.days').html(days);
                time_rest.find('.hours').html(hours);
                time_rest.find('.minutes').html(minutes);
                time_rest.find('.seconds').html(seconds);
            } else {
                // // 第一階段售票時間結束時，售票狀況區塊上移，不顯示剩餘張數，不顯示倒數器，不顯示完成進度百分比
                // $('.sec-ticket-status').addClass('up').appendTo('.sec-experience');
                // $('.over-2000').hide();
                // $('.time-counter').remove();
                // $('.progress-percent-area').remove();
                // clearInterval(timer);
            }
        }, 1000);
    });

    /**
     * 每當欄位資料變動時，重新判別是否可啟用下一步按鈕
     */
    $('fieldset input').on('keyup', function () {
        allowChecker($(this).closest('fieldset'));
    });

    /**
     * 檢查是否可送出表單
     */
    function allowChecker(thisStep){
        isAllowToNextStep = true;

        thisStep.find('input:not([type="hidden"])').each(function () {
            var element = $(this);

            if (element.attr('type') === 'checkbox') {

                if (!element.is(':checked')) {
                    isAllowToNextStep = false;
                    return false;
                } else if (element.attr('id') === 'agreerule') {
                    $('#importantNotice').modal('show');
                }

            } else {

                if (!$(this).val()) {
                    isAllowToNextStep = false;
                    return false;
                }

            }
        });

        if (isAllowToNextStep) {
            thisStep.find('.submit-form').attr('disabled', false);
        } else {
            thisStep.find('.submit-form').attr('disabled', true);
        }
    }

    var phoneField = $('#field_phone');

    /**
     * 限制電話欄位僅能輸入數字
     */
    phoneField.bind('keyup paste', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

     // 方便測試資料重複時的畫面，串接後可刪除
    // =================================
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

    /**
     * Submit 
     */
    $(".submit-form").on('click', function(event){
        event.preventDefault();

        if (verificationChecker()) {
            if (get_value === 'data-repeat') { // 電話號碼重複
                showModal(modalMessage[1]);
            } else {
                showModal(modalMessage[0]);
            }
        }
    });

    // ----------------------------
    // International Telephone Input
    // ----------------------------
    var input = document.querySelector("#field_phone"),
    errorMsg = document.querySelector('.field_phone_label .error-msg');

    // initialise plugin
    var iti = window.intlTelInput(input, {
    onlyCountries: ["tw","cn" ,"hk", "mo", "my", "sg"],
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
            isPhoneNumber(input);
        });
    }

    /**
    * 號碼是否符合選擇的國碼長度
    */
    function isPhoneNumber(input) {
        if (input.value.trim()) {
            if (iti.isValidNumber() && isTwPhone(input.value, iti)) {
                input.classList.remove("error");
            } else {
                input.classList.add("error");
            }
        }
    }

    /**
    * 如國碼為886，判斷是否為手機號碼
    */
    function isTwPhone(number, iti) {
    if (iti.selectedCountryData.iso2 === 'tw') {
        if (
            number.length === 10 && number.substring(0, 2) === '09' ||
            number.length === 9 && number.substring(0, 1) === '9') {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
    }

    function verificationChecker() {
        var verification_fields = $('.has-verification');
        var isValid = true;
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
        verification_fields.each(function (index, verification_field) {
            var tmp = $(verification_field);
            var tmpVal = tmp.val();
    
            if (tmp.hasClass('phone')) {
                isPhoneNumber(input);
    
                if (tmp.hasClass('error')) {
                    tmp.closest('.form-group').find('.error-msg').html('號碼長度有誤或非手機號碼，請重新輸入');
                    isValid = false;
                    return false;
                } else {
                    tmp.prev().find('.error-msg').html('');
                    var dialCode = $('.iti__selected-dial-code').text();
                    if (dialCode === '+886') {
                        // 去除多餘的0
                        phoneField.val(parseInt(phoneField.val()).toString());
                    }
                    $('input[name="dial-code"]').val($('.iti__selected-dial-code').text());
    
                }
            } else {
                if (!regex.test(tmpVal)) {
                    tmp.prev().find('.error-msg').html('請確認信箱是否正確');
                    isValid = false;
                    return false;
                } else {
                    tmp.prev().find('.error-msg').html('');
                }
            }
        });
    
        return isValid;
    }

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
