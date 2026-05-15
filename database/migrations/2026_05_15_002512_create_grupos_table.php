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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('grupo');
            $table->integer('num_estudiantes');

            $table->foreignId('profesor_id')
                ->nullable()
                ->constrained('profesores')
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
        Schema::dropIfExists('grupos');
    }
};
