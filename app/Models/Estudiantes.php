<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'estrato',
        'genero',
        'ciudad_nacimiento',
        'fecha_nacimiento',
    ];

    public function matriculas()
    {
        return $this->hasMany(Matriculas::class, 'estudiante_id');
    }

}
