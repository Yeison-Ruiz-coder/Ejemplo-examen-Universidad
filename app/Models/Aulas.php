<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aulas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ubicacion',
        'capacidad',
        'tipo',
    ];

    public function horarios()
    {
        return $this->hasMany(Horarios::class, 'aula_id');
    }
}
