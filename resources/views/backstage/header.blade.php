<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/surprise/images/favi.png" >
    <title>Surprise Lab</title>

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
                <a href="/admin" class="logo"><img src="/surprise/images/favi.png"><div style="float: right;margin-top:4px;"><span style="color: #FC6E52;font-size:16px;">SUPERISE LAB</span></div></a>
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
                    @if( Session::get('key')->admin )
                    <li class="has-submenu">
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
                    <li class="has-submenu">
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
                    <li class="has-submenu">
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
                    <li class="has-submenu">
                        <a href="#"><i class="md md-invert-colors-on"></i>微醺大飯店</a>
                        <ul class="submenu">
                            <li><a href="#" onclick="alert('還沒有')">還沒有</a></li>

                        </ul>
                    </li>
                    @endif

                </ul>
                <!-- End navigation menu -->
            </div>
        </div>
    </div>
</header>
<!-- End Navigation Bar-->


