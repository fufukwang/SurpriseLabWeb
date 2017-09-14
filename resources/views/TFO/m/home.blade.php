<!DOCTYPE html>
<head>
    <title>
        Table For One
    </title>
    @include('TFO.m._head')
</head>
<body>
    <div class="wrapper" id="red-theme" key="1">    
        @include('TFO.front._logo')
        
        <!--  mobile menu  -->
        <div class="hamburger-box">
            <i class="fa fa-bars"></i>
        </div>
        
        @include('TFO.front._nav')
        
        <!-- -->
        
        <!-- landing part -->
        <div id="landing-cut">
            <p class="landing-slogan">
                當你獨自一人，你感到?
            </p>
            <div class="index-box">
                <div class="plate-img-box">
                    <img src="images/landing-page/mobile1.png" alt="">
                </div>
                <div class="btn standard-btn mg-auto" id="index-btn">
                    開始探索
                </div>
            </div>

            <div class="indicator-box">
                <i class="fa fa-angle-right" val="1"></i>
                <i class="fa fa-angle-left" val="-1"></i>
            </div>    
        </div>
        
        <!--  -->
        <div class="main-box" id="main">
            <div class="content-box">
                <div>
                    <h1><img style="max-width: 175px" src="images/welcome-page/welcome-01.png" alt=""></h1>
                    <p>
                        一個人，一張餐桌，<br>二十四位陌生人<br>
                        一頓飯的時間，<br>我們一起，一個人
                    </p>
                    <a href="reservation-1.html">
                        <div class="standard-btn btn mg-auto">
                            立即訂位
                        </div>    
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>