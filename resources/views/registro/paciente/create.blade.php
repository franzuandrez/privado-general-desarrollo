@extends('layout.app')
@section('content')


    @include('partitials.messages')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="grid-header">Registro de Paciente</p>
            </div>
        </div>
        <form action="{{ route('paciente.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="cui">CUI</label>
                        <input type="text" name="cui" class="form-control"
                               id="cui"
                               value="{{ old('cui') }}" autofocus>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="primer_nombre">Primer nombre</label>
                        <input type="text" name="primer_nombre" class="form-control"
                               id="cui"
                               value="{{ old('primer_nombre') }}" autofocus>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="segundo_nombre">Segundo nombre</label>
                        <input type="text" name="segundo_nombre" class="form-control"
                               id="segundo_nombre"
                               value="{{ old('segundo_nombre') }}" autofocus>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="primer_apellido">Primer apellido</label>
                        <input type="text" name="primer_apellido" class="form-control"
                               id="primer_apellido"
                               value="{{ old('primer_apellido') }}" autofocus>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="segundo_apellido">Segundo apellido</label>
                        <input type="text" name="segundo_apellido" class="form-control"
                               value="{{ old('segundo_apellido') }}">
                    </div>
                </div>
                <div class="col-4 col-md-4 col-sm-6 col-lg-3">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <input type="date"
                               name="fecha_nacimiento"

                               class="form-control">
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-dark" href="{{ route('paciente.index') }}" role="button">
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
            $(".datepicker").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection
