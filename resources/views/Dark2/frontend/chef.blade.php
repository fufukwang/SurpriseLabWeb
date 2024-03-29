<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header')
</head>
<body>
    <div class="wrap">
       
        <!-- mobile menu -->
        @include('Dark2.frontend._menu',['key'=>'chef'])
     
      
        <!-- header -->
        
        <div class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'chef'])
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
                <div class="light">
                    
                </div>
                
                
                <!-- 遮罩  z: 500-->
                <div class="mask">
                    
                </div>
                
            </div>
        </div>
        
        <!-- first cut -->
        
        
        
        <div class="section-02">
            <div class="main-container">
                <div class="main-box hidden-xs">
                    <p>
                        工作如果不有趣,人生就太辛苦了;料理若沒有玩心,能剩得下什麼滋味?<br>旅居海外多年,因而透悟台灣本地食材的優美豐富,還好味覺的經驗值沒有額度限制,才能藉由每一次的美食體驗,讓味蕾不間斷地品嘗到驚喜,把每餐飯吃得有聲有色,就該是生活最確切的目的
                    </p>
                    <h2 class="mg-top-45">
                        ─創意主廚 LEON
                    </h2>
                </div>

                <div style="margin-top:75px;" class="flex-row-box chef-flex">
                    <div class="chef-photo">

                    </div>
                    <div class="chef-info">
                        <p>
                            餐飲經歷
                        </p>
                        <p class="hidden-xs">
                            香港米其林三星餐廳Bo Innovation 展店人<br>
                            倫敦米其林一星餐廳Bo London 創意主廚/總監
                        </p>
                        <p class="visible-xs">
                            香港米其林三星餐廳Bo
                            <br>
                            Innovation 展店人
                            <br><br>
                            倫敦米其林一星餐廳Bo
                            <br>
                            London 創意主廚/總監
                        </p>
                    </div>
                </div>
            </div>
            <div class="main-container main-even-container">
                <div class="main-box">
                    <img class="hidden-xs" src="/dark2/images/cut3_about/menu.png" alt="">
                    <img class="visible-xs" src="/dark2/images/cut3_about/munu-phone.png" alt="">
                </div>
            </div>
        </div>   
        @include('Dark2.frontend._footer')
    </div>
</body>
</html>