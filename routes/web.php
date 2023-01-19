<?php

use App\Http\Controllers\{
    AlugarController,
    LojaController,
    RoupasController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function(){

    Route::get('/pagina-principal', [UserController::class, 'index'])->name('index');

    Route::get('/users', [UserController::class, 'indexUser'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/pesquisa', [UserController::class, 'pesquisa'])->name('users.pesquisa');


    Route::get('/loja', [LojaController::class, 'index'])->name('loja.index');
    Route::get('/loja/create', [LojaController::class, 'create'])->name('loja.create');
    Route::post('/loja', [LojaController::class, 'store'])->name('loja.store');
    Route::get('/loja/{id}', [LojaController::class, 'show'])->name('loja.show');
    Route::delete('/loja/{id}', [LojaController::class, 'delete'])->name('loja.delete');
    Route::get('/loja/edit/{id}', [LojaController::class, 'edit'])->name('loja.edit');
    Route::put('/loja/{id}', [LojaController::class, 'update'])->name('loja.update');


    Route::get('/loja{id}/roupa', [RoupasController::class, 'index'])->name('roupa.index');
    Route::get('/loja/{id}/roupa/create', [RoupasController::class, 'create'])->name('roupa.create');
    Route::post('/loja/{id}/roupa', [RoupasController::class, 'store'])->name('roupa.store');
    Route::get('/loja/{id}/roupa/{idRoupa}', [RoupasController::class, 'show'])->name('roupa.show');
    Route::delete('/loja/{id}/roupa/{idRoupa}', [RoupasController::class, 'delete'])->name('roupa.delete');
    Route::get('/loja/{id}/roupa/edit/{idRoupa}', [RoupasController::class, 'edit'])->name('roupa.edit');
    Route::put('/loja/{id}/roupa/{idRoupa}', [RoupasController::class, 'update'])->name('roupa.update');
    Route::get('/pesquisa/loja{id}', [RoupasController::class, 'pesquisa'])->name('pesquisa');

    Route::post('/loja/roupa/{idRoupa}/criar-aluguel', [AlugarController::class, 'store'])->name('aluguel.store');
    Route::get('/loja/{id}/roupa/{idRoupa}/aluguel', [AlugarController::class, 'show'])->name('aluguel.show');
    Route::delete('loja/{id}/roupa]{idRoupa}/aluguel/{idAluguel}', [AlugarController::class, 'delete'])->name('aluguel.delete');
    Route::get('deleteAutomatico', [AlugarController::class, 'deleteAutomatico']);
});

require __DIR__.'/auth.php';
