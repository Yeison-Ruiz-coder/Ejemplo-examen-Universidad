<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    // Obtener todos los grupos
    public function index(Request $request)
    {
        $grupos = Grupo::filter($request->all());

        if ($request->has('with')) {
            $relations = explode(',', $request->with);
            $grupos = $grupos->with($relations);
        }

        return response()->json($grupos->get());
    }

    // Obtener un grupo específico
    public function show($id)
    {
        $grupo = Grupo::find($id);

        if (!$grupo) {
            return response()->json(['error' => 'Grupo no encontrado'], 404);
        }

        return response()->json($grupo);
    }

    // Crear un grupo
    public function store(Request $request)
    {
        $grupo = Grupo::create($request->all());
        return response()->json($grupo, 201);
    }

    // Actualizar un grupo
    public function update(Request $request, $id)
    {
        $grupo = Grupo::find($id);

        if (!$grupo) {
            return response()->json(['error' => 'Grupo no encontrado'], 404);
        }

        $grupo->update($request->all());
        return response()->json($grupo);
    }

    // Eliminar un grupo
    public function destroy($id)
    {
        $grupo = Grupo::find($id);

        if (!$grupo) {
            return response()->json(['error' => 'Grupo no encontrado'], 404);
        }

        $grupo->delete();
        return response()->json(['message' => 'Grupo eliminado']);
    }
}
