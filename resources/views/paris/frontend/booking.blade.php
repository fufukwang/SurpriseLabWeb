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
    <link rel="stylesheet" href="/paris/css/booking.css?231220">
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
    <main id="notice">
        <div class="title">
            <h1>巴黎舞會<br>劃位登記</h1>
            <h3>告訴我們何時可以見到你<br>Pick your date and time</h3>
        </div>
        <div class="information">
            <center><b>預約前，請花些時間詳讀規則。</b></center>
            <br><br>
            <div class="information-inner">
                <div class="col">
                    <div class="grid">
                        <h4>劃位步驟</h4>
                        <table>
                            <tr>
                                <td width="100">STEP 1</td>
                                <td>輸入劃位序號</td>
                            </tr>
                            <tr>
                                <td width="100">STEP 2</td>
                                <td>選擇日期、時段</td>
                            </tr>
                            <tr>
                                <td width="100">STEP 3</td>
                                <td>填寫賓客資料</td>
                            </tr>
                            <tr>
                                <td width="100">STEP 4</td>
                                <td>確認訂單</td>
                            </tr>
                            <tr>
                                <td width="100">STEP 5</td>
                                <td>完成預約</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <div class="grid">
                        <h4>注意事項</h4>
                        <ol>
                            <li>看到 [您已完成預約] 頁面，才代表您已劃位成功</li>
                            <li>若日期呈現灰色或無法選擇，代表該場次已滿，或是當日不開放。</li>
                            <li>請確實填寫正確的電子信箱與電話，後續將以此與您聯繫。</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="contact">
                <b>若有任何問題，歡迎來信</b><br>
                <a href="mailto:lebaldeparis@surpriselab.com.tw">lebaldeparis@surpriselab.com.tw</a>
            </div>
            <div class="actions">
                <button class="p-btn primary notice-btn">前往劃位</button>
            </div>
        </div>
    </main>

    <main id="booking" style="display: none;">
        <form id="booking_form" action="" method="post">
            <div id="step1" class="step">
                <div class="title">
                    <h1>輸入序號</h1>
                    <h3>Code</h3>
                </div>

                <div class="information">
                    <div class="information-title">劃位小訣竅</div>
                    <ol>
                        <li>若您有多個序號（包含不同票種的序號），請依序輸入後按下確認，再於出現的下一個輸入框輸入其他序號</li>
                        <li>全部的序號都輸入後，請確認每個都按下了確認，並出現了「劃位序號XXXXX XXXX票」的提示文字</li>
                        <li>系統將依照劃位人數尋找尚有空位的日期與場次，請確實輸入所有序號</li>
                    </ol>
                </div>

                <div class="form-inner">
                    <div class="tickets">
                        <div class="tickets-title">劃位序號</div>
                        <div>
                            <div>如有多組序號，請一次填入一組劃位序號，按下確認後折抵</div>
                            <br>
                            <div class="fields">
                                <div class="input-group">
                                    <input type="text" placeholder="輸入序號" />
                                    <button type="button">確認</button>
                                    <div class="msg"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="actions">
                        <div class="p-btn primary go-prev">上一步</div>
                        <div class="p-btn primary go-next disabled">下一步</div>
                    </div>
                </div>
            </div>

            <div id="step2" class="step" style="display: none;">
                <div class="title">
                    <h1>日期、時段選擇</h1>
                    <h3>Date and Time</h3>
                </div>

                <div class="form-inner">
                    <div class="input-group date">
                        <label>日期</label>
                        <input type="text" name="booking_date" id="booking_date" autocomplete="off" placeholder="選擇日期" />
                        <div class="calender-wrapper"></div>
                    </div>

                    <div class="input-group time">
                        <label>場次時間</label>
                        <select name="booking_time" id="booking_time" data-placeholder="選擇時間場次"></select>
                        <div class="select-wrapper"></div>
                    </div>
    
                    <div class="actions">
                        <div class="p-btn primary go-prev">上一步</div>
                        <div class="p-btn primary go-next disabled">下一步</div>
                    </div>
                </div>
            </div>
    
            <div id="step3" class="step" style="display: none;">
                <div class="title">
                    <h1>填寫聯絡資訊</h1>
                    <h3>Information</h3>
                </div>    

                <div class="form-inner">

                    <div><center>請填寫正確電子信箱與電話，預約成功後將寄送行前通知與重要訊息（建議避開 yahoo 與 hotmail 信箱，以免漏信）</center></div>
                    <br><br>

                    <div class="input-group">
                        <label>* 姓名</label>
                        <input class="required" type="text" name="name" placeholder="兔子先生" />
                    </div>
                    <div class="input-group phone-group">
                        <label>* 電話</label>
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
                    <div class="input-group">
                        <label>統一編號（無此需求可不須填寫）</label>
                        <input class="tax" type="text" name="company_tax_ID" />
                    </div>
                    <div class="input-group">
                        <label>公司抬頭（無此需求可不須填寫）</label>
                        <input type="text" name="company_name" />
                    </div>
                    <div class="input-group">
                        <label>手機載具 （無此需求可不須填寫）</label>
                        <input class="invoices" type="text" name="vehicle" />
<<<<<<< HEAD
                    </div> -->
                    <div class="input-group">
                        <label>備註</label>
                        <textarea name="notice" rows="8" placeholder="若不飲用酒精，請提前備註，飲品不提供現場調整；&#10;VR 體驗提供法文、西班牙文、義大利文、德文，若有需求，請備註語言與對應人數"></textarea>
=======
>>>>>>> backme-2312
                    </div>
                    <div class="input-group">
                        <label>其他備註</label>
                        <textarea name="notice" rows="8" placeholder="若不飲用酒精，請提前備註，飲品不提供現場調整；&#10;VR 體驗提供法文、西班牙文、義大利文、德文，若有需求，請備註語言與對應人數"></textarea>
                    </div>
                    <div class="checkboxes">
                        <div class="checkbox-group">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" name="ck_rule" value="1" />
                                <span>我已詳讀並遵守</span> 
                            </label>
                            <a target="_blank" href="/lebaldeparis/rules">巴黎舞會劃位與體驗規則</a>
                        </div>
                        <div class="checkbox-group">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" name="ck_privacy" value="1" />
                                <span>我已詳讀並遵守</span>
                            </label>
                            <span class="modal-btn modal-btn-privacy" data-custom-open="modal-privacy">隱私權條款</span>
                        </div>
                    </div>
                    <div class="actions">
                        <div class="p-btn primary go-prev">上一步</div>
                        <div class="p-btn primary go-next disabled">下一步</div>
                    </div>
                </div>
            </div>

            <div id="step4" class="step" style="display:none;">
                <div class="title">
                    <img src="/paris/img/deco.svg" />
                    <h1>確認資訊</h1>
                    <h3>Confirm</h3>
                </div>

                <div class="step4-form">
                    <div class="ticket-inner">
                        <div class="ticket">
                            <table id="ticket-info">
                                <tr>
                                    <td colspan="2">巴黎舞會 Le Bal de Paris de Blanca</td>
                                </tr>
                                <tr>
                                    <td>人數</td>
                                    <td class="tPeople">2 人</td>
                                </tr>
                                <tr>
                                    <td>預約日期</td>
                                    <td class="tDay">2023/11/11</td>
                                </tr>
                                <tr>
                                    <td>預約時段</td>
                                    <td class="tTime">18:30-20:00</td>
                                </tr>
                                <tr>
                                    <td>使用票券</td>
                                    <td class="tCount">2 張</td>
                                </tr>
                            </table>
                            <div class="addr">
                                <svg width="11" height="16" viewBox="0 0 11 16" fill="none">
                                    <path d="M5.5 0C2.46269 0 0 2.51473 0 5.61624C0 8.71775 5.5 16 5.5 16C5.5 16 11 8.71775 11 5.61624C11 2.51473 8.54073 0 5.5 0ZM5.5 8.60249C3.88557 8.60249 2.57898 7.26479 2.57898 5.61973C2.57898 3.97468 3.88899 2.63698 5.5 2.63698C7.11101 2.63698 8.42102 3.97468 8.42102 5.61973C8.42102 7.26479 7.11101 8.60249 5.5 8.60249Z" fill="#016060"/>
                                </svg>
<<<<<<< HEAD
                                <div>111 台北市士林區的某棟秘密建築</div>
                                <div class="note">
                                    （詳細地點請容許我們先保密，我們將慢慢向你揭露）<br>
=======
                                <div>國立臺灣科學教育館</div>
                                <div class="note">
                                    111 臺北市士林區士商路189號 B1 兒童廳<br>
>>>>>>> backme-2312
                                    <span style="color: #F4115E;">此圖面不代表訂位完成，請往下操作</span>
                                </div>
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
                        <div class="input-group">
                            <label>統一編號（無此需求可不須填寫）</label>
                            <div class="filed-value">12345678</div>
                        </div>
                        <div class="input-group">
                            <label>公司抬頭</label>
                            <div class="filed-value">-</div>
                        </div>
                        <div class="input-group">
                            <label>手機載具</label>
                            <div class="filed-value">-</div>
                        </div>
                        <div class="input-group">
                            <label>備註</label>
                            <div class="filed-value">需要輪椅，一位孕婦</div>
                        </div>
                    </div>

                    <div class="actions">
                        <div class="p-btn primary go-prev">上一步</div>
                        <div class="p-btn primary go-next sendOrderBtn">確認劃位</div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <!-- // 成功 -->
    <main id="booking-success" style="display:none;">
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
            若未收到信，請優先尋找垃圾信件匣<br>
            或來信 <a href="mailto:lebaldeparis@surpriselab.com.tw">lebaldeparis@surpriselab.com.tw</a><br>
            <br>
            赴約舞會前，你將收到行前須知<br>
            更多細節，歡迎點擊下方按鍵了解
        </div>
        <div class="ticket">
            <table id="ticket-success">
                <tr>
                    <td colspan="2">巴黎舞會 Le Bal de Paris de Blanca</td>
                </tr>
                <tr>
                    <td>人數</td>
                    <td class="tPeople">2 人</td>
                </tr>
                <tr>
                    <td>預約日期</td>
                    <td class="tDay">2023/11/11</td>
                </tr>
                <tr>
                    <td>預約時段</td>
                    <td class="tTime">18:30-20:00</td>
                </tr>
                <tr>
                    <td>使用票券</td>
                    <td class="tCount">2 張</td>
                </tr>
            </table>
            <div class="addr">
                <svg width="11" height="16" viewBox="0 0 11 16" fill="none">
                    <path d="M5.5 0C2.46269 0 0 2.51473 0 5.61624C0 8.71775 5.5 16 5.5 16C5.5 16 11 8.71775 11 5.61624C11 2.51473 8.54073 0 5.5 0ZM5.5 8.60249C3.88557 8.60249 2.57898 7.26479 2.57898 5.61973C2.57898 3.97468 3.88899 2.63698 5.5 2.63698C7.11101 2.63698 8.42102 3.97468 8.42102 5.61973C8.42102 7.26479 7.11101 8.60249 5.5 8.60249Z" fill="#fceee4"/>
                </svg>
                <div>國立臺灣科學教育館</div>
                <div class="note">
                    111 臺北市士林區士商路189號 B1 兒童廳<br>
                    <span style="color: #F4115E;">此圖面不代表訂位完成，請往下操作</span>
                </div>
            </div>
        </div>
        <div class="actions">
            <a class="p-btn primary" href="/lebaldeparis/rules">關於巴黎舞會</a>
        </div>
    </main>
    <!-- // 失敗 -->
    <main id="booking-fail" style="display:none;">
        <div class="title">
            <img src="/paris/img/deco.svg" />
            <h1>預約未完成</h1>
            <h3>Reservation Incompleted</h3>
        </div>
        <div class="info">
            很抱歉，你的舞會預約未完成<br>
            請確認網路訊號穩定，並於時限內完成付款<br>
            <br>
            購票過程若有任何疑問，歡迎來信客服<br>
            <a class="hover-underline" href="mailto:lebaldeparis@surpriselab.com.tw">lebaldeparis@surpriselab.com.tw</a>
        </div>
        <div class="actions">
            <a target="_blank" class="p-btn primary" href="https://surpriselab.backme.tw/shops/3405?locale=zh-TW">重新購票</a>
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
    <script src="/paris/js/plugins/jquery-ui.js"></script>
    <script src="/paris/js/plugins/select2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <script src="/paris/js/plugins/micromodal.min.js"></script>
    <script src="/paris/js/main.js?231003"></script>
    <script src="/paris/js/phone_code.js"></script>
    <script src="/paris/js/booking.js?2312091"></script>
</body>
</html>