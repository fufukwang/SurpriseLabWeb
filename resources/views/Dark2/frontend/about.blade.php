<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header',['index' => true])

</head>
<body>
    <div class="wrap">

        <!-- mobile menu -->

        @include('Dark2.frontend._menu',['key'=>'about'])  

        <!-- header -->

        <div style="position:relative;z-index:1" class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'about'])
        </div>

        <!-- first cut -->
        <div style="display:block;" class="section-index">
           
            <!-- 灰底 -->   
            <div class="logo-container">
                <div class="mask-box">
                    <!-- LOGO z: 1000 -->
                    <div class="main-slogan">
                        <div class="slogan-img show-1 shadow hidden-xs">
                            <img src="/dark2/images/About/Wording_1_2.png" alt="">
                        </div>
                        <div class="slogan-img show-2 shadow hidden-xs">
                            <img src="/dark2/images/About/Wording_2_2.png" alt="">
                        </div>
                        <div class="slogan-img show-3 shadow hidden-xs">
                            <img src="/dark2/images/About/Wording_3_2.png" alt="">
                        </div>


                        <div class="slogan-img show-1 hidden-xs">
                            <img src="/dark2/images/About/Wording_1.png" alt="">
                        </div>
                        <div class="slogan-img show-2 hidden-xs">
                            <img src="/dark2/images/About/Wording_2.png" alt="">
                        </div>
                        <div class="slogan-img show-3 hidden-xs">
                            <img src="/dark2/images/About/Wording_3.png" alt="">
                        </div>

                        <div class="visible-xs slogan-img ">
                            <img src="/dark2/images/cut2_index/slogan-phone2.png" alt="">
                        </div>
                        <div class="visible-xs slogan-img ">
                            <img src="/dark2/images/cut2_index/slogan-phone1.png" alt="">
                        </div>

                        <a href="pre-order.html">
                            <div class="btn btn-standard landing-btn show-4">
                                前往預售
                            </div>
                        </a>
                        <div>
                            <i class="fa fa-angle-down"></i>    
                        </div>
                    </div>

                    <div class="new-about">
                        <div class="pre-order-info">
                            <p>
                                無光晚餐重磅回歸<br>
                                這次，別再錯過
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
                                            // 啟動進度 //
                                        </h1>
                                        <p>
                                            <span class="days">0</span>天
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="season-two-about">
                            <h1>無光晚餐 第二季<br>
                            DINING IN THE DARK</h1>
                            <p>
                                暫時關起視覺，讓一切回歸未知
                            </p>
                            <p>
                                用 僅 剩 的 聽 覺、嗅 覺、觸 覺、味 覺<br> 重新探索你我熟悉的人、事、物，甚至世界
                            </p>
                            <p>
                                每晚為你準時熄燈，<br>端上前所未有的黑暗用餐體驗
                            </p>
                        </div>
                        <div class="timeline-box">
                            <h1>
                                Timeline
                            </h1>
                            <ul class="timeline">
                                <li class="important">
                                    <div class="date">05/04</div>
                                    <div class="dot"></div>
                                    <p>
                                        預售開始:目標預售 3000張
                                    </p>
                                </li>
                                <li>
                                    <div class="date">06/04</div>
                                    <div class="dot"></div>
                                    <p>
                                        預售截止
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">06/05</div>
                                    <div class="dot"></div>
                                    <p>
                                        第一階段發放序號劃位:前500名購買者
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">06/15</div>
                                    <div class="dot"></div>
                                    <p>
                                        第二階段發放序號劃位:其餘預售購買者
                                    </p>
                                </li>
                                <li>
                                    <div class="date">06/25</div>
                                    <div class="dot"></div>
                                    <p>
                                        開放一般訂位
                                    </p>
                                </li>
                                <li class="important">
                                    <div class="date">07/01</div>
                                    <div class="dot"></div>
                                    <p>
                                        快閃開始
                                    </p>
                                </li>
                                <li>
                                    <div class="date">08/31</div>
                                    <div class="dot"></div>
                                    <p>
                                        快閃結束
                                    </p>
                                </li>
                            </ul>
                            <span>
                                *為確保提供最好品質的無光體驗，確切劃位與快閃日期會依情況微調。
                            </span>
                        </div>
                        <div class="hashtag-box season-two-about">
                            <h1>
                                #無光晚餐
                            </h1>
                            <div class="hashtag-container"><div><iframe src="https://live.memopresso.com/embed?token=albert&title=new&titlePosition=0&displayType=waterfall&initCount=20&showLoadMore=true&showLogo=false&showTitle=false&contentColor=999999&tagColor=89229b&displaySequence=RANDOM&" id="memopresso_embed" width="100%" scrolling="No" frameborder="0"></iframe><script type="text/javascript">window.onmessage = function(event) {document.getElementById("memopresso_embed").height = event.data};setInterval(function(){document.getElementById("memopresso_embed").contentWindow.postMessage("","*");}, 500);</script></div></div>
                            <a href="pre-order.html">
                                <div class="btn btn-standard landing-btn">
                                    前往預售
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
    {{ config('setting.dark2.ptah') }}
    @if(Session::has('message')) <script type="text/javascript">alert('{{ Session::get('message') }}');</script> @endif
    <script type="text/javascript">
    $(function(){
        $('a').each(function(){
            var href = $(this).attr('href');
            if(href.indexOf('dininginthedark2')<0){
                if(href!='#'){
                    if(location.pathname.indexOf('en')>0){
                        $(this).attr('href','/dininginthedark2/en/'+href);
                    } else {
                        $(this).attr('href','/dininginthedark2/'+href);
                    }
                }
            }
        });


        $.get('https://surpriselab.backme.tw/api/projects/820.json?token=15171aa66ababafd4464a1c194b66102',function(data){
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


    });
    </script>
</body>
</html>
