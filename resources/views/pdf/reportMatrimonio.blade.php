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
            text-align: center;
            /* Centra todo el texto */
        }

        .header {
            margin-bottom: 20px;
        }

        .datos {
            display: inline-block;
            text-align: left;
            /* Para justificar los datos dentro del bloque centrado */
            margin: 0 auto;
        }

        p,
        .datos {
            text-align: justify;
            /* Justifica los párrafos y datos */
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
        <p>El infrascrito Cura Párroco de la Parroquia Nuestra Señora de los Angeles Diócesis de Sonsonate, El Salvador,
            hace constar Que:
        </p>
        <p>
            En el <strong>Libro de Acta Matrimonial {{}} correspondiente </strong>a los años
            <strong>{{}}</strong>
            Expediente <strong>{{}}</strong> el dia <strong>{{}}</strong>, previos los
            tramites de Derecho Civil y Canonico,
            el señor:<strong>{{}}</strong> de <strong>{{}}</strong>, hijo de
            <strong>{{}}</strong> y <strong>{{}}</strong>,
            originario de <strong>{{}}</strong>, Departamento de <strong>{{}}</strong>.
            Contrajo <strong>Matrimonio Eclesiástico</strong>
            con <strong>{{}}</strong> de <strong>{{}}</strong>, hijo de
            <strong>{{}}</strong> y <strong>{{}}</strong> originaria de
            <strong>{{}}</strong>, Departamento de <strong>{{}}</strong>. Los dos
            mayores de edad, fueran testigos: <strong>{{}}</strong>
            y <strong>{{}}</strong>
        </p>
        <p>
            La presente es copia fiel de la original,a la que remito y extiendo en la oficina Parroquial, a los
            {{}} dias del mes
            de {{}} del año {{}}. A.D
        </p>
    </div>
</body>

</html>
