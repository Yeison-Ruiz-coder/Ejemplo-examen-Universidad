<?php

namespace Database\Factories;

use App\Models\Aula;
use Illuminate\Database\Eloquent\Factories\Factory;

class AulaFactory extends Factory
{
    protected $model = Aula::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->bothify('Aula ###'),
            'ubicacion' => $this->faker->randomElement(['Bloque A', 'Bloque B', 'Bloque C', 'Edificio Principal', 'Laboratorios']),
            'capacidad' => $this->faker->numberBetween(20, 100),
            'tipo' => $this->faker->randomElement(['Salón', 'Laboratorio', 'Auditorio', 'Sala de cómputo']),
        ];
    }
}
