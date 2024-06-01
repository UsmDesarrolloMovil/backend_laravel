<?php

// app/Http/Controllers/PartidoController.php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function index()
    {
        $partidos = Partido::all();
        return response()->json($partidos);
    }

    public function show($id)
    {
        $partido = Partido::with(['equipoLocal', 'equipoVisitante', 'resultado'])->findOrFail($id);
        return response()->json($partido);
    }

    public function store(Request $request)
    {
        $partido = Partido::create($request->all());
        return response()->json($partido, 201);
    }

    public function update(Request $request, $id)
    {
        $partido = Partido::findOrFail($id);
        $partido->update($request->all());
        return response()->json($partido, 200);
    }

    public function destroy($id)
    {
        Partido::destroy($id);
        return response()->json(null, 204);
    }
}
