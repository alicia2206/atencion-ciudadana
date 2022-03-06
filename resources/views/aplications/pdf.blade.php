<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Aplication</title>

    <style>
        body {
            font-size: 13px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
        }

       </style>
</head>

<body>
    <table border="0">
        <tr>
            <td colspan="6">
                <img style="width:300px" src="{{ public_path('/img/2.png') }}">
            </td>
            <td colspan="6" style="text-align: center">
                {{-- <img style="height:55px" src="{{ public_path('/img/1.jpg') }}"> --}}
                <img style="width:120%" src="{{ public_path('/img/mtra.png') }}">
            </td>
        </tr>

        <tr style="padding-top: 0.5%">
            <td colspan="12" style="text-align: right; font-family:Arial, Helvetica, sans-serif">
                ACAPULCO DE JUÁREZ, GRO. A {{ $day }} DE {{ $month }} DEL {{ $year }}.
            </td>
        </tr>
        <tr>
            <td colspan="12" style="text-align: right;padding-top: 0.50%; font-family:Arial, Helvetica, sans-serif">
                ASUNTO: {{ $aplication->subject }}
            </td>
        </tr>
        <tr>
            <td colspan="12" style="padding-top: 2.5%;font-size: 16px; font-weight: bold; font-family:Arial, Helvetica, sans-serif">
                {{ $aplication->area['name'] }}.<br>
            </td>
        </tr>
        <tr>
            <td colspan="12" style="padding-top: 3%; font-size: 15px; font-family:Arial, Helvetica, sans-serif">
                <div style="min-height: 272px; text-align: justify">
                    P R E S E N T E. <br><br>
                    Por este conducto y con fundamento en el artículo 8º constitucional que a la letra
                    recita “Los funcionarios y empleados públicos respetarán el ejercicio del derecho de petición,
                    siempre que ésta se formule por escrito, de manera pacífica y respetuosa”; es que solicito a usted
                    su apoyo e intervención con:<br><br><br>
                    {{ $aplication->petition }}
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="12" style="padding-top: 1%; font-size: 14px; font-family:Arial, Helvetica, sans-serif">
                <div>Por lo anterior, dejo mis datos para cualquier aclaración:</div><br>
                <div style="font-weight: bold">Nombre Completo:</div>
            </td>
        </tr>
        <tr>
            <td colspan="12"
                style="padding-top: 0.5%;padding-bottom: 1%; font-size: 14px; font-family:Arial, Helvetica, sans-serif">
                {{ $aplication->name }}
            </td>
        </tr>
        <tr>
            <td colspan="12" style="padding-top: 2.3%; font-size: 14px; font-family:Arial, Helvetica, sans-serif">
                <div style="font-weight: bold">Domicilio:</div>
            </td>
        </tr>
        <tr>
            <td colspan="12"
                style="padding-top: 0.5%;padding-bottom: 1%; font-size: 14px; font-family:Arial, Helvetica, sans-serif">
                {{ $aplication->direction }}
            </td>
        </tr>
        <tr>
            <td colspan="12" style="padding-top: 2.3%; font-size: 14px; font-family:Arial, Helvetica, sans-serif">
                <div style="font-weight: bold">Teléfono:</div>
            </td>
        </tr>
        <tr>
            <td colspan="12"
                style="padding-top: 0.5%;padding-bottom: 1%; font-size: 14px; font-family:Arial, Helvetica, sans-serif">
                {{ $aplication->phone }}
            </td>
        </tr>
        <tr>
            <td colspan="12" style="padding-top: 1.5%; font-size: 14px; font-family:Arial, Helvetica, sans-serif">
                <span>Sin más por el momento y en espera de una respuesta favorable, agradezco de antemano su
                    intervención.</span>
            </td>
        </tr>
        <tr>
            <td colspan="12" style="font-weight: bold;text-align: center; font-size: 14px; font-family:Arial, Helvetica, sans-serif">
                <br> <br> A T E N T A M E N T E <br>
                <span style="text-align: center; font-size: 14px; font-family:century gothic"> {{ $aplication->name }} </span>
            </td>
        </tr>
        <tr>
            <td colspan="12" style="padding-top: 2%; font-size: 14px; font-family:Arial, Helvetica, sans-serif">
                <img style="width: 100%" src="{{ public_path('/img/3.png') }}">
            </td>
        </tr>
        <tr>
            <td colspan="12" style="font-weight: bold;text-align: center; font-size: 14px; font-family:Arial, Helvetica, sans-serif">
                PALACIO MUNICIPAL
                
            </td>
        </tr>
        <tr>
            <td colspan="12" style="bold;text-align: center; font-size: 12px; font-family:Arial, Helvetica, sans-serif">
                Av. Cuauhtémoc S/N Interior Parque Papagayo Fracc. Hornos Insurgentes Acapulco de Juárez, Gro., C.P.
                39350
                Tel. 4407100 Ext. 4423 y 4424 Tel. Directo 4407121 correo electrónico: regidora.julypelaez@gmail.com
            </td>
        </tr>
    </table>
</body>

</html>
