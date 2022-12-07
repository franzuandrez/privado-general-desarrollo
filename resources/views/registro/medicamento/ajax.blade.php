<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr style="background-color: #F8AC10; color: #fff">
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </tr>
                @foreach($collection as $key => $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->descripcion }}</td>

                        <td>
                            <a href="{{ route('medicamento.edit', $item->id) }}" data-toggle="tooltip"
                               data-placement="top" title="Editar">
                                Editar
                            </a>
                            &nbsp;&nbsp;

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
