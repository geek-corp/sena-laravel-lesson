<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;
use App\Models\Torneos;
class TorneosController extends Controller
{
    public function create(Request $request) {
        Torneos::create([
            "nombre" => $request->nombre,
            "premio" => $request->premio,
            "limite_equipos" => $request->limite_equipos,
            "modalidad" => $request->modalidad,
        ]);
        return response()->json([
            "message" => "Torneo Guardado Exitosamente!"
        ], 201);
    }

    public function createWithGame(Request $request, $idVideoJuego){
        $videojuego = Videojuego::find($idVideoJuego);
        $torneo = new Torneos();
        $torneo->nombre = $request->nombre;
        $torneo->premio = $request->premio;
        $torneo->limite_equipos = $request->limite_equipos;
        $torneo->modalidad = $request->modalidad;
        $torneo->videojuego()->associate($videojuego);
        $torneo->save();
        return response()->json([
            "message"=> "Torneo creado con video juego exitosamente"
            ],201);

    }

    public function getAll() {
        return response()->json([
            "data" => Torneos::with('videojuego')->get(),
            "message" => "Lista de torneos obtenida exitosamente"
        ]);
    }

    public function show(Torneos $torneo) {
        return response()->json([
            "data" => $torneo->load('videojuego'),
            "message" => "Torneo obtenido exitosamente"
        ]);
    }

    public function update(Request $request, $torneoId){
        $torneo = Torneos::find($torneoId);
        if (!$torneo) {
          return response()->json([
            "message"=> "No se encontro el toreno que deseas actualizar"
            ], 500);
        }

        $torneo->nombre = $request->nombre;
        $torneo->limite_equipos = $request->limite_equipos;
        $torneo->modalidad = $request->modalidad;
        $torneo->videojuego_id = $request->videojuego_id;
        $torneo->save();
        return response()->json([
            "message"=> "Actualziación Exitosa", 
        ]);

    }

    public function remove(Request $request, $torneoId){
        $torneo = Torneos::find($torneoId);
        if (!$torneo) {
            return response()->json([
                "message"=> "No se encontró el torneo"
            ],404);
        }
        $torneo->delete();
        return response()->json([
            "message"=> "Eliminación exitosa"
        ],200);
    }

}

