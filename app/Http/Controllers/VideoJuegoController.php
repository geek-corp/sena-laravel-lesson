<?php

namespace App\Http\Controllers;

use App\Models\VideoJuego;
use Illuminate\Http\Request;

class VideoJuegoController extends Controller
{
    public function getAll() {
        return response()->json([
            "data" => VideoJuego::all(),
            "message" => "Videojuegos obtenido con exito"
        ]);
    }
    public function create(Request $request) {
        Videojuego::create([
            "nombre" => $request->nombre,
            "tipo" => $request->tipo,
            
        ]);
        return response()->json([
            "message" => "Torneo Guardado Exitosamente!"
        ], 201);
    }
    
    public function update(Request $request, $videojuegoId){
        $videojuego = videojuego::find($videojuegoId);
        if (!$videojuego) {
          return response()->json([
            "message"=> "No se encontro el torneo que deseas actualizar"
            ], 500);
        }

        $videojuego->nombre = $request->nombre;
        $videojuego->tipo = $request->tipo;
        $videojuego->save();
        return response()->json([
            "message"=> "Actualziación Exitosa", 
        ]);

    }
      public function remove(Request $request, $videojuegoId){
        $videojuego = Videojuego::find($videojuegoId);
        if (!$videojuego) {
            return response()->json([
                "message"=> "No se encontró el torneo"
            ],404);
        }
        $videojuego->delete();
        return response()->json([
            "message"=> "Eliminación exitosa"
        ],200);
    }
}
