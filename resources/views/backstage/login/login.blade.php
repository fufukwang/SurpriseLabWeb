<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="icon" href="surprise/images/favi.png" >
    <title>Surprise Lab</title>

    <link href="/backstage/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/backstage/css/core.css" rel="stylesheet" type="text/css">
    <link href="/backstage/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/backstage/css/components.css" rel="stylesheet" type="text/css">
    <link href="/backstage/css/pages.css" rel="stylesheet" type="text/css">
    <link href="/backstage/css/menu.css" rel="stylesheet" type="text/css">
    <link href="/backstage/css/responsive.css" rel="stylesheet" type="text/css">

    <script src="/backstage/js/modernizr.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


</head>
<body>


<div class="wrapper-page">

    <div class="text-center">
        <a href="/admin" class="logo"><img src="surprise/images/favi.png"><span style="color: #FC6E52;vertical-align: middle;font-size: 20px;">SUPERISE LAB</span></a>
    </div>

    <form class="form-horizontal m-t-20" action="/login" method="post">
            {!! csrf_field() !!}
        <div class="form-group">
            <div class="col-xs-12">
                <input class="form-control" name="account" type="text" required="" placeholder="Username">
                <i class="md md-account-circle form-control-feedback l-h-34"></i>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <input class="form-control" name="password" type="password" required="" placeholder="Password">
                <i class="md md-vpn-key form-control-feedback l-h-34"></i>
            </div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $errors->first() }}
            </div>
        @endif

        <!--<div class="form-group">
            <div class="col-xs-12">
                <div class="checkbox checkbox-primary">
                    <input id="checkbox-signup" type="checkbox">
                    <label for="checkbox-signup">
                        Remember me
                    </label>
                </div>

            </div>
        </div>-->

        <div class="form-group text-right m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-custom w-md waves-effect waves-light" type="submit">Log In
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    var resizefunc = [];
</script>

<!-- Main  -->
<script src="/backstage/js/jquery.min.js"></script>
<script src="/backstage/js/bootstrap.min.js"></script>
<script src="/backstage/js/detect.js"></script>
<script src="/backstage/js/fastclick.js"></script>
<script src="/backstage/js/jquery.slimscroll.js"></script>
<script src="/backstage/js/jquery.blockUI.js"></script>
<script src="/backstage/js/waves.js"></script>
<script src="/backstage/js/wow.min.js"></script>
<script src="/backstage/js/jquery.nicescroll.js"></script>
<script src="/backstage/js/jquery.scrollTo.min.js"></script>

<!-- Custom main Js -->
<script src="/backstage/js/jquery.core.js"></script>
<script src="/backstage/js/jquery.app.js"></script>

</body>
</html>