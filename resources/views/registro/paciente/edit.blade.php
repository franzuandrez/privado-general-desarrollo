@extends('layout.app')
@section('content')



    @include('partitials.messages')


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="grid-header">Editar Paciente</p>
            </div>
        </div>
        <form action="{{ route('paciente.update', $paciente->id) }}" method="POST">
            @csrf
            <input hidden name="_method" value="PATCH">

            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="cui">CUI</label>
                        <input type="text" name="cui" class="form-control"
                               id="cui"
                               value="{{$paciente->cui}}" autofocus>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="primer_nombre">Primer nombre</label>
                        <input type="text" name="primer_nombre" class="form-control"
                               id="primer_nombre"
                               value="{{$paciente->primer_nombre}}" autofocus>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="segundo_nombre">Segundo nombre</label>
                        <input type="text" name="segundo_nombre" class="form-control"
                               id="segundo_nombre"
                               value="{{$paciente->segundo_nombre}}" >
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="primer_apellido">Primer apellido</label>
                        <input type="text" name="primer_apellido" class="form-control"
                               id="primer_apellido"
                               value="{{$paciente->primer_apellido}}" >
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="segundo_apellido">Segundo apellido</label>
                        <input type="text" name="segundo_apellido" class="form-control"
                               value="{{$paciente->segundo_apellido}}" >
                    </div>
                </div>
                <div class="col-4 col-md-4 col-sm-6 col-lg-3">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <input type="date"
                               name="fecha_nacimiento"
                               value="{{$paciente->fecha_nacimiento}}"
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
