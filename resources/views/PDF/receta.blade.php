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
            background-color: #009879;
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
        <td class="bold" style="font-family: 'Arial', Courier, monospace; font-size: 14px; text-align: center">
            HOSPITAL BUENOS INGENIEROS
        </td>
    </tr>
</table>
<hr>
<br><br>

<table>
    <tr>
        <td class="bold encabezado-detalle">FECHA/HORA IMPRESION:</td>
        <td>{{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</td>
    </tr>
    <tr>
        <td class="bold encabezado-detalle">FECHA CITA:</td>
        <td>{{ $receta[0]->fecha_cita }}</td>
    </tr>
    <tr>
        <td class="bold encabezado-detalle">PACIENTE:</td>
        <td>{{ $receta[0]->nombre_paciente }}</td>
    </tr>
    <tr>
        <td class="bold encabezado-detalle">MOTIVO:</td>
        <td>{{ $receta[0]->motivo_cita }}</td>
    </tr>
    <tr>
        <td class="bold encabezado-detalle">ATENDIDO POR:</td>
        <td>Dr(a). {{ $receta[0]->doctor_atendio }}</td>
    </tr>
</table>
<br>
<br>

<table>
    <tr>
        <td class="bold">DIAGNOSTICO:</td>
        <td>{{ $receta[0]->diagnostico }}</td>
    </tr>
</table>


<table class="styled-table" width="100%">
    <thead>
    <tr>
        <th>#</th>
        <th>MEDICAMENTO</th>
        <th>PRESENTACION</th>
        <th>INDICACIONES</th>
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
{{--<div style="text-align: center;">--}}
{{--    <p>f._________________________________________</p>--}}
{{--    <p>Dr(a). {{ $receta[0]->doctor_atendio }}</p>--}}
{{--</div>--}}

<br><br><br><br><br>
<br><br><br><br><br>

<table style="width: 100%">
    <tr>
        <td style="text-align: center">NOTA: Se recomienda seguir al pie de la letra, todas las indicaciones de la
            receta. No permita que en farmacia le cambien la medicina.
        </td>
    </tr>
</table>

<body>

</body>
</html>
