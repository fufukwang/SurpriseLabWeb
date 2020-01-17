<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    @include('clubtomorrow.frontend._metadata')
    <meta property="og:url" content="https://www.surpriselab.com.tw/clubtomorrow/rules.html"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>明日俱樂部 Club Tomorrow</title>


    <!-- Style -->
    <link rel="icon" href="/clubT/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/clubT/css/plugins/bootstrap.css"/>

    <!-- Ripple Animation Style -->
    <link rel="stylesheet" type="text/css" href="/clubT/css/plugins/loading.css"/>
    <script>document.documentElement.className = 'js';</script>

    <!-- OwlCarousel2 -->
    <link rel="stylesheet" href="/clubT/css/plugins/owl/owl.carousel.min.css"/>
    <link rel="stylesheet" href="/clubT/css/plugins/owl/owl.theme.default.min.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/clubT/css/style.css"/>
    <link rel="stylesheet" href="/clubT/css/rules.css"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    @include('clubtomorrow.frontend._gtm')
    @include('clubtomorrow.frontend._fbpixel')
</head>

<body class="loading">
    <div class="homepage">
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
                <li class="active">
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
                            <span class="current-page">_Rules</span>
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
                <li class="menu-item active">
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

        <main class="sections">

            <ul class="nav nav-tabs justify-content-center" id="rules-tab-switcher">
                <li class="nav-link" data="0">
                    問與答
                </li>
                <li class="nav-link" data="1">
                    預售規則
                </li>
                <li class="nav-link" data="2">
                    更改、退費事項
                </li>
            </ul>

            <section id="Rules">
                <div class="container">

                    <div class="rules owl-carousel owl-theme">
                        <!--問與答-->
                        <div class="item">
                            <div id="qa">
                                <div class="tab-content-inner">
                                    <h2 class="section-title">
                                        問與答
                                    </h2>
                                    <div class="section-en-title">
                                        Q&A
                                    </div>
                                    <div id="qa-according">
                                        <div class="card">
                                            <div class="card-header" id="qa1-header">
                                                <h6 data-toggle="collapse" data-target="#qa1" aria-expanded="false"
                                                    aria-controls="qa1" class="collapsed d-flex align-items-center">
                                                    請問《明日俱樂部》是什麼樣的體驗呢？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>

                                            <div id="qa1" class="collapse" aria-labelledby="qa1-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                《明日俱樂部 Club Tomorrow》為驚喜製造 Surprise Lab. 繼《無光晚餐 Dining In The Dark》、《table for ONE 一人餐桌》與《微醺大飯店 The Great Tipsy》後，推出之第五號作品。延續微醺大飯店製作團隊，與進港浪製作再次攜手，推出全新沈浸式、互動式體驗作品。
                                                <br/><br/>
                                                在明日俱樂部中，玩家將經歷一場結合表演、音樂、酒飲、小點、參與、互動、的大型體驗。隨著體驗中的七位角色，開始分流與相互角力，並迎來由所有人一同導向的結局。
                                                <br/><br/>
                                                沈浸式體驗 Immersive Experience. <br/>
                                                唯有親身經歷，你才會知道是怎麼一回事。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa2-header">
                                                <h6 data-toggle="collapse" data-target="#qa2" aria-expanded="false"
                                                    aria-controls="qa2" class="collapsed d-flex align-items-center">
                                                    請問體驗總長為多久呢？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa2" class="collapse" aria-labelledby="qa2-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    《明日俱樂部》體驗總時長為120分鐘。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa3-header">
                                                <h6 data-toggle="collapse" data-target="#qa3" aria-expanded="false"
                                                    aria-controls="qa3" class="collapsed d-flex align-items-center">
                                                    請問適合幾個人參加呢？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa3" class="collapse" aria-labelledby="qa3-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    一人前來、兩三個人一同前來、四人一群前來、十人一團前來，或是六十人大包場，都會有截然不同的體驗樂趣。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa4-header">
                                                <h6 data-toggle="collapse" data-target="#qa4" aria-expanded="false"
                                                    aria-controls="qa4" class="collapsed d-flex align-items-center">
                                                    一個場次有多少參與者一起進行呢？可以跟朋友同組嗎？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa4" class="collapse" aria-labelledby="qa4-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    同一時段有約60位參與者一起進行體驗，將依照現場的選擇機制分組，將參與者們分至五種組別內，每組人數不固定。屆時會因為每人的選擇不同，進入不同的分組，經歷不同的體驗內容。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa5-header">
                                                <h6 data-toggle="collapse" data-target="#qa5" aria-expanded="false"
                                                    aria-controls="qa5" class="collapsed d-flex align-items-center">
                                                    請問會跟其他陌生參與者互動交流嗎？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa5" class="collapse" aria-labelledby="qa5-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    接續上面第四點，因為選擇的交集而同組的參與者，會有基本的集體行動與體驗中的互動，過程中你可以選擇認識新朋友，也可以持續做自己，輕鬆舒適沒有負擔。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa6-header">
                                                <h6 data-toggle="collapse" data-target="#qa6" aria-expanded="false"
                                                    aria-controls="qa6" class="collapsed d-flex align-items-center">
                                                    請問有參與上的限制嗎？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa6" class="collapse" aria-labelledby="qa5-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    體驗中有供應酒精，需年滿18歲。另外，為顧及安全與體驗品質，孕婦與身體微恙者請自行判斷相關狀況，若於過程中出現不適，為求安全將停止你的體驗，亦無法退費。<br/>
                                                    <br/>
                                                    明日俱樂部的場地，內含長的樓梯，無其他電梯動線與輔助，建議有相關考量者斟酌參加。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa7-header">
                                                <h6 data-toggle="collapse" data-target="#qa7" aria-expanded="false"
                                                    aria-controls="qa7" class="collapsed d-flex align-items-center">
                                                    請問有哪些日期與場次可以參加？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa7" class="collapse" aria-labelledby="qa7-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    平日：18:30｜20:30<br/>
                                                    週末：13:00｜15:00｜19:00｜21:00<br/>
                                                    <br/>
                                                    ＊明日俱樂部週一週二固定公休
                                                </div>
                                            </div>
                                        </div>

                                        <!--Section separator-->
                                        <div class="qa-title-separator">
                                            關於體驗當下
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa8-header">
                                                <h6 data-toggle="collapse" data-target="#qa8" aria-expanded="false"
                                                    aria-controls="qa8" class="collapsed d-flex align-items-center">
                                                    請問現場提供的食物與飲品為何？吃得飽嗎？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa8" class="collapse" aria-labelledby="qa8-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    《明日俱樂部》本質為表演，體驗中會有因為選擇而獲得數量不等的餐酒，屬於小點與飲品點綴，非餐飲體驗，請務必吃飽前來。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa9-header">
                                                <h6 data-toggle="collapse" data-target="#qa9" aria-expanded="false"
                                                    aria-controls="qa9" class="collapsed d-flex align-items-center">
                                                    可以攜帶外食或自備酒水嗎？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa9" class="collapse" aria-labelledby="qa9-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    明日俱樂部無法攜帶外食與額外酒水前來，手搖飲料與寶特瓶亦須寄物，無法帶進體驗場所內。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa10-header">
                                                <h6 data-toggle="collapse" data-target="#qa10" aria-expanded="false"
                                                    aria-controls="qa10" class="collapsed d-flex align-items-center large-space-left">
                                                    衣著要怎麼穿比較好呢？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa10" class="collapse" aria-labelledby="qa10-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    衣著上建議以做任何動作都不會走光的裝束為佳，其他則以自己開心、舒服為主。建議穿著好走、好站、快走一波也健步如飛的鞋子前來。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa11-header">
                                                <h6 data-toggle="collapse" data-target="#qa11" aria-expanded="false"
                                                    aria-controls="qa11" class="collapsed d-flex align-items-center large-space-left">
                                                    現場可以寄物或有相關規定嗎？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa11" class="collapse" aria-labelledby="qa11-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    為讓體驗舒適與順暢，進入體驗場所將協助個人物品全數寄物，包含手機、貴重物品。也建議各位輕便前來，盡量勿攜帶大型物品。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa12-header">
                                                <h6 data-toggle="collapse" data-target="#qa12" aria-expanded="false"
                                                    aria-controls="qa12" class="collapsed d-flex align-items-center large-space-left">
                                                    請問現場可以拍照錄影嗎？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa12" class="collapse" aria-labelledby="qa12-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    明日俱樂部內僅有接待區開放拍照，表演與體驗空間因牽涉著作權法，未經許可請勿拍照、錄影。也請特別注意 - 手機將連同隨身物品一同寄物，無法帶入表演與體驗空間。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa13-header">
                                                <h6 data-toggle="collapse" data-target="#qa13" aria-expanded="false"
                                                    aria-controls="qa13" class="collapsed d-flex align-items-center large-space-left">
                                                    體驗中要注意些什麼？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa13" class="collapse" aria-labelledby="qa13-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    體驗內含聲光效果與些許煙霧，演員現場演出偶爾會有些許肢體接觸，請有心理準備。<br/>
                                                    <br/>
                                                    在沈浸式體驗中，探索與放膽，請在不造成他人與演員的困擾下進行。過程中若相關工作人員或演員前來說明與制止，代表不在可接受範圍內，若持續有不聽勸之行為發生，現場人員有權利終止你的體驗，協助你離場亦不另行退費。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa14-header">
                                                <h6 data-toggle="collapse" data-target="#qa14" aria-expanded="false"
                                                    aria-controls="qa14" class="collapsed d-flex align-items-center large-space-left">
                                                    如果遲到該怎麼辦？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa14" class="collapse" aria-labelledby="qa14-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    本體驗為藝文表演票券，依照場次時間準時開始，遲到將無法入場，亦無法退費，請依照體驗前導信提供的「報到時間」抵達與進行報到。
                                                </div>
                                            </div>
                                        </div>

                                        <!--Section separator-->
                                        <div class="qa-title-separator">
                                            關於劃位序號
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa15-header">
                                                <h6 data-toggle="collapse" data-target="#qa15" aria-expanded="false"
                                                    aria-controls="qa15" class="collapsed d-flex align-items-center large-space-left">
                                                    請問完成劃位後可以更改場次嗎？或是該怎麼取消退票呢？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa15" class="collapse" aria-labelledby="qa15-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    預售票券完成劃位後，有更改日期或場次的需求，請依照<span class="action-btn to-change-and-refund">更改、退費事項</span>之流程進行，屆時將以當下尚有的空位為你更換。只有一次改期的機會，請特別留意。
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="qa16-header">
                                                <h6 data-toggle="collapse" data-target="#qa16" aria-expanded="false"
                                                    aria-controls="qa16" class="collapsed d-flex align-items-center large-space-left">
                                                    劃位序號沒有使用的話怎麼辦？會過期嗎？
                                                    <i class="icon icon-arrow"></i>
                                                </h6>
                                            </div>
                                            <div id="qa16" class="collapse" aria-labelledby="qa16-header"
                                                 data-parent="#qa-according">
                                                <div class="card-body">
                                                    劃位序號相關使用相關規定，請見<span class="action-btn to-presale-rules">預售規則</span>，不同階段之序號，僅能於指定體驗時間之區間使用，若因為超過日期未使用而失效，將無法退費與要求劃位其他日期區間，請務必留意劃位時間與相關權益。
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <p class="qa-note">
                                        若有其他任何問題，歡迎來信
                                        歡迎來信 clubtomorrow@surpriselab.com.tw
                                    </p>

                                </div>

                                <div class="feature-btn d-flex justify-content-center justify-content-md-between">
                                    <a class="btn-bright-blue" href="index.html#ticketSec">成為玩家</a>
                                    <a class="btn-bright-blue d-none d-md-block" href="index.html#Contact">聯絡俱樂部</a>
                                </div>
                            </div>
                        </div>

                        <!--預售規則-->
                        <div class="item">
                            <div id="presale-rules">
                                <div class="tab-content-inner">
                                    <h2 class="section-title">
                                        預售規則
                                    </h2>
                                    <div class="section-en-title">
                                        PRESALE RULES
                                    </div>
                                    <h5 class="sub-title highlight">
                                        預售流程
                                    </h5>
                                    <div class="sale-progress-img">
                                        <img class="d-none d-md-block" src="/clubT/img/landing/1.4_flow.png" alt="預售流程" srcset="/clubT/img/landing/1.4_flow@2x.png">
                                        <img class="d-block d-md-none" src="/clubT/img/landing/1.4_flow_mobile.png" alt="預售流程" srcset="/clubT/img/landing/1.4_flow_mobile@2x.png">
                                    </div>

                                    <h5 class="sub-title highlight">
                                        官網預售
                                    </h5>
                                    <p>
                                        於本官網 <a href="index.html#ticketSec">Ticket</a> 處選擇相應的票券購買預售票，完成後等待
                                        劃位序號寄送。
                                    </p>

                                    <h5 class="sub-title highlight">
                                        劃位序號
                                    </h5>
                                    <ul>
                                        <li>
                                            1. 序號依據不同的玩家梯次，能劃位的日期不同，詳請參考<a class="smoothScroll" href="#preSale">預售劃位期限與序號規則</a>。
                                        </li>
                                        <li>
                                            2. 劃位序號為預售付費完成後，於指定日期當天收到的序號，可自行選擇日期與時段，使用序號劃位。
                                        </li>
                                        <li>
                                            3. 依購買優先順序分四梯次（01/07、01/14、01/21、02/04）收到劃位序號信件。<br/>
                                            若收件匣與垃圾信件匣都沒找到，請來信詢問。
                                        </li>
                                        <li>
                                            4. 單人票券下，一組序號代表一個劃位名額，訂三張單人票券，會收到三組序號，可分開日期使用。
                                        </li>
                                        <li>
                                            5. 四人票與十人票為團體套票，無法分開使用，僅會有一個序號，分別代表四個名額或十個名額。
                                        </li>
                                    </ul>

                                    <h5 class="sub-title highlight">
                                        線上劃位
                                    </h5>
                                    <ul>
                                        <li>
                                            1. 劃位序號將會寄送至購票時填寫的訂位信箱，請確保信箱能正確收信。
                                        </li>
                                        <li>
                                            2. 信件內含有專屬劃位序號與訂位頁面連結，選定日期與時段後，輸入劃位序號扣抵，即完成劃位。
                                        </li>
                                        <li>
                                            3. 同日期時段可一次分別填入多組劃位序號。如購買三張單人票券，可輸入三次序號完成扣抵。
                                        </li>
                                        <li>
                                            4. 不同票種的劃位序號可以一起使用，如：<br/>
                                            購買單人票、四人票或十人票欲劃位同日期時段，可在同筆訂單分別輸入序號完成扣抵。
                                        </li>
                                    </ul>

                                    <h5 class="sub-title highlight" id="preSale">
                                        預售劃位期限與序號規則
                                    </h5>
                                    <h6 class="small-title">
                                        第一批玩家
                                    </h6>
                                    <ul>
                                        <li>
                                            1. 劃位序號選擇的日期時段：詳見 11 月中旬信件。
                                        </li>
                                        <li>
                                            2. 序號失效日期：12/02（一）18:00整。
                                        </li>
                                    </ul>
                                    <h6 class="small-title">
                                        第二批玩家
                                    </h6>
                                    <ul>
                                        <li>
                                            1. 劃位序號選擇的日期時段：01/12 到 02/09 內所有的時段。
                                        </li>
                                        <li>
                                            2. 序號失效日期：01/11（六）18:00整。
                                        </li>
                                    </ul>
                                    <h6 class="small-title">
                                        第三批玩家
                                    </h6>
                                    <ul>
                                        <li>
                                            1. 劃位序號選擇的日期時段：02/19 到 03/15 內所有的時段。
                                        </li>
                                        <li>
                                            2. 序號失效日期：02/18（一）18:00整。
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            ＊ 序號一經使用及失效，無法重複劃位，因故有改期需求請參考「<span class="action-btn to-change-and-refund">更改、退費事項</span>」
                                        </li>
                                        <li>
                                            ＊ 上述劃位與失效日期團隊有保留調整與修改之權力，有所調整會另行公佈。
                                        </li>
                                        <li>
                                            ＊ 本票券屬於「藝文表演票券」。
                                        </li>
                                    </ul>
                                </div>

                                <div class="feature-btn d-flex justify-content-center">
                                    <a class="btn-bright-blue action-btn to-change-and-refund" href="javascript://">更改、退費事項</a>
                                </div>
                            </div>
                        </div>

                        <!--更改、退費事項-->
                        <div class="item">
                            <div id="changeAndrefund">
                                <div class="tab-content-inner">
                                    <h2 class="section-title">
                                        更改、退費事項
                                    </h2>
                                    <div class="section-en-title">
                                        CHANGE,REFUND
                                    </div>

                                    <p class="pre-note">
                                        預售票券若需更改體驗日期、取消退費， 請來信明日俱樂部專屬信箱<br/>
                                        <a href="mailto:clubtomorrow@surpriselab.com.tw" class="default-light">clubtomorrow@surpriselab.com.tw</a><br/>
                                        <br/>
                                        為確保你的權益，請根據需求，詳閱以下規則：
                                    </p>

                                    <h5 class="sub-title highlight">
                                        更改日期、時段
                                    </h5>
                                    <ul>
                                        <li>
                                            1. 包含體驗日的七天內恕不提供日期更改，建議將訂位轉讓給親友。
                                        </li>
                                        <li>
                                            2. 若需更改日期、時段，請於體驗日七天前來信告知。<br/>
                                            如：欲更改10/08的訂位，請於10/01（含）前來信。
                                        </li>
                                        <li>
                                            3. 可更改之日期，以屆時尚有的日期與時段為準。劃位前請先確認自己與朋友的行程，減少更改座位的可能性。
                                        </li>
                                    </ul>

                                    <h5 class="sub-title highlight cancel-order">
                                        取消訂位與退費
                                    </h5>
                                    <ul>
                                        <li>
                                            1. 體驗當日屬於表演前夕，不接受取消與退費，你可以將票券轉讓給身邊有需求的親友。<br/>
                                            寄信申請日期以下班時間 18:00 為區分。<br/>
                                            舉例：於 10/02 18:00 前來信以 10/02 計算；若於 10/02 18:00 之後來信，則以 10/03 計算。
                                        </li>
                                        <li>
                                            2. 體驗準時開始，遲到將無法入場與退費，為了您的權益，請務必準時抵達。
                                        </li>
                                        <li>
                                            3. 包含體驗的七天內來信申請，僅能退回50%費用。建議將訂位轉讓給親友。
                                        </li>
                                        <li>
                                            4. 包含體驗的七天前來信申請，將扣除金流手續費10％後退費。如：10/08的訂位，請於10/01（含）前來信。
                                        </li>
                                        <li>
                                            5. 購買預售票尚未收到劃位序號前申請退費，將不扣除手續費全額退費。
                                        </li>
                                        <li>
                                            6. 收到劃位序號當天發現沒有能來的時段，未使用序號的狀況下，收到信件的 6 小時內提出申請，亦將不扣除手續費全額退費。
                                        </li>
                                    </ul>

                                    <h5 class="sub-title highlight cancel-order">
                                        不可抗力因素之<br class="d-block d-sm-none"/>更改訂位及退費辦法
                                    </h5>
                                    <p>
                                        若因天災等不可抗拒之因素，由該縣市主管機關發布停止上班之訊息，明日俱樂部也將暫停營業，並協助提供改期或全額退費的服務。
                                    </p>

                                    <div class="feature-btn middle d-flex justify-content-center">
                                        <a class="btn-bright-blue" href="index.html#ticketSec">成為玩家</a>
                                    </div>

                                    <h5 class="sub-title highlight change-seat">
                                        更改訂位、取消與退費規則統整表
                                    </h5>

                                    <table id="table-note">
                                        <tbody>
                                        <tr>
                                            <th class="day-period">
                                                天數
                                            </th>
                                            <th class="date-exp">
                                                日期舉例
                                            </th>
                                            <th class="refund-way">
                                                退費機制
                                            </th>
                                            <th class="change-order">
                                                更改日期
                                            </th>
                                        </tr>

                                        <tr class="light-bottom">
                                            <td class="highlight-td">
                                                訂位日
                                            </td>
                                            <td class="highlight-td">
                                                01/08
                                            </td>
                                            <td class="highlight-td">
                                                訂位日當天<br class="d-block d-sm-none"/>無法退費
                                            </td>
                                            <td rowspan="4">
                                                不提供日期更改<br class="d-none d-sm-block"/>建議將訂位轉讓給親友
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                前一日
                                            </td>
                                            <td>
                                                01/07
                                            </td>
                                            <td rowspan="3">
                                                僅退 50% 費用
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img class="img-fluid" src="/clubT/img/dot.png" alt="dot">
                                            </td>
                                            <td>
                                                <img class="img-fluid" src="/clubT/img/dot.png" alt="dot">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>前六日</td>
                                            <td>01/02</td>
                                        </tr>
                                        <tr class="light-bg light-up">
                                            <td>前七日</td>
                                            <td>01/01</td>
                                            <td rowspan="2">
                                                扣除金流手續費<br class="d-none d-sm-block"/>10% 後<span class="d-none d-sm-inline-block">，</span>退費
                                            </td>
                                            <td rowspan="2">
                                                可來信<br class="d-block d-sm-none"/>更改日期
                                            </td>
                                        </tr>
                                        <tr class="light-bg">
                                            <td>
                                                <img class="img-fluid" src="/clubT/img/dot.png" alt="dot">
                                            </td>
                                            <td>
                                                <img class="img-fluid" src="/clubT/img/dot.png" alt="dot">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p class="afterTableNote">
                                        ＊ 上述規則僅適用於預售票券
                                    </p>

                                    <h5 class="sub-title highlight sec-afterTable">
                                        轉讓、改期、退費流程說明
                                    </h5>

                                    <h6 class="small-title transfer-ticket">
                                        票券轉讓
                                    </h6>
                                    <p>
                                        請來信提供轉讓者姓名、信箱、手機號碼，將另外協助處理。
                                    </p>

                                    <h6 class="small-title refund-process">
                                        改期流程
                                    </h6>
                                    <ul>
                                        <li>
                                            1. 提供訂位姓名、訂位信箱、劃位序號等資訊至專屬信箱，註明確認改期。
                                        </li>
                                        <li>
                                            2. 等待回信，俱樂部將為你取消原先訂位後恢復序號資格，可自行重新劃位。
                                        </li>
                                    </ul>

                                    <h6 class="small-title majeure-factor">
                                        退費流程
                                    </h6>

                                    <ul>
                                        <li>
                                            1. 提供預售購票的訂單編號與正確的訂位姓名、信箱提出申請。
                                        </li>
                                        <li>
                                            2. 確認退費後請等待七個至十個工作天後向金融機構確認，實際退費日期仍須視使用的發卡銀行規定為準。
                                        </li>
                                    </ul>

                                    <h5 class="sub-title highlight transaction-system">
                                        線上⾦流系統
                                    </h5>
                                    <p>
                                        明日俱樂部之線上付款透過貝殼集器、藍新金流第三方平台支付
                                    </p>

                                </div>

                                <div class="feature-btn d-flex justify-content-center">
                                    <a class="btn-bright-blue" href="index.html#ticketSec">成為玩家</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>


<!-- Bootstrap -->
<script src="/clubT/js/plugins/jquery-3.3.1.min.js"></script>
<script src="/clubT/js/plugins/popper.min.js"></script>
<script src="/clubT/js/plugins/bootstrap.min.js"></script>
<script src="/clubT/js/plugins/jquery.scrollify.js"></script>

<!-- Ripple Animation Js -->
<script src="/clubT/js/plugins/imagesloaded.pkgd.min.js"></script>

<!-- Aos -->
<script src="/clubT/js/plugins/aos.min.js"></script>

<!-- OwlCarousel2 -->
<script src="/clubT/js/plugins/owl.carousel.min.js"></script>

<script src="/clubT/js/smooth-scroll.js"></script>
<script src="/clubT/js/main.js"></script>
<script src="/clubT/js/rules.js"></script>
</body>
</html>
