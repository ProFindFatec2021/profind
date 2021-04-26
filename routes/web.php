<?php

use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\AnuncioUsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::name('usuario.create.')->group(function () {
    Route::get('/cadastro-cliente', [UsuarioController::class, 'create'])->name('cliente');
    Route::get('/cadastro-profissional', [UsuarioController::class, 'create'])->name('profissional');
});

Route::name('store.')->group(function () {
    Route::post('/cadastro-cliente', [UsuarioController::class, 'store'])->name('cliente');
    Route::post('/cadastro-profissional', [UsuarioController::class, 'store'])->name('profissional');
});

Route::prefix('conta')->middleware('usuario')->group(function () {

    Route::name('usuario.')->group(function () {
        Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('perfil');

        Route::prefix('perfil')->name('perfil.')->group(function () {
            Route::get('/editar', [UsuarioController::class, 'edit'])->name('edit');
            Route::put('/editar', [UsuarioController::class, 'update'])->name('update');
            Route::delete('/deletar', [UsuarioController::class, 'destroy'])->name('destroy');


            Route::prefix('anuncios')->name('anuncio.')->middleware('usuario.profissional')->group(function () {
                Route::get('/', [AnuncioUsuarioController::class, 'index'])->name('index');
                Route::get('/criar', [AnuncioUsuarioController::class, 'create'])->name('create');
                Route::post('/criar', [AnuncioUsuarioController::class, 'store'])->name('store');
                Route::get('/anuncio/{id}', [AnuncioUsuarioController::class, 'show'])->name('show');
                Route::get('/anuncio/{id}/editar', [AnuncioUsuarioController::class, 'edit'])->name('edit');
                Route::put('/anuncio/{id}/editar', [AnuncioUsuarioController::class, 'update'])->name('update');
                Route::delete('/anuncio/{id}/deletar', [AnuncioUsuarioController::class, 'destroy'])->name('destroy');
            });
        });
    });
});

Route::prefix('anuncios')->name('anuncio.')->group(function () {
    Route::get('/', [AnuncioController::class, 'index'])->name('index');
    Route::get('/anuncio/{id}', [AnuncioController::class, 'show'])->name('show');
});

Route::prefix('usuarios')->name('usuario.')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('index');
    Route::get('/usuario/{id}', [UsuarioController::class, 'show'])->name('show');
    Route::get('/usuario/{id}/anuncios/', [UsuarioController::class, 'indexAnuncios'])->name('anuncio');
});
