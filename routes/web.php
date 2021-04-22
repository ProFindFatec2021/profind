<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::name('usuario.')->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('index');

    Route::name('create.')->group(function () {
        Route::get('/cadastro-cliente', [UsuarioController::class, 'create'])->name('cliente');
        Route::get('/cadastro-profissional', [UsuarioController::class, 'create'])->name('profissional');
    });
    Route::name('store.')->group(function () {
        Route::post('/cadastro-cliente', [UsuarioController::class, 'store'])->name('cliente');
        Route::post('/cadastro-profissional', [UsuarioController::class, 'store'])->name('profissional');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/perfil', [UsuarioController::class, 'show'])->name('show');
        Route::get('/perfil/editar', [UsuarioController::class, 'edit'])->name('edit');
        Route::put('/perfil/editar', [UsuarioController::class, 'update'])->name('update');
    });
});
