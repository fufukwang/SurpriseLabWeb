@extends('SurpriseLabHome._layout.master')

@section('meta')
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="出沒時間、地點難以預測的體驗製造商。Surprise is Everywhere.">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="認識團隊｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:site_name" content="認識團隊｜驚喜製造 SURPRISE LAB"/>
    <meta property="og:description" content="出沒時間、地點難以預測的體驗製造商。Surprise is Everywhere."/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/general/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="認識團隊｜驚喜製造 SURPRISE LAB">
    <meta name="twitter:description" content="出沒時間、地點難以預測的體驗製造商。Surprise is Everywhere.">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/general/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('style')
    <title>認識團隊｜驚喜製造 SURPRISE LAB</title>

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
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/team.css?20240709">
@endsection
@section('main')
    <main class="background-fixed" data-banner="url('/SurpriseLabHome/assets/images/team/img_brand.png')">
        <h1>TEAM</h1>

        <!-- Hero -->
        <section id="team-hero" class="hero js-hero-banner">
            <div class="container-xl">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-12">
                        <div class="hero-wrap" data-aos="fade">
                            <div class="hero-brand">
                                <img class="img-fluid" src="/SurpriseLabHome/assets/images/general/brand_team.svg" alt="Surprise Lab 驚喜製造">
                            </div>
                            <div class="hero-desc">
                                <p>
                                    <i>創造最啟發人心的時刻</i><br />
                                    <i>Create the most inspiring moments</i>
                                </p>
                                <p>
                                    出沒時間、地點難以預測的體驗製造商
                                </p>
                                <p>
                                    我們用娛樂傳遞價值，以體驗拋出提問<br />
                                    在日常之中，實現那些難以想像的畫面
                                </p>
                                <p class="font-lightorange">
                                    我們相信，每座城市，都是樂園<br />
                                    所有人，都是驚喜製造
                                </p>
                            </div>
                            <div class="hero-reward">
                                <div class="reward-item">
                                    <div class="reward-year">
                                        2019
                                    </div>
                                    <div class="reward-title">
                                        La Vie 台灣創意力 100 創意品牌
                                        <span class="font-n300">｜</span>
                                        <span class="font-n200">首獎</span>
                                    </div>
                                </div>
                                <div class="reward-item">
                                    <div class="reward-year">
                                        2018
                                    </div>
                                    <div class="reward-title">
                                        Taiwan Design Best 100
                                        <span class="font-n300">｜</span>
                                        <span class="font-n200">年度設計團隊</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- REWARD -->
        <section id="team-reward" class="team-reward js-nav-target surpri-section light-theme full-page">
            <div class="container-xl">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="surpri-title brackets-regular layout-center style-regular" data-aos="fade">
                            <div class="title-wrap">
                                <h2 class="title-en">Reward</h2>
                                <h5 class="title-ch">獲獎紀錄</h5>
                            </div>
                        </div>
                        <div class="surpri-content" data-aos="fade">
                            <div class="reward-wrap">
                                <div class="reward-card">
                                    <div class="reward-inner">
                                        
                                        <!-- 得獎作品名稱 (Mobile) -->
                                        <header class="reward-header show-in-mobile">
                                            <span class="reward-work-subtitle">
                                                Sunset Terminal
                                            </span>
                                            <h5 class="reward-work-title">
                                                落日轉運站
                                            </h5>
                                        </header>

                                        <!-- 得獎作品縮圖 -->
                                        <a href="/project/sunsetterminal.html">
                                            <div class="reward-img">
                                                <!-- <picture>
                                                    <source srcset="/SurpriseLabHome/assets/webps/project/thegreattipsy2/img_banner.webp" type="image/webp">
                                                    <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/thegreattipsy2/img_banner.jpg" alt="微醺大飯店：1980s">
                                                </picture> -->
                                                <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/terminal/img_banner.png" alt="落日轉運站">
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 得獎作品名稱 (Desktop) -->
                                    <header class="reward-header show-in-desktop">
                                        <span class="reward-work-subtitle">
                                            Sunset Terminal
                                        </span>
                                        <h5 class="reward-work-title">
                                            落日轉運站
                                        </h5>
                                    </header>
                                    
                                    <!-- 得獎項目 -->
                                    <div class="reward-content">
                                        <div class="reward-item">
                                            <div class="reward-year">
                                                2022
                                            </div>
                                            <div class="reward-title">
                                                <span class="font-lightorange">Shopping Design 2023 Taiwan Design Best 100</span>
                                                <span>年度概念展演活動</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="reward-card">
                                    <div class="reward-inner">
                                        
                                        <!-- 得獎作品名稱 (Mobile) -->
                                        <header class="reward-header show-in-mobile">
                                            <span class="reward-work-subtitle">
                                                The Great Tipsy 2 : 1980s
                                            </span>
                                            <h5 class="reward-work-title">
                                                微醺大飯店：1980s
                                            </h5>
                                        </header>

                                        <!-- 得獎作品縮圖 -->
                                        <a href="/thegreattipsy/index.html?utm_source=officialwebsite&utm_medium=Team">
                                            <div class="reward-img">
                                                <picture>
                                                    <source srcset="/SurpriseLabHome/assets/webps/project/thegreattipsy2/img_banner.webp" type="image/webp">
                                                    <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/thegreattipsy2/img_banner.jpg" alt="微醺大飯店：1980s">
                                                </picture>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 得獎作品名稱 (Desktop) -->
                                    <header class="reward-header show-in-desktop">
                                        <span class="reward-work-subtitle">
                                            The Great Tipsy 2 : 1980s
                                        </span>
                                        <h5 class="reward-work-title">
                                            微醺大飯店：1980s
                                        </h5>
                                    </header>
                                    
                                    <!-- 得獎項目 -->
                                    <div class="reward-content">
                                        <div class="reward-item">
                                            <div class="reward-year">
                                                2021
                                            </div>
                                            <div class="reward-title">
                                                <span class="font-lightorange">Taiwan Design Best 100</span>
                                                <span>年度概念展演活動</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="reward-card">
                                    <div class="reward-inner">
                                        
                                        <!-- 得獎作品名稱 (Mobile) -->
                                        <header class="reward-header show-in-mobile">
                                            <span class="reward-work-subtitle">
                                                The Great Tipsy
                                            </span>
                                            <h5 class="reward-work-title">
                                                微醺大飯店
                                            </h5>
                                        </header>

                                        <!-- 得獎作品縮圖 -->
                                        <a href="/project/thegreattipsy.html">
                                            <div class="reward-img">
                                                <picture>
                                                    <source srcset="/SurpriseLabHome/assets/webps/project/thegreattipsy/img_banner.webp" type="image/webp">
                                                    <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/thegreattipsy/img_banner.jpg" alt="微醺大飯店">
                                                </picture>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 得獎作品名稱 (Desktop) -->
                                    <header class="reward-header show-in-desktop">
                                        <span class="reward-work-subtitle">
                                            The Great Tipsy
                                        </span>
                                        <h5 class="reward-work-title">
                                            微醺大飯店
                                        </h5>
                                    </header>
                                    
                                    <!-- 得獎項目 -->
                                    <div class="reward-content">
                                        <div class="reward-item">
                                            <div class="reward-year">
                                                2019
                                            </div>
                                            <div class="reward-title">
                                                <span class="font-lightorange">金點設計獎</span>
                                                <span>整合設計類</span>
                                            </div>
                                        </div>
                                        <div class="reward-item">
                                            <div class="reward-year">
                                                2019
                                            </div>
                                            <div class="reward-title">
                                                <span class="font-lightorange">德國紅點設計獎</span>
                                                <span>現場表演組紅點獎</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="reward-card">
                                    <div class="reward-inner">
                                        
                                        <!-- 得獎作品名稱 (Mobile) -->
                                        <header class="reward-header show-in-mobile">
                                            <span class="reward-work-subtitle">
                                                table for ONE
                                            </span>
                                            <h5 class="reward-work-title">
                                                一人餐桌
                                            </h5>
                                        </header>

                                        <!-- 得獎作品縮圖 -->
                                        <a href="/project/tableforone.html">
                                            <div class="reward-img">
                                                <picture>
                                                    <source srcset="/SurpriseLabHome/assets/webps/project/tableforone/img_banner.webp" type="image/webp">
                                                    <img class="img-fluid" src="/SurpriseLabHome/assets/images/project/tableforone/img_banner.jpg" alt="一人餐桌">
                                                </picture>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- 得獎作品名稱 (Desktop) -->
                                    <header class="reward-header show-in-desktop">
                                        <span class="reward-work-subtitle">
                                            table for ONE
                                        </span>
                                        <h5 class="reward-work-title">
                                            一人餐桌
                                        </h5>
                                    </header>
                                    
                                    <!-- 得獎項目 -->
                                    <div class="reward-content">
                                        <div class="reward-item">
                                            <div class="reward-year">
                                                2018
                                            </div>
                                            <div class="reward-title">
                                                <span class="font-lightorange">金點設計獎</span>
                                                <span>整合設計類</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="team-data" class="team-data surpri-section light-theme full-page">
            <div class="container-xl">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="surpri-title brackets-regular layout-center style-regular" data-aos="fade">
                            <div class="title-wrap">
                                <h2 class="title-en">Data</h2>
                                <h5 class="title-ch">持續累積</h5>
                            </div>
                        </div>
                        <div class="surpri-content" data-aos="fade">
                            <div class="data-wrap">
                                <div class="data-row">
                                    <div class="data-item item-small">
                                        <div class="data-num">
                                            13
                                        </div>
                                        <div class="data-title">
                                            專案
                                        </div>
                                    </div>
                                    <div class="data-item item-small">
                                        <div class="data-num">
                                            28
                                        </div>
                                        <div class="data-title">
                                            合作品牌
                                        </div>
                                    </div>
                                    <div class="data-item item-small">
                                        <div class="data-num">
                                            8
                                        </div>
                                        <div class="data-title">
                                            獎項
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="data-row">
                                    <div class="data-item item-large">
                                        <div class="data-num">
                                            12299+
                                        </div>
                                        <div class="data-title">
                                            體驗場次
                                        </div>
                                    </div>
                                    <div class="data-item item-large">
                                        <div class="data-num">
                                            148131+
                                        </div>
                                        <div class="data-title">
                                            參與人數
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="team-member" class="team-member surpri-section light-theme full-page" style="display: none;">
            <div class="container-xl">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-12">
                        <div class="surpri-title brackets-regular layout-center style-regular" data-aos="fade">
                            <div class="title-wrap">
                                <h2 class="title-en">Team</h2>
                                <h5 class="title-ch">團隊成員</h5>
                            </div>
                        </div>
                        <div class="surpri-content" data-aos="fade">
                            <div class="member-wrap">
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-01.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-01.png" alt="陳心龍">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        陳心龍
                                    </h5>
                                    <p class="member-intro">
                                        大家好<br/>
                                        祝各位生意心龍
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-02.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-02.png" alt="林業軒">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        林業軒
                                    </h5>
                                    <p class="member-intro">
                                        
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-03.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-03.png" alt="張乃藴">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        張乃藴
                                    </h5>
                                    <p class="member-intro">
                                        哇咧。
                                    </p>
                                </div>
                                
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-04.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-04.png" alt="王廣耘">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        王廣耘
                                    </h5>
                                    <p class="member-intro">
                                        一位劇場小兵
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-05.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-05.png" alt="小廖">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        小廖
                                    </h5>
                                    <p class="member-intro">
                                        祖籍台灣 歡迎探班
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-06.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-06.png" alt="周延">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        周延
                                    </h5>
                                    <p class="member-intro">
                                        周湯豪的周，延長線的延
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-07.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-07.png" alt="周芸廷">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        周芸廷
                                    </h5>
                                    <p class="member-intro">
                                        驚喜魔法工廠鬼馬小精靈
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-08.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-08.png" alt="李可慧">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        李可慧
                                    </h5>
                                    <p class="member-intro">
                                        可愛跟智慧的綜合體，謝謝。
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-09.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-09.png" alt="Niva">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        Niva
                                    </h5>
                                    <p class="member-intro">
                                        驚喜魔法工廠鍊金術師
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-10.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-10.png" alt="葉佳欣">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        葉佳欣
                                    </h5>
                                    <p class="member-intro">
                                        驚喜魔法工廠魔法陣繪圖師
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-11.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-11.png" alt="林家興">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        林家興
                                    </h5>
                                    <p class="member-intro">
                                        只要是能吃的東西<br/>都是好東西
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-12.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-12.png" alt="Zimo">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        Zimo
                                    </h5>
                                    <p class="member-intro">
                                        驚喜忙內 aka 中正純愛戰士
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-13.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-13.png" alt="黃馨儀">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        黃馨儀
                                    </h5>
                                    <p class="member-intro">
                                        驚喜萬年實習生
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-14.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-14.png" alt="Rosa Kuo">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        Rosa Kuo
                                    </h5>
                                    <p class="member-intro">
                                        Be kind. ♡
                                    </p>
                                </div>
        
                                <div class="member-item">
                                    <div class="member-photo">
                                        <picture>
                                            <source srcset="/SurpriseLabHome/assets/webps/team/img_avatar-15.webp" type="image/webp">
                                            <img class="img-fluid" src="/SurpriseLabHome/assets/images/team/img_avatar-15.png" alt="許順凱">
                                        </picture>
                                    </div>
                                    <h5 class="member-name">
                                        許順凱
                                    </h5>
                                    <p class="member-intro">
                                        這樣然後那樣，報表就出來了
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="team-cta" class="team-cta surpri-section light-theme full-page">
            <div class="container-xl">
                <div class="row">
                    <div class="col-xl-6 col-12">
                        <div class="cta-left">
                            <a href="project.html" class="surpri-btn size-large color-arrow arrow-left">觀看所有計畫</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12">
                        <div class="cta-right">
                            <a href="ticket.html" class="surpri-btn size-large color-arrow arrow-right">參與最新計畫</a>
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
@endsection



    