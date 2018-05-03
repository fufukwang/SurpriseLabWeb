<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header')
</head>
<body>
    <div class="wrap">
       
        <!-- mobile menu -->
        @include('Dark2.frontend._menu',['key'=>'food']) 
      
        <!-- header -->
        
        <div class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'food'])
        </div>
       
        <!-- landing cut -->
        <!-- first cut -->
        
        <div class="section-02">
            <div class="pre-order-section">
                <p>
                    五道料理，暫不揭曉<br>留於黑暗中讓你猜測翻玩
                </p>
                <h4 class="color-white">
                    『你確定，你真的了解自己的味蕾嗎?』
                </h4>
                <div class="pre-order-box food-box">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/dark2/images/Food_1.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <img src="/dark2/images/Food_2.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <img src="/dark2/images/Food_3.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <img src="/dark2/images/Food_4.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <img src="/dark2/images/Food_5.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <img src="/dark2/images/Food_6.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <img src="/dark2/images/Food_7.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <img src="/dark2/images/Food_8.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <img src="/dark2/images/Food_9.png" alt="">
                        </div>
                    </div>    
                </div>
            </div>
        </div>   
        @include('Dark2.frontend._footer')
    </div>
</body>
</html>