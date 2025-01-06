<?php

namespace App\Http\Controllers\Api;

use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use App\Models\ctl_municipios;

use Orion\Concerns\DisablePagination;

class Municipiocontroller extends Controller
{
    use DisableAuthorization,DisablePagination;

    protected $model = ctl_municipios::class;

    public function filterableBy() : array
    {
        return ['departamento_id'];
    }

}


