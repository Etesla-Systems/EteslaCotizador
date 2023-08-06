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
Route::post('/registro', 'UsuarioController@registrarUsuario');
Route::get('/registro', 'usuarioController@mostrarRegistrarUsuario')->name('registro');

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
Route::get('/template', function () {
    return view('PDFTemplates.Machotes.individual');
});
Route::get('/pdfCreate', 'PDFController@visualizarPDF');


/* --------------- Cotización baja tensión --------------- */
Route::get('/bajaTension', 'BajaTensionController@index');
Route::post('/askCombinations', 'BajaTensionController@askCombination');
Route::post('/sendPeriodsBT', 'BajaTensionController@getCotizacionBT');
Route::post('/calcularViaticosBTI', 'BajaTensionController@calculaViaticos_BT');

/* --------------- Cotización individual --------------- */
Route::get('/individual', 'IndividualController@index');
Route::post('/enviarCotizIndiv','IndividualController@sendSingleQuotation');

/* --------------- PDF --------------- */
Route::post('/PDFgenerate', 'CotizacionController@generatePDF');
Route::get('/pdfCreate', 'PDFController@visualizarPDF');

/* --------------- Estructuras --------------- */
Route::get('/estructuras', 'EstructuraController@read');

/* --------------- Inversores --------------- */
Route::post('/inversoresSelectos', 'InversorController@getInversoresSelectos');


/*
 * Vistas
 */
Route::get('/index', 'UsuarioController@paginaPrincipal');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

