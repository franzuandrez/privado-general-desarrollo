@extends('layout.app')
@section('content')


    @component('partitials.nav',['operation'=>'',
      'menu_icon'=>'mdi mdi-clipboard-text-outline link-icon',
      'submenu_icon'=>'fa-solid fa-id-card icono',
      'operation_icon'=>'',])
        @slot('menu')
            Registro
        @endslot
        @slot('submenu')
            Doctores
        @endslot
    @endcomponent

    @include('partitials.messages')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @component('partitials.btn-create',['url'=> route('medico.create')])
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
        @include('registro.medico.ajax')
    </div>
@endsection
