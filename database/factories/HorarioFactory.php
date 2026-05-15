<?php

namespace Database\Factories;

use App\Models\Horario;
use App\Models\Aula;
use App\Models\Asignatura;
use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioFactory extends Factory
{
    protected $model = Horario::class;

    public function definition()
    {
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        $horas = ['07:00', '09:00', '11:00', '13:00', '15:00', '17:00', '19:00'];

        $horaInicio = $this->faker->randomElement($horas);
        $index = array_search($horaInicio, $horas);
        $horaFin = $horas[$index + 2] ?? '21:00';

        return [
            'dia' => $this->faker->randomElement($dias),
            'hora_inicio' => $horaInicio,
            'hora_fin' => $horaFin,
            'aula_id' => Aula::inRandomOrder()->first()->id ?? null,
            'asignatura_id' => Asignatura::inRandomOrder()->first()->id ?? null,
        ];
    }
}
