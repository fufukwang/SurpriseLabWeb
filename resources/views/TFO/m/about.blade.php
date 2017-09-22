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
            
        <div id="about" class="content-box align-left">
            <div>
                {!! trans('tfom.about') !!}
            </div>
            @include('TFO.front._footer')
        </div>
    </div>
</body>
</html>