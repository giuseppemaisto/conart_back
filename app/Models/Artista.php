<?php

// app/Models/Artista.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $fillable = [
        'nome',
        'cognome',
        'data_nascita',
        'descrizione',
    ];

    public function quadros()
    {
        return $this->hasMany(Quadro::class);
    }
}
