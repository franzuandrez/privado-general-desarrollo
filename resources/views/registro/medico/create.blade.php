@extends('layout.app')
@section('content')

    <br><br><br>
    @include('partitials.messages')
    <form action="{{ route('medico.store') }}" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType1">Username</label>
                        <input type="text" name="username" class="form-control"
                               value="{{ old('username') }}" autofocus>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType1">Nombres</label>
                        <input type="text" name="nombres" class="form-control"
                               value="{{ old('nombres') }}">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType1">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control"
                               value="{{ old('apellidos') }}">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType1">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email') }}">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType1">Password</label>
                        <input type="password" name="password" class="form-control"
                               value="{{ old('password') }}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-dark" href="{{route('medico.index')}}" role="button">
                        Regresar
                    </a>
                </div>
            </div>
        </div>
    </form>

@endsection
@section('scripts')
    <script>
        $(function () {
            $(".datepicker").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection
