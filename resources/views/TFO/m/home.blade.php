<!DOCTYPE html>
<head>
    <title>
        Table For One
    </title>
    @include('TFO.m._head')
</head>
<body>
    <div class="wrapper" id="red-theme" key="1">    
        @include('TFO.m._logo')
        
        <!--  mobile menu  -->
        <div class="hamburger-box">
            <i class="fa fa-bars"></i>
        </div>
        
        @include('TFO.front._nav')
        
        <!-- -->
        
        <!-- landing part -->
        <div id="landing-cut">
            <p class="landing-slogan">
                {!! trans('tfom.home.slogan') !!}
            </p>
            <div class="index-box">
                <div class="plate-img-box">
                    <img src="/T41/images/landing-page/mobile1.png" alt="">
                </div>
                <div class="btn standard-btn mg-auto" id="index-btn">
                    {!! trans('tfom.home.btn') !!}
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
                    <h1><img style="max-width: 175px" src="/T41/images/welcome-page/welcome-01.png" alt=""></h1>
                    {!! trans('tfom.home.text') !!}
                </div>
            </div>
        </div>
    </div>
</body>
</html>