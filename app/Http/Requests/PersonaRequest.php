<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class PersonaRequest extends Request
{
    public function commonRules() : array
    {
        return [
            'primer_nombre' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'segundo_nombre' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'primer_apellido' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'segundo_apellido' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'domicilio' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'fecha_nacimiento' => 'date',
        ];
    }

    public function storeRules() : array
    {
        return [
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'domicilio' => 'required',
            'fecha_nacimiento' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
            'distrito_id' => 'required',

        ];
    }
    // public function updateRules() : array
    // {
    //     return [
    //         'primer_nombre' => 'required',
    //         'segundo_nombre' => 'required',
    //         'primer_apellido' => 'required',
    //         'segundo_apellido' => 'required',
    //         'domicilio' => 'required',
    //         'fecha_nacimiento' => 'required',
    //         'departamento_id' => 'required',
    //         'municipio_id' => 'required',
    //         'distrito_id' => 'required',
    //     ];
    // }
}
