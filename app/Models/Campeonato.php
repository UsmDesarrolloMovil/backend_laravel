<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'premios',
        'detalles',
    ];

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'equipos_campeonatos')->withPivot('puntos')->withTimestamps();
    }
}
