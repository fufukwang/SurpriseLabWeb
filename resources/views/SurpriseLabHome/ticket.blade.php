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
                                                Dining In The Dark Season 3
                                            </span>
                                            <h3 class="title">
                                                無光晚餐第三季
                                            </h3>
                                            <p class="desc">
                                                WE DON’T MEET PEOPLE BY ACCIDENT.<br />
                                                WE MEET FOR A REASON.
                                            </p>
                                        </header>

                                        <!-- 體驗數據、CTA (Desktop) -->
                                        <div class="ticket-footer show-in-desktop">
                                            <div class="ticket-footer-inner">
                                                <div class="ticket-cta">
                                                    <a href="/dininginthedark3/index.html" class="surpri-btn size-regular color-regular arrow-right" target="_blank">前往預約</a>
                                                </div>
                                                <div class="ticket-data">
                                                    <div class="data-item">
                                                        <div class="data-num">356天</div>
                                                        <div class="data-title">營業天數</div>
                                                    </div>
                                                    <div class="data-item">
                                                        <div class="data-num">30,724人</div>
                                                        <div class="data-title">用餐人數</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 體驗縮圖 -->
                                    <a href="/dininginthedark3/index.html" class="ticket-img" target="_blank">
                                        <picture>
                                            <!-- <source srcset="/SurpriseLabHome/assets/images/project/dininginthedark3/img_banner.webp" type="image/webp"> -->
                                            <img src="/SurpriseLabHome/assets/images/project/dininginthedark3/img_banner.jpg" alt="無光晚餐第三季">
                                        </picture>
                                    </a>
                                </div>

                                <!-- 體驗數據、CTA (Mobile) -->
                                <div class="ticket-footer show-in-mobile">
                                    <div class="ticket-footer-inner">
                                        <!-- <div class="ticket-data">
                                            <div class="data-item">
                                                <div class="data-num">356天</div>
                                                <div class="data-title">營業天數</div>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-num">30,724人</div>
                                                <div class="data-title">用餐人數</div>
                                            </div>
                                        </div> -->
                                        <div class="ticket-cta">
                                            <a href="/dininginthedark3/index.html" class="surpri-btn size-regular color-regular arrow-right" target="_blank">前往預約</a>
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
                                                Mind The Gap
                                            </span>
                                            <h3 class="title">
                                                落日月台
                                            </h3>
                                            <p class="desc">
                                                正如落日之後，必有黎明<br />
                                                所有終點，必是另個起點
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
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 無體驗 -->
        <!-- <section id="ticket-empty" class="ticket-empty full-page">
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
        </section> -->

        <!-- Modal - Notice -->
        @include('SurpriseLabHome._noticeModal')

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

