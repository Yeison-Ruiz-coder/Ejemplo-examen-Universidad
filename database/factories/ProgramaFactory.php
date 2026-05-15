<?php

namespace Database\Factories;

use App\Models\Programa;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramaFactory extends Factory
{
    protected $model = Programa::class;

    public function definition()
    {
        return [
            'programa' => $this->faker->randomElement([
                'Ingeniería de Sistemas',
                'Ingeniería Civil',
                'Administración de Empresas',
                'Medicina',
                'Derecho',
                'Psicología',
                'Arquitectura'
            ]),
            'departamento' => $this->faker->randomElement([
                'Ingenierías',
                'Ciencias Económicas',
                'Ciencias de la Salud',
                'Ciencias Sociales'
            ]),
            'facultad' => $this->faker->randomElement([
                'Facultad de Ingenierías',
                'Facultad de Ciencias Empresariales',
                'Facultad de Medicina',
                'Facultad de Derecho'
            ]),
        ];
    }
}
