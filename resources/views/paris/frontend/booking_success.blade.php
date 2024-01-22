<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="巴黎舞會 Le Bal de Paris de Blanca Li 一場前所未有的沉浸式 VR 體驗，邀上你想共舞的人，在巴黎午夜跳場最自由的舞，做場最真實的夢">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="巴黎舞會 Le Bal de Paris de Blanca"/>
    <meta property="og:site_name" content="巴黎舞會 Le Bal de Paris de Blanca"/>
    <meta property="og:description" content="巴黎舞會 Le Bal de Paris de Blanca Li 一場前所未有的沉浸式 VR 體驗，邀上你想共舞的人，在巴黎午夜跳場最自由的舞，做場最真實的夢"/>
    <meta property="og:url" content="https://surpriselab.com.tw/lebaldeparis/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/paris/img/og-image.jpg"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>
    <meta name="twitter:title" content="巴黎舞會 Le Bal de Paris de Blanca">
    <meta name="twitter:description" content="巴黎舞會 Le Bal de Paris de Blanca Li 一場前所未有的沉浸式 VR 體驗，邀上你想共舞的人，在巴黎午夜跳場最自由的舞，做場最真實的夢">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/paris/img/og-image.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <title>預約成功｜巴黎舞會 Le Bal de Paris de Blanca</title>
    <link rel="icon" href="/paris/img/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Noto+Serif+TC:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/vpt1inn.css">
    <link rel="stylesheet" href="/paris/css/booking.css?2401031">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TSCVLLRP');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TSCVLLRP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
    @include('paris.frontend._nav')
    
    <main id="booking-success">
        <div class="title">
            <img src="/paris/img/deco.svg" />
            <h1>預約完成</h1>
            <h3>Reservation completed</h3>
        </div>
        <div class="info">
            恭喜完成預約，巴黎舞會期待你的蒞臨<br>
            <br>
            稍後你將收到訂位確認信<br>
            當日將依訂位確認信報到入場<br>
            <br>
            若未收到信，請優先尋找垃圾信件匣<br>
            或來信 <a href="mailto:lebaldeparis@surpriselab.com.tw">lebaldeparis@surpriselab.com.tw</a><br>
            <br>
            赴約舞會前，你將收到行前須知<br>
            更多細節，歡迎點擊下方按鍵了解
        </div>
        <div class="ticket">
            <table>
                <tr>
                    <td>票種</td>
                    <td>{{$data['ticket']}}</td>
                </tr>
                <tr>
                    <td>張數</td>
                    <td>{{$data['num']}}</td>
                </tr>
                <tr>
                    <td>預約日期</td>
                    <td>{{$data['day']}}</td>
                </tr>
                <tr>
                    <td>預約時段</td>
                    <td>{{$data['time']}}</td>
                </tr>
                <tr>
                    <td>金額</td>
                    <td>{{$data['money']}} 元</td>
                </tr>
            </table>
            <div class="addr">
                <svg width="11" height="16" viewBox="0 0 11 16" fill="none">
                    <path d="M5.5 0C2.46269 0 0 2.51473 0 5.61624C0 8.71775 5.5 16 5.5 16C5.5 16 11 8.71775 11 5.61624C11 2.51473 8.54073 0 5.5 0ZM5.5 8.60249C3.88557 8.60249 2.57898 7.26479 2.57898 5.61973C2.57898 3.97468 3.88899 2.63698 5.5 2.63698C7.11101 2.63698 8.42102 3.97468 8.42102 5.61973C8.42102 7.26479 7.11101 8.60249 5.5 8.60249Z" fill="#016060"/>
                </svg>
                <div>國立臺灣科學教育館</div>
                <div class="note">
                    111臺北市士林區士商路189號 B1 兒童廳
                </div>
            </div>
        </div>
        <div class="actions">
            <a class="p-btn primary" href="/lebaldeparis/rules">關於巴黎舞會</a>
        </div>
    </main>

    @include('paris.frontend._footer')

    <script src="/paris/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="/paris/js/main.js?231003"></script>
</body>
</html>