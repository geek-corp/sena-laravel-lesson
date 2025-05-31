<?php

use App\Http\Controllers\TorneosController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\JugadoresController;
use App\Http\Controllers\ModalidadController;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\ResultadoTorneoController;
use App\Http\Controllers\TipoVideojuegoController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\Videojuegoscontroller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sena', function (Request $request) {
    $mensaje = "Hola Mundo";
    return response([
        "saludo" => $mensaje
    ]);
});

Route::post("/create-tournament", [TorneoController::class, 'create']);

Route::post("/create-tournament/{videojuego}", [TorneoController::class, 'createWithGame']);
Route::get("tournament/{torneo}", [TorneoController::class, "getAll"]);
Route::post("/equipos",[TorneoController::class,'create']);
Route::post("/crear-equipo", [EquiposController::class,"create"]);
Route::post("/crear-jugador", [JugadoresController::class,"create"]);
Route::get("/listar-equipo", [EquiposController::class,"getAll"]);
Route::put("/actulizar-equipo/{equipo}", [EquiposController::class,"update"]);
Route::delete("/eliminar-equipo/{equipo}", [EquiposController::class,"destroy"]);
Route::put("/actualizar-jugador/{jugador}", [JugadoresController::class,"update"]);
Route::get("/listar-jugadores", [JugadoresController::class,"getAll"]);
Route::delete("/eliminar-jugador/{jugador}",[JugadoresController::class,"destroy"]);
Route::post("/crear-modalidad",[ModalidadController::class,"create"]);
Route::get("/listar-modalidad",[ModalidadController::class,"getAll"]);
Route::put("/actualizar-modalidad/{modalidad}",[ModalidadController::class,"update"]);
Route::delete("/eliminar-modalidad/{modalidad}",[ModalidadController::class,"destroy"]);
Route::post("/crear-tipo", [TipoVideojuegoController::class,"create"]);
Route::get("/listar-tipo",[TipoVideojuegoController::class,"getAll"]);
Route::put("/actualizar-tipo/{videojuego}",[TipoVideojuegoController::class,"update"]);
Route::delete("/eliminar-tipo/{videojuego}",[TipoVideojuegoController::class,"destroy"]);
Route::post("/crear-juego", [VideoJuegosController::class,"create"]);
Route::put("/actualizar-videojuego/{videojuego}",[VideoJuegosController::class,"update"]);
Route::delete("/eliminar-videojuego/{videojuego}",[VideoJuegosController::class,"destroy"]);
Route::post("/crear-resultado",[ResultadoTorneoController::class,"create"]);
Route::get("/obtener-resultado/{resultado}",[ResultadoTorneoController::class,"getAll"]);
Route::delete("/eliminar-resultado/{resultado}",[ResultadoTorneoController::class,"destroy"]);