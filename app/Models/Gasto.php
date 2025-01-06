<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Gasto extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'mnt_gasto';
    protected $fillable = [
        'id',
        'fecha',
        'descripcion',
        'monto',
        'tipo_id',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function Tipo()
    {
        return $this->belongsTo(ctl_gasto::class, 'tipo_id')->withTrashed();
    }
}
