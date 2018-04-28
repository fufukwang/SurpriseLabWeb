<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header')
</head>
<body>
    <div class="wrap">
       
        <!-- mobile menu -->
        @include('Dark2.frontend._menu',['key'=>'about'])
     
      
        <!-- header -->
        
        <div class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'about'])
        </div>
       
        <!-- landing cut -->
        <!-- 底紋 -->
        <div style="display:none;" class="section-01">
            <!-- 灰底 -->   
            <div class="logo-container">
                <!-- LOGO z: 1000 -->
                <div class="main-logo">
                    <img src="/dark2/images/cut1-intro/logo-big.png" alt="">
                    <div class="btn btn-standard landing-btn">
                        ENTER
                    </div>
                </div>
                
                <!-- 盤子 z: 100 -->
                <div class="forks">
                    
                </div>
                
                <!-- 光 z: 10 -->
                <div class="light light-lg hidden-xs">
                    
                </div>
                
                <div class="light light-xs visible-xs">
                    
                </div>
                
                <!-- 遮罩  z: 500-->
                <div class="mask">
                    
                </div>
                
            </div>
        </div>
        
        <!-- first cut -->
        
        
        
        <div class="section-02">
            <div class="main-container hidden-xs">
                <h1>
                    無光概念
                </h1>
                <p>
                    進入黑暗
                    <br>燈光若全滅了,感官就全開了
                    <br>肌膚能撫觸美味,耳朵能聽見質感,心靈能品嘗對話
                    <br>全然的漆黑中,不再看見物體,卻看見奔放的想像
                    <br>特別當你有一位願意共同經歷未知的對象,黑暗怎會可怕
                </p>
                <!-- bg1 & 2 -->
                <img class="bgs bg-knife2" src="/dark2/images/cut3_about/cut2-knife2.png" alt="">
                <img class="bgs bg-folk1" src="/dark2/images/cut3_about/cut2-folk1.png" alt="">
                
            </div>
            <div class="main-container main-even-container hidden-xs">
                <h1>
                    無光晚餐
                </h1>
                <p>
                    一座朝向美食冒險的劇場,上演味覺、聽覺、觸覺之間,多種既有概念與好奇心的碰撞
                    <br>序幕由你銳化的知覺揭開,戲碼從你怦然的心跳延展
                    <br>每張餐桌都是舞台,備妥了你所期待的新鮮感
                    <br>這裡黑暗無光,唯有你的舌尖,將被每道料理的驚喜點亮
                </p>
                <!-- bg3-->
                <img class="bgs bg-spoon" src="/dark2/images/cut3_about/cut2-spoon.png" alt="">
                
            </div>
            <div class="main-container">
                <h1 style="margin-bottom:45px;">
                    用餐流程
                </h1>
                <div class="about-step-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="about-step">
                                <div class="step-number">
                                    1
                                </div>
                                <div>
                                    <img src="/dark2/images/cut3-about/process1.png" alt="">
                                    <p>
                                        抵達餐廳、尚未就座之前,將有專人解說用餐及服務事項、確認來賓的飲食喜好,每一道料理食材將在用餐完畢、出場之後才向來賓解說。
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-step">
                                <div class="step-number">
                                    2
                                </div>
                                <div>
                                    <img src="/dark2/images/cut3-about/process2.png" alt="">
                                    <p>
                                        來賓將進入阻絕所有光源的黑暗空間,從就座、用餐到離席,都在零視覺的狀態下進行。
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-step">
                                <div class="step-number">
                                    3
                                </div>
                                <div>
                                    <img src="/dark2/images/cut3-about/process3.png" alt="">
                                    <p>
                                        驚喜的主要來源,是使用視覺除外的感官品嘗料理,而和同伴的交心談話,則能讓美味更加昇華。
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-step">
                                <div class="step-number">
                                    4
                                </div>
                                <div>
                                    <img src="/dark2/images/cut3-about/process4.png" alt="">
                                    <p>
                                        就座與用餐時的所有服務需求,皆由佩戴夜視鏡的工作人員悉心照料。
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bg4 & 5-->
                <img class="bgs bg-folk2 hidden-xs" src="/dark2/images/cut3_about/cut2-folk2.png" alt="">
                <img class="bgs bg-knife1 hidden-xs" src="/dark2/images/cut3_about/cut2-knife1.png" alt="">
            </div>
            <div class="main-container main-even-container">
                <h1>
                    驚喜製造
                </h1>
                <p>
                    城市不乏驚喜,但需要樂於發現和分享的人
                    <br>我們要用奔放的想像力持續向城市發聲
                    <br>無光晚餐是為你精心製造的第一號驚喜
                </p>
                <p>
                    它是味覺的饗宴,更是全感官的體驗
                    <br>無所不在的驚喜,歡迎享用
                </p>
                <a href="pre-order.html">
                    <div class="btn btn-standard">
                        馬上預購
                    </div>
                </a>
                <!-- bg3-->
                <img class="bgs bg-spoon2 visible-xs" src="/dark2/images/cut3_about/cut2-spoon.png" alt="">
            </div>
        </div>
        @include('Dark2.frontend._footer')
    </div>
</body>
</html>