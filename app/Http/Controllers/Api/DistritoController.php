<?php

namespace App\Http\Controllers\Api;

use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Illuminate\Http\Request;
use Orion\Concerns\DisablePagination;
use App\Models\ctl_distritos;

class DistritoController extends Controller
{
    //
    use DisableAuthorization,DisablePagination;

    protected $model = ctl_distritos::class;

    public function filterableBy() : array
    {
        return ['municipio_id'];
    }
}
