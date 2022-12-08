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
                                    <p class="grid-header">Receta</p>
                                    <div class="grid-body">

                                        <div class="item-wrapper">
                                            <div class="row mb-3">
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputType1">Medicamento</label>
                                                        <select name="medicamento"
                                                                class="js-example-basic-single form-control"
                                                                onchange="cargarPresentaciones($(this).val())"
                                                                id="medicamentos">
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
                                                        <select name="presentacion"
                                                                class="js-example-basic-single form-control"
                                                                onchange="mostrar_precio()"
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
                                                        <input type="number"
                                                               onkeyup="calcular_subtotal()"
                                                               class="form-control" id="cantidad">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputType1">Precio (Q)</label>
                                                        <input type="number" readonly class="form-control" id="precio">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputType1">Total</label>
                                                        <input type="number" readonly class="form-control"
                                                               value="0"
                                                               id="total">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 mx-auto">
                                                <button class="btn btn-primary"
                                                        style="margin-left: auto; margin-right: auto"
                                                        onclick="javascript:agregarItems()">
                                                    Agregar
                                                </button>
                                            </div>

                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-striped table-bordered table-condensed table-hover  ">
                                                        <thead>
                                                        <tr>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;"></th>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;">
                                                                Medicamento
                                                            </th>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;">
                                                                Presentacion
                                                            </th>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;">
                                                                Cantidad
                                                            </th>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;">
                                                                Precio
                                                            </th>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;">
                                                                Total
                                                            </th>
                                                            <th style="background-color: #F8AC10 !important; color: #fff;">
                                                                Indicaciones
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="grid-receta">
                                                        <tr>
                                                            <td>

                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="5">Total</td>
                                                            <td colspan="2"
                                                                id="grand_total">
                                                            </td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <hr>

                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-primary" type="button" onclick="grabarDatos()">
                                                    Recetar
                                                </button>
                                                <button class="btn btn-secondary" type="button"
                                                        onclick="grabarDatos(0)">
                                                    Recetar y despachar
                                                </button>
                                                <a class="btn btn-dark" href="{{ route('cita.index') }}" role="button">
                                                    Regresar
                                                </a>

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

        let presentaciones = [];
        let grand_total = 0;

        function mostrar_precio() {
            const id = document.getElementById('presentaciones').value;
            const precio = presentaciones.filter(d => d.id == id)[0];

            document.getElementById('precio').value = precio.precio;
        }

        function calcular_subtotal() {

            const cantidad = document.getElementById('cantidad').value;
            const precio = parseFloat(document.getElementById('precio').value);
            const total = parseFloat(cantidad) * parseFloat(precio);
            document.getElementById('total').value = total;
        }

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
                        presentaciones = response.data;
                        document.getElementById('precio').value = ""
                        document.getElementById('total').value = ""
                        document.getElementById('cantidad').value = ""

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

            const precio = parseFloat(document.getElementById('precio').value);
            const total = parseFloat(document.getElementById('total').value);
            grand_total = total + grand_total;
            document.getElementById('grand_total').textContent = 'Q ' + grand_total;

            diagnostico.addItem(id_registro, id_medicamento, id_presentacion, cantidad, indicaciones, medicamento.trim(), presentacion.trim(), precio, total)
            cargarGrid();
            document.getElementById('precio').value = ""
            document.getElementById('total').value = ""
            document.getElementById('cantidad').value = ""
            document.getElementById('indicaciones').value = ""
        }

        function cargarGrid() {
            let rows = ``;
            console.log(diagnostico.getAll());
            diagnostico.getAll().forEach((val, idx) => {
                rows += `<tr>`;
                rows += `<td><a href="javascript:eliminarItem(${val.id})"> <i class="fa fa-trash text-danger"></i></a></td>`;
                rows += `<td>${val.medicamento}</td>`;
                rows += `<td>${val.presentacion}</td>`;
                rows += `<td>${val.cantidad}</td>`;
                rows += `<td>Q. ${val.precio}</td>`;
                rows += `<td>Q. ${val.total}</td>`;
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

        async function grabarDatos(solo_receta = 1) {
            let inputDiagnostico = $('#diagnostico').val();

            if (inputDiagnostico == "") {
                alert('Ingrese el diagnóstico');
                $('#diagnostico').focus();
                return;
            }

            if (diagnostico.getTotalItems() == 0) {
                alert('Añada al menos un medicamento  la receta');
                return;
            }

            let formulario = $('#form-receta');
            let data = formulario.serialize() + `&solo_receta=${solo_receta}&diagnostico=${inputDiagnostico}&receta=${JSON.stringify(diagnostico.getAll())}`;


            await $.ajax({
                url: "{{ route('diagnostico.store') }}",
                method: 'post',
                data: data,
                success: function (response) {
                    window.location.href = "{{url('/receta')}}" +'/'+response.data;

                }, error: function (error) {
                    alert(response.message)
                }
            });


        }

    </script>
@endsection
