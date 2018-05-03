<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header')
</head>
<body>
    <div class="wrap">
       
        <!-- mobile menu -->
        @include('Dark2.frontend._menu',['key'=>'experience'])  
      
        <!-- header -->
        
        <div class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'experience'])
        </div>
       
        <!-- landing cut -->
        <!-- first cut -->
        
        <div class="section-02">
            <div class="pre-order-section">
                <p>
                    拋下你所習慣的一切，<br>
                    在 黑 暗 中，玩!翻!這!頓!飯!
               
                </p>
                <h4 class="color-white">
                    『放下平常吃飯那套，這裡不適用』
                </h4>
                <div class="pre-order-box food-box">
                    <div class="row hidden-xs">
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_w_1.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_w_2.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_w_3.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_w_4.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_w_5.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_w_6.png" alt="">
                        </div>
                    </div>    
                    <div class="row visible-xs">
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_1.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_2.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_3.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_4.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_5.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_6.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_7.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_8.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_9.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_10.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_11.png" alt="">
                        </div>
                        <div class="col-md-6">
                            <img src="/dark2/images/Experience_m_12.png" alt="">
                        </div>
                    </div>    
                </div>
            </div>
        </div>   
        @include('Dark2.frontend._footer')
    </div>
</body>
</html>