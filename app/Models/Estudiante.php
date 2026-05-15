<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
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
        return $this->hasMany(Matricula::class, 'estudiante_id');
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['estrato'])) {
            $query->where('estrato', $filters['estrato']);
        }

        if (isset($filters['genero'])) {
            $query->where('genero', $filters['genero']);
        }

        if (isset($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('nombre', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('apellido', 'like', '%' . $filters['search'] . '%');
            });
        }

        return $query;
    }
}
