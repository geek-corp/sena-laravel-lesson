<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVideojuego extends Model
{
    protected $primaryKey = "id_tipo_videojuego";
    protected $fillable = [
        "id_tipo_videojuego",
        "tipo_videojuego",
    ];
    public function videojuego() {
        return $this->hasMany(Videojuego::class, "id_tipo_videojuego");
    }
}
