<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipo';
    protected $fillable = ['nombre'];


    public function torneos(){
        return $this->belongsToMany(Torneo::class, 'equipo_torneo', 'torneo_id', 'equipo_id');
    }
}
