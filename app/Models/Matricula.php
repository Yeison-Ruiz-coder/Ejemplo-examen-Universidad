<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'asignatura_id',
        'nota',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'asignatura_id');
    }


    public function scopeFilter($query, $filters)
    {
        if (isset($filters['estudiante_id'])) {
            $query->where('estudiante_id', $filters['estudiante_id']);
        }

        if (isset($filters['asignatura_id'])) {
            $query->where('asignatura_id', $filters['asignatura_id']);
        }

        if (isset($filters['nota_min'])) {
            $query->where('nota', '>=', $filters['nota_min']);
        }

        if (isset($filters['nota_max'])) {
            $query->where('nota', '<=', $filters['nota_max']);
        }

        return $query;
    }
}
