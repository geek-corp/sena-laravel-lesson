<?php

namespace App\Http\Controllers;

use App\Models\VideoJuego;
use Illuminate\Http\Request;
use App\Models\Torneo;
use App\Models\Torneos;

class TorneoController extends Controller
{
    public function create(Request $request) {
        $torneo=Torneos::create([
            "nombre" => $request->nombre,
            "premio" => $request->premio,
            "fecha_inicio" => $request->date_inicio,
            "fecha_fin" => $request->date_fin,
            "id_modalidad" => $request->id_modalidad,
            "limite_equipos" => $request->limite_equipos,

        ]);

        $torneo->videojuego()->associate($request->videojuego);
        $torneo->save();

        return response()->json([
            "message" => "Torneo Guardado Exitosamente!"
        ], 201);
    }

    public function update(Request $request, Torneos $torneo){
        $torneo->update([
            "nombre" => $request->nombre,
            "premio" => $request->premio,
            "fecha_inicio"=> $request->fecha_inicio,
            "fecha_fin"=> $request->fecha_fin,
            "limite_equipos" => $request->limite_equipos,
            "id_modalidad" => $request->id_modalidad,
        ]);

        return response()->json([
            "message" => "Actualizado exitosamente"
        ],200);
    }

    public function destroy( Torneos $torneo) {
        $torneo->delete();
        return response()->json([
            "message" => "Tipo de video juego eliminado Exitosamente!"
        ], 200);
    }

    public function index() {
        return response()->json([
            "data" => Torneos::with('videojuego')->get(),
            "message" => "Lista de torneos obtenida exitosamente"
        ]);
    }

    public  function getAll() {
        $equipo = Torneos::with('videojuego')->get();
        return response()->json([
            "data" => $equipo,
            "message" => "Consuta Equipos Exitosamente!"
        ],200);
    }

}
