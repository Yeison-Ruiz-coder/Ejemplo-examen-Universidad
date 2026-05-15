<?php

namespace Database\Factories;

use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    protected $model = Profesor::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'titulo' => $this->faker->randomElement(['Ingeniero', 'Magíster', 'Doctor', 'Especialista']),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino', 'Otro']),
            'area' => $this->faker->randomElement(['Matemáticas', 'Ciencias', 'Lenguaje', 'Sociales', 'Inglés', 'Artes']),
        ];
    }
}
