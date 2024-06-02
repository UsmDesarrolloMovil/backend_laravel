<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquiposCampeonatos extends Model
{
    use HasFactory;

    protected $table = 'equipos_campeonatos';

    protected $fillable = [
        'campeonato_id',
        'equipo_id',
        'puntos',
    ];
    
    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
