<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $primaryKey='id_modalidad';

    protected $fillable = [
        "id_modalidad",
        "nombre",
    ];

public function videojuegos() {
    return $this->belongToMany(Videojuego::class, "modalidad_videojuego", "id_videojuego");
}

}
