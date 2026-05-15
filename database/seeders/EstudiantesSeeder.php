<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Void_;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estudiantes')->insert([
            [
                'nombre' => 'Juan Pérez',
                'apellido' => 'Pérez',
                'estrato' => 3,
                'genero' => 'M',
                'ciudad_nacimiento' => 'Bogotá',
                'fecha_nacimiento' => '2000-01-15',
            ],
            [
                'nombre' => 'María Gómez',
                'apellido' => 'Gómez',
                'estrato' => 2,
                'genero' => 'F',
                'ciudad_nacimiento' => 'Medellín',
                'fecha_nacimiento' => '1999-05-30',
            ],
            [
                'nombre' => 'Carlos Rodríguez',
                'apellido' => 'Rodríguez',
                'estrato' => 4,
                'genero' => 'M',
                'ciudad_nacimiento' => 'Cali',
                'fecha_nacimiento' => '2001-09-10',
            ],
        ]);
    }
}
