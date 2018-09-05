<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header')
</head>
<body>
    <div class="wrap">
       
        <!-- mobile menu -->
        @include('Dark2.frontend._menu',['key'=>'pre-order'])
     
      
        <!-- header -->
        
        <div class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'pre-order'])
        </div>
       
        <!-- landing cut -->
        <!-- first cut -->
        
        <div class="section-02">
            <div class="main-container">
                <div class="main-box">
                    <!--h1>無光晚餐第二季 第二階段預售計畫 於 7/23 啟動</h1>
                    <div class="presale-logo-box">
                        <img src="/dark2/images/Pre-sale/Logo.png" alt="">
                        <img src="/dark2/images/Pre-sale/Seasontwo_small.png" alt="">    
                    </div>
                    <h1>
                        限定快閃 預售套票
                    </h1-->
                    <h1 style="letter-spacing: 3px;">無 光 晚 餐 秋 季 段 預 售 套 票</h1>
                    <p style="margin-top: 25px;" class="strong-words">
無光晚餐 09/01-11/25 座位已全數售罄<br >
錯 過 秋 季 預 售 且 有 興 趣 者<br >
歡 迎 來 信 無 光 晚 餐 客 服 信 箱 詢 問<br >
<!--
                        無光晚餐 07/04-09/16 座位已全數售罄<br >
秋季座位 09/22-11/04 座位，現正預售中<br >
若預購⼈數踴躍，將加開劃位⽇期⾄11⽉中後
-->
                    </p>
                    <p>
                        【 無光體驗 】<br><br>
                        五道料理<br>
                        +<br>
                        餐後小禮<br>
                        + <br>九十分鐘各式無光驚喜<br><br>
                        【 預售優惠 】<br> 1650元 / 每人<br><br><span style="font-size:12px;color:rgba(255,255,255,.3);">(原價2200元)<br>以上價格已含一成服務費</span>
                        <!--span class="strong-words">
                            【 預售優惠 】<br><br> 1650元 / 每人
                        </span-->
                    </p>
                    <p>
購買者將於九⽉初寄出劃位信件，收到信件即可劃位<br >
劃位階段可⾃⾏選擇欲前來⽇期、時段<br >
與選擇葷⻝或蛋奶素，並備註飲⻝過敏<br ><br >
無光晚餐固定週⼀、週⼆公休
                    </p>
                    <p style="margin-top: 25px;" class="strong-words">
                        購買預售，享最低75折至最高67折之優惠<br />
前500名預購者，享優先劃位權
                    </p>
                </div>
            </div>
            <!--div class="season-two-about pre-order-section">
                <p>
                    請點選商品前往付款 ⬇
                </p>
                <div class="pre-order-box">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="https://surpriselab.backme.tw/checkout/855/4615?locale=zh-TW" id="a_4615">
                                <div>
                                    <img src="/dark2/images/Pre-sale/Button_4.png" alt="">    
                                </div>
                            </a>
                            <p></p>
                        </div>
                        <div class="col-md-6">
                            <a href="https://surpriselab.backme.tw/checkout/855/4617?locale=zh-TW" id="a_4617">
                                <div>
                                    <img src="/dark2/images/Pre-sale/Button_1.png" alt="">  
                                    <div class="limit">
                                        <img src="/dark2/images/Pre-sale/Limited.png" alt="">
                                    </div>  
                                </div>
                            </a>
                            <p>
                                剩餘 <span id="count_4617"></span> 份
                            </p>
                        </div>
                        <div class="col-md-6">
                            <a href="https://surpriselab.backme.tw/checkout/855/4616?locale=zh-TW" id="a_4616">
                                <div>
                                    <img src="/dark2/images/Pre-sale/Button_5.png" alt="">    
                                </div>
                            </a>
                            <p></p>
                        </div>
                        <div class="col-md-6">
                            <a href="https://surpriselab.backme.tw/checkout/855/4618?locale=zh-TW" id="a_4618">
                                <div>
                                    <img src="/dark2/images/Pre-sale/Button_2.png" alt="">    
                                    <div class="limit">
                                        <img src="/dark2/images/Pre-sale/Limited.png" alt="">
                                    </div>  
                                </div>
                            </a>

                            <p>
                                剩餘 <span id="count_4618"></span> 份
                            </p>
                        </div>
                        <div class="col-md-6">
                            <a href="https://surpriselab.backme.tw/checkout/855/4619?locale=zh-TW" id="a_4619">
                                <div>
                                    <img src="/dark2/images/Pre-sale/Button_3.png" alt="">    
                                    <div class="limit">
                                        <img src="/dark2/images/Pre-sale/Limited.png" alt="">
                                    </div>  
                                </div>
                            </a>
                            <p>
                                剩餘 <span id="count_4619"></span> 份
                            </p>
                        </div>
                        
                        
                    </div>    
                </div>
                <p>
                    *以上套票價格均已含一成服務費<br>
                    *預計第二階段日期為 09/22-11/04<br>
                </p>
            </div-->
        </div>   
        @include('Dark2.frontend._footer')
    </div>
<script type="text/javascript">
/*
$(function(){
    $.get('https://surpriselab.backme.tw/api/projects/855.json?token=15171aa66ababafd4464a1c194b66102',function(data){
        var item = data.rewards;
        for(var i=0;item.length>i;i++){
            var count = parseInt(item[i].quantity_limit) - parseInt(item[i].pledged_count) - parseInt(item[i].wait_pledged_count);
            $('#count_'+item[i].id).text(count);
            if(count == 0){
                $('#a_'+item[i].id+' div img').css({"-webkit-filter":"grayscale(1)"});
                $('#a_'+item[i].id).bind('click',function(){
                    alert('限量已完售!!');
                    return false;
                });
                $('#count_'+item[i].id).parent().text('已完售');
            }
        }

    },'json');
});
*/
</script>
</body>
</html>
