<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;

Route::get('/', function(){return view('index');})->name('index');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::name('usuario.')->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('index');
    Route::name('create.')->group(function(){
        Route::get('/cadastro-cliente', [UsuarioController::class, 'create'])->name('cliente');
        Route::get('/cadastro-profissional', [UsuarioController::class, 'create'])->name('profissional');
    });
    Route::post('/cadastro', [UsuarioController::class, 'store'])->name('store');
    Route::get('/perfil', [UsuarioController::class, 'show'])->name('show')->middleware('auth');
});
