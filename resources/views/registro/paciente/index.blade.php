@extends('layout.app')
@section('content')



    @include('partitials.messages')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @component('partitials.btn-create',['url'=>route('paciente.create')])
            @endcomponent

            {{--            @component('partitials.btn-ver',['url'=>'javascript:ver("laptop")'])--}}
            {{--            @endcomponent--}}

            {{--            @component('partitials.btn-edit',['url'=>'javascript:editar("laptop")'])--}}
            {{--            @endcomponent--}}

            {{--            @component('partitials.btn-eliminar',['url'=>url('laptop/delete')])--}}
            {{--            @endcomponent--}}

            {{--            @component('partitials.btn-asignar',['url'=>'javascript:asignar()'])--}}
            {{--            @endcomponent--}}

            {{--            @component('partitials.btn-desasignar',['url'=>url('laptop/delete')])--}}
            {{--            @endcomponent--}}
        </div>

    </div>
    <br>
    <div class="row">
    </div>
    <div id="content">
        @include('registro.paciente.ajax')
    </div>
@endsection
