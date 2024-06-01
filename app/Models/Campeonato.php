<?php

// app/Models/Campeonato.php

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
        'detalles'
    ];

    public function partidos()
    {
        return $this->hasMany(Partido::class);
    }

    public function reglas()
    {
        return $this->hasMany(Regla::class);
    }
}
