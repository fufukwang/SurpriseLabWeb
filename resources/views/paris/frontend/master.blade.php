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
    <title>誠摯邀請｜巴黎舞會 Le Bal de Paris de Blanca</title>
    <link rel="icon" href="/paris/img/favicon.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Noto+Serif+TC:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/vpt1inn.css">
    <link rel="stylesheet" href="/paris/css/plugins/select2.css"/>
    <link rel="stylesheet" href="/paris/css/invite.css?231020">
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
            <div class="input-group phone-group">
                <label>* 手機</label>
                <div class="flex">
                    <div class="code-wrapper">
                        <select id="area_code" name="area_code" class="code" data-placeholder="選擇國碼"></select>
                    </div>
                    <input type="text" name="phone" class="phone required" id="phone" maxlength="10" placeholder="0912345678">
                </div>
                <div class="select-wrapper"></div>
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="text" name="email" id="email" placeholder="lebaldeparis@surpriselab.com.tw" />
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
                    <span class="modal-btn modal-btn-privacy" data-custom-open="modal-privacy">隱私權條款</span>
                </div>
                <div class="checkbox-group">
                    <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                        <input class="required" type="checkbox" name="ck_rule" value="1" />
                        <span>我已詳讀並遵守</span> 
                    </label>
                    <a href="/lebaldeparis/rules">舞會規則</a>
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
            <a class="p-btn primary" href="/lebaldeparis/rules">關於巴黎舞會</a>
        </div>
    </main>

    @include('paris.frontend._footer')

    <div class="modal micromodal-slide" id="modal-privacy" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-custom-close="modal-privacy">
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-privacy-title">
                <div class="modal__header">
                    <div class="modal__title" id="modal-privacy-title">隱私權政策</div>
                    <button class="modal__close" aria-label="Close modal" data-custom-close="modal-privacy"></button>
                </div>
                <div class="modal__body">
                    <div class="modal__content" id="modal-privacy-content">
                        <p>
                            《巴黎舞會 Le Bal de Paris》官方網站 <a class="hover-underline" href="https://www.surpriselab.com.tw/lebaldeparis">https://www.surpriselab.com.tw/lebaldeparis</a>（以下稱「本網站」）為驚喜製造股份有限公司（以下稱「本公司」）所經營，本網站尊重您的隱私權，並致力於保護您的個人資料。於使用《巴黎舞會 Le Bal de Paris》官方網站前，請您詳細閱讀本條之「隱私權政策」（以下稱「本政策」），並隨時注意本網站所公告之相關修改或變更，本公司有權於任何時間修改或變更本隱私權政策之內容。當您使用本網站時，或於任何修改、變更後繼續使用本網站，皆表示您已閱讀、瞭解並同意接受本政策，或該修改、變更後之內容，及同意依據本政策蒐集、處理與利用您的個人資料；如果您無法遵守或不同意本政策之內容，或您所屬的國家、地區排除本政策內容之全部或一部時，請您立即停止使用《巴黎舞會 Le Bal de Paris》官方網站。此外，本公司於未經您許可的情形下，絕不會將您的個人資料提供予任何第三方。<br>
                            若您為未滿二十歲或無完全行為能力，除應符合上述規定外，請於您的法定代理人或監護人閱讀、瞭解並同意本政策及其後修改、變更後之所有內容後，方得使用或繼續使用本網站，否則請立即停止使用。當您使用或繼續使用《巴黎舞會 Le Bal de Paris》官方網站時，即視為您的法定代理人或監護人已閱讀、瞭解並同意接受本政策及其後修改、變更之所有內容。<br>
                            個人資料之類別：當您使用本網站之服務，本公司會請您提供您下列類別的個人資料，如：<br>
                            辨識個人者（例如：姓名、住址、電子郵件信箱、行動電話）、<br>
                            辨識財務者（例如：信用卡或簽帳卡之號碼、銀行帳戶之號碼與姓名）、<br>
                            生活格調（例如：使用消費品之種類及服務之細節、個人之消費模式）、<br>
                            資料主體所取得之財貨或服務（例如：貨物或服務之有關細節）、<br>
                            財務交易（例如：收付金額、支付方式、往來紀錄）、<br>
                            資料主體之商業活動（例如：商業種類、提供或使用之財貨或服務、商業契約）、<br>
                            約定或契約（例如：關於交易、商業、法律或其他契約、代理）、<br>
                            未分類之資料（例如：用餐意見、無法歸類之檔案、報告），<br>
                            及其他任何得以直接或間接方式識別個人之資料等。<br>
                            惟請注意，您於《巴黎舞會 Le Bal de Paris》官方網站中進行交易時，所輸入之信用卡卡號、有效日期及授權碼，均僅儲存於您個人之行動裝置中，本網站將不會蒐集、處理或利用您上述個人資料。<br>
                            個人資料之利用：當您在《巴黎舞會 Le Bal de Paris》官方網站登錄個人資料以進行相關交易時，即視為您已同意本公司蒐集、處理及利用您的個資，不論該筆交易是否完成，您所留下的個人資料包括但不限於姓名、電子郵件地址、手機號碼及發票寄送地址等，將在本網站妥當的保存，所蒐集信用卡資訊或銀行資訊，均經使用安全的SSL加密協議處理，可確保您的隱私。<br>
                            利用之目的：進行行銷業務、訂單及展演之管理與服務、電子商務服務與調查、統計分析及研究。<br>
                            不提供個人資料之影響：您可自由選擇是否提供您上述的個人資料，但當您不同意提供時，您將無法享有《巴黎舞會 Le Bal de Paris》官方網站所提供之服務。凡購買本網站供的服務或產品，本公司可能會透過電子郵件傳送您於《巴黎舞會 Le Bal de Paris》官方網站的購買活動，包括但不限於消費者的帳戶、聯絡資訊或查詢、購買優惠的紀錄。您可選擇是否接收電子郵件，但當您不同意接收時，您將無法享有《巴黎舞會 Le Bal de Paris》官方網站提供之服務。<br>
                            個人資料利用之地區：本公司之個人資料主機、相關網路伺服器主機所在地及本公司/《巴黎舞會 Le Bal de Paris》官方網站相關服務或商品發行或行銷地區，為您個人資料利用之地區。<br>
                            您對個人資料之權利：在不違反相關法律的情況下，於本公司確認該個人資料為您本人所有後，您可以聯絡本公司∕《巴黎舞會 Le Bal de Paris》官方網站，或將您的需求郵寄至本公司的電子郵件信箱，以行使下列之權利：(1)查詢、閱覽、補充或更正您的個人資料。(2)停止蒐集、處理或利用您的個人資料。(3)刪除您的個人資料。(4)提供您個人資料的複製本。(5)停止寄發給《巴黎舞會Le Bal de Paris》官方網站相關廣告及行銷活動。但請注意，若您已於各該實際交易中提供您的個人資料給商家或交易對象，除法律另有規定之情形外，有關您的上述權利，應向各該商家或交易對象行使。<br>
                            除下列情形外，本公司不會任意將用戶的個人資料出售、轉讓或揭露予任何第三人：(1)本公司在與其他第三人合辦或協辦活動時，與該第三人共用、傳遞您的資料，才能夠提供您要求的產品或服務。惟《巴黎舞會 Le Bal de Paris》官方網站會於各該活動頁面明確告知您的個人資料將因參與該活動而提供予合辦或協辦之第三人，如您選擇參與該活動，即表示您瞭解並同意將該個人資料為各該活動之目的提供予合辦或協辦之第三人。(2)本公司∕《巴黎舞會 Le Bal de Paris》官方網站將因法律規定、法院命令、行政調查或其他法律程序的要求而提供您的資料，惟在此情形下，該資料只會單純提供予調查單位，並受中華民國相關法律的保護。(3)為了調查和防止非法活動、涉嫌詐欺、對人身安全有潛在威脅的狀況。(4) 對本公司∕《巴黎舞會 Le Bal de Paris》官方網站服務條款的違反，或站或本公司被其他公司收購或合併，我們有權利將您的個人資料移轉給該公司。如果發生這種情況，本公司會在您的個人資料被移轉且將適用不同的隱私權政策前通知您。<br>
                            本公司∕《巴黎舞會 Le Bal de Paris》官方網站有權視實際情形修訂本政策，本政策有重大變更時，本網站將張貼公告，您有義務隨時注意本政策有無更新或修訂。如您不同意所變更之內容，得隨時選擇退出相關服務，並請您立即停用《巴黎舞會 Le Bal de Paris》官方網站之服務，如您繼續使用本網站，即表示您同意本政策變更之內容。
                        </p>
                    </div>
                </div>
                <div class="modal__footer" data-custom-close="modal-privacy">閱讀完畢</div>
            </div>
        </div>
    </div>
    
    <script src="/paris/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="/paris/js/plugins/select2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <script src="/paris/js/plugins/micromodal.min.js"></script>
    <script src="/paris/js/main.js?231003"></script>
    <script src="/paris/js/phone_code.js"></script>
    <script src="/paris/js/invite.js?231113"></script>
</body>
</html>