<?php

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

use Illuminate\Support\Facades\Route;


Route::get('/', ['as' => 'login', 'uses' => 'HomeController@bienvenida']);
Route::get('registro', 'HomeController@getRegistro');
Route::post('registro', 'HomeController@postRegistro');

Route::post('login', 'HomeController@postLogin');
Route::get('logout', 'HomeController@logout');

Route::get('peliculas', 'PeliculaController@index');
Route::get('usuarios/mis-peliculas', 'PeliculaController@peliculasUsuario');
Route::get('peliculas/registro', 'PeliculaController@getRegistro');
Route::get('peliculas/{opcion}/{id}', 'PeliculaController@comprarAlquilar');
Route::post('confirmar-compra', 'PeliculaController@compra');
Route::post('peliculas/registro', 'PeliculaController@postRegistro');
