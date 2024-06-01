<?php

// app/Models/Resultado.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = [
        'partido_id',
        'equipo_ganador_id',
        'puntos_local',
        'puntos_visitante'
    ];

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }

    public function equipoGanador()
    {
        return $this->belongsTo(Equipo::class, 'equipo_ganador_id');
    }
}
