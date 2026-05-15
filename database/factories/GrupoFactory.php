<?php

namespace Database\Factories;

use App\Models\Grupo;
use App\Models\Profesor;
use App\Models\Asignatura;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoFactory extends Factory
{
    protected $model = Grupo::class;

    public function definition()
    {
        return [
            'grupo' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']),
            'num_estudiantes' => $this->faker->numberBetween(10, 45),
            'profesor_id' => Profesor::inRandomOrder()->first()->id ?? null,
            'asignatura_id' => Asignatura::inRandomOrder()->first()->id ?? null,
        ];
    }
}