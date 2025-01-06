<?php

namespace App\Http\Controllers\Api;

use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mnt_confirma;
use App\Http\Requests\ConfirmaRequest;
use App\Policies\ConfirmaPolicy;


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

    

}
