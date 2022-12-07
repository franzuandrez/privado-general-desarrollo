@extends('layout.app')
@section('content')
    @component('partitials.nav',['operation'=>'Editar',
      'menu_icon'=>'mdi mdi-clipboard-text-outline link-icon',
      'submenu_icon'=>'fa-solid fa-id-card icono',
      'operation_icon'=>'fa-solid fa-plus',])
        @slot('menu')
            Registro
        @endslot
        @slot('submenu')
            Tipo Personal
        @endslot
    @endcomponent


    @include('partitials.messages')



    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Registro</p>
            <div class="grid-body">
                <form action="{{ route('tipo_personal.update', $role->id) }}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="item-wrapper">
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto">
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType1">Tipo</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="tipo" class="form-control" value="{{ $role->name }}" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover  ">
                                        <thead>
                                        <th colspan="3" style="background-color: #6c5ce7 !important; color: #fff;">MENU</th>
                                        </thead>
                                        <tbody>

                                        @foreach($menus as $menu)
                                            <tr>
                                                <td width="5%">

                                                    <input type="checkbox" value="{{$menu->id}}"
                                                           <?php  if (in_array($menu->id, $rolePermissions)) echo 'checked' ?> name="permission[]"
                                                           onchange="javascript:habilitarOpciones(this)"
                                                           id="input-{{$menu->id}}">


                                                </td>
                                                <td width="5%">
                                                    <button type="button" id="btn-{{$menu->id}}"
                                                            class="btn btn-default btn-xs collapsed" data-toggle="collapse"
                                                            data-target="#opciones-{{ $menu->id}}"><span
                                                            class="fa fa-sort-desc"></span></button>
                                                </td>
                                                <td><i class="fa {{$menu->icon}}"></i> {{$menu->display_name}}</td>

                                            </tr>
                                            <tr>
                                                <td colspan="3" class="hiddenRow">
                                                    <div class="accordian-body collapse" id="opciones-{{ $menu->id}}">
                                                        <table class="table table-striped table-condensed ">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                </th>
                                                                <th>

                                                                    Opcion
                                                                </th>
                                                            </tr>

                                                            </thead>
                                                            <tbody>
                                                            @foreach ($opciones as $opcion)
                                                                @if($opcion->id_menu == $menu->orden_menu)
                                                                    <tr>

                                                                        <td class="filterable-cell" style="text-align: center"><input type="checkbox"
                                                                                                                                      value="{{$opcion->id}}"
                                                                                                                                      <?php  if (in_array($opcion->id, $rolePermissions)) echo 'checked'?> name="permission[]">
                                                                        </td>

                                                                        <td class="filterable-cell"><i
                                                                                class="fa {{$opcion->icon}}"></i> {{ $opcion->display_name}}
                                                                        </td>
                                                                    <tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="text-align:center">
                        <div class="col-12">
                            <a href="{{ route('tipo_personal.index') }}" class="btn btn-success">
                                <i class="fa-solid fa-ban icono"></i>&nbsp;&nbsp;
                                Cancelar
                            </a>

                            <button class="btn btn-primary" type="submit">
                                <i class="fa-regular fa-floppy-disk icono"></i>&nbsp;&nbsp;Guardar
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/permisos.js')}}"></script>
    <script>
        $(function () {
            $(".datepicker").datepicker();
        });
    </script>
@endsection
