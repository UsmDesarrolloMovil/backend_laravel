<?php

// app/Http/Controllers/JugadorController.php

namespace App\Http\Controllers;

use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        $jugadores = Jugador::all();
        return response()->json($jugadores);
    }

    public function show($id)
    {
        $jugador = Jugador::findOrFail($id);
        return response()->json($jugador);
    }

    public function store(Request $request)
    {
        $jugador = Jugador::create($request->all());
        return response()->json($jugador, 201);
    }

    public function update(Request $request, $id)
    {
        $jugador = Jugador::findOrFail($id);
        $jugador->update($request->all());
        return response()->json($jugador, 200);
    }

    public function destroy($id)
    {
        Jugador::destroy($id);
        return response()->json(null, 204);
    }

    public function jugadoresPorEquipo($equipo_id)
    {
        $jugadores = Jugador::where('equipo_id', $equipo_id)
                            ->with('equipo')->orderBy('id', 'asc')
                            ->get();
        $modifiedResponse = $jugadores->map(function ($jugador) {
            return [
                'id' => $jugador->id,
                'nombre' => $jugador->nombre,

            ];
        });

        // Devolver la respuesta modificada
        return response()->json($modifiedResponse);
    }

    public function getJugadoresPorEquipo($equipo_id)
    {
        return Jugador::where('equipo_id', $equipo_id)
            ->with('equipo')
            ->orderBy('id', 'asc')
            ->get();
    }

}
