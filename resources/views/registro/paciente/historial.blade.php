@extends('layout.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-md-12">
                                <div class="grid">
                                    <h4 class="card-title">
                                        <i class="fas fa-eye"></i> Historial
                                    </h4>
                                    <div class="item-wrapper">
                                        <div class="row">
                                            <div class="col col-md-4 col-xl-4 col-lg-4">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">Paciente</label>
                                                    <input id="description" name="description" type="text"
                                                           readonly
                                                           value="{{$paciente->nombres}} {{$paciente->apellidos}}"
                                                           class="form-control @error('description') is-invalid @enderror"
                                                           placeholder="Ingrese la descripción">
                                                    @error('description')
                                                    <span>{{$message}}</span>
                                                    @enderror
                                                </div>


                                                <a class="btn btn-dark" href="{{url('/paciente')}}" role="button">
                                                    Regresar
                                                </a>

                                            </div>
                                            <div class="col col-md-12 col-xl-12 col-lg-4">
                                                <div class="item-wrapper">
                                                    <div class="table-responsive">
                                                        <div id="content">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table ">
                                                                            <tr style="background-color: #F8AC10; color: #fff">

                                                                                <th>PDF</th>
                                                                                <th>MOTIVO</th>
                                                                                <th>DIAGNOSTICO</th>
                                                                                <th>FECHA</th>
                                                                                <th>RECETA</th>

                                                                            </tr>
                                                                            @foreach($citas as $key => $item)

                                                                                <tr>
                                                                                    <td>
{{--                                                                                        <a href="{{ url('receta/' . $item->id) }}">--}}
{{--                                                                                    </a>--}}
                                                                                        {{ 'cita: ' . $item->id }}

                                                                                    </td>
                                                                                    <td>{{ $item->motivo }}</td>
                                                                                    <td>{{ $item->diagnostico }}</td>
                                                                                    <td>{{ $item->fecha }}</td>
                                                                                    <td>
                                                                                        <table class="table ">
                                                                                            <th>Medicamento</th>
                                                                                            <th>Indicación</th>
                                                                                            @foreach(  \App\RecetaEnc::join('receta_det','receta_det.id_receta_enc','=','receta_enc.id')
                                                                                                                 ->join('medicamento','medicamento.id','=','receta_det.id_medicamento')
                                                                                                                ->where('receta_enc.id_cita',$item->id_cita)
                                                                                                                ->get()  as $key => $k)

                                                                                                <tr>
                                                                                                    <td> {{$k->nombre}}</td>
                                                                                                    <td> {{$k->indicacion}}</td>
                                                                                                </tr>

                                                                                            @endforeach
                                                                                        </table>
                                                                                    </td>

                                                                                </tr>
                                                                            @endforeach

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
