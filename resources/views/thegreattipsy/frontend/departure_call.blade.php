<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Metadata -->
        <meta charset="UTF-8">
        <meta name="keywords" content="驚喜製造, 無光晚餐, 一人餐桌, 台北喝酒, 活動, 沉浸式體驗, 週末要幹麻, 好玩, 喝酒">
        <meta name="description" content="歡迎來到《微醺大飯店》——那些你曾經希望能有所不同的事，在這都有可能發生。">
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="微醺大飯店：1980s"/>
        <meta property="og:site_name" content="微醺大飯店：1980s"/>
        <meta property="og:description" content="歡迎來到《微醺大飯店》——那些你曾經希望能有所不同的事，在這都有可能發生。"/>
        <meta property="og:url" content="https://www.surpriselab.com.tw/thegreattipsy"/>
        <meta property="og:image" content="https://www.surpriselab.com.tw/thegreattipsy/img/opengraph.png"/>
        <meta property="og:image:type" content="image/png"/>
        <meta property="og:image:width" content="600"/>
        <meta property="og:image:height" content="315"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>微醺大飯店：1980s</title>

        <!-- Style -->
        <link rel="icon" href="favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="css/plugins/bootstrap-5.0.0/bootstrap.min.css"/>

        <!-- Ripple Animation Style -->
        <link rel="stylesheet" type="text/css" href="css/plugins/loading.css"/>
        <link rel="stylesheet" type="text/css" href="css/plugins/component.css"/>
        <script>document.documentElement.className = 'js';</script>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/telephonebooth.css">

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WCD7VGK');</script>
        <!-- End Google Tag Manager -->
    </head>
    <body class="loading">

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCD7VGK"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <main id="js-switch-page-wrap" class="switch-wrap">
            <!-- Title -->
            <div class="title-wrap">
                <div class="logo-img-wrap">
                    <img src="./img/brand_tipsy.png" alt="logo">
                </div>
                <div id="js-subtitle-wrap">
                    <p class="subtitle show">接起電話，再一次回到過去。</p>
                    <p class="subtitle">按下播放，聆聽過去。</p>
                </div>
            </div>

            <!-- P1 電話亭外頁面 -->
            <section class="login-wrap switch-item-wrap active phone-outside-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <section id="js-switch-login-wrap" class="switch-wrap">
                                <!-- P1-1 進入鈕 -->
                                <div class="switch-item-wrap active">
                                    <div class="board-wrap login-enter-wrap">
                                        <!-- 進入 P1-2 -->
                                        <button id="js-login-enter-btn" class="board-btn"></button>
                                    </div>
                                </div>
        
                                <!-- P1-2 輸入序號 -->
                                <div class="switch-item-wrap">
                                    <div class="board-wrap login-identification-wrap">
                                        <div class="board-input-wrap">
                                            <input id="js-identification" name="identification" type="text" placeholder="請輸入序號">
                                            <!-- 進入 P1-3 -->
                                            <button id="js-login-identification-btn" class="arrow-btn">
                                                <img src="./img/icon/ic_arrow.png" alt="arrow" 
                                                    srcset="
                                                        ./img/icon/ic_arrow.png 1x,
                                                        ./img/icon/ic_arrow@2x.png 2x,
                                                        ./img/icon/ic_arrow@3x.png 3x">
                                            </button>
                                        </div>
                                    </div>
                                </div>
        
                                <!-- P1-3 輸入密碼 -->
                                <div class="switch-item-wrap">
                                    <div class="board-wrap login-password-wrap">
                                        <div class="board-input-wrap">
                                            <input id="js-password" name="password" type="text" placeholder="請輸入密碼">
                                            <!-- 登入成功，進入 P2 -->
                                            <button id="js-login-password-btn" class="arrow-btn">
                                                <img src="./img/icon/ic_arrow.png" alt="arrow" 
                                                    srcset="
                                                        ./img/icon/ic_arrow.png 1x,
                                                        ./img/icon/ic_arrow@2x.png 2x,
                                                        ./img/icon/ic_arrow@3x.png 3x">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </section>
        
            <!-- P2 電話亭內頁面 -->
            <section class="processing-wrap switch-item-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="phone-outer-wrap">
                                <div id="js-phone-inner-wrap" class="phone-inner-wrap">
                                    <!-- 倒數計時 -->
                                    <div class="phone-element sound-wrap pause">
                                        <span id="js-audio-countdown" class="time-wrap">00:00:00</span>
                                        <div class="sound-img-wrap static show">
                                            <img src="./img/telephone/img_sound-wave.png" alt="static-sound"
                                                srcset="
                                                    ./img/telephone/img_sound-wave.png 1x,
                                                    ./img/telephone/img_sound-wave@2x.png 2x,
                                                    ./img/telephone/img_sound-wave@3x.png 3x">
                                        </div>
                                        <div class="sound-img-wrap dynamic">    
                                            <img src="./img/telephone/img_sound-wave.gif" alt="dynamic-sound" 
                                                srcset="
                                                    ./img/telephone/img_sound-wave.gif 1x,
                                                    ./img/telephone/img_sound-wave@2x.gif 2x,
                                                    ./img/telephone/img_sound-wave@3x.gif 3x">
                                        </div>
                                    </div>

                                    <!-- 播放/暫停 -->
                                    <button id="js-phone-control-btn" class="phone-element phone-control">
                                        <div class="phone-btn-wrap play active">
                                            <div class="btn-img-wrap">
                                                <img src="./img/button/ic_play.png" alt="play" 
                                                    srcset="
                                                        ./img/button/ic_play.png 1x,
                                                        ./img/button/ic_play@2x.png 2x,
                                                        ./img/button/ic_play@3x.png 3x">
                                            </div>
                                            <div class="btn-img-wrap hover">
                                                <img src="./img/button/ic_play_hover.png" alt="play-hover" 
                                                    srcset="
                                                        ./img/button/ic_play_hover.png 1x,
                                                        ./img/button/ic_play_hover@2x.png 2x,
                                                        ./img/button/ic_play_hover@3x.png 3x">
                                            </div>
                                        </div>
                                        <div class="phone-btn-wrap pause">
                                            <div class="btn-img-wrap">
                                                <img src="./img/button/ic_pause.png" alt="pause" 
                                                    srcset="
                                                        ./img/button/ic_pause.png 1x,
                                                        ./img/button/ic_pause@2x.png 2x,
                                                        ./img/button/ic_pause@3x.png 3x">
                                            </div>
                                            <div class="btn-img-wrap hover">
                                                <img src="./img/button/ic_pause_hover.png" alt="pause-hover" 
                                                    srcset="
                                                        ./img/button/ic_pause_hover.png 1x,
                                                        ./img/button/ic_pause_hover@2x.png 2x,
                                                        ./img/button/ic_pause_hover@3x.png 3x">
                                            </div>
                                        </div>
                                    </button>
                                    
                                    <!-- 下載 -->
                                    <a href="javascript:void(0)" download="" id="js-phone-download-btn" class="phone-element phone-download">
                                        <div class="phone-btn-wrap">
                                            <div class="btn-img-wrap">
                                                <img src="./img/button/ic_download.png" alt="download" 
                                                    srcset="
                                                        ./img/button/ic_download.png 1x,
                                                        ./img/button/ic_download@2x.png 2x,
                                                        ./img/button/ic_download@3x.png 3x">
                                            </div>
                                            <div class="btn-img-wrap hover">
                                                <img src="./img/button/ic_download_hover.png" alt="download-hover" 
                                                    srcset="
                                                        ./img/button/ic_download_hover.png 1x,
                                                        ./img/button/ic_download_hover@2x.png 2x,
                                                        ./img/button/ic_download_hover@3x.png 3x">
                                            </div>
                                        </div>
                                    </a>

                                    <!-- 刪除: 跳出彈跳視窗，進入 P2.5 -->
                                    <button type="button" id="js-phone-delete-btn" class="phone-element phone-delete" data-bs-toggle="modal" data-bs-target="#deleteBackdrop">
                                        <div class="phone-btn-wrap">
                                            <div class="btn-img-wrap">
                                                <img src="./img/button/ic_delete.png" alt="delete" 
                                                    srcset="
                                                        ./img/button/ic_delete.png 1x,
                                                        ./img/button/ic_delete@2x.png 2x,
                                                        ./img/button/ic_delete@3x.png 3x">
                                            </div>
                                            <div class="btn-img-wrap hover">
                                                <img src="./img/button/ic_delete_hover.png" alt="delete-hover" 
                                                    srcset="
                                                        ./img/button/ic_delete_hover.png 1x,
                                                        ./img/button/ic_delete_hover@2x.png 2x,
                                                        ./img/button/ic_delete_hover@3x.png 3x">
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    
            <!-- P3 刪除成功頁面 -->
            <section class="finished-wrap switch-item-wrap phone-outside-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="board-wrap locked-wrap">
                                <!-- 進入 P3.5 -->
                                <button id="js-locked-password-btn" class="board-btn"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    
        <!-- P3.5 訊息 -->
        <section id="js-message-wrap" class="message-wrap">
            <div class="message-inner-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="clock-wrap">
                                <p>
                                    於是，不管時針、分針如何運轉；<br><br>
                                    不管時鐘傳來的滴答聲有多響亮，<br><br>
                                    所有時間，都僅指向一個方向，<br><br>
                                    即 ⸺ 當下。
                                </p>
                                <div id="js-time-wrap" class="time-wrap"></div>
                                <button id="js-back-btn" class="back-btn">返回電話亭外</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <!-- P1-2.5 序號錯誤彈跳視窗 -->
        <div class="phone-modal modal fade" id="identificationBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="identificationBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="identificationBackdropLabel">序號錯誤</h5>
                    </div>
                    <div class="modal-body">
                        <p>輸入序號錯誤</p>
                    </div>
                    <div class="modal-footer">
                        <!-- 關閉彈窗 -->
                        <button type="button" data-bs-dismiss="modal">重新輸入序號</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- P1-2.6 消失的過去彈跳視窗 -->
        <div class="phone-modal modal fade" id="disappearPastBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="disappearPastBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="disappearPastBackdropLabel">消失的過去</h5>
                    </div>
                    <div class="modal-body">
                        <p>音檔已被刪除，聽不見過去</p>
                    </div>
                    <div class="modal-footer">
                        <!-- 關閉彈窗，進入 P1 -->
                        <button id="js-get-out-btn" type="button" data-bs-dismiss="modal">返回電話亭外</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- P1-3.5 密碼錯誤彈跳視窗 -->
        <div class="phone-modal modal fade" id="passwordBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="passwordBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="passwordBackdropLabel">密碼錯誤</h5>
                    </div>
                    <div class="modal-body">
                        <p>輸入密碼錯誤</p>
                    </div>
                    <div class="modal-footer">
                        <!-- 關閉彈窗 -->
                        <button type="button" data-bs-dismiss="modal">重新輸入密碼</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- P2.5 刪除 彈跳視窗 -->
        <div class="phone-modal modal fade" id="deleteBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteBackdropLabel">刪除</h5>
                    </div>
                    <div class="modal-body">
                        <p>確定刪除音檔?</p>
                    </div>
                    <div class="modal-footer">
                        <!-- 確認刪除，進入 P3 -->
                        <button type="button" data-bs-dismiss="modal" id="js-delete-btn" class="btn-col-2">確認刪除</button>
    
                        <!-- 不要刪除，關閉彈窗 -->
                        <button type="button" data-bs-dismiss="modal" class="btn-col-2">再考慮一下</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap -->
        <script src="js/plugins/jquery-3.3.1.min.js"></script>
        <script src="js/plugins/jquery-ui.js"></script>
        <script src="js/plugins/popper.min.js"></script>
        <script src="js/plugins/bootstrap-5.0.0/bootstrap.min.js"></script>

        <!-- Ripple Animation Js -->
        <script src="js/plugins/pixi.min.js"></script>
        <script src="js/plugins/TweenMax.min.js"></script>
        <script src="js/plugins/custom-ripple.js"></script>
        <script src="js/plugins/imagesloaded.pkgd.min.js"></script>

        <!-- Custom Js -->
        <script src="js/telephonebooth.js"></script>
    </body>
</html>