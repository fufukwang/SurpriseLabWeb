<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="歡迎來到落日轉運站，我們提供陸、海、空三種交通方式，準時接駁您前往旅途的終點  ─落日轉運站第一站落點於高雄，其中共有三項沈浸式體驗，為驚喜製造至今規模最大之沉浸式作品">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="落日轉運站 The Sunset Terminal"/>
    <meta property="og:site_name" content="落日轉運站 The Sunset Terminal"/>
    <meta property="og:description" content="歡迎來到落日轉運站，我們提供陸、海、空三種交通方式，準時接駁您前往旅途的終點  ─落日轉運站第一站落點於高雄，其中共有三項沈浸式體驗，為驚喜製造至今規模最大之沉浸式作品"/>
    <meta property="og:url" content="https://surpriselab.com.tw/terminal/"/>
    <meta property="og:image" content="https://surpriselab.com.tw/terminalAssets/images/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="落日轉運站 The Sunset Terminal">
    <meta name="twitter:description" content="歡迎來到落日轉運站，我們提供陸、海、空三種交通方式，準時接駁您前往旅途的終點  ─落日轉運站第一站落點於高雄，其中共有三項沈浸式體驗，為驚喜製造至今規模最大之沉浸式作品">
    <meta name="twitter:image" content="https://surpriselab.com.tw/terminalAssets/images/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">

    <title>落日轉運站 The Sunset Terminal</title>

    <!-- Style -->
    <link rel="icon" href="/terminalAssets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/terminalAssets/css/plugins/bootstrap-5.1.3/bootstrap.min.css"/>

    <!-- Loading Style -->
    <link rel="stylesheet" type="text/css" href="/terminalAssets/css/plugins/loading.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/terminalAssets/css/plugins/icomoon/style.css">
    <link rel="stylesheet" href="/terminalAssets/css/main-component.css">
    <link rel="stylesheet" href="/terminalAssets/css/activity-component.css">
    <link rel="stylesheet" href="/terminalAssets/css/rules.css">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T7V2BQQ');</script>
<!-- End Google Tag Manager -->
</head>
<body class="loading">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7V2BQQ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    @include('terminal.frontend._nav')
{{--
    <!-- fixed btn - message -->
    <aside class="fixed-btn message-btn js-hidden-target">
        <!-- Button trigger modal -->
        <a href="javascript://" class="image-wrap" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <img src="/terminalAssets/images/general/btn_news.png" class="pc-style" alt="message">
            <img src="/terminalAssets/images/general/btn_news_mobile.png" class="mobile-style" alt="message">
        </a>
    </aside>
--}}
    <!-- fixed btn - what's on -->
    <aside class="fixed-btn cta-btn js-hidden-target">
        <a href="booking_now" class="image-wrap">
            <img src="/terminalAssets/images/general/btn_booking.png" class="pc-style" alt="what's on">
            <img src="/terminalAssets/images/general/btn_booking_mobile.png" class="mobile-style" alt="what's on">
        </a>
    </aside>
    
    <main class="background-wallpaper">
        <section class="section-rule-wrap">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="content-wrap">
                            <!-- Heading -->
                            <div class="section-heading-wrap">
                                <h1 class="heading-title">站內規則</h1>
                                <h3 class="heading-subtitle">RULES</h3>
                            </div>

                            <!-- Tab -->
                            <div class="rule-tab-wrap">
                                <!-- Tab Nav -->
                                <ul class="nav nav-tabs tag-btn-wrap" id="ruleTab" role="tablist">
                                    <li class="nav-item js-scroll-top" role="presentation">
                                        <button class="nav-link tag-btn active" id="qa-tab" data-bs-toggle="tab" data-bs-target="#qa" type="button" role="tab" aria-controls="qa" aria-selected="true">問與答</button>
                                    </li>
                                    <li class="nav-item js-scroll-top" role="presentation">
                                        <button class="nav-link tag-btn" id="change-tab" data-bs-toggle="tab" data-bs-target="#change" type="button" role="tab" aria-controls="change" aria-selected="false">改期退費</button>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content" id="ruleTabContent">
                                    <div class="tab-pane fade show active" id="qa" role="tabpanel" aria-labelledby="qa-tab">
                                        <div class="block-wrap">
                                            <div class="section-heading-wrap">
                                                <h2 class="heading-accordion-title">關於落日轉運站</h2>
                                            </div>

                                            <div class="accordion rule-accordion-wrap" id="accordionFlushExample-1">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-1-headingOne">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-1-collapseOne" aria-expanded="false" aria-controls="flush-1-collapseOne">
                                                            <span class="header-title">落日轉運站的內容有什麼？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-1-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-1-headingOne" data-bs-parent="#accordionFlushExample-1">
                                                        <div class="accordion-body">
                                                            <p>《 落日轉運站 Sunset Terminal 》為驚喜製造第八號沉浸式作品，也是團隊於台北累積 6 年後，首次於南台灣的製作。</p>
                                                            <p>《 落日轉運站 》中包含兩項沉浸式體驗，分別為探討遺憾的故事沉浸體驗《 微醺列車 》及由英國 Darkfield 團隊製作的聲音劇場《 FLIGHT 》。</p>
                                                            <p>身為體驗者的你，可以自由選擇要哪些作品。當然，兩項都體驗一定是最讚的！</p>
                                                            <p>現場也有一戶外場域《 落日月台 》，並開放給所有人。此處散發著落日的燈光氛圍，並販售簡易酒飲與小點，供大家小酌聊天。</p>
                                                            <p>若你於體驗前提早抵達，歡迎在此等待；體驗後也能在此與同場次者分享感覺、拼湊故事；未購買體驗票券能進入《 落日月台 》嗎？當然，此處開放給所有人，只要你想來，我們就歡迎。</p>
                                                            <p>欲購了解作品與價位，請至 <a href="booking_now" class="link-text style-qa">Ticket</a> 了解更多；欲了解落日月台，請至 <a href="/terminal#projects" class="link-text style-qa">Projects</a>了解更多。</p>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-1-headingTwo">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-1-collapseTwo" aria-expanded="false" aria-controls="flush-1-collapseTwo">
                                                            <span class="header-title">落日轉運站的地點在哪裡？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-1-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-1-headingTwo" data-bs-parent="#accordionFlushExample-1">
                                                        <div class="accordion-body">
                                                            <p>
                                                                <a href="https://www.google.com.tw/maps/place/804%E9%AB%98%E9%9B%84%E5%B8%82%E9%BC%93%E5%B1%B1%E5%8D%80%E8%93%AC%E8%90%8A%E8%B7%AF99%E8%99%9FB10%E5%80%89%E5%BA%AB/@22.6202115,120.2754939,17.57z/data=!4m5!3m4!1s0x346e04758890c707:0xbcaf77f6705ee84a!8m2!3d22.6210043!4d120.2779986?hl=zh-TW&shorturl=1" target="_blank" class="link-text style-qa">高雄駁二藝術特區蓬萊區B10倉庫</a><br>
                                                                80441台灣高雄市鼓山區蓬萊路99號
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-1-headingThree">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-1-collapseThree" aria-expanded="false" aria-controls="flush-1-collapseThree">
                                                            <span class="header-title">如何前往落日轉運站？/ 捷運輕軌</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-1-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-1-headingThree" data-bs-parent="#accordionFlushExample-1">
                                                        <div class="accordion-body">
                                                            <div class="title-list-wrap">
                                                                <div class="list-caption">捷運</div>
                                                                <ul class="list-wrap">
                                                                    <li class="list-item">西子灣站：步行6分鐘</li>
                                                                    <li class="list-item">鹽埕埔站：步行12分鐘</li>
                                                                </ul>
                                                            </div>
                                
                                                            <div class="title-list-wrap">
                                                                <div class="list-caption">輕軌</div>
                                                                <ul class="list-wrap">
                                                                    <li class="list-item">哈瑪星站：步行4分鐘</li>
                                                                    <li class="list-item">駁二蓬萊站：步行3分鐘</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-1-headingFour">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-1-collapseFour" aria-expanded="false" aria-controls="flush-1-collapseFour">
                                                            <span class="header-title">如何前往落日轉運站？/ 停車資訊</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-1-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-1-headingFour" data-bs-parent="#accordionFlushExample-1">
                                                        <div class="accordion-body">
                                                            <div class="title-list-wrap">
                                                                <div class="list-caption">鄰近停車場</div>
                                                                <ul class="list-wrap">
                                                                    <li class="list-item">俥停棧庫東停車場：步行5分鐘</li>
                                                                    <li class="list-item">大勇路駁二停車場(高雄市鼓山區大勇路1號)：步行5分鐘</li>
                                                                    <li class="list-item">棧西停車場(高雄市鼓山區臨海新路33號)：步行6分鐘</li>
                                                                </ul>
                                                            </div>
                                                            <p>
                                                                溫馨提醒，喝酒不開車、開車不喝酒。<br>
                                                                若預計小酌，請搭乘計程車或大眾交通運輸工具前來。
                                                            </p>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-wrap">
                                            <div class="section-heading-wrap">
                                                <h2 class="heading-accordion-title">關於購票</h2>
                                            </div>

                                            <div class="accordion rule-accordion-wrap" id="accordionFlushExample-2">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-2-headingOne">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-2-collapseOne" aria-expanded="false" aria-controls="flush-2-collapseOne">
                                                            <span class="header-title">請問要如何購票呢？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-2-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-2-headingOne" data-bs-parent="#accordionFlushExample-2">
                                                        <div class="accordion-body">
                                                            <p>
                                                                官網售票：歡迎至 購票頁面 了解更多，線上刷卡完成購票。<br>
                                                                現場購票：歡迎至場內票務櫃檯詢問剩餘場次與座位。
                                                            </p>
                                                            <p>建議可以行前先至 <a href="booking_now" target="_blank" class="link-text style-qa">購票頁面</a> 完成購票留位，避免向隅。</p>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-2-headingTwo">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-2-collapseTwo" aria-expanded="false" aria-controls="flush-2-collapseTwo">
                                                            <span class="header-title">各個作品的體驗價位與時長各是多少呢？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-2-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-2-headingTwo" data-bs-parent="#accordionFlushExample-2">
                                                        <div class="accordion-body">
                                                            <div class="table-wrap style-qa layout-qa">
                                                                <table>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>微醺列車</th>
                                                                        <th><span class="style-bolder">FLIGHT</span></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>體驗時長</th>
                                                                        <td>
                                                                            <span class="style-bolder">60</span> 分鐘
                                                                            <br class="mobile-br"> / 每場次
                                                                        </td>
                                                                        <td>
                                                                            <span class="style-bolder">30</span> 分鐘
                                                                            <br class="mobile-br"> / 每場次
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>票價</th>
                                                                        <td><span class="style-bolder">$1,250</span> / 每人</td>
                                                                        <td><span class="style-bolder">$500</span> / 每人</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <p>歡迎至 <a href="booking_now" target="_blank" class="link-text style-qa">購票頁面</a> 了解更多。</p>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-2-headingThree">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-2-collapseThree" aria-expanded="false" aria-controls="flush-2-collapseThree">
                                                            <span class="header-title">我想一口氣看兩個作品，是否有套票的選項呢？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-2-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-2-headingThree" data-bs-parent="#accordionFlushExample-2">
                                                        <div class="accordion-body">
                                                            <p>
                                                                有的，《落日轉運站》有體驗套票，內容包含完整的《 微醺列車 》及《 FLIGHT 》。<br>
                                                                原價 $1,750，套票優惠價 $1,650 。
                                                            </p>
                                                            <p>歡迎至 購票頁面 了解更多。選位時請特別注意兩作品的演出時間，並免重疊而影響自身權益。</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-2-headingFour">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-2-collapseFour" aria-expanded="false" aria-controls="flush-2-collapseFour">
                                                            <span class="header-title">是否接受大宗團體包場？人數需為多少人？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-2-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-2-headingFour" data-bs-parent="#accordionFlushExample-2">
                                                        <div class="accordion-body">
                                                            <div class="table-wrap style-qa layout-qa">
                                                                <table>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>微醺列車</th>
                                                                        <th>FLIGHT</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>體驗時長</th>
                                                                        <td>
                                                                            <span class="style-bolder">60</span>分鐘
                                                                            <br class="mobile-br"> / 每場次
                                                                        </td>
                                                                        <td>
                                                                            <span class="style-bolder">30</span>分鐘
                                                                            <br class="mobile-br"> / 每場次
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>包場人數</th>
                                                                        <td><span class="style-bolder">1-24</span> 位</td>
                                                                        <td><span class="style-bolder">1-30</span> 位</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>包場價格</th>
                                                                        <td>
                                                                            <span class="style-bolder">$27,000</span> / 每場<br>
                                                                            (原價<span class="style-bolder">$30,000</span>)
                                                                        </td>
                                                                        <td>
                                                                            <span class="style-bolder">$13,500</span> / 每場<br>
                                                                            (原價<span class="style-bolder">$15,000</span>)
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>大宗購票</th>
                                                                        <td colspan="2">
                                                                            <span class="style-bolder">24-200</span>張 <span class="style-bolder">9</span>折<br>
                                                                            <span class="style-bolder">201-500</span>張 <span class="style-bolder">85</span>折<br>
                                                                            <span class="style-bolder">501</span>張以上 <span class="style-bolder">8</span>折
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <p>若有包場、大宗購票、客製化特殊需求，歡迎來信 <a href="mailto:terminal@surpriselab.com.tw" class="link-text style-qa">terminal@surpriselab.com.tw</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-wrap">
                                            <div class="section-heading-wrap">
                                                <h2 class="heading-accordion-title">關於現場體驗</h2>
                                            </div>

                                            <div class="accordion rule-accordion-wrap" id="accordionFlushExample-3">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-3-headingOne">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-3-collapseOne" aria-expanded="false" aria-controls="flush-3-collapseOne">
                                                            <span class="header-title">現場可以寄物嗎？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-3-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-3-headingOne" data-bs-parent="#accordionFlushExample-3">
                                                        <div class="accordion-body">
                                                            <p>為維護體驗品質，於進入體驗區域前，所有觀眾都必須寄物。較大型的物品(如：行李箱)，將會無法寄物。</p>
                                                            <p>建議大家輕便前來，減少需要寄放的大小物品也能少些擔憂，放鬆體驗！</p>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-3-headingTwo">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-3-collapseTwo" aria-expanded="false" aria-controls="flush-3-collapseTwo">
                                                            <span class="header-title">手機貴重物品可以帶進體驗之中嗎？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-3-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-3-headingTwo" data-bs-parent="#accordionFlushExample-3">
                                                        <div class="accordion-body">
                                                            <p>
                                                                可以，但手機必須全程維持飛航模式並禁止錄影錄音。<br>
                                                                現場提供寄物，但不負保管責任。
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-3-headingThree">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-3-collapseThree" aria-expanded="false" aria-controls="flush-3-collapseThree">
                                                            <span class="header-title">物品遺失怎麼辦？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-3-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-3-headingThree" data-bs-parent="#accordionFlushExample-3">
                                                        <div class="accordion-body">
                                                            <p>如有物品遺失，現場提供協尋遺失物，但不負保管遺失物責任。</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-3-headingFour">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-3-collapseFour" aria-expanded="false" aria-controls="flush-3-collapseFour">
                                                            <span class="header-title">如果遲到怎麼辦？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-3-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-3-headingFour" data-bs-parent="#accordionFlushExample-3">
                                                        <div class="accordion-body">
                                                            <p>遲到將無法進場，並且無法退費。</p>
                                                            <p>請注意自身時間安排，並務必、務必、務必提早抵達。</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-3-headingFive">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-3-collapseFive" aria-expanded="false" aria-controls="flush-3-collapseFive">
                                                            <span class="header-title">有任何參與限制嗎？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-3-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-3-headingFive" data-bs-parent="#accordionFlushExample-3">
                                                        <div class="accordion-body">
                                                            <div class="table-wrap style-qa layout-qa qa-limit">
                                                                <table>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>微醺列車</th>
                                                                        <th>FLIGHT</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>未滿 <span class="style-bolder">18</span> 歲</th>
                                                                        <td><i class="icon-cross"></i></td>
                                                                        <td><i class="icon-triangle"></i> / 需滿 12 歲以上，且12-17歲需家長陪同</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>孕婦</th>
                                                                        <td><i class="icon-triangle"></i> / 過程中有酒精飲品並需要來回移動</td>
                                                                        <td><i class="icon-cross"></i></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>行動不便</th>
                                                                        <td><i class="icon-cross"></i></td>
                                                                        <td><i class="icon-triangle"></i> / 需能移動至指定座位</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>幽閉<br class="mobile-br">恐懼症</th>
                                                                        <td><i class="icon-round"></i></td>
                                                                        <td><i class="icon-cross"></i> / 全程會在全黑無光的密閉環境中進行</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>恐慌症</th>
                                                                        <td><i class="icon-round"></i></td>
                                                                        <td><i class="icon-cross"></i> / 過程中有劇烈震動、巨響、閃光效果</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <p>兩項作品皆包含聲音、燈光、影像、煙霧等效果，且未包含輪椅座位。</p>
                                                            <p>為了你的體驗感受並保護你的身心狀況，請參照上表衡量自身狀況參與。</p>
                                                            <p>若有任何問題，歡迎來信 <a href="mailto:terminal@surpriselab.com.tw" class="link-text style-qa">terminal@surpriselab.com.tw</a></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-3-headingSix">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-3-collapseSix" aria-expanded="false" aria-controls="flush-3-collapseSix">
                                                            <span class="header-title">是否有建議的衣著？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-3-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-3-headingSix" data-bs-parent="#accordionFlushExample-3">
                                                        <div class="accordion-body">
                                                            <p>兩作品皆無穿衣需求指令，歡迎穿著輕鬆舒適好移動的服裝。</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-wrap">
                                            <div class="section-heading-wrap">
                                                <h2 class="heading-accordion-title">關於落日月台</h2>
                                            </div>

                                            <div class="accordion rule-accordion-wrap" id="accordionFlushExample-4">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-4-headingOne">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-4-collapseOne" aria-expanded="false" aria-controls="flush-4-collapseOne">
                                                            <span class="header-title">什麼是落日月台？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-4-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-4-headingOne" data-bs-parent="#accordionFlushExample-4">
                                                        <div class="accordion-body">
                                                            <p>《 落日月台》為落日轉運站的戶外休憩場域，並開放給所有人。</p>
                                                            <p>此處散發著落日的燈光氛圍，並販售簡易酒飲與小點，供大家在此休息等待、小酌聊天。</p>
                                                            <p>若你於體驗前提早抵達，歡迎在此打發時間；體驗後也能在此與同場次者小喝一杯、分享感覺、拼湊故事。</p>
                                                            <p>未購買體驗票券能進入《 落日月台 》嗎？當然，此處開放給所有人，只要你想來，我們就歡迎。</p>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-4-headingTwo">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-4-collapseTwo" aria-expanded="false" aria-controls="flush-4-collapseTwo">
                                                            <span class="header-title">沒有購買體驗票券，也能進入落日月台嗎？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-4-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-4-headingTwo" data-bs-parent="#accordionFlushExample-4">
                                                        <div class="accordion-body">
                                                            <p>完全沒問題！《落日轉運站》為開放戶外場域，不僅限於購票體驗者使用。只要你想來，落日月台就歡迎！</p>
                                                            <p>使用情境：有個朋友要到現場等待體驗的你，但他不知道該去哪？這種時候，來落日月台就對了！</p>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-4-headingThree">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-4-collapseThree" aria-expanded="false" aria-controls="flush-4-collapseThree">
                                                            <span class="header-title">落日月台有販售餐點與食物嗎？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-4-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-4-headingThree" data-bs-parent="#accordionFlushExample-4">
                                                        <div class="accordion-body">
                                                            <p>有的，《落日月台》有販售簡易的酒水與食物，適合簡單墊墊胃，也適合坐下聊天時配著吃喝。</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-4-headingFour">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-4-collapseFour" aria-expanded="false" aria-controls="flush-4-collapseFour">
                                                            <span class="header-title">可以在此停留多久？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-4-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-4-headingFour" data-bs-parent="#accordionFlushExample-4">
                                                        <div class="accordion-body">
                                                            <p>要停留多久都可以唷！從開門停留到打烊。</p>  
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <!-- <div class="block-wrap">
                                            <div class="section-heading-wrap">
                                                <h2 class="heading-accordion-title">關於搭配套組</h2>
                                            </div>

                                            <div class="accordion rule-accordion-wrap" id="accordionFlushExample-5">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-5-headingOne">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-5-collapseOne" aria-expanded="false" aria-controls="flush-5-collapseOne">
                                                            <span class="header-title">請問有搭配住宿與交通套組嗎？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-5-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-5-headingOne" data-bs-parent="#accordionFlushExample-5">
                                                        <div class="accordion-body">
                                                            <p>初期搭配套組會先隱藏</p>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-5-headingTwo">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-5-collapseTwo" aria-expanded="false" aria-controls="flush-5-collapseTwo">
                                                            <span class="header-title">請問有建議的兩天一夜行程嗎？</span>
                                                            <div class="header-icon"></div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-5-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-5-headingTwo" data-bs-parent="#accordionFlushExample-5">
                                                        <div class="accordion-body">
                                                            <p>初期搭配套組會先隱藏</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="block-wrap layout-contact">
                                            <div class="section-heading-wrap">
                                                <h2 class="heading-accordion-title">客服信箱</h2>
                                            </div>
                                            <a href="mailto:terminal@surpriselab.com.tw" class="link-text style-regular">terminal@surpriselab.com.tw</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="change" role="tabpanel" aria-labelledby="change-tab">
                                        <div class="block-wrap">
                                            <div class="section-heading-wrap">
                                                <h2 class="heading-block-title">無法退費項目</h2>
                                                <h3 class="heading-block-subtitle">NON-REFUNDABLE</h3>
                                            </div>

                                            <div class="number-list-wrap">
                                                <ul class="list-wrap">
                                                    <li class="list-item">演出當日至前 2 日申請退費者</li>
                                                    <li class="list-item">遲到 / 未到以致無法入場者</li>
                                                    <li class="list-item">當天購買當天場次票券者</li>
                                                    <li class="list-item">購買套票組合，已使用其中一項體驗後，另外一項體驗不得退費</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="block-wrap">
                                            <div class="section-heading-wrap">
                                                <h2 class="heading-block-title">退費規則</h2>
                                                <h3 class="heading-block-subtitle">REFUND POLICY</h3>
                                            </div>

                                            <div class="sub-block-wrap">
                                                <div class="section-heading-wrap">
                                                    <h4 class="heading-content-title">不可抗力因素之更改訂位及退費辦法</h4>
                                                </div>
    
                                                <div class="text-wrap">
                                                    <p class="body-03">若因天災、國際病毒、戰爭等不可抗力因素，由政府、該縣市主管機關發布停止上班、停演之訊息，本專案將暫停演出，並協助改期或全額退費。</p>
                                                </div>
                                            </div>

                                            <div class="sub-block-wrap">
                                                <div class="section-heading-wrap">
                                                    <h4 class="heading-content-title">改期、轉讓、退費</h4>
                                                </div>
    
                                                <div class="text-wrap">
                                                    <p class="body-03">若有改期、取消退費</p>
                                                    <p class="body-03">請提供相應資料來信《落日轉運站》客服信箱</p>
                                                    <a href="mailto:terminal@surpriselab.com.tw" class="link-text style-regular">terminal@surpriselab.com.tw</a>
                                                </div>
                                            </div>

                                            <div class="sub-block-wrap">
                                                <div class="section-heading-wrap">
                                                    <h4 class="heading-content-title">票券退費規則</h4>
                                                </div>
    
                                                <div class="table-wrap style-rule layout-refund">
                                                    <table>
                                                        <tr>
                                                            <th></th>
                                                            <th>日期<br class="mobile-br">舉例</th>
                                                            <th>更改<br class="mobile-br">日期</th>
                                                            <th>轉讓</th>
                                                            <th>退還<br class="mobile-br">費用</th>
                                                        </tr>
                                                        <tr>
                                                            <th>體驗當日</th>
                                                            <td><span class="style-bolder">01/11</span></td>
                                                            <td><i class="icon-cross"></i></td>
                                                            <td><i class="icon-round"></i></td>
                                                            <td><i class="icon-cross"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <th>體驗前二日</th>
                                                            <td><span class="style-bolder">01/09</span></td>
                                                            <td><i class="icon-cross"></i></td>
                                                            <td><i class="icon-round"></i></td>
                                                            <td><i class="icon-cross"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <th>體驗前九日</th>
                                                            <td><span class="style-bolder">01/02</span></td>
                                                            <td><i class="icon-cross"></i></td>
                                                            <td><i class="icon-round"></i></td>
                                                            <td><span class="style-bolder">50%</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th>體驗前十日</th>
                                                            <td><span class="style-bolder">01/01</span></td>
                                                            <td><i class="icon-round"></i></td>
                                                            <td><i class="icon-round"></i></td>
                                                            <td><span class="style-bolder">90%</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th>線上購票<br>結帳完成後</th>
                                                            <td>-</td>
                                                            <td><i class="icon-round"></i></td>
                                                            <td><i class="icon-round"></i></td>
                                                            <td><span class="style-bolder">90%</span></td>
                                                        </tr>
                                                    </table>
                                                </div>
    
                                                <div class="notice-list-wrap">
                                                    <ul class="list-wrap">
                                                        <li class="list-item">來信申請退費請於下班18:00前，超過以隔日計算。</li>
                                                        <li class="list-item">體驗前十日、結帳完成後退還費用90%，係因10%金流手續費。</li>
                                                        <li class="list-item">申請退費須收到「退費確認信」，才是成功完成程序，並請靜候金流系統退費。</li>
                                                        <li class="list-item">票券有效期間為本展覽期間內(依網站公告)，逾期視同作廢。</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="sub-block-wrap">
                                                <div class="section-heading-wrap">
                                                    <h4 class="heading-content-title">套票退費規則</h4>
                                                </div>
    
                                                <div class="number-list-wrap">
                                                    <ul class="list-wrap">
                                                        <li class="list-item">
                                                            購買套票組合如需退費，將失去套票折扣。<br>
                                                            退還金額扣除10%手續費及套票折扣金額後，依照退費規則退費。

                                                            <div class="example-wrap">
                                                                <p>
                                                                    以 微醺列車+FLIGHT套票 為例：<br>
                                                                    體驗前十日來信申請《微醺列車》退費，退回的款項為：
                                                                </p>
                                                                <p>
                                                                    票面金額-(票面金額 x 10%手續費)-折扣金額<br>
                                                                    $1250-($1250*10%)-100=1025
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li class="list-item">
                                                            購買套票者，兩項體驗是預訂日期不同時，如需退費依該體驗日期計算退還費用比例
                                                            <div class="example-wrap">
                                                                <p>
                                                                    EX：預訂的場次為，1/11《微醺列車》、1/05《FLIGHT》。
                                                                </p>
                                                                <p>
                                                                    假設今日為1/1，<br>
                                                                    申請《微醺列車》退費＝體驗前十日退費=退還90%票面金額<br>
                                                                    申請《FLIGHT》退費＝體驗前四日退費=退還50%票面金額
                                                                </p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-wrap">
                                            <div class="section-heading-wrap">
                                                <h2 class="heading-block-title">票券異動申請</h2>
                                                <h3 class="heading-block-subtitle">CHANGE APPLICATION</h3>
                                            </div>

                                            <div class="table-wrap style-rule style-plus layout-change">
                                                <table>
                                                    <tr>
                                                        <th></th>
                                                        <th>你需要附上：</th>
                                                        <th>然後再附上：</th>
                                                    </tr>
                                                    <tr>
                                                        <th>改期</th>
                                                        <td>購票者的<br>姓名、電話、手機</td>
                                                        <td>欲更改場次<br>請提供3個時段</td>
                                                    </tr>
                                                    <tr>
                                                        <th>轉讓</th>
                                                        <td>將訂位確認信<br>轉寄或截圖給<br>親朋好友即可</td>
                                                        <td>現場須出示確認信<br>及向櫃台說明<br>原訂票人姓名、電話</td>
                                                    </tr>
                                                    <tr>
                                                        <th>退票</th>
                                                        <td>購票者的<br>姓名、電話、手機</td>
                                                        <td>訂單編號</td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="number-list-wrap">
                                                <ul class="list-wrap">
                                                    <li class="list-item">請依照上述說明附上相關資訊，來信落日轉運站客服信箱。</li>
                                                    <li class="list-item">退費入帳約需七至十個工作天，實際日期請依購票時使用信用卡銀行規定為主。（特殊情況採ATM退費，入帳時間以客服人員回信為主）</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="block-wrap">
                                            <div class="section-heading-wrap">
                                                <h2 class="heading-block-title">線上金流系統</h2>
                                                <h3 class="heading-block-subtitle">Neweb Pay</h3>
                                            </div>

                                            <div class="text-wrap">
                                                <p class="body-03">本專案之線上付款透過藍新金流第三方平台支付。</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal - message -->
    <div class="modal-message modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">重要訊息</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="image-wrap">
                        <img src="/terminalAssets/images/main/img_news.png" class="pc-style" alt="message">
                        <img src="/terminalAssets/images/main/img_news_mobile.png" class="mobile-style" alt="message">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn activity-btn" data-bs-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Plugins -->
    <script src="/terminalAssets/js/plugins/jquery-3.5.1.min.js"></script>
    <script src="/terminalAssets/js/plugins/bootstrap-5.1.3/bootstrap.min.js"></script>

    <!-- Loading Js -->
    <script src="/terminalAssets/js/plugins/imagesloaded.pkgd.min.js"></script>

    <!-- Custom -->
    <script src="/terminalAssets/js/main.js"></script>
    <script src="/terminalAssets/js/rules.js"></script>
</body>
</html>