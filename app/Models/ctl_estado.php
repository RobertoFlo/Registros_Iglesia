<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ctl_estado extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'ctl_estados';
    protected $fillable = [
        'nombre',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function persona()
    {
        return $this->hasOne(persona::class, 'estado_id')->withTrashed();
    }
}
