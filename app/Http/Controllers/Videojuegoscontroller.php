<?php

namespace App\Http\Controllers;

use App\Models\TipoVideojuego;
use App\Models\VideoJuego;
use Illuminate\Http\Request;

class Videojuegoscontroller extends Controller
{
    public function create(Request $request) {
        $game = new VideoJuego();
        $game->nombre = $request->nombre;
        $tipo = TipoVideojuego::find($request->id_tipo_videojuego);
        $game->tipo()->associate($tipo);
        $game->save();

        $game->modalidad()->attach([$request->id_modalidad]);
        $game->save();

        return response()->json([
            "message" => "Torneo Guardado Exitosamente!"
        ], 201);
    }

    public function getAll(VideoJuego $request) {
        return response()->json([
            "data" => $request->get(),
            "message" => "Consulta Realizada Exitosamente!"
        ], 201);
    }

    public function update(Request $request, VideoJuego $videoJuego) {
        $videoJuego->nombre = $request->nombre;
        $tipo = TipoVideojuego::find($request->id);
        $videoJuego->tipo()->associate($tipo);
        $videoJuego->save();

        $videoJuego->modalidad()->attach([$request->id]);
        $videoJuego->save();

        return response()->json([
            "message" => "Torneo Actualizado Exitosamente!"
        ],201);
    }

    public function destroy(VideoJuego $videoJuego){
        $videoJuego->delete();

        return response()->json([
            "message" => "Torneo Eliminado Exitosamente!"
        ],201);
    }




}
