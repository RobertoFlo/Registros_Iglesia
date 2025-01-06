<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;


class FinanzasRequest extends Request
{
    public function commonRules() : array
    {
        return [
            'descripcion' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'monto' => 'numeric',
            'fecha' => 'date',
        ];
    }

    public function storeRules() : array
    {
        return [
            'descripcion' => 'required|max:150|min:2',
            'monto' => 'required|decimal:2',
            'fecha' => 'required',
            'tipo_id' => 'required|exists:ctl_tipo_gasto,id',
        ];
    }
    public function updateRules() : array
    {
        return [
           'descripcion' => 'required|max:150|min:2',
            'monto' => 'required|decimal:2',
            'fecha' => 'required',

        ];
    }
}
