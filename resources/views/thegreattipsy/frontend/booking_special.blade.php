<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="keywords" content="驚喜製造, 無光晚餐, 一人餐桌, 台北喝酒, 活動, 沉浸式體驗, 週末要幹麻, 好玩, 喝酒">
    <meta name="description" content="歡迎來到《微醺大飯店》——那些你曾經希望能有所不同的事，在這都有可能發生。">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="微醺大飯店：1980s"/>
    <meta property="og:site_name" content="微醺大飯店：1980s"/>
    <meta property="og:description" content="歡迎來到《微醺大飯店》——那些你曾經希望能有所不同的事，在這都有可能發生。"/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/thegreattipsy"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/thegreattipsy/img/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=0">
    <title>微醺大飯店：1980s</title>

    <!-- Style -->
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/plugins/bootstrap.css"/>

    <!-- Ripple Animation Style -->
    <link rel="stylesheet" type="text/css" href="css/plugins/loading.css"/>
    <link rel="stylesheet" type="text/css" href="css/plugins/component.css"/>
    <script>document.documentElement.className = 'js';</script>

    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome/fontawesome.min.css"/>

    <!-- Select2 style -->
    <link rel="stylesheet" href="css/plugins/select2.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css?v=0.1"/>
    <link rel="stylesheet" href="css/form.css"/>

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

    <div class="container" id="bookingPage">
        <!-- form -->
        <form id="booking" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="discount" id="discount" value="">
            <!--progress title-->
            <h3 class="progress-title">
                微醺大飯店：<span>1980s</span><br/>賓客登記
            </h3>
            <!-- progressbar -->
            <div class="bar-wrapper hide-steps">
                <ul id="progressbar">
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>

            <!-- fieldsets -->
            <fieldset class="step step-1" title="微醺大飯店：1980s　賓客登記">
                <!-- <p class="sub-title text-lining">
                    告訴我們何時可以見到你
                </p>
                <p class="en-sub-title">
                    pick your date and time
                </p> -->
                <div class="form-container">
                    <p class="color-yellow">
    <div style="padding-bottom: 15px;text-align:left;letter-spacing: 1.6px;">120 分鐘，全新故事｜30 場次，期間限定｜21 演員，輪番上演</div>
<ul class="prefix-dash">
    <li>
        單人自在票：$2,300 / 人
    </li>
    <li>
        雙人共享票：$2,200 / 人，2 人需同一場次前來
    </li>
    <li>
        六人沈醉票：$2,100 / 人，6 人需同一場次前來（限量 {{ $data['t6']['number'] }} 組）
    </li>   
</ul>

 

                    </p>
                    <div class="sub-title-wrapper">
                        <h4>
                            <span>購票流程</span>
                        </h4>
                    </div>
                    <p>&nbsp;</p>
                    <p class="prefix-step">
                        <span class="prefix">Step 1</span>選擇票券種類<br/>
                        <span class="prefix">Step 2</span>選擇日期時段<br/>
                        <span class="prefix">Step 3</span>填寫賓客資料<br/>
                        <span class="prefix">Step 4</span>確認預約資訊<br/>
                        <span class="prefix">Step 5</span>完成預約
                    </p>
                    <p>&nbsp;</p>
                    <div class="sub-title-wrapper">
                        <h4>
                            <span>注意事項</span>
                        </h4>
                    </div>
                    <p>&nbsp;</p>
                    <ul class="prefix-dash">
                        <li>
                            若⽇期無法選擇，代表該場次已滿，或是當日不開放。
                        </li>
                        <li>
                            請確實填寫正確的電子信箱與電話，微醺大飯店將以此與你聯繫溝通。
                        </li>
                    </ul>
                    <!-- <p>&nbsp;</p>
                    <p>
                        有任何訂位問題，歡迎來信<br/>
                        <a href="mailto:thegreattipsy@surpriselab.com.tw">thegreattipsy@surpriselab.com.tw</a>
                    </p> -->
                    <p>&nbsp;</p>
                    <div class="form-group radio__button">
                        <div class="d-flex align-items-center flex-wrap">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" id="agreerule" name="agree" class="custom-control-input" value="1" required>
                                <span class="custom-control-label">我已詳讀並遵守</span>
                            </label>
                            <a href="rules.html" target="_blank">
                                微醺大飯店：1980s劃位與體驗規則
                            </a>
                        </div>
                    </div>
                </div>

                <div class="feature-btn text-center">
                    <button type="button" name="next" class="btn-outline next action-button" disabled>開始預約</button>
                </div>
            </fieldset>
            <fieldset class="step step-2" title="選擇票券">
                <div class="form-container">
                    <p class="field-intro">
                        請點選你欲購買的<span class="color-pink">票券</span>
                    </p>

                    <div class="form-group select-format">
                        <label class="form-label" for="booking_people">票券</label>
                        <select id="booking_people" name="booking_people" data-placeholder="選擇票券" required>
                            <option></option>
                            <option value="1" data-money="{{ $data['money'][0]['money'] }}">單人自在票</option>
                            <option value="2" data-money="{{ $data['money'][1]['money'] }}">雙人共享票</option>
                            <option value="6" data-money="{{ $data['money'][2]['money'] }}" @if($data['count']>=$data['t6']['number']) disabled>六人沈醉票(已售完) @else >六人沈醉票 @endif</option>
                        </select>
                    </div>

                    <!-- <div class="form-check">
                        <input type="radio" name="ticket-type" id="ticket-1" value="0">
                        <label class="form-check-label" for="ticket-1">
                            暢行無阻票 <span>The Great Tipsy Ticket</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="ticket-type" id="ticket-2" value="1">
                        <label class="form-check-label" for="ticket-2">
                            時間有點限制票 <span>Matinee&Weekdays Ticket</span>
                        </label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="ticket-type" id="ticket-3" value="2">
                        <label class="form-check-label" for="ticket-3">
                            四人沈醉票 Group Ticket
                        </label>
                    </div> -->

                    <div class="feature-btn d-flex justify-content-between multi-btn">
                        <button type="button" name="previous" class="btn-outline previous action-button">上一步</button>
                        <button type="button" name="next" class="btn-outline next action-button">下一步</button>
                    </div>
                </div>
            </fieldset>
            <fieldset class="step step-3" title="日期、時段選擇">
                <div class="form-container">
                    <!-- <div class="form-group select-format">
                        <label class="form-label" for="booking_people">人數</label>
                        <select id="booking_people" name="booking_people" data-placeholder="選擇人數" required>
                            <option></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div> -->

                    <div class="form-group with-icon">
                        <label class="form-label" for="booking_date">日期</label>
                        <div class="field-icon-wrapper">
                            <input type="text" name="booking_date" id="booking_date" readonly placeholder="選擇日期"/>
                            <span class="field-icon"></span>
                        </div>
                        <div class="calender-wrapper"></div>
                    </div>
                    <div class="form-group select-format">
                        <label class="form-label" for="booking_time_slot">時段</label>
                        <select id="booking_time_slot" name="booking_time_slot" data-placeholder="選擇時段" required>
                            <option></option>
                            <!--<option>上午</option>-->
                            <!--<option>晚上</option>-->
                        </select>
                    </div>
                    <div class="form-group select-format">
                        <label class="form-label" for="booking_time">時間</label>
                        <select id="booking_time" name="booking_time" data-placeholder="選擇時間" required>
                            <option></option>
                            <!--<option>18:00-19:30</option>-->
                            <!--<option>20:00-21:30</option>-->
                        </select>
                    </div>

                    <div class="feature-btn d-flex justify-content-between multi-btn">
                        <button type="button" name="previous" class="btn-outline previous action-button">上一步</button>
                        <button type="button" name="next" class="btn-outline next action-button">下一步</button>
                    </div>
                </div>
            </fieldset>
            <fieldset class="step step-4" title="資料填寫">
                <div class="form-container">
                    <div class="field-intro">
                        請填寫正確電子信箱與電話，預約成功後將寄送行前通知與重要訊息。（建議避開 yahoo 與 hotmail 信箱，以免漏信）
                    </div>

                    <div class="form-group input-with-label">
                        <label for="name">* 姓名</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="ex. 微醺大飯店">
                    </div>

                    <div class="form-group input-with-label">
                        <label for="phone">* 電話<span class="error-msg"></span></label>
                        <input type="text" name="phone" class="form-control phone" id="phone" placeholder="ex. 0987654321">
                    </div>

                    <div class="form-group input-with-label">
                        <label for="email">* 電子信箱<span class="error-msg"></span></label>
                        <input type="email" name="email" class="form-control has-verification email" id="email" placeholder="ex. thegreattipsy@surpriselab.com.tw">
                    </div>

                    <div class="form-group select-format">
                        <label class="form-label" for="vegetarian_food">* 蛋奶素（如果都吃葷，請選0人）</label>
                        <select id="vegetarian_food" name="vegetarian_food" data-placeholder="選擇人數" required>

                        </select>
                    </div>

                    <div class="form-group textarea-with-label">
                        <label for="notice">其他備註</label>
                        <textarea id="notice" name="notice" rows="2" placeholder="特殊事項備註 / 發票是否打統編"></textarea>
                    </div>

                    <div class="form-group radio__button">
                        <div class="d-flex align-items-center">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" id="agree" name="agree" class="custom-control-input" value="1" required>
                                <span class="custom-control-label">我已詳讀並遵守</span>
                            </label>
                            <!-- Button trigger modal -->
                            <a href="javascript://" class="toggle__modal personalCapital" data-toggle="modal" data-target="#personalCapital">
                                隱私權條款
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="personalCapital" tabindex="-1" role="dialog" aria-labelledby="personalCapitalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content text-left">
                                        <div class="modal-header">
                                            <h5 class="modal-title">隱私權政策</h5>
                                        </div>
                                        <div class="modal-body-container">
                                            <div class="modal-body">
                                                <p>
                                                    <span class="d-block d-sm-inline-block">《微醺大飯店：1980s》官方網站</span> <a href="http://www.surpriselab.com.tw/thegreattipsy" target="_blank">http://www.surpriselab.com.tw/thegreattipsy</a>（以下稱「本網站」）為驚喜製造有限公司（以下稱「本公司」）所經營，本網站尊重您的隱私權，並致力於保護您的個人資料。於使用《微醺大飯店：1980s》官方網站前，請您詳細閱讀本條之「隱私權政策」（以下稱「本政策」），並隨時注意本網站所公告之相關修改或變更，本公司有權於任何時間修改或變更本隱私權政策之內容。當您使用本網站時，或於任何修改、變更後繼續使用本網站，皆表示您已閱讀、瞭解並同意接受本政策，或該修改、變更後之內容，及同意依據本政策蒐集、處理與利用您的個人資料；如果您無法遵守或不同意本政策之內容，或您所屬的國家、地區排除本政策內容之全部或一部時，請您立即停止使用《微醺大飯店：1980s》官方網站。此外，驚喜製造有限公司於未經您許可的情形下，絕不會將您的個人資料提供予任何第三方。
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    若您為未滿二十歲或無完全行為能力，除應符合上述規定外，請於您的法定代理人或監護人閱讀、瞭解並同意本政策及其後修改、變更後之所有內容後，方得使用或繼續使用本網站，否則請立即停止使用。當您使用或繼續使用《微醺大飯店：1980s》官方網站時，即視為您的法定代理人或監護人已閱讀、瞭解並同意接受本政策及其後修改、變更之所有內容。個人資料之類別：當您使用本網站之服務，本公司會請您提供您下列類別的個人資料，如：<br/>
                                                    辨識個人者（例如：姓名、住址、電子郵件信箱、行動電話）、<br/>
                                                    辨識財務者（例如：信用卡或簽帳卡之號碼、銀行帳戶之號碼與姓名）、<br/>
                                                    生活格調（例如：使用消費品之種類及服務之細節、個人之消費模式）、<br/>
                                                    資料主體所取得之財貨或服務（例如：貨物或服務之有關細節）、<br/>
                                                    財務交易（例如：收付金額、支付方式、往來紀錄）、<br/>
                                                    資料主體之商業活動（例如：商業種類、提供或使用之財貨或服務、商業契約）、<br/>
                                                    約定或契約（例如：關於交易、商業、法律或其他契約、代理）、<br/>
                                                    未分類之資料（例如：用餐意見、無法歸類之檔案、報告），<br/>
                                                    及其他任何得以直接或間接方式識別個人之資料等。<br/>
                                                    惟請注意，您於《微醺大飯店：1980s》官方網站中進行交易時，所輸入之信用卡卡號、有效日期及授權碼，均僅儲存於您個人之行動裝置中，本網站將不會蒐集、處理或利用您上述個人資料。
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    個人資料之利用：當您在《微醺大飯店：1980s》官方網站登錄個人資料以進行相關交易時，所留下的個人資料包括但不限於姓名、電子郵件地址、手機號碼及發票寄送地址等，將在本網站妥當的保存，所蒐集信用卡資訊或銀行資訊，均經使用安全的SSL加密協議處理，可確保您的隱私。
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    不提供個人資料之影響：您可自由選擇是否提供您上述的個人資料，但當您不同意提供時，您將無法享有《微醺大飯店：1980s》官方網站所提供之服務。凡購買本網站供的服務或產品，本公司可能會透過電子郵件傳送您於《微醺大飯店：1980s》官方網站的購買活動，包括但不限於消費者的帳戶、聯絡資訊或查詢、購買優惠的紀錄。您可選擇是否接收電子郵件，但當您不同意接收時，您將無法享有《微醺大飯店：1980s》官方網站提供之服務。
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    個人資料利用之地區：本公司之個人資料主機、相關網路伺服器主機所在地及本公司∕《微醺大飯店：1980s》官方網站相關服務或商品發行或行銷地區，為您個人資料利用之地區。
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    您對個人資料之權利：在不違反相關法律的情況下，於本公司確認該個人資料為您本人所有後，您可以聯絡本公司∕《微醺大飯店：1980s》官方網站站，或將您的需求郵寄至本公司的電子郵件信箱，以行使下列之權利：(1)查詢、閱覽、補充或更正您的個人資料。(2)停止蒐集、處理或利用您的個人資料。(3)刪除您的個人資料。(4)提供您個人資料的複製本。(5)停止寄發給《微醺大飯店：1980s》官方網站相關廣告及行銷活動。但請注意，若您已於各該實際交易中提供您的個人資料給商家或交易對象，除法律另有規定之情形外，有關您的上述權利，應向各該商家或交易對象行使。
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    除下列情形外，本公司不會任意將用戶的個人資料出售、轉讓或揭露予任何第三人：(1)本公司在與其他第三人合辦或協辦活動時，與該第三人共用、傳遞您的資料，才能夠提供您要求的產品或服務。惟《微醺大飯店：1980s》官方網站會於各該活動頁面明確告知您的個人資料將因參與該活動而提供予合辦或協辦之第三人，如您選擇參與該活動，即表示您瞭解並同意將該個人資料為各該活動之目的提供予合辦或協辦之第三人。(2)本公司∕《微醺大飯店：1980s》官方網站將因法律規定、法院命令、行政調查或其他法律程序的要求而提供您的資料，惟在此情形下，該資料只會單純提供予調查單位，並受中華民國相關法律的保護。(3)為了調查和防止非法活動、涉嫌詐欺、對人身安全有潛在威脅的狀況。(4) 對本公司∕《微醺大飯店：1980s》官方網站服務條款的違反，或站或本公司被其他公司收購或合併，我們有權利將您的個人資料移轉給該公司。如果發生這種情況，本公司會在您的個人資料被移轉且將適用不同的隱私權政策前通知您。
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    本公司∕《微醺大飯店：1980s》官方網站有權視實際情形修訂本政策，本政策有重大變更時，本網站將張貼公告，您有義務隨時注意本政策有無更新或修訂。如您不同意所變更之內容，得隨時選擇退出相關服務，並請您立即停用《微醺大飯店：1980s》官方網站之服務，如您繼續使用本網站，即表示您同意本政策變更之內容。
                                                </p>
                                            </div>
                                        </div>
                                        <div class="modal-footer close" data-dismiss="modal" aria-label="Close">
                                            閱讀完畢
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="feature-btn d-flex justify-content-between multi-btn">
                        <button type="button" name="previous" class="btn-outline previous action-button">上一步</button>
                        <button type="button" name="next" class="btn-outline next action-button">下一步</button>
                    </div>
                </div>
            </fieldset>
            <fieldset class="step step-5" title="確認賓客資料">
                <div class="form-container">
                    <table class="filled-data">
                        <tr>
                            <td>姓名</td>
                            <td class="filled" data-filled="name"></td>
                        </tr>
                        <tr>
                            <td>電話</td>
                            <td class="filled" data-filled="phone"></td>
                        </tr>
                        <tr>
                            <td>電子信箱</td>
                            <td class="filled" data-filled="email"></td>
                        </tr>
                        <!-- <tr>
                            <td>票券</td>
                            <td class="filled" data-filled="booking_ticket"></td>
                        </tr> -->
                        <tr>
                            <td>人數</td>
                            <td class="filled" data-filled="booking_people"></td>
                        </tr>
                        <tr>
                            <td>日期</td>
                            <td class="filled" data-filled="booking_date"></td>
                        </tr>
                        <tr>
                            <td>時段</td>
                            <td class="filled" data-filled="booking_time"></td>
                        </tr>
                        <tr>
                            <td>飲食選項</td>
                            <td>葷食 <span id="filled_pv"></span> 人，蛋奶素 <span class="filled" data-filled="vegetarian_food"></span> 人</td>
                        </tr>
                        <tr class="notice">
                            <td>其他備註</td>
                            <td class="filled" data-filled="notice"></td>
                        </tr>
                        <!--tr class="coupon-note">
                            <td>劃位序號</td>
                            <td>
                                若有多組序號，請一次填入一組劃位序號，按下確認後折抵
                            </td>
                        </tr-->
                        <tr class="coupon-code">
                            <td></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <input class="flex-fill" type="text" name="coupon" placeholder="請輸入折扣碼"/>
                                    <button type="button" class="verification-code btn-outline">確認</button>
                                </div>
                                <div class="submit-coupon-wrapper"></div>
                            </td>
                        </tr>
                    </table>
                    <div class="feature-btn d-flex justify-content-between multi-btn">
                        <button type="button" name="previous" class="btn-outline previous action-button">上一步</button>
                        <button type="submit" name="submit" class="btn-outline submit" id="btn-online-submit">
                            前往付款 NT$<span class="amountToGo"></span>
                        </button>
                    </div>

                    <div class="modal" tabindex="-1" role="dialog" id="lightbox2pay">
                        <div class="modal-dialog" role="document" style="top: 10%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">信用卡付款</h5>
                                </div>
                            <div class="modal-body">
                                <div class="tpfield" id="card-number" style="height: 30px;"></div>
                                <div class="tpfield" id="card-expiration-date" style="height: 30px;"></div>
                                <div class="tpfield" id="card-ccv" style="height: 30px;"></div>   
                                <p>如頁面無法輸入信用卡號結帳，請檢視瀏覽器的版本是否為最新，或改用 Google Chrome 或 Safari 結帳，謝謝。</p>
                                <div style="text-align:center;">
                                    <a href="https://www.tappaysdk.com/tch" target="_blank">
                                        <img src="https://docs.tappaysdk.com/images/logo.png" width="100">
                                    </a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="SurePay">確認付款</button>
                                    <button type="button" class="btn btn-secondary" id="CanalPay" data-dismiss="modal">取消</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <!-- <div class="submit-page success" id="bookingSuccess"> -->
    <div class="submit-page success" id="bookingSuccess" style="display:none;">
        <div class="container">
            <h3 class="page-title">
                你已完成賓客預約！
            </h3>
            <p class="page-sub-title">
                請至你的信箱確認預約完成信件
            </p>
            <p class="page-info">
                它有時候會跑到垃圾郵件，可以翻找一下<br/><br/>
            </p>
            <div class="feature-btn" style="text-align: center;">
                <a class="btn-outline" href="index.html">關於微醺大飯店：1980s</a>
            </div>
        </div>
    </div>

    <!-- <div class="submit-page error" id="bookingError"> -->
    <div class="submit-page error" id="bookingError" style="display:none;">
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
                <a class="btn-outline" href="booking_pay.html">重新預約</a>
            </div>
        </div>
    </div>
</main>

<!-- Bootstrap -->
<script src="js/plugins/jquery-3.3.1.min.js"></script>
<script src="js/plugins/jquery-ui.js"></script>
<script src="js/plugins/popper.min.js"></script>
<script src="js/plugins/bootstrap.min.js"></script>

<!-- Ripple Animation Js -->
<script src="js/plugins/pixi.min.js"></script>
<script src="js/plugins/TweenMax.min.js"></script>
<script src="js/plugins/custom-ripple.js"></script>
<script src="js/plugins/imagesloaded.pkgd.min.js"></script>

<!-- Select2 script-->
<script src="js/select2.js?v=1"></script>
<!-- blockUI script-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<!-- Custom Js -->
<script src="js/form_special.js?v=0.1"></script>

</body>
</html>
