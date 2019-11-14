<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    @include('clubtomorrow.frontend._metadata')
    <meta property="og:url" content="https://www.surpriselab.com.tw/clubtomorrow/reschedule.html"/>
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
    <link rel="stylesheet" href="/clubT/css/reschedule.css"/>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    @include('clubtomorrow.frontend._gtm')
    @include('clubtomorrow.frontend._fbpixel')
</head>
<body class="loading">
    <div class="homepage reschedule">
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
                        </ul>
                    </div>

                    <!-- fieldsets -->
                    <fieldset class="step step-1" data-title="明日俱樂部．玩家登入">
                        <h2 class="title">
                            明日俱樂部．玩家改期
                        </h2>
                        <p class="en-sub-title">
                            change your booking
                        </p>
                        <div class="form-container">
                            <p class="color-bright-green field-intro d-none d-md-block">
                                進入前，請花些時間詳讀規則，讓你的登入更加順暢
                            </p>
                            <p class="color-bright-green field-intro d-block d-md-none">
                                進入前，請花些時間詳讀規則<br/>
                                讓你的操作更加順暢
                            </p>
                            <div class="prefix-step">
                                <div class="prefix-step-inner">
                                    <span class="prefix">Step 1</span>輸入你的手機與訂位信箱<br/>
                                    <span class="prefix">Step 2</span>選擇修改的日期<br/>
                                    <span class="prefix">Step 3</span>完成改期
                                </div>
                            </div>
                            <div class="sub-title-wrapper">
                                <h4>
                                    <span>NOTICE</span>
                                </h4>
                            </div>
                            <ul class="prefix-dash">
                                <li>
                                    一筆訂單僅能改期一次。
                                </li>
                                <li>
                                    若⽇期無法選擇，代表該場次已滿，或是當日不開放。
                                </li>
                                <li>
                                    改期無法拆單／合併訂單與備註，僅能調整日期。
                                </li>
                                <li>
                                    填寫的手機與信箱皆需與訂位時資訊相同。
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
                            <button type="button" name="next" class="btn-bright-blue next action-button" disabled>開始改期</button>
                        </div>
                    </fieldset>
                    <fieldset class="step step-2" data-title="輸入電話與信箱，顯示訂單資料">
                        <div class="form-container form-fields">
                            <p class="field-intro color-bright-green">
                                輸入個人資料
                            </p>

                            <div class="sub-title-wrapper">
                                <h4>
                                    <span>手機與信箱皆需與訂位時資訊相同</span>
                                </h4>
                            </div>

                            <div class="form-group input-with-label">
                                <label for="field_phone" class="field_phone_label">* 手機<span class="error-msg"></span></label>
                                <input id="field_phone" name="field_phone" type="tel" placeholder="ex. 0987654321" data-title="phoneNumber" class="form-control error phone has-verification" maxlength="11"/>
                                <input type="hidden" name="dial-code"/>
                            </div>

                            <div class="form-group input-with-label">
                                <label for="email">* 電子信箱<span class="error-msg"></span></label>
                                <input type="email" name="email" class="form-control has-verification email" id="email" placeholder="ex. clubtomorrow@surpriselab.com.tw">
                            </div>

                            <div class="feature-btn d-flex justify-content-between multi-btn">
                                <button type="button" name="previous" class="btn-bright-blue previous action-button">上一步</button>
                                <button type="button" name="next" class="btn-bright-blue next orderToggler action-button">下一步</button>
                            </div>

                        </div>

                        <div class="form-container reschedule-infos">
                            <p class="field-intro color-bright-green">
                                確認您的資料，並選擇欲修改的訂單資料
                            </p>

                            <div class="sub-title-wrapper">
                                <h4>
                                    <span>訂單資料</span>
                                </h4>
                            </div>

                            <div class="orders">
                                <!--div class="order is-rescheduled">
                                    <div class="order-header d-flex align-items-center">
                                        <div class="before-icon"></div>
                                        <h4>
                                            訂單資料 1<span>已改期成功</span>
                                        </h4>
                                        <i class="icon icon-arrow ml-auto"></i>
                                    </div>
                                    <div class="order-info">
                                        <table class="order-data">
                                            <tr>
                                                <td>姓名</td>
                                                <td>edison 卡位</td>
                                            </tr>
                                            <tr>
                                                <td>電話</td>
                                                <td>0226701230</td>
                                            </tr>
                                            <tr>
                                                <td>電子信箱</td>
                                                <td>yungyuhuang0306@gmail.com</td>
                                            </tr>
                                            <tr>
                                                <td>票券</td>
                                                <td>四人票 Multiplayer for 4</td>
                                            </tr>
                                            <tr>
                                                <td>人數</td>
                                                <td>4</td>
                                            </tr>
                                            <tr class="date">
                                                <td>日期</td>
                                                <td>
                                                    <span>2019-07-15</span>2019-08-18
                                                </td>
                                            </tr>
                                            <tr class="time">
                                                <td>時段</td>
                                                <td>
                                                    <span>22:00-23:30</span>22:00-23:30
                                                </td>
                                            </tr>
                                            <tr class="notice">
                                                <td>其他備註</td>
                                                <td>統編 12345678</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="order">
                                    <div class="order-header d-flex align-items-center">
                                        <div class="before-icon"></div>
                                        <h4>
                                            訂單資料 2
                                        </h4>
                                        <i class="icon icon-arrow ml-auto"></i>
                                    </div>
                                    <div class="order-info">
                                        <table class="order-data">
                                            <tr>
                                                <td>姓名</td>
                                                <td>edison 卡位</td>
                                            </tr>
                                            <tr>
                                                <td>電話</td>
                                                <td>0226701230</td>
                                            </tr>
                                            <tr>
                                                <td>電子信箱</td>
                                                <td>yungyuhuang0306@gmail.com</td>
                                            </tr>
                                            <tr>
                                                <td>票券</td>
                                                <td>四人票 Multiplayer for 4</td>
                                            </tr>
                                            <tr>
                                                <td>人數</td>
                                                <td>4</td>
                                            </tr>
                                            <tr class="date">
                                                <td>日期</td>
                                                <td>
                                                    <span>2019-08-18</span>
                                                </td>
                                            </tr>
                                            <tr class="time">
                                                <td>時段</td>
                                                <td>
                                                    <span>22:00-23:30</span>
                                                </td>
                                            </tr>
                                            <tr class="notice">
                                                <td>其他備註</td>
                                                <td>統編 12345678</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div-->
                            </div>

                            <div class="feature-btn d-flex justify-content-between multi-btn">
                                <button type="button" name="refilled" class="btn-bright-blue orderToggler action-button">重新輸入</button>
                                <button type="button" name="reschedule" class="btn-bright-blue next action-button reschedule-date" disabled>修改日期</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="step step-3" data-title="選擇日期、時段">
                        <div class="form-container">
                            <div class="form-group with-icon">
                                <label class="form-label" for="reschedule_date">日期</label>
                                <div class="field-icon-wrapper">
                                    <input type="text" name="reschedule_date" id="reschedule_date" readonly placeholder="選擇日期"/>
                                    <span class="field-icon"></span>
                                </div>
                                <div class="calender-wrapper"></div>
                            </div>
                            <div class="form-group select-format">
                                <label class="form-label" for="reschedule_time">時段</label>
                                <select id="reschedule_time" name="reschedule_time" data-placeholder="選擇時段" required>
                                    <option></option>
                                </select>
                            </div>

                            <div class="feature-btn d-flex justify-content-between multi-btn">
                                <button type="button" name="previous" class="btn-bright-blue previous action-button">上一步</button>
                                <button type="button" name="next" class="btn-bright-blue next action-button">下一步</button>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="step step-4" data-title="確認改期資訊">
                        <div class="form-container">
                            <table class="order-data filled-data">
                                <tbody id="filled-order-info"></tbody>
                                <tr class="reschedule-date">
                                    <td>修改日期</td>
                                    <td class="filled" data-filled="reschedule_date"></td>
                                </tr>
                                <tr class="reschedule-time">
                                    <td>修改時段</td>
                                    <td class="filled" data-filled="reschedule_time"></td>
                                </tr>
                            </table>
                            <div class="feature-btn d-flex justify-content-between multi-btn">
                                <button type="button" name="previous" class="btn-bright-blue previous action-button">上一步</button>
                                <button type="button" name="submit" class="btn-bright-blue submit" disabled>完成改期</button>
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
                        你已完成改期！
                    </h1>
                    <p class="page-sub-title">
                        請至你的信箱確認訂位完成信件
                    </p>
                    <p class="page-info">
                        接近體驗日期時<br/>
                        明日俱樂部將會寄送提醒信件與提醒簡訊給你<br/>
                        <br/>
                        屆時請注意電子信箱，<br class="d-block d-md-none" />它有時候會跑到垃圾郵件，可以翻找一下<br/>
                        <br/>
                        準備好遊戲其中了嗎？<br/>
                    </p>
                    <div class="feature-btn multi-btn">
                        <a class="btn-bright-blue" href="index.html#aboutSec">關於明日俱樂部</a>
                        <a class="btn-bright-blue" href="reschedule.html">修改另一筆訂單</a>
                    </div>
                </div>
            </div>
        </main>

        <main class="align-items-center justify-content-center" id="submit-error" style="display:none;">
            <div class="submit-page error">
                <div class="container">
                    <h1 class="page-title">
                        whoops！改期未成功
                    </h1>
                    <p class="page-sub-title">
                        可能是某些地方出錯了，還請再試一次
                    </p>
                    <div class="page-info">
                        <p>可能發生以下狀況：</p>
                        <ul class="prefix-number">
                            <li>
                                網路中斷，請確認通訊良好的狀況下再次操作
                            </li>
                            <li>
                                同時刻有人與你選擇同樣的日期與時段，他比你早完成改期，因而受到排擠，請再試一次
                            </li>
                        </ul>
                        <br/>
                        若非以上兩種狀況，歡迎來信明日俱樂部詢問：<br/>
                        <a href="mailto:clubtomorrow@surpriselab.com.tw">clubtomorrow@surpriselab.com.tw</a>
                    </div>
                    <div class="feature-btn">
                        <a class="btn-bright-blue" href="reschedule.html">重新改期</a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="loading-wrapper is-load">
        <div class="loading-inner">
            <div class="loading-text">
                <p>Loading<span>.</span><span>.</span><span>.</span></p>
            </div>
        </div>
    </div>

    <div class="loading-wrapper error">
        <div class="loading-inner">
            <div class="loading-text">
                <p>請填寫正確的資訊</p>
            </div>
            <button type="button" class="refilled">
                重新輸入
            </button>
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
<script src="/clubT/js/plugins/aos.min.js"></script>
<script src="/clubT/js/main.js"></script>
<script src="/clubT/js/reschedule.js"></script>
</body>
</html>
