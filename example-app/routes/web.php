<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controlador;  // se importa el controlar 
use App\Http\Controllers\userController;
use App\Http\Controllers\taskController;


Route::get('/', function () {
    return view('welcome');
});


// se crea la ruta "/ejemplo"
// en el array se asocia el controlador y el metodo
Route::get('/ejemplo', [controlador::class, "metodo"]);

//ejemplo de ruta con parámetros
Route::get('/usuario/{userId}', [userController::class, "showUser"]);

//controlador crud
Route::resource('tasks', taskController::class);