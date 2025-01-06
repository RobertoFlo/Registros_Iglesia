<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class Persona extends Model
{
    use HasApiTokens, HasFactory,SoftDeletes, Notifiable;

    protected $table = 'mnt_persona';
    protected $fillable = [
        'id',
        'uuid',
        'user_id',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'nombre_madre',
        'nombre_padre',
        'domicilio',
        'fecha_nacimiento',
        'departamento_id',
        'municipio_id',
        'distrito_id',

    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function departamento()
    {
        return $this->belongsTo(ctl_departamento::class, 'departamento_id')->withTrashed();
    }

    public function distrito()
    {
        return $this->belongsTo(ctl_distritos::class, 'municipio_id')->withTrashed();
    }

    public function municipio()
    {
        return $this->belongsTo(ctl_municipios::class, 'distrito_id')->withTrashed();
    }

    public function bautizo()
    {
        return $this->hasOne(mnt_bautizo::class, 'persona_id')->withTrashed();
    }

    public function confirma()
    {
        return $this->hasOne(mnt_confirma::class, 'persona_id')->withTrashed();
    }
    public function matrimonio()
    {
        return $this->hasOne(mnt_boda::class, 'persona_id')->withTrashed();
    }
}
