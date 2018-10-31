<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('css/admin_css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin_css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin_css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin_css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin_css/uniform.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin_css/select2.css')}}" />
<link rel="stylesheet" href="{{asset('css/admin_css/matrix-media.css')}}" />
<link href="{{asset('font/admin_font/css/font-awesome.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/admin_css/jquery.gritter.css')}}" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

@include('layouts.user_layout.user_header');
@include('layouts.user_layout.user_slider');
@yield('content');
@include('layouts.user_layout.user_footer');

<script src="{{asset('js/admin_js/jquery.min.js')}}"></script> 
<script src="{{asset('js/admin_js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('js/admin_js/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/admin_js/jquery.uniform.js')}}"></script> 
<script src="{{asset('js/admin_js/select2.min.js')}}"></script> 
<script src="{{asset('js/admin_js/jquery.validate.js')}}"></script> 
<script src="{{asset('js/admin_js/matrix.js')}}"></script> 
<script src="{{asset('js/admin_js/matrix.tables.js')}}"></script> 
<script src="{{asset('js/admin_js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('js/admin_js/matrix.form_validation.js')}}"></script>
<script src="{{asset('js/admin_js/matrix.popover.js')}}"></script>
</body>
</html>
