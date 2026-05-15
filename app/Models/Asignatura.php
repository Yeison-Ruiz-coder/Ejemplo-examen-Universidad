<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'codigo',
        'creditos',
        'profesor_id',
    ];

    public function profesor()
    {
        return $this->belongsTo(Profesores::class, 'profesor_id');
    }

    public function programa()
    {
        return $this->belongsTo(Programas::class, 'programa_id');
    }

    public function matriculas()
    {
        return $this->hasMany(Matriculas::class, 'asignatura_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horarios::class, 'asignatura_id');
    }

    public function grupos()
    {
        return $this->hasMany(Grupos::class, 'asignatura_id');
    }
}
