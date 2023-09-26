<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>主揪/邀請成功</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Noto+Serif+TC:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/vpt1inn.css">
    <link rel="stylesheet" href="/paris/css/invite.css?0913">
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
    <header>
        <div class="brand-logo">
            <a href="#">
                <img src="/paris/img/brand-logo.png" alt="巴黎舞會 LE BAL PARIS" />
            </a>
        </div>
    </header>
    
    <main id="invite">
        <div class="title">
            <img src="/paris/img/deco.svg" />
            <h1>誠摯邀請</h1>
            <h3>Invitation</h3>
        </div>
        <img class="invite-card" src="/paris/img/invite_card.png" />
        <div class="info">
            親愛的賓客，恭喜你受邀參加《巴黎舞會》，<br>
            你將跨越虛實、享受一場如夢似幻的盛宴。<br>
            <br>
            請填妥下方赴約資訊並送出，<br>
            舞會開始前，你將收到赴約的行前須知。
        </div>
        <form action="invite_success.html" onsubmit="return onFormSubmit()">
            <div class="input-group">
                <label>* 姓名（為維護你的訂位權益，請留全名）</label>
                <input type="text" name="name" class="required" id="name" placeholder="兔子先生">
            </div>
            <div class="input-group">
                <label>手機<span class="error-msg phoneErr" style="display: none;">請填寫正確的格式</span></label>
                <input type="text" name="phone" id="phone" minlength="10" maxlength="10" placeholder="0912345678">
            </div>
            <div class="input-group">
                <label>Emai<span class="error-msg emailErr" style="display: none;">請填寫正確的格式</span></label>
                <input type="email" name="email" id="email" placeholder="lebaldeparis@surpriselab.com.tw" />
            </div>
            <div class="checkboxes">
                <div class="checkbox-group">
                    <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                        <input type="checkbox" name="ck_info" value="1" />
                        <span class="custom-control-label">我同意接收來自《巴黎舞會》的訊息</span>
                    </label>
                </div>
                <div class="checkbox-group">
                    <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                        <input class="required" type="checkbox" name="ck_privacy" value="1" />
                        <span>我已詳讀並遵守</span>
                    </label>
                    <span class="modal-btn">隱私權條款</span>
                </div>
                <div class="checkbox-group">
                    <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                        <input class="required" type="checkbox" name="ck_rule" value="1" />
                        <span>我已詳讀並遵守</span> 
                    </label>
                    <a href="#">舞會規則</a>
                </div>
            </div>
            <div class="actions">
                <button class="p-btn primary" type="submit" disabled>接受邀請</button>
            </div>
            <input type="hidden" name="id" id="id" value="{{ md5($order->id) }}">
            <input type="hidden" name="sn" id="sn" value="{{ $order->sn }}">
        </form>
    </main>

    <main id="invite-success" style="display: none;">
        <div class="title">
            <img src="/paris/img/deco.svg" />
            <h1>邀請成功</h1>
            <h3>Welcome</h3>
        </div>
        <div class="info">
            我們已收到你的赴約資訊，<br>
            更多舞會細節，歡迎點擊下方按鍵了解。<br>
            <br>
            期待你的蒞臨，我們不見不散！
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
    
    <script src="/paris/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <script src="/paris/js/invite.js"></script>
</body>
</html>