<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #232323;
            text-align: center; /* Centra todo el texto */
        }
        .header {
            margin-bottom: 20px;
        }
        .datos {
            display: inline-block;
            text-align: left; /* Para justificar los datos dentro del bloque centrado */
            margin: 0 auto;
        }

        p, .datos {
            text-align: justify; /* Justifica los párrafos y datos */
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>PARROQUIA NUESTRA SEÑORA DE LOS ANGELES</h2>
        <h3>DIOCESIS DE SONSONATE, EL SALVADOR, C.A.</h3>
        <h5>Generado el: {{ date('d/m/Y H:i') }}</h5>
    </div>

    <div class="datos" style="width: 80%;">

        <p>En infrascrito Cura Párroco de la Parroquia Nuestra Señora de los Angeles,
        INFORMA: Que en el libro de Bautizos <strong>{{$bautizo->libro}}</strong> Correspondiente
        a los años <strong>{{$bautizo->año}}</strong> a folio <strong>{{$bautizo->folio}}</strong> se encuentra
        la Partida de Bautizo de: <strong>{{$persona->primer_nombre}} {{$persona->segundo_nombre}} {{
        $persona->primer_apellido}} {{$persona->segundo_apellido}}</strong> de la dice:</p>

        <p>Que, en la ciudad de Sonsonate, Republica de El Salvador, Centro America, fecha de
        <strong>{{$bautizo->fecha_bautizo}}</strong>, fue Bautizado solemnemente por el
        <strong>{{'Padre ',$bautizo->padre_bautizo}}</strong>, habiendo nacido la titular de esta
        partida de Bautismo, el <strong>{{ date('d/m/Y') }}</strong>, hij@ de:<strong>
        {{$persona->nombre_padre}} y {{$persona->nombre_madre}}</strong>, habiendo sido sus padrinos:
        <strong>{{$bautizo->nombre_padrino}} y {{$bautizo->nombre_madrina}}</strong></p>
        <br>
        <p style="min-height:100px;"><strong>En el margen se lee: </strong>{{$bautizo->comentarios}}</p>

        <p style="text-align: center;">Sonsonate, El salvador, a los <strong>{{ date('d') }} dia del mes de {{date('m')}} del año {{date('Y')}}</strong>, A.D</p>

    </div>
</body>
</html>
