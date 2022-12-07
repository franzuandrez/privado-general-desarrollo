<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr style="background-color: #F8AC10; color: #fff">
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Opciones</th>
                </tr>
                @foreach($collection as $key => $item)
                    <tr>
                        {{--                                        <td><input type="radio" name="id_item" value="{{ $item->id }}"></td>--}}
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombres }}</td>
                        <td>{{ $item->apellidos }}</td>
                        <td>
                            <a href="{{ route('personal.edit', $item->id) }}" data-toggle="tooltip"
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
