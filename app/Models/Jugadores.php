<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugadores extends Model
{
    protected $primaryKey = "id_jugador";
    protected $fillable = [
        "id_jugador",
        "nombre",
        "nikename",
        "correo",
        "pais"
    ];
    public function equipos() {
        return $this->belongsToMany(Equipos::class,"equipo_jugador", "id_equipo");
    }
}
