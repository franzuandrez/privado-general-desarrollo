@extends('layout.app')
@section('content')



    @include('partitials.messages')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @component('partitials.btn-create',['url'=>route('tipo_personal.create')])
            @endcomponent


        </div>

    </div>
    <br>
    <div class="row">
    </div>
    <div id="content">
        @include('registro.tipo_personal.ajax')
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/permisos.js')}}"></script>
@endsection
