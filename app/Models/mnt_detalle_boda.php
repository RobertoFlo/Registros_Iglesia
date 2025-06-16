<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mnt_detalle_boda extends Model
{
    //
 //
    use HasFactory,SoftDeletes;

    protected $table = 'mnt_detalle_boda';
    protected $fillable = [
        'nombre_testigo',
        'persona_id',
        'boda_id',
        'deleted_at'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function Boda()
    {
        return $this->belongsTo(mnt_boda::class, 'boda_id')->withTrashed();
    }
    public function novios()
    {
        return $this->belongsTo(mnt_boda::class, 'persona_id')->withTrashed();
    }
}
