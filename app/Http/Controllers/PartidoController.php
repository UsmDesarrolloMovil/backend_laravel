<?php

// app/Http/Controllers/PartidoController.php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Equipo;
use App\Models\Resultado;
use App\Models\EquiposCampeonatos;

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
        $partidos = Partido::where('campeonato_id', $campeonato_id)
                            ->with(['equipoLocal', 'equipoVisitante', 'resultado'])
                            ->get();

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
            ];
        });

        return response()->json($modifiedResponse);
    }

    public function partidosPorEquipo($equipo_id)
    {
        $partidos = Partido::where('equipo_local_id', $equipo_id)
                            ->orWhere('equipo_visitante_id', $equipo_id)
                            ->with(['equipoLocal', 'equipoVisitante', 'resultado'])
                            ->get();
        $equipo = Equipo::find($equipo_id);
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
                'hora' => $partido->hora,
                'lugar' => $partido->lugar,
                'estado' => $partido->estado,
                'id_resultado' => $resultado ? $resultado->id : null,
                'equipo_ganador_id' => $resultado ? $resultado->equipo_ganador_id : null,
                'puntos_local' => $resultado ? $resultado->puntos_local : null,
                'puntos_visitante' => $resultado ? $resultado->puntos_visitante : null,
            ];
        });
        return response()->json([
            'nombre' => $equipo->nombre,
            'imagen_url' => $equipo->imagen_url,
            'partidos' =>$modifiedResponse,
        ]);
    }

    public function actualizarPartidoResultado(Request $request)
    {
        {
            // Validar los datos recibidos
            $request->validate([
                'partido_id' => 'required|exists:partidos,id',
                'estado' => 'required|integer',
            ]);

            // Actualizar el estado del partido
            $partido = Partido::find($request->partido_id);
            $partido->estado = $request->estado;
            $partido->save();

            // Verificar si vienen los campos adicionales para crear el resultado
            if ($request->has(['equipo_ganador_id', 'puntos_local', 'puntos_visitante'])) {
                $request->validate([
                    'equipo_ganador_id' => 'required|exists:equipos,id',
                    'puntos_local' => 'required|integer',
                    'puntos_visitante' => 'required|integer',
                ]);

                // Crear un nuevo registro en la tabla resultados
                Resultado::create([
                    'partido_id' => $request->partido_id,
                    'equipo_ganador_id' => $request->equipo_ganador_id,
                    'puntos_local' => $request->puntos_local,
                    'puntos_visitante' => $request->puntos_visitante,
                ]);

                // Añadir 3 puntos al equipo ganador
                $equipoCampeonato = EquiposCampeonatos::where('equipo_id', $request->equipo_ganador_id)
                    ->where('campeonato_id', $partido->campeonato_id)
                    ->first();

                if ($equipoCampeonato) {
                    $equipoCampeonato->puntos += 3;
                    $equipoCampeonato->save();
                }
            }

            return response()->json(['message' => 'Operación realizada exitosamente'], 200);
        }
}}
