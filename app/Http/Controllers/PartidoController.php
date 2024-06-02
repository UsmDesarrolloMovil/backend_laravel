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

    public function partidosPorCampeonato($campeonato_id)
    {
        // Obtener todos los partidos del campeonato especificado con la información de los equipos
        $partidos = Partido::where('campeonato_id', $campeonato_id)
                            ->with(['equipoLocal', 'equipoVisitante', 'resultado'])
                            ->get();

        // Modificar la estructura de la respuesta si es necesario
        $modifiedResponse = $partidos->map(function ($partido) {
            $resultado = $partido->resultado;
            return [
                'id' => $partido->id,
                'campeonato_id' => $partido->campeonato_id,
                'equipo_local' =>  $partido->equipoLocal->nombre,
                'imagen_local' => $partido->equipoLocal->imagen_url,
                'equipo_visitante' =>  $partido->equipoVisitante->nombre,
                'imagen_visitante' => $partido->equipoVisitante->imagen_url,

                'fecha' => $partido->fecha,
                'lugar' => $partido->lugar, 
                'hora'=>$partido->hora,
                
                'estado' => $partido->estado,
                'id_resultado' => $resultado ? $resultado->id : null,
                'equipo_ganador_id' => $resultado ? $resultado->equipo_ganador_id : null,
                'puntos_local' => $resultado ? $resultado->puntos_local : null,
                'puntos_visitante' => $resultado ? $resultado->puntos_visitante : null,
                // Agrega más campos si es necesario
            ];
        });

        // Devolver la respuesta modificada
        return response()->json($modifiedResponse);
    }

}
