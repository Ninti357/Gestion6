<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beneficio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    [Nombre de la Empresa] [Dirección de la Empresa] [Ciudad, Estado, Código Postal] [Fecha]
    <br>
    [Nombre del Beneficiario] [Dirección del Beneficiario] [Ciudad, Estado, Código Postal]
    <br>
    Estimado/a {{ $beneficio->persona->primer_nombre }} {{ $beneficio->persona->primer_apellido }}:
    <br>
    Nos complace informarle que usted ha sido seleccionado para recibir el beneficio de [describir el beneficio] como
    parte de nuestro programa de [nombre del programa]. Este beneficio ha sido otorgado en reconocimiento a su [motivo
    del reconocimiento, como desempeño, lealtad, etc.].
    <br>

    Detalles del Beneficio:
    <br>
    Tipo de Beneficio: [Descripción del beneficio]
    <br>
    Valor del Beneficio: [Valor monetario, si aplica]
    <br>
    Fecha de Entrega: [Fecha de entrega]
    <br>
    Duración del Beneficio: [Duración, si aplica]
    <br>
    Para reclamar su beneficio, por favor contacte a [nombre y cargo de la persona de contacto] al [número de teléfono]
    o por correo electrónico a [correo electrónico] antes del [fecha límite para reclamar el beneficio].
    <br>
    Agradecemos su dedicación y compromiso con [Nombre de la Empresa] y esperamos que disfrute de este beneficio.
    <br>
    Atentamente,
    <br>
    [Firma]

    [Nombre del Remitente] [Cargo del Remitente] [Correo Electrónico del Remitente] [Número de Teléfono del Remitente]

    <div class="title m-b-md">
        {!! QrCode::size(300)->generate('www.nigmacode.com') !!}
    </div>

    <style>
        .title {
            text-align: center;
            /* color: rgb(255, 99, 132),  rosa*/
            /* color: rgb(54, 162, 235) azul, */
                /* color: rgb(255, 206, 86) amarillo, */
                color: rgb(99, 255, 125),
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>


</html>
