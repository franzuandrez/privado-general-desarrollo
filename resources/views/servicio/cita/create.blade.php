@extends('layout.app')
@section('content')


    @include('partitials.messages')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="grid-header">Reigstro de cita</p>
            </div>
        </div>
        <form action="{{ route('cita.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType12">Paciente</label>
                        <select name="paciente" class="form-control js-example-basic-single">
                            @foreach($pacientes as $paciente)
                                <option
                                    {{ old('paciente') == $paciente->id ? 'selected': '' }} value="{{ $paciente->id }}">{{$paciente->nombres . ' ' . $paciente->apellidos}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType1">Motivo</label>
                        <input type="text" name="motivo" class="form-control"
                               value="{{ old('motivo') }}">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType13">Fecha cita</label>
                        <input type="text" name="fecha_cita" class="form-control datepicker"
                               value="{{ old('fecha_cita') }}">
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-dark" href="{{ route('cita.index') }}" role="button">
                        Regresar
                    </a>

                </div>
            </div>

        </form>
    </div>


@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(".datepicker").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
