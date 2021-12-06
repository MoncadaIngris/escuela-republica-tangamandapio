<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ProfesorGradoController;

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

Route::get('/', function () {
    return view('welcome');
});

//RUTAS ALUMNO

Route::get('alumno',[AlumnoController::class, 'index'])->name('alumno.index');

Route::get('alumno/nuevo',[AlumnoController::class, 'create'])->name('alumno.nuevo');

Route::post('alumno/nuevo',[AlumnoController::class, 'store']);

Route::get('alumno/{id}',[AlumnoController::class, 'show'])->name('alumno.ver')-> where('id' ,'[0-9]+');

Route::get('alumno/editar/{id}',[AlumnoController::class, 'edit'])->name('alumno.edit')-> where('id' ,'[0-9]+');

Route::put('alumno/editar/{id}',[AlumnoController::class, 'update'])-> where('id' ,'[0-9]+');

Route::delete('alumno/borrar/{id}',[AlumnoController::class, 'destroy'])->name('alumno.borrar')-> where('id' ,'[0-9]+');

//RUTAS PROFESOR

Route::get('profesor',[ProfesorController::class, 'index'])->name('profesor.index');

Route::get('profesor/nuevo',[ProfesorController::class, 'create'])->name('profesor.nuevo');

Route::post('profesor/nuevo',[ProfesorController::class, 'store']);

Route::get('profesor/{id}',[ProfesorController::class, 'show'])->name('profesor.ver')-> where('id' ,'[0-9]+');

Route::get('profesor/editar/{id}',[ProfesorController::class, 'edit'])->name('profesor.edit')-> where('id' ,'[0-9]+');

Route::put('profesor/editar/{id}',[ProfesorController::class, 'update'])-> where('id' ,'[0-9]+');

Route::delete('profesor/borrar/{id}',[ProfesorController::class, 'destroy'])->name('profesor.borrar')-> where('id' ,'[0-9]+');

//RUTAS GRADO

Route::get('grado',[GradoController::class, 'index'])->name('grado.index');

Route::get('grado/nuevo',[GradoController::class, 'create'])->name('grado.nuevo');

Route::post('grado/nuevo',[GradoController::class, 'store']);

Route::get('grado/{id}',[GradoController::class, 'show'])->name('grado.ver')-> where('id' ,'[0-9]+');

Route::get('grado/editar/{id}',[GradoController::class, 'edit'])->name('grado.edit')-> where('id' ,'[0-9]+');

Route::put('grado/editar/{id}',[GradoController::class, 'update'])-> where('id' ,'[0-9]+');

Route::delete('grado/borrar/{id}',[GradoController::class, 'destroy'])->name('grado.borrar')-> where('id' ,'[0-9]+');

//RUTAS ALTERNAS
Route::get('grado/profesor/{id}',[ProfesorGradoController::class, 'profesor'])->name('grado.profesor')-> where('id' ,'[0-9]+');

Route::get('profesor/grado/{id}',[ProfesorGradoController::class, 'grado'])->name('profesor.grado')-> where('id' ,'[0-9]+');