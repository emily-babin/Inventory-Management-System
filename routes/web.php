<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $items = \App\Models\Item::all()->sortBy('title');
    return view('items.index')->with('items', $items);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::resource('items', App\Http\Controllers\ItemController::class);
Route::get('/items/delete/{id}', [App\Http\Controllers\ItemController::class, 'confirmDelete']) -> name('items.confirmDelete');

Route::patch('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
Route::patch('/items/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
