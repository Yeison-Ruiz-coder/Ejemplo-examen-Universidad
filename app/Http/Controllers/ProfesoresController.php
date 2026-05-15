<?php

namespace App\Http\Controllers;

use App\Models\Profesores;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $query = Profesores::select('id', 'nombre', 'apellido', 'titulo', 'genero', 'area');

        // Filtros exactos
        $filtrosExactos = ['titulo', 'genero', 'area'];
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'genero' => 'required|in:M,F',
            'area' => 'required|string|max:255'
        ]);

        $profesores = Profesores::create($validated);

        return response()->json([
            'success' => true,
            'data' => $profesores,
            'message' => 'Profesor creado exitosamente'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesores $profesores)
    {
        $profesores = Profesores::with(['asignaturas'])->findOrFail($profesores->id);

        return response()->json([
            'success' => true,
            'data' => $profesores
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profesores $profesores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profesores $profesores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesores $profesores)
    {
        //
    }
}
