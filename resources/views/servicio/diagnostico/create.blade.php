@extends('layout.app')
@section('content')

    @include('partitials.messages')

    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col col-md-12">
                            <div class="grid">
                                <h4 class="card-title">Diagnóstico</h4>

                            </div>
                            <div class="item-wrapper">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Paciente</label>
                                            <input readonly type="text" class="form-control"
                                                   value="{{ $paciente->nombres }} {{ $paciente->apellidos }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Edad</label>
                                            <input readonly type="text" class="form-control"
                                                   value="{{ str_replace('antes', '', $paciente->fecha_nacimiento->diffForHumans(\Carbon\Carbon::now())) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <div class="grid">
                                <p class="grid-header">Registro</p>
                                <div class="grid-body">
                                    <div class="item-wrapper">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputType1">Diagnóstico</label>
                                                    <textarea name="diagnostico" id="diagnostico" cols="14" rows="5"
                                                              class="form-control"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container-fluid">
                            <div class="col-lg-12">
                                <div class="grid">
                                    <p class="grid-header">RECETA</p>
                                    <div class="grid-body">

                                        <div class="item-wrapper">
                                            <div class="row mb-3">
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputType1">Medicamento</label>
                                                        <select name="medicamento" class="js-example-basic-single form-control"
                                                                onchange="cargarPresentaciones($(this).val())" id="medicamentos">
                                                            <option value="">-- SELECCIONAR --</option>
                                                            @foreach($medicamentos as $medicamento)
                                                                <option value="{{ $medicamento->id }}">
                                                                    {{ $medicamento->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputType1">Presentación</label>
                                                        <select name="presentacion" class="js-example-basic-single form-control"
                                                                id="presentaciones">
                                                            <option value="">-- SELECCIONAR --</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputType1">Indicaciones</label>
                                                        <input type="text" class="form-control" id="indicaciones">
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputType1">Cantidad</label>
                                                        <input type="number" class="form-control" id="cantidad">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 mx-auto">
                                                <button class="btn btn-primary" style="margin-left: auto; margin-right: auto"
                                                        onclick="javascript:agregarItems()">
                                                    <i class="fa-solid fa-plus icono"></i>&nbsp;AGREGAR
                                                </button>
                                            </div>

                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-condensed table-hover  ">
                                                        <thead>
                                                        <tr>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;"></th>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;">MEDICAMENTO
                                                            </th>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;">
                                                                PRESENTACION
                                                            </th>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;">CANTIDAD</th>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;">
                                                                INDICACIONES
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="grid-receta">
                                                        <tr>
                                                            <td>

                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <hr>
                                        <div class="row" style="text-align:center">
                                            <div class="col-12">
                                                <a href="{{ route('cita.index') }}" class="btn btn-success">
                                                    <i class="fa-solid fa-ban icono"></i>&nbsp;&nbsp;
                                                    Cancelar
                                                </a>

                                                <button class="btn btn-primary" type="button" onclick="grabarDatos()">
                                                    <i class="fa-regular fa-floppy-disk icono"></i>&nbsp;&nbsp;Guardar
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <hr>
    <hr>




    <form action="{{ route('diagnostico.store') }}" method="POST" id="form-receta">
        <input type="hidden" name="_token" value="{{ @csrf_token() }}">
        <input type="hidden" name="id_cita" value="{{ $id_cita }}">
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('js/grid-diagnostico.js') }}"></script>
    <script>
        $(function () {
            $('.js-example-basic-single').select2();
        });

        async function cargarPresentaciones(id_medicamento) {
            let url = `{{ route('inventario.getPresentaciones') }}?id_medicamento=${id_medicamento}`;

            await $.ajax({
                url: url,
                method: 'get',
                success: function (response) {
                    if (response.status == 200) {
                        let options = `<option value="">-- SELECCIONAR --</option>`;
                        response.data.forEach((val, idx) => {
                            options += `<option value="${val.id}">${val.presentacion}</option>`;
                        });

                        $('#presentaciones').html(options);

                    }
                }, error: function (error) {
                    console.log(error);
                }
            });
        }

        let diagnostico = new main();
        let id_registro = 0;

        function agregarItems() {
            id_registro++;

            if ($('#medicamentos').val() == '' || $('#presentaciones').val() == '' || $('#cantidad').val() == '' || $('#indicaciones').val() == '') {
                alert('Complete los campos de la receta');
                return;
            }

            let id_medicamento = $('#medicamentos').val();
            let medicamento = $('#medicamentos option:selected').text();

            let id_presentacion = $('#presentaciones').val();
            let presentacion = $('#presentaciones option:selected').text();

            let indicaciones = $('#indicaciones').val();
            let cantidad = $('#cantidad').val();

            diagnostico.addItem(id_registro, id_medicamento, id_presentacion, cantidad, indicaciones, medicamento.trim(), presentacion.trim())
            cargarGrid();
        }

        function cargarGrid() {
            let rows = ``;

            diagnostico.getAll().forEach((val, idx) => {
                rows += `<tr>`;
                rows += `<td><a href="javascript:eliminarItem(${val.id})"> <i class="fa-solid fa-xmark text-danger"></i></a></td>`;
                rows += `<td>${val.medicamento}</td>`;
                rows += `<td>${val.presentacion}</td>`;
                rows += `<td>${val.cantidad}</td>`;
                rows += `<td>${val.indicaciones}</td>`;
                rows += `</tr>`;
            });

            console.log(rows)

            $('#grid-receta').html(rows);
        }

        function eliminarItem(id) {
            diagnostico.deleteItemInArray(id);
            cargarGrid();
        }

        async function grabarDatos() {
            let inputDiagnostico = $('#diagnostico').val();

            if (inputDiagnostico == "") {
                alert('Ingrese el diagnóstico');
                $('#diagnostico').focus();
                return;
            }

            if (diagnostico.getTotalItems() == 0) {
                alert('Añada los medicamentos para la receta');
                return;
            }

            let formulario = $('#form-receta');
            let data = formulario.serialize() + `&diagnostico=${inputDiagnostico}&receta=${JSON.stringify(diagnostico.getAll())}`;


            await $.ajax({
                url: "{{ route('diagnostico.store') }}",
                method: 'post',
                data: data,
                success: function (response) {
                    alert(response.message)
                }, error: function (error) {
                    alert(response.message)
                }
            });


        }

    </script>
@endsection
