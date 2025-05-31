<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use App\Models\VideoJuego;
use Illuminate\Http\Request;

class ModalidadController extends Controller
{
    public function create(Request $request){
        Modalidad::create([
            "id_modalidad" => $request->id_modalidad,
            "nombre" => $request->nombre
        ]);

        return response()->json([
            "message" => "Registro exitoso"
        ],201);
    }

    public function getAll(Modalidad $request){
        return response()->json([
            "data" => $request->get(),
            "message" => "Consulta exitosa"
        ],200);
    }

    public function update(Request $request, Modalidad $modalidad){
        $modalidad->update([
            "nombre" => $request->nombre
        ]);

        return response()->json([
            "message" => "Actualizado exitosamente"
        ],200);
    }

    public function destroy( Modalidad $modalidad) {
        $modalidad->delete();

        return response()->json([
            "message" => "Modalidad eliminada Exitosamente!"
        ], 200);
    }

}
