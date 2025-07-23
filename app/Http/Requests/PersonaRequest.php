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
            'primer_nombre' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'segundo_nombre' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'primer_apellido' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'segundo_apellido' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'domicilio' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'fecha_nacimiento' => 'required|date',
            'departamento_id' => 'required|numeric|exists:ctl_departamento,id',
            'municipio_id' => 'required|numeric|exists:ctl_municipio,id',
            'distrito_id' => 'required|numeric|exists:ctl_distrito,id',

        ];
    }
    public function updateRules() : array
    {
        return [
            'primer_nombre' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'segundo_nombre' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'primer_apellido' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'segundo_apellido' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'domicilio' => 'string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'fecha_nacimiento' => 'date',
            'departamento_id' => 'numeric|exists:ctl_departamento,id',
            'municipio_id' => 'numeric|exists:ctl_municipio,id',
            'distrito_id' => 'numeric|exists:ctl_distrito,id',
        ];
    }
}
