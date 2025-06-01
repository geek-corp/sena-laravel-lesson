<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $fillable = [
        "nombre", 
        "videojuego_id",
        "premio",
        "limite_equipos",
        "modalidad"
    ];

    public function videojuego(){
        return $this->belongsTo(VideoJuego::class, "videojuego_id");
    }

    public function equipos() {
        return $this->belongsToMany(Equipo::class, 'equipo_torneo', 'torneo_id', 'equipo_id');
    }
}
