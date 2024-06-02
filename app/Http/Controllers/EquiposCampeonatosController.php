<?php

namespace App\Http\Controllers;

use App\Models\EquiposCampeonatos;
use App\Models\Campeonato;


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

    public function equiposPorCampeonato($campeonato_id)
    {
        // Obtener el campeonato con sus equipos
        $campeonato = Campeonato::with('equipos')->findOrFail($campeonato_id);

        // Modificar la estructura de la respuesta si es necesario
        $equipos = $campeonato->equipos->map(function ($equipo) use ($campeonato) {
            return [
                'id' => $equipo->id,
                'nombre' => $equipo->nombre,
                'juegos' => $equipo->juegos,
                'imagen_url' => $equipo->imagen_url,
                'puntos' => $equipo->pivot->puntos,
                // Agrega más campos si es necesario
            ];
        });

        // Devolver la respuesta modificada
        return response()->json($equipos);
    }


}
