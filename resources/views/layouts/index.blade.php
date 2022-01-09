<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') | {{env("APP_FULL_NAME")}}</title>
    <!-- Icons-->
    <link href="{{URL::to('/vendors/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/vendors/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{URL::to('/css/style.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">
</head>
<body class="app flex-row align-items-center">
    @yield('content')
    <!-- CoreUI and necessary plugins-->
    <script src="{{URL::to('/vendors/jquery/js/jquery.min.js')}}"></script>
    <script src="{{URL::to('/vendors/popper.js/js/popper.min.js')}}"></script>
    <script src="{{URL::to('/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('/vendors/pace-progress/js/pace.min.js')}}"></script>
    <script src="{{URL::to('/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{URL::to('/vendors/@coreui/coreui/js/coreui.min.js')}}"></script>
</body>

</html>
