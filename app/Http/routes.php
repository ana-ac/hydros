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




Route::get('/', function(){
	return View::make('presentacion');
});

Route::get('/perfilUsuario', function(){
	return View::make('admin/perfilUsuario');
});

Route::get('/vadim', function(){
	return View::make('authVadim');
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


							//NO COMENTAR NUNCA , SINO DA ERRORES PORQUE NO ENCUENTRA LA RUTA DE REGISTER QUE DEBE ESTRA DEFINIDA
							// PERFECTO!! xD
							//JAJAJJA NOS COMUNICAMOS ASI A PARTIR DE AHORA??
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


									// USUARIOS USUARIOS USUARIOS
									
Route::get('/listadoUsuarios', 'UsuarioController@index');

Route::get('/perfilUsuario/{id}', [
	'uses' => 'UsuarioController@show',
	'as' => 'perfilUsuario'
]);

Route::get('/editarUsuario/{id}', [
	'uses' => 'UsuarioController@edit',
	'as' => 'editarUsuario'
]);

Route::put('/guardarCambiosUsuario', [
	'uses' => 'UsuarioController@update',
	'as' => 'guardarCambios'
]);


// Alta usuario
Route::get('/altaUsuario',  [
	'uses' => 'UsuarioController@createget',
	'as' => 'altaUsuario'
]);



									// ROLES ROLES ROLES ROLES
									
Route::get('roles', 'RolController@index');


Route::get('/listadoRoles', [
	'uses' => 'RolController@index',
	'as' => '/listadoRoles'
]);

Route::get('/altaRoles', [
	'uses' => 'RolController@create',
	'as' => '/altaRoles'
]);


								// FUNCIONALIDADES FUNCIONALIDADES FUNCIONALIDADES

Route::get('/listadoFuncionalidades', [
	'uses' => 'FuncionalidadController@index',
	'as' => '/listadoFuncionalidades'
]);


/*Route::get('/listadoRoles', function(){
	return View::make('admin/listadoRoles');
});

Route::get('/listadoFuncionalidades', function(){
	return View::make('admin/listadoFuncionalidades');
});
*/
