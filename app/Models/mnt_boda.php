<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mnt_boda extends Model
{
    //
    use HasFactory,SoftDeletes;
    protected $table = 'mnt_boda';
    protected $fillable = [
        'numero_expediente',
        'numero_libro',
        'libro',
        'folio',
        'anios_libro',
        'fecha_declaracion',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function Detalle()
    {
        return $this->hasMany(mnt_detalle_boda::class, 'boda_id')->withTrashed();
    }
}
