@extends('SurpriseLabHome._layout.master')
@section('meta')
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="It’s Fun Dining. Let’s have some fun in the dark.">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="無光晚餐 Dining In The Dark｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:site_name" content="無光晚餐 Dining In The Dark｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:description" content="It’s Fun Dining. Let’s have some fun in the dark."/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/project/dininginthedark/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="無光晚餐 Dining In The Dark｜驚喜製造 SURPRISE LAB">
    <meta name="twitter:description" content="It’s Fun Dining. Let’s have some fun in the dark.">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/project/dininginthedark/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('style')
    <title>無光晚餐 Dining In The Dark｜驚喜製造 SURPRISE LAB</title>

    <!-- Style -->
    <link rel="icon" href="/SurpriseLabHome/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/bootstrap-5.1.3/bootstrap.min.css"/>

    <!-- Loading Style -->
    <link rel="stylesheet" type="text/css" href="/SurpriseLabHome/resources/css/plugins/imagesloaded/loading.css"/>

    <!-- Simple Lightbox -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/simple-lightbox/simple-lightbox.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/owlcarousel2-2.3.4/owl.carousel.min.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/owlcarousel2-2.3.4/owl.theme.default.min.css">

    <!-- AOS -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/aos-2.0.0/aos.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/icomoon/style.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/style.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/introduction.css?20240710">
@endsection
@section('main')
    <main class="background-fixed" data-banner="url('/SurpriseLabHome/assets/images/project/dininginthedark/img_banner.jpg')">

        <!-- *5-1 Hero -->
        <section class="project-hero-section js-fixed-btn-target js-hero-banner">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="project-hero-wrap" data-aos="fade">
                            <div class="hero-text-wrap">
                                <h1 class="hero-title">無光晚餐第一季</h1>
                                <div class="hero-subtitle">Dining In The Dark Season 1</div>
                                <p class="hero-des">平常吃飯那套，在這全不適用</p>
                            </div>
                            <a href="#project-intro" class="surpri-scroll-down">SCROLL<span class="scroll-down-line"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- *5-2 intro -->
        <section id="project-intro" class="surpri-section project-intro-section">
            <div class="container-xl">
                <div class="row">
                    <div class="offset-xl-4 col-xl-4 col-12">
                        <div class="project-intro-wrap" data-aos="fade">
                            <div class="surpri-title brackets-other style-other">
                                <div class="title-wrap">
                                    Let’s have some<br>
                                    Fun Dining.
                                </div>
                            </div>

                            <!-- accordion -->
                            <div class="surpri-accordion-wrap">
                                <div class="accordion-content-wrap">
                                    <div class="content-upper">
                                        <p>考慮到台灣人喜愛「吃」的特性，<span class="highlight">驚喜製造推出的第一個作品，選擇從餐飲角度切入</span>。畢竟人每天都要吃喝拉撒睡，將體驗的概念融入生活，也能讓2016 年仍不熟悉「體驗」為何的人們，對此有較高的接受度。</p>
                                    </div>
                                    <div class="js-content-lower content-lower">
                                        <p><span class="highlight">生活中百分之七十的資訊透過視覺接收</span>，人類的大腦，是個視覺獨霸的運作機制。如果將視覺暫時關閉，我們又會怎麼使用其他感官，感受身旁的事物與世界呢？<span class="highlight">在無法眼見為憑的狀況下，你真的熟悉自己的其他感官嗎？</span></p>
                                        <p>當時，驚喜製造曾針對參與者於黑暗中辨別食材的能力做了一個統計。出乎意料地，參與者在黑暗中所猜測的食材，與實際上的食材落差不小，最經典的例子莫過於—— <span class="highlight">70% 的客人，把奇異果認成芭樂；50% 的客人，把南瓜吃成地瓜</span>。</p>
                                        <p>《無光晚餐》的菜單以驅動味覺、驅動嗅覺、驅動觸覺為設計重點，採記憶、觸感、氣味、五味、食材、冷熱六大概念為題，並<span class="highlight">設下了不提前公布食材、事後說明菜色的規則</span>，期待參與者憑著僅有的感官，透過口感、紋理、氣味、溫度，猜測每道料理的內容，並以黑暗對話作結，期待<span class="highlight">帶給大家全然不同的進食體驗，重新感受藏於生活中的微小細節</span>。</p>
                                    </div>
                                </div>
                                <div class="js-accordion-control accordion-control-wrap">
                                    <div class="accordion-control-item open-style active" data-action="open">
                                        <sapn class="control-item-title">展開完整介紹</sapn>
                                    </div>
                                    <div class="accordion-control-item closed-style" data-action="closed">
                                        <sapn class="control-item-title">收起完整介紹</sapn>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- *5-4 photo -->
        <section class="surpri-section project-photo-section">
            <div class="js-photo-gallery project-photo-wrap" data-aos="fade">
                <a href="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-01.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-01.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-01.jpg" alt="dininginthedark">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-02.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-02.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-02.jpg" alt="dininginthedark">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-03.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-03.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-03.jpg" alt="dininginthedark">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-04.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-04.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-04.jpg" alt="dininginthedark">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-05.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-05.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-05.jpg" alt="dininginthedark">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-06.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-06.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-06.jpg" alt="dininginthedark">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-07.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-07.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-07.jpg" alt="dininginthedark">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-08.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-08.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/dininginthedark/img_pic-08.jpg" alt="dininginthedark">
                    </picture>
                </a>
            </div>
        </section>

        <!-- 5-6 highlight -->
        <section class="surpri-section project-highlight-section">
            <div class="container-xl">
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 col-12">
                        <div class="project-highlight-wrap" data-aos="fade">
                            <div class="surpri-title brackets-regular layout-center style-dark">
                                <div class="title-wrap">
                                    <h2 class="title-en">​​HIGHLIGHT</h2>
                                    <h5 class="title-ch">全新突破</h5>
                                </div>
                            </div>

                            <div class="highlight-circle-wrap">
                                <div class="circle-item">
                                    <span class="circle-title">95%</span>
                                    <span class="circle-des">線上預付</span>
                                </div>
                                <div class="circle-item">
                                    <span class="circle-title">6,100人</span>
                                    <span class="circle-des">參與體驗</span>
                                </div>
                                <div class="circle-item">
                                    <span class="circle-title">6個月</span>
                                    <span class="circle-des">快閃體驗</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- *5-7 note -->
        <section class="surpri-section project-note-section">
            <div class="container-xl">
                <div class="row">
                    <div class="offset-xl-1 col-xl-10 col-12">
                        <div class="project-note-wrap" data-aos="fade">
                            <div class="surpri-title brackets-regular layout-center style-dark">
                                <div class="title-wrap">
                                    <h2 class="title-en">PROJECT NOTE</h2>
                                    <h5 class="title-ch">製作筆記</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-xl-1 col-xl-3 col-12 order-xl-1 order-2">
                        <div class="carousel-left-wrap" data-aos="fade">
                            <!-- Carousel 1: info, control -->
                            <div id="carouselINote-info" class="carousel slide carousel-left-inner-wrap" data-bs-interval="false">
                                <div class="carousel-left-upper-wrap">
                                    <!-- Carousel 1: item -->
                                    <div class="carousel-inner">

                                        <!-- 01 -->
                                        <div class="carousel-item active">
                                            <div class="carousel-caption">
                                                <div class="info-upper-wrap">
                                                    <div class="info-page">
                                                        <span class="current-page"></span>
                                                        <span class="total-page"></span>
                                                    </div>
                                                    <div class="info-title"></div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">無光晚餐到底有多黑？<br/><br/>就是這麼黑。</div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 02 -->
                                        <div class="carousel-item">
                                            <div class="carousel-caption">
                                                <div class="info-upper-wrap">
                                                    <div class="info-page">
                                                        <span class="current-page"></span>
                                                        <span class="total-page"></span>
                                                    </div>
                                                    <div class="info-title"></div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">在黑暗之中，要怎麼上菜呢？<br/><br/>答案是：戴上夜視鏡。</div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 03 -->
                                        <div class="carousel-item">
                                            <div class="carousel-caption">
                                                <div class="info-upper-wrap">
                                                    <div class="info-page">
                                                        <span class="current-page"></span>
                                                        <span class="total-page"></span>
                                                    </div>
                                                    <div class="info-title"></div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">有位客人陸續帶了四位不同女生到黑暗中約會。只聽聲音，應該是個很棒的約會體驗吧！</div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 04 -->
                                        <div class="carousel-item">
                                            <div class="carousel-caption">
                                                <div class="info-upper-wrap">
                                                    <div class="info-page">
                                                        <span class="current-page"></span>
                                                        <span class="total-page"></span>
                                                    </div>
                                                    <div class="info-title"></div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">無光晚餐啟動團隊，<br/>驚喜製造由此開始。</div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 05 -->
                                        <div class="carousel-item">
                                            <div class="carousel-caption">
                                                <div class="info-upper-wrap">
                                                    <div class="info-page">
                                                        <span class="current-page"></span>
                                                        <span class="total-page"></span>
                                                    </div>
                                                    <div class="info-title"></div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">此照片攝於 2016 年無光晚餐第一季結束撤場時。</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Carousel 1: control -->
                                <div class="carousel-left-lower-wrap">
                                    <!-- custom prev btn -->
                                    <a id="js-carousel-manually-btn-prev" class="carousel-manually-btn-prev">
                                        <i class="icon-arrow-slides-left"></i>
                                    </a>

                                    <!-- custom next btn -->
                                    <a id="js-carousel-manually-btn-next" class="carousel-manually-btn-next">
                                        <i class="icon-arrow-slides-right"></i>
                                    </a>

                                    <!-- bootstrap prev btn: hide -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselINote-info" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>

                                    <!-- bootstrap next btn: hide -->
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselINote-info" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-12 order-xl-2 order-1">
                        <!-- Carousel 2: image -->
                        <div class="carousel-right-wrap" data-aos="fade">
                            <div id="carouselINote-image" class="carousel slide carousel-fade" data-bs-interval="false">
                                <!-- Carousel 2: item -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_note-01.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/dininginthedark/img_note-01.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_note-02.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/dininginthedark/img_note-02.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_note-03.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/dininginthedark/img_note-03.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_note-04.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/dininginthedark/img_note-04.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_note-05.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/dininginthedark/img_note-05.jpg" alt="note">
                                        </picture>
                                    </div>
                                </div>

                                <!-- Carousel 2: control -->
                                <div class="control-arrow-wrap">
                                    <!-- bootstrap prev btn: hide -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselINote-image" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>

                                    <!-- bootstrap next btn: hide -->
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselINote-image" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- *5-8 credit -->
        <section class="surpri-section project-credit-section">
            <div class="container-xl">
                <div class="row">
                    <div class="offset-xl-4 col-xl-4 col-12">
                        <div class="project-credit-wrap" data-aos="fade">
                            <div class="surpri-title brackets-regular layout-center style-dark">
                                <div class="title-wrap">
                                    <h2 class="title-en">CREDIT</h2>
                                    <h5 class="title-ch">製作團隊</h5>
                                </div>
                            </div>

                            <h6 class="credit-des">
                                <span class="pc-style">旅程的開端，都有群浪漫的傻蛋<br/>感謝與我們從零開始的所有人</span>
                                <span class="mobile-style">旅程的開端，都有群浪漫的傻蛋<br/>感謝與我們從零開始的所有人</span>
                            </h6>

                            <div class="credit-list-wrap">
                                <div class="credit-list-title-wrap">
                                    <span class="credit-list-title">總策劃</span>
                                </div>
                                <ul class="credit-list">
                                    <li class="credit-item">驚喜製造 Surprise Lab.</li>
                                </ul>
                            </div>

                            <div class="credit-list-wrap">
                                <div class="credit-list-title-wrap">
                                    <span class="credit-list-title">合作夥伴</span>
                                </div>
                                <ul class="credit-list">
                                    <li class="credit-item">台灣農畜</li>
                                    <li class="credit-item">樂活生技</li>
                                    <li class="credit-item">巧偶花藝</li>
                                    <li class="credit-item">Tagboard</li>
                                </ul>
                            </div>

                            <a href="#" class="surpri-btn size-regular color-regular" data-bs-toggle="modal" data-bs-target="#TeamMemberModal">完整查看</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5-9 special -->
        <section class="surpri-section project-special-section" style="display: none;">
            <div class="container-xl">
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 col-12">
                        <div class="project-special-wrap" data-aos="fade">
                            <div class="surpri-title brackets-regular layout-center style-dark">
                                <div class="title-wrap">
                                    <h2 class="title-en">SHOUT-OUT</h2>
                                    <h5 class="title-ch">特別感謝</h5>
                                </div>
                            </div>

                            <div class="special-image-wrap">
                                <picture>
                                    <!-- mobile -->
                                    <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_partner_mobile.webp" type="image/webp" media="(max-width: 1199.98px)">
                                    <source srcset="/SurpriseLabHome/assets/images/project/dininginthedark/img_partner_mobile.png" media="(max-width: 1199.98px)">
                                    <!-- pc -->
                                    <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_partner.webp" type="image/webp">
                                    <img src="/SurpriseLabHome/assets/images/project/dininginthedark/img_partner.png" alt="partner">
                                </picture>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- *5-10 CTA -->
        <section class="surpri-section project-cta-section">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="project-cta-wrap">
                            <div class="cta-item">
                                <a href="/project.html" class="surpri-btn size-regular color-regular arrow-left">了解過往計畫</a>
                            </div>
                            <div class="cta-item">
                                <a href="/ticket.html" class="surpri-btn size-regular color-regular arrow-right">參與最新計畫</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Modal - Notice -->
        @include('SurpriseLabHome._noticeModal')

        <!-- 5-8a. Modal - Team Member -->
        <div class="surpri-full-modal team-member-modal-wrap modal fade" id="TeamMemberModal" tabindex="-1" aria-labelledby="TeamMemberModalModalLabel" aria-hidden="true">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="surpri-title brackets-regular style-dark mobile-mini">
                            <div class="title-wrap">
                                <h2 class="title-en">CREDIT</h2>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="table-wrap">
                            <div class="table-group">
                                <div class="table-th">總策劃</div>
                                <div class="table-td">驚喜製造 Surprise Lab.</div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">合作夥伴</div>
                                <div class="table-td">台灣農畜、樂活生技、巧偶花藝、Tagboard</div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">特別感謝</div>
                                <div class="table-td">
                                    陳郁融、鍾孟如、蔡青霖、謝旻樺<br/>
                                    褚厲穎、David Lai<br/>
                                    Billy Cheung、Pefilia Chen
                                </div>
                            </div>
                        </div>
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

    <!-- Simple Lightbox -->
    <script src="/SurpriseLabHome/resources/js/plugins/simple-lightbox/simple-lightbox.jquery.min.js"></script>
    <script src="/SurpriseLabHome/resources/js/lightbox.js"></script>

    <!-- Loading Animation JS -->
    <script src="/SurpriseLabHome/resources/js/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="/SurpriseLabHome/resources/js/plugins/owlcarousel2-2.3.4/owl.carousel.min.js"></script>

    <!-- AOS -->
    <script src="/SurpriseLabHome/resources/js/plugins/aos-2.0.0/aos.js"></script>

    <!-- Custom -->
    <script src="/SurpriseLabHome/resources/js/main.js"></script>
    <script src="/SurpriseLabHome/resources/js/preload.js"></script>
    <script src="/SurpriseLabHome/resources/js/introduction.js"></script>
@endsection


    
