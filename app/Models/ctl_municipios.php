<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ctl_municipios extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ctl_municipio';
    protected $fillable = [
        'nombre',
        'departamento_id'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function Departamento()
    {
        return $this->belongsTo(ctl_departamento::class, 'departamento_id')->withTrashed();
    }
    public function Municipios()
    {
        return $this->hasMany(ctl_distritos::class, 'municipio_id')->withTrashed();
    }
    public function persona()
    {
        return $this->hasMany(persona::class, 'municipio_id')->withTrashed();
    }
}
