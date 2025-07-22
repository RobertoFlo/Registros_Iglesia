{{-- resources/views/pdfs/report.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ejemplo</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 0;
            font-size: 14px;
            color: #777;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reporte de Roles y Permisos</h1>
        <p>Generado el: {{ date('d/m/Y H:i') }}</p>
    </div>

    <h2>Detalles del Rol: {{ $role->name }}</h2>
    <p>Este rol tiene los siguientes permisos asignados:</p>

    <table>
        <thead>
            <tr>
                <th>ID del Permiso</th>
                <th>Nombre del Permiso</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($role->permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Este rol no tiene permisos asignados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Iglesia Backend - Reporte Confidencial</p>
    </div>
</body>
</html>
