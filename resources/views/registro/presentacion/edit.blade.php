@extends('layout.app')
@section('content')
    @component('partitials.nav',['operation'=>'Editar',
      'menu_icon'=>'mdi mdi-clipboard-text-outline link-icon',
      'submenu_icon'=>'fa-solid fa-pills',
      'operation_icon'=>'fa-solid fa-pen-to-square',])
        @slot('menu')
            Registro
        @endslot
        @slot('submenu')
            Medicamento
        @endslot
    @endcomponent

    @include('partitials.messages')

    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Registro</p>
            <div class="grid-body">
                <form action="{{ route('presentacion.update', $presentacion->id) }}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="item-wrapper">
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto">
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType1">Presentación</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="presentacion" class="form-control" value="{{ $presentacion->presentacion }}" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="text-align:center">
                        <div class="col-12">
                            <a href="{{ route('presentacion.index') }}" class="btn btn-success">
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
        $(function () {
            $(".datepicker").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection
