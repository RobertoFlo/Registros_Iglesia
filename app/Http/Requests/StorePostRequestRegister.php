<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequestRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'primer_nombre' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'segundo_nombre' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'primer_apellido' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'segundo_apellido' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'domicilio' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'fecha_nacimiento' => 'required|date',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
            'distrito_id' => 'required',
            'name' => 'required|string|regex:/^[A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s]+$/|max:50|min:2',
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }
}
