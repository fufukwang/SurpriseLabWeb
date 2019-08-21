<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    @include('clubtomorrow.frontend._metadata')
    <meta property="og:url" content="https://www.surpriselab.com.tw/clubtomorrow/radio.html"/>
    <meta name="viewport" content="width=device-width, height=device-height, maximum-scale=1.0, initial-scale=1.0, user-scalable=0">
    <title>明日俱樂部 Club Tomorrow</title>


    <!-- Style -->
    <link rel="icon" href="/clubT/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/clubT/css/plugins/bootstrap.css"/>

    <!-- Ripple Animation Style -->
    <link rel="stylesheet" type="text/css" href="/clubT/css/plugins/loading.css"/>
    <script>document.documentElement.className = 'js';</script>

    <!-- OwlCarousel2 -->
    <link rel="stylesheet" href="/clubT/css/plugins/owl/owl.carousel.min.css"/>
    <link rel="stylesheet" href="/clubT/css/plugins/owl/owl.theme.default.min.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/clubT/css/style.css"/>
    <link rel="stylesheet" href="/clubT/css/radio.css"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    @include('clubtomorrow.frontend._gtm')
    @include('clubtomorrow.frontend._fbpixel')
</head>

<body class="loading">
    <div class="homepage">
        <!-- Header LOGO -->
        <header class="d-flex align-items-end">
            <div class="container">
                <!-- Header LOGO -->
                <div class="logo-wrapper">
                    <div class="logo">
                        <img src="/clubT/img/header_logo.png" alt="明日俱樂部 Club Tomorrow">
                    </div>
                </div>
            </div>
        </header>

        <main class="sections">
            <p class="page-intro">
                在你所熟悉的世界之外，還有另一個世界同時存在收聽電台，聆聽這世界
            </p>

            <!--Radio Start-->
            <div class="radio-wrapper">
                <div class="bg-top">
                    <img src="/clubT/img/radio/3_top.png" alt="">
                    <div class="radio-inner sec-top d-flex">
                        <div class="radio-screen">
                            <img src="/clubT/img/radio/3_screen-1.png" alt="welcome">
                        </div>
                        <div class="radio-switch-buttons flex-fill">
                            <div class="radio-switch-button forward">
                                <img src="/clubT/img/radio/3_forward.png" alt="channel-forward">
                                <img class="disabled" src="/clubT/img/radio/3_forward_d.png" alt="channel-forward-disabled">
                            </div>
                            <div class="radio-switch-button back is-disabled">
                                <img src="/clubT/img/radio/3_back.png" alt="channel-back">
                                <img class="disabled" src="/clubT/img/radio/3_back_d.png" alt="channel-back-disabled">
                            </div>
                        </div>
                    </div>

                    <div class="radio-inner sec-middle">
                        <div class="d-flex justify-content-between">
                            <input id="radio-password" type="text" name="radio-password" placeholder="無須密碼，直接收聽" class="flex-fill"/>
                            <button type="button" class="submit" class="fbpx" data-event="radio">收聽</button>
                        </div>
                        <p id="status" class="radio-message"></p>
                    </div>
                </div>

                <div class="radio-inner sec-bottom">
                    <img src="/clubT/img/radio/3_bottom.png" alt="">
                    <a href="index.html#aboutSec" class="d-none btn-bright-blue cat-button fbpx" data-event="radiotosite">了解明日俱樂部</a>
                </div>
            </div>

            <audio id="audio" style="display:none;" src="audio/Channel-01-WELCOME.mp3"></audio>
            <!--Radio End-->
        </main>
    </div>


<!-- Bootstrap -->
<script src="/clubT/js/plugins/jquery-3.3.1.min.js"></script>
<script src="/clubT/js/plugins/popper.min.js"></script>
<script src="/clubT/js/plugins/bootstrap.min.js"></script>

<!-- Ripple Animation Js -->
<script src="/clubT/js/plugins/imagesloaded.pkgd.min.js"></script>

<!-- isMobile -->
<script src="/clubT/js/plugins/isMobile.min.js"></script>

<!-- Aos -->
<script src="/clubT/js/plugins/aos.min.js"></script>
<script src="/clubT/js/main.js"></script>
<script src="/clubT/js/radio.js"></script>
<script type="text/javascript">fbq('trackCustom', 'radioview');</script>
</body>
</html>
