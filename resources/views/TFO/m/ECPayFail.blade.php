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
        
        
        <!--  -->
        <div class="content-box align-center">
            <div>
                <ul class="step-box mg-b-lg">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li class="active">5</li>
                </ul>
                <div class="table-box">
                    <h4 style="font-weight: bold;" class="alert-color">
                        您的訂位未能成功
                    </h4>
                    <p class="alert-color">
                        請至訂位頁面再試一次<br>
                        若仍有問題，歡迎與我們聯繫
                    </p>
                </div>

                <div class="btn-box">
                    <a href="reservation.html">
                        <div class="standard-btn btn">
                            再次訂位
                        </div>    
                    </a>
                </div>
                <span class="copyright align-center">
                    copyright © 2017 驚喜製造
                </span>
            </div>
        </div>
    </div>
</body>
</html>