<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'titulo',
        'genero',
        'area',
    ];

    public function asignatura()
    {
        return $this->hasMany(Asignatura::class, 'profesor_id');
    }

    public function grupos()
    {
        return $this->hasMany(Grupos::class, 'profesor_id');
    }

    
}
