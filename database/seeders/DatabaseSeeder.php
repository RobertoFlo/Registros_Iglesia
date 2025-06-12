<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\datosprueba;
use Database\Seeders\Tipogastos;
use Database\Seeders\PermissionsTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            datosprueba::class,
            Tipogastos::class,
            PermissionsTableSeeder::class,
            ctl_persona_estado::class,
            persona_rol::class,

        ]);


    }
}
