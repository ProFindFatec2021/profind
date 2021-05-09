<?php

use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;

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

Route::prefix('dashboard')->name('dashboard.')->middleware('usuario')->group(function () {
    Route::name('profissional.')->middleware('usuario.profissional')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::prefix('anuncios')->name('anuncio.')->group(function () {
            Route::get('/', [AnuncioController::class, 'indexPerfil'])->name('index');
            Route::delete('/', [AnuncioController::class, 'destroy'])->name('destroy');
            Route::get('/criar', [AnuncioController::class, 'create'])->name('create');
            Route::post('/criar', [AnuncioController::class, 'store'])->name('store');
            Route::get('/anuncio/{id}', [AnuncioController::class, 'edit'])->name('edit');
            Route::put('/anuncio/{id}', [AnuncioController::class, 'update'])->name('update');
        });

        Route::prefix('pedidos')->name('pedido.')->group(function () {
            Route::get('/', [PedidoController::class, 'index'])->name('index');
            Route::put('/', [PedidoController::class, 'status'])->name('status');
            Route::get('/aceitar/{id}', [PedidoController::class, 'aceitar'])->name('aceitar');
            Route::get('/recusar/{id}', [PedidoController::class, 'recusar'])->name('recusar');
        });
    });

    Route::prefix('perfil')->name('perfil.')->group(function () {
        Route::get('/', [UsuarioController::class, 'perfil'])->name('perfil');
        Route::put('/', [UsuarioController::class, 'fotoPerfil'])->name('fotoPerfil');
        Route::get('/editar', [UsuarioController::class, 'edit'])->name('edit');
        Route::put('/editar', [UsuarioController::class, 'update'])->name('update');
        Route::delete('/deletar', [UsuarioController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('anuncios')->name('anuncio.')->group(function () {
    Route::get('/', [AnuncioController::class, 'index'])->name('index');
    Route::get('/anuncio/{id}', [AnuncioController::class, 'show'])->name('show');
    Route::get('/anuncio/{id}/pedido', [PedidoController::class, 'store'])->name('pedido.store')->middleware('usuario.cliente');
});

Route::prefix('usuarios')->name('usuario.')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('index');
    Route::get('/usuario/{id}', [UsuarioController::class, 'show'])->name('show');
    Route::get('/usuario/{id}/anuncios/', [UsuarioController::class, 'indexAnuncios'])->name('anuncio');
});
