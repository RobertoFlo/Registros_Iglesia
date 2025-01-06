<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ctl_gasto extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ctl_tipo_gasto';
    protected $fillable = [
        'id',
        'nombre',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function Finanza()
    {
        return $this->hasOne(Gasto::class, 'id')->withTrashed();
    }
}
