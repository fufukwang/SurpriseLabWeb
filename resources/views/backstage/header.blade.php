<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/surprise/images/favi.png" >
    <title>{{ $title or '' }}  Surprise Lab</title>

    <!-- Plugin Css-->
    <link rel="stylesheet" href="/backstage/plugins/magnific-popup/dist/magnific-popup.css" />
    <link rel="stylesheet" href="/backstage/plugins/jquery-datatables-editable/datatables.css" />

    <link href="/backstage/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/backstage/css/core.css" rel="stylesheet" type="text/css" />
    <link href="/backstage/css/components.css" rel="stylesheet" type="text/css" />
    <link href="/backstage/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="/backstage/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="/backstage/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="/backstage/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="/backstage/js/modernizr.min.js"></script>


</head>


<body>


<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- Logo container-->
            <div class="logo">
                <a href="/admin" class="logo"><img src="/surprise/images/favi.png"><div style="float: right;margin-top:4px;"><span style="color: #FC6E52;font-size:16px;">SUPERISE LAB</span>@if (env('APP_ENV')!='production')<span style="color:white;">這裡是測試站</span>@endif</div></a>
            </div>
            <!-- End Logo container-->

            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><a href="/logout"><i class="ti-power-off m-r-5"></i> Logout</a></a>
                    </li>
                </ul>

                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

        </div>
    </div>
    <!-- End topbar -->


    <!-- Navbar Start -->
    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                @if (Session::has('key')) 
                    @if( Session::get('key')->admin )
                    <li class="has-submenu @if(Request::segment(1) === 'admin')active @endif">
                        <a href="/admin"><i class="md md-dashboard"></i>Admin</a>
                    </li>
                    @endif
                    @if( Session::get('key')->oldview )
                    <li class="has-submenu">
                        <a href="#"><i class="md md-color-lens"></i>dininginthedark</a>
                        <ul class="submenu">
                            <li><a href="/acts">Activaty</a></li>
                            <li><a href="/printdaily">Print Daily</a></li>
                            <li><a href="/email">Email</a></li>
                            <li><a href="/contacts">Contacts</a></li>
                        </ul>
                    </li>
                    @endif
                    @if( Session::get('key')->oldview )
                    <li class="has-submenu @if(Request::segment(1) === 'TableForOne')active @endif">
                        <a href="#"><i class="md md-invert-colors-on"></i>Table For ONe</a>
                        <ul class="submenu">
                            <li><a href="/TableForOne/rooms">Activaty</a></li>
                            <li><a href="/TableForOne/gifts">Gift Card</a></li>
                            <li><a href="/TableForOne/print">Order</a></li>
                            <li><a href="/TableForOne/contacts">Contacts</a></li>
                        </ul>
                    </li>
                    @endif
                    @if( Session::get('key')->oldview )
                    <li class="has-submenu @if(Request::segment(1) === 'dark2')active @endif">
                        <a href="#"><i class="md md-invert-colors-on"></i>dininginthedark S2</a>
                        <ul class="submenu">
                            <li><a href="/dark2/pros">Activaty</a></li>
                            <li><a href="/dark2/backmes">Backme</a></li>
                            <li><a href="/dark2/coupons">Coupon</a></li>
                            <li><a href="/dark2/print">Order</a></li>
                            <li><a href="/dark2/contacts">Contacts</a></li>
                        </ul>
                    </li>
                    @endif
                    @if( Session::get('key')->thegreattipsy )
                    <li class="has-submenu @if(Request::segment(1) === 'thegreattipsy')active @endif">
                        <a href="#"><i class="md md-invert-colors-on"></i>微醺大飯店</a>
                        <ul class="submenu" style="left:0;right:auto">

                            <li><a href="/thegreattipsy/pros">Activaty</a></li>
                            <li><a href="/thegreattipsy/backmes">Backme</a></li>
                            <li><a href="/thegreattipsy/coupons">Coupon</a></li>
                            <li><a href="/thegreattipsy/print">Order</a></li>

                        </ul>
                    </li>
                    @endif
                    @if( Session::get('key')->clubtomorrow )
                    <li class="has-submenu @if(Request::segment(1) === 'clubtomorrow')active @endif">
                        <a href="#"><i class="md md-invert-colors-on"></i>明日俱樂部</a>
                        <ul class="submenu" style="left:0;right:auto">
                            <li><a href="/clubtomorrow/sms">Sms</a></li>
                            <li><a href="/clubtomorrow/pros">Activaty</a></li>
                            <li><a href="/clubtomorrow/backmes">Backme</a></li>
                            <li><a href="/clubtomorrow/coupons">Coupon</a></li>
                            <li><a href="/clubtomorrow/print">Order</a></li>

                        </ul>
                    </li>
                    @endif
                    @if( Session::get('key')->tgt2 )
                    <li class="has-submenu @if(Request::segment(1) === 'thegreattipsyS2')active @endif">
                        <a href="#"><i class="md md-invert-colors-on"></i>微醺大飯店S2</a>
                        <ul class="submenu" style="left:0;right:auto">

                            <li><a href="/thegreattipsyS2/pros">Activaty</a></li>
                            <li><a href="/thegreattipsyS2/backmes">Backme</a></li>
                            <li><a href="/thegreattipsyS2/coupons">Coupon</a></li>
                            <li><a href="/thegreattipsyS2/print">Order</a></li>
                            <li><a href="/thegreattipsyS2/getMasterList">Master</a></li>
                            <li><a href="/thegreattipsyS2/special/setting">Special</a></li>

                        </ul>
                    </li>
                    @endif
                    @if( Session::get('key')->dark3 )
                    <li class="has-submenu @if(Request::segment(1) === 'dark3')active @endif">
                        <a href="#"><i class="md md-invert-colors-on"></i>無光晚餐S3</a>
                        <ul class="submenu" style="left:0;right:auto">

                            <li><a href="/dark3/pros">Activaty</a></li>
                            <li><a href="/dark3/backmes">Backme</a></li>
                            <li><a href="/dark3/coupons">Coupon</a></li>
                            <li><a href="/dark3/print">Order</a></li>
                            <li><a href="/dark3/getMasterList">Master</a></li>
                            @if( Session::get('key')->admin == 1 )
                            <li><a href="/dark3/discount/setting">Discount</a></li>
                            @endif
                            <!-- <li><a href="/dark3/special/setting">Special</a></li> -->

                        </ul>
                    </li>
                    @endif
                    <li class="has-submenu @if(Request::segment(1) === 'surprise')active @endif">
                        <a href="#"><i class="md md-home"></i>驚喜官網</a>
                        <ul class="submenu" style="left:0;right:auto">
                            <li><a href="/surprise/wishs">Wish</a></li>

                        </ul>
                    </li>
                    @if( Session::get('key')->terminal )
                    <li class="has-submenu @if(Request::segment(1) === 'terminal')active @endif">
                        <a href="#"><i class="md md-local-airport"></i>落日轉運站</a>
                        <ul class="submenu" style="left:0;right:auto">

                            <li><a href="/terminal/pros">Activaty</a></li>
                            <!-- <li><a href="/terminal/backmes">Backme</a></li> -->
                            <li><a href="/terminal/discount/setting">Coupon</a></li>
                            <li><a href="/terminal/print">Order</a></li>
                            <li><a href="/terminal/getMasterList">Master</a></li>
                            <li><a href="/terminal/coupons">Gift Coupon</a></li>
                            <!-- <li><a href="/terminal/special/setting">Special</a></li> -->

                        </ul>
                    </li>
                    @endif
                    @if( Session::get('key')->paris )
                    <li class="has-submenu @if(Request::segment(1) === 'paris')active @endif">
                        <a href="#"><i class="md md-cake"></i>巴黎舞會</a>
                        <ul class="submenu" style="left:0;right:auto">

                            <li><a href="/paris/pros">Activaty</a></li>
                            <!-- <li><a href="/paris/backmes">Backme</a></li> -->
                            <li><a href="/paris/discount/setting">Discount</a></li>
                            <li><a href="/paris/print">Order</a></li>
                            <li><a href="/paris/getMasterList">Master</a></li>
                            <li><a href="/paris/coupons">Gift Coupon</a></li>

                        </ul>
                    </li>
                    @endif
                    @if( Session::get('key')->terTP )
                    <li class="has-submenu @if(Request::segment(1) === 'tertp')active @endif">
                        <a href="#"><i class="md md-local-airport"></i>落日台北站</a>
                        <ul class="submenu" style="left:0;right:auto">

                            <li><a href="/tertp/pros">Activaty</a></li>
                            <!-- <li><a href="/tertp/backmes">Backme</a></li> -->
                            <li><a href="/tertp/discount/setting">Discount</a></li>
                            <li><a href="/tertp/print">Order</a></li>
                            <li><a href="/tertp/getMasterList">Master</a></li>
                            <li><a href="/tertp/coupons">Gift Coupon</a></li>

                        </ul>
                    </li>
                    @endif
                @endif
                </ul>
                <!-- End navigation menu -->
            </div>
        </div>
    </div>
</header>
<!-- End Navigation Bar-->


