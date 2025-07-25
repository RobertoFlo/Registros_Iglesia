<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\PermissionGroup;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\mnt_bautizo;
use App\Models\mnt_boda;
use App\Models\mnt_detalle_boda;
use App\Models\Persona;


class ReportsController extends Controller
{
    public function BautizoReportPdf(Request $request ,$id)
    {
        try {
            $bautizo = mnt_bautizo::findOrFail($id);
            $persona = Persona::findOrFail($bautizo->persona_id);
            $pdf = PDF::loadView('pdf.reportBautizo', ['bautizo' => $bautizo, 'persona' => $persona]);
            $fileName = 'reporte-bautizo-'.$persona->uuid. '.pdf';
            $filePath = 'reports/' . $fileName;
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            Storage::disk('public')->put($filePath, $pdf->output());
            return response()->json([
                'message' => 'Reporte en PDF generado exitosamente.',
                'pdf_url' => asset('storage/' . $filePath),
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Información no encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ocurrió un error al generar el PDF.', 'error' => $e->getMessage()], 500);
        }
    }
    public function MatrimonioReportPdf(Request $request ,$id)
    {
        try {
            $matrimonio = mnt_boda::findOrFail($id);
            $detalle_matrimonio = mnt_detalle_boda::where('boda_id', $matrimonio->id)->get();
            $persona_1 = Persona::findOrFail($detalle_matrimonio[0]->persona_id);
            $persona_2 = Persona::findOrFail($detalle_matrimonio[1]->persona_id);
    
            $pdf = PDF::loadView('pdf.reportMatrimonio', ['matrimonio' => $matrimonio,'detalle_matrimonio' => $detalle_matrimonio,'persona_1' => $persona_1, 'persona_2' => $persona_2]);
            $fileName = 'reporte-matrimonio-'.$matrimonio->numero_expediente. '.pdf';
            $filePath = 'reports/' . $fileName;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            Storage::disk('public')->put($filePath, $pdf->output());
            return response()->json([
                'message' => 'Reporte en PDF generado exitosamente.',
                'pdf_url' => asset('storage/' . $filePath),
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Información no encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ocurrió un error al generar el PDF.', 'error' => $e->getMessage()], 500);
        }
    }
}
