<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::name('usuario.')->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('index');
    Route::get('/cadastro', [UsuarioController::class, 'create'])->name('create');
    Route::post('/cadastro', [UsuarioController::class, 'store'])->name('store');
});
