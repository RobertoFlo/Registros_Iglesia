<?php

namespace App\Http\Controllers\Api;

use App\Models\mnt_bautizo;
use App\Policies\BautizoPolicy;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller;
use App\Http\Requests\BautizoStorePostRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Requests\Request;

class Bautizocontroller extends Controller
{
     /**
    * @var string $model
    */

    protected $model = mnt_bautizo::class;
    /**
    * @var string $request
    */

   protected $request = BautizoStorePostRequest::class;
    /**
    * @var string $policy
    */
    protected $policy = BautizoPolicy::class;

    public function alwaysIncludes(): array
    {
        return ['Persona'];
    }

    public function sortableBy(): array
    {
        return ['created_at'];
    }

    public function filterableBy(): array
    {
        return ['fecha_bautizo', 'libro', 'folio', 'year'];
    }

    /*
        @param Request $request

        @param Model $entity

     */

    protected function beforeDestroy($request, Model $entity)
    {
        // dd($entity);
        $entity->deleted_at = now(); // Asignar fecha de eliminación
        $entity->save();
    }

    protected function buildIndexFetchQuery($request, array $requestedRelations): Builder
    {
        $query = parent::buildShowFetchQuery($request, $requestedRelations);
        $query->withTrashed();
        return $query;
    }

    // public function disablePagination(): bool
    // {
    //     return true; // Deshabilitar paginación
    // }


}
