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
    <link rel="stylesheet" href="/clubT/css/buynow.css?v=0.2"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    @include('clubtomorrow.frontend._gtm')
    @include('clubtomorrow.frontend._fbpixel')
</head>
<body class="home loading">

<div class="homepage">
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
                    <a class="smoothScroll" href="buynow.html">
                        <img src="/clubT/img/header_logo.png" alt="明日俱樂部 Club Tomorrow">
                    </a>
                </div>
            </div>
        </div>
    </header>

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
                                    為自己、為群體、為世界<br/>在所有決定背後，你為的是誰？
                                </p>
                            </div>
                        </div>
                        <div class="intro-content-item">
                            <a class="smoothScroll btn-bright-blue intro-btn" href="#About">進入明日俱樂部</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section1 About -->
        <section class="anchor-section" id="About" data-aos="fade">
            <section id="aboutSec" class="fullpage fixed-scroll-anchor about-sec about-sec-1" data-section-name="About" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section-title">歡迎來到明日俱樂部</h2>
                            <div class="section-subtitle">CLUB TOMORROW</div>
                            <div class="d-flex justify-content-center">
                                <p class="section-paragraph">
                                    你好，我是 Emily<br/>
                                    <br/>
                                    明日俱樂部是一個由我所打造的狂歡世界<br/>
                                    <br/>
                                    在這世界中，每晚都有 60 位玩家相互競爭<br/>
                                    你的每個決定，都將影響這世界與你自己的結局<br/>
                                    <br/>
                                    我很好奇，在混亂與狂歡之中<br/>
                                    你，能成為最後贏家嗎？
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <!-- Section2 Ticket -->
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
                                    <div class="exp-img">
                                        <img class="img-fluid" src="/clubT/img/landing/1.3_exp_1.png" alt="120分鐘沈浸式體驗">
                                    </div>
                                    <div class="exp-title">
                                        120分鐘沈浸式體驗
                                    </div>
                                </div>
                                <div class="exp-item">
                                    <div class="exp-img">
                                        <img class="img-fluid" src="/clubT/img/landing/1.3_exp_2.png" alt="7位表演者 60位玩家">
                                    </div>
                                    <div class="exp-title">
                                        7位表演者 60位玩家
                                    </div>
                                </div>
                                <div class="exp-item">
                                    <div class="exp-img">
                                        <img class="img-fluid" src="/clubT/img/landing/1.3_exp_3.png" alt="兩大陣營 五種角色">
                                    </div>
                                    <div class="exp-title">
                                        兩大陣營 五種角色
                                    </div>
                                </div>
                            </div>
                            <p class="section-paragraph">
                                體驗中會因玩家的選擇<br/>獲得調飲與小點，或進入特殊空間的權限<br/><br/>體驗空間外設有接待區，提供需付費之餐點飲料<br/>歡迎提前抵達，或於結束後與夥伴一同停留
                            </p>
                            <a class="link-bright-green" href="javascript://" data-toggle="modal" data-target="#expDetail">體驗內含</a>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <!-- Section3 Rules -->
        <section class="fullpage anchor-section fixed-scroll-anchor" data-section-name="Rules" id="Rules" data-aos="fade">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">重要規則</h2>
                        <div class="section-subtitle">RULES</div>
                        <p class="section-paragraph">
                            在進入明日俱樂部之前<br/>有三件事項，你必須先知道：
                        </p>
                        <div class="text-center">
                            <p class="section-paragraph d-inline-block text-left color-bright-green">
                                你的行為，將時時刻刻被分析<br/>
                                你的朋友，可能成為你的敵人<br/>
                                你的決定，會影響這世界的明天
                            </p>
                        </div>
                        <p class="section-paragraph">
                            你，準備好進入明日俱樂部了嗎？
                        </p>
                        <div class="d-block d-sm-flex justify-content-center">
                            <a class="btn-bright-blue" href="javascript://" data-toggle="modal" data-target="#teamDetail">團隊介紹</a>
                            <a class="btn-bright-blue" href="booking.html">前往購票</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<!-- Modal -->
<div class="modal fade" id="expDetail" tabindex="-1" role="dialog" aria-labelledby="expDetailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    體驗內含
                </div>
                <div class="modal-text">
                    <div class="exp-wrapper">
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
                    </div>
                    <p class="section-paragraph">
                        你準備好狂歡了嗎？
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        關閉
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="teamDetail" tabindex="-1" role="dialog" aria-labelledby="teamDetailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="logo d-block d-sm-none">
                    <a class="smoothScroll" href="buynow.html">
                        <img src="/clubT/img/logo_2_mobile@2x.png" alt="明日俱樂部 Club Tomorrow">
                    </a>
                </div>
                <button type="button" class="top close" data-dismiss="modal" aria-label="Close"></button>
                <section class="team-vision d-flex flex-column justify-content-center">
                    <img src="/clubT/img/intro_logo.png" alt="明日俱樂部">
                    <h2>
                        《明日俱樂部 Club Tomorrow》
                    </h2>
                    <p class="section-paragraph color-bright-green">
                        驚喜製造 Surprise Lab. 第五號作品
                    </p>
                </section>
                <section class="team-intro">
                    <p>
                        《明日俱樂部》是由驚喜製造 Surprise Lab. 繼《無光晚餐 Dining In The Dark》、《table for ONE 一人餐桌》、《微醺大飯店 The Great Tipsy》後推出的第五號作品。<br/>
                        <br/>
                        在《明日俱樂部》中，參與者將經歷一場長達兩小時，結合沈浸、互動、參 與、表演、音樂、影像、燈光、酒飲與小點的體驗，隨著七位角色，開始分 流與互相角力，並在狂歡之中，迎來由所有人一同決定的結局。<br/>
                        <br/>
                        《明日俱樂部》也是繼《微醺大飯店》後，驚喜製造與進港浪製作共同打造 的第二部大型體驗作品 ── 其中，《微醺大飯店 The Great Tipsy》獲得 2019 年德國紅點設計大獎，並入選 2019 年台灣金點設計獎決選名單。
                    </p>
                    <p class="color-bright-green">
                        沈浸式體驗<br/>
                        唯有親身經歷，你才會知道是怎麼一回事<br/>
                        <br/>
                        期待在明日俱樂部見到你。
                    </p>
                </section>
                <section class="team-video">
                    <div class="section-title">
                        <div class="section-title-inner">
                            <h3>觀看過往作品</h3>
                            <span>PROJECT</span>
                        </div>
                    </div>
                    <div class="video-wrapper">
                        <div class="video-container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/PDGbkBUoxMg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </section>
                <section class="team-info">
                    <div class="section-title">
                        <div class="section-title-inner">
                            <h3>團隊資訊</h3>
                            <span>ABOUT</span>
                        </div>
                    </div>
                    <div class="team-info-inner">
                        <p class="sub-title color-bright-green">
                            驚喜製造 Surprise Lab.
                        </p>
                        <p>
                            驚喜製造 Surprise Lab. 是個出沒時間、地點難以預測的體 驗製造商，透過沉浸式設計翻轉生活中習以為常的人事物， 並讓大家在親身體驗之中，挖掘屬於自己的驚喜 ──<br/>
                            <br/>
                            對了，每項作品都有個快閃時限，錯過，就沒囉。
                        </p>
                        <p class="sub-title color-bright-green">
                            作品列表
                        </p>
                        <div class="work-list">
                            <p class="d-flex">
                                <span>2020</span>
                                《明日俱樂部 Club Tomorrow》
                            </p>
                            <p class="d-flex">
                                <span>2019</span>
                                《微醺大飯店 The Great Tipsy》
                            </p>
                            <p class="d-flex">
                                <span>2018</span>
                                《無光晚餐第二季 Dining In The Dark Season 2》
                            </p>
                            <p class="d-flex">
                                <span>2017</span>
                                《table for ONE 一人餐桌》
                            </p>
                            <p class="d-flex">
                                <span>2016</span>
                                《無光晚餐 Dining In The Dark》
                            </p>
                        </div>
                    </div>
                    <a class="btn-bright-blue" data-dismiss="modal" aria-label="Close" href="javascript://">
                        關閉介紹頁面
                    </a>
                </section>
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

<!-- Loading Animation Js -->
<script src="/clubT/js/plugins/imagesloaded.pkgd.min.js"></script>

<!-- Aos -->
<script src="/clubT/js/plugins/aos.min.js"></script>

<!-- isMobile -->
<script src="/clubT/js/plugins/isMobile.min.js"></script>

<!-- Custom Js -->
<script src="/clubT/js/buynow.js"></script>
<script src="/clubT/js/smooth-scroll.js"></script>
<script src="/clubT/js/rotate-device-hint.js"></script>
</body>
</html>
