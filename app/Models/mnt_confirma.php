<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mnt_confirma extends Model
{
    //
    use HasFactory,SoftDeletes;

    protected $table = 'mnt_confirma';
    protected $fillable = [
        'id',
        'padre_confirma',
        'comentarios',
        'libro',
        'folio',
        'year',
        'fecha_confirma',
        'persona_id',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function Persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id')->withTrashed();
    }
}
