<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\adminController;



Route::get('/', function () {
    return view('welcome');
});

Route::post('/admin', [AdminController::class, 'store'])->name('items.store');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin.dashboard');

Route::get('/items', [ItemController::class, 'index'])->name('items.index');

Route::get('/user/items', [ItemController::class, 'userPage'])->name('user.items');

Route::get('/items/{id}/edit', [AdminController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [AdminController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [AdminController::class, 'destroy'])->name('items.destroy');






