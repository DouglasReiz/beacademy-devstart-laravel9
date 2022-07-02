<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ViaCepController
};

Route::delete('/users/{id}',[UserController::class, 'destroy'])->name('users.delete');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit',[UserController::class, 'edit'])->name('users.edit');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users',[UserController::class, 'store'])->name('users.store');
Route::get('/users', [UserController::class,'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');


//VIA CEP WEB SERVICE
Route::get('/viacep',[ViaCepController::class, 'index'])->name('viaCep.index');
Route::post('/viacep',[ViaCepController::class, 'index'])->name('viaCep.index.post');
Route::get('/viacep/{cep}',[ViaCepController::class, 'show'])->name('viacep.show');