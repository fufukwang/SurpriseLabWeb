@extends('SurpriseLabHome._layout.master')
@section('meta')
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="沒有固定地點，行動決定一切。">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="BADASS ONLY 惹事工具箱｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:site_name" content="BADASS ONLY 惹事工具箱｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:description" content="沒有固定地點，行動決定一切。"/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/project/badassonly/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="BADASS ONLY 惹事工具箱｜驚喜製造 SURPRISE LAB">
    <meta name="twitter:description" content="沒有固定地點，行動決定一切。">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/project/badassonly/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('style')
    <title>BADASS ONLY 惹事工具箱｜驚喜製造 SURPRISE LAB</title>

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
    <main class="background-fixed" data-banner="url('/SurpriseLabHome/assets/images/project/badassonly/img_banner.jpg')">
        
        <!-- *5-1 Hero -->
        <section class="project-hero-section js-fixed-btn-target js-hero-banner">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="project-hero-wrap" data-aos="fade">
                            <div class="hero-text-wrap">
                                <h1 class="hero-title">BADASS ONLY 惹事工具箱</h1>
                                <div class="hero-subtitle">PROJECT S VOL.1</div>
                                <p class="hero-des">每個起身行動，都能造成改變</p>
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
                                    當人們在生活中有所行動，<br>
                                    城市的樣貌將如何改變？
                                </div>
                            </div>

                            <!-- accordion -->
                            <div class="surpri-accordion-wrap">
                                <div class="accordion-content-wrap">
                                    <div class="content-upper">
                                        <p>《BADASS ONLY 惹事工具箱》為 PROJECT S 系列之第一計畫。</p>
                                        <p>這是驚喜製造<span class="highlight">首度結合實體商品與線下活動</span>的作品。參與者將在接獲工具箱後分頭秘密執行任務，再上街與其他同夥協力惹事，一起為這座城市帶來意想不到的變化。</p>
                                    </div>
                                    <div class="js-content-lower content-lower">
                                        <p>PROJECT S 的任務等級由易而難，任務對象也將一步步向外推進， 參與者將短暫走出原本的生活模式，<span class="highlight">主動做出平常不會、不敢、不習慣的行動</span>，也將因此與生活周遭的人、事、物、乃至於整個城市產生交集。在 PROJECT S 中，<span class="highlight">每個人的體驗都由自己創造，每個人的經歷都將截然不同</span>。</p>
                                        <p>但，這場行動其實相當日常，<span class="highlight">過程中所使用的一切——紙條、文字、花、影片、麥克風——都是隨處可見、隨手可得的工具</span>，卻因不同的使用方式被賦予不同的意義。而參與者也在過程中改變了過往的習慣，開始<span class="highlight">以不一樣的眼光觀察城市</span>。在行動結束之後，共有 73% 的人，願意自己在生活中展開行動，即使沒有計畫再度號召。</p>
                                        <p>這次我們只有 1400 人，但當 1400 萬人都這樣生活著——<span class="highlight">整座城市，就會變成一座樂園；所有的人，都會變成驚喜製造</span>。</p>
                                        <p>行動，將持續發生。</p>
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
                                    <img src="/SurpriseLabHome/assets/images/project/badassonly/img_thumbnails-video.jpg" alt="video">
                                </div>
                            </div>
                            <div class="video-back-wrap">
                                <iframe width="560" height="315" data-src="https://www.youtube.com/embed/TdHZK3X86HI?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- *5-4 photo -->
        <section class="surpri-section project-photo-section">
            <div class="js-photo-gallery project-photo-wrap" data-aos="fade">
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-01.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-01.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-01.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-02.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-02.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-02.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-03.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-03.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-03.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-04.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-04.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-04.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-05.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-05.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-05.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-06.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-06.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-06.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-07.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-07.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-07.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-08.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-08.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-08.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-09.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-09.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-09.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-10.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-10.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-10.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-11.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-11.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-11.jpg" alt="badassonly">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/badassonly/img_pic-12.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_pic-12.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/badassonly/img_pic-12.jpg" alt="badassonly">
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

                        <!-- 01 -->
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">BADASS</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">好喜歡這次的行動宗旨，用如此可愛的方式幫城市加溫！以後也會繼續帶著 BADASS 的心在城市偶爾惹惹事的 😉</div>
                            </div>
                        </div>

                        <!-- 02 -->
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">BADASS</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">其中一個任務我寫了紙條貼在每天光顧的早餐店，一個禮拜過去了那張紙條還在，而且店家還特別用膠帶黏得更緊。</div>
                            </div>
                        </div>
    
                        <!-- 03 -->
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">BADASS</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">其實我本身就是個驚喜製造 😆😆😆</div>
                            </div>
                        </div>
    
                        <!-- 04 -->
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">BADASS</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">我非常非常喜歡這樣的活動。很謝謝組織讓我看到了，平常做的那些努力不是孤掌難鳴，在我看不到的某個角落，有著與我保持同樣信仰的人也在小小地改變。</div>
                            </div>
                        </div>

                        <!-- 05 -->
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">BADASS</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">覺得參加了一場看似平凡但足以撼動宇宙的行動！</div>
                            </div>
                        </div>

                        <!-- 06 -->
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">BADASS</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">很有趣、也很溫暖的體驗，明明是想傳遞感謝，卻有一種在做壞事的驚險感，讓我發現我們有多不習慣傳遞謝意給日常身邊的陌生人。</div>
                            </div>
                        </div>

                        <!-- 07 -->
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">BADASS</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">這次的行動雖然不是在做壞事，但行動前總是莫名的充滿緊張與興奮，並喚起體內的勇氣。</div>
                            </div>
                        </div>

                        <!-- 08 -->
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">BADASS</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">美好能夠切切實實的由我發生，真的覺得很幸福，像暫時逃離了世界一樣，像叛逆的小超人！</div>
                            </div>
                        </div>

                        <!-- 09 -->
                        <div class="review-card item">
                            <div class="review-card-upper-wrap">
                                <div class="card-number"></div>
                                <div class="card-author">BADASS</div>
                            </div>
                            <div class="review-card-lower-wrap">
                                <div class="card-comment">本來就是個不那麼勇敢的人，連在找給紙條的對象時都會想很多，但是因為成為了 BADASS，所以變得勇敢了！</div>
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
                                    <span class="circle-title">5 小時</span>
                                    <span class="circle-des">不間斷行動</span>
                                </div>
                                <div class="circle-item">
                                    <span class="circle-title">1400 人</span>
                                    <span class="circle-des">同步參與</span>
                                </div>
                                <div class="circle-item">
                                    <span class="circle-title">1 個月</span>
                                    <span class="circle-des">秘密任務</span>
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
                                <span class="pc-style">所有計劃的背後<br>都有一個團隊的存在</span>
                                <span class="mobile-style">所有計劃的背後<br>都有一個團隊的存在</span>
                            </h6>

                            <div class="credit-list-wrap">
                                <div class="credit-list-title-wrap">
                                    <span class="credit-list-title">總策劃</span>
                                </div>
                                <ul class="credit-list">
                                    <li class="credit-item">驚喜製造 Surprise Lab.</li>
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
                                    <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_partner_mobile.webp" type="image/webp" media="(max-width: 1199.98px)">
                                    <source srcset="/SurpriseLabHome/assets/images/project/badassonly/img_partner_mobile.png" media="(max-width: 1199.98px)">
                                    <!-- pc -->
                                    <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_partner.webp" type="image/webp">
                                    <img src="/SurpriseLabHome/assets/images/project/badassonly/img_partner.png" alt="partner">
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
                                <div class="table-th">惹事品飲夥伴</div>
                                <div class="table-td">格蘭傑 Glenmorangie 格蘭傑X</div>

                                <div class="table-th">惹事移動夥伴</div>
                                <div class="table-td">yoxi</div>

                                <div class="table-th">惹事鮮花供應</div>
                                <div class="table-td">ＣＩＡＯ！Flower Design 巧偶花藝‧設計</div>
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
                                    <img src="/SurpriseLabHome/assets/images/project/badassonly/img_thumbnails-review.jpg" alt="video">
                                </div>
                            </div>
                            <div class="video-back-wrap">
                                <iframe width="560" height="315" data-src="https://www.youtube.com/embed/zuzTo0y4tuU?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
