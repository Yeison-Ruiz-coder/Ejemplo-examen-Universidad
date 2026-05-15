<?php

namespace Database\Factories;

use App\Models\Asignatura;
use App\Models\Profesor;
use App\Models\Programa;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignaturaFactory extends Factory
{
    protected $model = Asignatura::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement([
                'Matemáticas I',
                'Física I',
                'Programación Web',
                'Bases de Datos',
                'Inglés Técnico',
                'Estadística',
                'Álgebra Lineal'
            ]),
            'creditos' => $this->faker->numberBetween(2, 6),
            'ih' => $this->faker->numberBetween(2, 8),
            'profesor_id' => Profesor::inRandomOrder()->first()->id ?? null,
            'programa_id' => Programa::inRandomOrder()->first()->id ?? null,
        ];
    }
}
