@extends('SurpriseLabHome._layout.master')
@section('meta')
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="獻給都市人的秘密樂園。">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="WHEE! 下來玩｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:site_name" content="WHEE! 下來玩｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:description" content="獻給都市人的秘密樂園。"/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/project/whee/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="WHEE! 下來玩｜驚喜製造 SURPRISE LAB">
    <meta name="twitter:description" content="獻給都市人的秘密樂園。">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/project/whee/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('style')
    <title>WHEE! 下來玩｜驚喜製造 SURPRISE LAB</title>

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
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/style.css?240924">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/introduction.css?20240710">
@endsection
@section('main')
    <main class="background-fixed" data-banner="url('/SurpriseLabHome/assets/images/project/whee/img_banner.jpg')">

        <!-- *5-1 Hero -->
        <section class="project-hero-section js-fixed-btn-target js-hero-banner">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="project-hero-wrap" data-aos="fade">
                            <div class="hero-text-wrap">
                                <h1 class="hero-title">WHEE! 下來玩</h1>
                                <div class="hero-subtitle">WHEE!</div>
                                <p class="hero-des">獻給大人的秘密樂園</p>
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
                                    不論長多大<br>永遠要記得玩
                                </div>
                            </div>

                            <!-- accordion -->
                            <div class="surpri-accordion-wrap">
                                <div class="accordion-content-wrap">
                                    <div class="content-upper">
                                        <p>WHEE! 是一個專注在<span class="highlight">人與人交流互動的複合式娛樂空間</span>，希望透過迷你高爾夫、不間斷的特別企劃與空間軟性裝置，提供都市人結合運動、酒精、聚會、社交可能的新型態休閒場域。</p>
                                        <p>WHEE! 由驚喜製造 Surprise Lab. 策劃營運，攜手 <span class="highlight">Plan b、Draft Land、臺虎精釀 Taihu Brewing 與 米凱樂台灣 Mikkeller Taiwan</span> 協力驅動。</p>
                                    </div>
                                    <div class="js-content-lower content-lower">
                                        <p>這裡不僅有酒飲讓人微醺，滾動的高爾夫球更能自在地拉近彼此。遊戲、驚喜讓人發笑，而笑聲則串連你我。在 WHEE! ，我們希望能<span class="highlight">透過「 玩 」串起人與人的連結，讓人們在此放下防衛、輕鬆交流。</span></p>
                                        <p>歡迎大家在 WHEE!  愜意地問問身旁的人：要不要一起玩？ ，害羞的話也能傳張紙條說：Hi 希望你今天過得很不錯 ── 沒有一定要曖昧，就只是，輕鬆地，說聲嗨、一起玩！</p>
                                        <p>於是，大家在 WHEE! 會發現 ── <span class="highlight">嘿，原來生活也可以這樣！</span></p>
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
                                    <img src="/SurpriseLabHome/assets/images/project/whee/img_thumbnails-video.jpg" alt="video">
                                </div>
                            </div>
                            <div class="video-back-wrap">
                                <iframe width="560" height="315" data-src="https://www.youtube.com/embed/T3Udq7jp5Mw?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- *5-4 photo -->
        <section class="surpri-section project-photo-section">
            <div class="js-photo-gallery project-photo-wrap" data-aos="fade">
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-01.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-01.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-01.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-02.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-02.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-02.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-03.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-03.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-03.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-04.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-04.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-04.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-05.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-05.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-05.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-06.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-06.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-06.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-07.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-07.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-07.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-08.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-08.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-08.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-09.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-09.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-09.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-10.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-10.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-10.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-11.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-11.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-11.jpg" alt="clubtomorrow">
                    </picture>
                </a>
                <a href="/SurpriseLabHome/assets/images/project/whee/img_pic-12.jpg" class="js-photo-item photo-item" rel="rel1">
                    <picture>
                        <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_pic-12.webp" type="image/webp">
                        <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/whee/img_pic-12.jpg" alt="clubtomorrow">
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
                                    <span class="circle-title">500 坪</span>
                                    <span class="circle-des">營業場域</span>
                                </div>
                                <div class="circle-item">
                                    <span class="circle-title">5000 人</span>
                                    <span class="circle-des">每月均來客</span>
                                </div>
                                <div class="circle-item">
                                    <span class="circle-title">∞</span>
                                    <span class="circle-des">企劃們</span>
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
                                    <span class="credit-list-title">策劃統籌</span>
                                </div>
                                <ul class="credit-list">
                                    <li class="credit-item">驚喜製造 Surprise Lab.</li>
                                </ul>
                            </div>

                            <div class="credit-list-wrap">
                                <div class="credit-list-title-wrap">
                                    <span class="credit-list-title">專案顧問</span>
                                </div>
                                <ul class="credit-list">
                                    <li class="credit-item">Plan b 第二計劃</li>
                                </ul>
                            </div>

                            <div class="credit-list-wrap">
                                <div class="credit-list-title-wrap">
                                    <span class="credit-list-title">協力製作</span>
                                </div>
                                <ul class="credit-list">
                                    <li class="credit-item">Draft Land</li>
                                    <li class="credit-item">臺虎精釀 Taihu Brewing</li>
                                    <li class="credit-item">米凱樂台灣 Mikkeller Taiwan</li>
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
                                    <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_partner_mobile.webp" type="image/webp" media="(max-width: 1199.98px)">
                                    <source srcset="/SurpriseLabHome/assets/images/project/whee/img_partner_mobile.png" media="(max-width: 1199.98px)">
                                    <!-- pc -->
                                    <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_partner.webp" type="image/webp">
                                    <img src="/SurpriseLabHome/assets/images/project/whee/img_partner.png" alt="partner">
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
                            
                                <div class="table-th">專案顧問</div>
                                <div class="table-td">Plan b 第二計劃</div>

                                <div class="table-th">協力製作</div>
                                <div class="table-td">
                                    Draft Land<br>
                                    臺虎精釀 Taihu Brewing<br>
                                    Mikkeller Taiwan 米凱樂台灣 
                                </div>

                                <div class="table-th">空間規劃設計</div>
                                <div class="table-td">彡苗空間實驗 seed spacelab.co</div>

                                <div class="table-th">空間場景佈置</div>
                                <div class="table-td">
                                    驚喜製造Surprise Lab.<br>
                                    彡苗空間實驗 seed spacelab.co
                                </div>

                                <div class="table-th">互動裝置<br>設計執行</div>
                                <div class="table-td">真空通信 VAQ. Interactive</div>

                                <div class="table-th">互動視覺設計</div>
                                <div class="table-td">Teom Chen</div>

                                <div class="table-th">影片製作</div>
                                <div class="table-td">浪打影像 Lambda Film</div>

                                <div class="table-th">平面拍攝</div>
                                <div class="table-td">林后駿、潘怡帆</div>

                                <div class="table-th">贊助單位</div>
                                <div class="table-td">
                                    TaylorMade Golf<br>
                                    兆吟展演空間＿洪國棟
                                </div>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <div class="table-group">
                                <div class="table-th">製作人</div>
                                <div class="table-td">陳心龍</div>
                            
                                <div class="table-th">執行製作人</div>
                                <div class="table-td">黃詠渝、吳允方、林業軒</div>

                                <div class="table-th">營運統籌</div>
                                <div class="table-td">黃詠渝</div>

                                <div class="table-th">現場經理</div>
                                <div class="table-td">陳沛潔</div>

                                <div class="table-th">行銷統籌</div>
                                <div class="table-td">吳允方、周　延、林可慧</div>

                                <div class="table-th">行銷企劃</div>
                                <div class="table-td">林紀含</div>

                                <div class="table-th">前期宣傳</div>
                                <div class="table-td">黃馨儀、鄒琪</div>

                                <div class="table-th">商業開發</div>
                                <div class="table-td">林業軒、Rosa Kuo</div>

                                <div class="table-th">體驗統籌</div>
                                <div class="table-td">陳心龍</div>

                                <div class="table-th">體驗設計</div>
                                <div class="table-td">
                                    江妍瑩、胡芷寧、胡登雯、黃詠渝<br>
                                    吳允方、林紀含、周　延、李可慧
                                </div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">專案顧問</div>
                                <div class="table-td">游適任、陳韻竹</div>

                                <div class="table-th">顧問群</div>
                                <div class="table-td">
                                    Duke Wu、鄒斯傑、林幼航<br>
                                    恩熙俊、瘦子 E.SO、William Lai<br>
                                    Jamie Chen 、Teddy Lu
                                </div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">主視覺設計</div>
                                <div class="table-td">葉佳欣、江妍瑩</div>
                            
                                <div class="table-th">體驗物設計</div>
                                <div class="table-td">
                                    江妍瑩、葉佳欣、胡芷寧、林家興<br>
                                    林榆庭
                                </div>

                                <div class="table-th">空間設計主持</div>
                                <div class="table-td">鄭又維、樂美成、羅開</div>

                                <div class="table-th">空間設計專案</div>
                                <div class="table-td">曾郁翔、王婕欣</div>

                                <div class="table-th">空間設計協力</div>
                                <div class="table-td">邱宇平、劉尚澤、袁如玉</div>

                                <div class="table-th">包廂設計</div>
                                <div class="table-td">江妍瑩</div>

                                <div class="table-th">啟動期<br>軟裝設計主持</div>
                                <div class="table-td">江妍瑩</div>

                                <div class="table-th">營運期<br>軟裝設計主持</div>
                                <div class="table-td">胡芷寧、林欣伊</div>

                                <div class="table-th">營運期<br>軟裝執行統籌</div>
                                <div class="table-td">邱靖雅</div>

                                <div class="table-th">燈光設計</div>
                                <div class="table-td">李浩祥</div>

                                <div class="table-th">啟動期<br>裝台工作人員</div>
                                <div class="table-td">
                                    吳映竺、楊嘉璿、曾玟琦、彭士銓<br>
                                    盧冠穎、黃彥勳、劉怡彤
                                </div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">網站專案管理</div>
                                <div class="table-td">黃馨儀</div>
                            
                                <div class="table-th">網站設計</div>
                                <div class="table-td">火曜日設計、曝鹿設計、Randy</div>
                            </div>
                            <div class="table-group">
                                <div class="table-th">WHEE EAT!<br>第一季菜單設計</div>
                                <div class="table-td">陳丞典</div>
                            
                                <div class="table-th">WHEE EAT!<br>第二季菜單設計</div>
                                <div class="table-td">Mathias Kuzar</div>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <!-- [ WHEE! TEAM ] -->
                            <div class="table-group">
                                <div class="table-th">經理</div>
                                <div class="table-td">陳沛潔 Pefilia</div>
                            
                                <div class="table-th">副理</div>
                                <div class="table-td">陳昱緯 Weyland、許雪莉 Shirley</div>

                                <div class="table-th">外場領班</div>
                                <div class="table-td">陳以柔 Eloise、陳詩穎 Ivy</div>

                                <div class="table-th">會計</div>
                                <div class="table-td">許順凱、陳韻竹</div>
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
                                    <img src="/SurpriseLabHome/assets/images/project/whee/img_thumbnails-review.jpg" alt="video">
                                </div>
                            </div>
                            <div class="video-back-wrap">
                                <iframe width="560" height="315" data-src="https://www.youtube.com/embed/aXS_SV5vzH0?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
    <script src="/SurpriseLabHome/resources/js/main.js?240924"></script>
    <script src="/SurpriseLabHome/resources/js/preload.js"></script>
    <script src="/SurpriseLabHome/resources/js/introduction.js"></script>
@endsection
