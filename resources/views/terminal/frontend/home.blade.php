<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="歡迎來到落日轉運站，我們提供列車、飛機兩種交通方式，準時接駁您前往旅途的終點  ─落日轉運站第一站落點於高雄，其中共有三項沈浸式體驗，為驚喜製造至今規模最大之沉浸式作品">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="落日轉運站 The Sunset Terminal"/>
    <meta property="og:site_name" content="落日轉運站 The Sunset Terminal"/>
    <meta property="og:description" content="歡迎來到落日轉運站，我們提供列車、飛機兩種交通方式，準時接駁您前往旅途的終點  ─落日轉運站第一站落點於高雄，其中共有三項沈浸式體驗，為驚喜製造至今規模最大之沉浸式作品"/>
    <meta property="og:url" content="https://surpriselab.com.tw/terminal/"/>
    <meta property="og:image" content="https://surpriselab.com.tw/terminalAssets/images/opengraph1.jpg"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="落日轉運站 The Sunset Terminal">
    <meta name="twitter:description" content="歡迎來到落日轉運站，我們提供列車、飛機兩種交通方式，準時接駁您前往旅途的終點  ─落日轉運站第一站落點於高雄，其中共有三項沈浸式體驗，為驚喜製造至今規模最大之沉浸式作品">
    <meta name="twitter:image" content="https://surpriselab.com.tw/terminalAssets/images/opengraph1.jpg">
    <meta name="twitter:card" content="summary_large_image">

    <title>落日轉運站 The Sunset Terminal</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Style -->
    <link rel="icon" href="/terminalAssets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/terminalAssets/css/plugins/bootstrap-5.1.3/bootstrap.min.css"/>

    <!-- Loading Style -->
    <link rel="stylesheet" type="text/css" href="/terminalAssets/css/plugins/loading.css"/>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="/terminalAssets/css/plugins/owlcarousel2-2.3.4/owl.carousel.min.css">
    <link rel="stylesheet" href="/terminalAssets/css/plugins/owlcarousel2-2.3.4/owl.theme.default.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/terminalAssets/css/plugins/icomoon/style.css">
    <link rel="stylesheet" href="/terminalAssets/css/main-component.css?date=0218">
    <link rel="stylesheet" href="/terminalAssets/css/activity-component.css?date=0218">
    <link rel="stylesheet" href="/terminalAssets/css/index.css?date=2308171">
    <style>
        .kv_enter {
            position: absolute;
            width: 17%;
            bottom: 40%;
            left: 50%;
            transform: translate(-50%, 0);
            @media (min-width: 1200px) {
                display: none;
            }
        }
        #fform {
            width: 100%;
            min-height: 100vh;
            background: #4C2F9E;
            color: #fff;
            margin: 0;
            line-height: 215%;
        }
        #fform img {
            width: 100%;
            margin-bottom: 20px;
        }
        #fform .title {
            font-size: 30px;
            margin-bottom: 20px;
        }
        #fform ul {
            font-weight: 300;
            padding-left: 1.5em;
            line-height: 170%;
            margin-bottom: 20px;
        }
        #fform .inpit-g {
            display: flex;
            align-items: flex-start;
            flex-wrap: wrap;
            max-width: 350px;
        }
        #fform .err {
            color: #A5A1FF;
            font-weight: 500;
            font-size: 14px;
        }
        @media (min-width: 1400px) {
            #fform .container-xl {
                max-width: 1000px;
            }
        }
        #fform input {
            background: none;
            border: none;
            border-bottom: 1px solid #A5A1FF;
            margin-right: 5px;
            color: #fff;
            -webkit-appearance: none;
            -webkit-border-radius: 0;
            width: calc(100% - 75px);
        }
        #fform input:focus {
            outline: none;
            border-bottom-color: #fff;
        }
        #fform button {
            background: #fff;
            color: #4C2F9E;
            border-radius: 0;
            border-bottom: 2px inset rgba(0,0,0,.5);
            border-left: 2px inset rgba(255,255,255,.5);
            border-right: 2px inset rgba(0,0,0,.5);
            border-top: 2px inset rgba(255,255,255,.5);
            font-size: 15px;
            line-height: 1;
            padding: 6px 10px;
            border-radius: 0;
            width: 70px;
        }
        #fform button:active {
            border-bottom: 2px inset rgba(0,0,0,.5);
            border-left: 2px inset rgba(0,0,0,.6);
            border-right: 2px inset rgba(0,0,0,.5);
            border-top: 2px inset rgba(0,0,0,.5);
        }
        #fform .error-msg {
            font-size: 14px;
            color: #ffa541;
            opacity: 0;
            width: 100%;
            word-break: break-all;
            line-height: 170%;
        }
        #fform .error-msg.show {
            opacity: 1;
        }
    </style>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T7V2BQQ');</script>
<!-- End Google Tag Manager -->
</head>
<body class="loading">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7V2BQQ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
    <!-- fixed btn - message -->
    <aside class="fixed-btn message-btn js-hidden-target">
        <!-- Button trigger modal -->
        <a href="javascript://" class="image-wrap" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <img src="/terminalAssets/images/general/btn_q&a.png" class="pc-style" alt="message">
            <img src="/terminalAssets/images/general/btn_q&a_mobile.png" class="mobile-style" alt="message">
        </a>
    </aside>

    <main class="background-wallpaper">
        <section class="skip-background-light js-hidden-section js-hero-section hero-section" id="home">
            <div class="hero-wrap">
                <div class="hero-img">                
                    <img class="img-fluid d-xl-inline d-none" src="/terminalAssets/images/main/img_kv_close.jpg" alt="落日轉運站">
                    <img class="img-fluid d-xl-none d-inline" src="/terminalAssets/images/main/img_kv_close_mobile.jpg" alt="落日轉運站">
                </div>
                <div class="hero-btn">
                    <a href="#fform">
                        <img class="img-fluid" src="/terminalAssets/images/main/btn_enter.png" alt="落日轉運站">
                    </a>
                </div>
                <a href="#fform">
                    <img class="kv_enter" src="/terminalAssets/images/main/kv_enter.png" alt="落日轉運站">
                </a>
            </div>
        </section>
        
        <section class="section-wrap skip-background-light" id="fform">
            <div class="container-xl">
                <img class="img_fform" src="/terminalAssets/images/main/img_fform.png" alt="落日轉運站">
                <div class="title">無法連上落日轉運站</div>
                <div>建議做法：</div>
                <ul>
                    <li>猜猜看，下一站我們將前往...？</li>
                    <li>留下E-mail，11/15我們將告訴你更多</li>
                    <li>
                        <div class="inpit-g">
                            <input type="text">
                            <button>送出</button>
                            <div class="error-msg">E-mail格式錯誤</div>
                        </div>
                    </li>
                </ul>
                <div class="err">ERR_THESUNSETTERMINAL_DISCONNECTED</div>
            </div>
        </section>

        <!-- Background Scroll Effect -->
        <div class="js-background-light background-light">
            <img class="img-fluid d-xl-inline d-none" src="/terminalAssets/images/main/background_red.png" alt="light">
            <img class="img-fluid d-xl-none d-inline" src="/terminalAssets/images/main/background_red_mobile.png" alt="light">
        </div>
    </main>

    <!-- Modal - message -->
    <div class="modal-message modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">熱門問題</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <div class="image-wrap">
                        <a href="https://www.facebook.com/surpriselabtw/posts/pfbid0JNf62LDHYG3So29CteN6e2qYMrDNzhTYFCnBNV1syHcj3CE7HvPqdQRvGCBYVk7ul" target="_blank"><img src="/terminalAssets/images/other/notice_716x480.jpg" class="pc-style" alt="message"></a>
                        <a href="https://www.facebook.com/surpriselabtw/posts/pfbid0JNf62LDHYG3So29CteN6e2qYMrDNzhTYFCnBNV1syHcj3CE7HvPqdQRvGCBYVk7ul" target="_blank"><img src="/terminalAssets/images/other/notice_460x310.jpg" class="mobile-style" alt="message"></a>
                    </div> -->
                    <div class="accordion-wrap">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-1-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-1-collapseFour" aria-expanded="false" aria-controls="flush-1-collapseFour">
                                    <span class="header-title">落日轉運站是什麼？</span>
                                    <div class="header-icon"></div>
                                </button>
                            </h2>
                            <div id="flush-1-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-1-headingFour" data-bs-parent="#accordionFlushExample-1">
                                <div class="accordion-body">
                                    <p>
                                        驚喜製造 2022.11.10 - 2023.10.15 於高雄推出的沉浸式計畫，包含以交通工具為題的兩項作品：<br>
                                        微醺系列互動表演《微醺列車》及英國團隊DARKFIELD的巡演之作《FLIGHT》，雙作品歷時11個月，超過38,000人次參與體驗。
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-2-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-2-collapseFour" aria-expanded="false" aria-controls="flush-2-collapseFour">
                                    <span class="header-title">落日轉運站結束了嗎？</span>
                                    <div class="header-icon"></div>
                                </button>
                            </h2>
                            <div id="flush-2-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-2-headingFour" data-bs-parent="#accordionFlushExample-2">
                                <div class="accordion-body">
                                    <p>2023.10.15 是《落日轉運站》高雄站的最後一天，相信我們很快會再見的。</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-3-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-3-collapseFour" aria-expanded="false" aria-controls="flush-3-collapseFour">
                                    <span class="header-title">下一站是哪裡？</span>
                                    <div class="header-icon"></div>
                                </button>
                            </h2>
                            <div id="flush-3-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-3-headingFour" data-bs-parent="#accordionFlushExample-3">
                                <div class="accordion-body">
                                    <p>留下E-mail，或關注驚喜製造，獲得《落日轉運站》的最新消息winking face</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn activity-btn" data-bs-dismiss="modal">CLOSE</button> -->
                    <a class="btn activity-btn" href="https://www.surpriselab.com.tw/terminal/rules">更多資訊</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Plugins -->
    <script src="/terminalAssets/js/plugins/jquery-3.5.1.min.js"></script>
    <script src="/terminalAssets/js/plugins/popper.min.js"></script>
    <script src="/terminalAssets/js/plugins/bootstrap-5.1.3/bootstrap.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="/terminalAssets/js/plugins/owlcarousel2-2.3.4/owl.carousel.min.js"></script>

    <!-- Loading Js -->
    <script src="/terminalAssets/js/plugins/imagesloaded.pkgd.min.js"></script>

    <!-- Custom -->
    <script src="/terminalAssets/js/main.js"></script>
    <script src="/terminalAssets/js/index.js?231012"></script>
    <script src="/terminalAssets/js/home-slideshow.js?date=0627"></script>
    <script src="/terminalAssets/js/home-scroll-background.js"></script>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>

    <script>
        $('#fform button').on('click', function() {
            var email = $('#fform input').val();
            var msg = '';
            $('#fform .error-msg').css('opacity', 1);
            if( /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/.test(email) ) {
                msg = '送出中...';
                $('#fform .error-msg').text(msg);

                var t = setTimeout(function(){
                    clearTimeout(t);
                    $.post("https://script.google.com/macros/s/AKfycbyOopK2vyCkhabBS8Flg97LRNbRHqDejMYA0AcXyabWgpuH9jgDsnHnSr5yvFY79YdBdQ/exec", {email: email}, function(data, status){
                        if(data === 'true' && status === 'success') {
                            msg = '已送出';
                        } else {
                            msg = '系統忙碌中，請稍後再試';
                        }
                        $('#fform .error-msg').text(msg);
                    });
                }, 1000);
            } else {
                msg = 'E-mail格式錯誤';
                $('#fform .error-msg').text(msg);
            }
        })
    </script>
</body>
</html>