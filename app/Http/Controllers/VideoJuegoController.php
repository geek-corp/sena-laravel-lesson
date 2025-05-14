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
}
