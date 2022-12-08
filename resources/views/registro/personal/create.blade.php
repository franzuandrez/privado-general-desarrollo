@extends('layout.app')
@section('content')

    @include('partitials.messages')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="grid-header">Registro de personal</p>
            </div>
        </div>
        <form action="{{ route('personal.store') }}" method="POST">
            @csrf


            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType1">Nombres</label>
                        <input type="text" name="nombres" class="form-control"
                               value="{{ old('nombres') }}">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control"
                               value="{{ old('apellidos') }}">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" id="" class="form-control">
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{$tipo->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="contraseña">Contraseña</label>
                        <input type="password" name="contrasenia" class="form-control">
                    </div>
                </div>

            </div>
            <br><br>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-dark" href="{{ route('personal.index') }}" role="button">
                        Regresar
                    </a>

                </div>
            </div>


        </form>

    </div>


@endsection
@section('scripts')
    <script>
        $(function () {
            $(".datepicker").datepicker();
        });
    </script>
@endsection
