<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    @include('clubtomorrow.frontend._metadata')
    <meta property="og:url" content="https://www.surpriselab.com.tw/clubtomorrow/booking.html"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>明日俱樂部 Club Tomorrow</title>

    <!-- Style -->
    <link rel="icon" href="/clubT/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/clubT/css/plugins/bootstrap.css"/>

    <!-- Ripple Animation Style -->
    <link rel="stylesheet" type="text/css" href="/clubT/css/plugins/loading.css"/>
    <script>document.documentElement.className = 'js';</script>

    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="/clubT/css/plugins/font-awesome/fontawesome.min.css"/>

    <!-- Select2 style -->
    <link rel="stylesheet" href="/clubT/css/plugins/select2.css"/>

    <!-- Custom CSS -->
    <link href="/clubT/css/plugins/intlTelInput.min.css" rel="stylesheet">
    <link href="/clubT/css/plugins/simplebar.css" rel="stylesheet">
    <link rel="stylesheet" href="/clubT/css/style.css"/>
    <link rel="stylesheet" href="/clubT/css/intro.css"/>
    <link rel="stylesheet" href="/clubT/css/form.css"/>
    @include('clubtomorrow.frontend._gtm')
    @include('clubtomorrow.frontend._fbpixel')
</head>
<body class="loading">
    <div class="homepage booking">
        <!-- Anchor menu -->
        <nav class="anchor-wrapper">
            <ul>
                <li class="d-none">
                    <a class="smoothScroll" href="index.html#Home">_Home</a>
                </li>
                <li>
                    <a class="smoothScroll" href="index.html#Entrance">_Entrance</a>
                </li>
                <li>
                    <a class="smoothScroll" href="index.html#aboutSec">_About</a>
                </li>
                <li>
                    <a class="smoothScroll" href="radio.html">_Radio</a>
                </li>
                <li>
                    <a class="smoothScroll" href="index.html#ticketSec">_Ticket</a>
                </li>
                <li>
                    <a class="smoothScroll" href="index.html#Rules">_Rules</a>
                </li>
                <li>
                    <a class="smoothScroll" href="index.html#Contact">_Contact</a>
                </li>
            </ul>
        </nav>
        <!-- End anchor menu -->

        <!-- Social Links -->
        <aside class="social-wrapper">
            <ul>
                <li class="social-link">
                    <a href="https://www.facebook.com/surpriselabtw" target="_blank">
                        <img class="img-fluid" src="/clubT/img/icon/icon_FB.svg" alt="facebook">
                    </a>
                </li>
                <li class="social-link">
                    <a href="https://www.instagram.com/surpriselabtw/" target="_blank">
                        <img class="img-fluid" src="/clubT/img/icon/icon_IG.svg" alt="instagram">
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Header LOGO -->
        <header class="d-flex align-items-end">
            <div class="container">
                <!-- Header LOGO -->
                <div class="logo-wrapper">
                    <div class="logo">
                        <a class="smoothScroll" href="index.html">
                            <img src="/clubT/img/header_logo.png" alt="明日俱樂部 Club Tomorrow">
                        </a>
                        <button class="hamburger">
                            <span class="current-page">_Entrance</span>
                            <span class="current-menu">_Menu</span>
                            <span class="menu-button">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <div class="mobile-menu">
            <ul class="menu-wrapper">
                <li class="menu-item d-none">
                    <a class="smoothScroll" href="index.html#Home">Home</a>
                </li>
                <li class="menu-item">
                    <a class="smoothScroll" href="index.html#Entrance">Entrance</a>
                </li>
                <li class="menu-item">
                    <a class="smoothScroll" href="index.html#aboutSec">About</a>
                </li>
                <li class="menu-item">
                    <a class="smoothScroll" href="radio.html">Radio</a>
                </li>
                <li class="menu-item">
                    <a class="smoothScroll" href="index.html#ticketSec">Ticket</a>
                </li>
                <li class="menu-item">
                    <a class="smoothScroll" href="index.html#Rules">Rules</a>
                </li>
                <li class="menu-item">
                    <a class="smoothScroll" href="index.html#Contact">Contact</a>
                </li>
            </ul>
            <ul class="social-wrapper">
                <li class="social-link">
                    <a href="https://www.facebook.com/surpriselabtw" target="_blank">
                        <img class="img-fluid" src="/clubT/img/icon/icon_FB.svg" alt="facebook">
                    </a>
                </li>
                <li class="social-link">
                    <a href="https://www.instagram.com/surpriselabtw/" target="_blank">
                        <img class="img-fluid" src="/clubT/img/icon/icon_IG.svg" alt="instagram">
                    </a>
                </li>
            </ul>
        </div>

        <main class="sections" id="submit-main">
            <div class="container">
                <!-- form -->
                <form id="booking">
                    <!--progress title-->
                    <h2 class="progress-title"></h2>
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
                    <fieldset class="step step-1" title="明日俱樂部．玩家登入">
                        <h2 class="title">
                            明日俱樂部．玩家登入
                        </h2>
                        <p class="en-sub-title">
                            pick your date and time
                        </p>
                        <div class="form-container">
                            <p class="color-bright-green field-intro d-none d-md-block">
                                進入前，請花些時間詳讀規則，讓你的登入更加順暢
                            </p>
                            <p class="color-bright-green field-intro d-block d-md-none">
                                進入前，請花些時間詳讀規則<br/>
                                讓你的登入更加順暢
                            </p>
                            <div class="prefix-step">
                                <div class="prefix-step-inner">
                                    <span class="prefix">Step 1</span>選擇欲劃位的人數<br/>
                                    <span class="prefix">Step 2</span>選擇日期、時段<br/>
                                    <span class="prefix">Step 3</span>填寫玩家資料<br/>
                                    <span class="prefix">Step 4</span>確認訂單，<span class="color-bright-green">輸入劃位序號</span><br/>
                                    <span class="prefix">Step 5</span>完成登入
                                </div>
                            </div>
                            <div class="sub-title-wrapper">
                                <h4>
                                    <span>NOTICE</span>
                                </h4>
                            </div>
                            <ul class="prefix-dash">
                                <li>
                                    若⽇期無法選擇，代表該場次已滿，或是當日不開放。
                                </li>
                                <li>
                                    請確實填寫正確的電子信箱與電話，將以此與玩家們聯繫溝通。
                                </li>
                            </ul>
                            <p>
                                有任何訂位問題，歡迎來信<br/>
                                <a href="mailto:clubtomorrow@surpriselab.com.tw">clubtomorrow@surpriselab.com.tw</a>
                            </p>
                            <div class="form-group radio__button">
                                <div class="d-flex align-items-center flex-wrap">
                                    <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                        <input type="checkbox" id="agreerule" name="agree" class="custom-control-input" value="1" required>
                                        <span class="custom-control-label">我已詳讀並遵守</span>
                                    </label>
                                    <a href="rules.html" class="link-bright-green" target="_blank">
                                        明日俱樂部劃位與體驗規則
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="feature-btn text-center">
                            <button type="button" name="next" class="btn-bright-blue next action-button" disabled>開始登入</button>
                        </div>
                    </fieldset>
                    <fieldset class="step step-2" title="選擇人數">
                        <div class="form-container">
                            <p class="field-intro color-bright-green">
                                請點選你欲劃位的人數
                            </p>

                            <div class="sub-title-wrapper">
                                <h4>
                                    <span>票券序號說明</span>
                                </h4>
                            </div>
                            <ul class="prefix-dash custom-text">
                                <li data-name="單人票">
                                    一張單人票對應一組序號，依此類推
                                </li>
                                <li data-name="四人票">
                                    一組序號劃位四人，限同日期同場次，不可分開劃位
                                </li>
                                <li data-name="十人票">
                                    一組序號劃位十人，限同日期同場次，不可分開劃位
                                </li>
                            </ul>

                            <div class="form-group select-format">
                                <label class="form-label d-none" for="booking_people">人數</label>
                                <select id="booking_people" name="booking_people" data-placeholder="選擇人數" required>
                                    <option></option>
                                </select>
                            </div>

                            <div class="feature-btn d-flex justify-content-between multi-btn">
                                <button type="button" name="previous" class="btn-bright-blue previous action-button">上一步</button>
                                <button type="button" name="next" class="btn-bright-blue next action-button">下一步</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="step step-3" title="日期、時段選擇">
                        <div class="form-container">
                            <div class="form-group with-icon">
                                <label class="form-label" for="booking_date">日期</label>
                                <div class="field-icon-wrapper">
                                    <input type="text" name="booking_date" id="booking_date" readonly placeholder="選擇日期"/>
                                    <span class="field-icon"></span>
                                </div>
                                <div class="calender-wrapper"></div>
                            </div>
                            <!--<div class="form-group select-format">-->
                                <!--<label class="form-label" for="booking_time_slot">時段</label>-->
                                <!--<select id="booking_time_slot" name="booking_time_slot" data-placeholder="選擇時段" required>-->
                                    <!--<option></option>-->
                                <!--</select>-->
                            <!--</div>-->
                            <div class="form-group select-format">
                                <label class="form-label" for="booking_time">時段</label>
                                <select id="booking_time" name="booking_time" data-placeholder="選擇時段" required>
                                    <option></option>
                                </select>
                            </div>

                            <div class="feature-btn d-flex justify-content-between multi-btn">
                                <button type="button" name="previous" class="btn-bright-blue previous action-button">上一步</button>
                                <button type="button" name="next" class="btn-bright-blue next action-button">下一步</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="step step-4" title="資料填寫">
                        <div class="form-container">
                            <div class="field-intro">
                                請填寫正確電子信箱與手機號碼，登入成功後俱樂部將寄送行前通知與重要訊息。
                            </div>

                            <div class="form-group input-with-label">
                                <label for="name">* 姓名</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="ex. 明日俱樂部">
                            </div>

                            <div class="form-group input-with-label">
                                <label for="field_phone" class="field_phone_label">* 手機<span class="error-msg"></span></label>
                                <input id="field_phone" name="field_phone" type="tel" placeholder="ex. 0987654321" title="phoneNumber" class="form-control error phone has-verification" maxlength="11"/>
                                <input type="hidden" name="dial-code"/>
                                <!--<input type="text" name="phone" class="form-control has-verification phone" id="filed_phone" placeholder="ex. 0987654321">-->
                            </div>

                            <div class="form-group input-with-label">
                                <label for="email">* EMAIL<span class="error-msg"></span></label>
                                <input type="email" name="email" class="form-control has-verification email" id="email" placeholder="ex. clubtomorrow@surpriselab.com.tw">
                            </div>

                            <div class="form-group textarea-with-label">
                                <label for="notice">其他備註</label>
                                <textarea id="notice" name="notice" rows="2" placeholder="特殊事項備註／發票是否打統編"></textarea>
                            </div>

                            <div class="form-group radio__button">
                                <div class="d-flex align-items-center flex-wrap">
                                    <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                        <input type="checkbox" id="agree" name="agree" class="custom-control-input" value="1" required>
                                        <span class="custom-control-label">我已詳讀並遵守</span>
                                    </label>
                                    <!-- Button trigger modal -->
                                    <a href="javascript://" class="personalCapital link-bright-green" data-toggle="modal" data-target="#personalCapital">
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
                                                        <p>明日俱樂部 Club Tomorrow 官方網站 http://www.surpriselab.com.tw/clubtomorrow（以下稱「明日俱樂部網站」）為驚喜製造有限公司（以下稱「本公司」）所經營，明日俱樂部網站尊重您的隱私權，並致力於保護您的個人資料。於使用明日俱樂部網站前，請您詳細閱讀本條之「隱私權政策」（以下稱「本政策」），並隨時注意明日俱樂部網站所公告之相關修改或變更，本公司有權於任何時間修改或變更本隱私權政策之內容。當您使用明日俱樂部網站時，或於任何修改、變更後繼續使用明日俱樂部網站，即表示您已閱讀、瞭解並同意接受本政策，或該等修改、變更後之內容，及同意明日俱樂部網站依據本政策蒐集、處理與利用您的個人資料；如果您無法遵守或不同意本政策之內容，或您所屬的國家、地區排除本政策內容之全部或一部時，請您立即停止使用明日俱樂部網站。此外，明日俱樂部網站於未經您許可的情形下，絕不會將您的個人資料提供予任何第三方。</p>
                                                        <p>若您為未滿二十歲或無完全行為能力，除應符合上述規定外，請於您的法定代理人或監護人閱讀、瞭解並同意本政策及其後修改、變更後之所有內容後，方得使用或繼續使用明日俱樂部網站，否則請立即停止使用明日俱樂部網站。當您使用或繼續使用明日俱樂部網站時，即視為您的法定代理人或監護人已閱讀、瞭解並同意接受本政策及其後修改、變更之所有內容。個人資料之類別：當您使用明日俱樂部網站之服務，本公司會請您提供您下列類別的個人資料，如：</p>
                                                        <p>辨識個人者（例如：姓名、住址、電子郵件信箱、行動電話）、<br/>
                                                            辨識財務者（例如：信用卡或簽帳卡之號碼、銀行帳戶之號碼與姓名）、<br/>
                                                            生活格調（例如：使用消費品之種類及服務之細節、個人之消費模式）、<br/>
                                                            資料主體所取得之財貨或服務（例如：貨物或服務之有關細節）、<br/>
                                                            財務交易（例如：收付金額、支付方式、往來紀錄）、<br/>
                                                            資料主體之商業活動（例如：商業種類、提供或使用之財貨或服務、商業契約）、<br/>
                                                            約定或契約（例如：關於交易、商業、法律或其他契約、代理）、<br/>
                                                            未分類之資料（例如：用餐意見、無法歸類之檔案、報告），<br/>
                                                            及其他任何得以直接或間接方式識別個人之資料等。<br/>
                                                            惟請注意，您於明日俱樂部網站中進行交易時，所輸入之信用卡卡號、有效日期及授權碼，均僅儲存於您個人之行動裝置中，明日俱樂部網站將不會蒐集、處理或利用您上述個人資料。</p>
                                                        <p>個人資料之利用：當您在明日俱樂部網站登錄個人資料以進行相關交易時，所留下的個人資料包括但不限於姓名、電子郵件地址、手機號碼及發票寄送地址等，將在明日俱樂部網站妥當的保存，明日俱樂部網站所蒐集信用卡資訊或銀行資訊，均經使用安全的SSL加密協議處理，可確保您的隱私。</p>
                                                        <p>不提供個人資料之影響：您可自由選擇是否提供您上述的個人資料，但當您不同意提供時，您將無法享有明日俱樂部網站所提供之服務。凡購買明日俱樂部網站提供的服務或產品，本公司可能會透過電子郵件傳送您於明日俱樂部網站的購買活動，包括但不限於消費者的帳戶、聯絡資訊或查詢、購買優惠的紀錄。您可選擇是否接收電子郵件，但當您不同意接收時，您將無法享有明日俱樂部網站提供之服務。</p>
                                                        <p>個人資料利用之地區：本公司之個人資料主機、相關網路伺服器主機所在地及本公司∕明日俱樂部網站相關服務或商品發行或行銷地區，為您個人資料利用之地區。</p>
                                                        <p>您對個人資料之權利：在不違反相關法律的情況下，於本公司確認該個人資料為您本人所有後，您可以撥打聯絡本公司∕明日俱樂部網站，或將您的需求郵寄至本公司的電子郵件信箱，以行使下列之權利：(1)查詢、閱覽、補充或更正您的個人資料。(2)停止蒐集、處理或利用您的個人資料。(3)刪除您的個人資料。(4)提供您個人資料的複製本。(5)停止寄發給您明日俱樂部網站相關廣告及行銷活動。但請注意，若您已於各該實際交易中提供您的個人資料給商家或交易對象，除法律另有規定之情形外，有關您的上述權利，應向各該商家或交易對象行使。</p>
                                                        <p>除下列情形外，本公司不會任意將用戶的個人資料出售、轉讓或揭露予任何第三人：(1)本公司在與其他第三人合辦或協辦活動時，與該第三人共用、傳遞您的資料，才能夠提供您要求的產品或服務。惟明日俱樂部網站會於各該活動頁面明確告知您的個人資料將因參與該活動而提供予合辦或協辦之第三人，如您選擇參與該活動，即表示您瞭解並同意將該個人資料為各該活動之目的提供予合辦或協辦之第三人。(2)本公司∕明日俱樂部網站將因法律規定、法院命令、行政調查或其他法律程序的要求而提供您的資料，惟在此情形下，該資料只會單純提供予調查單位，並受中華民國相關法律的保護。(3)為了調查和防止非法活動、涉嫌詐欺、對人身安全有潛在威脅的狀況、對本公司∕明日俱樂部網站服務條款的違反，或為了對上述情形採取應對措施。(4) 明日俱樂部網站或本公司被其他公司收購或合併，我們有權利將您的個人資料移轉給該公司。如果發生這種情況，明日俱樂部網站會在您的個人資料被移轉且將適用不同的隱私權政策前通知您。</p>
                                                        <p>本公司∕明日俱樂部網站有權隨時視實際情形修訂本政策，本政策有重大變更時，明日俱樂部網站將張貼公告，您有義務隨時注意本政策有無更新或修訂。如您不同意所變更之內容，得隨時選擇退出相關服務，並請您立即停用明日俱樂部網站之服務，如您繼續使用明日俱樂部網站，即表示您同意本政策變更之內容。</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer close" data-dismiss="modal" aria-label="Close">
                                                    閱讀完畢 & 同意
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-btn d-flex justify-content-between multi-btn">
                                <button type="button" name="previous" class="btn-bright-blue previous action-button">上一步</button>
                                <button type="button" name="next" class="btn-bright-blue next action-button">下一步</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="step step-5" title="確認登入資料與劃位序號填寫">
                        <div class="form-container">
                            <table class="filled-data">
                                <tr>
                                    <td>姓名</td>
                                    <td class="filled" data-filled="name"></td>
                                </tr>
                                <tr>
                                    <td>手機</td>
                                    <td class="filled" data-filled="field_phone"></td>
                                </tr>
                                <tr>
                                    <td>電子信箱</td>
                                    <td class="filled" data-filled="email"></td>
                                </tr>
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
                                    <td>票券</td>
                                    <td class="filled" data-filled="ticket-type"></td>
                                </tr>
                                <tr class="notice">
                                    <td>其他備註</td>
                                    <td class="filled" data-filled="notice"></td>
                                </tr>
                                <tr class="coupon-note">
                                    <td>劃位序號</td>
                                    <td>
                                        若有多組序號，請一次填入一組劃位序號，按下確認後折抵
                                    </td>
                                </tr>
                                <tr class="coupon-code-message">
                                    <td></td>
                                    <td class="error-message"></td>
                                </tr>
                                <tr class="coupon-code">
                                    <td></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <input class="flex-fill" type="text" name="coupon" placeholder="輸入一組劃位序號"/>
                                            <button type="button" class="verification-code btn-bright-blue" disabled>確認</button>
                                        </div>
                                        <div class="submit-coupon-wrapper"></div>
                                    </td>
                                </tr>
                            </table>
                            <div class="feature-btn d-flex justify-content-between multi-btn">
                                <button type="button" name="previous" class="btn-bright-blue previous action-button">上一步</button>
                                <button type="submit" name="submit" class="btn-bright-blue submit" disabled>
                                    完成劃位 NT$<span class="amountToGo"></span>
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </main>


        <main class="align-items-center justify-content-center" id="submit-success" style="display:none;">
            <div class="submit-page success">
                <div class="container">
                    <h1 class="page-title">
                        你已完成玩家登入
                    </h1>
                    <p class="page-sub-title">
                        請至你的信箱確認登入完成信件
                    </p>
                    <p class="page-info">
                        接近體驗日期時<br/>
                        明日俱樂部將會寄送提醒信件與行前訊息給你<br/>
                        <br/>
                        屆時請注意電子信箱<span class="d-none d-md-inline-block">，</span><br class="d-block d-md-none"/>它有時候會跑到垃圾郵件，可以翻找一下<br/>
                        <br/>
                        準備好遊戲其中了嗎？
                    </p>
                    <div class="feature-btn">
                        <a class="btn-bright-blue" href="index.html#aboutSec">關於明日俱樂部</a>
                    </div>
                </div>
            </div>
        </main>


        <main class="align-items-center justify-content-center" id="submit-error" style="display:none;">
            <div class="submit-page error">
                <div class="container">
                    <h1 class="page-title">
                        whoops！登入未成功
                    </h1>
                    <p class="page-sub-title">
                        可能是某些地方出錯了，還請再試一次
                    </p>
                    <div class="page-info">
                        <p>可能發生以下狀況：</p>
                        <ul class="prefix-number">
                            <li>
                                網路中斷，請確認通訊良好的狀況下再次劃位
                            </li>
                            <li>
                                同時刻有人與你選擇同樣的日期與時段，他比你早完成登入，因而你的登入受到排擠，請再試一次
                            </li>
                        </ul>
                        <br/>
                        若非以上兩種狀況，歡迎來信明日俱樂部詢問：<br/>
                        <a href="mailto:clubtomorrow@surpriselab.com.tw">clubtomorrow@surpriselab.com.tw</a>
                    </div>
                    <div class="feature-btn">
                        <a class="btn-bright-blue" href="booking.html">重新劃位</a>
                    </div>
                </div>
            </div>
        </main>



    </div>

    <div class="loading-wrapper">
        <div class="loading-inner">
            <div class="loading-text">
                <p>Loading</p>
            </div>
        </div>
    </div>

<!-- Bootstrap -->
<script src="/clubT/js/plugins/jquery-3.3.1.min.js"></script>
<script src="/clubT/js/plugins/jquery-ui.js"></script>
<script src="/clubT/js/plugins/popper.min.js"></script>
<script src="/clubT/js/plugins/bootstrap.min.js"></script>

<!-- Ripple Animation Js -->
<script src="/clubT/js/plugins/imagesloaded.pkgd.min.js"></script>

<!-- Select2 script-->
<script src="/clubT/js/plugins/select2.js"></script>

<!-- isMobile -->
<script src="/clubT/js/plugins/isMobile.min.js"></script>

<!-- Custom Js -->
<script src="/clubT/js/plugins/utils.js"></script>
<script src="/clubT/js/plugins/intlTelInput.js"></script>
<script src="/clubT/js/plugins/simplebar.js"></script>
<script src="/clubT/js/plugins/aos.min.js"></script>
<script src="/clubT/js/main.js"></script>
<script src="/clubT/js/form.js?v=0.5"></script>
</body>
</html>
