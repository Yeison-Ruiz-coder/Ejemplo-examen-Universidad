<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    // Obtener todas las aulas
    public function index(Request $request)
    {
        $aula = Aula::filter($request->all());

        if ($request->has('with')) {
            $relations = explode(',', $request->with);
            $aula = $aula->with($relations);
        }

        return response()->json($aula->get());
    }

    // Obtener un aula específica
    public function show($id)
    {
        $aula = Aula::find($id);

        if (!$aula) {
            return response()->json(['error' => 'Aula no encontrada'], 404);
        }

        return response()->json($aula);
    }

    // Crear un aula
    public function store(Request $request)
    {
        $aula = Aula::create($request->all());
        return response()->json($aula, 201);
    }

    // Actualizar un aula
    public function update(Request $request, $id)
    {
        $aula = Aula::find($id);

        if (!$aula) {
            return response()->json(['error' => 'Aula no encontrada'], 404);
        }

        $aula->update($request->all());
        return response()->json($aula);
    }

    // Eliminar un aula
    public function destroy($id)
    {
        $aula = Aula::find($id);

        if (!$aula) {
            return response()->json(['error' => 'Aula no encontrada'], 404);
        }

        $aula->delete();
        return response()->json(['message' => 'Aula eliminada']);
    }
}
