<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'creditos',
        'ih',
        'profesor_id',
        'programa_id',
    ];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'programa_id');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'asignatura_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'asignatura_id');
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'asignatura_id');
    }
    

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['creditos'])) {
            $query->where('creditos', $filters['creditos']);
        }

        if (isset($filters['profesor_id'])) {
            $query->where('profesor_id', $filters['profesor_id']);
        }

        if (isset($filters['programa_id'])) {
            $query->where('programa_id', $filters['programa_id']);
        }

        if (isset($filters['search'])) {
            $query->where('nombre', 'like', '%' . $filters['search'] . '%');
        }

        return $query;
    }
}
