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
                    <div class="presale-logo-box">
                        <img src="/dark2/images/Pre-sale/Logo.png" alt="">
                        <img src="/dark2/images/Pre-sale/Seasontwo_small.png" alt="">    
                    </div>
                    <h1>
                        限定快閃 預售套票
                    </h1>
                    <p>
                        【 無光體驗 】<br><br>
                        五道料理<br>
                        +<br>
                        餐後小禮<br>
                        + <br>九十分鐘各式無光驚喜<br><br>
                        【 體驗原價 】<br><br> 2200元 / 每人<br><br><br>
                        <span class="strong-words">
                            【 預售優惠 】<br><br> 1650元 / 每人
                        </span>
                    </p>
                    <p style="margin-top: 25px;" class="strong-words">
                        ★ 前500名購買者，將優先於6/5收到劃位序號搶先訂位
                    </p>
                </div>
            </div>
            <div class="season-two-about pre-order-section">
                <p>
                    請點選商品前往付款 ⬇
                </p>
                <div class="pre-order-box">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="https://surpriselab.backme.tw/checkout/820/4380?locale=zh-TW">
                                <div>
                                    <img src="/dark2/images/Pre-sale/Button_4.png" alt="">    
                                </div>
                            </a>
                            <p></p>
                        </div>
                        <div class="col-md-6">
                            <a href="https://surpriselab.backme.tw/checkout/820/4386?locale=zh-TW">
                                <div>
                                    <img src="/dark2/images/Pre-sale/Button_1.png" alt="">  
                                    <div class="limit">
                                        <img src="/dark2/images/Pre-sale/Limited.png" alt="">
                                    </div>  
                                </div>
                            </a>
                            <p>
                                剩餘 <span id="count_4386"></span> 份
                            </p>
                        </div>
                        <div class="col-md-6">
                            <a href="https://surpriselab.backme.tw/checkout/820/4385?locale=zh-TW">
                                <div>
                                    <img src="/dark2/images/Pre-sale/Button_5.png" alt="">    
                                </div>
                            </a>
                            <p></p>
                        </div>
                        <div class="col-md-6">
                            <a href="https://surpriselab.backme.tw/checkout/820/4387?locale=zh-TW">
                                <div>
                                    <img src="/dark2/images/Pre-sale/Button_2.png" alt="">    
                                    <div class="limit">
                                        <img src="/dark2/images/Pre-sale/Limited.png" alt="">
                                    </div>  
                                </div>
                            </a>

                            <p>
                                剩餘 <span id="count_4387"></span> 份
                            </p>
                        </div>
                        <div class="col-md-6">
                            <a href="https://surpriselab.backme.tw/checkout/820/4388?locale=zh-TW">
                                <div>
                                    <img src="/dark2/images/Pre-sale/Button_3.png" alt="">    
                                    <div class="limit">
                                        <img src="/dark2/images/Pre-sale/Limited.png" alt="">
                                    </div>  
                                </div>
                            </a>
                            <p>
                                剩餘 <span id="count_4388"></span> 份
                            </p>
                        </div>
                        
                        
                    </div>    
                </div>
                <p>
                    *以上套票價格均已含一成服務費<br>
                    <span class="strong-words">*預售票價可享75折，最高67折優惠</span><br>
                    *預計快閃日期 2018/07-2018/08<br>
                    *預售套票人數不可拆開始用
                </p>
            </div>
        </div>   
        @include('Dark2.frontend._footer')
    </div>
<script type="text/javascript">
$(function(){
    $.get('https://surpriselab.backme.tw/api/projects/820.json?token=15171aa66ababafd4464a1c194b66102',function(data){
        var item = data.rewards;
        for(var i=0;item.length>i;i++){
            var count = parseInt(item[i].quantity_limit) - parseInt(item[i].pledged_count) - parseInt(item[i].wait_pledged_count);
            $('#count_'+item[i].id).text(count);
        }

    },'json');
});
</script>
</body>
</html>
