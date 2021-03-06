<!DOCTYPE html>
<head>
    <title>
        table for ONE 一人餐桌
    </title>
    @include('TFO.front._head')
</head>
<body>
    <div class="wrapper" id="red-theme" key="1">    
        @include('TFO.front._logo')
        
        <!-- landing part -->
        <div id="landing-cut">
            <svg viewBox="0 0 1070 650">
                <path>
                    <animateTransform dur="30s" attributeName="transform" repeatCount="indefinite" type="rotate" from="0,535,325" to="360,535,325"/> 

                    <animate attributeName="d" 
                             dur="5s" 
                             repeatCount="indefinite" 
                             values="M279,362c1.45-70.8,28-135.37,65.59-210.49C372.64,95.4,461.46,61.7,532.16,65.8,638.84,72,679.59,89.59,726,136s73,125.63,58.34,209.71c-9.75,56.07-.34,95.29-77.19,168.34-52,49.46-94.49,78.7-191.34,85.7C436.95,605.45,409.66,548.51,363,501,319.1,456.3,277.34,443.12,279,362Z;
                                     M276,288c1.45-70.8,22.8-100.47,84-158,50-47,101.46-68.3,172.16-64.2C638.84,72,666.59,92.59,713,139s56.22,122.72,71.34,206.71c14.56,80.88-4.75,110-77.19,168.34-55.89,45-94.49,78.7-191.34,85.7-78.86,5.7-166.57-32.7-196.82-92C286,443,274.34,369.12,276,288Z;
                                     M279,362c1.45-70.8,28-135.37,65.59-210.49C372.64,95.4,461.46,61.7,532.16,65.8,638.84,72,679.59,89.59,726,136s73,125.63,58.34,209.71c-9.75,56.07-.34,95.29-77.19,168.34-52,49.46-94.49,78.7-191.34,85.7C436.95,605.45,409.66,548.51,363,501,319.1,456.3,277.34,443.12,279,362Z;" />
                </path>
            </svg>

            <div class="index-box">
                <div class="plate-img-box">
                    <img src="/T41/images/landing-page/set1.png" alt="">
                </div>
                <div class="gif-plate-img-box">
                    <img src="/T41/images/landing-page/gif1.gif" alt="">
                </div>
                <div class="btn standard-btn mg-auto" id="index-btn">
                    {!! trans('tfo.home.btn') !!}
                </div>
            </div>

            <div class="indicator-box">
                <i class="fa fa-angle-right" val="1"></i>
                <i class="fa fa-angle-left" val="-1"></i>

                <ul id="indicator-dot">
                    <li class="active"></li><li></li><li></li><li></li><li></li><li></li>
                </ul>
            </div>    
        </div>
        
        <!--  -->
        <div class="main-box" id="main">
            @include('TFO.front._nav')
            <div class="content-box">
                <div>
                    <h1><img style="max-width: 175px" src="/T41/images/welcome-page/welcome-01.png" alt=""></h1>
                    {!! trans('tfo.home.text') !!}
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>