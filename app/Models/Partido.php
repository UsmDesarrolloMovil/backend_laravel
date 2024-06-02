<?php

// app/Models/Partido.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Partido extends Model
{
    protected $fillable = [
        'campeonato_id',
        'equipo_local_id',
        'equipo_visitante_id',
        'fecha',
        'hora', // Agregar el nuevo campo 'hora' al modelo
        'lugar',
        'estado',
    ];

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }

    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }

    public function resultado()
    {
        return $this->hasOne(Resultado::class);
    }
}
