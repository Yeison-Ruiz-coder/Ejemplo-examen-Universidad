<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'asignatura_id',
        'profesor_id',
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'asignatura_id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesores::class, 'profesor_id');
    }
    
}
