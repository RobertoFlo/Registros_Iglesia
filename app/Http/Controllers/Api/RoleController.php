<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\PermissionGroup;
class RoleController extends Controller
{
    /**
     * Endpoint para crear un nuevo rol y asignarle permisos.
     * Este método es el que llamarías desde tu frontend (Angular).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // 1. Validar la información recibida desde el frontend
        $validatedData = $request->validate([
            'name' => 'required|string|unique:roles,name|max:255',
            'permissions' => 'required|array',
            'permissions.*' => 'integer|exists:permissions,id' // Valida que cada ID en el array exista en la tabla de permisos
        ]);

        // Usamos una transacción para asegurar que si algo falla, no se cree el rol.
        DB::beginTransaction();
        try {
            // 2. Crear el nuevo rol
            $role = Role::create(['name' => $validatedData['name']]);

            // 3. Asignar los permisos al rol
            // El método syncPermissions es ideal porque sincroniza los permisos.
            // Si le pasas un array de IDs, quitará los que no estén y añadirá los nuevos.
            $role->syncPermissions($validatedData['permissions']);

            DB::commit();

            return response()->json([
                'message' => 'Rol creado y permisos asignados exitosamente.',
                'role' => $role->load('permissions') // Devuelve el rol con sus permisos
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            // En caso de un error inesperado, revertimos la transacción
            return response()->json([
                'message' => 'Ocurrió un error al crear el rol.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Endpoint para listar todos los permisos disponibles.
     * Útil para que tu frontend pueda mostrarlos en checkboxes o una lista.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listPermissions()
    {
        $groups = PermissionGroup::with('permissions')->get();

        $result = $groups->map(function ($group) {
            return [
                'id' => $group->id,
                'name' => $group->name,
                'permissions' => $group->permissions->map(function ($perm) {
                    return [
                        'id' => $perm->id,
                        'name' => $perm->name,
                        'guard_name' => $perm->guard_name,
                    ];
                }),
            ];
        });

        return response()->json($result);
    }
}


/**
 * -----------------------------------------------------------------
 * ¿Cómo usar esto?
 * -----------------------------------------------------------------
 *
 * 1. Crea el controlador:
 * php artisan make:controller RoleController
 *
 * 2. Pega el código de arriba en el archivo `app/Http/Controllers/RoleController.php`.
 *
 * 3. Añade las rutas en tu archivo `routes/api.php`:
 *
 * use App\Http\Controllers\RoleController;
 *
 * // Ruta para que el frontend obtenga la lista de todos los permisos
 * Route::get('/permissions', [RoleController::class, 'listPermissions'])->middleware('auth:sanctum');
 *
 * // Ruta para crear un nuevo rol y asignarle permisos
 * Route::post('/roles', [RoleController::class, 'store'])->middleware('auth:sanctum');
 *
 * 4. Desde tu frontend (Angular), primero haces una petición GET a `/api/permissions`
 * para mostrarle al usuario todos los permisos.
 *
 * 5. Cuando el usuario escriba el nombre del rol y seleccione los permisos,
 * haces una petición POST a `/api/roles` con el siguiente cuerpo (body):
 *
 * {
 * "name": "Nuevo Rol de Prueba",
 * "permissions": [1, 3, 5] // Array con los IDs de los permisos seleccionados
 * }
 */
