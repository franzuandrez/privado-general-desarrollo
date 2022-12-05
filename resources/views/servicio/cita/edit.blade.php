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

    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Registro</p>
            <div class="grid-body">
                <form action="{{ route('cita.update', $cita->id) }}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="item-wrapper">
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto">

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType12">Paciente</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" class="form-control"
                                               value="{{ $cita->paciente->nombres . ' ' . $cita->paciente->apellidos }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType1">Motivo</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="motivo" class="form-control"
                                               value="{{ $cita->motivo }}">
                                    </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType13">Fecha cita</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="fecha_cita" class="form-control datepicker"
                                               value="{{ $cita->fecha_cita->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="text-align:center">
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
        </div>
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
