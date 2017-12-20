<!DOCTYPE html>
<head>
    <title>
        table for ONE 一人餐桌
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/T41/style/css/bootstrap.min.css">
    @include('TFO.m._head')
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
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=169783437091349&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
</head>
<body>
    <div class="wrapper" id="red-theme" key="1">    
        @include('TFO.m._logo')
        <!--  mobile menu  -->
        <div class="hamburger-box">
            <i class="fa fa-bars"></i>
        </div>

        @include('TFO.front._nav')


        <div class="main-box">
            <div id="git" class="content-box align-center">



                <div class="gift-card-main" id="step1">
                    {!! trans('tfom.card.giftStep1') !!}
                </div>








                <div id="step2" class="align-left">
                    <ul class="step-box mg-b-lg">
                        <li class="active">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                    </ul>
                    {!! trans('tfom.card.giftStep2') !!}
                    </div>
                </div>



                <div id="step3" class="align-left">
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li class="active">2</li>
                        <li>3</li>
                        <li>4</li>
                    </ul>
                    {!! trans('tfom.card.giftStep3') !!}
                </div>










                <div id="step4" class="align-left">
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li>2</li>
                        <li class="active">3</li>
                        <li>4</li>
                    </ul>
                    <div align="center" id="prevCard" style="display: none;"><img src="/T41/images/giftcard-preview.jpg" style="width:100%;max-width: 768px;"></div>
                    {!! trans('tfom.card.giftStep4') !!}
                </div>






                @include('TFO.front._footer')
            </div>
        </div>
        
        <!-- -->
        
        <div class="menu-box"></div>
        <div class="main-content"></div>
        
    </div>
    <!--lightbox-->
    {!! trans('tfo.reser.lightbox') !!}
</body>
<style type="text/css">
.bootstrap-datetimepicker-widget table td.disabled,.bootstrap-datetimepicker-widget table td.disabled:hover{color:#CCCCCC;}
.bootstrap-datetimepicker-widget table td {color:block;font-weight: bold;}
.btn{padding:12px;font-size: 15px;line-height: normal;vertical-align: baseline;}
</style>
<script src="/T41/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<script src="/T41/js/giftcard.js?v=0.1"></script>


</html>