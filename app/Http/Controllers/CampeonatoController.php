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

   

    public function list($id=null){
        return $id?Campeonato::find($id):Campeonato::all();
    }
    public function destroy($id)
    {
        $campeonato=Campeonato::find($id);
        $result=$campeonato->delete();
        return $result?["Result"=> "DATA HAS BEENn SAVED"]:["Result"=>"Opertaion failed"];
    
    }
}
