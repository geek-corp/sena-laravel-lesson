<?php

namespace App\Http\Controllers;

use App\Models\VideoJuego;
use Illuminate\Http\Request;

class VideoJuegoController extends Controller
{
    public function getAll() {
        return response()->json([
            "videojuegos" => VideoJuego::all(),
            "message" => "Videojuegos obtenido con exito"
        ]);
    }

    public function create(Request $request) {
        VideoJuego::create([
            "nombre" => $request->nombre,
            "tipo" => $request->tipo,
        ]);
        return response()->json([
            "message" => "Guardado exitoso"
        ]);
    }
}
