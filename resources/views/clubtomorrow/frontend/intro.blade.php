<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="keywords" content="驚喜製造、明日俱樂部、明日、劇場、表演">
    <meta name="description" content="在你所熟悉的世界之外，還有另一個世界同時存在⋯ 你，準備好遊戲其中了嗎？">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="明日俱樂部 Club Tomorrow"/>
    <meta property="og:site_name" content="明日俱樂部 Club Tomorrow"/>
    <meta property="og:description" content="在你所熟悉的世界之外，還有另一個世界同時存在⋯ 你，準備好遊戲其中了嗎？"/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/clubtomorrow/intro.html"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/clubT/img/og/og-2_PhoneNumberCollection.jpg"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>明日俱樂部 Club Tomorrow</title>

    <link rel="icon" href="/clubT/favicon.png" type="image/x-icon">

    <!--plugin-->
    <link href="/clubT/css/plugins/bootstrap.css" rel="stylesheet">
    <link href="/clubT/css/plugins/jquery-glitch.css" rel="stylesheet">
    <link href="/clubT/css/plugins/intlTelInput.min.css" rel="stylesheet">
    <link href="/clubT/css/plugins/simplebar.css" rel="stylesheet">

    <!--custom css-->
    <link href="/clubT/css/intro.css" rel="stylesheet"/>

    <!-- Loading Style -->
    <link rel="stylesheet" type="text/css" href="/clubT/css/plugins/loading.css"/>
    <script>document.documentElement.className = 'js';</script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-75329055-7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-75329055-7');
    </script>
</head>

<body class="loading">

    <div class="intro-wrapper d-flex flex-column justify-content-center">
        <div class="intro-inner headline">
            <h5 class="headline-sub">welcome to</h5>
            <img class="master-vision" src="/clubT/img/intro_logo.png" alt="Club Tomorrow">
            <div class="time-counter">
                <div class="d-flex time-rest d-flex align-items-center justify-content-center">
                    <span class="days">00</span><span class="hours">00</span><span class="minutes">00</span><span class="seconds">00</span>
                </div>
            </div>
        </div>

        <div class="intro-inner phoneNumberCollection">
            <form action="">
                <div class="form-group d-inline-block">
                    <p class="shell"></p>
                    <input id="phone" type="tel" title="phoneNumber" class="error" maxlength="11"/>
                    <input type="hidden" name="dial-code"/>
                    <div id="error-msg"></div>
                </div>
                <div class="form-group radio__button">
                    <div class="d-flex align-items-center justify-content-center">
                        <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                            <input type="checkbox" id="agree" name="agree" class="custom-control-input" value="1" required>
                            <span class="custom-control-label">我同意</span>
                        </label>
                        <!-- Button trigger modal -->
                        <a href="javascript://" class="toggle__modal personalCapital" data-toggle="modal" data-target="#personalCapital">
                            透過此通訊裝置接收下一步消息
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

                <div class="button-wrapper d-flex justify-content-center">
                    <button type="button" class="btn-default start-game" disabled>connect</button>
                </div>
            </form>
        </div>

        <div class="intro-inner actionText">
            <div class="actionText-container">
                <div class="glitch">
                    <p>
                        準備好進入另一個世界了嗎？
                        <br/>
                        點擊進入，一切即將開始
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- submitInfo Modal -->
    <div class="modal fade" id="submitInfo" tabindex="-1" role="dialog" aria-labelledby="submitInfolTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-left">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body-container d-flex align-items-center">
                    <div class="modal-body">
                        <h2></h2>
                        <h6></h6>
                    </div>
                </div>
                <div class="modal-footer close" data-dismiss="modal" aria-label="Close">
                    OK
                </div>
            </div>
        </div>
    </div>

    <script src="/clubT/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="/clubT/js/plugins/jquery-glitch.js"></script>
    <script src="/clubT/js/plugins/bootstrap.min.js"></script>
    <script src="/clubT/js/plugins/utils.js"></script>
    <script src="/clubT/js/plugins/simplebar.js"></script>
    <script src="/clubT/js/plugins/intlTelInput.js"></script>

    <!-- Loading Animation Js -->
    <script src="/clubT/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="/clubT/js/phone.js"></script>
</body>
</html>
