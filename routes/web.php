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

Route::middleware(['auth'])->group(function () {
    Route::resource('estados', EstadoController::class)->only(['index', 'edit', 'update']);
    Route::resource('municipios', MunicipioController::class)->except(['index', 'show']);
    Route::resource('empresas', EmpresaController::class);
    Route::resource('nras', EmpresaController::class);
    Route::resource('sectores', SectorController::class);
    Route::resource('subsectores', SubsectorController::class)->except(['show']);
    Route::resource('sustancias', SustanciaController::class)->except(['show']);
    Route::post('sustancias/{sustancia}/uploadPdf', [SustanciaController::class, 'uploadPdf'])->name('sustancias.uploadPdf');
    Route::get('sustancias/{sustancia}/downloadPdf', [SustanciaController::class, 'downloadPdf'])->name('sustancias.downloadPdf');
    Route::resource('evaluadores', EvaluadorController::class);
    Route::resource('evaluaciones', EvaluacionController::class);
    Route::get('empresas/{idEmpresa}/evaluacion', [EvaluacionController::class, 'evaluacionEmpresas'])->name('evaluacionEmpresas');
    Route::resource('matriza', MatrizAmbientalController::class);
    Route::get('evaluaciones/{idEvaluacion}/matriz', [MatrizAmbientalController::class, 'matrizEvaluacion'])->name('matrizEvaluacion');
    Route::resource('instituciones', InstitucionController::class);
    Route::resource('clasificaciones', ClasificacionController::class);
    Route::resource('user', UserController::class);
});


Route::get('/nosotros', function(){return view('nosotros');})->name('nosotros');
//Route::get('/recursos', function(){return view('recursos');})->name('recursos');

Route::get('/', [SectorController::class, 'escenariosExpocicion'])->name('escenarioexposicion');
Route::get('/api/getPuntos', [SectorController::class, 'getPuntos']);

// Estas rutas son para mostrar los puntos de ubicacion de los sectores, subsectores y sustancias en la vista de escenario de exposición
Route::resource('subsectores', SubsectorController::class)->only(['show']);
Route::resource('sustancias', SustanciaController::class)->only(['show']);
Route::get('municipo/{idMunicipio}/empresas', [MunicipioController::class, 'municipoEmpresas'])->name('municipoEmpresas');



Route::get('/home', function () {
    return view('home');
})->name('home');

require __DIR__.'/auth.php';
