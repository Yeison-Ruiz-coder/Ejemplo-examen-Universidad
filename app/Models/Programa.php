<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $fillable = [
        'programa',
        'departamento',
        'facultad',
    ];

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, 'programa_id');
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['departamento'])) {
            $query->where('departamento', 'like', '%' . $filters['departamento'] . '%');
        }

        if (isset($filters['facultad'])) {
            $query->where('facultad', 'like', '%' . $filters['facultad'] . '%');
        }

        if (isset($filters['search'])) {
            $query->where('programa', 'like', '%' . $filters['search'] . '%');
        }

        return $query;
    }
}
