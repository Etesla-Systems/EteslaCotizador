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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vendedor', function () {
    return view('vendedor.inicio');
});

Route::get('/clientes', function () {
    return view('catalogos.clientes');
});

Route::get('/clientes/editar', function () {
    return view('catalogos.editarcliente');
});


Route::get('/bajatension', function () {
    return view('vendedor.bajatension');
});
