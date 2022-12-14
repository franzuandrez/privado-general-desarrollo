<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr style="background-color: #F8AC10; color: #fff">
                    <th>#</th>
                    <th>PACIENTE</th>
                    <th>MOTIVO</th>
                    <th>FECHA CITA</th>
                    <th>OPCIONES</th>
                </tr>
                @foreach($collection as $key => $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombres . ' ' . $item->apellidos }}</td>
                        <td>{{ $item->motivo }}</td>
                        <td>{{ $item->fecha_cita->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('cita.edit', $item->id) }}" data-toggle="tooltip"
                               data-placement="top" title="Editar">
{{--                                <i class="fa-solid fa-pen-to-square"></i>--}}
                            </a>
                            &nbsp;
                            <a href="javascript:$('#form-destroy-{{$item->id}}').submit()" data-toggle="tooltip"
                               data-placement="top" title="Descartar">
                                Descartar
{{--                                <i class="fa-solid fa-trash"></i>--}}
                            </a>&nbsp;
                            <a href="{{ route('diagnostico.create', $item->id) }}" data-toggle="tooltip"
                               data-placement="top" title="Atender">
                                <i class="fa-solid fa-user-doctor"></i>
                                Atender
                            </a>
                            <form id="form-destroy-{{$item->id}}"
                                  action="{{ route('cita.destroy', $item->id) }}" method="POST">
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
