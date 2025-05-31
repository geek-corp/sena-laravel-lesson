<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Torneo;
use Illuminate\Http\Request;

class EquiposController extends Controller
{
    public function create(Request $request) {
        $equipo= new Equipos();
        $equipo->nombre = $request->nombre;
        $equipo->id_lider = $request->id_lider;
        $equipo->save();

        $equipo->torneos()->attach([$request->id_torneo]);
        $jugadores = $request->jugadores;
        $id_torneo = $request->id_torneo;

        $syncData = [];
        foreach ($jugadores as $id_jugador) {
            $syncData[$id_jugador] = ['id_torneo' => $id_torneo];
        }

        $equipo->jugadores()->sync($syncData);
        $equipo->save();
        return response()->json([
            "message" => "Equipo Guardado Exitosamente!"
        ], 201);
    }

    public  function getAll() {
        $equipo = Equipos::with('jugadores.nombre')->get();
        return response()->json([
            "data" => $equipo,
            "message" => "Consuta Equipos Exitosamente!"
        ],200);
    }

    public function update(Request $request, Equipos $equipo) {
        $equipo->nombre = $request->nombre;
        $equipo->id_lider = $request->id_lider;

        $jugadores = $request->jugadores;
        $id_torneo = $request->id_torneo;

        $syncData = [];
        foreach ($jugadores as $id_jugador) {
            $syncData[$id_jugador] = ['id_torneo' => $id_torneo];
        }

        $equipo->jugadores()->sync($syncData);
        $equipo->save();
        return response()->json([
            "message" => "Equipo Guardado Exitosamente!"
        ], 200);
    }

    public function destroy( Equipos $equipo) {
        $equipo->delete();
        return response()->json([
            "message" => "Equipo eliminado Exitosamente!"
        ], 200);
    }
}
