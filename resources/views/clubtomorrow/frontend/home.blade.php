<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    @include('clubtomorrow.frontend._metadata')
    <meta property="og:url" content="https://www.surpriselab.com.tw/clubtomorrow/index.html"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>明日俱樂部 Club Tomorrow</title>

    <!-- Style -->
    <link rel="icon" href="/clubT/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/clubT/css/plugins/bootstrap.css"/>
    <link rel="stylesheet" href="/clubT/css/plugins/aos.min.css"/>
    <link rel="stylesheet" href="/clubT/css/plugins/jquery-glitch.css" >
    <link rel="stylesheet" href="/clubT/css/plugins/intlTelInput.min.css" >
    <link rel="stylesheet" href="/clubT/css/intro.css"/>
    <link rel="stylesheet" href="/clubT/css/form.css">

    <!-- Loading Style -->
    <link rel="stylesheet" type="text/css" href="/clubT/css/plugins/loading.css"/>
    <script>
        document.documentElement.className = 'js';

        // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
        let vh = window.innerHeight * 0.01;

        // Then we set the value in the --vh custom property to the root of the document
        document.documentElement.style.setProperty('--vh', `${vh}px`);

        // We listen to the resize event
        window.addEventListener('resize', () => {

            // We execute the same script as before
            let vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        });
    </script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/clubT/css/style.css?v=2.8"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    @include('clubtomorrow.frontend._gtm')
    @include('clubtomorrow.frontend._fbpixel')
</head>
<body class="home loading">

<div class="homepage">
    <!-- Anchor menu -->
    <nav class="anchor-wrapper">
        <ul>
            <li class="d-none">
                <a class="smoothScroll" href="#Home">_Home</a>
            </li>
            <li class="active">
                <a class="smoothScroll" href="#Entrance">_Entrance</a>
            </li>
            <li>
                <a class="smoothScroll" href="#About">_About</a>
            </li>
            <li>
                <a class="smoothScroll fbpx" data-event="sitetoradio" href="radio.html">_Radio</a>
            </li>
            <li>
                <a class="smoothScroll" href="#Ticket">_Ticket</a>
            </li>
            <li style="display: none">
                <a class="smoothScroll" href="#Presale">_Presale</a>
            </li>
            <li>
                <a class="smoothScroll" href="#Rules">_Rules</a>
            </li>
            <li>
                <a class="smoothScroll" href="#Contact">_Contact</a>
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

    <header>
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
                <a class="smoothScroll" href="#Home">Home</a>
            </li>
            <li class="menu-item">
                <a class="smoothScroll" href="#Entrance">Entrance</a>
            </li>
            <li class="menu-item">
                <a class="smoothScroll" href="#About">About</a>
            </li>
            <li class="menu-item">
                <a class="smoothScroll fbpx" data-event="sitetoradio" href="radio.html">Radio</a>
            </li>
            <li class="menu-item">
                <a class="smoothScroll" href="#Ticket">Ticket</a>
            </li>
            <li class="menu-item" style="display: none">
                <a class="smoothScroll" href="#Presale">_Presale</a>
            </li>
            <li class="menu-item">
                <a class="smoothScroll" href="#Rules">Rules</a>
            </li>
            <li class="menu-item">
                <a class="smoothScroll" href="#Contact">Contact</a>
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

    <main>
        <!-- Landing -->
        <section class="fullpage anchor-section fixed-scroll-anchor" data-section-name="Home" id="Home" data-aos="fade">
            <div class="intro-wrapper">
                <div class="intro-inner">
                    <div class="intro-header">
                        <img class="intro-img" src="/clubT/img/landing/1.1_logo.png" alt="Club Tomorrow">
                    </div>
                    <div class="intro-content">
                        <div class="intro-content-item">
                            <div class="glitch">
                                <p class="section-paragraph intro-text">
                                    混亂正在發生<br/>你，能成為最後贏家嗎？
                                </p>
                            </div>
                        </div>
                        <div class="intro-content-item">
                            <a class="smoothScroll btn-bright-blue intro-btn" href="#Entrance">進入明日俱樂部</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section1 Entrance -->
        <section class="fullpage anchor-section fixed-scroll-anchor" data-section-name="Entrance" id="Entrance" data-aos="fade">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>明日俱樂部</h1>
                        <p class="section-paragraph">
                            你好，我是 Emily<br/>
                            歡迎來到明日俱樂部<br/>
                            <br/>
                            這世界正邁入前所未有的混亂<br/>
                            你，說不定是能結束一切的關鍵人物<br/>
                            <br/>
                            你有興趣進入我的世界嗎？
                        </p>
                        <div class="entrance-wrapper">
                            <a class="smoothScroll entrance-link fbpx" href="#About" data-event="viewcontent1">
                                <img src="/clubT/img/icon/icon_about.png" srcset="/clubT/img/icon/icon_about@2x.png 2x" alt="探索世界">
                                <div class="entrance-link-text">探索世界</div>
                            </a>
                            <a class="smoothScroll entrance-link fbpx" href="#Ticket" data-event="viewcontent2">
                                <img src="/clubT/img/icon/icon_ticket.png" srcset="/clubT/img/icon/icon_ticket@2x.png 2x" alt="成為玩家">
                                <div class="entrance-link-text">成為玩家</div>
                            </a>
                            <a class="smoothScroll entrance-link" href="#Rules">
                                <img src="/clubT/img/icon/icon_rules.png" srcset="/clubT/img/icon/icon_rules@2x.png 2x" alt="重要規則">
                                <div class="entrance-link-text">重要規則</div>
                            </a>
                            <a class="smoothScroll entrance-link" href="#Contact">
                                <img src="/clubT/img/icon/icon_contact.png" srcset="/clubT/img/icon/icon_contact@2x.png 2x" alt="聯絡管道">
                                <div class="entrance-link-text">聯絡管道</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section2 About -->
        <section class="anchor-section" id="About" data-aos="fade">
            <section id="aboutSec" class="fullpage fixed-scroll-anchor about-sec about-sec-1" data-section-name="About" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section-title">瘋狂世界</h2>
                            <div class="section-subtitle">the crazy world</div>
                            <div class="d-flex justify-content-center">
                                <p class="section-paragraph v2-styling">
                                    你好，我是 Emily<br/>
                                    歡迎來到我打造的世界<br/>
                                    <span class="v2-visible v2-highlight">這世界</span><br/>
                                    這裡混亂、瘋狂、對立<br/>
                                    大家所要的都不盡相同<br/>
                                    <br/>
                                    但，只要成為贏家，就能終結一切<br/>
                                    <span class="v2-visible v2-highlight">正在分裂</span><br/>
                                    只要成為贏家<br/>
                                    就能打造出你想要的明天
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="fullpage fixed-scroll-anchor about-sec about-sec-2" data-section-name="About" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="section-title">五大陣營</h3>
                            <div class="section-subtitle">five camps</div>
                            <div class="d-flex justify-content-center">
                                <p class="section-paragraph v2-styling">
                                    在這有著相互角力的五大陣營<br/>
                                    <span class="v2-visible v2-highlight">我們</span><br/>
                                    有人崇尚團結、有人追求自由<br/>
                                    有人效忠正義、有人在乎生存<br/>
                                    也有些人質疑並試著推翻一切<br/>
                                    <span class="v2-visible v2-highlight">被迫選邊</span><br/>
                                    你將加入其中一方<br/>
                                    屆時，請稱職扮演好你的角色
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="fullpage fixed-scroll-anchor about-sec about-sec-3" data-section-name="About" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="section-title">六十位玩家</h3>
                            <div class="section-subtitle">sixty players</div>
                            <div class="d-flex justify-content-center">
                                <p class="section-paragraph v2-styling">
                                    每晚，將有六十位玩家進入這世界<br/>
                                    <span class="v2-visible v2-highlight">阻止</span><br/>
                                    身旁的陌生人<br/>
                                    可能成為戰友<br/>
                                    <span class="v2-visible v2-highlight">這場分裂</span><br/>
                                    而你的朋友<br/>
                                    則可能成為敵人
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="fullpage fixed-scroll-anchor about-sec about-sec-4" data-section-name="About" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="section-title">成為贏家</h3>
                            <div class="section-subtitle">one winner</div>
                            <div class="d-flex justify-content-center">
                                <p class="section-paragraph v2-styling">
                                    在角力競爭之中<br/>
                                    在不同信念之間<br/>
                                    <span class="v2-visible v2-highlight">一起</span><br/>
                                    一場大戰即將開打<br/>
                                    <span class="v2-visible v2-highlight">活著離開</span><br/>
                                    在五大陣營、六十位玩家中<br/>
                                    你，能成為最終贏家嗎？
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="fullpage fixed-scroll-anchor about-sec about-sec-5" data-section-name="About" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="section-title">進入世界</h3>
                            <div class="section-subtitle">Enter the world</div>
                            <div class="d-flex justify-content-center">
                                <p class="section-paragraph v2-styling">
                                    最後，請記住<br/>
                                    <span class="v2-visible v2-highlight">想要的</span><br/>
                                    這世界的結局<br/>
                                    由你們 ─ 也就是人類 ─ 共同決定<br/>
                                    <span class="v2-visible v2-highlight">不盡相同</span><br/>
                                    不管最終所迎來的是明日還是末日<br/>
                                    都沒有人能夠置身事外<br/>
                                    <span class="v2-visible v2-highlight">就一定會</span><br/>
                                    你，準備好進入明日俱樂部了嗎？<br/>
                                    <span class="v2-visible v2-highlight">對立嗎</span>
                                </p>
                            </div>
                            <a class="smoothScroll btn-bright-blue fbpx" href="#Ticket" data-event="ViewContent">成為玩家</a>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <!-- Section3 Ticket -->
        <section class="anchor-section" id="Ticket" data-aos="fade">

            <!-- 體驗內容 -->
            <section class="fullpage fixed-scroll-anchor ticket-sec ticket-sec-experience" data-section-name="Ticket" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section-title">體驗內容</h2>
                            <div class="section-subtitle">EXPERIENCE</div>
                            <div class="exp-wrapper">
                                <div class="exp-item">
                                    <p class="section-paragraph">
                                        探索 Discover
                                    </p>
                                    <div class="exp-img">
                                        <img class="img-fluid" src="/clubT/img/landing/1.3_exp_1.png" alt="120分鐘沈浸式體驗">
                                    </div>
                                    <div class="exp-title">
                                        7位表演者<br/>
                                        120分鐘沈浸式體驗
                                    </div>
                                </div>
                                <div class="exp-item">
                                    <p class="section-paragraph">
                                        扮演 Play
                                    </p>
                                    <div class="exp-img">
                                        <img class="img-fluid" src="/clubT/img/landing/1.3_exp_2.png" alt="7位表演者 60位玩家">
                                    </div>
                                    <div class="exp-title">
                                        化身玩家，加入5大陣營<br/>
                                        扮演關鍵角色
                                    </div>
                                </div>
                                <div class="exp-item">
                                    <p class="section-paragraph">
                                        抉擇 Action
                                    </p>
                                    <div class="exp-img">
                                        <img class="img-fluid" src="/clubT/img/landing/1.3_exp_3.png" alt="兩大陣營 五種角色">
                                    </div>
                                    <div class="exp-title">
                                        60位玩家，角逐1場大戰<br/>
                                        結局由你決定
                                    </div>
                                </div>
                            </div>
                            <button class="video-play" data-toggle="modal" data-video-embed="AgIMmTDYGsQ" data-video-playlist="AgIMmTDYGsQ" data-target="#videoDetail">
                                觀看明日俱樂部 Official Trailer
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 玩家口碑 -->
            <section class="fullpage fixed-scroll-anchor ticket-sec ticket-sec-reviews" data-section-name="Ticket" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-12">
                            <h2 class="section-title">玩家口碑</h2>
                            <div class="section-subtitle">Reviews</div>
                            <div id="carouselReviewsControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="reviews-wrapper">
                                            <div class="reviews-inner">
                                                <p class="section-paragraph">
                                                    這是我第一次嘗試沈浸式，完全被震撼，很喜歡這種類似電影情節又深入其境的遊戲體驗。
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="reviews-wrapper">
                                            <div class="reviews-inner">
                                                <p class="section-paragraph">
                                                    這遊戲和社會有著驚人關聯，是場人性實驗，也是真實世界的縮影。
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="reviews-wrapper">
                                            <div class="reviews-inner">
                                                <p class="section-paragraph">
                                                    喜歡所有人都能改變結局的設定
                                                </p>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="carousel-item">
                                        <div class="reviews-wrapper">
                                            <div class="reviews-inner">
                                                <p class="section-paragraph">
                                                    跟朋友進到不同組，原本有點擔心，沒想到看到了更大的世界。但看到朋友變成敵人時，內心真的很複雜。
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="reviews-wrapper">
                                            <div class="reviews-inner">
                                                <p class="section-paragraph">
                                                    我與妹妹面前出現一把槍，在那當下，我們卻只想著要槍斃自己讓對方存活。
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="reviews-wrapper">
                                            <div class="reviews-inner">
                                                <p class="section-paragraph">
                                                    我們的所作所為決定這世界的樣子，沒有人可以置身事外。
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="reviews-wrapper">
                                            <div class="reviews-inner">
                                                <p class="section-paragraph">
                                                    原本是保持著好玩的心情前來，結束之後完全愛上這種型態的體驗，主角們演出專業、場景佈置很精細，跟不同的人來會有不同的碰撞、不同的效果、不同的結局，真的很有趣。
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="reviews-wrapper">
                                            <div class="reviews-inner">
                                                <p class="section-paragraph">
                                                    感謝製作團隊與所有不管是幕前還是幕後的工作人員，這次的體驗真的很棒。
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselReviewsControls" role="button" data-slide="prev">
                                    <img class="img-fluid" src="/clubT/img/btn-prev.svg" alt="prev">
                                </a>
                                <a class="carousel-control-next" href="#carouselReviewsControls" role="button" data-slide="next">
                                    <img class="img-fluid" src="/clubT/img/btn-next.svg" alt="next">
                                </a>
                            </div>
                            <p class="section-paragraph">
                                歡迎於社群網站尋找 #明日俱樂部<br/>
                                一窺先前的玩家經歷了什麼<br/>
                                <br/>
                                了解更多團隊過往作品？<br/>
                                <button class="video-play" data-toggle="modal" data-video-embed="uIp7X2MEXso" data-video-playlist="uIp7X2MEXso" data-target="#videoDetail">
                                    《微醺大飯店 The Great Tipsy》
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 選擇票券 -->
            <!-- <section id="ticketSec" class="fullpage fixed-scroll-anchor ticket-sec ticket-sec-type" data-section-name="Ticket" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section-title">成為玩家</h2>
                            <div class="section-subtitle">TICKET</div>

                            <p class="section-paragraph">
                                點入下方票卷，選擇數量付費後完成購票
                                // 點入下方票卷，選擇數量付費後完成購票<br/>現在預購，將可選擇 03/19-03/29 之場次
                            </p>

                            <div class="ticket-type">
                                <div class="type-item type-single-player">
                                    <a href="https://surpriselab.backme.tw/checkout/1255/8949?locale=zh-TW" class="ticket-frame fbpx" data-event="AddToCart" target="_blank">
                                        <div class="type-img">
                                            <img class="img-fluid d-none d-sm-block" src="/clubT/img/landing/ticket_0319_single_big.png" alt="單人票">
                                            <img class="img-fluid d-block d-sm-none" src="/clubT/img/landing/ticket_0319_single.png" alt="單人票">
                                        </div>
                                        <p class="ticket-state timeLimit">
                                            此優惠將於 06/01起調回至 $2000/人
                                        </p>
                                    </a>
                                </div>
                                <div class="type-item type-multiplayer-for-4">
                                    <a href="https://surpriselab.backme.tw/checkout/1255/8950?locale=zh-TW" class="ticket-frame fbpx" data-event="AddToCart" target="_blank">
                                        <div class="type-img">
                                            <img class="img-fluid d-none d-sm-block" src="/clubT/img/landing/ticket_0319_four_big.png" alt="四人票">
                                            <img class="img-fluid d-block d-sm-none" src="/clubT/img/landing/ticket_0319_four.png" alt="四人票">
                                        </div>
                                        <p class="ticket-state timeLimit">
                                            // 不可分開劃位<span class="d-sm-none d-inline">，</span><br class="d-sm-inline d-none"/>限量 <span class="total-ticket">300</span> 組 | 剩餘 <span class="rest-ticket">XXX</span> 組
                                            此優惠將於 06/01起調回至 $1850/人
                                        </p>
                                    </a>
                                </div>
                                <div class="type-item type-multiplayer-for-10">
                                    <a href="https://surpriselab.backme.tw/checkout/1255/8951?locale=zh-TW" class="ticket-frame fbpx" data-event="AddToCart" target="_blank">
                                        <div class="type-img">
                                            <img class="img-fluid d-none d-sm-block" src="/clubT/img/landing/ticket_0319_ten_big.png" alt="十人票">
                                            <img class="img-fluid d-block d-sm-none" src="/clubT/img/landing/ticket_0319_ten.png" alt="十人票">
                                        </div>
                                        <p class="ticket-state timeLimit">
                                            // 不可分開劃位<span class="d-sm-none d-inline">，</span><br class="d-sm-inline d-none"/>限量 <span class="total-ticket">50</span> 組 | 剩餘 <span class="rest-ticket">XXX</span> 組
                                            此優惠將於 06/01起調回至 $1750/人
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <p class="section-paragraph d-sm-block d-none">
                                明日俱樂部於 12/27-03/31 期間 <br/>
                                共迎接了 6000 位玩家
                                // 訂位採先預購、後劃位之機制<br/>若有包場需求，歡迎來信詢問<br/><br/>詳細劃位時間軸，請見下方「劃位時程」
                            </p>
                        </div>
                    </div>
                </div>
            </section> -->

            <!-- 購票步驟 -->
            <!-- <section class="fullpage fixed-scroll-anchor ticket-sec ticket-sec-step" data-section-name="Ticket" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section-title">購票步驟</h2>
                            <div class="section-subtitle">STEP</div>
                            <p class="section-paragraph">
                                採先預購、後劃位機制<br/>依照購買日期，分梯次寄送劃位信
                            </p>
                            <div class="step-wrapper">
                                <div class="step-inner">
                                    <div class="step-item">
                                        <div class="row-title">
                                            Step 1
                                        </div>
                                        <div class="row-content">
                                            <div class="step-title">
                                                先預購
                                            </div>
                                            <div class="step-intro">
                                                確定夥伴人數，線上預付完成購票
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-item">
                                        <div class="row-title">
                                            Step 2
                                        </div>
                                        <div class="row-content">
                                            <div class="step-title">
                                                後劃位
                                            </div>
                                            <div class="step-intro">
                                                將於指定時間收到劃位信件，並透過線上劃位，選擇日期、場次
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-item">
                                        <div class="row-title">
                                            Step 3
                                        </div>
                                        <div class="row-content">
                                            <div class="step-title">
                                                來體驗
                                            </div>
                                            <div class="step-intro">
                                                依開放劃位後自行選定的日期、場次前來體驗
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

            <!-- 劃位時程 -->
            <!-- <section class="fullpage fixed-scroll-anchor ticket-sec ticket-sec-schedule" data-section-name="Ticket" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 offset-sm-0 col-10 offset-1">
                            <h2 class="section-title">劃位時程</h2>
                            <div class="section-subtitle">SCHEDULE</div>
                        </div>
                        <div class="col-sm-6 offset-sm-3 col-10 offset-1">
                            <div class="schedule-wrapper">
                                <div class="schedule-inner">
                                    <div class="schedule-item">
                                        <div class="schedule-title">
                                            03/10（二）
                                        </div>
                                        <div class="schedule-content">
                                            寄送劃位信 — 03/02到03/09晚上18:00前購票者
                                        </div>
                                    </div>
                                    <div class="schedule-item">
                                        <div class="schedule-title">
                                            03/17（二）
                                        </div>
                                        <div class="schedule-content">
                                            寄送劃位信 — 03/09到03/16晚上18:00前購票者
                                        </div>
                                    </div>
                                    <div class="schedule-item">
                                        <div class="schedule-title">
                                            03/24（二）
                                        </div>
                                        <div class="schedule-content">
                                            寄送劃位信 — 03/16到03/23晚上18:00前購票者
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="section-paragraph">
                                更詳細的劃位須知，將於劃位日前透過電子郵件告知，為提供最好的體驗品質，上述日期會依實際狀況彈性調整
                            </p>
                        </div>
                    </div>
                </div>
            </section> -->

            <!-- 體驗場次 -->
            <!-- <section class="fullpage fixed-scroll-anchor ticket-sec ticket-sec-time-slots" data-section-name="Ticket" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 offset-sm-0 col-10 offset-1">
                            <h2 class="section-title">體驗場次</h2>
                            <div class="section-subtitle">TIME SLOTS</div>
                        </div>
                        <div class="col-sm-6 offset-sm-3 col-10 offset-1">
                            <div class="time-slots-wrapper">
                                <div class="time-slots-inner">
                                    <div class="time-slots-row">
                                        <div class="time-slots-item">
                                            <div class="time-slots-title">
                                                週五
                                            </div>
                                            <div class="time-slots-content">
                                                18:30 | 20:30
                                            </div>
                                        </div>
                                        <div class="time-slots-item">
                                            <div class="time-slots-title">
                                                週六
                                            </div>
                                            <div class="time-slots-content">
                                                18:30 | 20:30
                                            </div>
                                        </div>
                                    </div>
                                    <div class="time-slots-row">
                                        <div class="time-slots-item">
                                            <div class="time-slots-title">
                                                週日
                                            </div>
                                            <div class="time-slots-content">
                                                13:00 | 15:00
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="section-paragraph text-center">每場次約120分鐘<br/><br/></p>
                            <p class="section-paragraph">
                                為提供最好的體驗品質，上述場次時段會依實際狀況彈性調整
                            </p>
                        </div>
                    </div>
                </div>
            </section> -->

            <!-- 售票狀況 -->
            <!-- <section class="fullpage fixed-scroll-anchor ticket-sec ticket-sec-status" data-section-name="Ticket" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 offset-sm-0 col-10 offset-1">
                            <h2 class="section-title">售票狀況</h2>
                            <div class="section-subtitle">TICKET STATUS</div>
                        </div>
                        <div class="col-sm-6 offset-sm-3 col-12">
                            // 倒數計時器
                            <div class="time-counter">
                                <p class="section-paragraph">
                                    嘿，如果你對這世界感到好奇<br/>請與我們一起招募玩家吧！<br/><br/>
                                </p>
                                <div class="time-rest d-flex align-items-center justify-content-center">
                                    <span class="days">00</span>天
                                    <span class="hours">00</span>時
                                    <span class="minutes">00</span>分
                                    <span class="seconds">00</span>秒
                                </div>
                            </div>

                            // 售票進度
                            <div class="sale-progress">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuemax="100"></div>
                                </div>
                                <div class="sale-progress-info">
                                    <div class="d-inline-block d-sm-flex">
                                        <p class="section-paragraph">
                                            // 目標召募 <span class="total-sale">1500</span> 位<span class="over-sale">，待招募 <span class="total-rest"></span> 位</span>
                                            目標召募 <span class="total-sale">1500</span> 位<span class="over-sale">，已招募 <span class="total-rest total-sale-number"></span> 位</span>
                                        </p>
                                        <p class="section-paragraph ml-auto text-right progress-percent-area">
                                            已完成 <span class="progress-percent">80</span> %
                                        </p>
                                    </div>
                                    <p class="sale-remark section-paragraph">
                                        * 05/31前招募滿1500位玩家，《明日俱樂部》將再次開啟<br/>
                                        <br/>
                                        * 現正預售六月至七月之座位，確切可劃位日期、劃位辦法，將於 06/01 判斷疫情狀況，透過簡訊、email 通知<br/>
                                    </p>
                                    <a class="smoothScroll btn-bright-blue" href="#Rules">俱樂部手冊</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
        </section>

        <!-- Section3.5 Presale Ticket -->
        <section class="anchor-section" id="Presale" data-aos="fade">
            <!-- 如何參與 -->
            <section class="fullpage fixed-scroll-anchor ticket-sec ticket-sec-ticket-about" data-section-name="Presale" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section-title">如何參與</h2>
                            <div class="section-subtitle">TICKET</div>
                            <p class="section-paragraph">
                                受現實世界之影響<br/>
                                《明日俱樂部》的入口暫時關閉<br/>
                                <br/>
                                <span class="font-underline">但，這並不是結束</span><br/>
                                <span class="font-underline">如果你有興趣，請留下你的資訊</span><br/>
                                <br/>
                                我們將在明日俱樂部重啟時通知你<br/>
                                <br/>
                            </p>
                            <form action="">
                                <fieldset class="step-4">
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
                                    <div class="button-wrapper d-flex justify-content-center">
                                        <button type="button" class="btn-default submit-form" disabled>connect</button>
                                    </div>
                                </fieldset>
                            </form>
                            <p class="section-paragraph">
                                <a class="link-bright-green fbpx" data-event="ticket" href="javascript://" data-toggle="modal" data-target="#ticketDetail">點此，快速了解明日俱樂部預售機制</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 來自團隊的一封信 -->
            <section class="fullpage fixed-scroll-anchor ticket-sec ticket-sec-ticket-letter" data-section-name="Presale" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section-title">來自團隊的一封信</h2>
                            <div class="section-subtitle">A LETTER FROM THE TEAM</div>
                            <p class="section-paragraph">
                                雖然《明日俱樂部》因為疫情暫停，<br/>
                                但，這並不是結束。<br/>
                                <br/>
                                在等待疫情穩定的這段日子中，<br/>
                                希望大家都能健健康康的。<br/>
                                期待我們的生活，回到往昔的日常，<br/>
                                有朝一日，我們能放下擔憂地玩樂。<br/>
                                <br/>
                                團隊也期待著，<br/>
                                在《明日俱樂部》重啟的那一天，<br/>
                                能與你見上一面。<br/>
                                <br/>
                                <a class="smoothScroll link-bright-green" href="#Presale">
                                    若你對《明日俱樂部》有興趣，<br/>
                                    請留下你的資訊，這對我們是很大的鼓勵喔！
                                </a>
                                <br/><br/>
                                <i>驚喜製造 Surprise Lab.</i>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <!-- Section4 Rules -->
        <section class="fullpage anchor-section fixed-scroll-anchor" data-section-name="Rules" id="Rules" data-aos="fade">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">俱樂部手冊</h2>
                        <div class="section-subtitle">CLUB RULES</div>
                        <p class="section-paragraph">
                            若有其他問題，請按下方按鈕
                        </p>
                        <a class="smoothScroll btn-bright-blue" href="rules.html">查看手冊</a>
                        <p class="section-paragraph">
                            問與答 / 預售規則 / 更改、退費事項
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section5 Contact -->
        <section class="fullpage anchor-section fixed-scroll-anchor" data-section-name="Contact" id="Contact" data-aos="fade">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">聯絡</h2>
                        <div class="section-subtitle">Contact</div>
                        <p class="section-paragraph">
                            有任何問題，請先至 <a class="smoothScroll link-bright-green" href="#Rules">俱樂部手冊</a> 頁面<br class="d-sm-none d-inline"/><br class="d-sm-none d-inline"/>查看<br class="d-sm-inline d-none"/><br class="d-sm-inline d-none"/>手冊外的其他問題<br class="d-sm-none d-inline"/>（疑難雜症、企業合作、包場需求、媒體公關）<br/>歡迎來信詢問
                        </p>
                    </div>
                    <div class="col-lg-6 offset-lg-3">
                        <div class="contact-wrapper">
                            <div class="contact-item">
                                <div class="contact-title">
                                    聯絡⽅式
                                </div>
                                <div class="contact-content">
                                    <a href="mailto:clubtomorrow@surpriselab.com.tw" target="_blank">clubtomorrow@surpriselab.com.tw</a>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-title">
                                    聯絡時間
                                </div>
                                <div class="contact-content">
                                    週一至週五 11:00am-18:00pm
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-title">
                                    明日俱樂部地址
                                </div>
                                <div class="contact-content">
                                    台北市中心，捷運站附近<br/>實際地址，只有俱樂部成員知道
                                </div>
                            </div>
                        </div>
                        <a class="smoothScroll btn-bright-blue" href="#Ticket">成為玩家</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<!-- Exp Modal -->
<div class="modal fade" id="expDetail" tabindex="-1" role="dialog" aria-labelledby="expDetailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    玩家指南
                    <div class="close-modal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <div class="modal-text">
                    <!-- <div class="exp-wrapper">
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="/clubT/img/icon/ticket/icon_ticket_1-1.png" alt="舞蹈">
                            </div>
                            <div class="exp-content">
                                表演
                            </div>
                        </div>
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="/clubT/img/icon/ticket/icon_ticket_1-2.png" alt="音樂">
                            </div>
                            <div class="exp-content">
                                音樂
                            </div>
                        </div>
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="/clubT/img/icon/ticket/icon_ticket_1-3.png" alt="小點">
                            </div>
                            <div class="exp-content">
                                舞蹈
                            </div>
                        </div>
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="/clubT/img/icon/ticket/icon_ticket_2-1.png" alt="陣營">
                            </div>
                            <div class="exp-content">
                                陣營
                            </div>
                        </div>
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="/clubT/img/icon/ticket/icon_ticket_2-2.png" alt="派別">
                            </div>
                            <div class="exp-content">
                                選擇
                            </div>
                        </div>
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="/clubT/img/icon/ticket/icon_ticket_2-3.png" alt="選擇">
                            </div>
                            <div class="exp-content">
                                倒數
                            </div>
                        </div>
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="/clubT/img/icon/ticket/icon_ticket_3-1.png" alt="格鬥">
                            </div>
                            <div class="exp-content">
                                格鬥
                            </div>
                        </div>
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="/clubT/img/icon/ticket/icon_ticket_3-2.png" alt="投票">
                            </div>
                            <div class="exp-content">
                                調飲
                            </div>
                        </div>
                        <div class="exp-item">
                            <div class="exp-icon">
                                <img src="/clubT/img/icon/ticket/icon_ticket_3-3.png" alt="倒數">
                            </div>
                            <div class="exp-content">
                                派對
                            </div>
                        </div>
                    </div> -->
                    <p class="section-paragraph">
                        唯有人類能夠進入<br/>現場將進行人類檢測及分類<br/><br/>請大膽在這世界穿梭<br/>你將遇見五大陣營的領導者<br/><br/>你將加入一場秘密集會<br/>請積極參與，它會是你獲勝的關鍵<br/><br/>最後，請用盡一切方法<br/>成為贏家 － 決定這世界的明天<br/><br/>祝你勝利。<br/><br/>註：現場提供少量酒水與小點
                    </p>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        關閉
                    </button>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Ticket Modal -->
<div class="modal fade" id="ticketDetail" tabindex="-1" role="dialog" aria-labelledby="ticketDetailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    預售機制
                    <div class="close-modal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <div class="modal-text">
                    <div class="ticket-wrapper">
                        <div class="ticket-item">
                            <div class="ticket-title">
                                Q1：明日俱樂部重啟的關鍵是什麼呢？
                            </div>
                            <div class="ticket-content">
                                明日俱樂部重啟有兩項指標，分別為疫情狀況與有興趣人數。<br/>
                                <br/>
                                針對疫情：團隊會持續觀察疫情，希望能於疫情穩定後再度開啟明日俱樂部。預計重啟時間為2020年夏天。<br/>
                                <br/>
                                針對有興趣人數：是否有夠多玩家願意留下資訊，是對團隊重啟作品的重要參考。團隊目前將最低目標訂為 2000 人。若你希望明日俱樂部成功啟動，歡迎將本頁面分享給更多人！
                            </div>
                        </div>
                        <div class="ticket-item">
                            <div class="ticket-title">
                                Q2：留下資訊的下一步是什麼呢？
                            </div>
                            <div class="ticket-content">
                                團隊將於重啟前，透過簡訊、e-mail，將明日俱樂部重啟資訊寄送給你。現有的折扣碼待重啟售票後，仍然可以使用，毋須擔心。
                            </div>
                        </div>
                        <div class="ticket-item">
                            <div class="ticket-title">
                                Q3：若明日俱樂部決定停演呢？
                            </div>
                            <div class="ticket-content">
                                若疫情於今年秋初尚未穩定，使明日俱樂部最終決定停演，團隊會為已購票／申請延期的你進行退費。
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div class="video-wrapper">
    <div class="video">
        <!-- Youtube Video Append Position -->
    </div>
    <div class="video-close">
        <button class="btn-close-video">×</button>
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

<!-- Screen Rotate Hint -->
<div class="hint-wrapper">
    <div class="hint-inner">
        <div class="hint-img">
            <img src="/clubT/img/icon/rotate_turn-h.gif" alt="screen-rotate">
        </div>
        <div class="hint-text">
            請使用橫式觀看，以獲得最佳體驗
        </div>
    </div>
</div>

<!-- Plugins -->
<script src="/clubT/js/plugins/jquery-3.3.1.min.js"></script>
<script src="/clubT/js/plugins/popper.min.js"></script>
<script src="/clubT/js/plugins/bootstrap.min.js"></script>
<script src="/clubT/js/plugins/jquery.scrollify.js"></script>
<script src="/clubT/js/plugins/jquery-glitch.js"></script>
<script src="/clubT/js/plugins/utils.js"></script>
<script src="/clubT/js/plugins/intlTelInput.js"></script>

<!-- Loading Animation Js -->
<script src="/clubT/js/plugins/imagesloaded.pkgd.min.js"></script>

<!-- Aos -->
<script src="/clubT/js/plugins/aos.min.js"></script>

<!-- isMobile -->
<script src="/clubT/js/plugins/isMobile.min.js"></script>

<!-- Custom Js -->
<script src="/clubT/js/main.js"></script>
<script src="/clubT/js/smooth-scroll.js"></script>
<script src="/clubT/js/home.js?v=0.8"></script>
<script src="/clubT/js/rotate-device-hint.js"></script>
</body>
</html>
