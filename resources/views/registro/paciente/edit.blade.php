@extends('layout.app')
@section('content')



    @include('partitials.messages')

    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Editar Paciente</p>
            <div class="grid-body">
                <form action="{{ route('paciente.update', $paciente->id) }}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="item-wrapper">
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto">
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType1">Nombres</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="nombres" class="form-control" value="{{ $paciente->nombres }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType12">Apellidos</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="apellidos" class="form-control" value="{{ $paciente->apellidos }}">
                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType13">Fecha de nacimiento</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="fecha_nacimiento" class="form-control datepicker"
                                               value="{{ $paciente->fecha_nacimiento->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="text-align:center">
                        <div class="col-12">
                            <a href="{{ route('paciente.index') }}" class="btn btn-success">
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
