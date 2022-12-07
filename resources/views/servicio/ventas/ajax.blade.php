<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr style="background-color: #F8AC10; color: #fff">
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Total</th>
                    <th>Opciones</th>
                </tr>
                @foreach($collection as $key => $item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $item->fecha->format('d/m/Y') }}</td>
                    <td>{{$item->nombres}} {{$item->apellidos}}</td>
                    <td>Q {{$item->total}} </td>
                    <td>
                        <a href="{{ route('ventas.show', $item->id) }}" data-toggle="tooltip"
                           data-placement="top" title="Ver">
                        Ver
                        </a>
                    </td>
                </tr>

                @endforeach
            </table>
        </div>
    </div>
</div>
