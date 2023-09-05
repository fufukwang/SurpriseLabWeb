<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="keywords" content="驚喜製造, 無光晚餐, 一人餐桌, 台北喝酒, 活動, 沉浸式體驗, 週末要幹麻, 好玩, 喝酒">
    <meta name="description" content="歡迎來到《微醺大飯店》——那些你曾經希望能有所不同的事，在這都有可能發生。">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="微醺大飯店：1980s"/>
    <meta property="og:site_name" content="微醺大飯店：1980s"/>
    <meta property="og:description" content="歡迎來到《微醺大飯店》——那些你曾經希望能有所不同的事，在這都有可能發生。"/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/dininginthedark3"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/dininginthedark3/img/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=0">
    <title>微醺大飯店：1980s</title>

    <!-- Style -->
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/plugins/bootstrap-4.1.0/bootstrap.css"/>

    <!-- Loading Animation CSS -->
    <link rel="stylesheet" type="text/css" href="css/plugins/imagesloaded/loading.css"/>

    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome/fontawesome.min.css"/>

    <!-- Select2 style -->
    <link rel="stylesheet" href="css/plugins/select2/select2.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css?v=0.1"/>
    <link rel="stylesheet" href="css/form.css"/>
    <link rel="stylesheet" href="css/master.css?=0.1"/>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NKG6X5Z');</script>
<!-- End Google Tag Manager -->
    </head>
    <body class="loading">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKG6X5Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <main class="sections">
        <!-- Header LOGO -->
        <header class="logo">
            <a href="index.html">
                <img src="img/logo_nav.png" alt="The Great Tipsy">
            </a>
            <button class="hamburger">
                <span class="current-section">Lobby</span>
                <span class="current-menu">Menu</span>
                <span class="menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </span>
            </button>
        </header>

        <div class="container" id="masterPage">
            <!-- form -->
            <form id="master">
                <!--progress title-->
                <h3 class="progress-title">《微醺大飯店：1980s》</h3>
                <h5>開幕酒會 賓客身份登錄</h5>

                <!-- fieldsets -->
                <fieldset class="step step-1" title="微醺大飯店：1980s　賓客邀請函">
                    <p class="sub-title text-lining">
                        親愛的賓客您好，您為 <span class="color-yellow">{{ $order->name }}</span> 所邀請之賓客<br/>
                        並將於 <span class="color-yellow">{{ $order->day }} {{ substr($order->rang_start,0,5) }}</span> 前來
                    </p>
                    <div class="form-container">
                        <div class="master-desc">
                            <p>
                                耳聞您即將前來微醺大飯店的開幕酒會<br/>
                                飯店全體人員都相當期待
                            </p>
                            <p>
                                開幕酒會當日有知名歌星、企業家<br/>
                                及諸多知名企業代表到場
                            </p>
                            <p>
                                為使酒會順利進行<br/>
                                並避免閒雜人等之進入，身份控管尤其重要
                            </p>
                        </div>                        
                        <p>
                            請於下方提供您的基本資訊，勾選同意後按下送出<br class="d-sm-inline d-none"/>之後，您將收到《微醺大飯店》開幕酒會邀請函，<br/>
                            本封信非常重要，請務必開啟。
                        </p>
                        <div class="sub-title-wrapper">
                            <h4>
                                <span>information</span>
                            </h4>
                        </div>
                    </div>
                    <div class="form-container">
                        <div class="form-group input-with-label">
                            <label for="name">* 賓客姓名</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="請填寫本名">
                        </div>

                        <div class="form-group input-with-label">
                            <label for="phone">* 賓客電話<span class="error-msg phoneErr" style="display: none;">請填寫正確的格式</span></label>
                            <input type="text" name="phone" class="form-control phone" id="phone" minlength="10" maxlength="10" placeholder="請填寫有效手機號碼">
                        </div>

                        <div class="form-group input-with-label">
                            <label for="email">* 賓客信箱<span class="error-msg emailErr" style="display: none;">請填寫正確的格式</span></label>
                            <input type="email" name="email" class="form-control has-verification email" id="email" placeholder="請填寫有效電子郵件">
                        </div>

                        <div class="form-group radio__button">
                            <div class="d-flex align-items-center">
                                <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                    <input type="checkbox" id="agree" name="agree" class="custom-control-input" value="1" required>
                                    <span class="custom-control-label">我同意收到來自<br class="d-sm-none d-inline"/><span class="color-yellow">《微醺大飯店：1980s》</span>的信件</span>
                                </label>
                            </div>
                        </div>

                        <div class="feature-btn d-flex justify-content-center multi-btn">
                            <button type="submit" name="submit" class="btn-outline submit" id="btn-master-submit" disabled="disabled">
                                送出
                            </button>
                            <input type="hidden" name="id" id="id" value="{{ md5($order->id) }}">
                            <input type="hidden" name="sn" id="sn" value="{{ $order->sn }}">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="submit-page success" id="masterSuccess" style="display:none;">
            <div class="container">
                <h3 class="page-title">《微醺大飯店：1980s》</h3>
                <h5>開幕酒會 賓客身份登錄</h5>
                <p class="page-sub-title">
                    您的賓客資料已成功登錄<br/>
                    請進入信箱，尋找寄送給你的第一封信<br/>
                    ── 《微醺大飯店》開幕酒會邀請函
                </p>
                <div class="page-info">
                    <p>
                        請注意，該封信件特別重要<br/>
                        請互相提醒同行友人務必開啟信件
                    </p>
                    <p>
                        －期待您的蒞臨－
                    </p>
                    <p>
                        順安,<br/>
                        微醺大飯店：1980s
                    </p>
                </div>
                <div class="feature-btn">
                    <a class="btn-outline" href="index.html">完成</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap -->
    <script src="js/plugins/jquery-3.3.1.min.js"></script>
    <script src="js/plugins/jquery-ui.js"></script>
    <script src="js/plugins/popper.min.js"></script>
    <script src="js/plugins/bootstrap-4.1.0/bootstrap.min.js"></script>

    <!-- Loading Animation JS -->
    <script src="js/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- Select2 script-->
    <script src="js/plugins/select2/select2.js?v=0.1"></script>
    <!-- blockUI script-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <!-- tappaysdk -->
    <script src="https://js.tappaysdk.com/tpdirect/v5.4.0"></script>
    <!-- Custom Js -->
    <script src="js/form.js?v=0.15"></script>

    <!-- Testing Button -->
    <script>
        $('#btn-master-submit').on('click', function(){
            // 檢查資料
            var postData = true;
            // 檢查電話
            if($('#phone').val().length != 10){
                $('.phoneErr').show();
                postData = false;
            } else {
                $('.phoneErr').hide();
            }
            // 檢查信箱
            if(! /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test($('#email').val())){
                $('.emailErr').show();
                postData = false;
            } else {
                $('.emailErr').hide();
            }
            if(postData){
                $.blockUI();
                var obj = {
                    'id': $('#id').val(),
                    'sn': $('#sn').val(),
                    'name': $('#name').val(),
                    'tel': $('#phone').val(),
                    'email': $('#email').val(),
                };
                $.post('/dininginthedark3/Team/SlaveStore',obj,function(data){
                    if(data.success==true){
                        $('#masterPage').hide();
                        $('#masterSuccess').fadeIn();
                    } else {
                        var message = '可使用通知數量已滿!';
                        if(typeof data.message != 'undefined') message = data.message;
                        alert(message);
                        window.location.reload(true);
                        console.log('失敗')
                    }
                    $.unblockUI();
                },'json').fail(function() {
                    alert('服務繁忙中請稍後在試!');
                    window.location.reload(true);
                    console.log('錯誤')
                    $.unblockUI();
                });
            }
        });
    </script>

    </body>
</html>
