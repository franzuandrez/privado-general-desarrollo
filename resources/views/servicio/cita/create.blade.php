@extends('layout.app')
@section('content')
    @component('partitials.nav',['operation'=>'Nuevo',
      'menu_icon'=>'mdi mdi-clipboard-text-outline link-icon',
      'submenu_icon'=>'fa-solid fa-bell-concierge icono',
      'operation_icon'=>'fa-solid fa-plus',])
        @slot('menu')
            Servicio
        @endslot
        @slot('submenu')
            Cita
        @endslot
    @endcomponent

    @include('partitials.messages')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="grid-header">Registro</p>
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
                    <a href="{{ route('cita.index') }}" class="btn btn-success">
                        <i class="fa-solid fa-ban icono"></i>&nbsp;&nbsp;
                        Cancelar
                    </a>

                    <button class="btn btn-primary" type="submit">
                        <i class="fa-regular fa-floppy-disk icono"></i>&nbsp;&nbsp;Guardar
                    </button>

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
