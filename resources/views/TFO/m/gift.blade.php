<!DOCTYPE html>
<head>
    <title>
        table for ONE 一人餐桌
    </title>
    @include('TFO.m._head')
    <script>
        fbq('track', 'ViewContent', { 
            content_name: 'Gift',
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


        <div class="main-box">
            <div id="git" class="content-box align-center">
                <div class="mg-t-lg">
                    <h1><img style="max-width: 215px" src="/T41/images/giftcard/tableforone.png" alt=""></h1>
                    {!! trans('tfom.gift') !!}
                    @include('TFO.front._footer')
                </div>

               
            </div>
        </div>
    </div>
</body>
</html>
