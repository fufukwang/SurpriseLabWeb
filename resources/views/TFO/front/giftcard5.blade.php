<!DOCTYPE html>
<head>
    <title>
        table for ONE 一人餐桌
    </title>
    @include('TFO.front._head')
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '169783437091349'); 
fbq('track', 'Purchase', {value:'1200', currency:'TWD'});
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=169783437091349&ev=Purchase
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
</head>
<body>
    <div class="wrapper" id="red-theme" key="1">    
        @include('TFO.front._logo')
        
        <div class="main-box">
            @include('TFO.front._nav')
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
                        <h4 style="font-weight: bold;">
                            禮物卡購買完成<br>
                            可至信箱閱讀確認信之相關規則
                        </h4>
                        <p>
                            若有任何問題歡迎來信至官方信箱<br>
                            <a href="mailto:tableforone@surpriselab.com.tw">tableforone@surpriselab.com.tw</a>
                        </p>
                    </div>
                    <span class="copyright align-center">
                        copyright © 2017 驚喜製造
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>