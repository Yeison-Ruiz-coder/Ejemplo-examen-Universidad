<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
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
        return $this->hasMany(Horario::class, 'aula_id');
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['tipo'])) {
            $query->where('tipo', $filters['tipo']);
        }

        if (isset($filters['capacidad_min'])) {
            $query->where('capacidad', '>=', $filters['capacidad_min']);
        }

        if (isset($filters['capacidad_max'])) {
            $query->where('capacidad', '<=', $filters['capacidad_max']);
        }

        if (isset($filters['ubicacion'])) {
            $query->where('ubicacion', 'like', '%' . $filters['ubicacion'] . '%');
        }

        return $query;
    }
}
