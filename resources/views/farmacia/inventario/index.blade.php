@extends('layout.app')
@section('content')

    @include('partitials.messages')


    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col col-md-12">
                            <div class="grid">
                                <h4 class="card-title">Inventario
                                    <a href="{{route('inventario.create')}}" class="btn btn-primary">
                                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Ingreso
                                    </a>

                                </h4>
                                <div class="item-wrapper">
                                    <div class="table-responsive">
                                        <div id="content">
                                            @include('farmacia.inventario.ajax')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
