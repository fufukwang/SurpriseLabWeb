<!DOCTYPE html>
<head>
    <title>
        Table For One
    </title>
    @include('TFO.front._head')
    <script>
        fbq('track', 'ViewContent', { 
            content_name: 'Rules',
        });
    </script>
</head>
<body>
    <div class="wrapper" id="red-theme" key="1">    
        @include('TFO.front._logo')
        
        <div class="main-box">
            @include('TFO.front._nav')
            <div id="rules" class="content-box align-left">
                <div>
                    {!! trans('tfo.roles') !!}
                </div>
                @include('TFO.front._footer')
            </div>
        </div>
    </div>
</body>
</html>