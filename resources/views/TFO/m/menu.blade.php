<!DOCTYPE html>
<head>
    <title>
       table for ONE 一人餐桌
    </title>
    @include('TFO.m._head')
    <script>
        fbq('track', 'ViewContent', { 
            content_name: 'Menu',
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
            
        <div class="content-box align-left">
            <div>
                {!! trans('tfom.menu') !!}
            </div>
            @include('TFO.front._footer')
        </div>
    </div>
</body>
</html>