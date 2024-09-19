@extends('SurpriseLabHome._layout.master')
@section('meta')
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="只要機率不是零，一切都有可能。">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="明日俱樂部 CLUB Tomorrow｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:site_name" content="明日俱樂部 CLUB Tomorrow｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:description" content="只要機率不是零，一切都有可能。"/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/project/clubtomorrow/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="明日俱樂部 CLUB Tomorrow｜驚喜製造 SURPRISE LAB">
    <meta name="twitter:description" content="只要機率不是零，一切都有可能。">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/project/clubtomorrow/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('style')
    <title>明日俱樂部 CLUB Tomorrow｜驚喜製造 SURPRISE LAB</title>

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
    <main class="background-fixed" data-banner="url('/SurpriseLabHome/assets/images/project/clubtomorrow/img_banner.jpg')">

        <!-- *5-1 Hero -->
        <section class="project-hero-section js-fixed-btn-target js-hero-banner">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="project-hero-wrap" data-aos="fade">
                            <div class="hero-text-wrap">
                                <h1 class="hero-title">明日俱樂部</h1>
                                <div class="hero-subtitle">CLUB Tomorrow</div>
                                <p class="hero-des">只要機率不是零，一切都有可能</p>
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
                                    所有微小的時刻都是關鍵<br><br>
                                    所謂的明天<br>
                                    一直都是所有人的明天
                                </div>
                            </div>

                            <!-- accordion -->
                            <div class="surpri-accordion-wrap">
                                <div class="accordion-content-wrap">
                                    <div class="content-upper">
                                        <p><span class="highlight">「你，想要什麼樣的明天？」——</span> 2019 年的台灣與香港，將這個問題丟向我們眼前。而《明日俱樂部》的出現，其實與整個時代和社會緊密相關。</p>
                                        <p>人們因為不同的立場而分裂，為了捍衛信仰的價值而對抗。那麼，最後的最後，關乎所有人的結局會是什麼？<span class="highlight">當我們想要的明天不盡相同，如何沒有輸贏？如何不再分裂？</span></p>
                                    </div>
                                    <div class="js-content-lower content-lower">
                                        <p>為了承載想談的議題，並避免體驗過於強烈與直接，《明日俱樂部》的世界觀設定為「一場遊戲」。進入遊戲的玩家，需在 120 分鐘內，<span class="highlight">於嚴重分裂的世界中，找出讓所有人共同前往明日的可能</span>。</p>
                                        <p>《明日俱樂部》世界觀下有著五大陣營，分別擁護著<span class="highlight">團結、自由、正義、生存、反抗</span>五種價值。各陣營都背負著截然不同的目標、各個陣營都想成為贏家。</p>
                                        <p>在權力面前，你會同意消除異己嗎？為了生存下去，你會向夥伴開槍嗎？<span class="highlight">每個人的決定，都將影響所有人的結局。</span>
                                        </p>
                                        <p><span class="highlight">一個世界、五大陣營、五十九位玩家，與你。</span>在混亂的世界中，你們將迎接怎樣的明天？</p>
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

        <!-- 5-3 video -->
        <section class="surpri-section project-video-section">
            <div class="container-xl">
                <div class="row">
                    <div class="offset-xl-2 col-xl-8 col-12">
                        <div class="js-video-wrap surpri-video-wrap" data-aos="fade">
                            <div class="video-cover-wrap">
                                <div class="video-play-btn"></div>
                                <div class="video-image-wrap">
                                    <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_thumbnails-video.jpg" alt="video">
                                </div>
                            </div>
                            <div class="video-back-wrap">
                                <iframe width="560" height="315" data-src="https://www.youtube.com/embed/AgIMmTDYGsQ?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- *5-4 photo -->
        <section class="surpri-section project-photo-section">
            <div class="js-photo-gallery project-photo-wrap" data-aos="fade">
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-01.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-01.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-01.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-02.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-02.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-02.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-03.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-03.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-03.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-04.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-04.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-04.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-05.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-05.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-05.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-06.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-06.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-06.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-07.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-07.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-07.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-08.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-08.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-08.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-09.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-09.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-09.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-10.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-10.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-10.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-11.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-11.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-11.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-12.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-12.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_pic-12.jpg" alt="clubtomorrow">
                    </picture>
                </a>
            </div>
        </section>

        <!-- *5-5 review -->
        <section class="surpri-section project-review-section">
            <div class="project-review-wrap" data-aos="fade">
                <div class="project-review-upper-wrap">
                    <div class="surpri-title brackets-regular layout-left style-dark">
                        <div class="title-wrap">
                            <h2 class="title-en">REVIEW</h2>
                            <h5 class="title-ch">觀眾評價</h5>
                        </div>
                    </div>
                </div>
                <div class="project-review-middle-wrap">
                    <div class="review-card-wrap js-review-card owl-carousel owl-theme">
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">玩家</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">我與妹妹面前出現一把槍，在那當下，我們只想著要槍斃自己讓對方存活。</div>
                            </div>
                        </div>
    
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">玩家</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">跟朋友進到不同組，看到朋友變成敵人時，內心真的很複雜。</div>
                            </div>
                        </div>
    
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">玩家</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">這遊戲和社會有著驚人關聯，是場人性實驗，也是真實世界的縮影。</div>
                            </div>
                        </div>
    
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">玩家</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">我們的所作所為決定這世界的樣子，沒有人可以置身事外！</div>
                            </div>
                        </div>
    
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">玩家</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">喜歡所有人都能改變結局的設定。</div>
                            </div>
                        </div>

                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">玩家</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">這是我第一次嘗試沈浸式，完全被震撼！</div>
                            </div>
                        </div>

                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">玩家</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">很喜歡這種類似電影情節，又身入其境的體驗。</div>
                            </div>
                        </div>
    
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">玩家</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">原本是保持著好玩的心情前來，結束之後完全愛上這種型態的體驗。</div>
                            </div>
                        </div>

                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">玩家</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">演員們演出專業、場景佈置精細，跟不同的人來會有不同的碰撞，真的很有趣。</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-review-lower-wrap">
                    <div class="project-review-lower-inner-wrap">
                        <a href="#" class="surpri-btn size-regular color-regular" data-bs-toggle="modal" data-bs-target="#VideoModal">查看觀眾影片</a>
                    </div>

                    <!-- custom owl carousel nav -->
                    <div class="custom-carousel-control">
                        <div class="slide-nav">
                            <button class="js-carousel-prev"><i class="icon-arrow-slides-left"></i></button>
                            <button class="js-carousel-next"><i class="icon-arrow-slides-right"></i></button>
                        </div>
                    </div>
                </div>
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
                                    <span class="circle-title">400 坪</span>
                                    <span class="circle-des">自建場館</span>
                                </div>
                                <div class="circle-item">
                                    <span class="circle-title">128 種</span>
                                    <span class="circle-des">世界的結局</span>
                                </div>
                                <div class="circle-item">
                                    <span class="circle-title">3 大</span>
                                    <span class="circle-des">表演類型</span>
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
                                                    <div class="info-title">自建場館</div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">為了創造一個世界，我們租一整個下場地，從頭打造空間。</div>
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
                                                    <div class="info-title">網站設計</div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">配合整體故事設計，在明日俱樂部的網站中，也暗藏與表面資訊截然不同的隱藏訊息，讓參與者於體驗前，就建構對於另一個世界的不同想像。</div>
                                                    <a href="https://www.surpriselab.com.tw/clubtomorrow/" target="_blank" class="surpri-link">查看網站 →</a>
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
                                                    <div class="info-title">演員彩排</div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">許多大大小小的動線配合、時間安排，都是在一次次的彩排中，不斷調整至最完美的狀態。</div>
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
                                                    <div class="info-title">家徽設計手稿</div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">五大陣營各自鮮明的立場與理念，也反映在象徵性的陣營家徽之中。</div>
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
                                                    <div class="info-title">廚房出餐筆記</div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">廚房大概是整個場地唯一保持光亮的地方，而牆上也總是貼滿五大陣營不同的小點、酒水相關筆記。</div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 06 -->
                                        <div class="carousel-item">
                                            <div class="carousel-caption">
                                                <div class="info-upper-wrap">
                                                    <div class="info-page">
                                                        <span class="current-page"></span>
                                                        <span class="total-page"></span>
                                                    </div>
                                                    <div class="info-title">炭筆畫布</div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">
                                                        畫布上的訊息，都是玩家用炭筆留下的。當裡面的世界與外面的世界有了連結，很有趣地可以推斷出先後順序。
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 07 -->
                                        <div class="carousel-item">
                                            <div class="carousel-caption">
                                                <div class="info-upper-wrap">
                                                    <div class="info-page">
                                                        <span class="current-page"></span>
                                                        <span class="total-page"></span>
                                                    </div>
                                                    <div class="info-title">今日尚未結束</div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">
                                                        在大戰之後，最接近真相的六位玩家，會在當天的 23 點 59 分送出一則簡訊給同場的其他玩家們。
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 08 -->
                                        <div class="carousel-item">
                                            <div class="carousel-caption">
                                                <div class="info-upper-wrap">
                                                    <div class="info-page">
                                                        <span class="current-page"></span>
                                                        <span class="total-page"></span>
                                                    </div>
                                                    <div class="info-title">控台</div>
                                                </div>
                                                <div class="info-lower-wrap">
                                                    <div class="info-des">這裡控制整場演出的各種 cue 點，如音樂、燈光、影像等等。而團隊也常常躲在這，偷偷觀察參與者的反應。</div>
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
                                            <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-01.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_note-01.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-02.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_note-02.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-03.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_note-03.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-04.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_note-04.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-05.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_note-05.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-06.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_note-06.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-07.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_note-07.jpg" alt="note">
                                        </picture>
                                    </div>
                                    <div class="carousel-item">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-08.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_note-08.jpg" alt="note">
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
                                <span class="pc-style">所有計劃的背後<br>都有一個團隊存在</span>
                                <span class="mobile-style">所有計劃的背後<br>都有一個團隊存在</span>
                            </h6>

                            <div class="credit-list-wrap">
                                <div class="credit-list-title-wrap">
                                    <span class="credit-list-title">總策劃</span>
                                </div>
                                <ul class="credit-list">
                                    <li class="credit-item">驚喜製造 Surprise Lab.</li>
                                    <li class="credit-item">進港浪製作 KingKong Wave</li>
                                </ul>
                            </div>

                            <a href="#" class="surpri-btn size-regular color-regular" data-bs-toggle="modal" data-bs-target="#TeamMemberModal">完整查看</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5-9 special -->
        <section class="surpri-section project-special-section">
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
                                    <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_partner_mobile.webp" type="image/webp" media="(max-width: 1199.98px)">
                                    <source srcset="/SurpriseLabHome/assets/images/project/clubtomorrow/img_partner_mobile.png" media="(max-width: 1199.98px)">
                                    <!-- pc -->
                                    <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_partner.webp" type="image/webp">
                                    <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_partner.png" alt="partner">
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
                                <a href="/tw/project.html" class="surpri-btn size-regular color-regular arrow-left">了解過往計畫</a>
                            </div>
                            <div class="cta-item">
                                <a href="/tw/ticket.html" class="surpri-btn size-regular color-regular arrow-right">參與最新計畫</a>
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
                                <div class="table-th">策劃統籌</div>
                                <div class="table-td">驚喜製造 Surprise Lab.</div>
                            
                                <div class="table-th">藝術統籌</div>
                                <div class="table-td">進港浪製作 King Kong Wave</div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">製作人</div>
                                <div class="table-td">陳心龍</div>

                                <div class="table-th">執行製作人</div>
                                <div class="table-td">林業軒、吳允方</div>
                            
                                <div class="table-th">體驗統籌</div>
                                <div class="table-td">洪唯堯</div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">導演</div>
                                <div class="table-td">洪唯堯</div>
                            
                                <div class="table-th">助理導演</div>
                                <div class="table-td">許瀚中、趙子愉</div>
                            
                                <div class="table-th">劇本</div>
                                <div class="table-td">洪唯堯、李憶銖</div>
                            
                                <div class="table-th">演員</div>
                                <div class="table-td">
                                    王夢琦、李至元、林寶寶、邱子瑋<br>
                                    邱柏翔、張汶皓、張念誠、康雅婷<br>
                                    黃上嘉、黃思瑋、賀湘儀、楊智淳<br>
                                    鄔曉萱、鮑奕安
                                </div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">舞台監督</div>
                                <div class="table-td">孫唯真</div>

                                <div class="table-th">執行舞監</div>
                                <div class="table-td">黃詠渝</div>
                            
                                <div class="table-th">現場營運總監</div>
                                <div class="table-td">蔡佩倫、鄭淇文</div>

                                <div class="table-th">餐飲執行</div>
                                <div class="table-td">劉祐安、陳麗安</div>
                            
                                <div class="table-th">現場執行</div>
                                <div class="table-td">
                                    王昭榮、李昀蓉、李鎮宇、林郁恩<br>
                                    邱靖雅、姜　戎、涂瑞珊、莊艾渝<br>
                                    莊凱喻、鄭欹予、盧冠穎、羅令珆<br>
                                    羅宇辰、蕭世祐
                                </div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">行銷統籌</div>
                                <div class="table-td">驚喜製造 Surprise Lab.</div>

                                <div class="table-th">行銷策略</div>
                                <div class="table-td">吳允方</div>
                            
                                <div class="table-th">媒體公關</div>
                                <div class="table-td">鄒琪</div>

                                <div class="table-th">社群企劃</div>
                                <div class="table-td">黃馨儀</div>
                            
                                <div class="table-th">票務統籌</div>
                                <div class="table-td">黃詠渝</div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">舞台設計</div>
                                <div class="table-td">郭家伶</div>

                                <div class="table-th">舞台設計助理</div>
                                <div class="table-td">曾玟琦</div>
                            
                                <div class="table-th">接待空間設計</div>
                                <div class="table-td">江妍瑩</div>

                                <div class="table-th">接待空間執行</div>
                                <div class="table-td">楊嘉璿</div>

                                <div class="table-th">接待空間合作藝術家</div>
                                <div class="table-td">Zoie Lam ＠zlism</div>
                            
                                <div class="table-th">空間設計整合暨工程規劃</div>
                                <div class="table-td">工二建築設計事務所</div>

                                <div class="table-th">燈光設計</div>
                                <div class="table-td">林楷豐</div>

                                <div class="table-th">燈光設計助理</div>
                                <div class="table-td">黃彥勳</div>
                            
                                <div class="table-th">燈光技術統籌</div>
                                <div class="table-td">黃彥勳</div>

                                <div class="table-th">影像設計</div>
                                <div class="table-td">李國漢</div>

                                <div class="table-th">影像技術統籌</div>
                                <div class="table-td">李祐緯</div>
                            
                                <div class="table-th">影像技術助理</div>
                                <div class="table-td">邱靖雅</div>

                                <div class="table-th">特效製作</div>
                                <div class="table-td">李宜璟、高翊鈞、涂瑞珊</div>
                            
                                <div class="table-th">影像執行</div>
                                <div class="table-td">邱靖雅、涂瑞珊、林郁恩、羅宇辰、郭蕙瑜</div>

                                <div class="table-th">音樂設計</div>
                                <div class="table-td">曾韻方</div>

                                <div class="table-th">音響技術統籌</div>
                                <div class="table-td">陳宇謙</div>
                            
                                <div class="table-th">音響設計助理</div>
                                <div class="table-td">邵柯翰</div>

                                <div class="table-th">服裝設計</div>
                                <div class="table-td">張靖盈、郭于鏜、李冠瑱、陳明澤</div>

                                <div class="table-th">服裝設計助理</div>
                                <div class="table-td">李宏竣</div>
                            
                                <div class="table-th">時裝品牌</div>
                                <div class="table-td">INF Concept Store</div>

                                <div class="table-th">裁縫師</div>
                                <div class="table-td">熊玉春、劉亭憶、Anita 玉、喬祥工作室</div>

                                <div class="table-th">製偶師</div>
                                <div class="table-td">王筱筠</div>
                            
                                <div class="table-th">動作指導</div>
                                <div class="table-td">周寬柔</div>

                                <div class="table-th">進場裝置設計</div>
                                <div class="table-td">丁浩祖</div>

                                <div class="table-th">食物設計</div>
                                <div class="table-td">鄭淇文、劉祐安、陳麗安</div>
                            
                                <div class="table-th">調飲設計</div>
                                <div class="table-td">蔡佩倫、蕭世祐、王昭榮、莊艾渝、姜戎</div>

                                <div class="table-th">主視覺設計</div>
                                <div class="table-td">馮議徹、張巧怡</div>

                                <div class="table-th">網站統籌</div>
                                <div class="table-td">黃詠渝</div>
                            
                                <div class="table-th">網站設計</div>
                                <div class="table-td">曝鹿設計 Deerlight Design、Tuesday Design、Randy</div>

                                <div class="table-th">平面設計</div>
                                <div class="table-td">葉佳欣、江妍瑩</div>
                            
                                <div class="table-th">製作物設計</div>
                                <div class="table-td">葉佳欣、江妍瑩</div>

                                <div class="table-th">平面攝影</div>
                                <div class="table-td">潘怡帆 Crystal Pan</div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">裝台工作人員</div>
                                <div class="table-td">
                                    邱靖雅、陳昱澍、曾擇弘、鄭慶宏<br>
                                    邵柯翰、郭修維、趙鈺涵、王欣雅<br>
                                    張智凱、葉思菡、吳亮萱、黃慶揚<br>
                                    許之卉、李銘元、李婕綺
                                </div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">很特別感謝</div>
                                <div class="table-td">貝殼放大、天使放大</div>

                                <div class="table-th">特別感謝</div>
                                <div class="table-td">臺灣湯淺、Home Hotel、Q、僻室House Peace、蔡傳仁、夾角拖劇團、廓仔制造、李振斌、楊凱鈞、黃詠心、柏斯</div>
                            </div>
                        </div>

                        <div class="special-group">
                            <div class="special-title">
                                Everyone’s<br>
                                An <span class="special-highlight special-line-through">Surprise Lab.</span> Project<br>
                            </div>
                            <div class="special-des">
                                <span class="pc-style">感謝所有參與的創作者、設計師、玩家們、各種夥伴<br></span>
                                <span class="mobile-style">感謝所有參與的創作者、設計師、<br>玩家們、各種夥伴<br></span>
                                <span class="special-highlight">因為你們，明日得以存在</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- 5-5a. Modal - Review Video -->
        <div class="surpri-full-modal video-modal-wrap js-video-modal modal fade" id="VideoModal" tabindex="-1" aria-labelledby="VideoModalModalLabel" aria-hidden="true">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="js-video-wrap surpri-video-wrap">
                            <div class="video-cover-wrap">
                                <div class="video-play-btn"></div>
                                <div class="video-image-wrap">
                                    <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_thumbnails-review.jpg" alt="video">
                                </div>
                            </div>
                            <div class="video-back-wrap">
                                <iframe width="560" height="315" data-src="https://www.youtube.com/embed/videoseries?list=PL_XNZCnBb9xH9W0Cy6-XcP5AmaQLYi6PL&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
