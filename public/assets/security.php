<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adex - Security</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="css/slick.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="css/skins/default.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CRoboto:300,400,500,700&amp;display=swap">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="css/ie10-viewport-bug-workaround.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="page_loader"></div>

<!-- Top header start -->
<?php include "top-header.php"; ?>

<?php include "dashboard-submenu.php"; ?>

<!-- Submit Property start -->
<div class="submit-property content-area">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="submit-address">
                    <form method="POST">
                        <h3 class="heading-2 mb-4">Privacy</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6 class="mb-1">Public Profile</h6>
                                    <label>Making your profile public means anyone can see your information</label>
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">Show email</h6>
                                    <label>This lets users find you by your email address</label>
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-5">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="submit-address">
                    <form method="POST">
                        <h3 class="heading-2 mb-4">Two Fact Authentication - Required?</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h6 class="mb-1">Authenticator App</h6>
                                    <label>Google auth or 1Password</label>
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h6 class="mb-1">SMS Recovery</h6>
                                    <label>Standard messaging rates apply</label>
                                    <div class="material-switch pull-right">
                                        <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-5">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="submit-address">
                    <form method="POST">
                        <h3 class="heading-2">Password</h3>
                        <div class="row  mb-30">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="input-text" name="business-name" placeholder="Current Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="input-text" name="business-name" placeholder="New Password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="input-text" name="business-name" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-lg btn-theme-yellow-second">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/rangeslider.js"></script>
<script src="js/jquery.mb.YTPlayer.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.scrollUp.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/jquery.filterizr.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/app.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
