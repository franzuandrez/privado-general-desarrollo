@extends('layout.app')
@section('content')


    @include('partitials.messages')

    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Registro</p>
            <div class="grid-body">
                <form action="{{ route('inventario.store') }}" method="POST">
                    @csrf

                    <div class="item-wrapper">
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto">
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="hidden" value="1" name="tipo_movimiento">
                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType1">Medicamento</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <select name="medicamento" class="js-example-basic-single form-control"
                                                onchange="cargarPresentaciones($(this).val())" id="medicamentos">
                                            <option selected >Seleccione medicamento</option>
                                            @foreach($medicamentos as $medicamento)
                                                <option {{ old('medicamento') == $medicamento->id ? 'selected' : '' }} value="{{ $medicamento->id }}">
                                                    {{ $medicamento->nombre }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType12">Presentación</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <select name="presentacion" class="js-example-basic-single form-control"
                                                id="presentaciones">
                                        </select>
                                        <span><a href="javascript:cargarPresentaciones($('#medicamentos').val())"
                                                 class=""><i class="fa-solid fa-rotate"></i></a></span>
                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType12">Total</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="number" name="total" class="form-control"
                                               value="{{ old('total') }}">
                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType13">Fecha de vencimiento</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="date" name="fecha_vencimiento" class="form-control datepicker"
                                               value="{{ old('fecha_vencimiento') }}">
                                    </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType13">Lote</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="lote" class="form-control"
                                               value="{{ old('lote') }}">
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a class="btn btn-dark" href="{{ route('inventario.index') }}" role="button">
                                Regresar
                            </a>

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

        async function cargarPresentaciones(id_medicamento) {
            let url = `{{ route('inventario.getPresentaciones') }}?id_medicamento=${id_medicamento}`;

            await $.ajax({
                url: url,
                method: 'get',
                success: function (response) {
                    if (response.status == 200) {
                        let options = ``;
                        response.data.forEach((val, idx) => {
                            options += `<option value="${val.id}">${val.presentacion}</option>`;
                        });

                        console.log(options);
                        $('#presentaciones').html(options);

                    }
                }, error: function (error) {
                    console.log(error);
                }
            });
        }

    </script>
@endsection
