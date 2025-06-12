<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ctl_estado;

class ctl_persona_estado extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $estado = [
            'Activo',
            'Inactivo',
            'Pendiente',
            'Suspendido',
            'Eliminado',
            'Desconocido',
        ];
        foreach ($estado as $estados) {
            ctl_estado::firstOrCreate([
                'estado' => $estados,
            ]);
        }

    }
}
