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
        <p>En infrascrito Cura Párroco de la Parroquia Nuestra Señora</p>
    </div>
</body>
</html>
