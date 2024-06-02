<?php

namespace App\Http\Controllers;

use App\Models\EquiposCampeonatos;
use Illuminate\Http\Request;

class EquiposCampeonatosController extends Controller
{
    public function index()
    {
        return EquiposCampeonatos::all();
    }

    public function store(Request $request)
    {
        $equiposCampeonatos = EquiposCampeonatos::create($request->all());
        return response()->json($equiposCampeonatos, 201);
    }

    public function show($id)
    {
        return EquiposCampeonatos::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $equiposCampeonatos = EquiposCampeonatos::findOrFail($id);
        $equiposCampeonatos->update($request->all());
        return response()->json($equiposCampeonatos, 200);
    }

    public function destroy($id)
    {
        $equiposCampeonatos = EquiposCampeonatos::findOrFail($id);
        $equiposCampeonatos->delete();
        return response()->json(null, 204);
    }
}
