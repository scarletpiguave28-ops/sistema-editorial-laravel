<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\EditorialController;

Route::resource('autores', AutorController::class);
Route::resource('libros', LibroController::class);
Route::resource('editoriales', EditorialController::class);
Route::get('/', function () {
    return view('welcome');
});
