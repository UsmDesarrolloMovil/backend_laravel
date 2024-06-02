<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'juegos',
        'imagen_url',
    ];

    public function campeonatos()
    {
        return $this->belongsToMany(Campeonato::class, 'equipos_campeonatos')->withPivot('puntos')->withTimestamps();
    }
}
