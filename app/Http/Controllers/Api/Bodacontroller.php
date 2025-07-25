<?php

namespace App\Http\Controllers\Api;

use Orion\Http\Controllers\Controller;
use App\Models\mnt_boda;
use App\Models\mnt_detalle_boda;
use App\Http\Requests\MatrimonioRequest;
use App\Policies\MatrimonioPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Bodacontroller extends Controller
{
    /**
    * @var string $model
    */
    protected $model = mnt_boda::class;
    /**
    * @var string $request
    */
    protected $request = MatrimonioRequest::class;
     /**
    * @var string $policy
    */
    protected $policy = MatrimonioPolicy::class;


    public function alwaysIncludes(): array
    {
        return ['Detalle'];
    }
    public function sortableBy(): array
    {
        return ['created_at'];
    }

    protected function afterStore($request, Model $entity)
    {

        $testigo_1 = new mnt_detalle_boda();
        $testigo_1->boda_id = $entity->id;
        $testigo_1->nombre_testigo = $request->nombre_testigo_01;
        $testigo_1->persona_id = $request->persona_id_01;

        $testigo_2 = new mnt_detalle_boda();
        $testigo_2->boda_id = $entity->id;
        $testigo_2->nombre_testigo = $request->nombre_testigo_02;
        $testigo_2->persona_id = $request->persona_id_02;
        $testigo_1->save();
        $testigo_2->save();
    }
    protected function beforeDestroy($request, Model $entity)
    {
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
