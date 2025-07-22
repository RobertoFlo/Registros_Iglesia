<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\PermissionGroup;

use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
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

    /**
     * Endpoint para generar un reporte en PDF de un rol y sus permisos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateReportPdf($id)
    {
        try {
            $role = Role::with('permissions')->findOrFail($id);

            // 1. Cargar la vista de Blade que diseñamos para el PDF
            $pdf = PDF::loadView('pdf.report', ['role' => $role]);

            // 2. Definir el nombre del archivo y la ruta donde se guardará
            // Se guardará en `storage/app/public/reports/`
            $fileName = 'reporte-rol-' . $role->id . '.pdf';
            $filePath = 'reports/' . $fileName;

            // 3. Guardar el PDF en el disco y verificar si ya existe
            // Si el archivo ya existe, lo eliminamos antes de guardarlo de nuevo
            // Esto asegura que siempre tengamos la versión más reciente del reporte.

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            Storage::disk('public')->put($filePath, $pdf->output());

            // 4. Devolver la URL pública del archivo
            return response()->json([
                'message' => 'Reporte en PDF generado exitosamente.',
                'pdf_url' => asset('storage/' . $filePath),
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Rol no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ocurrió un error al generar el PDF.', 'error' => $e->getMessage()], 500);
        }
    }
}

