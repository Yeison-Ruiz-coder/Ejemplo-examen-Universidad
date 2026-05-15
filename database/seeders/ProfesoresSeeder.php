<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profesores')->insert([
            [
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'titulo' => 'PhD en Matemáticas',
                'genero' => 'M',
                'area' => 'Matemáticas'
            ],
            [
                'nombre' => 'María',
                'apellido' => 'Gómez',
                'titulo' => 'PhD en Física',
                'genero' => 'F',
                'area' => 'Física'
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Rodríguez',
                'titulo' => 'PhD en Informática',
                'genero' => 'M',
                'area' => 'Informática'
            ],
            [
                'nombre' => 'Ana',
                'apellido' => 'López',
                'titulo' => 'PhD en Biología',
                'genero' => 'F',
                'area' => 'Biología'
            ],
            [
                'nombre' => 'Luis',
                'apellido' => 'Martínez',
                'titulo' => 'PhD en Química',
                'genero' => 'M',
                'area' => 'Química'
            ]
        ]);
    }
}
