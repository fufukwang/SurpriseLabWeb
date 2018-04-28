<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header')
</head>
<body>
    <div class="wrap">
       
        <!-- mobile menu -->
        @include('Dark2.frontend._menu',['key'=>'team'])
     
      
        <!-- header -->
        
        <div class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'team'])
        </div>
       
        <!-- landing cut -->
        <!-- first cut -->
        
        <div class="section-02">
            <div class="main-container">
                <div class="main-box">
                    <img class="supriselab-logo" src="/dark2/images/logo-ch.png" alt="">
                    <h1 class="color-white">
                        出沒時間難以預測的體驗製造商
                    </h1>
                    <div class="team-box">
                        <div>
                            2016.09 - 2016.12
                        </div>
                        <div>
                            無光晚餐 Dining In The Dark
                        </div>
                        <div>
                            2017.10 - 2018.06
                        </div>
                        <div>
                            table for ONE 一人餐桌
                        </div>
                        <img src="/dark2/images/Team/TFO.png" alt="">
                        <div>
                            2018.07 - !?
                        </div>
                        <div>
                            無光晚餐2 Dining In The Dark 2
                        </div>
                    </div>
                    <a href="pre-order.html">
                        <div class="btn btn-standard landing-btn">
                            前往預售
                        </div>
                    </a>
                </div>
            </div>
        </div>   


        @include('Dark2.frontend._footer')

        
    </div>
</body>
</html>