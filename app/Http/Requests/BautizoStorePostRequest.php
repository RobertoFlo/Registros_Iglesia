<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;


class BautizoStorePostRequest extends Request
{
     public function commonRules() : array
    {
        return [
            'padre_bautizo' => 'string|max:50|min:2|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'nombre_madrina' => 'string|max:50|min:2|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'nombre_padrino' => 'string|max:50|min:2|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'comentarios' => 'string|max:250|min:2|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/',
            'fecha_bautizo' => 'string|date',
            'libro' => 'numeric',
            'folio' => 'numeric',
            'year' => 'numeric|max:4',
        ];
    }

    public function storeRules() : array
    {
        return [
            'padre_bautizo' => 'required',
            'nombre_madrina' => 'required',
            'nombre_padrino' => 'required',
            'comentarios' => 'required',
            'fecha_bautizo' => 'required',
            'libro' => 'required',
            'folio' => 'required',
            'year' => 'required',
        ];
    }
    public function updateRules() : array
    {
        return [
            //
            'padre_bautizo' => 'required',
            'nombre_madrina' => 'required',
            'nombre_padrino' => 'required',
            'comentarios' => 'required',
            'fecha_bautizo' => 'required',
            'libro' => 'required',
            'folio' => 'required',
            'year' => 'required',
        ];
    }
}
