<?php

use App\Http\Controllers\TorneoController;
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


////

Route::get('/students', function (){
    return 'obteniendo lista de estudiantes';
});

Route::get('/students', function (){
    return 'obteniendo un estudiante ';
});

Route:: post('/students/{id}', function () {
    return 'Creando estudiantes' ;
});

    Route:: put('/students/{id}', function () {
    return 'Actualizando estudiante';
});

    Route:: delete('/students/{id}', function () {
    return 'Eliminando estudiante';
});
