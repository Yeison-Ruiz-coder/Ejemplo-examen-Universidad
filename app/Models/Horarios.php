<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo_id',
        'aula_id',
        'dia',
        'hora_inicio',
        'hora_fin',
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'grupo_id');
    }

    public function aula()
    {
        return $this->belongsTo(Aulas::class, 'aula_id');
    }
}
