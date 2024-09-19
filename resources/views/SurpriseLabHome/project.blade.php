@extends('SurpriseLabHome._layout.master')


@section('meta')
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="收藏所有的過去式與現在式，但我們最喜歡的永遠是未來式。">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="專案計畫｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:site_name" content="專案計畫｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:description" content="收藏所有的過去式與現在式，但我們最喜歡的永遠是未來式。"/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/general/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="專案計畫｜驚喜製造 SURPRISE LAB">
    <meta name="twitter:description" content="收藏所有的過去式與現在式，但我們最喜歡的永遠是未來式。">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/general/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('style')
    <title>專案計畫｜驚喜製造 SURPRISE LAB</title>

    <!-- Style -->
    <link rel="icon" href="/SurpriseLabHome/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/bootstrap-5.1.3/bootstrap.min.css"/>

    <!-- Loading Style -->
    <link rel="stylesheet" type="text/css" href="/SurpriseLabHome/resources/css/plugins/imagesloaded/loading.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/icomoon/style.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/style.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/project.css?20240711">
@endsection
@section('main')
    <main>

        <h1>專案計畫</h1>

        <section class="surpri-section">
            <div class="container-xl">
                <div class="row">
                    <div class="offset-xl-1 col-xl-10 col-12">
                        <div class="project-wrap">
                            <div class="surpri-title brackets-regular layout-center style-dark">
                                <div class="title-wrap">
                                    <h2 class="title-en">PROJECT</h2>
                                    <h5 class="title-ch">專案計畫</h5>
                                </div>
                            </div>

                            <!-- Project Filter: nav -->
                            <div id="js-category-menu" class="project-tag-wrap">
                                <div class="project-tag-upper-wrap">
                                    <div class="js-menu-item surpri-tag active" data-category="all">所有類型</div>
                                </div>
                                <div class="project-tag-lower-wrap">
                                    <div class="js-menu-item surpri-tag" data-category="experiment">實驗</div>
                                    <div class="js-menu-item surpri-tag" data-category="performance">表演</div>
                                    <div class="js-menu-item surpri-tag" data-category="space">空間</div>
                                    <div class="js-menu-item surpri-tag" data-category="food">餐飲</div>
                                </div>
                            </div>
                            
                            <!-- Project Filter: content -->
                            <div id="js-works-wrap" class="project-dashboard">

                                <a href="/lebaldeparis" class="js-work-item project-card on-sell category-show" data-category="performance">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/images/project/paris/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/paris/img_banner.png" alt="巴黎舞會">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">Le Bal de Paris de Blanca Li</span>
                                        <span class="project-title">巴黎舞會</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2024</span>
                                        <span class="project-category">表演</span>
                                    </div>
                                </a>

                                <a href="https://bit.ly/3PXnNjP" class="js-work-item project-card on-sell category-show" data-category="experiment">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/images/project/mind_the_gap/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/mind_the_gap/img_banner.png" alt="落日月台">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">Mind The Gap</span>
                                        <span class="project-title">落日月台</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2024</span>
                                        <span class="project-category">實驗</span>
                                    </div>
                                </a>

                                <a href="/dininginthedark3/index.html" class="js-work-item project-card on-sell category-show" data-category="food">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <!-- <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark3/img_banner.webp" type="image/webp"> -->
                                            <img src="/SurpriseLabHome/assets/images/project/dininginthedark3/img_banner2.png" alt="dininginthedark3">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">Dining In The Dark Season 3</span>
                                        <span class="project-title">無光晚餐第三季</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2022</span>
                                        <span class="project-category">餐飲</span>
                                    </div>
                                </a>

                                <a href="./project/sunsetterminal.html" class="js-work-item project-card category-show" data-category="performance">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <!-- <source srcset="/SurpriseLabHome/assets/images/project/paris/img_banner.webp" type="image/webp"> -->
                                            <img src="/SurpriseLabHome/assets/images/project/terminal/img_banner.png" alt="落日轉運站">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">The Sunset Terminal</span>
                                        <span class="project-title">落日轉運站</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2022</span>
                                        <span class="project-category">表演</span>
                                    </div>
                                </a>

                                <a href="./project/thegreattipsy1980s.html" class="js-work-item project-card category-show" data-category="performance">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/thegreattipsy2/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/thegreattipsy2/img_banner.jpg" alt="thegreattipsy2">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">The Great Tipsy 2 : 1980s</span>
                                        <span class="project-title">微醺大飯店：1980s</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2021-2022</span>
                                        <span class="project-category">表演</span>
                                    </div>
                                </a>

                                <a href="./project/badassonly.html" class="js-work-item project-card category-show" data-category="experiment">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/badassonly/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/badassonly/img_banner.jpg" alt="badassonly">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">PROJECT S VOL.1</span>
                                        <span class="project-title">BADASS ONLY <br>惹事工具箱</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2021</span>
                                        <span class="project-category">實驗</span>
                                    </div>
                                </a>

                                <a href="./project/tgtnextstop.html" class="js-work-item project-card category-show" data-category="performance">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/tgtnextstop/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/tgtnextstop/img_banner.jpg" alt="tgtnextstop">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">The Great Tipsy : Next Stop</span>
                                        <span class="project-title">微醺列車</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2020</span>
                                        <span class="project-category">表演</span>
                                    </div>
                                </a>

                                <a href="./project/clubtomorrow.html" class="js-work-item project-card category-show" data-category="performance">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/clubtomorrow/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/clubtomorrow/img_banner.jpg" alt="clubtomorrow">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">CLUB Tomorrow</span>
                                        <span class="project-title">明日俱樂部</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2020</span>
                                        <span class="project-category">表演</span>
                                    </div>
                                </a>

                                <a href="./project/whee.html" class="js-work-item project-card category-show" data-category="space">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/whee/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/whee/img_banner.jpg" alt="whee">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">WHEE!</span>
                                        <span class="project-title">WHEE! 下來玩</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2019</span>
                                        <span class="project-category">空間</span>
                                    </div>
                                </a>

                                <a href="./project/thegreattipsy.html" class="js-work-item project-card category-show" data-category="performance">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/thegreattipsy/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/thegreattipsy/img_banner.jpg" alt="thegreattipsy">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">The Great Tipsy</span>
                                        <span class="project-title">微醺大飯店</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2019</span>
                                        <span class="project-category">表演</span>
                                    </div>
                                </a>

                                <a href="./project/dininginthedark2.html" class="js-work-item project-card category-show" data-category="food">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark2/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/dininginthedark2/img_banner.jpg" alt="dininginthedark2">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">Dining In The Dark Season 2</span>
                                        <span class="project-title">無光晚餐第二季</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2018</span>
                                        <span class="project-category">餐飲</span>
                                    </div>
                                </a>

                                <a href="./project/tableforone.html" class="js-work-item project-card category-show" data-category="food">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/tableforone/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/tableforone/img_banner.jpg" alt="tableforone">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">table for ONE</span>
                                        <span class="project-title">一人餐桌</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2017</span>
                                        <span class="project-category">餐飲</span>
                                    </div>
                                </a>

                                <a href="./project/dininginthedark.html" class="js-work-item project-card category-show" data-category="food">
                                    <div class="project-image-wrap">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/project/dininginthedark/img_banner.webp" type="image/webp">
                                            <img src="/SurpriseLabHome/assets/images/project/dininginthedark/img_banner.jpg" alt="dininginthedark">
                                        </picture>
                                    </div>
                                    <div class="project-text">
                                        <span class="project-sub-title">Dining In The Dark</span>
                                        <span class="project-title">無光晚餐</span>
                                    </div>
                                    <div class="project-status">
                                        <span class="project-year">2016</span>
                                        <span class="project-category">餐飲</span>
                                    </div>
                                </a>
                            </div>

                            <!-- Project Pagination -->
                            <div id="js-pagination-wrap" class="surpri-pagination-wrap">
                                <div class="pagination-item prev-item"></div>
                                <ul class="pagination-page-wrap"></ul>
                                <div class="pagination-item next-item"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

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
    <script src="/SurpriseLabHome/resources/js/project.js"></script>
    <script>document.addEventListener('touchstart', function () {});</script>
@endsection