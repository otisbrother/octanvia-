<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminBookingRoom</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/backend/fixcss.css">
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/backend/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/backend/bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="/backend/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/backend/plugins//bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script type="text/javascript">
        var base_url = '{{ url('/') }}';
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
@include('backend.layouts.header')
@include('backend.layouts.sidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
@include('backend.layouts.footer')
</div>
<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/backend/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/backend/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/backend/bower_components/raphael/raphael.min.js"></script>
<script src="/backend/bower_components/morris.js/morris.min.js"></script>
<script src="/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="/backend/plugins//jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/backend/plugins//jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/backend/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="/backend/bower_components/moment/min/moment.min.js"></script>
<script src="/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/backend/plugins//bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/backend/bower_components/fastclick/lib/fastclick.js"></script>
<script src="/backend/dist/js/adminlte.min.js"></script>
<script src="/backend/dist/js/pages/dashboard.js"></script>
<script src="/backend/dist/js/demo.js"></script>
{{-- Link file js xoa' du lieu backend --}}
<script src="/backend/js/main.js"></script>
@yield('my_javascript')


</body>
</html>
