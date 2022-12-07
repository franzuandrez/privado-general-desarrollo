@extends('layout.app')
@section('content')
    @component('partitials.nav',['operation'=>'Editar',
      'menu_icon'=>'mdi mdi-clipboard-text-outline link-icon',
      'submenu_icon'=>'fa-solid fa-id-card icono',
      'operation_icon'=>'fa-solid fa-plus',])
        @slot('menu')
            Personal
        @endslot
        @slot('submenu')
            Personal
        @endslot
    @endcomponent

    @include('partitials.messages')

    <div class="col-lg-12">
        <div class="grid">
            <p class="grid-header">Registro</p>
            <div class="grid-body">
                <form action="{{ route('personal.update', $personal->id) }}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="item-wrapper">
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto">

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType1">Nikname</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="nickname" class="form-control" value="{{ $personal->name }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType1">Nombres</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="nombres" class="form-control" value="{{ $personal->nombres }}">
                                    </div>
                                </div>
                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType12">Apellidos</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="apellidos" class="form-control" value="{{ $personal->apellidos }}">
                                    </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType12">Tipo</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <select name="tipo" id="" class="form-control">
                                            @foreach($tipos as $tipo)
{{--                                                <option value="{{ $tipo->id }}">{{$tipo->name}}</option>--}}
                                                <option {{ $personalTipo[0]->id == $tipo->id ? 'selected' : ''}} value="{{ $tipo->id }}">{{$tipo->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType12">Email</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="text" name="email" class="form-control" value="{{ $personal->email }}">
                                    </div>
                                </div>

                                <div class="form-group row showcase_row_area">
                                    <div class="col-md-3 showcase_text_area">
                                        <label for="inputType12">Contraseña</label>
                                    </div>
                                    <div class="col-md-9 showcase_content_area">
                                        <input type="password" name="contrasenia" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="text-align:center">
                        <div class="col-12">
                            <a href="{{ route('personal.index') }}" class="btn btn-success">
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
