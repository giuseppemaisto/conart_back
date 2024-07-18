<?php

// app/Models/Quadro.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quadro extends Model
{
    protected $fillable = [
        'titolo',
        'anno',
        'genere',
        'artista_id',
    ];

    public function artista()
    {
        return $this->belongsTo(Artista::class);
    }
}
