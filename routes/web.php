<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DagjeuitController;
use App\Http\Controllers\CategorieController;



Route::get('/', [DagjeuitController::class, 'frontpage']);

Route::post('/register', [UserController::class, 'register']);


Route::get('/pretpark', [CategorieController::class, 'showPretpark'])->name('pretpark');
Route::get('/pretpark/{id}', [CategorieController::class, 'Pretparkshow'])->name('pretpark.show');

Route::get('/dierentuin', [CategorieController::class, 'showDierentuin'])->name('dierentuin');
Route::get('/dierentuin/{id}', [CategorieController::class, 'Dierentuinshow'])->name('dierentuin.show');


Route::get('/dashboard', [DagjeuitController::class, 'create'])->name('dashboard');
Route::post('/dagjeuit/store', [DagjeuitController::class, 'store'])->name('dagjeuit.store');