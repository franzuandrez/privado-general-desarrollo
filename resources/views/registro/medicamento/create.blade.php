@extends('layout.app')
@section('content')


    @include('partitials.messages')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="grid-header">Registro de medicamento</p>
            </div>
        </div>
        <form action="{{ route('medicamento.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="presentacion">Nombre</label>
                        <input type="text" name="nombre" class="form-control"
                               value="{{ old('nombre') }}" autofocus>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" class="form-control"
                               value="{{ old('descripcion') }}" autofocus>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="descripcion">Presentaciones</label>
                        <select name="presentaciones[]"  class="form-control">
                            @foreach($presentaciones as $presentacion)
                                <option value="{{ $presentacion->id }}">{{ $presentacion->presentacion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="precio">Precio (Q)</label>
                        <input type="text" name="precio" class="form-control"
                               value="{{ old('precio') }}" autofocus>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-dark" href="{{ route('medicamento.index') }}" role="button">
                        Regresar
                    </a>

                </div>
            </div>
        </form>
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
