<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $fillable = [
        'grupo',
        'num_estudiantes',
        'profesor_id',
        'asignatura_id',
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'asignatura_id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }


    public function scopeFilter($query, $filters)
    {
        if (isset($filters['grupo'])) {
            $query->where('grupo', $filters['grupo']);
        }

        if (isset($filters['profesor_id'])) {
            $query->where('profesor_id', $filters['profesor_id']);
        }

        if (isset($filters['asignatura_id'])) {
            $query->where('asignatura_id', $filters['asignatura_id']);
        }

        return $query;
    }
}
