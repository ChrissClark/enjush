<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\NRAController;
use App\Http\Controllers\SubsectorController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\EvaluadorController;
use App\Http\Controllers\MatrizAmbientalController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\ClasificacionController;
use App\Http\Controllers\SustanciaController;
//use App\Http\Controllers\SustClasificacionesController;

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
Route::get('/nosotros', function(){return view('nosotros');})->name('nosotros');
Route::get('/escenarioexposicion', [SectorController::class, 'escenariosExpocicion'])->name('escenarioexposicion');
//Route::get('/perfil', function(){return view('perfil');})->name('perfil');
Route::get('/recursos', function(){return view('recursos');})->name('recursos');

Route::resource('user', UserController::class);

Route::resource('estados', EstadoController::class);
Route::resource('municipios', MunicipioController::class);
Route::resource('empresas', EmpresaController::class);
Route::resource('nras', EmpresaController::class);
Route::resource('sectores', SectorController::class);
Route::resource('subsectores', SubsectorController::class);
Route::resource('sustancias', SustanciaController::class);
Route::resource('evaluadores', EvaluadorController::class);
Route::resource('evaluaciones', EvaluacionController::class);
Route::get('empresas/{idEmpresa}/evaluacion', [EvaluacionController::class, 'evaluacionEmpresas'])->name('evaluacionEmpresas');
Route::resource('matriza', MatrizAmbientalController::class);
Route::get('evaluaciones/{idEvaluacion}/matriz', [MatrizAmbientalController::class, 'matrizEvaluacion'])->name('matrizEvaluacion');
Route::resource('instituciones', InstitucionController::class);
Route::resource('clasificaciones', ClasificacionController::class);

Route::get('/api/getPuntos', [SectorController::class, 'getPuntos']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
