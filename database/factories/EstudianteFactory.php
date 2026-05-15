<?php

namespace Database\Factories;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    protected $model = Estudiante::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'estrato' => $this->faker->numberBetween(1, 6),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino', 'Otro']),
            'ciudad_nacimiento' => $this->faker->city(),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2006-01-01'),
        ];
    }
}
