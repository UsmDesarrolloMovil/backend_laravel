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
        // Obtener todos los jugadores del equipo especificado con la información del equipo
        $jugadores = Jugador::where('equipo_id', $equipo_id)
                            ->with('equipo') // Eager load del equipo
                            ->get();

        // Modificar la estructura de la respuesta
        $modifiedResponse = $jugadores->map(function ($jugador) {
            return [
                'id' => $jugador->id,
                'nombre' => $jugador->nombre,
                // 'equipo' => [
                //     'id' => $jugador->equipo->id,
                //     'nombre' => $jugador->equipo->nombre,
                //     'juegos' => $jugador->equipo->juegos,
                //     'imagen_url' => $jugador->equipo->imagen_url,
                // ],
                // Agrega más campos si es necesario
            ];
        });

        // Devolver la respuesta modificada
        return response()->json($modifiedResponse);
    }

}
