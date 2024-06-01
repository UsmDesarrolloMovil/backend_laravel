<?php

// app/Http/Controllers/ResultadoController.php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    public function index()
    {
        $resultados = Resultado::all();
        return response()->json($resultados);
    }

    public function show($id)
    {
        $resultado = Resultado::findOrFail($id);
        return response()->json($resultado);
    }

    public function store(Request $request)
    {
        $resultado = Resultado::create($request->all());
        return response()->json($resultado, 201);
    }

    public function update(Request $request, $id)
    {
        $resultado = Resultado::findOrFail($id);
        $resultado->update($request->all());
        return response()->json($resultado, 200);
    }

    public function destroy($id)
    {
        Resultado::destroy($id);
        return response()->json(null, 204);
    }
}
