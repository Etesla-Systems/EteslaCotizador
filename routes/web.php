<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OficinaController;

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
    return view('dashboard');
});

/*
 * Rutas Clientes
 */
Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/nuevo', function (){
    return view('catalogos.editarcliente');
})->name('nuevocliente');
Route::post('/personas/guardar', [PersonasController::class, 'guardar'])->name('guardarpersona');

/*
 * Rutas Oficina
 */
Route::get('/oficinas', [OficinaController::class, 'index']);
Route::post('/oficinas/guardar', [OficinaController::class, 'guardar'])->name('guardaroficina');

/*
 * Rutas Rol
 */

/*
 * Rutas Procesos
 */
Route::get('/bajatension', function () {
    return view('vendedor.bajatension');
});


