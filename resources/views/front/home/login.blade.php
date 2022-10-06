<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adex - Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href={{asset("assets/css/bootstrap.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/css/animate.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/css/bootstrap-submenu.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/css/bootstrap-select.min.css")}}>
    <link rel="stylesheet" href={{asset("assets/css/leaflet.css")}} type="text/css">
    <link rel="stylesheet" href={{asset("assets/css/map.css")}} type="text/css">
    <link rel="stylesheet" type="text/css" href={{asset("assets/fonts/font-awesome/css/font-awesome.min.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/fonts/flaticon/font/flaticon.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("assets/fonts/linearicons/style.css")}}>
    <link rel="stylesheet" type="text/css"  href={{asset("assets/css/jquery.mCustomScrollbar.css")}}>
    <link rel="stylesheet" type="text/css"  href={{asset("assets/css/dropzone.css")}}>
    <link rel="stylesheet" type="text/css"  href={{asset("assets/css/slick.css")}}>

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href={{asset("assets/css/style.css")}}>
    <link rel="stylesheet" type="text/css" id="style_sheet" href={{asset("assets/css/skins/default.css")}}>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href={{asset("assets/img/favicon.ico")}} type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CRoboto:300,400,500,700&amp;display=swap">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href={{asset("assets/css/ie10-viewport-bug-workaround.css")}}>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src={{asset("assets/js/ie-emulation-modes-warning.js")}}></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="page_loader"></div>

<!-- Top header start -->
@include('front.layouts.top-head')

<!-- Banner start -->
<div class="login-section contact-section" style="background: url(assets/img/pages/login/property-123.png);">
    <div class="container  row justify-content-center">
        <div class="col-lg-6 align-self-center pad-0">
            <div class="main-title-2">
                <h2>Login</h2>
                <p>Sign in to <span>continue.</span></p>
            </div>
            <div class="row">
                <div class="form-section align-self-center">
                    <div class="clearfix"></div>
                    <form action="#" method="GET">
                        <div class="form-group form-box">
                            <input type="email" name="email" class="input-text" placeholder="Email Address">
                        </div>
                        <div class="form-group form-box clearfix mb-0">
                            <input type="password" name="Password" class="input-text" placeholder="Password">
                        </div>
                        <div class="clearfix">
                            <a href="forgot-password.php" class="forgot-password">Forgot Password</a>
                        </div>
                        <div class="form-group clearfix">
                            <button type="submit" class="btn btn-lg btn-theme-yellow-second">Login</button>
                        </div>
                    </form>
                    <div class="signup-link">
                        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->

@include('front.layouts.footer')

<script src={{asset("assets/js/jquery-2.2.0.min.js")}}></script>
<script src={{asset("assets/js/popper.min.js")}}></script>
<script src={{asset("assets/js/bootstrap.min.js")}}></script>
<script src={{asset("assets/js/rangeslider.js")}}></script>
<script src={{asset("assets/js/jquery.mb.YTPlayer.js")}}></script>
<script src={{asset("assets/js/wow.min.js")}}></script>
<script src={{asset("assets/js/bootstrap-select.min.js")}}></script>
<script src={{asset("assets/js/jquery.easing.1.3.js")}}></script>
<script src={{asset("assets/js/jquery.scrollUp.js")}}></script>
<script src={{asset("assets/js/jquery.mCustomScrollbar.concat.min.js")}}></script>
<script src={{asset("assets/js/slick.min.js")}}></script>
<script src={{asset("assets/js/jquery.filterizr.js")}}></script>
<script src={{asset("assets/js/jquery.magnific-popup.min.js")}}></script>
<script src={{asset("assets/js/app.js")}}></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src={{asset("assets/js/ie10-viewport-bug-workaround.js")}}></script>

</body>
</html>
