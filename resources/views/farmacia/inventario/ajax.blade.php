<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr style="background-color: #F8AC10; color: #fff">
                    <th>#</th>
                    <th>MEDICAMENTO</th>
                    <th>PRESENTACION</th>
                    <th>LOTE</th>
                    <th>F. VENCIMIENTO</th>
                    <th>TOTAL</th>
                </tr>
                @foreach($collection as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->medicamento }}</td>
                        <td>{{ $item->presentacion }}</td>
                        <td>{{ $item->lote }}</td>
                        <td>{{ $item->fecha_vencimiento->format('m/Y')  }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
