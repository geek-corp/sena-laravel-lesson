<?php

namespace App\Http\Controllers;

use App\Models\TipoVideojuego;
use Illuminate\Http\Request;

class TipoVideojuegoController extends Controller
{
    public function create(Request $request) {
        TipoVideojuego::create([
            "tipo_videojuego" =>  $request->input("tipo_videojuego"),
        ]);

        return response()->json([
            "message" => "Tipo de videjuego guardado exitosamente"
        ],201   );
    }

    public function getAll(TipoVideojuego $request) {
        return response()->json([
            "data" => $request->get(),
            "message" => "Consulta exitosa"
        ],200);
    }

    public function update(Request $request, TipoVideojuego $videojuego) {
        $videojuego->update([
            "tipo_videojuego" => $request->tipo_videojuego
        ]);

        return response()->json([
            "message" => "Actualizado exitosamente"
        ],200);
    }

    public function destroy( TipoVideojuego $videojuego) {
        $videojuego->delete();
        return response()->json([
            "message" => "Tipo de video juego eliminado Exitosamente!"
        ], 200);
    }
}

