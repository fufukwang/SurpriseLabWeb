$(function() {
    // 現在秒數
    const timeInMs = Date.now();
    // Slideshow
    let $home_slideshow = $('.owl-carousel');
    let $home_slideshow_text = $('.ticket-intro');

    // Slideshow Page
    let $current_page = $('.js-current-page');
    let $total_page = $('.js-total-page');

    // Slideshow Progress
    let $progress = $('.bar');

    // Slideshow Nav
    let $btn_prev = $('.js-carousel-prev');
    let $btn_next = $('.js-carousel-next');

    // Slideshow 速度控制
    let slide_time_out = 6000; // 間隔時間
    let slide_speed = 2000; // 卡片切換速度
    let slide_interval = (slide_time_out - slide_speed) / 1000; // 第二圈後間隔時間要扣除卡片切換速度

    // 許願池
    let $wishing_textarea = $('#wishing-textarea');
    let $wishing_btn = $('#wishing-btn');

    // 啟動進度條
    function startProgress() {
        $progress.addClass('start-progress');
    }

    // 重置進度條
    function resetProgress() {
        $progress.removeClass('start-progress');
    }

    // 計算目前頁數
    function pageCounter(event) {
        let page = event.page.index;
        let pages = event.page.count;

        $current_page.html('0' + (page + 1));
        $total_page.html('0' + pages);
    }

    // 判斷許願池是否為空值
    function textareaIsNull() {
        if ($wishing_textarea.val().length <= 0) {
            // 按鈕變禁用狀態
            $wishing_btn.addClass('disabled');

            // 移除 modal
            // $wishing_btn.attr('data-bs-toggle', '');
            // $wishing_btn.attr('data-bs-target', '');
        } else {
            // 按鈕變可用狀態
            $wishing_btn.removeClass('disabled');

            // 開啟許願成功 modal
            // $wishing_btn.attr('data-bs-toggle', 'modal');
            // $wishing_btn.attr('data-bs-target', '#SuccessModal');
        }
    }

    // 重置時間
    function resetTimeOut() {
        $home_slideshow.trigger('stop.owl.autoplay');
        $home_slideshow.trigger('play.owl.autoplay');
    }

    // 觸發 Owl Carousel
    $home_slideshow.owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        items: 1,
        mouseDrag: false,
        responsive: {
            0: {
                margin: 20,
                autoplay: false
            },
            1200: {
                margin: 16,
                autoplay: true,
                autoplayTimeout: slide_time_out,
                autoplaySpeed: slide_speed,
                autoplayHoverPause: true
            }
        }
    });

    // 啟動進度條
    startProgress();

    // 初始化
    $home_slideshow.on('initialized.owl.carousel', function() {
        // 啟動進度條
        startProgress();
    });

    // 當 slideshow 過場中
    $home_slideshow.on('translate.owl.carousel', function() {
        // 重置進度條
        resetProgress();

        // 第二圈速度調整
        $progress.css('transition-duration', '');

        // 隱藏卡片文字
        $home_slideshow_text.hide();
    });

    // 當 slideshow 過場完成時
    $home_slideshow.on('translated.owl.carousel', function() {        
        // 啟動進度條
        startProgress();

        // 第二圈速度調整
        $progress.css('transition-duration', slide_interval + 's');

        // 淡入卡片文字
        $home_slideshow_text.fadeIn(slide_speed / 2.5);
    });

    // 當 slideshow 換頁完成
    $home_slideshow.on('changed.owl.carousel', function(event) {
        // 計算目前頁數
        pageCounter(event);
    });

    // Custom Prev Button
    $btn_prev.on('click', function() {
        $home_slideshow.trigger('prev.owl.carousel', slide_speed);

        // 重置時間
        resetTimeOut();
    });

    // Custom Next Button
    $btn_next.on('click', function() {
        $home_slideshow.trigger('next.owl.carousel', slide_speed);

        // 重置時間
        resetTimeOut();
    });

    // 判斷許願池是否為空值
    $wishing_textarea.on('input', function() {
        textareaIsNull();
    });


    // 送出驚喜願望
    $wishing_btn.on('click',function(){
        let wishText = $wishing_textarea.val();
        if(!$(this).hasClass('disabled') && wishText!=''){
            $.getJSON('https://api.ipify.org?format=jsonp&callback=?', function(ipify) {
                // $.ajax();
                let obj = {
                    ip: ipify.ip,
                    wish: wishText,
                };
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: "POST",
                    url: '/storeWish',
                    data: obj,
                    dataType: "json",
                    beforeSend: function( xhr ) { $wishing_btn.remove(); }
                }).done(function(data){
                    if(parseInt(data.success)==1){
                        let next_time = timeInMs + 31536000000
                        Cookies.set('next_surprise_desire', next_time, { expires: 380 });
                        $wishing_textarea.addClass('disabled');
                        $wishing_textarea.attr('placeholder',"今年的你已經許過願望囉！\n如果驚喜尚未出現，歡迎直接起身製造驚喜吧。");
                        $wishing_textarea.val('');
                        
                        $('#SuccessModal').modal('show');
                    } else {
                        console.log('錯誤?');
                    }
                })
            });
        }
    });
    // 


    



    // 判斷 local 端的儲存時間
    let next_desire_time = Cookies.get('next_surprise_desire');
    let lock_textarea = false;
    if(typeof next_desire_time == 'string' && parseInt(next_desire_time)>parseInt(timeInMs)){ lock_textarea = true; }
    if(lock_textarea){
        $wishing_textarea.addClass('disabled');
        $wishing_textarea.attr('placeholder',"今年的你已經許過願望囉！\n如果驚喜尚未出現，歡迎直接起身製造驚喜吧。");
        $wishing_btn.remove();
    }

});