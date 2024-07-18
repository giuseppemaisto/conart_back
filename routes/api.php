<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ArtistaApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Aggiungi la tua rotta API qui
Route::get('/users', [UserController::class, 'index']);


// routes/api.php

Route::get('/artisti', [ArtistaController::class, 'index']);

Route::get('/artisti', [ArtistaApiController::class, 'index']);
