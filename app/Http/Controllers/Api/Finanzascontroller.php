<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use App\Models\Gasto;
use App\Http\Requests\FinanzasRequest;
use App\Policies\FinanzasPolicy;



class Finanzascontroller extends Controller
{
/**
    * @var string $model
    */
    protected $model = Gasto::class;
    /**
    * @var string $request
    */
    protected $request = FinanzasRequest::class;
     /**
    * @var string $policy
    */
    protected $policy = FinanzasPolicy::class;

    public function sortableBy(): array
    {
        return ['created_at'];
    }
    public function alwaysIncludes(): array
    {
        return ['Tipo'];
    }
}
