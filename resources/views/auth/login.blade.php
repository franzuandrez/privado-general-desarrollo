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

<div id="main-wrapper">

    <div class="page-wrapper">
        <br><br><br><br><br><br><br><br><br><br>


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        &nbsp;
                    </div>

                    <div class="card-body">
                        <div style="width: 100%; text-align: center">
                            <img src="{{ asset('assets/images/image_1.png') }}" alt="" width="300">
                        </div>

                        <hr>
                        <br><br><br>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                </label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="text-align: center">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordarme') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" style="text-align: center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        &nbsp;
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




















        <footer class="footer text-center text-muted">
            Desarrollado por <a
                href="#">Franzua Andrez </a>. Proyecto área de análisis y desarrollo
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
