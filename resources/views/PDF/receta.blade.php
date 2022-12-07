<!DOCTYPE html>
<html>
<head>
    <title>RECETA</title>
    <style>
        . {
            font-family: sans-serif;
            font-size: 10px !important;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #F8AC10;
            color: #ffffff;
            /*text-align: left;*/
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .bold {
            font-weight: bold
        }

        .encabezado-detalle {
            width: 200px;
        }
    </style>
</head>


<table style="width:100%">
    <tr>
        <td class="bold" style="font-family: 'Arial', Courier, monospace; font-size: 16px; text-align: center">
            <img src="{{url('assets/images/image_1.png')}}"
                 width="250px"
            >
        </td>
    </tr>
</table>
<hr>
<br><br>




<table>
    <tr>
        <td class="bold encabezado-detalle">Impreso a las:</td>
        <td>{{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</td>
    </tr>
    <tr>
        <td class="bold encabezado-detalle">Fecha cita:</td>
        <td>{{ $receta[0]->fecha_cita }}</td>
    </tr>
    <tr>
        <td class="bold encabezado-detalle">Paciente:</td>
        <td>{{ $receta[0]->nombre_paciente }}</td>
    </tr>

</table>
<br>
<br>

<table>
    <tr>
        <td class="bold">Diagnóstico:</td>
        <td>{{ $receta[0]->diagnostico }}</td>
    </tr>
</table>


<table class="styled-table" width="100%">
    <thead>
    <tr>
        <th>No.</th>
        <th>Medicamento</th>
        <th>Presentación</th>
        <th>Indicaciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($receta as $key=>$item)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item->medicina }}</td>
            <td>{{ $item->presentacion }}</td>
            <td>{{ $item->indicaciones }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<br><br><br><br><br>
<br><br><br><br><br>
<div style="text-align: center;">
    <p>f._________________________________________</p>
    <p>Dr(a). {{ $receta[0]->doctor_atendio }}</p>
</div>

<br><br><br><br><br>
<br><br><br><br><br>



<body>

</body>
</html>
