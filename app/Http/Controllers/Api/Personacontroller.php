<?php

namespace App\Http\Controllers\Api;

use Orion\Http\Controllers\Controller;
use App\Models\Persona;
use App\Http\Requests\PersonaRequest;
use Orion\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Personacontroller extends Controller
{
    protected $model = Persona::class;
    protected $request = PersonaRequest::class;


    /**
     * The name of the route key for model binding.
     * By default, it uses the primary key name.
     *
     * @return string
     */
    public function keyName(): string
    {
        return 'uuid';
    }

    public function sortableBy(): array
    {
        return ['created_at'];
    }

    /*
        @param Request $request

        @param Model $entity

     */

    protected function beforeStore($request, Model $entity): void
    {
        $entity->estado_id = 1; // Asignar estado por defecto
        $entity->uuid = Str::uuid(); // Generar UUID
    }

    // protected function beforeUpdate($request, Model $entity): void
    // {
    //     //dd($entity);
    // }


}
