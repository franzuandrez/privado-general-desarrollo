@extends('layout.app')
@section('content')


    @include('partitials.messages')

    <div class="row">
        <div class="col col-md-12">
            <div class="grid">
                <p class="grid-header">Registar Paciente
                </p>

                    <div class="row" >
                        <div class="col col-md-12 col-xl-12">
                            <form action="{{ route('paciente.store') }}" method="POST">
                                @csrf

                                <div class="item-wrapper">
                                    <div class="row mb-3">
                                        <div class="col-md-8 mx-auto">
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputType1">Nombres</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input type="text" name="nombres" class="form-control"
                                                           value="{{ old('nombres') }}" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputType12">Apellidos</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input type="text" name="apellidos" class="form-control"
                                                           value="{{ old('apellidos') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputType13">Fecha de nacimiento</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input type="text" name="fecha_nacimiento"
                                                           class="form-control datepicker"
                                                           value="{{ old('fecha_nacimiento') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row" style="text-align:center">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a class="btn btn-dark" href="{{url('/customers')}}" role="button">
                                            Regresar
                                        </a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

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
