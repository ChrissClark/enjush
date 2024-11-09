<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\SustanciaController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [PuntoController::class, 'index']);
Route::get('/nosotros', function(){return view('nosotros');})->name('nosotros');
Route::get('/escenarioexposicion', function(){return view('escenarioexposicion');})->name('escenarioexposicion');
Route::get('/perfil', function(){return view('perfil');})->name('perfil');
Route::get('/recursos', function(){return view('recursos');})->name('recursos');
Route::resource('user', UserController::class);
Route::resource('sustancia', SustanciaController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
