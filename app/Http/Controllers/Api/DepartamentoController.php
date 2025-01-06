<?php

namespace App\Http\Controllers\Api;

use App\Models\ctl_departamento;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orion\Concerns\DisablePagination;


class DepartamentoController extends Controller
{

    use DisableAuthorization,DisablePagination;

    protected $model = ctl_departamento::class;

    public function alwaysIncludes(): array
    {
        return ['Municipios'];
    }

    public function sortableBy(): array
    {
        return ['created_at'];
    }



}
