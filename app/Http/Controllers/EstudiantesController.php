<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index(Request $request)
    {
        $query = Estudiantes::select('id', 'nombre', 'apellido', 'estrato', 'genero', 'ciudad_nacimiento', 'fecha_nacimiento');

        // Filtros exactos
        $filtrosExactos = ['estrato', 'genero', 'ciudad_nacimiento'];
        foreach ($filtrosExactos as $filtro) {
            if ($request->has($filtro)) {
                $query->where($filtro, $request->input($filtro));
            }
        }

        // Filtros de búsqueda parcial (LIKE)
        $filtrosBusqueda = ['nombre', 'apellido'];
        foreach ($filtrosBusqueda as $filtro) {
            if ($request->has($filtro)) {
                $query->where($filtro, 'LIKE', '%' . $request->input($filtro) . '%');
            }
        }

        return response()->json($query->paginate(15));
    }

    // POST /api/estudiantes
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'estrato' => 'required|integer|min:1|max:6',
            'genero' => 'required|in:M,F',
            'ciudad_nacimiento' => 'required|string',
            'fecha_nacimiento' => 'required|date'
        ]);

        $estudiantes = Estudiantes::create($validated);

        return response()->json([
            'success' => true,
            'data' => $estudiantes,
            'message' => 'Estudiante creado exitosamente'
        ], 201);
    }

    // GET /api/estudiantes/{id}
    public function show(int $id)
    {
        $estudiantes = Estudiantes::with(['matriculas.asignatura'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $estudiantes
        ]);
    }

    // PUT /api/estudiantes/{id}
    public function update(Request $request, int $id)
    {
        $estudiantes = Estudiantes::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'apellido' => 'string|max:255',
            'estrato' => 'integer|min:1|max:6',
            'genero' => 'in:M,F',
            'ciudad_nacimiento' => 'string',
            'fecha_nacimiento' => 'date'
        ]);

        $estudiantes->update($validated);

        return response()->json([
            'success' => true,
            'data' => $estudiantes,
            'message' => 'Estudiante actualizado exitosamente'
        ]);
    }

    // DELETE /api/estudiantes/{id}
    public function destroy(int $id)
    {
        $estudiantes = Estudiantes::findOrFail($id);
        $estudiantes->delete();

        return response()->json([
            'success' => true,
            'message' => 'Estudiante eliminado exitosamente'
        ]);
    }
}
