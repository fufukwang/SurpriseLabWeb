<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="落日轉運站為驚喜製造推出的巡迴沉浸式計畫，在此提供各種交通方式，接駁旅客前往終點；抵達第二站台北，帶來全新原創體驗《落日月台》。">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="落日轉運站 The Sunset Terminal"/>
    <meta property="og:site_name" content="落日轉運站 The Sunset Terminal"/>
    <meta property="og:description" content="落日轉運站為驚喜製造推出的巡迴沉浸式計畫，在此提供各種交通方式，接駁旅客前往終點；抵達第二站台北，帶來全新原創體驗《落日月台》。"/>
    <meta property="og:url" content="https://surpriselab.com.tw/terminal/"/>
    <meta property="og:image" content="https://surpriselab.com.tw/terminalAssets/images/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="落日轉運站 The Sunset Terminal">
    <meta name="twitter:description" content="落日轉運站為驚喜製造推出的巡迴沉浸式計畫，在此提供各種交通方式，接駁旅客前往終點；抵達第二站台北，帶來全新原創體驗《落日月台》。">
    <meta name="twitter:image" content="https://surpriselab.com.tw/terminalAssets/images/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">

    <title>落日轉運站 The Sunset Terminal</title>

    <!-- icon -->
    <link rel="icon" href="/terminalAssets/images/favicon.png" type="image/x-icon">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/terminalAssets/css/plugins/icomoon/style.css">
    <link rel="stylesheet" href="/terminalAssets/css/main-component.css?231123">
    <link rel="stylesheet" href="/terminalAssets/css/plugins/select2.css"/>
    <link rel="stylesheet" href="/terminalAssets/css/booking.css?2312213">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T7V2BQQ');</script>
<!-- End Google Tag Manager -->
</head>
<body class="loading">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7V2BQQ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    @include('terminal.frontend._nav')
    <main id="notice">
        <div class="title">
            <h1>《落日月台》<br>劃位登記</h1>
            <h3>告訴我們何時可以見到你<br>Pick your date and time</h3>
        </div>
        <div class="information">
            <center><b style="color: #fff;">預約前，請花些時間詳讀規則。</b></center>
            <br><br>
            <div class="information-inner">
                <div class="col">
                    <div class="grid">
                        <h4><b>劃位步驟</b></h4>
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
                        <h4><b>注意事項</b></h4>
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
                <a href="mailto:mindthegap@surpriselab.com.tw">mindthegap@surpriselab.com.tw</a>
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

                <div class="progress-wrap">
                    <ul class="booking-progress-list">
                        <li class="progress-item status-active"><div class="item-wrap"><span>1</span></div></li>
                        <li class="progress-item status-disabled"><div class="item-wrap"><span>2</span></div></li>
                        <li class="progress-item status-disabled"><div class="item-wrap"><span>3</span></div></li>
                        <li class="progress-item status-disabled"><div class="item-wrap"><span>4</span></div></li>
                    </ul>
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

                <div class="progress-wrap">
                    <ul class="booking-progress-list">
                        <li class="progress-item status-finish"><div class="item-wrap"><span>1</span></div></li>
                        <li class="progress-item status-active"><div class="item-wrap"><span>2</span></div></li>
                        <li class="progress-item status-disabled"><div class="item-wrap"><span>3</span></div></li>
                        <li class="progress-item status-disabled"><div class="item-wrap"><span>4</span></div></li>
                    </ul>
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
                
                <div class="progress-wrap">
                    <ul class="booking-progress-list">
                        <li class="progress-item status-finish"><div class="item-wrap"><span>1</span></div></li>
                        <li class="progress-item status-finish"><div class="item-wrap"><span>2</span></div></li>
                        <li class="progress-item status-active"><div class="item-wrap"><span>3</span></div></li>
                        <li class="progress-item status-disabled"><div class="item-wrap"><span>4</span></div></li>
                    </ul>
                </div>

                <div class="form-inner">

                    <div><center>請填寫正確電子信箱與電話，預約成功後將寄送行前通知與重要訊息（建議避開 yahoo 與 hotmail 信箱，以免漏信）</center></div>
                    <br><br>

                    <div class="input-group">
                        <label>* 姓名</label>
                        <input class="required" type="text" name="name" placeholder="ex. 轉運站吉祥物" />
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
                            <input class="phone required" type="text" name="phone" placeholder="ex. 0987654321" />
                        </div>
                        <div class="select-wrapper"></div>
                    </div>
                    <div class="input-group">
                        <label>* 電子信箱</label>
                        <input class="email required" type="text" name="email" placeholder="ex. mindthegap@surpriselab.com.tw" />
                    </div>
                    <!-- <div class="input-group">
                        <label>公司抬頭</label>
                        <input type="text" name="company_name" placeholder="ex. 驚喜製造股份有限公司" />
                    </div>
                    <div class="input-group">
                        <label>發票統編</label>
                        <input class="tax" type="text" name="company_tax_ID" placeholder="ex. 88888888" />
                    </div> -->
                    <div class="input-group">
                        <label>其他備註</label>
                        <textarea name="notice" rows="8" placeholder="ex. 特殊事項備註"></textarea>
                    </div>
                    <div class="checkboxes">
                        <div class="checkbox-group">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" name="ck_rule" value="1" />
                                <span>我已詳讀並遵守</span> 
                            </label>
                            <a target="_blank" href="/terminal/rules">落日月台劃位與體驗規則</a>
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

            <div id="step4" class="step" style="display: none;">
                <div class="title">
                    <h1>確認資訊</h1>
                    <h3>Confirm</h3>
                </div>

                <div class="progress-wrap">
                    <ul class="booking-progress-list">
                        <li class="progress-item status-finish"><div class="item-wrap"><span>1</span></div></li>
                        <li class="progress-item status-finish"><div class="item-wrap"><span>2</span></div></li>
                        <li class="progress-item status-finish"><div class="item-wrap"><span>3</span></div></li>
                        <li class="progress-item status-active"><div class="item-wrap"><span>4</span></div></li>
                    </ul>
                </div>

                <div class="step4-form">
                    <div class="form-inner">
                        <h4>作品與日期</h4>
                        <div class="ticket">
                            <div class="ticket-title">如您在選擇時間時安排有誤，還請自行承擔負責。</div>
                            <div class="ticket-inner">
                                落日月台<br>
                                <ul class="ticket-ul">
                                    <li>日期 2023-12-31</li>
                                    <li>時段 18:30 - 20:30</li>
                                    <li>乘車人數 1張（1人）</li>
                                </ul>
                            </div>
                        </div>
                        
                        <br><br>

                        <h4>確認您的資料</h4>
                        <table>
                            <tr>
                                <td width="100">姓名</td>
                                <td class="filed-value">測試</td>
                            </tr>
                            <tr>
                                <td>電話</td>
                                <td><span class="filed-value"></span> <span class="filed-value"></span></td>
                            </tr>
                            <tr>
                                <td>電子信箱</td>
                                <td class="filed-value">mingthegap@surpriselab.com.tw</td>
                            </tr>
                            <!-- <tr>
                                <td>公司抬頭</td>
                                <td class="filed-value">驚喜製造股份有限公司</td>
                            </tr>
                            <tr>
                                <td>發票統編</td>
                                <td class="filed-value">000000000</td>
                            </tr> -->
                            <tr>
                                <td>其他備註</td>
                                <td class="filed-value"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="actions">
                        <div class="p-btn primary go-prev">上一步</div>
                        <div class="p-btn primary go-next sendOrderBtn">確認劃位</div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <main id="booking-success" style="display:none;">
        <img src="https://www.surpriselab.com.tw/terminalAssets/images/other/img_success.png" />
        <div class="title">
            <h1>購票完成</h1>
            <h3>SUCCESS</h3>
        </div>
        <div class="info">
            <h4>恭喜您，已經完成訂位！</h4>
            <h4><b>您購買的班次是「<span class="ticket-success">落日月台入場</span>」時間，請務必提前 20 分鐘取票</b></h4>
            <p>每一作品皆會有一封獨立的訂位成功信件，<br/>請至您的信箱確認</p>
            <p style="opacity: 0.5;">它有時候會跑到垃圾郵件，可以翻找一下</p>
        </div>
        <div class="actions">
            <a class="p-btn primary" href="/terminal/rules">關於落日轉運站</a>
        </div>
    </main>
    <main id="booking-fail" style="display:none;">
        <img src="https://www.surpriselab.com.tw/terminalAssets/images/other/img_fail.png" />
        <div class="title">
            <h1>購票失敗</h1>
            <h3>fail</h3>
        </div>
        <div class="info">
            <h4 class="color-o200">很抱歉，購買與劃位流程失敗</h4>
            <p class="color-n100 body-04">請確保網路訊號的穩定，再次前往購票。</p>
            <p class="color-n100 body-04">有任何問題歡迎來信：<a class="hover-underline" target="_blank" href="mailto:mindthegap@surpriselab.com.tw">mindthegap@surpriselab.com.tw</a></p>
        </div>
        <div class="actions">
            <a target="_blank" class="p-btn primary" href="/terminal/booking">重新預約</a>
        </div>
    </main>

    <div class="modal micromodal-slide" id="modal-privacy" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-custom-close="modal-privacy">
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-privacy-title">
                <div class="modal__header">
                    <div class="modal__title" id="modal-privacy-title">隱私權政策</div>
                    <button class="modal__close" aria-label="Close modal" data-custom-close="modal-privacy"></button>
                </div>
                <div class="modal__body">
                    <div class="modal__content" id="modal-privacy-content">
                        <p class="body-04">
                            《落日轉運站 Sunset Terminal》官方網站 https://www.surpriselab.com.tw/terminal（以下稱「本網站」）為驚喜製造股份有限公司（以下稱「本公司」）所經營，本網站尊重您的隱私權，並致力於保護您的個人資料。於使用《落日轉運站 Sunset Terminal》官方網站前，請您詳細閱讀本條之「隱私權政策」（以下稱「本政策」），並隨時注意本網站所公告之相關修改或變更，本公司有權於任何時間修改或變更本隱私權政策之內容。當您使用本網站時，或於任何修改、變更後繼續使用本網站，皆表示您已閱讀、瞭解並同意接受本政策，或該修改、變更後之內容，及同意依據本政策蒐集、處理與利用您的個人資料；如果您無法遵守或不同意本政策之內容，或您所屬的國家、地區排除本政策內容之全部或一部時，請您立即停止使用《落日轉運站 Sunset Terminal》官方網站。此外，本公司於未經您許可的情形下，絕不會將您的個人資料提供予任何第三方。
                        </p>
                        <p class="body-04">
                            若您為未滿二十歲或無完全行為能力，除應符合上述規定外，請於您的法定代理人或監護人閱讀、瞭解並同意本政策及其後修改、變更後之所有內容後，方得使用或繼續使用本網站，否則請立即停止使用。當您使用或繼續使用《落日轉運站 Sunset Terminal》官方網站時，即視為您的法定代理人或監護人已閱讀、瞭解並同意接受本政策及其後修改、變更之所有內容。
                        </p>
                        <!-- <h6>區塊標題</h6> -->
                        <p class="body-04">
                            個人資料之類別：當您使用本網站之服務，本公司會請您提供您下列類別的個人資料，如：<br/>
                            辨識個人者（例如：姓名、住址、電子郵件信箱、行動電話）、<br/>
                            辨識財務者（例如：信用卡或簽帳卡之號碼、銀行帳戶之號碼與姓名）、<br/>
                            生活格調（例如：使用消費品之種類及服務之細節、個人之消費模式）、<br/>
                            資料主體所取得之財貨或服務（例如：貨物或服務之有關細節）、<br/>
                            財務交易（例如：收付金額、支付方式、往來紀錄）、<br/>
                            資料主體之商業活動（例如：商業種類、提供或使用之財貨或服務、商業契約）、<br/>
                            約定或契約（例如：關於交易、商業、法律或其他契約、代理）、<br/>
                            未分類之資料（例如：用餐意見、無法歸類之檔案、報告），<br/>
                            及其他任何得以直接或間接方式識別個人之資料等。<br/>
                            惟請注意，您於《落日轉運站 Sunset Terminal》官方網站中進行交易時，所輸入之信用卡卡號、有效日期及授權碼，均僅儲存於您個人之行動裝置中，本網站將不會蒐集、處理或利用您上述個人資料。
                        </p>
                        <p class="body-04">
                            個人資料之利用：當您在《落日轉運站 Sunset Terminal》官方網站登錄個人資料以進行相關交易時，所留下的個人資料包括但不限於姓名、電子郵件地址、手機號碼及發票寄送地址等，將在本網站妥當的保存，所蒐集信用卡資訊或銀行資訊，均經使用安全的SSL加密協議處理，可確保您的隱私。
                        </p>
                        <p class="body-04">
                            不提供個人資料之影響：您可自由選擇是否提供您上述的個人資料，但當您不同意提供時，您將無法享有《落日轉運站 Sunset Terminal》官方網站所提供之服務。凡購買本網站供的服務或產品，本公司可能會透過電子郵件傳送您於《落日轉運站 Sunset Terminal》官方網站的購買活動，包括但不限於消費者的帳戶、聯絡資訊或查詢、購買優惠的紀錄。您可選擇是否接收電子郵件，但當您不同意接收時，您將無法享有《落日轉運站 Sunset Terminal》官方網站提供之服務。
                        </p>
                        <p class="body-04">
                            個人資料利用之地區：本公司之個人資料主機、相關網路伺服器主機所在地及本公司∕《落日轉運站 Sunset Terminal》官方網站相關服務或商品發行或行銷地區，為您個人資料利用之地區。
                        </p>
                        <p class="body-04">
                            您對個人資料之權利：在不違反相關法律的情況下，於本公司確認該個人資料為您本人所有後，您可以聯絡本公司∕《落日轉運站 Sunset Terminal》官方網站，或將您的需求郵寄至本公司的電子郵件信箱，以行使下列之權利：(1)查詢、閱覽、補充或更正您的個人資料。(2)停止蒐集、處理或利用您的個人資料。(3)刪除您的個人資料。(4)提供您個人資料的複製本。(5)停止寄發給《落日轉運站 Sunset Terminal》官方網站相關廣告及行銷活動。但請注意，若您已於各該實際交易中提供您的個人資料給商家或交易對象，除法律另有規定之情形外，有關您的上述權利，應向各該商家或交易對象行使。
                        </p>
                        <p class="body-04">
                            除下列情形外，本公司不會任意將用戶的個人資料出售、轉讓或揭露予任何第三人：(1)本公司在與其他第三人合辦或協辦活動時，與該第三人共用、傳遞您的資料，才能夠提供您要求的產品或服務。惟《落日轉運站 Sunset Terminal》官方網站會於各該活動頁面明確告知您的個人資料將因參與該活動而提供予合辦或協辦之第三人，如您選擇參與該活動，即表示您瞭解並同意將該個人資料為各該活動之目的提供予合辦或協辦之第三人。(2)本公司∕《落日轉運站 Sunset Terminal》官方網站將因法律規定、法院命令、行政調查或其他法律程序的要求而提供您的資料，惟在此情形下，該資料只會單純提供予調查單位，並受中華民國相關法律的保護。(3)為了調查和防止非法活動、涉嫌詐欺、對人身安全有潛在威脅的狀況。(4) 對本公司∕《落日轉運站 Sunset Terminal》官方網站服務條款的違反，或站或本公司被其他公司收購或合併，我們有權利將您的個人資料移轉給該公司。如果發生這種情況，本公司會在您的個人資料被移轉且將適用不同的隱私權政策前通知您。
                        </p>
                        <p class="body-04">
                            本公司∕《落日轉運站 Sunset Terminal》官方網站有權視實際情形修訂本政策，本政策有重大變更時，本網站將張貼公告，您有義務隨時注意本政策有無更新或修訂。如您不同意所變更之內容，得隨時選擇退出相關服務，並請您立即停用《落日轉運站 Sunset Terminal》官方網站之服務，如您繼續使用本網站，即表示您同意本政策變更之內容。
                        </p>
                    </div>
                </div>
                <div class="modal__footer" data-custom-close="modal-privacy">閱讀完畢</div>
            </div>
        </div>
    </div>
    <!-- Plugins -->
    <script src="/terminalAssets/js/plugins/jquery-3.5.1.min.js"></script>
    <script src="/terminalAssets/js/plugins/jquery-ui-1.13.2/jquery-ui.min.js"></script>
    <script src="/terminalAssets/js/plugins/select2.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>

    <!-- Custom -->
    <script src="/terminalAssets/js/plugins/micromodal.min.js"></script>
    <script src="/terminalAssets/js/phone_code.js"></script>
    <script src="/terminalAssets/js/booking.js?2401031"></script>
</body>
</html>