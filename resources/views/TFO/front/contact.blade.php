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
            <div class="content-box align-left">
                <div>
                    {!! trans('tfo.contact.text') !!}
                    <form action="/TableForOne/frontcontactstore" method="post" id="contentForm">
                    {!! csrf_field() !!}
                    {!! trans('tfo.contact.form') !!}
                </div>
           
                @include('TFO.front._footer')
            </div>
        </div>
    </div>
</body>
<script src="/T41/js/contact.js"></script>
</html>