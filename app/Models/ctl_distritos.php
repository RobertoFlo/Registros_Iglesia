<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ctl_distritos extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ctl_distrito';
    protected $fillable = [
        'nombre',
        'municipio_id'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function Municipios()
    {
        return $this->belongsTo(ctl_municipios::class, 'municipio_id')->withTrashed();
    }
    public function persona()
    {
        return $this->hasMany(persona::class, 'distrito_id')->withTrashed();
    }
}
