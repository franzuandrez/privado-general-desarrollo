<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hospital Buenos Ingenieros</title>
    <link href=" {{asset('/iran/dist/css/style.min.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/images/logo.ico')}}"/>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <style>
        .sidebar-nav #sidebarnav .sidebar-item.selected > .sidebar-link {
            background: linear-gradient(to right, #f7b633, #f5af23, #f8af1d, #f8aa0b, #f8aa0b);
        }

        .btn-primary {
            background-color: #f7b633 !important;
            border-color: #f7b633 !important;
        }

        .btn-success {
            background-color: #1f3c88 !important;
            border-color: #1f3c88 !important;
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            background-color: #f7b633 !important;
        }

        .badge-primary {
            background-color: #f7b633 !important;

        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <div class="preloader" id="loader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">

                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <div class="navbar-brand">
                    <a href="{{url('/')}}">
                        <b class="logo-icon">
                            <img src="{{asset('/assets/images/image_1.png')}}"
                                 width="200px"
                                 alt="Hospital Buenos Ingenieros" class="dark-logo"/>
                            <!-- Light Logo icon -->
                            <img src="{{asset('/assets/images/image_1.jpeg')}}" alt="inicio" class="light-logo"/>
                        </b>

                    </a>
                </div>

                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                        class="ti-more"></i></a>
            </div>

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" href="javascript:void(0)">
                            <form method="GET" action="{{\Request::url()}}">
                                <div class="customize-input">
                                    <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                           name="search"
                                           id="search"
                                           type="search" placeholder="Buscar" aria-label="Search">
                                    <i class="form-control-icon" data-feather="search"></i>
                                </div>
                            </form>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav float-right">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="{{url('/assets/images/logo.png')}}" alt="user" class="rounded-circle"
                                 width="40">

                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    data-feather="power"
                                    class="svg-icon mr-2 ml-1"></i>
                                Cerrar Sesi??n</a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>

                </ul>
            </div>

        </nav>
    </header>

    <aside class="left-sidebar" data-sidebarbg="skin6">

        <div class="scroll-sidebar" data-sidebarbg="skin6">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="{{url('/')}}"
                                                aria-expanded="false"><i data-feather="home"
                                                                         class="feather-icon"></i><span
                                class="hide-menu">Inicio</span></a></li>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Operaciones</span></li>
                    <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="{{route('cita.index')}}"
                                                aria-expanded="false">
                            <i class="fa fa-stethoscope"></i>
                            <span
                                class="hide-menu">Citas</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="{{ route('ventas.index')}}"
                                                aria-expanded="false">
                            <i class=" fa fa-book"></i>

                            <span
                                class="hide-menu">Ventas</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="{{ route('inventario.index')}}"
                                                aria-expanded="false">
                            <i class="far fa-window-maximize"></i>

                            <span
                                class="hide-menu">Inventario</span></a></li>

                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Registro</span></li>


                    <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="{{route('paciente.index')}}"
                                                aria-expanded="false">
                            <i class="fa fa-users"></i>
                            <span
                                class="hide-menu">Pacientes</span></a></li>

                    <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="{{route('medico.index')}}"
                                                aria-expanded="false">
                            <i class="fa fa-user-md"></i>
                            <span
                                class="hide-menu">M??dicos</span></a></li>


                    <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="{{ route('personal.index')}}"
                                                                                                         aria-expanded="false">
                            <i class="fas  fa-users"></i>

                            <span
                                class="hide-menu">Personal</span></a></li>

                    <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="{{ route('medicamento.index')}}"
                                                aria-expanded="false">
                            <i class="fas  fa-medkit"></i>

                            <span
                                class="hide-menu">Medicamento</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="{{ route('presentacion.index')}}"
                                                aria-expanded="false">
                            <i class="fa fa fa-th-large"></i>

                            <span
                                class="hide-menu">Presentaci??n</span></a></li>



                </ul>
            </nav>

        </div>

    </aside>

    <div class="page-wrapper">
        @if($message=\Session::get('success'))
            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                 role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
                <strong>{{$message}}</strong>
            </div>
        @endif
        @yield('content')
        <footer class="footer text-center text-muted">
            Desarrollado por <a
                href="#">Franzua Andrez </a>. Proyecto ??rea de an??lisis y desarrollo
        </footer>

    </div>

</div>

<script src="{{asset('iran/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('iran/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('iran/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script src="{{asset('iran/dist/js/app-style-switcher.js')}}"></script>
<script src="{{asset('iran/dist/js/feather.min.js')}}"></script>
<script src="{{asset('iran/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('iran/dist/js/sidebarmenu.js')}}"></script>
<script src="{{asset('iran/dist/js/custom.min.js')}}"></script>
<script>
    const search = new URLSearchParams(window.location.search).get('search');
    document.getElementById('search').value = search;
</script>

@yield('scripts')
</body>

</html>
