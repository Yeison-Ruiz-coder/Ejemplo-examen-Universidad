<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    // Obtener todas las asignaturas
    public function index(Request $request)
    {
        $asignaturas = Asignatura::filter($request->all());

        if ($request->has('with')) {
            $relations = explode(',', $request->with);
            $asignaturas = $asignaturas->with($relations);
        }

        return response()->json($asignaturas->get());
    }

    // Obtener una asignatura específica
    public function show($id)
    {
        $asignatura = Asignatura::find($id);

        if (!$asignatura) {
            return response()->json(['error' => 'Asignatura no encontrada'], 404);
        }

        return response()->json($asignatura);
    }

    // Crear una asignatura
    public function store(Request $request)
    {
        $asignatura = Asignatura::create($request->all());
        return response()->json($asignatura, 201);
    }

    // Actualizar una asignatura
    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::find($id);

        if (!$asignatura) {
            return response()->json(['error' => 'Asignatura no encontrada'], 404);
        }

        $asignatura->update($request->all());
        return response()->json($asignatura);
    }

    // Eliminar una asignatura
    public function destroy($id)
    {
        $asignatura = Asignatura::find($id);

        if (!$asignatura) {
            return response()->json(['error' => 'Asignatura no encontrada'], 404);
        }

        $asignatura->delete();
        return response()->json(['message' => 'Asignatura eliminada']);
    }
}
