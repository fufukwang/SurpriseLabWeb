<!DOCTYPE html>
<head>
    <title>
        Table For One
    </title>
    @include('TFO.front._head')
</head>
<body>
    <div class="wrapper" id="red-theme" key="1">    
        @include('TFO.front._logo')
        
        <div class="main-box">
            @include('TFO.front._nav')
            <div id="about" class="content-box align-left">
                <div>
                    {!! trans('tfo.about') !!}
                    <div class="ig-wall-box">
                        <h1>
                            # tableforone
                        </h1>
                        <ul>
                            <li>
                                <img src="/T41/images/about/ig-01.png" alt="">
                            </li>
                            <li>
                                <img src="/T41/images/about/ig-02.png" alt="">
                            </li>
                            <li>
                                <img src="/T41/images/about/ig-03.png" alt="">
                            </li>
                            <li>
                                <img src="/T41/images/about/ig-04.png" alt="">
                            </li>
                            <li>
                                <img src="/T41/images/about/ig-05.png" alt="">
                            </li>
                            <li>
                                <img src="/T41/images/about/ig-06.png" alt="">
                            </li>
                            <li>
                                <img src="/T41/images/about/ig-07.png" alt="">
                            </li>
                            <li>
                                <img src="/T41/images/about/ig-08.png" alt="">
                            </li>                            
                        </ul>
                    </div>
                </div>
                @include('TFO.front._footer')
            </div>
        </div>
    </div>
</body>
</html>