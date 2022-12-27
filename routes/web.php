<?php

use App\Http\Controllers\{
    LojaController,
    RoupasController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function(){

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
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
});

require __DIR__.'/auth.php';
