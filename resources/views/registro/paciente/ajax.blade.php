<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr style="background-color: #F8AC10; color: #fff">
                    <th>#</th>
                    <th>Cui</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Opciones</th>
                </tr>
                @foreach($collection as $key => $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->cui }}</td>
                        <td>{{ $item->nombres }}</td>
                        <td>{{ $item->apellidos }}</td>
                        <td>
                            @php
                                $nacimiento = $item->fecha_nacimiento;
                                $actual = \Carbon\Carbon::now();
                            @endphp
                            {{ str_replace('antes', '', $item->fecha_nacimiento->diffForHumans($actual)) }}
                        </td>
                        <td>
                            <a href="{{ route('paciente.edit', $item->id) }}" data-toggle="tooltip"
                               data-placement="top" title="Editar">
                                <i class="fa fa-pencil-square" aria-hidden="true"></i>Modificar
                            </a>
                            &nbsp;&nbsp;
                            <a href="{{ route('paciente.historial', $item->id) }}" data-toggle="tooltip"
                               data-placement="top" title="Historial">
                                <i class="fa fa-eye"></i>Historial
                            </a>
                            <a href="javascript:$('#form-destroy-{{$item->id}}').submit()" data-toggle="tooltip"
                               data-placement="top" title="Dar de baja">
                                <i class="fa fa-trash"></i>Baja
                            </a>
                            <form id="form-destroy-{{$item->id}}"
                                  action="{{ route('paciente.destroy', $item->id) }}" method="POST">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
