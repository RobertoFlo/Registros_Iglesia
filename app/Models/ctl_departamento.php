<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ctl_departamento extends Model
{
    use SoftDeletes;
    protected $table = 'ctl_departamento';
    protected $fillable = [
        'nombre',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function Departamento()
    {
        return $this->hasMany(ctl_municipios::class, 'departamento_id')->withTrashed();
    }
    public function persona()
    {
        return $this->hasMany(persona::class, 'departamento_id')->withTrashed();
    }
}


