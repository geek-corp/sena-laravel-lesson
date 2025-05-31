<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipos extends Model
{
    use softDeletes;
    protected $primaryKey= "id_equipo";
    protected $fillable = [
        "id_equipo",
        "nombre",
        "id_lider"
    ];
    public function lider() {
        return $this->belongsTo(jugadores::class, 'id_jugador');
    }

    public function torneos() {
        return $this->belongsToMany(Torneos::class,"equipo_torneo", "id_equipo", 'id_torneo');
    }

    function jugadores(){
        return $this->belongsToMany(Jugadores::class,"equipo_jugador", "id_equipo","id_jugador");
    }

}

