<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>主揪/邀請成功</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Noto+Serif+TC:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/vpt1inn.css">
    <link rel="stylesheet" href="paris/css/invite.css?0913">
</head>
<body>
    <header>
        <div class="brand-logo">
            <a href="#">
                <img src="paris/img/brand-logo.png" alt="巴黎舞會 LE BAL PARIS" />
            </a>
        </div>
    </header>
    
    <main id="invite">
        <div class="title">
            <img src="paris/img/deco.svg" />
            <h1>誠摯邀請</h1>
            <h3>Invitation</h3>
        </div>
        <img class="invite-card" src="paris/img/invite_card.png" />
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
                <input class="required" type="text" name="name" placeholder="兔子先生" />
            </div>
            <div class="input-group">
                <label>手機</label>
                <input type="text" name="phone" placeholder="0912345678" />
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email" placeholder="lebaldeparis@surpriselab.com.tw" />
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
        </form>
    </main>

    <footer id="main-footer">
        <div class="social">
            <a target="_blank" href="https://www.facebook.com/surpriselabtw">
                <img src="paris/img/social_fb.svg" />
            </a>
            <a target="_blank" href="https://www.instagram.com/surpriselabtw">
                <img src="paris/img/social_ig.svg" />
            </a>
        </div>
        <div class="copyright">Copyright © 2023 Surprise Lab. All rights reserved.</div>
    </footer>
    
    <script src="paris/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="paris/js/invite.js"></script>
</body>
</html>