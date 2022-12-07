@extends('layout.app')
@section('content')
    @component('partitials.nav',['operation'=>'Nuevo',
      'menu_icon'=>'mdi mdi-clipboard-text-outline link-icon',
      'submenu_icon'=>'fa-solid fa-id-card icono',
      'operation_icon'=>'fa-solid fa-plus',])
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
                <form action="{{ route('medicamento.store') }}" method="POST">
                    @csrf

                    <div class="item-wrapper">
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto">
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType1">Nombre</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="nombre" class="form-control"
                                               value="{{ old('nombre') }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType12">Descripción</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="descripcion" class="form-control"
                                               value="{{ old('descripcion') }}">
                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType12">Presentaciones</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <select name="presentaciones[]" multiple class="form-control">
                                            @foreach($presentaciones as $presentacion)
                                                <option value="{{ $presentacion->id }}">{{ $presentacion->presentacion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="text-align:center">
                        <div class="col-12">
                            <a href="{{ route('medicamento.index') }}" class="btn btn-success">
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
