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
            'libro' => 'required',
            'folio' => 'required',
            'numero_expediente' => 'required',
            'numero_libro' => 'required|max:10|min:1',
            'libro' => 'required',
            'folio' => 'required',
            'anios_libro' => 'required|max:9|min:9',
            'fecha_declaracion' => 'required',
            'persona_id_01'=> 'required|exists:mnt_persona,id|unique:mnt_detalle_boda',
            'nombre_testigo_01' => 'required|max:250|min:2|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'persona_id_02'=> 'required|exists:mnt_persona,id|unique:mnt_detalle_boda',
            'nombre_testigo_01' => 'required|max:250|min:2|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
        ];
    }
    public function updateRules() : array
    {
        return [

            'libro' => 'required',
            'folio' => 'required',
            'numero_expediente' => 'required',
            'numero_libro' => 'required|max:10|min:1',
            'libro' => 'required',
            'folio' => 'required',
            'anios_libro' => 'required|max:9|min:9',
            'fecha_declaracion' => 'required',
            'persona_id_01'=> 'required|exists:mnt_persona,id|unique:mnt_detalle_boda',
            'nombre_testigo_01' => 'required|max:250|min:2|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'persona_id_02'=> 'required|exists:mnt_persona,id|unique:mnt_detalle_boda',
            'nombre_testigo_01' => 'required|max:250|min:2|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',

        ];
    }
    public function storeMessages(): array
    {
        return [
            'persona_id_02.unique' => 'La persona 2 ya tiene un registro',
            'persona_id_01.unique' => 'La persona 1 ya tiene un registro',

        ];
    }
}
