<?php

// app/Models/Regla.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regla extends Model
{
    use HasFactory;

    protected $fillable = [
        'campeonato_id',
        'descripcion'
    ];

    public function campeonato()
    {
        return $this->belongsTo(Campeonato::class);
    }
}
