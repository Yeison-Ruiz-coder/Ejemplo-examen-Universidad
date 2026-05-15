<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    // Obtener todos los profesores
    public function index(Request $request)
    {
        $profesores = Profesor::filter($request->all());

        if ($request->has('with')) {
            $relations = explode(',', $request->with);
            $profesores = $profesores->with($relations);
        }

        return response()->json($profesores->get());
    }

    // Obtener un profesor específico
    public function show($id)
    {
        $profesor = Profesor::find($id);

        if (!$profesor) {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }

        return response()->json($profesor);
    }

    // Crear un profesor
    public function store(Request $request)
    {
        $profesor = Profesor::create($request->all());
        return response()->json($profesor, 201);
    }

    // Actualizar un profesor
    public function update(Request $request, $id)
    {
        $profesor = Profesor::find($id);

        if (!$profesor) {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }

        $profesor->update($request->all());
        return response()->json($profesor);
    }

    // Eliminar un profesor
    public function destroy($id)
    {
        $profesor = Profesor::find($id);

        if (!$profesor) {
            return response()->json(['error' => 'Profesor no encontrado'], 404);
        }

        $profesor->delete();
        return response()->json(['message' => 'Profesor eliminado']);
    }
}
