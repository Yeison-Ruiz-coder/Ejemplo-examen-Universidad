<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';

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
        return $this->hasMany(Grupo::class, 'profesor_id');
    }


    public function scopeFilter($query, $filters)
    {
        if (isset($filters['genero'])) {
            $query->where('genero', $filters['genero']);
        }

        if (isset($filters['area'])) {
            $query->where('area', 'like', '%' . $filters['area'] . '%');
        }

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('nombre', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('apellido', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('titulo', 'like', '%' . $filters['search'] . '%');
            });
        }

        return $query;
    }
}
