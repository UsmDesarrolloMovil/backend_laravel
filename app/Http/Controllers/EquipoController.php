<?php

// app/Http/Controllers/EquipoController.php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Campeonato;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return response()->json($equipos);
    }

    public function show($id)
    {
        $equipo = Equipo::with('jugadores')->findOrFail($id);
        return response()->json($equipo);
    }

    public function store(Request $request)
    {
        $equipo = Equipo::create($request->all());
        return response()->json($equipo, 201);
    }

    public function update(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->update($request->all());
        return response()->json($equipo, 200);
    }

    public function destroy($id)
    {
        Equipo::destroy($id);
        return response()->json(null, 204);
    }
    public function list($id=null){
        
        {
            return $id 
                ? Equipo::where('id', $id)->orderBy('id')->first()
                : Equipo::orderBy('id')->get();
        }
        
    }

    public function equiposNoEnCampeonato($campeonato_id)
    {
        $equiposEnCampeonato = Campeonato::find($campeonato_id)->equipos->pluck('id');

        $equiposNoEnCampeonato = Equipo::whereNotIn('id', $equiposEnCampeonato)->get();

        return response()->json($equiposNoEnCampeonato);
    }
    
}
