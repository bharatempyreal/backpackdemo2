<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/bootstrap.min.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/animate.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/leaflet.css") }} type="text/css">
    <link rel="stylesheet" type="text/css" href={{ asset("assets/fonts/font-awesome/css/font-awesome.min.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/fonts/flaticon/font/flaticon.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/fonts/linearicons/style.css") }}>
    <link rel="stylesheet" type="text/css"  href={{ asset("assets/css/jquery.mCustomScrollbar.css") }}>
    <link rel="stylesheet" type="text/css"  href={{ asset("assets/css/slick.css") }}>
    <link rel="stylesheet" type="text/css"  href={{ asset("assets/css/bootstrap-select.min.css") }}>


    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/style.css") }}>
    <link rel="stylesheet" type="text/css" id="style_sheet" href={{ asset("assets/css/skins/default.css") }}>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href={{ asset("assets/img/favicon.png") }} type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CRoboto:300,400,500,700&amp;display=swap">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/ie10-viewport-bug-workaround.css") }}>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src={{asset("assets/js/ie-emulation-modes-warning.js")}}></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <style>
        .error{
            color:red !important;
        }
    </style>
    @yield('style')

</head>
<body>
<div class="page_loader"></div>
    @include('front.layouts.top-head')
    <div class="main-content">
        @yield('content')
        @yield('model')
        @include('front.layouts.footer')
    </div>

<script src={{ asset("assets/js/jquery-2.2.0.min.js") }}></script>
<script src={{ asset("assets/js/popper.min.js") }}></script>
<script src={{ asset("assets/js/bootstrap.min.js") }}></script>
<script src={{ asset("assets/js/rangeslider.js") }}></script>
<script src={{ asset("assets/js/jquery.mb.YTPlayer.js") }}></script>
<script src={{ asset("assets/js/wow.min.js") }}></script>
<script src={{ asset("assets/js/bootstrap-select.min.js") }}></script>
<script src={{ asset("assets/js/jquery.easing.1.3.js") }}></script>
<script src={{ asset("assets/js/jquery.scrollUp.js") }}></script>
<script src={{ asset("assets/js/jquery.mCustomScrollbar.concat.min.js") }}></script>
<script src={{ asset("assets/js/slick.min.js") }}></script>
<script src={{ asset("assets/js/jquery.filterizr.js") }}></script>
<script src={{ asset("assets/js/jquery.magnific-popup.min.js") }}></script>
<script src={{ asset("assets/js/app.js") }}></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src={{ asset("assets/js/ie10-viewport-bug-workaround.js") }}></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
$(document).ready(function(){
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    @if(Session::has('message'))
        Toast.fire({
            icon: "{{ Session::get('status', 'info') }}",
            title: "{{ Session::get('message') }}"
        })
    @endif
});
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ajaxSend(function(){
        $('.page_loader').fadeIn(250);
    });
    $(document).ajaxComplete(function(){
        $('.page_loader').fadeOut(250);
    });
    </script>
@yield('script')


</body>
</html>

