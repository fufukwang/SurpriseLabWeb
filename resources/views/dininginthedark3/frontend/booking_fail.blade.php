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
    <link rel="stylesheet" href="css/submit.css"/>

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
<!-- Anchor menu -->
<nav class="anchor-wrapper">
    <div class="mobile-menu-hand">
        <!-- Mr Tipsy's hand in mobile -->
    </div>
    <ul>
        <li>
            <a class="lobby" href="index.html#Lobby">Lobby</a>
        </li>
        <li>
            <a class="about" href="index.html#About">About</a>
        </li>
        <li>
            <a class="ticket" href="index.html#Ticket">Ticket</a>
        </li>
        <li>
            <a class="rules" href="rules.html">Rules</a>
        </li>
        <li>
            <a class="library" href="index.html#Library">Library</a>
        </li>
        <li>
            <a class="contact" href="index.html#Contact">Contact</a>
        </li>
    </ul>
</nav>
<!-- End anchor menu -->

<!-- Social Links -->
<aside class="social-wrapper">
    <ul>
        <li class="social-link">
            <a href="https://www.facebook.com/surpriselabtw" target="_blank">
                <i class="icon-fb"></i>
            </a>
        </li>
        <li class="social-link">
            <a href="https://www.instagram.com/surpriselabtw/" target="_blank">
                <i class="icon-ig"></i>
            </a>
        </li>
    </ul>
</aside>
<!-- End Social Links -->

<main class="sections">
    <!-- Header LOGO -->
    <header class="logo">
        <a href="index.html">
            <img src="img/web_title_small.png" alt="The Great Tipsy">
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


    <!-- <div class="submit-page error" id="bookingError"> -->
    <div class="submit-page error" id="bookingError">
        <div class="container">
            <h3 class="page-title">
                whoops！預約未成功
            </h3>
            <p class="page-info">
                可能發生以下狀況：<br/>
                1. 付款未成功<br/>
                2. 網路中斷，請確認通訊良好的狀況下再次劃位<br/>
                3. 同時刻有人與你選擇同樣的日期與時段，他比你早完成預約，因而你的預約受到排擠，請再試一次<br/><br/>
                <!--br/>
                若非以上兩種狀況，歡迎來信詢問：<br/>
                <a href="mailto:thegreattipsy@surpriselab.com.tw">thegreattipsy@surpriselab.com.tw</a><br/><br/-->
            </p>
            <div class="feature-btn" style="text-align: center;">
                <a class="btn-outline" @if(isset($sp) && $sp) href="booking_special.html" @else href="booking_pay.html" @endif>重新預約</a>
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
<script src="https://js.tappaysdk.com/tpdirect/v5.5.1"></script>
@if(env('APP_ENV') == 'production')
<script>TPDirect.setupSDK('12098', 'app_kglJZrJS8ltbzL22jO8jZ4LJAoJtx1Siqz8UcqRDJOmu3TnnfSUBLVhKRxWm', 'production');</script>
@else
<script>TPDirect.setupSDK('12098', 'app_kglJZrJS8ltbzL22jO8jZ4LJAoJtx1Siqz8UcqRDJOmu3TnnfSUBLVhKRxWm', 'sandbox');</script>
@endif
<!-- Custom Js -->
<script src="js/form_pay.js?v=0.1"></script>

</body>
</html>
