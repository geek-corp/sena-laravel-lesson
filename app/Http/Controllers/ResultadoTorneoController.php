<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResultadoTorneo;
use App\Models\Torneos;
use App\Models\Equipos;
use App\Models\Modalidad;

class ResultadoTorneoController extends Controller
{
    public function create(Request $request) {
        $resultado = new ResultadoTorneo();

        $torneo = Torneos::find($request->id_torneo);
        $equipo = Equipos::find($request->id_equipo);
        $modalidad = Modalidad::find($request->id_modalidad);

        if (!$torneo || !$equipo || !$modalidad) {
            return response()->json(['message' => 'Torneo, equipo o modalidad no encontrados'], 404);
        }

        $resultado->torneo()->associate($torneo);
        $resultado->equipo()->associate($equipo);
        $resultado->modalidad()->associate($modalidad);
        $resultado->fecha_fin = $request->fecha_fin;
        $resultado->premio = $request->premio;
        $resultado->save();

        return response()->json([
            "message" => "Guardado exitosamente"
        ], 201);
    }

    public  function getAll() {
        $equipo = ResultadoTorneo::with('torneo','equipo', 'modalidad' )->get();
        return response()->json([
            "data" => $equipo,
            "message" => "Consuta Equipos Exitosamente!"
        ],200);
    }

    public function destroy( ResultadoTorneo $resultado) {
        $resultado->delete();

        return response()->json([
            "message" => "Resultado eliminado Exitosamente!"
        ], 200);
    }

}
