<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermissionGroup;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grupo_1 = PermissionGroup::firstOrCreate(['name' => 'boda']);

        // Permisos para el grupo "boda"
        $permisos = [
            'boda.create',
            'boda.view',
            'boda.update',
            'boda.delete',
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate([
                'name' => $permiso,
                'guard_name' => 'api', // Usa 'api' como guard_name
                'group_id' => $grupo_1->id,
            ]);
        }
    }
}
