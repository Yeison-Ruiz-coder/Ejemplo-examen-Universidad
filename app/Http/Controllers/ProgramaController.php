<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    // Obtener todos los programas
    public function index(Request $request)
    {
        $programa = Programa::filter($request->all());

        if ($request->has('with')) {
            $relations = explode(',', $request->with);
            $programa = $programa->with($relations);
        }

        return response()->json($programa->get());
    }

    // Obtener un programa específico
    public function show($id)
    {
        $programa = Programa::find($id);

        if (!$programa) {
            return response()->json(['error' => 'Programa no encontrado'], 404);
        }

        return response()->json($programa);
    }

    // Crear un programa
    public function store(Request $request)
    {
        $programa = Programa::create($request->all());
        return response()->json($programa, 201);
    }

    // Actualizar un programa
    public function update(Request $request, $id)
    {
        $programa = Programa::find($id);

        if (!$programa) {
            return response()->json(['error' => 'Programa no encontrado'], 404);
        }

        $programa->update($request->all());
        return response()->json($programa);
    }

    // Eliminar un programa
    public function destroy($id)
    {
        $programa = Programa::find($id);

        if (!$programa) {
            return response()->json(['error' => 'Programa no encontrado'], 404);
        }

        $programa->delete();
        return response()->json(['message' => 'Programa eliminado']);
    }
}
