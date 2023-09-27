<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>預約舞會｜巴黎舞會 Le Bal de Paris de Blanca</title>
    <link rel="icon" href="/paris/img/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&family=Noto+Serif+TC:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/vpt1inn.css">
    <link rel="stylesheet" href="/paris/css/plugins/select2.css"/>
    <link rel="stylesheet" href="/paris/css/booking.css?09134">
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
    
    <main id="leading">
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
                    <a class="p-btn secondary" href="/lebaldeparis">獲得邀請</a>
                </div>
            </form>
        </div>
    </main>

    <main id="notice" style="display:none;">
        <div class="title">
            <img src="/paris/img/deco.svg" />
            <h1>舞會須知</h1>
            <h3>Information</h3>
        </div>
        <div class="info">
            親愛的賓客，我們誠摯邀請你<br>
            跳一晚最自由的舞、做一場最清醒的夢<br>
            <br>
            在這場 80 分鐘的頂級 VR 晚宴中<br>
            你可以期待<br>
            跨越時空，沉浸咆哮年代的巴黎<br>
            戴起面具，穿上 CHANEL 數位高訂禮服<br>
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
                        <p>111 台北市士林區的某棟秘密建築<br>（詳細地點請容許我們先保密，我們將慢慢向你揭露）</p>
                    </div>
                    <div class="grid">
                        <h4>場次</h4>
                        <p>
                            每週一 - 二｜公休<br>
                            每週三 - 五<br>
                            晚場：18:15｜19:30｜ 20:45 
                        </p>
                        <p>
                            每週六 - 日<br>
                            午場：13:30｜14:45｜16:00<br>
                            晚場：18:15｜19:30｜ 20:45
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
                                    現場包含 VR 體驗和 1 杯酒精調飲，為顧及體驗安全：
                                    <ul>
                                        <li>孕婦、心臟病和高血壓患者不建議體驗</li>
                                        <li>體內有電子儀器者（例：心律調整器、助聽器、除顫器）及患有癲癇容易暈倒、視力受損者下訂前需諮詢專業醫師以維護體驗安全</li>
                                        <li>未滿 12 歲無法參與、13-16 歲需家長陪同</li>
                                    </ul>
                                </p>
                            </li>
                            <li><p>包場需求、其他特殊服務，請來信客服詢問<br><a class="hover-underline" href="mailto:lebaldeparis@surpriselab.com.tw">lebaldeparis@surpriselab.com.tw</a></p></li>
                            <li><p>相關購票、退票、改期規則，請見 <a class="hover-underline" href="#">[舞會規則]</a></p></li>
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
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="/paris/img/booking_ticket2.png" />
                        </div>
                        <h4>雙人共舞票</h4>
                        <h2>$3,900</h2>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="/paris/img/booking_ticket3.png" />
                        </div>
                        <h4>四人群舞票</h4>
                        <h2>$7,600</h2>
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
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                                <option value="8">8</option>
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
                    <div class="input-group">
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
                    </div>
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
                            <label>禮物卡序號</label>
                            <input type="text" name="gift" id="gift" maxlength="10" />
                            <span class="gift_note" style="color: #dc3545;"></span>
                        </div>
                    </div>
                    <div class="checkboxes">
                        <div class="checkbox-group">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" name="ck_privacy" value="1" />
                                <span>我已詳讀並遵守</span>
                            </label>
                            <span class="modal-btn">隱私權條款</span>
                        </div>
                        <div class="checkbox-group">
                            <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                <input type="checkbox" name="ck_rule" value="1" />
                                <span>我已詳讀並遵守</span> 
                            </label>
                            <a href="#">舞會規則</a>
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
                        <div class="input-group">
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
                        </div>
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
                                <label>禮物卡序號</label>
                                <div class="filed-value">XYZ321</div>
                            </div>
                            <div class="input-group">
                                <div class="note gift">已抵用4000元</div>
                            </div>
                        </div>
                        <div class="notice">按下「前往付款」代表我已閱讀並同意 <span>隱私權條款</span> 與 <a href="#">購票規則</a></div>
                    </div>
                </div>

                <div class="actions">
                    <button class="p-btn primary go-next submitForm" type="button">前往付款 3,900 元</button>
                    <div class="p-btn primary outline go-prev">回上一步</div>
                </div>
            </div>
        </form>
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
    <script src="/paris/js/plugins/jquery-ui.js"></script>
    <script src="/paris/js/plugins/select2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <script src="/paris/js/phone_code.js"></script>
    <script src="/paris/js/booking.js?09134"></script>
</body>
</html>