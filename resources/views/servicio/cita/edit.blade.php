@extends('layout.app')
@section('content')
    @component('partitials.nav',['operation'=>'Editar',
      'menu_icon'=>'mdi mdi-clipboard-text-outline link-icon',
      'submenu_icon'=>'fa-solid fa-id-card icono',
      'operation_icon'=>'fa-solid fa-plus',])
        @slot('menu')
            Personal
        @endslot
        @slot('submenu')
            Personal
        @endslot
    @endcomponent

    @include('partitials.messages')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="grid-header">Registro</p>
            </div>
        </div>
        <form action="{{ route('cita.update', $cita->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType12">Paciente</label>
                        <input type="text" class="form-control"
                               value="{{ $cita->paciente->nombres . ' ' . $cita->paciente->apellidos }}"
                               disabled>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType1">Motivo</label>
                        <input type="text" name="motivo" class="form-control"
                               value="{{ $cita->motivo }}">
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType13">Fecha cita</label>
                        <input type="text" name="fecha_cita" class="form-control datepicker"
                               value="{{ $cita->fecha_cita->format('Y-m-d') }}">
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
