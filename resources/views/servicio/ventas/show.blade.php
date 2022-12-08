@extends('layout.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col col-md-12">
                            <div class="grid">
                                <h4 class="card-title">Detalle de la venta
                                </h4>

                                <div class="item-wrapper">
                                    <div class="table-responsive">
                                        <div id="content">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="form-group">
                                                        <label for="Fecha">Fecha</label>
                                                        <input type="text" name="Fecha"
                                                               readonly
                                                               class="form-control datepicker"
                                                               value="{{ $venta->fecha->format('d/m/Y') }}">
                                                    </div>
                                                    <a class="btn btn-dark" href="{{url('/ventas')}}" role="button">
                                                       &nbsp; Regresar
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <tr style="background-color: #F8AC10; color: #fff">
                                                                <th>#</th>
                                                                <th>Medicamento</th>
                                                                <th>Presentación</th>
                                                                <th>Cantidad</th>
                                                                <th>Precio (Q)</th>
                                                                <th>Total</th>
                                                            </tr>
                                                            @foreach($detalle as $key => $item)
                                                                <tr>
                                                                    <td>{{ $key+1 }}</td>
                                                                    <td>{{ $item->descripcion  }}</td>
                                                                    <td>{{ $item->presentacion }}</td>
                                                                    <td>{{ $item->cantidad }}</td>
                                                                    <td>Q {{ $item->precio }}</td>
                                                                    <td>Q {{ $item->total }}</td>
                                                                </tr>

                                                            @endforeach
                                                            <tfoot>
                                                            <tr>
                                                                <td colspan="5"><b>Total</b></td>
                                                                <td colspan="5">Q {{$venta->total}}</td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>

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
        </div>
    </div>

@endsection
