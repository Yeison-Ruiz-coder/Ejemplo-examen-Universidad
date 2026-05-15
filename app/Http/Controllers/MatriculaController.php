<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    // Obtener todas las matrículas con filtros
    public function index(Request $request)
    {
        // Construir la consulta base con filtros
        $matriculas = Matricula::filter($request->all());

        // Agregar relaciones si se solicitan
        if ($request->has('with')) {
            $relations = explode(',', $request->with);
            $matriculas = $matriculas->with($relations);
        }

        return response()->json($matriculas->get());
    }

    // Obtener una matrícula específica
    public function show($id)
    {
        $matricula = Matricula::find($id);

        if (!$matricula) {
            return response()->json(['error' => 'Matrícula no encontrada'], 404);
        }

        return response()->json($matricula);
    }

    // Crear una matrícula
    public function store(Request $request)
    {
        $matricula = Matricula::create($request->all());
        return response()->json($matricula, 201);
    }

    // Actualizar una matrícula
    public function update(Request $request, $id)
    {
        $matricula = Matricula::find($id);

        if (!$matricula) {
            return response()->json(['error' => 'Matrícula no encontrada'], 404);
        }

        $matricula->update($request->all());
        return response()->json($matricula);
    }

    // Eliminar una matrícula
    public function destroy($id)
    {
        $matricula = Matricula::find($id);

        if (!$matricula) {
            return response()->json(['error' => 'Matrícula no encontrada'], 404);
        }

        $matricula->delete();
        return response()->json(['message' => 'Matrícula eliminada']);
    }
}
