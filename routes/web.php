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
Route::get('/',[\App\Http\Controllers\PagesController::class,'home'])->name('index');

//Route::view('/saludo',[\App\Http\Controllers\PagesController::class,'saludo'])->name('saludo');

//Route::view('/contacto',[\App\Http\Controllers\PagesController::class,'contacto'])->name('contacto');


//Refactorización de rest y ejecuta las rutas
Route::resource('mensaje','\App\Http\Controllers\MessagesController');

//Ruta de proceso de formulario
//Route::post('contacto',[\App\Http\Controllers\PagesController::class,'mensaje'])->name('mensaje');

//Ruta para mostrar listado
//Route::get('saludo',[\App\Http\Controllers\MessagesController::class,'index'])->name('mensaje.index');

//Ruta para formulario de de creacion
//Route::get('saludo/create',[\App\Http\Controllers\MessagesController::class,'create'])->name('mensaje.create');

//Ruta para guardar formulario y redireccionar.
//Route::post('saludo',[\App\Http\Controllers\MessagesController::class,'store'])->name('mensaje.store');

//Ruta para ingresar a cada id.
//Route::get('saludo/{id}',[\App\Http\Controllers\MessagesController::class,'show'])->name('mensaje.show');

//Ruta para editar un id
//Route::get('saludo/{id}/edit',[\App\Http\Controllers\MessagesController::class,'edit'])->name('mensaje.edit');

//Ruta para actualizar el id.
//Route::put('saludo/{id}',[\App\Http\Controllers\MessagesController::class,'update'])->name('mensaje.update');

//Ruta para eliminar registro.
//Route::delete('saludo/{id}',[\App\Http\Controllers\MessagesController::class,'destroy'])->name('mensaje.destroy');

Auth::routes();

//Para implementar el boton cierre de sesión en nav.
Route::get('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

//Ruta para al cerrar sesión volver al home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta para mostrar usuarios
//Route::get('usuarios',[\App\Http\Controllers\UsersController::class,'index'])->name('usuarios.index');

Route::resource('usuarios','\App\Http\Controllers\UsersController');

//Ruta para ver el tipo de rol.
Route::get('roles', function (){
    return \App\Models\Role::with('user')->get();
});

