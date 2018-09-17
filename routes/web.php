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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/instrucciones', function () {
	return view('instructions');
});
Route::get('/acerca-de', function () {
	return view('credits');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/seleccionar/proyecto/{id}', 'HomeController@selectProject');

Route::get('/reportar', 'IncidencyController@create');
Route::post('/reportar', 'IncidencyController@store');
Route::get('/ver/{id}', 'IncidencyController@show');

Route::get('/incidencia/{id}/editar', 'IncidencyController@edit');
Route::post('/incidencia/{id}/editar', 'IncidencyController@update');

Route::get('/incidencia/{id}/atender', 'IncidencyController@take');
Route::get('/incidencia/{id}/resolver', 'IncidencyController@solve');
Route::get('/incidencia/{id}/abrir', 'IncidencyController@open');
Route::get('/incidencia/{id}/derivar', 'IncidencyController@nextlevel');

// Message
Route::post('/mensajes', 'MessageController@store');

Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {

	Route::post('/categorias', 'CategoryController@store');
	Route::patch('/categoria/editar', 'CategoryController@update')->name('category.update');
	Route::delete('/categoria/eliminar', 'CategoryController@destroy')->name('category.destroy');

	Route::get('/usuarios', 'UserController@index');
	Route::post('/usuarios', 'UserController@store');

	Route::get('/usuario/{id}', 'UserController@edit');
	Route::post('/usuario/{id}', 'UserController@update');
	Route::get('/usuario/{id}/eliminar', 'UserController@delete');

	Route::get('/proyectos', 'ProjectController@index');
	Route::post('/proyectos', 'ProjectController@store');

	Route::get('/proyecto/{id}', 'ProjectController@edit');
	Route::post('/proyecto/{id}', 'ProjectController@update');
	Route::get('/proyecto/{id}/eliminar', 'ProjectController@delete');
	Route::get('/proyecto/{id}/restaurar', 'ProjectController@restore');
	Route::get('/proyecto/{id}/niveles', 'LevelController@byproject');

	//projec-user
	Route::post('/proyecto-usuario', 'ProjectUserController@store');
	Route::delete('/proyecto-usuario/{id}/eliminar', 'ProjectUserController@delete')->name('proy-user.delete');

	Route::post('/niveles', 'LevelController@store');
	Route::patch('/nivel/editar', 'LevelController@update');
	Route::delete('/nivel/eliminar', 'LevelController@destroy')->name('level.destroy');

	Route::get('/config', 'ConfigController@index');

});
