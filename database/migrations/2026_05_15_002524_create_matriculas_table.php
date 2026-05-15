<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->decimal('nota', 10, 2);

            $table->foreignId('estudiante_id')
                ->nullable()
                ->constrained('estudiantes')
                ->onDelete('set null');

            $table->foreignId('asignatura_id')
                ->nullable()
                ->constrained('asignaturas')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
