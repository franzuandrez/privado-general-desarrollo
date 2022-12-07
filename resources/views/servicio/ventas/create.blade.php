@extends('layout.app')
@section('content')

    @include('partitials.messages')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="grid-header">Registro de cita</p>
            </div>
        </div>
        <form action="{{ route('cita.store') }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="inputType12">Receta</label>
                        <select name="receta_enc" class="form-control js-example-basic-single">
                            @foreach($recetas as $receta)
                                <option
                                    {{ old('receta_enc') == $receta->id ? 'selected': '' }}
                                    value="{{ $receta->id }}">{{$receta->nombres . ' ' . $receta->apellidos}}
                                    - {{$receta->diagnostico}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                </div>

            </div>
            <br><br>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-dark" href="{{ route('ventas.index') }}" role="button">
                        Regresar
                    </a>

                </div>
            </div>

        </form>
    </div>


@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $(".datepicker").datepicker({
                changeMonth: true,
                changeYear: true
            });

            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
