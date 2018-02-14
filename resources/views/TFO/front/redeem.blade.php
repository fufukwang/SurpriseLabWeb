<!DOCTYPE html>
<head>
    <title>
        table for ONE 一人餐桌
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/T41/style/css/bootstrap.min.css">
    @include('TFO.front._head')
    <script>
        fbq('track', 'ViewContent', { 
            content_name: 'Redeem',
        });
    </script>
</head>
<body>
    <div class="wrapper" id="red-theme" key="1">    
        @include('TFO.front._logo')
        
        <div class="main-box">
            @include('TFO.front._nav')
            <div class="content-box">
                
                <div id="step1" class="align-center">
                    {!! trans('tfo.redeem.redeemStep1') !!}
                </div>


                <div class="gift-card-main" id="step2">
                    {!! trans('tfo.redeem.redeemStep2') !!}
                </div>



                <div id="step3" class="align-left">
                    <ul class="step-box mg-b-lg">
                        <li class="active">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
                    {!! trans('tfo.redeem.redeemStep3') !!}
                </div>



                <div id="step4" class="align-left">
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li class="active">2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
                    {!! trans('tfo.redeem.redeemStep4') !!}
                </div>




                <div id="step5" class="align-left">
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li>2</li>
                        <li class="active">3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
                    <form action="/tableforone/checkAndGenerateOrder" method="post" id="reservationForm">
                    {!! csrf_field() !!}
                    <input type="hidden" name="pro_id" id="pro_id">
                    <input type="hidden" name="code" id="MyCode">
                    <input type="hidden" name="lang" value="{{ $_SERVER['REQUEST_URI'] }}">
                    {!! trans('tfo.redeem.redeemStep5') !!}
                </div>



                <div id="step6" class="align-left">
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li class="active">4</li>
                        <li>5</li>
                    </ul>
                    {!! trans('tfo.redeem.redeemStep6') !!}
                </div>



                <div id="stepSuccess">
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li class="active">5</li>
                    </ul>
                    {!! trans('tfo.redeem.Success') !!}
                </div>

                <div id="stepFail">
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li class="active">5</li>
                    </ul>
                    {!! trans('tfo.redeem.Fail') !!}
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
<script src="/T41/js/redeem.js?v=0.3"></script>

</html>