@extends('SurpriseLabHome._layout.master')

@section('meta')
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="那些正在發生的、獨一無二的體驗都在這裡。期間限定，千萬別錯過！">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="近期體驗｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:site_name" content="近期體驗｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:description" content="那些正在發生的、獨一無二的體驗都在這裡。期間限定，千萬別錯過！"/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/general/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="近期體驗｜驚喜製造 SURPRISE LAB">
    <meta name="twitter:description" content="那些正在發生的、獨一無二的體驗都在這裡。期間限定，千萬別錯過！">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/general/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('style')
    <title>近期體驗｜驚喜製造 SURPRISE LAB</title>

    <!-- Style -->
    <link rel="icon" href="/SurpriseLabHome/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/bootstrap-5.1.3/bootstrap.min.css"/>

    <!-- Loading Style -->
    <link rel="stylesheet" type="text/css" href="/SurpriseLabHome/resources/css/plugins/imagesloaded/loading.css"/>

    <!-- AOS -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/aos-2.0.0/aos.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/icomoon/style.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/style.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/ticket.css?20240709">
@endsection
@section('main')
    <main>
        <h1>TICKET</h1>
        
        <!-- 販售中體驗 -->
        <section id="ticket" class="ticket full-page">
            <div class="container-xl">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-12">
                        <div class="surpri-title brackets-regular layout-center style-dark">
                            <div class="title-wrap">
                                <h2 class="title-en">ON-GOINH</h2>
                                <h5 class="title-ch">近期體驗</h5>
                            </div>
                        </div>
                        <div class="surpri-content">
                            <div class="ticket-card" data-aos="fade">
                                <div class="ticket-card-inner">

                                    <!-- 體驗介紹 -->
                                    <div class="ticket-intro">
                                        <header class="ticket-header">
                                            <span class="subtitle">
                                                Mind The Gap
                                            </span>
                                            <h3 class="title">
                                                落日月台
                                            </h3>
                                            <p class="desc">
                                                多場域沉浸Ｘ全感官體驗<br />
                                                前往窺探屬於你的終點
                                            </p>
                                        </header>

                                        <!-- 體驗數據、CTA (Desktop) -->
                                        <div class="ticket-footer show-in-desktop">
                                            <div class="ticket-footer-inner">
                                                <div class="ticket-cta">
                                                    <a href="https://bit.ly/3PXnNjP" class="surpri-btn size-regular color-regular arrow-right" target="_blank">前往預約</a>
                                                </div>
                                                <div class="ticket-data">
                                                    <div class="data-item">
                                                        <div class="data-num">70-80分鐘</div>
                                                        <div class="data-title">一場體驗</div>
                                                    </div>
                                                    <div class="data-item">
                                                        <div class="data-num">每週三~日</div>
                                                        <div class="data-title">展演時間</div>
                                                    </div>
                                                    <div class="data-item">
                                                        <div class="data-num">5,500+</div>
                                                        <div class="data-title">參與人數</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 體驗縮圖 -->
                                    <a href="#" class="ticket-img" target="_blank">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/images/project/mind_the_gap/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/mind_the_gap/img_banner.jpg" alt="落日月台">
                                        </picture>
                                    </a>
                                </div>

                                <!-- 體驗數據、CTA (Mobile) -->
                                <div class="ticket-footer show-in-mobile">
                                    <div class="ticket-footer-inner">
                                        <!-- <div class="ticket-data">
                                            <div class="data-item">
                                                <div class="data-num">70-80分鐘</div>
                                                <div class="data-title">一場體驗</div>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-num">每週三~日</div>
                                                <div class="data-title">展演時間</div>
                                            </div>
                                        </div> -->
                                        <div class="ticket-cta">
                                            <a href="https://bit.ly/3PXnNjP" class="surpri-btn size-regular color-regular arrow-right" target="_blank">前往預約</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ticket-card" data-aos="fade">
                                <div class="ticket-card-inner">

                                    <!-- 體驗介紹 -->
                                    <div class="ticket-intro">
                                        <header class="ticket-header">
                                            <span class="subtitle">
                                                Le Bal de Paris de Blanca Li
                                            </span>
                                            <h3 class="title">
                                                巴黎舞會
                                            </h3>
                                            <p class="desc">
                                                威尼斯影展最佳VRＸ全感官沉浸體驗<br />
                                                跳場最自由的舞，做場真實清醒夢
                                            </p>
                                        </header>

                                        <!-- 體驗數據、CTA (Desktop) -->
                                        <div class="ticket-footer show-in-desktop">
                                            <div class="ticket-footer-inner">
                                                <div class="ticket-cta">
                                                    <a href="https://www.surpriselab.com.tw/lebaldeparis?utm_source=sl&utm_medium=web" class="surpri-btn size-regular color-regular arrow-right" target="_blank">前往預約</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 體驗縮圖 -->
                                    <a href="#" class="ticket-img" target="_blank">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/images/project/paris/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/paris/img_banner.jpg" alt="落日月台">
                                        </picture>
                                    </a>
                                </div>

                                <!-- 體驗數據、CTA (Mobile) -->
                                <div class="ticket-footer show-in-mobile">
                                    <div class="ticket-footer-inner">
                                        <div class="ticket-cta">
                                            <a href="https://www.surpriselab.com.tw/lebaldeparis?utm_source=sl&utm_medium=web" class="surpri-btn size-regular color-regular arrow-right" target="_blank">前往預約</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 無體驗 -->
        <section id="ticket-empty" class="ticket-empty full-page">
            <div class="container-xl">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-12">
                        <div class="surpri-title brackets-regular layout-center style-dark">
                            <div class="title-wrap">
                                <h2 class="title-en">Ticket</h2>
                                <h5 class="title-ch">近期體驗</h5>
                            </div>
                        </div>
                        <div class="surpri-content">
                            <div class="empty-img">
                                <picture>
                                    <source srcset="/SurpriseLabHome/assets/webps/ticket/img_empty.webp" type="image/webp">
                                    <img class="img-fluid" src="/SurpriseLabHome/assets/images/ticket/img_empty.png" alt="沒有進行中的體驗">
                                </picture>
                            </div>
                            <p class="empty-desc">
                                近期計畫醞釀中<br/>
                                驚喜出沒敬請期待
                            </p>
                            <div class="empty-cta">
                                <a href="https://www.facebook.com/surpriselabtw?utm_source=officialwebsite&utm_medium=SocialFollow" class="surpri-btn size-regular color-regular arrow-right" target="_blank">追蹤驚喜製造</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal - Notice -->
        <div class="surpri-modal notice-modal-wrap modal fade" id="NoticeModal" tabindex="-1" aria-labelledby="NoticeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="NoticeModalLabel">重要訊息</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="body-03">
                        不論是活動通知、重大宣布、隱藏彩蛋、心情分享，當驚喜製造有消息與你們宣布時，這個視窗就不得了。
                        </p>
                        <p class="body-03">
                            來自驚喜製造的消息 :)
                        </p>
                    </div>
                    <div class="modal-footer">
                        <!-- <a href="https://www.facebook.com/surpriselabtw?utm_source=officialwebsite&utm_medium=SocialFollow" target="_blank" class="surpri-btn size-regular color-orange">前往粉絲專頁</a> -->
                        <center>
                            <a target="_blank" href="https://www.facebook.com/surpriselabtw"><i class="icon-fb"></i></a>
                            <a target="_blank" href="https://www.instagram.com/surpriselabtw/"><i class="icon-ig"></i></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
@section('script')
    <!-- Plugins -->
    <script src="/SurpriseLabHome/resources/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="/SurpriseLabHome/resources/js/plugins/bootstrap-5.1.3/bootstrap.min.js"></script>

    <!-- AOS -->
    <script src="/SurpriseLabHome/resources/js/plugins/aos-2.0.0/aos.js"></script>

    <!-- Loading Animation JS -->
    <script src="/SurpriseLabHome/resources/js/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- Custom -->
    <script src="/SurpriseLabHome/resources/js/main.js"></script>
    <script src="/SurpriseLabHome/resources/js/preload.js"></script>
@endsection

