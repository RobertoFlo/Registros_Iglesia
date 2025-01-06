<?php

namespace App\Http\Controllers\Api;

use Orion\Http\Controllers\Controller;
use App\Models\ctl_gasto;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Illuminate\Http\Request;

class TipoFinanzacontroller extends Controller
{

    use DisableAuthorization,DisablePagination;

    protected $model = ctl_gasto::class;

  

    public function sortableBy(): array
    {
        return ['created_at'];
    }



}
