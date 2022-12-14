<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr style="background-color: #6c5ce7; color: #fff">
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                </tr>
                @foreach($collection as $key => $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{ route('tipo_personal.edit', $item->id) }}" data-toggle="tooltip"
                               data-placement="top" title="Editar">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="javascript:$('#form-destroy-{{$item->id}}').submit()" data-toggle="tooltip"
                               data-placement="top" title="Dar de baja">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <form id="form-destroy-{{$item->id}}"
                                  action="{{ route('tipo_personal.destroy', $item->id) }}" method="POST">
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
<script>

</script>
