<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;


class ConfirmaRequest extends Request
{
    public function commonRules() : array
    {
        return [
            'padre_confirma' => 'string|max:50|min:2|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'comentarios' => 'string|max:250|min:2|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'fecha_confirma' => 'string|date',
            'libro' => 'numeric',
            'folio' => 'numeric',
            'year' => 'numeric|max:4',
        ];
    }

    public function storeRules() : array
    {
        return [
            'padre_confirma' => 'required',
            'fecha_confirma' => 'required',
            'libro' => 'required',
            'folio' => 'required',
            'year' => 'required',
        ];
    }
    // public function updateRules() : array
    // {
    //     return [
    //         //
    //         'padre_confirma' => 'required',
    //         'fecha_confirma' => 'required',
    //         'libro' => 'required',
    //         'folio' => 'required',
    //         'year' => 'required',
    //     ];
    // }
}
