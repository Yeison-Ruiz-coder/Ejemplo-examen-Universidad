<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia',
        'hora_inicio',
        'hora_fin',
        'aula_id',
        'asignatura_id',
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'asignatura_id');  // ← corregido
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'aula_id');
    }


    public function scopeFilter($query, $filters)
    {
        if (isset($filters['dia'])) {
            $query->where('dia', $filters['dia']);
        }

        if (isset($filters['aula_id'])) {
            $query->where('aula_id', $filters['aula_id']);
        }

        if (isset($filters['asignatura_id'])) {
            $query->where('asignatura_id', $filters['asignatura_id']);
        }

        return $query;
    }
}
