<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beneficio</title>

</head>

<body>
    <style>

        .right-align { float: right; margin: 10px; }
        .center-align { display: block; margin-left: auto; margin-right: auto; }
        .custom-hr { border:200px; height: 1px; background: black; margin: center; width: 500px; }
        .center-text { text-align: center; }
    </style>

    <header>
        <img src="{{ asset('img/logo1.jpg') }}" alt="" style="max-height: 90px; width: auto; margin: auto">
    </header>


    <p style="font-family: Arial, Helvetica, sans-serif; text-align: center; margin-top: 130px">
        El Ministerio del Poder Popular para los Pueblos Indígenas por medio de la presente hace<br>
        constar la entrega de <b>{{ $beneficio->cantidad }} {{ $beneficio->beneficio->beneficio }} </b> al ciudadano
        <b>{{ $beneficio->persona->primer_nombre }}
            {{ $beneficio->persona->primer_apellido }}</b>, portador de la C.I
        <b>{{ $beneficio->persona->cedula }}</b>.<br>
        El/la beneficiario/a cumple con los criterios de elegibilidad establecidos y ha seguido todos<br>
        los procedimientos requeridos para la obtención de este beneficio. Esta constancia se<br>
        expide a solicitud del interesado/a para los fines que estime conveniente.

        <br><br><br>

        Sin otro particular, se expide la presente en Caracas, a los {{ $beneficio->created_at->format('d') }} días del mes
        de {{ $beneficio->created_at->format('M') }} del año {{ $beneficio->created_at->format('Y') }}.<br>
        Atentamente:<br>
    </p>




        <div style="text-align: center; margin-top: 150px">
            {!! QrCode::size(300)->generate(url('/')) !!}
        </div>

        <hr class="custom-hr">
    <p style="text-align: center; font-family: Arial, Helvetica, sans-serif;">

        <b>Ing. Deifer Garantón</b><br>
        Director(a) General de la Oficina de<br>
        Tecnologías de la Información y la Comunicación<br>
        Gaceta Oficial N° 42.363 de Fecha 26/04/2022<br>
        Resolución N° 030 de fecha 17/03/2022<br>

    </p>



</body>

</html>


</html>
