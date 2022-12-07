@extends('layout.app')
@section('content')

    @include('partitials.messages')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="grid-header">Editar</p>
            </div>
        </div>
        <form action="{{ route('personal.update', $personal->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" class="form-control" value="{{ $personal->nombres }}">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="apellidos ">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control"
                               value="{{ $personal->apellidos }}">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="apellidos ">Tipo</label>
                        <select name="tipo" id="" class="form-control">
                            @foreach($tipos as $tipo)
                                {{--                                                <option value="{{ $tipo->id }}">{{$tipo->name}}</option>--}}
                                <option
                                    {{ $personalTipo[0]->id == $tipo->id ? 'selected' : ''}} value="{{ $tipo->id }}">{{$tipo->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="email ">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $personal->email }}">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="password ">Contraseña</label>
                        <input type="text" name="password" class="form-control" >
                    </div>
                </div>
            </div>
            <input name="_method" type="hidden" value="PATCH">


            <hr>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-dark" href="{{ route('personal.index') }}" role="button">
                        Regresar
                    </a>

                </div>
            </div>

        </form>

    </div>
    </div>

@endsection
