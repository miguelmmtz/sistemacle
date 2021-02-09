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

Auth::routes();

//home para coordinacion
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

//login para alumnos
Route::get('alumno/login','AlumnoController@showLoginForm');
Route::post('alumno/login','AlumnoController@login');

//login para docentes
Route::get('docente/login','DocenteController@showLoginForm');
Route::post('docente/login','DocenteController@login');

//rutas para los CRUD coordinacion
Route::resource('administrativos', 'AdministrativoController');
Route::resource('docentes','DocenteController');
Route::resource('grupos','GrupoController');
Route::resource('alumnos','AlumnoController');

//rutas para el alumno
Route::get('alumno', [\App\Http\Controllers\AlumnoController::class, 'hola']);

//rutas para el docente
Route::get('docente', [\App\Http\Controllers\DocenteController::class, 'hola']);
