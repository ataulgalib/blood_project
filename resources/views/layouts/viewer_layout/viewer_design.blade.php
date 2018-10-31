<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blood For Help</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('image/viewer_img/core-img/favicon.ico')}}">
    <link href="{{asset('css/viewer_css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/viewer_css/responsive/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/viewer_css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



</head>

<body> 

@include('layouts.viewer_layout.viewer_header');
@include('layouts.viewer_layout.viewer_slider');
@yield('content');
@include('layouts.viewer_layout.viewer_footer');
  
    <!-- Jquery-2.2.4 js -->
    <script src="{{asset('js/viewer_js/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('js/viewer_js/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap-4 js -->
    <script src="{{asset('js/viewer_js/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins JS -->
    <script src="{{asset('js/viewer_js/js/others/plugins.js')}}"></script>
    <!-- Active JS -->
    <script src="{{asset('js/viewer_js/js/active.js')}}"></script>



</body> 

</html>

