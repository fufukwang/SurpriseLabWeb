@extends('SurpriseLabHome._layout.master')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="出沒時間、地點難以預測的體驗製造商。Surprise is Everywhere.">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="驚喜製造 SURPRISE LAB"/>
    <meta property="og:site_name" content="驚喜製造 SURPRISE LAB"/>
    <meta property="og:description" content="出沒時間、地點難以預測的體驗製造商。Surprise is Everywhere."/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/general/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="驚喜製造 SURPRISE LAB">
    <meta name="twitter:description" content="出沒時間、地點難以預測的體驗製造商。Surprise is Everywhere.">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/general/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('style')
    <title>驚喜製造 SURPRISE LAB</title>

    <!-- Style -->
    <link rel="icon" href="/SurpriseLabHome/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/bootstrap-5.1.3/bootstrap.min.css"/>

    <!-- Loading Style -->
    <link rel="stylesheet" type="text/css" href="/SurpriseLabHome/resources/css/plugins/imagesloaded/loading.css"/>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/owlcarousel2-2.3.4/owl.carousel.min.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/owlcarousel2-2.3.4/owl.theme.default.min.css">

    <!-- AOS -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/aos-2.0.0/aos.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/icomoon/style.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/style.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/index.css?20240709">
@endsection
@section('main')
    <main>

        <h1>驚喜製造 SURPRISE LAB</h1>

        <section id="home-hero" class="hero has-video">

            <!-- 驚喜 LOGO -->
            <div class="hero-wrap">
                <div class="hero-brand">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/home/kv.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/home/kv.png" alt="驚喜製造 SURPRISE LAB">
                    </picture>
                </div>
                <a href="#home-exp" class="btn-scroll">
                    <img class="img-fluid" src="/SurpriseLabHome/assets/images/home/img_scroll.svg" alt="Scroll Down">
                </a>
            </div>

            <!-- 主視覺影片 -->
            <div class="hero-video">
                <div class="video-wrap">

                    <!-- Desktop -->
                    <video class="video video-h" muted defaultmuted autoplay loop playsinline>
                        <source src="/SurpriseLabHome/assets/video/hero.mov?240905">
                        <p>Your browser does not support the video tag.</p>
                    </video>

                    <!-- Mobile -->
                    <video class="video video-v" muted defaultmuted autoplay loop playsinline>
                        <source src="/SurpriseLabHome/assets/video/hero_mobile.mov?240905">
                        <p>Your browser does not support the video tag.</p>
                    </video>
                </div>
            </div>
        </section>

        <section id="home-exp" class="home-exp full-page" data-aos="fade">
            <div class="container-xl">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="surpri-title brackets-regular layout-center style-dark">
                            <div class="title-wrap">
                                <h2 class="title-en">Experience</h2>
                                <h5 class="title-ch">體感經驗</h5>
                            </div>
                        </div>
                        <div class="surpri-content">
                            <div class="exp-animate">
                                <span>We create</span>
                                <img src="/SurpriseLabHome/assets/images/home/img_exper-1.gif" alt="Happiness">
                                <span>through</span>
                                <img src="/SurpriseLabHome/assets/images/home/img_exper-2.gif" alt="Experience">
                                <span>for</span>
                                <img src="/SurpriseLabHome/assets/images/home/img_exper-3.gif" alt="You">
                            </div>
                            <div class="exp-tagline">
                                Good luck, have fun, <br class="only-mobile"/>and enjoy your surprise.
                            </div>
                            <div class="exp-cta">
                                <a href="team.html" class="surpri-btn size-regular color-regular arrow-right">認識團隊</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="home-ticket" class="home-ticket full-page" data-aos="fade">
            <div class="container-xl">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-12">
                        <div class="surpri-title brackets-regular layout-center style-dark">
                            <div class="title-wrap">
                                <h2 class="title-en">ON-GOING</h2>
                                <h5 class="title-ch">近期體驗</h5>
                            </div>
                        </div>
                        <div class="surpri-content">
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                    <div class="ticket-card">

                                        <!-- 體驗介紹 -->
                                        <div class="ticket-intro">
                                            <header class="ticket-header">
                                                <span class="subtitle">
                                                    Dining In The Dark Season 3
                                                </span>
                                                <h3 class="title">無光晚餐第三季</h3>
                                                <p class="desc">
                                                    無數參與者敲碗<br/>
                                                    經典作品再次回歸
                                                </p>
                                            </header>

                                            <!-- 體驗 CTA -->
                                            <div class="ticket-cta">
                                                <a href="https://www.surpriselab.com.tw/dininginthedark3/index.html?utm_source=sl&utm_medium=web" class="surpri-btn size-regular color-regular arrow-right">前往預約</a>
                                            </div>
                                        </div>
                                        <div class="ticket-card-inner">

                                            <!-- 體驗介紹 (Mobile Only) -->
                                            <div class="ticket-info">
                                                <span class="subtitle">
                                                    Dining In The Dark Season 3
                                                </span>
                                                <h3 class="title">無光晚餐第三季</h3>
                                            </div>

                                            <!-- 體驗縮圖 -->
                                            <a href="https://www.surpriselab.com.tw/dininginthedark3/index.html?utm_source=sl&utm_medium=web" class="ticket-img" target="_blank">
                                                <picture>
                                                    <!-- <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark3/img_banner.webp" type="image/webp"> -->
                                                    <img src="/SurpriseLabHome/assets/images/project/dininginthedark3/img_banner2.png" alt="無光晚餐第三季">
                                                </picture>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="ticket-card">

                                        <!-- 體驗介紹 -->
                                        <div class="ticket-intro">
                                            <header class="ticket-header">
                                                <span class="subtitle">
                                                    Mind The Gap
                                                </span>
                                                <h3 class="title">落日月台</h3>
                                                <p class="desc">
                                                    多場域沉浸Ｘ全感官體驗<br/>
                                                    前往窺探屬於你的終點
                                                </p>
                                            </header>

                                            <!-- 體驗 CTA -->
                                            <div class="ticket-cta">
                                                <a href="https://bit.ly/3PXnNjP" class="surpri-btn size-regular color-regular arrow-right">前往預約</a>
                                            </div>
                                        </div>
                                        <div class="ticket-card-inner">

                                            <!-- 體驗介紹 (Mobile Only) -->
                                            <div class="ticket-info">
                                                <span class="subtitle">
                                                    Mind The Gap
                                                </span>
                                                <h3 class="title">落日月台</h3>
                                            </div>

                                            <!-- 體驗縮圖 -->
                                            <a href="https://bit.ly/3PXnNjP" class="ticket-img" target="_blank">
                                                <picture>
                                                    <source srcset="/SurpriseLabHome/assets/images/project/mind_the_gap/img_banner.webp" type="image/webp">
                                                    <img src="/SurpriseLabHome/assets/images/project/mind_the_gap/img_banner.jpg" alt="落日月台">
                                                </picture>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 控制項 -->
                            <div class="custom-carousel-control">
                                <div class="slide-page">
                                    <span class="js-current-page current">01</span>
                                    /
                                    <span class="js-total-page">02</span>
                                </div>
                                <div class="slide-nav">
                                    <div class="slide-progress">
                                        <div class="bar"></div>
                                    </div>
                                    <button class="js-carousel-prev"><i class="icon-arrow-slides-left"></i></button>
                                    <button class="js-carousel-next"><i class="icon-arrow-slides-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="home-form" class="home-form full-page" data-aos="fade">
            <div class="container-xl">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="surpri-title brackets-regular layout-center style-dark">
                            <div class="title-wrap">
                                <h2 class="title-en">Wishing Pond</h2>
                                <h5 class="title-ch">許願池</h5>
                            </div>
                        </div>

                        <div class="surpri-content">
                            <p>
                                許願一個驚喜，你會想許什麼？<br/><br/>
                                寫下來讓我們知道 ──<br/>
                                畢竟，驚喜藏於一切皆有可能的未來裡
                            </p>

                            <!-- 正常狀態 Textarea -->
                            <form class="wishing-form">
                                <div class="form-group">
                                    <textarea class="surpri-textarea" name="wishing" id="wishing-textarea" placeholder="小而具體的願望、大而浪漫的想法&#10;只要腦中畫面讓你迫不及待，就許願吧！&#10;&#10;當然也歡迎你起身、身體力行創造你的驚喜。"></textarea>
                                </div>
                                
                                <!-- 送出按鈕 (已判斷 textarea 非空值才能點擊) -->
                                <a href="javascript://" class="surpri-btn size-regular color-regular disabled" id="wishing-btn" data-bs-toggle data-bs-target disabled>送出願望</a>
                            </form>

                            <!-- 已許願 Textarea -->
                            <!-- <form class="wishing-form">
                                <div class="form-group">
                                    <textarea class="surpri-textarea disabled" name="wishing" id="wishing-textarea" placeholder="今年的你已經許過願望囉！&#10;如果驚喜尚未出現，歡迎直接起身製造驚喜吧。" disabled></textarea>
                                </div>
                                
                                <a href="javascript://" class="surpri-btn size-regular color-regular disabled" id="wishing-btn" data-bs-toggle data-bs-target disabled>送出願望</a>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="home-cta" class="home-cta" data-aos="fade">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <!-- Desktop Only -->
                        <div class="cta-desktop">
                            <a href="project.html" class="surpri-btn size-large color-orange">觀看所有計畫</a>
                            <a href="ticket.html" class="surpri-btn size-large color-orange">參與最新計畫</a>
                        </div>

                        <!-- Mobile Only -->
                        <div class="cta-mobile">
                            <a href="project.html" class="surpri-btn size-regular color-orange">所有計畫</a>
                            <a href="ticket.html" class="surpri-btn size-regular color-orange">最新計畫</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal - Notice -->
        @include('SurpriseLabHome._noticeModal')

        <!-- Modal - Success -->
        <div class="surpri-modal success-modal-wrap modal fade" id="SuccessModal" tabindex="-1" aria-labelledby="SuccessModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-image-wrap">
                            <img src="/SurpriseLabHome/assets/images/general/img_success.png" alt="success">
                        </div>
                        <h6 class="modal-sub-title">願望已送達</h6>
                        <p class="body-03">
                            請真心相信它有天能夠實現！<br/>
                            驚喜製造可以是你、是我、是我們。
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a href="/tw/index.html" class="surpri-btn size-regular color-orange"  data-bs-dismiss="modal" aria-label="Close">回到首頁</a>
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

    <!-- Owl Carousel JS -->
    <script src="/SurpriseLabHome/resources/js/plugins/owlcarousel2-2.3.4/owl.carousel.min.js"></script>

    <!-- AOS -->
    <script src="/SurpriseLabHome/resources/js/plugins/aos-2.0.0/aos.js"></script>

    <!-- Loading Animation JS -->
    <script src="/SurpriseLabHome/resources/js/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>
    
    <!-- Custom -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>
    <script src="/SurpriseLabHome/resources/js/main.js"></script>
    <script src="/SurpriseLabHome/resources/js/preload.js"></script>
    <script src="/SurpriseLabHome/resources/js/index.js"></script>
@endsection