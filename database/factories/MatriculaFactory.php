<?php

namespace Database\Factories;

use App\Models\Matricula;
use App\Models\Estudiante;
use App\Models\Asignatura;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatriculaFactory extends Factory
{
    protected $model = Matricula::class;

    public function definition()
    {
        return [
            'estudiante_id' => Estudiante::inRandomOrder()->first()->id ?? null,
            'asignatura_id' => Asignatura::inRandomOrder()->first()->id ?? null,
            'nota' => $this->faker->randomFloat(2, 0, 5),
        ];
    }
}
