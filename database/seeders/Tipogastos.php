<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Tipogastos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'nombre' => 'Ingreso'
            ],
            [
                'nombre' => 'Egreso'
            ],
            [
                'nombre' => 'Especial'
            ]
        ];

        // Insertando los datos en la base de datos
        DB::table('ctl_tipo_gasto')->insert($data);
    }
}
