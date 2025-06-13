<?php

namespace App\Http\Controllers\Api;

use App\Models\mnt_bautizo;
use App\Policies\BautizoPolicy;
use Illuminate\Http\Request;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller;
use App\Http\Requests\BautizoStorePostRequest;


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




}
