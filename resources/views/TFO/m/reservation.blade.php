<!DOCTYPE html>
<head>
    <title>
        table for ONE 一人餐桌
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/T41/style/css/bootstrap.min.css">
    @include('TFO.m._head')
    <script>
        fbq('track', 'ViewContent', { 
            content_name: 'Reservation',
        });
    </script>
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
            <div class="content-box align-left">
                



                <div id="step1">
                    <ul class="step-box mg-b-lg">
                        <li class="active">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
                    <div class="table-box">
                        {!! trans('tfom.reser.step1') !!}
                    </div>
                    @include('TFO.front._footer')
                </div>



            <div id="step2">
                <ul class="step-box mg-b-lg">
                    <li>1</li>
                    <li class="active">2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                </ul>
                {!! trans('tfom.reser.step2') !!}
                @include('TFO.front._footer')
            </div>



            <div id="step3">
                <ul class="step-box mg-b-lg">
                    <li>1</li>
                    <li>2</li>
                    <li class="active">3</li>
                    <li>4</li>
                    <li>5</li>
                </ul>
                <form action="/tableforone/generateOrder" method="post" id="reservationForm">
                    {!! csrf_field() !!}
                    <input type="hidden" name="pro_id" id="pro_id">
                    <input type="hidden" name="item" id="item">
                    <input type="hidden" name="lang" value="{{ $_SERVER['REQUEST_URI'] }}">
                {!! trans('tfom.reser.step3') !!}
                @include('TFO.front._footer')
            </div>



            <div id="step4">
                <ul class="step-box mg-b-lg">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li class="active">4</li>
                    <li>5</li>
                </ul>
                {!! trans('tfom.reser.step4') !!}
                @include('TFO.front._footer')
            </div>







            </div>
    </div>


    <!--lightbox-->
    {!! trans('tfom.reser.lightbox') !!}
    
<style type="text/css">
.bootstrap-datetimepicker-widget table td.disabled,.bootstrap-datetimepicker-widget table td.disabled:hover{color:#CCCCCC;}
.bootstrap-datetimepicker-widget table td {color:block;font-weight: bold;}
.btn{padding:12px;font-size: 15px;line-height: normal;vertical-align: baseline;}
</style>
<script src="/T41/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<script src="/T41/js/reservation.js?v=0.4"></script>
</body>
</html>