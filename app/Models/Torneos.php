<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneos extends Model
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
}
