<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') | {{env("APP_NAME")}}</title>
    <!-- Icons-->
    <link href="{{URL::to('/vendors/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/vendors/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{URL::to('/css/style.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/css/custom.css')}}" rel="stylesheet">
    @yield('css')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <b>{{env("APP_NAME")}}</b>
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="img-avatar" src="{{URL::to('/imgs/user.png')}}" alt="admin@bootstrapmaster.com">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>{{ Auth::user()->name }}</strong>
                    </div>
                    <a class="dropdown-item" href="{{ route('logout') }}" target="_top" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">

        </button>
        <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>
    <div class="app-body">
        <div class="sidebar">
            @include('includes.menu')
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>
        <main class="main">
            <!-- Breadcrumb-->
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <footer class="app-footer">
        <div>
            <a href="https://bbstv.id/">{{env("APP_NAME")}}</a>
        </div>
        <div class="ml-auto">
            <span>Powered by</span>
            <a href="https://coreui.io">CoreUI</a>
        </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{URL::to('/vendors/jquery/js/jquery.min.js')}}"></script>
    <script src="{{URL::to('/vendors/popper.js/js/popper.min.js')}}"></script>
    <script src="{{URL::to('/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('/vendors/pace-progress/js/pace.min.js')}}"></script>
    <script src="{{URL::to('/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{URL::to('/vendors/@coreui/coreui/js/coreui.min.js')}}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{URL::to('/js/colors.js')}}"></script>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
        $('[data-toggle="popover"]').popover();
    });
    $(".logout-btn").on('click', function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Tekan ya untuk logout",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                document.getElementById('logout-form').submit();
            }
        })
    });
    
    </script>
    @yield('script')
</body>

</html>
