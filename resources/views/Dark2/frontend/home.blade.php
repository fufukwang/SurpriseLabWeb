<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header',['index' => true])
<style type="text/css">
.section-index .logo-container .main-slogan{
    padding-top: 460px;
    margin-top: 100px;
}
@media (max-width: 776px){
    .section-index .logo-container .main-slogan {
        padding-top: 250px;
    }
}
</style>
</head>
<body>
    <div class="wrap">

        <!-- mobile menu -->

        @include('Dark2.frontend._menu',['key'=>'index'])  

        <!-- header -->

        <div style="position:relative;z-index:1" class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'index'])
        </div>

        <!-- landing cut -->
        <!-- 底紋 -->
        <div style="display:block;" class="section-01">
            <!-- 灰底 -->   
            <div class="logo-container">
                <!-- LOGO z: 1000 -->
                <div class="main-logo">
                    <img src="/dark2/images/cut1-intro/logo-big.png" alt="">
                    <img src="/dark2/images/Landing-page/Seasontwo.png" class="seasontwo" alt="">
                    <div class="btn btn-standard landing-btn">
                        ENTER
                    </div>
                </div>

                <!-- 盤子 z: 100 -->
                <div class="folks">

                </div>

                <!-- 光 z: 10 -->
                <div class="light light-lg hidden-xs">

                </div>
                
                <div class="light light-xs visible-xs">
                    
                </div>


                <!-- 遮罩  z: 500-->
                <div class="mask">

                </div>
                
            </div>
        </div>
        
        <!-- first cut -->
        <div style="display:block;" class="section-index">
           
            <!-- 灰底 -->   
            <div class="logo-container">
                <div class="mask-box">
                    <!-- LOGO z: 1000 -->
                    <div class="main-slogan">
                        <!--div class="slogan-img show-1 shadow hidden-xs">
                            <img src="/dark2/images/About/Wording_1_2.png" alt="">
                        </div>
                        <div class="slogan-img show-2 shadow hidden-xs">
                            <img src="/dark2/images/About/Wording_2_2.png" alt="">
                        </div>
                        <div class="slogan-img show-3 shadow hidden-xs">
                            <img src="/dark2/images/About/Wording_3_2.png" alt="">
                        </div-->


                        <div class="slogan-img show-1 hidden-xs">
                            <img src="/dark2/images/About/Wording_1.png?v1" alt="">
                        </div>
                        <div class="slogan-img show-2 hidden-xs">
                            <img src="/dark2/images/About/Wording_2.png?v1" alt="">
                        </div>
                        <div class="slogan-img show-3 shadow hidden-xs">
                            <img src="/dark2/images/About/Wording_3.png?v1" alt="">
                        </div>
                        <div class="slogan-img show-3 shadow hidden-xs">
                            <img src="/dark2/images/About/Wording_4.png?v1" alt="">
                        </div>

                        <div class="visible-xs slogan-img ">
                            <img src="/dark2/images/cut2_index/wording-mobile.png" alt="">
                        </div>


                        <a href="pre-sale.html">
                            <div class="btn btn-standard landing-btn show-4">
                                我了解
                            </div>
                        </a>
                        <!--div>
                            <i class="fa fa-angle-down"></i>    
                        </div-->
                    </div>

                    <div class="new-about">
                        <div class="pre-order-info">
                            <p>
                                <div style="font-size:24px;letter-spacing: 2px">無光晚餐第二季</div>
<div style="letter-spacing: 8px;font-size:22px;">第二階段預售啟動<br /><br /></div>
07/04-09/16座位已全數額滿<br />
想參與無光晚餐的你，別錯過第⼆階段預售<br /><br />
本階段將劃 09/22-11/04 期間之座位

                            </p>
                            <div class="progress-bar-box">
                                <div class="bar-box">
                                    <div class="bar" style="width: 0%"></div>
                                </div>
                            </div>
                            <div class="info-box">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h1>
                                            // 啟動進度 //
                                        </h1>
                                        <p>
                                            <span class="percent">0</span>%
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <h1>
                                            // 已售出張數 //
                                        </h1>
                                        <p>
                                            <span class="tickets">0</span>張
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <h1>
                                            // 目標 2000 張 //
                                        </h1>
                                        <p>
                                            <span class="days">0</span>天
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="season-two-about">
                            <h1>無 光 晚 餐 第 ⼆ 季<br>
                            DINING IN THE DARK</h1>
                            <p>
                                “真正重要的東⻄，⽤眼睛是看不⾒的”<br />
                                “What is essential is invisible to the eye.”<br /><br />
                                - ⼩王⼦ Le Petit Prince -
                            </p>
                            <p>
                                在⿊暗中，⽤僅剩的感官<br> 重新發掘、探索、感受，你我熟悉的⼈事物
                            </p>
                            <p>
                                無光，所以更清楚
                            </p>
                        </div>
                        <div class="timeline-box">
                            <h1>
                                Timeline
                            </h1>
                            <ul class="timeline">
                                <!--li class="important">
                                    <div class="date">05/04</div>
                                    <div class="dot"></div>
                                    <p>
                                        預售開始:目標預售 3000張
                                    </p>
                                </li>
                                <li>
                                    <div class="date">06/15</div>
                                    <div class="dot"></div>
                                    <p>
                                        預售截止 (從6/4延長至6/15)
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">06/16</div>
                                    <div class="dot"></div>
                                    <p>
                                        第一階段發放序號劃位:前500名購買者
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">06/20</div>
                                    <div class="dot"></div>
                                    <p>
                                        第二階段發放序號劃位:其餘預售購買者
                                    </p>
                                </li>
                                <li>
                                    <div class="date">07/02</div>
                                    <div class="dot"></div>
                                    <p>
                                        開放一般訂位
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">07/04</div>
                                    <div class="dot"></div>
                                    <p>
                                        快閃開始
                                    </p>
                                </li>
                                <li>
                                    <div class="date">09/16</div>
                                    <div class="dot"></div>
                                    <p>
                                        第一階段快閃結束
                                    </p>
                                </li-->
                                <li class="important">
                                    <div class="date">07/16</div>
                                    <div class="dot"></div>
                                    <p>
                                        第二階段預售開始
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">08/31</div>
                                    <div class="dot"></div>
                                    <p>
                                        預售截止<br />
<span style="font-size:12px;">若達2000人預購將開啟快閃 <br />
未達2000人，將公布預售失敗<br />
並於 09/20 前全額退費給參與者<span>
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">09/01</div>
                                    <div class="dot"></div>
                                    <p>
                                        發放劃位序號 -<br >前500名預售購買者<br />
                                        <span style="font-size:12px;">收到序號後，即可劃位</span>
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">09/10</div>
                                    <div class="dot"></div>
                                    <p>
                                        發放劃位序號 -<br >其餘預售購買者<br />
                                        <span style="font-size:12px;">收到序號後，即可劃位</span>
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">09/20</div>
                                    <div class="dot"></div>
                                    <p>
                                        開放一般訂位
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">09/22</div>
                                    <div class="dot"></div>
                                    <p>
                                        第二階段快閃開始
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">11/04</div>
                                    <div class="dot"></div>
                                    <p>
                                        第二階段快閃結束
                                    </p>
                                </li>
                            </ul>
                            <span style="color:white;">
                                為提供最好品質的無光體驗<br />上述⽇期會依情況彈性調整
                            </span>
                            <a href="pre-sale.html">
                                <div class="btn btn-standard landing-btn">
                                    前往預售
                                </div>
                            </a>
                        </div>
                        <div class="hashtag-box season-two-about">
                            <h1>
                                #無光晚餐第一季
                            </h1>
                            <div class="hashtag-container" style="pointer-events: none;"><div><iframe src="https://live.memopresso.com/embed?token=albert&title=new&titlePosition=0&displayType=waterfall&initCount=20&showLoadMore=true&showLogo=false&showTitle=false&contentColor=999999&tagColor=89229b&displaySequence=RANDOM&" id="memopresso_embed" width="100%" scrolling="No" frameborder="0"></iframe><script type="text/javascript">window.onmessage = function(event) {document.getElementById("memopresso_embed").height = event.data};setInterval(function(){document.getElementById("memopresso_embed").contentWindow.postMessage("","*");}, 500);</script></div></div>
                            <a href="reservation.html">
                                <div class="btn btn-standard landing-btn">
                                    前往訂位
                                </div>
                            </a>
                        </div>
                    </div>
                    @include('Dark2.frontend._footer')
                </div>
                
                
                <!-- 光 z: 10 -->
                <div class="light light-lg hidden-xs">

                </div>

                <div class="light light-xs visible-xs">

                </div>

                <!-- 遮罩  z: 500-->
                <div class="mask">

                </div>

            </div>
        </div>

    </div>
    @if(Session::has('message')) <script type="text/javascript">alert('{{ Session::get('message') }}');</script> @endif
    <script type="text/javascript">
    $(function(){
        $('a').each(function(){
            var href = $(this).attr('href');
            if(href.indexOf("dininginthedark2")<0){
                if(href!='#' && href.indexOf('http')==-1 && href.indexOf('mailto')==-1 && href.indexOf('https')==-1){
                    if(window.location.pathname.indexOf('en')>0){
                        $(this).attr('href','/dininginthedark2/en/'+href);
                    } else {
                        $(this).attr('href','/dininginthedark2/'+href);
                    }
                }
            }
        });


        $.get('https://surpriselab.backme.tw/api/projects/855.json?token=15171aa66ababafd4464a1c194b66102',function(data){
            var item = data.rewards;
            var count = 0;
            for(var i=0;item.length>i;i++){
                var item_count = parseInt(item[i].pledged_count);
                switch(item[i].id){
                    case 4380: item_count *= 2; break;
                    case 4386: item_count *= 2; break;
                    case 4385: item_count *= 4; break;
                    case 4387: item_count *= 4; break;
                    case 4388: item_count *= 6; break;
                }
                count += item_count;
            }
            var percent = parseInt((count / 3000) * 100);
            $('.percent').text( percent );
            if(percent>100) percent = 100;
            $('.bar').css("width",percent+"%");
            $('.tickets').text(count);
            var now  = new Date();
            var day  = new Date(data.end_date);
            var days = Math.ceil( (day.getTime()-now.getTime())/(24*60*60*1000) );
            if(days<0) days = 0;
            $('.days').text(days);

        },'json');

        if(window.location.pathname.indexOf('about\.html')>0){
            $('.main-logo .landing-btn').trigger('click');
        }

    });
    </script>
</body>
</html>
