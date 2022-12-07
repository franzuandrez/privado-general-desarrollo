@extends('layout.app')
@section('content')




    @include('partitials.messages')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @component('partitials.btn-create',['url'=>route('presentacion.create')])
            @endcomponent

        </div>

    </div>
    <br>
    <div class="row">
    </div>
    <div id="content">
        @include('registro.presentacion.ajax')
    </div>
@endsection
