<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table ">
                <tr style="background-color: #F8AC10; color: #fff">
                    <th>Medicamento</th>
                    <th>Presentación</th>
                    <th>Lote</th>
                    <th>Vence</th>
                    <th>Total</th>
                </tr>
                @foreach($collection as $key => $item)
                    <tr>
                        <td>{{ $item->medicamento }}</td>
                        <td>{{ $item->presentacion }}</td>
                        <td>{{ $item->lote }}</td>
                        <td>{{ $item->fecha_vencimiento->format('d/m/Y')  }}</td>
                        <td>{{ $item->total }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
