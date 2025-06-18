<?php

namespace App\Http\Controllers\Api;

use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mnt_confirma;
use App\Http\Requests\ConfirmaRequest;
use App\Policies\ConfirmaPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Confirmacontroller extends Controller
{
    /**
    * @var string $model
    */
    protected $model = mnt_confirma::class;
    /**
    * @var string $request
    */
    protected $request = ConfirmaRequest::class;
    /**
    * @var string $policy
    */
    protected $policy = ConfirmaPolicy::class;

    public function alwaysIncludes(): array
    {
        return ['Tipo'];
    }
    public function sortableBy(): array
    {
        return ['created_at'];
    }


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


}
