<?php
// app/Http/Controllers/ReglaController.php

namespace App\Http\Controllers;

use App\Models\Regla;
use Illuminate\Http\Request;

class ReglaController extends Controller
{
    public function index()
    {
        $reglas = Regla::all();
        return response()->json($reglas);
    }

    public function show($id)
    {
        $regla = Regla::findOrFail($id);
        return response()->json($regla);
    }

    public function store(Request $request)
    {
        $regla = Regla::create($request->all());
        return response()->json($regla, 201);
    }

    public function update(Request $request, $id)
    {
        $regla = Regla::findOrFail($id);
        $regla->update($request->all());
        return response()->json($regla, 200);
    }

    public function destroy($id)
    {
        Regla::destroy($id);
        return response()->json(null, 204);
    }
}
