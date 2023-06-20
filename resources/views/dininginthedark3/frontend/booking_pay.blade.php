<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="keywords" content="驚喜製造, 無光晚餐, 一人餐桌, 台北喝酒, 活動, 沉浸式體驗, 週末要幹麻, 好玩, 喝酒">
    <meta name="description" content="在黑暗中，熟悉都變陌生，習慣都成嘗試。用僅剩的感官，盡情探索與感受，重新認識餐桌上的一切與對面的那個人。《無光晚餐》每日為你準時熄燈、端上黑暗。">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="無光晚餐 Dining In The Dark - 直接預約"/>
    <meta property="og:site_name" content="無光晚餐 Dining In The Dark - 直接預約"/>
    <meta property="og:description" content="在黑暗中，熟悉都變陌生，習慣都成嘗試。用僅剩的感官，盡情探索與感受，重新認識餐桌上的一切與對面的那個人。《無光晚餐》每日為你準時熄燈、端上黑暗。"/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/dininginthedark3"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/dininginthedark3/img/general/opengraph.png?v=0.1"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=0">
    <title>無光晚餐 Dining In The Dark - 直接預約</title>

    <!-- Style -->
    <link rel="icon" href="img/general/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/plugins/bootstrap-4.1.0/bootstrap.css"/>

    <!-- Loading Animation CSS -->
    <link rel="stylesheet" type="text/css" href="css/plugins/imagesloaded/loading.css"/>

    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome/fontawesome.min.css"/>

    <!-- Select2 style -->
    <link rel="stylesheet" href="css/plugins/select2/select2.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css?v=0.2"/>
    <link rel="stylesheet" href="css/form.css?date=0601"/>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NKG6X5Z');</script>
    <!-- End Google Tag Manager -->
</head>

<body class="loading">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKG6X5Z"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Header LOGO -->
    <header class="logo">
        <div class="logo-wrapper">
            <div class="logo-inner">
                <a class="smoothScroll" href="index.html?effect=show#Intro">
                    <img class="img-fluid" src="img/general/logo_h.svg" alt="無光晚餐 Dining In The Dark">
                </a>
            </div>
            <button class="hamburger">
                <span class="current-section">About</span>
                <span class="current-menu">Menu</span>
                <span class="menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </span>
            </button>
        </div>
    </header>

    <!-- Anchor menu -->
    <nav class="anchor-wrapper">
        <ul>
            <li class="d-none active">
                <a class="intro" href="index.html#Intro">Intro</a>
            </li>
            <li>
                <a class="about" href="index.html#Intro">About</a>
            </li>
            <li>
                <a class="ticket" href="index.html#Ticket">Ticket</a>
            </li>
            <li>
                <a class="rules" href="rules.html">Rules</a>
            </li>
            <li>
                <a class="contact" href="index.html#Contact">Contact</a>
            </li>
        </ul>
    </nav>

    <main class="sections bookingPay">

        <div class="container" id="bookingPage">
            <!-- form -->
            <form id="booking" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="discount" id="discount" value="">
                <!--progress title-->
                <h3 class="progress-title">
                    預約體驗
                </h3>
                <h4 class="progress-sub">Reservation</h4>
                <!-- progressbar -->
                <div class="bar-wrapper hide-steps">
                    <ul id="progressbar">
                        <li class="active"></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>

                <!-- fieldsets -->
                <!-- <fieldset class="step step-1" title="無光晚餐 用餐登記">
                    <p class="sub-title text-lining">
                        告訴我們何時可以見到你
                    </p>
                    <p class="en-sub-title">
                        pick your date and time
                    </p>
                    <div class="form-container">
                        <p class="color-purple">
                            預約前，請花些時間詳細閱讀規則。
                        </p>
                        <p>&nbsp;</p>
                        <p class="prefix-step">
                            <span class="prefix">Step 1</span>選擇人數<br/>
                            <span class="prefix">Step 2</span>選擇日期、時段<br/>
                            <span class="prefix">Step 3</span>填寫預約資料<br/>
                            <span class="prefix">Step 4</span>確認訂單<br/>
                            <span class="prefix">Step 5</span>完成預約
                        </p>
                        <p>&nbsp;</p>
                        <div class="sub-title-wrapper">
                            <h4>
                                <span>- NOTICE -</span>
                            </h4>
                        </div>
                        <p>&nbsp;</p>
                        <ul class="prefix-dash">
                            <li>看到 [你已完成預約] 頁面才算完成預約。</li>
                            <li>若日期無法選擇，代表該場次已滿，或是當日不開放。</li>
                            <li>請確實填寫正確的電子信箱與電話，將以此與你聯繫。</li>
                        </ul>
                        <p>&nbsp;</p>
                        <p>
                            若有任何問題，歡迎來信<br/>
                            <a href="mailto:dininginthedark@surpriselab.com.tw">dininginthedark@surpriselab.com.tw</a>
                        </p>
                        <p>&nbsp;</p>
                        <div class="form-group radio__button">
                            <div class="d-flex align-items-center flex-wrap">
                                <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                    <input type="checkbox" id="agreerule" name="agree" class="custom-control-input" value="1" required>
                                    <span class="custom-control-label">我已詳讀並遵守</span>
                                </label>
                                <a href="rules.html" target="_blank">
                                    無光晚餐用餐與體驗規則
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="feature-btn text-center">
                        <button type="button" name="next" class="btn-outline next action-button" disabled>開始預約</button>
                    </div>
                </fieldset> -->
                <fieldset class="step step-2" title="預約體驗" sub="Reservation">
                    <div class="form-container">
                        <p class="field-intro">
                            請點選你的預約人數
                        </p>
                        <ul class="prefix-dash">
                            <!-- <li>單一場次最高可容納 12 人</li>
                            <li>為維護體驗品質，體驗時將兩人一組入座，且無法併桌</li> -->
                            <li>無光晚餐僅接受雙數訂位</li>
                            <li>單一場次最高可容納 12 人，若人數為12人或以上，歡迎預約包場。請來信客服 dininginthedark@surpriselab.com.tw</li>
                            <li>無光晚餐每人優惠價格為2,200元/人</li>
                            <li>票價已含10%服務費</li>
                            <li>為維護體驗品質，體驗時將兩人一組入座，且無法併桌</li>
                            <li>若日期無法選擇，代表該場次已滿，或是當日不開放</li>
                        </ul>
                        <br/><br/>

                        <div class="form-grid">
                            <div class="form-group select-format">
                                <label class="form-label" for="booking_people">人數</label>
                                <select id="booking_people" name="booking_people" data-placeholder="選擇人數" required>
                                    <option></option>
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                    <option value="10">10</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="form-group with-icon">
                                <label class="form-label" for="booking_date">日期</label>
                                <div class="field-icon-wrapper">
                                    <input type="text" name="booking_date" id="booking_date" readonly placeholder="選擇日期"/>
                                    <span class="field-icon"></span>
                                </div>
                                <div class="calender-wrapper"></div>
                            </div>
                        </div>
                        <!-- <div class="form-group select-format">
                            <label class="form-label" for="booking_time_slot">時段</label>
                            <select id="booking_time_slot" name="booking_time_slot" data-placeholder="選擇時段" required>
                                <option></option>
                            </select>
                        </div> -->
                        <div class="form-group select-format">
                            <label class="form-label" for="booking_time">場次時間</label>
                            <select id="booking_time" name="booking_time" data-placeholder="選擇場次時間" required>
                                <option></option>
                                <!--<option>18:00-19:30</option>-->
                                <!--<option>20:00-21:30</option>-->
                            </select>
                        </div>


                        <div class="feature-btn d-flex justify-content-between multi-btn">
                            <!-- <button type="button" name="previous" class="btn-outline previous action-button">上一步</button> -->
                            <button type="button" name="next" class="btn-outline next action-button" disabled="disabled" style="margin-left: auto;">下一步</button>
                        </div>
                    </div>
                </fieldset>
                <!-- <fieldset class="step step-3" title="日期、時段選擇">
                    <div class="form-container">

                        <div class="feature-btn d-flex justify-content-between multi-btn">
                            <button type="button" name="previous" class="btn-outline previous action-button">上一步</button>
                            <button type="button" name="next" class="btn-outline next action-button">下一步</button>
                        </div>
                    </div>
                </fieldset> -->
                <fieldset class="step step-3" title="顧客資料" sub="Customer Info">
                    <div class="form-container">
                        <!-- <div class="field-intro">
                            請填寫正確電子信箱與電話，預約成功後將寄送行前通知與重要訊息（建議避開 yahoo 與 hotmail 信箱，以免漏信）
                        </div> -->

                        <div class="form-group input-with-label">
                            <label for="name">* 姓名 Name</label>
                            <!-- <p>若需打統編,請填寫發票抬頭(公司完整名稱)，並在備註留下聯络人姓名與統一編號</p> -->
                            <input type="text" name="name" class="form-control" id="name" placeholder="ex. 無光先生, Mr. Dark">
                        </div>

                        <div class="form-group input-with-label">
                            <label for="phone" style="flex: 100%;">* 電話 Phone Number <span class="error-msg"></span></label>
                            <!-- <p>無台灣電話者，請輸入0900000000</p> -->
                            <input type="text" name="area_code" class="form-control" id="area_code" placeholder="+886" value="+886" style="width: 100px;">
                            <input type="text" name="phone" maxlength="14" class="form-control phone" id="phone" placeholder="ex. 0912345678" style="width: calc(100% - 110px);margin-left: auto;">
                        </div>

                        <div class="form-group input-with-label">
                            <label for="email">* 電子信箱 Email<span class="error-msg"></span></label>
                            <input type="email" name="email" class="form-control has-verification email" id="email" placeholder="ex. dininginthedark@surpriselab.com.tw">
                        </div>

                        <div class="form-group input-with-label">
                            <label for="company_tax_ID">統一編號 Company Tax ID<span class="error-msg"></span></label>
                            <input type="text" name="company_tax_ID" class="form-control nomust" id="company_tax_ID" maxlength="10" placeholder="">
                        </div>

                        <div class="form-group input-with-label">
                            <label for="company_name">公司抬頭 Company Name<span class="error-msg"></span></label>
                            <input type="text" name="company_name" class="form-control nomust" id="company_name" maxlength="50" placeholder="">
                        </div>

                        <div class="form-group input-with-label">
                            <label for="english_service">英文服務 English Service<span class="error-msg"></span></label>
                            <select id="english_service" name="english_service" class="nomust" data-placeholder="選擇人數" required>
                            </select>
                        </div>

                        <!-- <div class="form-group select-format">
                            <label class="form-label" for="vegetarian_food">* 蛋奶素（如果都吃葷，請選0人）</label>
                            <select id="vegetarian_food" name="vegetarian_food" data-placeholder="選擇人數" required>

                            </select>
                        </div> -->

                        <div class="form-group">
                            <label class="form-label">* 飲食禁忌 Dietary Restrictions</label>
                        </div>

                        <div class="form-group select-food">
                            <div class="form-row">
                                <div class="form-col">
                                    <label class="form-label" for="meat_food">* 葷食</label>
                                    <span class="en">Regular Menu</span>
                                    <select id="meat_food" name="meat_food" data-placeholder="選擇人數" required>
                                    </select>
                                </div>
                                <div class="col-wrap" style="display:none;">
                                    <div class="form-col">
                                        <label class="form-label" for="meat_food_noBeef">* 不吃牛肉</label>
                                        <span class="en">No Beef</span>
                                        <select id="meat_food_noBeef" name="meat_food_noBeef" data-placeholder="選擇人數" required>
                                        </select>
                                    </div>
                                    <div class="form-col">
                                        <label class="form-label" for="meat_food_noPork">* 不吃豬肉</label>
                                        <span class="en">No Pork</span>
                                        <select id="meat_food_noPork" name="meat_food_noPork" data-placeholder="選擇人數" required>
                                        </select>
                                    </div>
                                    <div class="form-col">
                                        <label class="form-label" for="meat_food_noNut">* 不吃堅果</label>
                                        <span class="en">No Nut</span>
                                        <select id="meat_food_noNut" name="meat_food_noNut" data-placeholder="選擇人數" required>
                                        </select>
                                    </div>
                                    <div class="form-col">
                                        <label class="form-label" for="meat_food_noSeafood">* 不吃帶殼海鮮</label>
                                        <span class="en">No Shell Seafood</span>
                                        <select id="meat_food_noSeafood" name="meat_food_noSeafood" data-placeholder="選擇人數" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col">
                                    <label class="form-label" for="vegetarian_food">* 蛋奶五辛素</label>
                                    <span class="en">Five pungent spices & Lacto-vegetarian.</span>
                                    <select id="vegetarian_food" name="vegetarian_food" data-placeholder="選擇人數" required>
                                    </select>
                                </div>
                                <div class="col-wrap" style="display:none;">
                                    <div class="form-col">
                                        <label class="form-label" for="vegetarian_food_noNut">* 不吃堅果</label>
                                        <span class="en">No Nut</span>
                                        <select id="vegetarian_food_noNut" name="vegetarian_food_noNut" data-placeholder="選擇人數" required>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group textarea-with-label">
                            <label for="notice">其他備註 Other Comments</label>
                            <textarea id="notice" name="notice" rows="2" placeholder="特殊事項備註/孕婦/慶生需求/特殊紀念&#10;Special Request, Birthday or Anniversary Celebration, etc."></textarea>
                            <!-- 特殊事項備註/發票是否打統編/過敏食材&#10;食材過敏請標明人數＋過敏食材 EX:一位不吃牛&#10;素食者僅提供蛋奶五辛素&#10;發票若要打統編，請直接註明公司抬頭與統一編號 -->
                        </div>
                        
                        <div class="form-group radio__button">
                            <div class="d-flex align-items-center flex-wrap">
                                <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                    <input type="checkbox" id="agreerule" name="agree" class="custom-control-input" value="1" required>
                                    <span class="custom-control-label">我已詳讀並遵守</span>
                                </label>
                                <a href="rules.html" target="_blank">
                                    無光晚餐用餐與體驗規則
                                </a>
                            </div>
                        </div>
                        <div class="form-group radio__button">
                            <div class="d-flex align-items-center">
                                <label class="custom-control custom-checkbox m-0 d-flex align-items-center">
                                    <input type="checkbox" id="agree" name="agree" class="custom-control-input" value="1" required>
                                    <span class="custom-control-label">我已詳讀並遵守</span>
                                </label>
                                <!-- Button trigger modal -->
                                <a href="javascript://" class="toggle__modal personalCapital" data-toggle="modal" data-target="#personalCapital">
                                    隱私條款
                                </a>
                            </div>
                        </div>

                        <div class="field-intro">
                            <ul>
                                <li>請務必填寫正確電子信箱與電話，預約成功後將寄送行前通知與重要訊息（建議避開 yahoo 與 hotmail 信箱，以免漏信）
                                </li>
                                <li>無光晚餐僅依照顧客過敏狀況調整餐點，請確實填寫餐飲過敏狀況與人數。</li>
                                <li>無光晚餐將依照訂位過敏資訊準備體驗內容，現場無法更改。</li>
                            </ul>
                        </div>

                        <div class="feature-btn d-flex justify-content-between multi-btn">
                            <button type="button" name="previous" class="btn-outline previous action-button">上一步</button>
                            <button type="button" name="next" class="btn-outline next action-button">下一步</button>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="step step-4" title="確認預約資訊">
                    <div class="form-container">
                        <table class="filled-data">
                            <tr>
                                <td>姓名</td>
                                <td class="filled" data-filled="name"></td>
                            </tr>
                            <tr>
                                <td>電話</td>
                                <td>
                                    <span class="filled" data-filled="area_code"></span>
                                    <span class="filled" data-filled="phone"></span>
                                </td>
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
                                <td>英文服務</td>
                                <td class="filled" data-filled="english_service"></td>
                            </tr>
                            <tr>
                                <td>日期</td>
                                <td class="filled" data-filled="booking_date"></td>
                            </tr>
                            <tr>
                                <td>體驗時段</td>
                                <td class="filled" data-filled="booking_time"></td>
                            </tr>
                            <tr>
                                <td>體驗地址</td>
                                <td class="filled">106 台北市大安區仁愛路四段345巷4弄3號</td>
                            </tr>
                            <tr>
                                <td>飲食選項</td>
                                <!-- <td>葷食 <span id="filled_pv"></span> 人，蛋奶素 <span class="filled" data-filled="vegetarian_food"></span> 人</td> -->
                                <td>
                                    葷食 <span id="filled_pv"></span> 人：
                                    <p>不吃牛肉 <span class="filled" data-filled="meat_food_noBeef">0</span> 人</p>
                                    <p>不吃豬肉 <span class="filled" data-filled="meat_food_noPork">0</span> 人</p>
                                    <p>不吃堅果 <span class="filled" data-filled="meat_food_noNut">0</span> 人</p>
                                    <p>不吃帶殼海鮮 <span class="filled" data-filled="meat_food_noSeafood">0</span> 人</p>
                                    <br>
                                    蛋奶五辛素 <span class="filled" data-filled="vegetarian_food"></span> 人：
                                    <p>不吃堅果 <span class="filled" data-filled="vegetarian_food_noNut">0</span> 人</p>
                                </td>
                            </tr>
                            <tr>
                                <td>統一編號</td>
                                <td class="filled" data-filled="company_tax_ID"></td>
                            </tr>
                            <tr>
                                <td>公司抬頭</td>
                                <td class="filled" data-filled="company_name"></td>
                            </tr>
                            <tr class="notice">
                                <td>其他備註</td>
                                <td class="filled" data-filled="notice"></td>
                            </tr>
                            <tr class="coupon-code">
                                <td>折扣碼</td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <input class="flex-fill" type="text" name="coupon" placeholder="輸入折扣碼"/>
                                        <button type="button" class="verification-code btn-outline">確認</button>
                                    </div>
                                    <div class="submit-coupon-wrapper"></div>
                                    <div class="submit-coupon-error-message color-pink">此折扣碼不存在或使用期限已過</div>
                                </td>
                            </tr>
                        </table>
                        <br/><br/>
                        <!-- <p>提醒：即將跳轉離開網站，進入結帳流程。最後需進入「完成預約」頁面才算預約成功。</p> -->
                        <ul>
                            <li>即將跳轉離開網站，進入結帳流程，完成付款。</li>
                            <li>完成付款後，Email信箱中會收到訂位確認信，請前往確認。</li>
                        </ul>

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
                    你已完成用餐預約！
                </h3>
                <p class="page-sub-title">
                    請至你的信箱確認預約完成信件
                </p>
                <p class="page-info">
                    接近用餐日期時<br/>
                    將會寄送信件與行前訊息給你<br/>
                    <br/>
                    屆時請留意電子信箱，它有時候會跑到垃圾郵件，可以翻找一下<br/><br/>
                </p>
                <div class="feature-btn" style="text-align: center;">
                    <a class="btn-outline" href="index.html?effect=show#Intro">關於無光晚餐</a>
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
                </p>
                <div class="feature-btn" style="text-align: center;">
                    <a class="btn-outline" href="booking_pay.html">重新預約</a>
                </div>
            </div>
        </div>
    </main>

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
                            <span class="d-block d-sm-inline-block">《無光晚餐 Dining In The Dark》官方網站</span> <a href="http://www.surpriselab.com.tw/thegreattipsy" target="_blank">http://www.surpriselab.com.tw/thegreattipsy</a>（以下稱「本網站」）為驚喜製造有限公司（以下稱「本公司」）所經營，本網站尊重您的隱私權，並致力於保護您的個人資料。於使用《無光晚餐 Dining In The Dark》官方網站前，請您詳細閱讀本條之「隱私權政策」（以下稱「本政策」），並隨時注意本網站所公告之相關修改或變更，本公司有權於任何時間修改或變更本隱私權政策之內容。當您使用本網站時，或於任何修改、變更後繼續使用本網站，皆表示您已閱讀、瞭解並同意接受本政策，或該修改、變更後之內容，及同意依據本政策蒐集、處理與利用您的個人資料；如果您無法遵守或不同意本政策之內容，或您所屬的國家、地區排除本政策內容之全部或一部時，請您立即停止使用《無光晚餐 Dining In The Dark》官方網站。此外，驚喜製造有限公司於未經您許可的情形下，絕不會將您的個人資料提供予任何第三方。
                        </p>
                        <p>&nbsp;</p>
                        <p>
                            若您為未滿二十歲或無完全行為能力，除應符合上述規定外，請於您的法定代理人或監護人閱讀、瞭解並同意本政策及其後修改、變更後之所有內容後，方得使用或繼續使用本網站，否則請立即停止使用。當您使用或繼續使用《無光晚餐 Dining In The Dark》官方網站時，即視為您的法定代理人或監護人已閱讀、瞭解並同意接受本政策及其後修改、變更之所有內容。個人資料之類別：當您使用本網站之服務，本公司會請您提供您下列類別的個人資料，如：<br/>
                            辨識個人者（例如：姓名、住址、電子郵件信箱、行動電話）、<br/>
                            辨識財務者（例如：信用卡或簽帳卡之號碼、銀行帳戶之號碼與姓名）、<br/>
                            生活格調（例如：使用消費品之種類及服務之細節、個人之消費模式）、<br/>
                            資料主體所取得之財貨或服務（例如：貨物或服務之有關細節）、<br/>
                            財務交易（例如：收付金額、支付方式、往來紀錄）、<br/>
                            資料主體之商業活動（例如：商業種類、提供或使用之財貨或服務、商業契約）、<br/>
                            約定或契約（例如：關於交易、商業、法律或其他契約、代理）、<br/>
                            未分類之資料（例如：用餐意見、無法歸類之檔案、報告），<br/>
                            及其他任何得以直接或間接方式識別個人之資料等。<br/>
                            惟請注意，您於《無光晚餐 Dining In The Dark》官方網站中進行交易時，所輸入之信用卡卡號、有效日期及授權碼，均僅儲存於您個人之行動裝置中，本網站將不會蒐集、處理或利用您上述個人資料。
                        </p>
                        <p>&nbsp;</p>
                        <p>
                            個人資料之利用：當您在《無光晚餐 Dining In The Dark》官方網站登錄個人資料以進行相關交易時，所留下的個人資料包括但不限於姓名、電子郵件地址、手機號碼及發票寄送地址等，將在本網站妥當的保存，所蒐集信用卡資訊或銀行資訊，均經使用安全的SSL加密協議處理，可確保您的隱私。
                        </p>
                        <p>&nbsp;</p>
                        <p>
                            不提供個人資料之影響：您可自由選擇是否提供您上述的個人資料，但當您不同意提供時，您將無法享有《無光晚餐 Dining In The Dark》官方網站所提供之服務。凡購買本網站供的服務或產品，本公司可能會透過電子郵件傳送您於《無光晚餐 Dining In The Dark》官方網站的購買活動，包括但不限於消費者的帳戶、聯絡資訊或查詢、購買優惠的紀錄。您可選擇是否接收電子郵件，但當您不同意接收時，您將無法享有《無光晚餐 Dining In The Dark》官方網站提供之服務。
                        </p>
                        <p>&nbsp;</p>
                        <p>
                            個人資料利用之地區：本公司之個人資料主機、相關網路伺服器主機所在地及本公司∕《無光晚餐 Dining In The Dark》官方網站相關服務或商品發行或行銷地區，為您個人資料利用之地區。
                        </p>
                        <p>&nbsp;</p>
                        <p>
                            您對個人資料之權利：在不違反相關法律的情況下，於本公司確認該個人資料為您本人所有後，您可以聯絡本公司∕《無光晚餐 Dining In The Dark》官方網站站，或將您的需求郵寄至本公司的電子郵件信箱，以行使下列之權利：(1)查詢、閱覽、補充或更正您的個人資料。(2)停止蒐集、處理或利用您的個人資料。(3)刪除您的個人資料。(4)提供您個人資料的複製本。(5)停止寄發給《無光晚餐 Dining In The Dark》官方網站相關廣告及行銷活動。但請注意，若您已於各該實際交易中提供您的個人資料給商家或交易對象，除法律另有規定之情形外，有關您的上述權利，應向各該商家或交易對象行使。
                        </p>
                        <p>&nbsp;</p>
                        <p>
                            除下列情形外，本公司不會任意將用戶的個人資料出售、轉讓或揭露予任何第三人：(1)本公司在與其他第三人合辦或協辦活動時，與該第三人共用、傳遞您的資料，才能夠提供您要求的產品或服務。惟《無光晚餐 Dining In The Dark》官方網站會於各該活動頁面明確告知您的個人資料將因參與該活動而提供予合辦或協辦之第三人，如您選擇參與該活動，即表示您瞭解並同意將該個人資料為各該活動之目的提供予合辦或協辦之第三人。(2)本公司∕《無光晚餐 Dining In The Dark》官方網站將因法律規定、法院命令、行政調查或其他法律程序的要求而提供您的資料，惟在此情形下，該資料只會單純提供予調查單位，並受中華民國相關法律的保護。(3)為了調查和防止非法活動、涉嫌詐欺、對人身安全有潛在威脅的狀況。(4) 對本公司∕《無光晚餐 Dining In The Dark》官方網站服務條款的違反，或站或本公司被其他公司收購或合併，我們有權利將您的個人資料移轉給該公司。如果發生這種情況，本公司會在您的個人資料被移轉且將適用不同的隱私權政策前通知您。
                        </p>
                        <p>&nbsp;</p>
                        <p>
                            本公司∕《無光晚餐 Dining In The Dark》官方網站有權視實際情形修訂本政策，本政策有重大變更時，本網站將張貼公告，您有義務隨時注意本政策有無更新或修訂。如您不同意所變更之內容，得隨時選擇退出相關服務，並請您立即停用《無光晚餐 Dining In The Dark》官方網站之服務，如您繼續使用本網站，即表示您同意本政策變更之內容。
                        </p>
                    </div>
                </div>
                <div class="modal-footer close" data-dismiss="modal" aria-label="Close">
                    閱讀完畢
                </div>
            </div>
        </div>
    </div>

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

    <!-- Bootstrap -->
    <script src="js/plugins/jquery-3.3.1.min.js"></script>
    <script src="js/plugins/jquery-ui.js"></script>
    <script src="js/plugins/popper.min.js"></script>
    <script src="js/plugins/bootstrap-4.1.0/bootstrap.min.js"></script>

    <!-- Loading Animation JS -->
    <script src="js/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script>
        document.body.classList.add('render');
        setTimeout(function(){
            imagesLoaded(document.body, function(){
                document.body.classList.remove('loading');
            })
        }, 1000);
    </script>

    <!-- Select2 script-->
    <script src="js/plugins/select2/select2.js?v=0.1"></script>

    <!-- blockUI script-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    {{--
    <!-- tappaysdk -->
    <script src="https://js.tappaysdk.com/tpdirect/v5.5.1"></script>
    @if(env('APP_ENV') == 'production')
    <script>TPDirect.setupSDK('12098', 'app_kglJZrJS8ltbzL22jO8jZ4LJAoJtx1Siqz8UcqRDJOmu3TnnfSUBLVhKRxWm', 'production');</script>
    @else
    <script>TPDirect.setupSDK('12098', 'app_kglJZrJS8ltbzL22jO8jZ4LJAoJtx1Siqz8UcqRDJOmu3TnnfSUBLVhKRxWm', 'sandbox');</script>
    @endif
    --}}
    <!-- Custom Js -->
    <script src="js/form_pay.js?v=0.7"></script>
@if($day!='')
    @if($code == 'pass')
    <script type="text/javascript">$(function(){ goDay('{{ $day }}'); });</script>
    @else
    <script type="text/javascript">alert('該場次人數已達上限!請新開始登記選擇!');</script>
    @endif
@endif
</body>
</html>
