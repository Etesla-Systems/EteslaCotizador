<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TarifaController;

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
    return view('cotizador.layout.dashboard');
});

/*
 * Rutas Clientes
 */
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');

Route::get('/clientes/nuevo', function (){
    return view('catalogos.editarcliente');
})->name('nuevocliente');

Route::post('/personas/guardar', [PersonasController::class, 'guardar'])->name('guardarpersona');

Route::get('/clientes/editar/{idPersona}', [PersonasController::class, 'editar']);

/*
 * Rutas Oficina
 */
Route::get('/oficinas', [OficinaController::class, 'index']);

Route::post('/oficinas/guardar', [OficinaController::class, 'guardar'])->name('guardaroficina');

/*
 * Rutas Rol
 */
Route::get('/roles', [RolController::class, 'index']);

Route::post('/roles/guardar', [RolController::class, 'guardar'])->name('guardarrol');

/*
 * Rutas Tarifas
 */
Route::get('/tarifas', [TarifaController::class, 'index']);

Route::get('/tarifas/nuevo', [TarifaController::class, 'nuevo'])->name('nuevatarifa');

Route::post('/tarifas/guardar', [TarifaController::class, 'guardar'])->name('guardartarifa');

/*
 * Rutas Procesos
 */
Route::get('/bajatension', function () {
    return view('cotizador.pages.vendedor.bajatension');
});

Route::get('/individual', function () {
    return view('cotizador.pages.vendedor.individual');
});


