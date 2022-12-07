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
                                <h4 class="card-title">Registros de Ventas
                                    <a class="btn btn-primary" href="{{url('/ventas/create')}}" role="button">
                                        <i class="fas fa-plus"></i> &nbsp; Nueva
                                    </a>
                                </h4>
                                <div class="item-wrapper">
                                    <div class="table-responsive">
                                        <div id="content">
                                            @include('servicio.ventas.ajax')
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
