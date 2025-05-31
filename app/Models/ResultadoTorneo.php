<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultadoTorneo extends Model
{
    protected $primaryKey = "id_resultado";
    protected $fillable = [
        "id_resultado",
        "id_torneo",
        "fehca_fin",
        "id_equipo",
        "id_modalidad",
        "premio"
    ];

    public function torneo() {
        return $this->belongsTo(Torneos::class,"id_torneo");
    }
    public function equipo() {
        return $this->belongsTo(Equipos::class,"id_equipo");
    }
    public function modalidad( ){
        return $this->belongsTo(Modalidad::class,"id_modalidad");
    }
}
