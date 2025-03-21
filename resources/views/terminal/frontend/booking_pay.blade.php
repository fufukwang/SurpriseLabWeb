<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="落日轉運站為驚喜製造推出的巡迴沉浸式計畫，在此提供各種交通方式，接駁旅客前往終點；抵達第二站台北，帶來全新原創體驗《落日月台》。">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="落日月台 Mind The Gap - 落日轉運站巡迴沉浸式計劃"/>
    <meta property="og:site_name" content="落日月台 Mind The Gap - 落日轉運站巡迴沉浸式計劃"/>
    <meta property="og:description" content="落日轉運站為驚喜製造推出的巡迴沉浸式計畫，在此提供各種交通方式，接駁旅客前往終點；抵達第二站台北，帶來全新原創體驗《落日月台》。"/>
    <meta property="og:url" content="https://surpriselab.com.tw/terminal/"/>
    <meta property="og:image" content="https://surpriselab.com.tw/terminalAssets/images/opengraph240116.jpg"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="落日月台 Mind The Gap - 落日轉運站巡迴沉浸式計劃">
    <meta name="twitter:description" content="落日轉運站為驚喜製造推出的巡迴沉浸式計畫，在此提供各種交通方式，接駁旅客前往終點；抵達第二站台北，帶來全新原創體驗《落日月台》。">
    <meta name="twitter:image" content="https://surpriselab.com.tw/terminalAssets/images/opengraph240116.jpg">
    <meta name="twitter:card" content="summary_large_image">

    <title>落日月台 Mind The Gap - 落日轉運站巡迴沉浸式計劃</title>

    <!-- icon -->
    <link rel="icon" href="/terminalAssets/images/favicon.png" type="image/x-icon">

    <!-- plugins -->
    <link rel="stylesheet" href="/terminalAssets/css/plugins/jquery-ui-1.13.2/jquery-ui.min.css">
    <link rel="stylesheet" href="/terminalAssets/css/plugins/bootstrap-5.1.3/bootstrap.min.css"/>

    <!-- Loading Style -->
    <link rel="stylesheet" type="text/css" href="/terminalAssets/css/plugins/loading.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/terminalAssets/css/plugins/icomoon/style.css">
    <link rel="stylesheet" href="/terminalAssets/css/main-component.css?231123">
    <link rel="stylesheet" href="/terminalAssets/css/booking-component.css?2408221">
    <link rel="stylesheet" href="/terminalAssets/css/booking-step.css?250318">
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
    
    <main>
        <form id="final-form" action="/terminal/Neweb.OrderPay" method="post">
        <section class="section-wrap" id="step1">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="content-wrap">
                            <div class="section-heading-wrap">
                                <h1 class="heading-title">選擇票種與人數</h1>
                                <h2 class="heading-subtitle">TYPE AND NUMBER</h2>
                            </div>
                            <div class="progress-wrap">
                                <ul class="booking-progress-list">
                                    <li class="progress-item status-active"><div class="item-wrap"><span>1</span></div></li>
                                    <li class="progress-item status-disabled"><div class="item-wrap"><span>2</span></div></li>
                                    <li class="progress-item status-disabled"><div class="item-wrap"><span>3</span></div></li>
                                    <li class="progress-item status-disabled"><div class="item-wrap"><span>4</span></div></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="body-wrap">
                            <div class="tickets">
                                <div class="ticket">
                                    <picture>
                                        <source srcset="/terminalAssets/images/booking/ticket1.webp" type="image/webp" />
                                        <img width="100%" src="/terminalAssets/images/booking/ticket1.png" />
                                    </picture>
                                    <p>2,200/人 獨身踏上旅程</p>
                                </div>
                                <div class="ticket">
                                    <picture>
                                        <source srcset="/terminalAssets/images/booking/ticket2.webp" type="image/webp" />
                                        <img width="100%" src="/terminalAssets/images/booking/ticket2.png" />
                                    </picture>
                                    <p>2,100/人 雙人結伴同行</p>
                                </div>
                                <div class="ticket">
                                    <picture>
                                        <source srcset="/terminalAssets/images/booking/ticket6.webp" type="image/webp" />
                                        <img width="100%" src="/terminalAssets/images/booking/ticket6.png" />
                                    </picture>
                                    <p>2,000/人 六人組隊探索</p>
                                </div>
                            </div>
                        </div>

                        <div class="content-wrap">
                            <div class="form-wrap-step-1">
                                <div class="form-group normal-layout">
                                    <label class="body-04" for="dropdownMenuButtonTicket">票種</label>
                                    <div class="js-dropdown dropdown-wrap dropdown">
                                        <button class="js-required-dropdown dropdown-toggle mimicry-input body-04 no-value" type="button" id="dropdownMenuButtonTicket" data-bs-toggle="dropdown" aria-expanded="false">
                                            選擇票種
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonTicket">
                                            <li class="dropdown-item body-04">2,200/人 單人票</li>
                                            <li class="dropdown-item body-04">2,100/人 雙人票</li>
                                            <li class="dropdown-item body-04">2,000/人 六人票</li>
                                            

                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group normal-layout">
                                    <label class="body-04" for="dropdownMenuButtonCount">張數</label>
                                    <div class="js-dropdown dropdown-wrap dropdown">
                                        <button class="js-required-dropdown dropdown-toggle mimicry-input body-04 no-value" type="button" id="dropdownMenuButtonCount" data-bs-toggle="dropdown" aria-expanded="false" disabled>
                                            選擇張數
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonCount"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cta-wrap">
                                <a href="booking_now" class="booking-btn shape-round color-secondary">上一步</a>
                                <a href="javascript://" id="js-next-btn1" class="booking-btn shape-round color-secondary status-disabled">下一步</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="section-wrap" id="step2" style="display:none;">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="content-wrap">
                            <div class="section-heading-wrap">
                                <h1 class="heading-title">選擇日期與時段</h1>
                                <h2 class="heading-subtitle">Date and Time</h2>
                            </div>
                            <div class="progress-wrap">
                                <ul class="booking-progress-list">
                                    <li class="progress-item status-finish"><div class="item-wrap"><span>1</span></div></li>
                                    <li class="progress-item status-active"><div class="item-wrap"><span>2</span></div></li>
                                    <li class="progress-item status-disabled"><div class="item-wrap"><span>3</span></div></li>
                                    <li class="progress-item status-disabled"><div class="item-wrap"><span>4</span></div></li>
                                </ul>
                            </div>
                            <div class="body-wrap">
                                <div class="section-heading-wrap">
                                    <h4 class="heading-content">您選擇的票券</h4>
                                </div>
                                <div class="ticket-group-wrap bold-border-box">
                                    <table class="ticket-group-table">
                                        <tr>
                                            <th width="33.333%" class="column-2-th">
                                                <span class="top-right item-name body-01 style-smaller">體驗</span>
                                                <span class="bottom-left item-name body-01 style-smaller">票券</span>
                                            </th>
                                            <th>
                                                <div class="icon-th">
                                                    <!-- <i class="icon-train"></i> -->
                                                    <div class="item-name body-01 style-smaller">
                                                        <span class="name-ch">落日月台</span>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr id="selected-ticket-tr">
                                            <th class="name"></th>
                                            <td class="item-price"></td>
                                        </tr>
                                    </table>
                                    <!-- <div class="notice-wrap">
                                        <div class="notice-text-wrap">
                                            <p class="notice-text body-01 style-smaller">請確認好每個作品的間隔時間，至少保留10分鐘。</p>
                                            <p class="notice-text body-01 style-smaller">如您在選擇時間時安排有誤，還請自行承擔負責。</p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="form-wrap-step-2">
                                <fieldset class="from-block">
                                    <div class="section-heading-wrap">
                                        <h4 class="sub-heading-title">落日月台</h4>
                                        <p class="sub-heading-subtitle body-01 style-smaller">MIND THE GAP</p>
                                    </div>
                                    <!-- <p class="note">10/14-10/15 微醺列車將正式與高雄告別，體驗內容與一般場不同，詳情請<a target="_blank" href="https://www.facebook.com/surpriselabtw/posts/pfbid0n4pZNwJuRdujVyrfdH99JwhUfV6yMbYnn3umjcfhQZoTC4PH2Nx4CWF5SpL9AfX5l">點我查看</a>。</p> -->
                                    <div class="form-group normal-layout">
                                        <label class="body-04" for="js-datepicker">日期</label>
                                        <div class="datepicker-wrap">
                                            <input type="text" id="js-datepicker" class="datepicker body-04" placeholder="選擇日期" readonly required>
                                            
                                            <div class="ticket-datepicker">
                                                <!-- <div id="homeDatepicker"></div> -->

                                                <div class="tk-datepicker">
                                                    <div class="tk-datepicker-header">
                                                        <div class="tk-datepicker-month">
                                                            <span class="tk-datepicker-month-curr"></span>
                                                            <span class="tk-datepicker-month-slash">/</span>
                                                            <span class="tk-datepicker-month-next"></span>
                                                        </div>
                                                        <div class="tk-datepicker-week">
                                                            <div class="notice">⬇︎請在日曆中下滑查看更多場次⬇︎</div>
                                                            <div class="line">
                                                                <div class="grid">Su</div>
                                                                <div class="grid">Mo</div>
                                                                <div class="grid">Tu</div>
                                                                <div class="grid">We</div>
                                                                <div class="grid">Th</div>
                                                                <div class="grid">Fr</div>
                                                                <div class="grid">Sa</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tk-datepicker-body"></div>

                                                    <div class="datepicker-ps">
                                                        <div>
                                                            <span style="background: #E55D33"></span>
                                                            <p>好評熱賣</p>
                                                        </div>
                                                        <div>
                                                            <span style="background: #A55AFF"></span>
                                                            <p>即將完售</p>
                                                        </div>
                                                        <!-- <div>
                                                            <span style="background: #3737FC"></span>
                                                            <p>已售完Sold Out</p>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group normal-layout dropdown-time dropdown-datepart-train">
                                        <label class="body-04" for="dropdownMenuButtonPeriod-train">時段</label>
                                        <div class="js-dropdown dropdown-wrap dropdown">
                                            <button class="dropdown-toggle mimicry-input body-04 no-value" type="button" id="dropdownMenuButtonPeriod-train" data-bs-toggle="dropdown" aria-expanded="false">
                                                選擇時段
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonPeriod-train"></ul>
                                        </div>
                                    </div>
                                    <div class="form-group normal-layout dropdown-time dropdown-time-train">
                                        <label class="body-04" for="dropdownMenuButtonTime-train">時間</label>
                                        <div class="js-dropdown dropdown-wrap dropdown">
                                            <button class="dropdown-toggle mimicry-input body-04 no-value" type="button" id="dropdownMenuButtonTime-train" data-bs-toggle="dropdown" aria-expanded="false">
                                                選擇時間
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonTime-train"></ul>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="cta-wrap">
                                <a href="javascript://" id="js-prev-btn2" class="booking-btn shape-round color-secondary">上一步</a>
                                <a href="javascript://" id="js-next-btn2" class="booking-btn shape-round color-secondary status-disabled">下一步</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-wrap" id="step3" style="display:none;">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="content-wrap">
                            <div class="section-heading-wrap">
                                <h1 class="heading-title">填寫資料</h1>
                                <h2 class="heading-subtitle">Information</h2>
                            </div>
                            <div class="progress-wrap">
                                <ul class="booking-progress-list">
                                    <li class="progress-item status-finish"><div class="item-wrap"><span>1</span></div></li>
                                    <li class="progress-item status-finish"><div class="item-wrap"><span>2</span></div></li>
                                    <li class="progress-item status-active"><div class="item-wrap"><span>3</span></div></li>
                                    <li class="progress-item status-disabled"><div class="item-wrap"><span>4</span></div></li>
                                </ul>
                            </div>
                            <div class="body-wrap">
                                <div class="section-heading-wrap">
                                    <h4 class="heading-content">注意事項</h4>
                                </div>
                                <div class="notice-wrap bold-border-box">
                                    <div class="notice-text-wrap">
                                        <p class="notice-text body-01 style-smaller">請填寫正確信箱與電話，預約成功後將寄送行前通知。</p>
                                        <p class="notice-text body-01 style-smaller">（建議避開yahoo與hotmail信箱，以免漏信）</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wrap-step-3">
                                {{ csrf_field() }}
                                <input type="hidden" name="train">
                                <input type="hidden" name="flight">
                                <input type="hidden" name="boat">
                                <input type="hidden" name="booking_people">
                                <input type="hidden" name="ticket_type">
                                <input type="hidden" name="discount">


                                <div class="form-group normal-layout">
                                    <label class="body-04" for="name">* 姓名</label>
                                    <!-- <p>若需打統編,請填寫發票抬頭(公司完整名稱)，並在備註留下聯络人姓名與統一編號</p> -->
                                    <div class="form-error body-02 style-smaller">格式錯誤，請重新填寫</div>
                                    <input type="text" id="name" class="body-04" name="name" placeholder="ex. 轉運站吉祥物" required>
                                </div>
                                <div class="form-group normal-layout">
                                    <label class="body-04" for="company_name">統編抬頭</label>
                                    <p>若需打統編,請填寫發票抬頭(公司完整名稱)，並在備註留下聯络人姓名與統一編號</p>
                                    <div class="form-error body-02 style-smaller">格式錯誤，請重新填寫</div>
                                    <input type="text" id="company_name" class="body-04" name="company_name" placeholder="" >
                                </div>
                                <div class="form-group normal-layout">
                                    <label class="body-04" for="company_tax_ID">統一編號</label>
                                    <p>若需打統編,請填寫發票抬頭(公司完整名稱)，並在備註留下聯络人姓名與統一編號</p>
                                    <div class="form-error body-02 style-smaller">格式錯誤，請重新填寫</div>
                                    <input type="text" id="company_tax_ID" class="body-04" name="company_tax_ID" placeholder="" >
                                </div>
                                <div class="form-group normal-layout">
                                    <label class="body-04" for="telephone">* 電話</label>
                                    <p>手機號碼將作為取票依據，請務必填寫正確</p>
                                    <div class="form-error body-02 style-smaller">格式錯誤，請重新填寫</div>
                                    <div style="display: flex;width: 100%;">
                                        <input type="text" name="area_code" class="body-04" id="area_code" placeholder="+886" value="+886" style="width: 100px;">
                                        <input type="text" id="telephone" class="body-04" name="telephone" placeholder="ex. 0987654321" required style="width: calc(100% - 110px);margin-left: auto;">
                                    </div>
                                </div>
                                <div class="form-group normal-layout">
                                    <label class="body-04" for="email">* 電子信箱</label>
                                    <div class="form-error body-02 style-smaller">格式錯誤，請重新填寫</div>
                                    <input type="text" id="email" class="body-04" name="email" placeholder="ex. mindthegap@surpriselab.com.tw" required>
                                </div>
                                <div class="form-group normal-layout">
                                    <label class="body-04" for="remark">其他備註</label>
                                    <div class="form-error body-02 style-smaller">格式錯誤，請重新填寫</div>
                                    <textarea id="remark" class="body-04" name="remark" placeholder="ex. 特殊事項備註"></textarea>
                                </div>
                                <fieldset class="checkbox-block">
                                    <div class="form-group checkbox-layout">
                                        <input type="checkbox" id="agree-privacy" name="agree-privacy" required>
                                        <label class="body-04" for="agree-privacy">
                                            <span class="body-04">我已詳讀並遵守</span>
                                            <a href="javascript://" class="link-text style-smaller" data-bs-toggle="modal" data-bs-target="#staticBackdrop">隱私權條款</a>，並同意體驗中拍攝、使用本人之肖像（包含照片及動態影像）。錄像僅供體驗中使用，不會使用於任何公開平台，並將在一個月內刪除。
                                        </label>
                                    </div>
                                    <div class="form-group checkbox-layout">
                                        <input type="checkbox" id="agree-rules" name="agree-rules" required>
                                        <label class="body-04" for="agree-rules">
                                            <span class="body-04">我已詳讀並遵守</span>
                                            <a href="/terminal/rules" target="_blank" class="link-text style-smaller">退換票政策</a>，並同意第四類級距式退換票法規。任何訂單異動，敬請來信客服信箱申請，社群私訊及留言恕無法辦理。
                                        </label>
                                    </div>
                                    <!-- <div class="form-group checkbox-layout" style="flex-wrap: nowrap;">
                                        <input type="checkbox" id="agree-self" name="agree-self" required>
                                        <label class="body-04" for="agree-self">
                                            <span class="body-04">我同意授權落日月台體驗中的拍攝、使用本人之肖像（包含照片及動態影像）。體驗中錄像僅供體驗中使用，不會使用於任何公開平台，並將在一個月內刪除。</span>
                                        </label>
                                    </div> -->
                                    <!-- <div class="form-group checkbox-layout" style="flex-wrap: nowrap;">
                                        <input type="checkbox" id="agree-drink" name="agree-drink" required>
                                        <label class="body-04" for="agree-drink">
                                            <span class="body-04">我已理解若評估自身狀況後決定不飲酒，體驗中將不提供臨時更換。如有任何失態、嘔吐、損毀行為，將收取基本人工清潔費2,000元，並依照實際損壞物品照價賠償。</span>
                                        </label>
                                    </div> -->
                                    <div class="form-group checkbox-layout" style="flex-wrap: nowrap;">
                                        <input type="checkbox" id="agree-readzh" name="agree-readzh" required>
                                        <label class="body-04" for="agree-readzh">
                                            <span class="body-04">體驗中有閱讀中文文字、聆聽中文指引環節，我已斟酌自行情況參與。The experience includes reading Chinese text and listening to Chinese instructions. I have considered my own situation before participating.</span>
                                        </label>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="cta-wrap">
                                <a href="javascript://" id="js-prev-btn3" class="booking-btn shape-round color-secondary">上一步</a>
                                <a href="javascript://" id="js-next-btn3" class="booking-btn shape-round color-secondary status-disabled">下一步</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-wrap" id="step4" style="display:none;">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="content-wrap">
                            <div class="section-heading-wrap">
                                <h1 class="heading-title">確認資料</h1>
                                <h2 class="heading-subtitle">Confirm</h2>
                            </div>
                            <div class="progress-wrap">
                                <ul class="booking-progress-list">
                                    <li class="progress-item status-finish"><div class="item-wrap"><span>1</span></div></li>
                                    <li class="progress-item status-finish"><div class="item-wrap"><span>2</span></div></li>
                                    <li class="progress-item status-finish"><div class="item-wrap"><span>3</span></div></li>
                                    <li class="progress-item status-active"><div class="item-wrap"><span>4</span></div></li>
                                </ul>
                            </div>
                            <div class="body-wrap">
                                <div class="section-heading-wrap">
                                    <h4 class="heading-content">作品與日期</h4>
                                </div>
                                <div class="notice-wrap bold-border-box">
                                    <div class="notice-text-wrap">
                                        <!-- <p class="notice-text body-01 style-smaller">請確認每個作品的演出區間，前後安排是否重疊。</p> -->
                                        <p class="notice-text body-01 style-smaller">如您在選擇時間時安排有誤，還請自行承擔負責。</p>
                                    </div>
                                    <div class="notice-item-wrap notice-item-area notice-item" id="ticket-info">
                                        <div class="item-caption body-01 style-smaller">
                                            單人票
                                        </div>
                                        <ul class="item-list">
                                            <li class="list-item body-01 style-smaller">日期 2022-7-19</li>
                                            <li class="list-item body-01 style-smaller">時段 18:00-20:00</li>
                                            <li class="list-item body-01 style-smaller">乘客人數 <span class="filled-people"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-wrap-step-4">
                                <div class="section-heading-wrap">
                                    <h4 class="heading-content">確認您的資料</h4>
                                </div>
                                <table class="booking-data-table body-03">
                                    <tr>
                                        <th>姓名</th>
                                        <td id="filled-name">林美花</td>
                                    </tr>
                                    <tr>
                                        <th>電話</th>
                                        <td id="filled-telephone">095555555555</td>
                                    </tr>
                                    <tr>
                                        <th>電子信箱</th>
                                        <td id="filled-email">abc@abc.com</td>
                                    </tr>
                                    <tr>
                                        <th>其他備註</th>
                                        <td style="white-space: break-spaces;" id="filled-remark"></td>
                                    </tr>
                                    <tr>
                                        <th>折扣碼</th>
                                        <td>
                                            <!-- 尚未輸入 -->
                                            <div class="form-group verify-layout">
                                                <input type="text" id="coupon" class="body-04" name="coupon" placeholder="請輸入折扣碼(非必填)">
                                                <a href="javascript://" class="booking-btn shape-square color-input-use verification-code" data-type="discount">確認</a>
                                                <ul class="verify-status-list body-02 style-smaller">
                                                    <li class="status-list-item not-found">找不到此筆折扣序號</li>
                                                    <li class="status-list-item use-discount"></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>劃位序號</th>
                                        <td>
                                            <!-- 尚未輸入 -->
                                            <div class="form-group verify-layout">
                                                <input type="text" id="allocation" class="body-04" name="allocation" placeholder="若有可兌換落日月台票券之序號請填入此處(非必填)">
                                                <a href="javascript://" class="booking-btn shape-square color-input-use verification-code" data-type="coupon">確認</a>
                                                <ul class="verify-status-list body-02 style-smaller">
                                                    <li class="status-list-item not-found">找不到此劃位序號</li>
                                                    <li class="status-list-item use-coupon"></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="cta-wrap">
                                <a href="javascript://" id="js-prev-btn4" class="booking-btn shape-round color-secondary">上一步</a>
                                <a href="javascript://" id="js-next-btn4" class="booking-btn shape-round color-secondary">前往購買</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </form>



        <!-- Modal - 隱私權視窗 -->
        <div class="modal fade modal-policy" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title body-01" id="staticBackdropLabel">隱私權政策</h5>
                    </div>
                    <div class="modal-body">
                        <div class="body-inner">
                            <p class="body-04">
                                《落日轉運站 Sunset Terminal》官方網站 https://www.surpriselab.com.tw/terminal（以下稱「本網站」）為驚喜製造股份有限公司（以下稱「本公司」）所經營，本網站尊重您的隱私權，並致力於保護您的個人資料。於使用《落日轉運站 Sunset Terminal》官方網站前，請您詳細閱讀本條之「隱私權政策」（以下稱「本政策」），並隨時注意本網站所公告之相關修改或變更，本公司有權於任何時間修改或變更本隱私權政策之內容。當您使用本網站時，或於任何修改、變更後繼續使用本網站，皆表示您已閱讀、瞭解並同意接受本政策，或該修改、變更後之內容，及同意依據本政策蒐集、處理與利用您的個人資料；如果您無法遵守或不同意本政策之內容，或您所屬的國家、地區排除本政策內容之全部或一部時，請您立即停止使用《落日轉運站 Sunset Terminal》官方網站。此外，本公司於未經您許可的情形下，絕不會將您的個人資料提供予任何第三方。
                            </p>
                            <p class="body-04">
                                若您為未滿二十歲或無完全行為能力，除應符合上述規定外，請於您的法定代理人或監護人閱讀、瞭解並同意本政策及其後修改、變更後之所有內容後，方得使用或繼續使用本網站，否則請立即停止使用。當您使用或繼續使用《落日轉運站 Sunset Terminal》官方網站時，即視為您的法定代理人或監護人已閱讀、瞭解並同意接受本政策及其後修改、變更之所有內容。
                            </p>
                            <!-- <h6>區塊標題</h6> -->
                            <p class="body-04">
                                個人資料之類別：當您使用本網站之服務，本公司會請您提供您下列類別的個人資料，如：<br/>
                                辨識個人者（例如：姓名、住址、電子郵件信箱、行動電話）、<br/>
                                辨識財務者（例如：信用卡或簽帳卡之號碼、銀行帳戶之號碼與姓名）、<br/>
                                生活格調（例如：使用消費品之種類及服務之細節、個人之消費模式）、<br/>
                                資料主體所取得之財貨或服務（例如：貨物或服務之有關細節）、<br/>
                                財務交易（例如：收付金額、支付方式、往來紀錄）、<br/>
                                資料主體之商業活動（例如：商業種類、提供或使用之財貨或服務、商業契約）、<br/>
                                約定或契約（例如：關於交易、商業、法律或其他契約、代理）、<br/>
                                未分類之資料（例如：用餐意見、無法歸類之檔案、報告），<br/>
                                及其他任何得以直接或間接方式識別個人之資料等。<br/>
                                惟請注意，您於《落日轉運站 Sunset Terminal》官方網站中進行交易時，所輸入之信用卡卡號、有效日期及授權碼，均僅儲存於您個人之行動裝置中，本網站將不會蒐集、處理或利用您上述個人資料。
                            </p>
                            <p class="body-04">
                                個人資料之利用：當您在《落日轉運站 Sunset Terminal》官方網站登錄個人資料以進行相關交易時，所留下的個人資料包括但不限於姓名、電子郵件地址、手機號碼及發票寄送地址等，將在本網站妥當的保存，所蒐集信用卡資訊或銀行資訊，均經使用安全的SSL加密協議處理，可確保您的隱私。
                            </p>
                            <p class="body-04">
                                不提供個人資料之影響：您可自由選擇是否提供您上述的個人資料，但當您不同意提供時，您將無法享有《落日轉運站 Sunset Terminal》官方網站所提供之服務。凡購買本網站供的服務或產品，本公司可能會透過電子郵件傳送您於《落日轉運站 Sunset Terminal》官方網站的購買活動，包括但不限於消費者的帳戶、聯絡資訊或查詢、購買優惠的紀錄。您可選擇是否接收電子郵件，但當您不同意接收時，您將無法享有《落日轉運站 Sunset Terminal》官方網站提供之服務。
                            </p>
                            <p class="body-04">
                                個人資料利用之地區：本公司之個人資料主機、相關網路伺服器主機所在地及本公司∕《落日轉運站 Sunset Terminal》官方網站相關服務或商品發行或行銷地區，為您個人資料利用之地區。
                            </p>
                            <p class="body-04">
                                您對個人資料之權利：在不違反相關法律的情況下，於本公司確認該個人資料為您本人所有後，您可以聯絡本公司∕《落日轉運站 Sunset Terminal》官方網站，或將您的需求郵寄至本公司的電子郵件信箱，以行使下列之權利：(1)查詢、閱覽、補充或更正您的個人資料。(2)停止蒐集、處理或利用您的個人資料。(3)刪除您的個人資料。(4)提供您個人資料的複製本。(5)停止寄發給《落日轉運站 Sunset Terminal》官方網站相關廣告及行銷活動。但請注意，若您已於各該實際交易中提供您的個人資料給商家或交易對象，除法律另有規定之情形外，有關您的上述權利，應向各該商家或交易對象行使。
                            </p>
                            <p class="body-04">
                                除下列情形外，本公司不會任意將用戶的個人資料出售、轉讓或揭露予任何第三人：(1)本公司在與其他第三人合辦或協辦活動時，與該第三人共用、傳遞您的資料，才能夠提供您要求的產品或服務。惟《落日轉運站 Sunset Terminal》官方網站會於各該活動頁面明確告知您的個人資料將因參與該活動而提供予合辦或協辦之第三人，如您選擇參與該活動，即表示您瞭解並同意將該個人資料為各該活動之目的提供予合辦或協辦之第三人。(2)本公司∕《落日轉運站 Sunset Terminal》官方網站將因法律規定、法院命令、行政調查或其他法律程序的要求而提供您的資料，惟在此情形下，該資料只會單純提供予調查單位，並受中華民國相關法律的保護。(3)為了調查和防止非法活動、涉嫌詐欺、對人身安全有潛在威脅的狀況。(4) 對本公司∕《落日轉運站 Sunset Terminal》官方網站服務條款的違反，或站或本公司被其他公司收購或合併，我們有權利將您的個人資料移轉給該公司。如果發生這種情況，本公司會在您的個人資料被移轉且將適用不同的隱私權政策前通知您。
                            </p>
                            <p class="body-04">
                                本公司∕《落日轉運站 Sunset Terminal》官方網站有權視實際情形修訂本政策，本政策有重大變更時，本網站將張貼公告，您有義務隨時注意本政策有無更新或修訂。如您不同意所變更之內容，得隨時選擇退出相關服務，並請您立即停用《落日轉運站 Sunset Terminal》官方網站之服務，如您繼續使用本網站，即表示您同意本政策變更之內容。
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="full-btn body-01" data-bs-dismiss="modal">閱讀完畢</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <section class="section-wrap" id="booking_success" style="display:none;">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="a-content-wrap">
                            <div class="img-wrap">
                                <img class="img-fluid" src="/terminalAssets/images/other/img_success.png" alt="success">
                            </div>
                            <div class="section-heading-wrap">
                                <h1 class="heading-title">購票完成</h1>
                                <h2 class="heading-subtitle">success</h2>
                            </div>
                            <div class="text-wrap">
                                <h6 class="color-o200">恭喜您，已經完成訂位！</h6>
                                <p class="color-n100 body-04">每一作品皆會有一封獨立的訂位成功信件，<br/>請至您的信箱確認</p>
                                <p class="color-n100 opacity-50 body-04">它有時候會跑到垃圾郵件，可以翻找一下</p>
                            </div>
                            <div class="cta-wrap">
                                <div class="btn-wrap">
                                    <a href="/terminal" class="booking-btn shape-round color-primary">關於落日轉運站</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-wrap" id="booking_fail" style="display:none;">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="a-content-wrap">
                            <div class="img-wrap">
                                <img class="img-fluid" src="/terminalAssets/images/other/img_fail.png" alt="fail">
                            </div>
                            <div class="section-heading-wrap">
                                <h1 class="heading-title">購票失敗</h1>
                                <h2 class="heading-subtitle">fail</h2>
                            </div>
                            <div class="text-wrap">
                                <h6 class="color-o200">很抱歉，購買與劃位流程失敗</h6>
                                <p class="color-n100 body-04">請確保網路訊號的穩定，再次前往購票。</p>
                                <p class="color-n100 body-04">有任何問題歡迎來信：<a href="mailto:terminal@surpriselab.com.tw" class="link-text" target="_blank">terminal@surpriselab.com.tw</a></p>
                            </div>
                            <div class="cta-wrap">
                                <div class="btn-wrap">
                                    <a href="booking_now.html" class="booking-btn shape-round color-primary">重新預約</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    </main>

    <!-- Plugins -->
    <script src="/terminalAssets/js/plugins/jquery-3.5.1.min.js"></script>
    <script src="/terminalAssets/js/plugins/jquery-ui-1.13.2/jquery-ui.min.js"></script>
    <script src="/terminalAssets/js/plugins/popper.min.js"></script>
    <script src="/terminalAssets/js/plugins/bootstrap-5.1.3/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>

    <!-- Loading Js -->
    <script src="/terminalAssets/js/plugins/imagesloaded.pkgd.min.js"></script>

    <!-- Custom -->
    <script src="/terminalAssets/js/tk-datepicker.js?250318"></script>
    <script src="/terminalAssets/js/main.js"></script>
    <script src="/terminalAssets/js/booking_pay.js?v=250318"></script>
</body>
</html>