<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\PermissionGroup;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\mnt_boda;


class ReportsController extends Controller
{
 public function BautizoReportPdf(Request $request ,User $user,$id)
    {
        dd($user);
        // try {
        //     $role = Role::with('permissions')->findOrFail($id);

        //     // 1. Cargar la vista de Blade que diseñamos para el PDF
        //     $pdf = PDF::loadView('pdf.report', ['role' => $role]);

        //     // 2. Definir el nombre del archivo y la ruta donde se guardará
        //     // Se guardará en `storage/app/public/reports/`
        //     $fileName = 'reporte-rol-' . $role->id . '.pdf';
        //     $filePath = 'reports/' . $fileName;

        //     // 3. Guardar el PDF en el disco y verificar si ya existe
        //     // Si el archivo ya existe, lo eliminamos antes de guardarlo de nuevo
        //     // Esto asegura que siempre tengamos la versión más reciente del reporte.

        //     if (Storage::disk('public')->exists($filePath)) {
        //         Storage::disk('public')->delete($filePath);
        //     }
        //     Storage::disk('public')->put($filePath, $pdf->output());

        //     // 4. Devolver la URL pública del archivo
        //     return response()->json([
        //         'message' => 'Reporte en PDF generado exitosamente.',
        //         'pdf_url' => asset('storage/' . $filePath),
        //     ]);
        // } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        //     return response()->json(['message' => 'Rol no encontrado.'], 404);
        // } catch (\Exception $e) {
        //     return response()->json(['message' => 'Ocurrió un error al generar el PDF.', 'error' => $e->getMessage()], 500);
        // }
    }
}
