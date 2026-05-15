<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\HorarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::apiResource('estudiantes', EstudianteController::class);
Route::apiResource('profesores', ProfesorController::class);
Route::apiResource('aulas', AulaController::class);
Route::apiResource('programas', ProgramaController::class);
Route::apiResource('asignaturas', AsignaturaController::class);
Route::apiResource('grupos', GrupoController::class);
Route::apiResource('matriculas', MatriculaController::class);
Route::apiResource('horarios', HorarioController::class);
