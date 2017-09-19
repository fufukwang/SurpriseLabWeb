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
            <div class="content-box align-center" id="storybox">
            <div>
                <ul class="step-box mg-b-lg">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li class="active">5</li>
                </ul>
                <table class="reservation-table align-center">
                    <h4 style="font-weight: bold;">
                        付款成功，已幫您預留座位
                    </h4>
                    <p>
                        table for ONE 期待您 一人光臨<br>
                        請至信箱確認訂位信件與詳細的用餐規則
                    </p>
                    <p>
                        若您有30秒的空閒，歡迎與我們簡短分享<br>
                        「您，為何想來 table for ONE 」<br>的心情與故事。
                    </p>
                    <textarea name="story" id="story" cols="30" rows="10" class="textarea-story" placeholder="跟我們分享您的心情！"></textarea>
                    <div class="btn-box">
                        <a href="javascript:;" id="sent">
                            <div class="standard-btn">
                                送出
                            </div>    
                        </a>
                    </div>
                </table>
                <span class="copyright align-center">
                    copyright © 2017 驚喜製造
                </span>
            </div>
        </div>


            <div class="content-box align-center" id="fin" style="display: none;">
                <div>
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li class="active">5</li>
                    </ul>
                    <div class="table-box">
                        <h4 style="font-weight: bold;">
                            付款成功，已幫您預留座位
                        </h4>
                        <p>
                            table for ONE 期待您 一人光臨<br>
                            請至信箱確認訂位信件與詳細的用餐規則
                        </p>
                    </div>
                </div>
                <span class="copyright align-center">
                    copyright © 2017 驚喜製造
                </span>
            </div>

        </div>
    </div>
</body>
</html>
<script type="text/javascript">
$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#sent').bind('click',function(){
        $.post('/tableforone/ECPaySuccess',{story:$('#story').val()},function(){
            $('#storybox').hide();
            $('#fin').show();
        },'json');

    });
});
</script>