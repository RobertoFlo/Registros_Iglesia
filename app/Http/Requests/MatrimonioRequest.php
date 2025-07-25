<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class MatrimonioRequest extends Request
{
    public function commonRules() : array
    {
        return [
            'libro' => 'numeric',
            'folio' => 'numeric',
            'numero_expediente' => 'numeric',
            'numero_libro' => 'numeric',
            'libro' => 'numeric',
            'folio' => 'numeric',
            'anios_libro' => 'numeric',

        ];
    }

    public function storeRules() : array
    {
        return [
            'libro' => 'required|numeric',
            'folio' => 'required|numeric',
            'numero_expediente' => 'required|numeric',
            'numero_libro' => 'required|max:10|min:1|numeric',
            'libro' => 'required|numeric',
            'folio' => 'required|numeric',
            'anios_libro' => 'required|max:9|min:9|string',
            'fecha_declaracion' => 'required|date',
            'persona_id_01'=> 'required|exists:mnt_persona,id|unique:mnt_detalle_boda',
            'nombre_testigo_01' => 'required|max:250|min:2|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'persona_id_02'=> 'required|exists:mnt_persona,id|unique:mnt_detalle_boda',
            'nombre_testigo_02' => 'required|max:250|min:2|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
        ];
    }
    public function updateRules() : array
    {
        return [

            'libro' => 'numeric',
            'folio' => 'numeric',
            'numero_expediente' => 'numeric',
            'numero_libro' => 'numeric|max:10|min:1',
            'libro' => 'numeric',
            'folio' => 'numeric',
            'anios_libro' => 'max:9|min:9|string',
            'fecha_declaracion' => 'date',
            'persona_id_01'=> 'required|exists:mnt_persona,id|unique:mnt_detalle_boda',
            'nombre_testigo_01' => 'required|max:250|min:2|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'persona_id_02'=> 'required|exists:mnt_persona,id|unique:mnt_detalle_boda',
            'nombre_testigo_02' => 'required|max:250|min:2|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',

        ];
    }
}
