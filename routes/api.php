<?php

use App\Http\Controllers\TorneoController;
use App\Http\Controllers\VideoJuegoController;
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
Route::get("tournament/{torneo}", [TorneoController::class, "show"]);

Route::get("/tournament", [TorneoController::class, 'getAll']);

Route::get('/videojuegos', [VideoJuegoController::class, 'getAll']);

Route::put("/update-tournament/{torneoId}", [TorneoController::class, 'update']);

Route::delete("/remove-tournament/{torneoId}", [TorneoController::class, "remove"]);


Route::post("/create-Videojuego", [VideoJuegoController::class, 'create']);

Route::put("/update-videojuego/{videojuegoId}", [VideoJuegoController::class, 'update']);
Route::delete("/remove-videojuego/{videojuegoId}", [VideoJuegoController::class, "remove"]);