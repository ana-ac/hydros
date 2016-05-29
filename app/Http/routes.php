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
							// Va! Estos son los recordatorios jajaja
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

// LISTADO
Route::get('/listadoUsuarios', 'UsuarioController@index');	

// PERFIL
Route::get('/perfilUsuario/{id}', 'UsuarioController@show');  

// EDICION
Route::get('/editarUsuario/{id}', 'UsuarioController@edit'); 
Route::post('/editarUsuario/{id}', 'UsuarioController@update');

// ALTA
Route::get('/altaUsuario', 'UsuarioController@create'); 
Route::post('/altaUsuario', 'UsuarioController@store');

// BAJA
Route::get('/bajaUsuario/{id}', 'UsuarioController@destroy');

Route::controller('usuario', 'UsuarioController');


									// ROLES ROLES ROLES ROLES

Route::get('roles', 'RolController@index');


Route::get('/roles', [
	'uses' => 'RolController@index',
	'as' => '/roles'
]);

Route::post('/roles', [
	'uses' => 'RolController@store',
	'as' => '/altaRoles'
]);

Route::get('/roles/crear', [
	'uses' => 'RolController@create',
	'as' => '/altaRoles'
]);

Route::get('/roles/{id}',[
	'uses' => 'RolController@show',
	'as' => 'roles'
]);

Route::get('/roles/editar/{id}',[
	'uses' => 'RolController@edit',
	'as' => 'roles.editar'
]);


Route::put('/roles/{id}',[
	'uses' => 'RolController@update',
	'as' => 'roles.detalle'
]);

Route::delete('/roles/{id}',[
	'uses' => 'RolController@destroy',
	'as' => 'roles.eliminar'
]);


								// FUNCIONALIDADES FUNCIONALIDADES FUNCIONALIDADES

Route::get('/funcionalidades', [
	'uses' => 'FuncionalidadController@index',
	'as' => '/funcionalidades'
]);

Route::post('/funcionalidades', [
	'uses' => 'FuncionalidadController@store',
	'as' => '/funcionalidades'
]);

Route::get('/funcionalidades/crear', [
	'uses' => 'FuncionalidadController@create',
	'as' => '/funcionalidades'
]);

Route::get('/funcionalidades/{id}',[
	'uses' => 'FuncionalidadController@show',
	'as' => 'funcionalidades'
]);

Route::get('/funcionalidades/editar/{id}',[
	'uses' => 'FuncionalidadController@edit',
	'as' => 'funcionalidades.editar'
]);


Route::put('/funcionalidades/{id}',[
	'uses' => 'FuncionalidadController@update',
	'as' => 'funcionalidades'
]);

Route::delete('/funcionalidades/{id}',[
	'uses' => 'FuncionalidadController@destroy',
	'as' => 'funcionalidad.borrar'
]);




// UPLOADS

Route::get('upload', 'UploadFilesController@index');

Route::get('/upload',[
	'uses' => 'UploadFilesController@index',
	'as' => 'upload'
]);


Route::post('/upload',[
	'uses' => 'UploadFilesController@store',
	'as' => 'upload'
]);
