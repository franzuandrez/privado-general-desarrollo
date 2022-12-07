@extends('layout.app')
@section('content')


    @include('partitials.messages')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="grid-header">Registro de presentación</p>
            </div>
        </div>
        <form action="{{ route('presentacion.update', $presentacion->id) }}" method="POST">
            @csrf
            <input name="_method" type="hidden" value="PATCH">

            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="presentacion">Presentación</label>
                        <input type="text" name="presentacion" class="form-control"
                               id="presentacion"
                               value="{{ $presentacion->presentacion }}" autofocus>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-dark" href="{{ route('presentacion.index') }}" role="button">
                        Regresar
                    </a>

                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
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
