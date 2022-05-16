<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <!-- Metadata -->
    <meta charset="UTF-8">
    <meta name="keywords" content="驚喜製造, 無光晚餐, 一人餐桌, 台北喝酒, 活動, 沉浸式體驗, 週末要幹麻, 好玩, 喝酒">
    <meta name="description" content="歡迎來到《微醺大飯店》——那些你曾經希望能有所不同的事，在這都有可能發生。">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="微醺大飯店：1980s"/>
    <meta property="og:site_name" content="微醺大飯店：1980s"/>
    <meta property="og:description" content="歡迎來到《微醺大飯店》——那些你曾經希望能有所不同的事，在這都有可能發生。"/>
    <meta property="og:url" content="https://www.surpriselab.com.tw/dininginthedark3"/>
    <meta property="og:image" content="https://www.surpriselab.com.tw/dininginthedark3/img/opengraph.png"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="600"/>
    <meta property="og:image:height" content="315"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=0">
    <title>微醺大飯店：1980s</title>

    <!-- Style -->
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/plugins/bootstrap-4.1.0/bootstrap.css"/>

    <!-- Loading Animation CSS -->
    <link rel="stylesheet" type="text/css" href="css/plugins/imagesloaded/loading.css"/>

    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome/fontawesome.min.css"/>

    <!-- Select2 style -->
    <link rel="stylesheet" href="css/plugins/select2/select2.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css?v=0.1"/>
    <link rel="stylesheet" href="css/form.css"/>
    <link rel="stylesheet" href="css/master.css?=0.1"/>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WCD7VGK');</script>
    <!-- End Google Tag Manager -->
    </head>
    <body class="loading">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WCD7VGK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <main class="sections">
        <!-- Header LOGO -->
        <header class="logo">
            <a href="index.html">
                <img src="img/web_title_small.png" alt="The Great Tipsy">
            </a>
            <button class="hamburger">
                <span class="current-section">Lobby</span>
                <span class="current-menu">Menu</span>
                <span class="menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </span>
            </button>
        </header>

        <div class="container" id="masterPage">
            <!-- form -->
            <form id="master">
                <!--progress title-->
                <h3 class="progress-title">《微醺大飯店：1980s》</h3>
                <h5>開幕酒會 賓客姓名修復</h5>

                <!-- fieldsets -->
                <fieldset class="step step-1" title="微醺大飯店：1980s　賓客邀請函">
                    <p class="sub-title text-lining">
                        親愛的賓客您好，您為 <span class="color-yellow">{{ $order->name }}</span> 所邀請之賓客<br/>
                        並將於 <span class="color-yellow">{{ $order->day }} {{ substr($order->rang_start,0,5) }}</span> 前來
                    </p>
                    <div class="form-container">
                        <div class="sub-title-wrapper">
                            <h4>
                                <span>information</span>
                            </h4>
                        </div>
                    </div>
                    <div class="form-container">
                        <div class="form-group input-with-label">
                            <label for="name">* 賓客姓名</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="請填寫本名">
                        </div>
<?php
        $email_array = explode("@", $tm->email);
        $string = $email_array[0];

        $begin_num = 2;
        $end_num = 2;
        $string_length = strlen($string);
        $begin_num = (int)$begin_num;
        $end_num = (int)$end_num;
        $string_middle = '';
        $symbol = '*';
        if($string_length < 5){
            $rs = '*****@'.$email_array[1];
        } else {
            $check_reduce_num = $begin_num + $end_num;

            if($check_reduce_num >= $string_length){
                for ($i=0; $i < $string_length; $i++) {
                    $string_middle .= $symbol;
                }
                return $string_middle;
            }

            $symbol_num = $string_length - ($begin_num + $end_num);
            $string_begin = substr($string, 0,$begin_num);
            $string_end = substr($string, $string_length-$end_num);

            for ($i=0; $i < $symbol_num; $i++) {
                $string_middle .= $symbol;
            }

            $rs = $string_begin.$string_middle.$string_end.'@'.$email_array[1];
        }
?>
                        <div class="form-group input-with-label">
                            <label for="femail">* 您的信箱</label>
                            <input type="text" name="femail" value="{{ $rs }}" readonly class="form-control" id="femail" placeholder="您的信箱">
                        </div>

                        <div class="feature-btn d-flex justify-content-center multi-btn">
                            <button type="submit" name="submit" class="btn-outline submit" id="btn-master-submit" disabled="disabled">
                                送出
                            </button>
                            <input type="hidden" name="id" id="id" value="{{ md5($tm->id) }}">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="submit-page success" id="masterSuccess" style="display:none;">
            <div class="container">
                <h3 class="page-title">《微醺大飯店：1980s》</h3>
                <h5>開幕酒會 賓客身份登錄</h5>
                <p class="page-sub-title">
                    您的大名已修復，感謝您的配合。
                </p>
                <div class="page-info">
                    <p>
                        －期待您的蒞臨－
                    </p>
                    <p>
                        順安,<br/>
                        微醺大飯店：1980s
                    </p>
                </div>
                <div class="feature-btn">
                    <a class="btn-outline" href="index.html">完成</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap -->
    <script src="js/plugins/jquery-3.3.1.min.js"></script>
    <script src="js/plugins/jquery-ui.js"></script>
    <script src="js/plugins/popper.min.js"></script>
    <script src="js/plugins/bootstrap-4.1.0/bootstrap.min.js"></script>

    <!-- Loading Animation JS -->
    <script src="js/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- Select2 script-->
    <script src="js/plugins/select2/select2.js?v=0.1"></script>
    <!-- blockUI script-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
    <!-- tappaysdk -->
    <script src="https://js.tappaysdk.com/tpdirect/v5.4.0"></script>
    <!-- Custom Js -->
    <script src="js/form.js?v=0.15"></script>

    <!-- Testing Button -->
    <script>
        $('#btn-master-submit').on('click', function(){
                $.blockUI();
                var obj = {
                    'id': $('#id').val(),
                    'name': $('#name').val(),
                };
                $.post('/dininginthedark3/Team/NameFix',obj,function(data){
                    if(data.success==true){
                        $('#masterPage').hide();
                        $('#masterSuccess').fadeIn();
                    } else {
                        var message = '錯誤!';
                        if(typeof data.message != 'undefined') message = data.message;
                        alert(message);
                        window.location.reload(true);
                        console.log('失敗')
                    }
                    $.unblockUI();
                },'json').fail(function() {
                    alert('服務繁忙中請稍後在試!');
                    window.location.reload(true);
                    console.log('錯誤')
                    $.unblockUI();
                });
        });
    </script>

    </body>
</html>
