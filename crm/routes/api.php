<?php

use App\Http\Controllers\CadastroClienteController;
use App\Http\Controllers\CadastroOficinaController;
use App\Http\Controllers\UserController;
use App\Models\cadastro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::get('listausuario',[CadastroOficinaController::class, 'getDefault']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

