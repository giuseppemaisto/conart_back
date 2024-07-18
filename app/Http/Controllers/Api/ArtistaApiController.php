<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artista;
use Illuminate\Http\Request;

class ArtistaApiController extends Controller
{
    public function index()
    {
        $artisti = Artista::all(['nome', 'cognome']);
        return response()->json($artisti);
    }
}
