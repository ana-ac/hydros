<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'HomeController@index');

Route::get('/listadoUsuarios', function(){
	return View::make('admin/listadoUsuarios');
});
Route::get('/altaRoles', function(){
	return View::make('admin/altaRoles');
});

Route::get('/', function(){
	return View::make('welcome');
});

Route::get('/listadoRoles', function(){
	return View::make('admin/listadoRoles');
});

Route::get('/listadoFuncionalidades', function(){
	return View::make('admin/listadoFuncionalidades');
});

Route::get('/perfilUsuario', function(){
	return View::make('admin/perfilUsuario');
});

Route::get('/vadim', function(){
	return View::make('authVadim');
});

Route::get('/altaRoles', function(){
	return View::make('admin/altaRoles');
});

Route::get('/edicionRoles', function(){
	return View::make('admin/editarRoles');
});

Route::get('/edicionFuncionalidades', function(){
	return View::make('admin/editarFuncionalidades');
});

Route::get('/altaFuncionalidades', function(){
	return View::make('admin/altaFuncionalidades');
});


//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// routes of autentication
Route::get('login', [
	'uses' => 'Auth\AuthController@getLogin',
	'as' => 'login'
]);

Route::post('login', [
	'uses' => 'Auth\AuthController@postLogin',
	'as' => 'login'
]);

Route::get('logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as' => 'logout'
]);

// routes of register
Route::get('alta', [
	'uses' => 'Auth\AuthController@getRegister',
	'as' => 'register'
]);

Route::post('alta', [
	'uses' => 'Auth\AuthController@postRegister',
	'as' => 'register'
]);

//route of resources about userscontroller

