@include('Dark2.frontendone._header',['index' => true])
<body>
    <div class="wrap">

        @include('Dark2.frontendone._menu')
        

        
        <!-- first cut -->
        <div style="display:block;" class="section-index">
           
            <!-- 灰底 -->   
            <div class="logo-container">
                <div class="mask-box">

                    <!-- LOGO z: 1000 -->
                    <div class="main-slogan">
                        <div class="slogan-img show-1 shadow">
                            <img src="/d2one/images/slogan-bg.svg" alt="">
                            <img src="/d2one/images/m-slogan-shadow.png" alt="">
                        </div>


                        <div class="slogan-img show-1">
                            <img src="/d2one/images/slogan.svg" alt="">
                            <img src="/d2one/images/m-slogan.png" alt="">
                        </div>

<!--
                        <div class="visible-xs slogan-img ">
                            <img src="/d2one/images/cut2_index/slogan-phone2.png" alt="">
                        </div>
-->
<!--
                        <div class="visible-xs slogan-img ">
                            <img src="/d2one/images/cut2_index/slogan-phone1.png" alt="">
                        </div>
-->
                        <div>
                            <i class="fa fa-angle-down"></i>    
                        </div>
                    </div>

                    <div class="new-about">
                        <div class="season-two-about">
                            <h1 class="title">
                                體驗內容
                            </h1>
                            <h3 class="sub-title">
                                Experience
                            </h3>
                            <div class="about-box">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div>
                                            <div>
                                                <img src="/d2one/images/about-1.png" alt="">
                                                <img src="/d2one/images/about-1-shadow.png" alt="">
                                            </div>
                                            <p class="golden-font">
                                                九十分鐘
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div>
                                                <img src="/d2one/images/about-2.png" alt="">
                                                <img src="/d2one/images/about-2-shadow.png" alt="">
                                            </div>
                                            <p class="golden-font">
                                                五道料理
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div>
                                                <img src="/d2one/images/about-3.png" alt="">
                                                <img src="/d2one/images/about-3-shadow.png" alt="">
                                            </div>
                                            <p class="golden-font">
                                                無限驚喜
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-box">
                            <h1 class="title">
                                預售劃位流程
                            </h1>
                            <h3 class="sub-title">
                                Pre-Sale Schedule
                            </h3>
                            <p class="m-text-align-left">
                                無光晚餐採取先預購、後劃位的方式<b>訂位</b><br class="hidden-xs">依照購買票券、購買日期<b>順序</b>，分三梯次寄送劃位信
                            </p>
                            
                            <div style="max-width: 860px;margin: 120px auto">
                                <img style="width: 100%;" src="/d2one/images/timetable.png" alt="">
                                <img style="width: 100%;" src="/d2one/images/m-timetable.png" alt="">
                            </div>
                        </div>
                        <div id="ticket" class="season-two-about ticket-type">
                            <h1 class="title">
                                選擇票券
                            </h1>
                            <h3 class="sub-title">
                                Ticket Type
                            </h3>
                            <p>
                                點選票券，進入購買頁面<br>
                                選擇票券數量，完成預購
                            </p>
                            <span>
                                *套票價格均含一成服務費
                            </span>
                            <div class="ticket-box">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="https://surpriselab.backme.tw/checkout/922/5420?locale=zh-TW" id="a_5420">
                                            <img src="/d2one/images/ticket-1.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="https://surpriselab.backme.tw/checkout/922/5421?locale=zh-TW" id="a_5421">
                                            <img src="/d2one/images/ticket-2.png" alt="">
                                        </a>
                                        <p>
                                            限量<span id="limit_5421"></span>組｜剩餘<span id="count_5421"></span>組    
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="https://surpriselab.backme.tw/checkout/922/5422?locale=zh-TW" id="a_5422">
                                            <img src="/d2one/images/ticket-3.png" alt="">
                                        </a>
                                        <p>
                                            限量<span id="limit_5422"></span>組｜剩餘<span id="count_5422"></span>組    
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="sec-title">
                                優先劃位票
                                <span>
                                    Priority Ticket
                                    
                                </span>
                            </div>
                            <p class="m-text-align-left">
                                有特定日期需要慶祝、紀念、見面或是海外旅客，優先劃位票是最佳選擇
                            </p>
                            <p class="golden-font m-text-align-left">
                                優先劃位票享第一梯次最優先劃位權<br class="hidden-xs">於02/05搶先選擇日期與時段劃位
                            </p>
                            <div class="special-ticket">
                                <div>
                                    <a href="https://surpriselab.backme.tw/checkout/922/5423?locale=zh-TW" id="a_5423">
                                        <img src="/d2one/images/ticket-4.png" alt="">
                                    </a>
                                    <p>
                                        限量<span id="limit_5423"></span>組｜剩餘<span id="count_5423"></span>組    
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="time-slot">
                            <h1 class="title">
                                體驗場次
                            </h1>
                            <h3 class="sub-title">
                                Ｔime Slot                            
                            </h3>
                            <div class="time-slot-box">
                                <p class="golden-font">
                                    春季座位 02/28-04/14<br>開放場次如下
                                </p>
                                <table>
                                    <tr>
                                        <td width="60px">週一</td>
                                        <td>公休</td>
                                    </tr>
                                    <tr>
                                        <td>週二</td>
                                        <td>公休</td>
                                    </tr>
                                    <tr>
                                        <td>週三</td>
                                        <td>17:30-22:30</td>
                                    </tr>
                                    <tr>
                                        <td>週四</td>
                                        <td>17:30-22:30</td>
                                    </tr>
                                    <tr>
                                        <td>週五</td>
                                        <td>12:00-14:30 / 17:30-22:30</td>
                                    </tr>
                                    <tr>
                                        <td>週六</td>
                                        <td>12:00-14:30 / 17:30-22:30</td>
                                    </tr>
                                    <tr>
                                        <td>週日</td>
                                        <td>12:00-14:30 / 17:30-22:30</td>
                                    </tr>
                                </table>
                                <span>
                                    *會依實際狀況、售票情況有所調整
                                </span>
                            </div>
                           
                        </div>
                        <div class="grey-box">
                            <div class="pre-order-info">
                                <h1 class="title">
                                    售票狀況
                                </h1>
                                <h3 class="sub-title">
                                    Ticket Status
                                </h3>
                                <p>
                                    春季預售<br>
                                    訂購02/28-04/14座位<br>
                                    錯過冬季的你，這次，別再錯過
                                </p>
                                <div class="progress-bar-box">
                                    <div class="bar-box">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h1>
                                                // 啟動進度 //
                                            </h1>
                                            <p>
                                                <span class="percent">87</span>%
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <h1>
                                                // 已售出張數 //
                                            </h1>
                                            <p>
                                                <span class="tickets">1780</span>張
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <h1>
                                                // 預售啟動 //
                                            </h1>
                                            <p>
                                                <span class="days">50</span>天
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="black-box">
                            <h1 class="title">
                                其他服務
                            </h1>
                            <h3 class="sub-title">
                                Other
                            </h3>
                            <div class="other-box">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div>
                                            <div class="sec-title">
                                                無光規則
                                                <span>
                                                    Rules
                                                </span>
                                            </div>
                                            <div>
                                                <img src="/d2one/images/process2.png" alt="">
                                            </div>
                                            <a href="rules.html">
                                                <div class="other-btn">
                                                    查看規則
                                                </div>    
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div class="sec-title">
                                                無光體驗
                                                <span>
                                                    Experience
                                                </span>
                                            </div>
                                            <div>
                                                <img src="/d2one/images/process3.png" alt="">
                                            </div>
                                            <a href="experience.html">
                                                <div class="other-btn">
                                                    好奇寶寶
                                                </div>    
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div class="sec-title">
                                                聯絡我們
                                                <span>
                                                    Contant
                                                </span>
                                            </div>
                                            <div>
                                                <img src="/d2one/images/process1.png" alt="">
                                            </div>
                                            <a href="contact.html">
                                                <div class="other-btn">
                                                    聯絡我們
                                                </div>    
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('Dark2.frontendone._footer')
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
    <script src="/d2one/js/backme.js"></script>
</body>
</html>