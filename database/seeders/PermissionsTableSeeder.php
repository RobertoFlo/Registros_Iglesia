<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermissionGroup;
use App\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $grupo_1 = PermissionGroup::firstOrCreate(['name' => 'boda']);
        $grupo_2 = PermissionGroup::firstOrCreate(['name' => 'gasto']);
        $grupo_3 = PermissionGroup::firstOrCreate(['name' => 'bautizo']);
        $grupo_4 = PermissionGroup::firstOrCreate(['name' => 'confirma']);
        $grupo_5 = PermissionGroup::firstOrCreate(['name' => 'persona']);

        // Permisos por grupos
        $permiso_1 = [
            'boda.create',
            'boda.view',
            'boda.update',
            'boda.delete',
            'boda.restore',
        ];
        $permiso_2 = [
            'finanzas.create',
            'finanzas.view',
            'finanzas.update',
            'finanzas.delete',
            'finanzas.restore',
        ];
        $permiso_3 = [
            'bautizo.create',
            'bautizo.view',
            'bautizo.update',
            'bautizo.delete',
            'bautizo.restore',
        ];
        $permiso_4 = [
            'confirma.create',
            'confirma.view',
            'confirma.update',
            'confirma.delete',
            'confirma.restore',
        ];
         $permiso_5 = [
            'persona.create',
            'persona.view',
            'persona.update',
            'persona.delete',
            'persona.restore',
        ];


        foreach ($permiso_1 as $permiso) {
            Permission::firstOrCreate([
                'name' => $permiso,
                'guard_name' => 'sanctum',
                'group_id' => $grupo_1->id,
            ]);
        }

        foreach ($permiso_2 as $permiso) {
            Permission::firstOrCreate([
                'name' => $permiso,
                'guard_name' => 'sanctum',
                'group_id' => $grupo_2->id,
            ]);
        }

        foreach ($permiso_3 as $permiso) {
            Permission::firstOrCreate([
                'name' => $permiso,
                'guard_name' => 'sanctum',
                'group_id' => $grupo_3->id,
            ]);
        }

        foreach ($permiso_4 as $permiso) {
            Permission::firstOrCreate([
                'name' => $permiso,
                'guard_name' => 'sanctum',
                'group_id' => $grupo_4->id,
            ]);
        }
        foreach ($permiso_5 as $permiso) {
            Permission::firstOrCreate([
                'name' => $permiso,
                'guard_name' => 'sanctum',
                'group_id' => $grupo_5->id,
            ]);
        }
        // Crear roles
        $adminRole = Role::firstOrCreate([
            'name' => 'administrador',
            'guard_name' => 'sanctum',
        ]);
        $userRole = Role::firstOrCreate([
            'name' => 'usuario',
            'guard_name' => 'sanctum',
        ]);

        try{
            // Asignar permisos a los roles
            $adminRole->syncPermissions(Permission::all());
            $userRole->syncPermissions(Permission::all());
        }catch (\Exception $e){
            // Manejo de excepciones si ocurre un error al asignar permisos
            dd('Error al asignar permisos a los roles: ' . $e->getMessage());
        }

    }
}
