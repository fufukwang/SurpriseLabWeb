@extends('SurpriseLabHome._layout.master')

@section('meta')
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="description" content="出沒時間、地點難以預測的體驗製造商。Surprise is Everywhere.">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="驚喜製造 SURPRISE LAB"/>
    <meta property="og:site_name" content="驚喜製造 SURPRISE LAB"/>
    <meta property="og:description" content="出沒時間、地點難以預測的體驗製造商。Surprise is Everywhere."/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/general/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>

    <!-- Twitter Metadata -->
    <meta name="twitter:title" content="驚喜製造 SURPRISE LAB">
    <meta name="twitter:description" content="出沒時間、地點難以預測的體驗製造商。Surprise is Everywhere.">
    <meta name="twitter:image" content="https://www.surpriselab.com.tw/SurpriseLabHome/assets/images/general/opengraph.png">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('style')
    <title>驚喜製造 SURPRISE LAB</title>

    <!-- Style -->
    <link rel="icon" href="/SurpriseLabHome/assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/bootstrap-5.1.3/bootstrap.min.css"/>

    <!-- Loading Style -->
    <link rel="stylesheet" type="text/css" href="/SurpriseLabHome/resources/css/plugins/imagesloaded/loading.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/plugins/icomoon/style.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/style.css">
    <link rel="stylesheet" href="/SurpriseLabHome/resources/css/404.css">
@endsection
@section('main')
    <main>
        <h1>Not Found</h1>
        
        <section id="not-found" class="not-found full-page">
            <div class="container-xl">
                <div class="row">
                    <div class="not-found-text col-xl-5 col-12">
                        <div class="not-found-text-wrap">
                            <div class="surpri-title brackets-regular layout-left style-dark">
                                <div class="title-wrap">
                                    <h2 class="title-en">Oooooooooops!</h2>
                                    <h5 class="title-ch">出了點小問題</h5>
                                </div>
                            </div>
                            <div class="surpri-content">
                                <div class="not-found-desc">
                                    <p>
                                        你發現了這個祕密地方，你可以尋找驚喜<br/>
                                        或者 ......
                                    </p>
                                    <div class="not-found-cta">
                                        <a href="/tw/index.html" class="surpri-btn size-regular color-regular arrow-right">回到首頁</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-12">
                        <div class="not-found-img">
                            <picture>
                                <source srcset="/SurpriseLabHome/assets/webps/general/img_error-1.webp" type="image/webp">
                                <img class="img-fluid" src="/SurpriseLabHome/assets/images/general/img_error-1.png" alt="error">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal - Notice -->
        @include('SurpriseLabHome._noticeModal')

    </main>
@endsection
@section('script')
    <!-- Plugins -->
    <script src="/SurpriseLabHome/resources/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="/SurpriseLabHome/resources/js/plugins/bootstrap-5.1.3/bootstrap.min.js"></script>

    <!-- Loading Animation JS -->
    <script src="/SurpriseLabHome/resources/js/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- AOS -->
    <script src="/SurpriseLabHome/resources/js/plugins/aos-2.0.0/aos.js"></script>

    <!-- Custom -->
    <script src="/SurpriseLabHome/resources/js/main.js"></script>
    <script src="/SurpriseLabHome/resources/js/preload.js"></script>
@endsection


    
