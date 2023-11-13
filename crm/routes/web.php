<?php

use App\Http\Controllers\CadastroOficinaController;
use App\Http\Controllers\CadastroUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/',[UserController::class,'index'])->name('home.login');
//rota para enviar dados
Route::get('/login',[UserController::class,'index']);
Route::post('/login',[UserController::class,'login'])->name('login');

Route::get('/cadastrousuario',[CadastroUserController::class,'index'])->name('cadastrouser.cadastrousuario');
Route::post('/create',[CadastroUserController::class,'create'])->name('user.create');





Route::middleware(['auth'])->group(function () {
   
    // Route::post('/create',[CadastroUserController::class,'create'])->name('user.create');
    
    Route::post('/logout',[UserController::class, 'logout'])->name('auth.logout');
   
    // Route::get('/cadastrousuario',[CadastroUserController::class,'index'])->name('cadastrouser.cadastrousuario');
    Route::get('/listausuarios',[UserController::class,'telauser']);
    

    // para o cadastro de cliente
    Route::get('/cadastro', [CadastroOficinaController::class,'create'])->name('cadastro.create');
    Route::post('/store', [CadastroOficinaController::class,'store'])->name('cadastro.store');
    Route::get('/listausuarios',[CadastroOficinaController::class,'dashboard'])->name('lista.usuarios');
    Route::get('/edicaocadastro/{id}',[CadastroOficinaController::class,'edit'])->name('edicao.cadastro');
    Route::post('/update/{id}',[CadastroOficinaController::class,'update'])->name('edicao.update');
    Route::any('/post/search',[CadastroOficinaController::class,'search'])->name('post.search');
    Route::get('/export-csv',[CadastroOficinaController::class,'exportCSV'])->name('export.csv');



    // Route::get('GET','/edicaocadastro/{id}',[CadastroOficinaController::class,'edit']);



    
  
    
});
