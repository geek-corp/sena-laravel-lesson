<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoJuego extends Model
{
    protected $primaryKey = "id_videojuego";
    protected $fillable = [
        "id_videojuego",
        "nombre",
        "id_tipo_videojuego"
    ];

    public function modalidad() {
        return $this->belongsToMany(Modalidad::class,  "modalidad_videojuego", "id_videojuego", "id_modalidad");
    }

    public function tipo(){
        return $this->belongsTo(TipoVideojuego::class,"id_tipo_videojuego");
    }
}
