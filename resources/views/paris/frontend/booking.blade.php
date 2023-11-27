<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <title>預約舞會｜巴黎舞會 Le Bal de Paris de Blanca</title>
    <link rel="icon" href="/paris/img/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Noto+Serif+TC:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/vpt1inn.css">
    <link rel="stylesheet" href="/paris/css/plugins/select2.css"/>
    <link rel="stylesheet" href="/paris/css/booking.css?231108">
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
    
    <main id="leading" style="display:none;">
        <div class="title">
            <img src="/paris/img/deco.svg" />
            <h1>出示專屬邀請 揭開舞會序幕</h1>
            <h3>Present your exclusive invitation</h3>
        </div>
        <div class="info">
            親愛的貴賓，歡迎你的蒞臨。<br>
            <br>
            這場盛大晚宴，在正式開始之前，<br>
            唯有收到獨特邀請的你，能優先推開舞會大門。
        </div>
        <div class="invite-code">
            <p>請輸入獲得的專屬邀請碼<br> (找不到邀請碼？回頭看看信件或問卷吧！)</p>
            <form onsubmit="return onFormSubmit()">
                <div class="input-wrapper">
                    <div class="input-group">
                        <input type="text" name="code" autocomplete="off" />
                    </div>
                    <div class="error">
                        <div class="error-inner">邀請碼未順利開通，請確認受邀身份</div>
                    </div>
                </div>
                <div class="actions">
                    <button class="p-btn primary go-next" type="submit">進入舞會</button>
                </div>
            </form>
        </div>
    </main>

    <main id="notice">
        <div class="title">
            <img src="/paris/img/deco.svg" />
            <h1>舞會須知</h1>
            <h3>Information</h3>
        </div>
        <div class="info">
            親愛的賓客，我們誠摯邀請你<br>
            跳一晚最自由的舞、做一場最清醒的夢<br>
            <br>
            在這場 80 分鐘 VR 頂級晚宴中<br>
            你可以期待<br>
            跨越時空，沉浸在巴黎午夜中<br>
            戴起面具，穿上數位高級訂製服<br>
            脫離現實，做你選擇的自己<br>
            <br>
            期待與你在美好年代相見<br>
            請點擊下方按鍵預約入場
        </div>
        <div class="information">
            <div class="information-inner">
                <div class="col">
                    <div class="grid">
                        <h4>地點</h4>
                        <p>地點：國立臺灣科學教育館<br>（<a class="hover-underline" target="_blank" href="https://www.google.com/maps/place/111%E5%8F%B0%E5%8C%97%E5%B8%82%E5%A3%AB%E6%9E%97%E5%8D%80%E5%A3%AB%E5%95%86%E8%B7%AF189%E8%99%9F">臺北市士林區士商路189號</a> B1 兒童廳）</p>
                    </div>
                    <div class="grid">
                        <h4>場次</h4>
                        <p>
                            每週一 - 二｜公休<br>
                            每週三 - 五<br>
                            晚場：18:10｜19:30｜ 20:45 
                        </p>
                        <p>
                            每週六 - 日<br>
                            午場：12:50｜14:15｜15:30<br>
                            晚場：18:10｜19:30｜ 20:45
                        </p>
                        <p>體驗時長：80 分鐘</p>
                    </div>
                </div>
                <div class="col">
                    <div class="grid">
                        <h4>注意事項</h4>
                        <ul>
                            <li>
                                <p>
                                    現場包含 VR 體驗和 1 杯調飲，為顧及體驗安全：
                                    <ul>
                                        <li>孕婦、心臟病和高血壓患者不建議體驗</li>
                                        <li>體內有電子儀器者（例：心律調整器、助聽器、除顫器）及患有癲癇容易暈倒、視力受損者下訂前需諮詢專業醫師以維護體驗安全</li>
                                        <li>未滿 12 歲無法參與、13-16 歲需家長陪同</li>
                                    </ul>
                                </p>
                            </li>
                            <li><p>包場需求、其他特殊服務，請來信客服詢問<br><a class="hover-underline" href="mailto:lebaldeparis@surpriselab.com.tw">lebaldeparis@surpriselab.com.tw</a></p></li>
                            <li><p>相關購票、退票、改期規則，請見 <a class="hover-underline" href="/lebaldeparis/rules">[舞會規則]</a></p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="actions">
                <button class="p-btn primary notice-btn">預約入場</button>
            </div>
        </div>
    </main>

    <main id="booking" style="display:none;">
        <form id="booking_form" action="booking_success.html" method="post">
            {{ csrf_field() }}
            <div id="step1" class="step">
                <div class="title">
                    <img src="/paris/img/deco.svg" />
                    <h1>預約體驗</h1>
                    <h3>Booking</h3>
                </div>
                <div class="price">
                    <div class="item">
                        <div class="icon">
                            <img src="/paris/img/booking_ticket1.png" />
                        </div>
                        <h4>單人獨舞票</h4>
                        <h2>$2,000</h2>
                        <div class="desc">
                            （含一杯調飲）<br>
                            <br>
                            一個人自由地探索<br>
                            帶著好奇心闖入花漾年代
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="/paris/img/booking_ticket2.png" />
                        </div>
                        <h4>雙人共舞票</h4>
                        <h2>$3,800<span>($1,900/人)</span></h2>
                        <div class="desc">
                            （含兩杯調飲）<br>
                            <br>
                            邀請最重要的人<br>
                            感受奢華絢爛的巴黎午夜
                        </div>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="/paris/img/booking_ticket3.png" />
                        </div>
                        <h4>四人群舞票</h4>
                        <h2>$7,400<span>($1,850/人)</span></h2>
                        <div class="desc">
                            （含四杯調飲）<br>
                            <br>
                            與熟悉的人狂歡<br>
                            摸索與彼此的第一支舞
                        </div>
                    </div>
                </div>

                <div class="selects">
                    <div class="type">
                        <div class="input-group">
                            <label>票種</label>
                            <select name="ticket" data-placeholder="選擇">
                                <option></option>
                                <option value="單人獨舞票">單人獨舞票</option>
                                <option value="雙人共舞票">雙人共舞票</option>
                                <option value="四人群舞票">四人群舞票</option>
                            </select>
                            <div class="select-wrapper"></div>
                        </div>
                    </div>
                    <div class="guests">
                        <div class="input-group">
                            <label>張數</label>
                            <select name="num" data-placeholder="選擇張數">
                                <option></option>
                                <option value="1">1</option>
                            </select>
                            <div class="select-wrapper"></div>
                        </div>
                    </div>
                    <div class="date">
                        <div class="input-group">
                            <label>日期 Date</label>
                            <input type="text" name="booking_date" id="booking_date" autocomplete="off" placeholder="選擇日期" />
                            <div class="calender-wrapper"></div>
                        </div>
                    </div>
                    <div class="time">
                        <div class="input-group">
                            <label>場次時間</label>
                            <select name="booking_time" id="booking_time" data-placeholder="選擇時間場次"></select>
                            <div class="select-wrapper"></div>
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <div class="p-btn primary go-next disabled">下一步</div>
                </div>
            </div>
    
            <div id="step2" class="step" style="display: none;">
                <div class="title">
                    <img src="/paris/img/deco.svg" />
                    <h1>填寫聯絡資訊</h1>
                    <h3>Info</h3>
                </div>

                <div class="step2-form">
                    <div class="input-group">
                        <label>* 姓名（為維護你的訂位權益，請留全名）</label>
                        <input class="required" type="text" name="name" placeholder="兔子先生" />
                    </div>
                    <div class="input-group phone-group">
                        <label>* 手機</label>
                        <div class="flex">
                            <!-- <input class="code required" type="text" name="" placeholder="+886" /> -->
                            <div class="code-wrapper">
                                <select class="code required" name="area_code" data-placeholder="選擇人數">
                                    <option value="q">qq</option>
                                </select>
                                <!-- <div class="select-wrapper"></div> -->
                            </div>
                            <input class="phone required" type="text" name="phone" placeholder="0912345678" />
                        </div>
                        <div class="select-wrapper"></div>
                    </div>
                    <div class="input-group">
                        <label>* Email</label>
                        <input class="email required" type="text" name="email" placeholder="ex. lebaldeparis@surpriselab.com.tw" />
                    </div>
                    <div class="half-group flex">
                        <div class="input-group">
                            <label>* 體驗語言人數/中文 </label>
                            <!-- <input class="required" type="text" name="" placeholder="0" /> -->
                            <select class="lang_zh" name="need_chinese" data-placeholder="選擇人數"></select>
                            <div class="select-wrapper"></div>
                        </div>
                        <div class="input-group">
                            <label>* 體驗語言人數/英文</label>
                            <!-- <input class="required" type="text" name="" placeholder="0" /> -->
                            <select class="lang_en" name="need_english" data-placeholder="選擇人數"></select>
                            <div class="select-wrapper"></div>
                        </div>
                    </div>
                    <!-- <div class="input-group">
                        <label>統一編號（無此需求可不須填寫）</label>
                        <input class="tax" type="text" name="company_tax_ID" />
                    </div>
                    <div class="input-group">
                        <label>發票抬頭（無此需求可不須填寫）</label>
                        <input type="text" name="company_name" />
                    </div>
                    <div class="input-group">
                        <label>手機載具 （無此需求可不須填寫）</label>
                        <input class="invoices" type="text" name="vehicle" />
                    </div> -->
                    <div class="input-group">
                        <label>備註</label>
                        <textarea name="notice" rows="8" placeholder="+特殊需求（行動不便等）可提前備註"></textarea>
                    </div>
                    <div class="half-group flex">
                        <div class="input-group">
                            <label>折扣碼</label>
                            <input type="text" name="discount" id="discount" maxlength="20" />
                            <span class="discount_note" style="color: #dc3545;"></span>
                        </div>
                        <div class="input-group">
                            <label>劃位序號</label>
                            <input type="text" name="gift" id="gift" maxlength="20" />
                            <span class="gift_note" style="color: #dc3545;"></span>
                        </div>
                    </div>
                    <div class="checkboxes">
                        <div class="checkbox-group">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" name="ck_privacy" value="1" />
                                <span>我已詳讀並遵守</span>
                            </label>
                            <span class="modal-btn modal-btn-privacy" data-custom-open="modal-privacy">隱私權條款</span>
                        </div>
                        <div class="checkbox-group">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" name="ck_rule" value="1" />
                                <span>我已詳讀並遵守</span> 
                            </label>
                            <a href="/lebaldeparis/rules">舞會規則</a>
                        </div>
                    </div>
                    <div class="actions">
                        <div class="p-btn primary go-next disabled">確認聯絡資訊</div>
                        <div class="p-btn primary outline go-prev">回上一步</div>
                    </div>
                </div>
            </div>

            <div id="step3" class="step" style="display: none;">
                <div class="title">
                    <img src="/paris/img/deco.svg" />
                    <h1>確認資訊</h1>
                    <h3>Confirmation</h3>
                </div>

                <div class="step3-form">
                    <div class="ticket-inner">
                        <div class="ticket">
                            <table>
                                <tr>
                                    <td>票種</td>
                                    <td>巴黎舞會雙人套票</td>
                                </tr>
                                <tr>
                                    <td>張數</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>預約日期</td>
                                    <td>2023/11/11</td>
                                </tr>
                                <tr>
                                    <td>預約時段</td>
                                    <td>18:30-20:00</td>
                                </tr>
                                <tr>
                                    <td>金額</td>
                                    <td>3,900 元</td>
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
                    </div>
                    <div class="form-inner">
                        <div class="input-group">
                            <label>* 姓名（為維護你的訂位權益，請留全名）</label>
                            <div class="filed-value">驚喜先生/小姐</div>
                        </div>
                        <div class="input-group phone-group">
                            <label>* 手機</label>
                            <div class="flex">
                                <div class="filed-value code">+886</div>
                                <div class="filed-value phone">0912345678</div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>* Email</label>
                            <div class="filed-value">example@gmail.com</div>
                        </div>
                        <div class="half-group flex">
                            <div class="input-group">
                                <label>* 體驗語言人數/中文</label>
                                <div class="filed-value">0</div>
                            </div>
                            <div class="input-group">
                                <label>* 體驗語言人數/英文</label>
                                <div class="filed-value">0</div>
                            </div>
                        </div>
                        <!-- <div class="input-group">
                            <label>統一編號（無此需求可不須填寫）</label>
                            <div class="filed-value">12345678</div>
                        </div>
                        <div class="input-group">
                            <label>發票抬頭</label>
                            <div class="filed-value"></div>
                        </div>
                        <div class="input-group">
                            <label>手機載具</label>
                            <div class="filed-value"></div>
                        </div> -->
                        <div class="input-group">
                            <label>備註</label>
                            <div class="filed-value">需要輪椅，一位孕婦</div>
                        </div>
                        <div class="half-group flex align-items-end">
                            <div class="input-group">
                                <label>折扣碼</label>
                                <div class="filed-value">HaveANiceDay</div>
                            </div>
                            <div class="input-group">
                                <div class="note discount">已折扣100元</div>
                            </div>
                        </div>
                        <div class="half-group flex align-items-end">
                            <div class="input-group">
                                <label>劃位序號</label>
                                <div class="filed-value">XYZ321</div>
                            </div>
                            <div class="input-group">
                                <div class="note gift">已抵用4000元</div>
                            </div>
                        </div>
                        <div class="notice">按下「前往付款」代表我已閱讀並同意 <span data-custom-open="modal-privacy">隱私權條款</span> 與 <a href="/lebaldeparis/rules">購票規則</a></div>
                    </div>
                </div>

                <div class="actions">
                    <button class="p-btn primary go-next submitForm" type="button">前往付款 3,900 元</button>
                    <div class="p-btn primary outline go-prev">回上一步</div>
                </div>
            </div>
        </form>
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
    <script src="/paris/js/plugins/jquery-ui.js"></script>
    <script src="/paris/js/plugins/select2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <script src="/paris/js/plugins/micromodal.min.js"></script>
    <script src="/paris/js/main.js?231003"></script>
    <script src="/paris/js/phone_code.js"></script>
    <script src="/paris/js/booking.js?23110801"></script>
</body>
</html>