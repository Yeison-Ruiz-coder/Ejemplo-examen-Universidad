<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Obtener todos los estudiantes
    public function index(Request $request)
    {
        $estudiante = Estudiante::filter($request->all());

        if ($request->has('with')) {
            $relations = explode(',', $request->with);
            $estudiante = $estudiante->with($relations);
        }

        return response()->json($estudiante->get());
    }

    // Obtener un estudiante específico
    public function show(int $id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }

        return response()->json($estudiante);
    }

    // Crear un estudiante
    public function store(Request $request)
    {
        $estudiante = Estudiante::create($request->all());
        return response()->json($estudiante, 201);
    }

    // Actualizar un estudiante
    public function update(Request $request, int $id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }

        $estudiante->update($request->all());
        return response()->json($estudiante);
    }

    // Eliminar un estudiante
    public function destroy(int $id)
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }

        $estudiante->delete();
        return response()->json(['message' => 'Estudiante eliminado']);
    }
}
