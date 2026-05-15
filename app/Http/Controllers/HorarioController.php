<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    // Obtener todos los horarios
    public function index(Request $request)
    {
        $horarios = Horario::filter($request->all());

        if ($request->has('with')) {
            $relations = explode(',', $request->with);
            $horarios = $horarios->with($relations);
        }

        return response()->json($horarios->get());
    }

    // Obtener un horario específico
    public function show($id)
    {
        $horario = Horario::find($id);

        if (!$horario) {
            return response()->json(['error' => 'Horario no encontrado'], 404);
        }

        return response()->json($horario);
    }

    // Crear un horario
    public function store(Request $request)
    {
        $horario = Horario::create($request->all());
        return response()->json($horario, 201);
    }

    // Actualizar un horario
    public function update(Request $request, $id)
    {
        $horario = Horario::find($id);

        if (!$horario) {
            return response()->json(['error' => 'Horario no encontrado'], 404);
        }

        $horario->update($request->all());
        return response()->json($horario);
    }

    // Eliminar un horario
    public function destroy($id)
    {
        $horario = Horario::find($id);

        if (!$horario) {
            return response()->json(['error' => 'Horario no encontrado'], 404);
        }

        $horario->delete();
        return response()->json(['message' => 'Horario eliminado']);
    }
}
