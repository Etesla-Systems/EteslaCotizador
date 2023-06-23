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

/* --------------- Usuario --------------- */
Route::get('/', 'UsuarioController@index');
Route::post('/', 'UsuarioController@validarUsuario');
Route::get('/logout', 'UsuarioController@cerrarSesion');

/* --------------- Vendedor --------------- */
Route::get('/vendedor', 'VendedorController@index');
Route::get('/clientes', 'VendedorController@clientes');
Route::get('/editarcliente/{idCliente}', 'VendedorController@ClienteDetails');

/* --------------- Cliente --------------- */
Route::put('/propuestasByClient/{idCliente?}', 'PropuestasController@getPropuestasByClient');
Route::put('/consultarClientePorId/{cliente?}', 'ClienteController@consultarClientePorId');
Route::post('/registrarCliente', 'ClienteController@registrarCliente');
Route::put('/buscarCliente/{cliente?}','ClienteController@consultarClientePorNombre');

/* --------------- Vista general --------------- */
Route::get('/dashboard', function () {
    return view('cotizador.layout.dashboard');
});

/* --------------- Procesos --------------- */
Route::get('/bajatension', function () {
    return view('cotizador.pages.vendedor.bajatension');
});

/* --------------- Cotización individual --------------- */
Route::get('/individual', 'IndividualController@index');
Route::post('/enviarCotizIndiv','IndividualController@sendSingleQuotation');

/* --------------- PDF --------------- */
Route::post('/PDFgenerate', 'CotizacionController@generatePDF');
Route::get('/pdfCreate', 'PDFController@visualizarPDF');

/*
 * Vistas
 */
Route::get('/index', 'UsuarioController@paginaPrincipal');


<<<<<<< HEAD
=======

>>>>>>> 8b0162a57cf7a0fdf3f49f24454852c6a75f4377
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
