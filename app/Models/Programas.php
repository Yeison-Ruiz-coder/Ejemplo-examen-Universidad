<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programas extends Model
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
    
}
