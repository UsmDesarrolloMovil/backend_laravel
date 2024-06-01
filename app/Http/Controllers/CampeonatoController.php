<?php

// app/Http/Controllers/CampeonatoController.php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    public function index()
    {
        $campeonatos = Campeonato::all();
        return response()->json($campeonatos);
    }

    public function show($id)
    {
        $campeonato = Campeonato::with('partidos', 'reglas')->findOrFail($id);
        return response()->json($campeonato);
    }

    public function store(Request $request)
    {
        $campeonato = Campeonato::create($request->all());
        return response()->json($campeonato, 201);
    }

    public function update(Request $request, $id)
    {
        $campeonato = Campeonato::findOrFail($id);
        $campeonato->update($request->all());
        return response()->json($campeonato, 200);
    }

    public function destroy($id)
    {
        Campeonato::destroy($id);
        return response()->json(null, 204);
    }
}
