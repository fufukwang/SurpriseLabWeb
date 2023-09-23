<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購票/預約完成</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Noto+Serif+TC:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/vpt1inn.css">
    <link rel="stylesheet" href="/paris/css/booking.css?0913">
</head>
<body>
    <header>
        <div class="brand-logo">
            <a href="#">
                <img src="/paris/img/brand-logo.png" alt="巴黎舞會 LE BAL PARIS" />
            </a>
        </div>
    </header>
    
    <main id="booking-success">
        <div class="title">
            <img src="/paris/img/deco.svg" />
            <h1>預約完成</h1>
            <h3>Reservation completed</h3>
        </div>
        <div class="info">
            恭喜完成入場預約，以下為你的舞會入場券<br>
            這場絕無僅有的奇幻晚宴，期待你的蒞臨<br>
            <br>
            舞會開始前，你將收到赴約的行前須知<br>
            更多舞會細節，歡迎點擊下方按鍵了解
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
                <div>111 台北市士林區的某棟秘密建築</div>
                <div class="note">（詳細地點請容許我們先保密，我們將慢慢向你揭露）</div>
            </div>
        </div>
        <div class="actions">
            <a class="p-btn primary" href="#">關於巴黎舞會</a>
        </div>
    </main>

    <footer id="main-footer">
        <div class="social">
            <a target="_blank" href="https://www.facebook.com/surpriselabtw">
                <img src="/paris/img/social_fb.svg" />
            </a>
            <a target="_blank" href="https://www.instagram.com/surpriselabtw">
                <img src="/paris/img/social_ig.svg" />
            </a>
        </div>
        <div class="copyright">Copyright © 2023 Surprise Lab. All rights reserved.</div>
    </footer>
</body>
</html>