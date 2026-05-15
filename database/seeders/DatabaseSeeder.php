<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Crear 10 registros de cada tabla base
        \App\Models\Profesor::factory(10)->create();
        \App\Models\Programa::factory(10)->create();
        \App\Models\Estudiante::factory(50)->create();
        \App\Models\Aula::factory(10)->create();

        // Crear 20 asignaturas (usa los profesores y programas existentes)
        \App\Models\Asignatura::factory(20)->create();

        // Crear 30 grupos, 60 matrículas y 40 horarios
        \App\Models\Grupo::factory(30)->create();
        \App\Models\Matricula::factory(60)->create();
        \App\Models\Horario::factory(40)->create();
    }
}
