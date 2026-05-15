<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculas extends Model
{
    use HasFactory;
    protected $fillable = [
        'estudiante_id',
        'programa_id',
        'profesor_id',
        'aula_id',
        'fecha_matricula',
    ];

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiantes::class, 'estudiante_matricula', 'matricula_id', 'estudiante_id');
    }

    public function asignatura(){
        return $this->belongsTo(Asignatura::class, 'asignatura_id');
    }
}
