<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mnt_bautizo extends Model
{
    //
    use HasFactory,SoftDeletes;

    protected $table = 'mnt_bautizo';
    protected $fillable = [
        'padre_bautizo',
        'nombre_madrina',
        'nombre_padrino',
        'comentarios',
        'fecha_bautizo',
        'libro',
        'folio',
        'year',
        'persona_id',

    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function Persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id')->withTrashed();
    }

}
