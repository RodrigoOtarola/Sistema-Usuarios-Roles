<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rutas de entradas para la aplicacion.

//Para llamar vistas desde el controlador PagesController
Route::view('/',[\App\Http\Controllers\PagesController::class,'home'])->name('home');

Route::view('/saludo',[\App\Http\Controllers\PagesController::class,'saludo'])->name('saludo');

Route::view('/contacto',[\App\Http\Controllers\PagesController::class,'contacto'])->name('contacto');

//Ruta de proceso de formulario
Route::post('contacto',[\App\Http\Controllers\PagesController::class,'mensaje'])->name('mensaje');

//Ruta para mensaje
Route::get('saludo/create',[\App\Http\Controllers\MessagesController::class,'create'])->name('saludo.create');
