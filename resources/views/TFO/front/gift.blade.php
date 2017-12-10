<!DOCTYPE html>
<head>
    <title>
        table for ONE 一人餐桌
    </title>
    @include('TFO.front._head')
    <script>
        fbq('track', 'ViewContent', { 
            content_name: 'Gift',
        });
    </script>
</head>
<body>
    <div class="wrapper" id="red-theme" key="1">    
        @include('TFO.front._logo')
        
        <div class="main-box">
            @include('TFO.front._nav')
            <div id="git" class="content-box align-center">
                <div class="mg-t-lg">
                    <h1><img style="max-width: 215px" src="/T41/images/giftcard/tableforone.png" alt=""></h1>
                    {!! trans('tfo.gift') !!}
                    @include('TFO.front._footer')
                </div>

               
            </div>
        </div>
    </div>
</body>
</html>