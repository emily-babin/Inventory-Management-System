<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $categories = \App\Models\Category::all()->sortBy('category');
    return view('categories.index')->with('categories', $categories);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::get('/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'confirmDelete']) -> name('categories.confirmDelete');