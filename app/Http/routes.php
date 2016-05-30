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

//pagina presentacion , cualquier usuario - acceso login
Route::get('/', function(){
	return View::make('presentacion');
});


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
Route::get('/usuarios', [
	'uses' => 'UsuarioController@index',
	'as' => 'usuarios.index' 
]);	

// PERFIL
Route::get('/usuarios/{id}',[
	'uses' => 'UsuarioController@show',
	'as' => 'usuarios.detalle'
]);

// EDICION
Route::get('/usuarios/editar/{id}',[
	'uses' => 'UsuarioController@edit',
	'as' => 'usuarios.editar'
]);
Route::put('/usuarios/{id}',[
	'uses' => 'UsuarioController@update',
	'as' => 'usuarios.actualizar'
]);

// ALTA
Route::get('/usuarios/crear', [
	'uses' => 'UsuarioController@usu',
	'as' => 'usuarios.crear'
]);
Route::post('/usuarios', [
	'uses' => 'UsuarioController@store',
	'as' => 'usuarios.store'
]);

// BAJA
Route::delete('/usuarios/{id}',[
	'uses' => 'UsuarioController@destroy',
	'as' => 'usuarios.eliminar'
]);

Route::controller('usuario', 'UsuarioController');


									// ROLES ROLES ROLES ROLES

Route::get('/roles', [
	'uses' => 'RolController@index',
	'as' => 'roles.index'
]);

Route::post('/roles', [
	'uses' => 'RolController@store',
	'as' => 'roles.store'
]);

Route::get('/roles/crear', [
	'uses' => 'RolController@create',
	'as' => 'roles.crear'
]);

Route::get('/roles/{id}',[
	'uses' => 'RolController@show',
	'as' => 'roles.detalle'
]);

Route::get('/roles/editar/{id}',[
	'uses' => 'RolController@edit',
	'as' => 'roles.editar'
]);


Route::put('/roles/{id}',[
	'uses' => 'RolController@update',
	'as' => 'roles.actualizar'
]);

Route::delete('/roles/{id}',[
	'uses' => 'RolController@destroy',
	'as' => 'roles.eliminar'
]);


								// FUNCIONALIDADES FUNCIONALIDADES FUNCIONALIDADES

Route::get('/funcionalidades', [
	'uses' => 'FuncionalidadController@index',
	'as' => 'funcionalidades.index'
]);

Route::post('/funcionalidades', [
	'uses' => 'FuncionalidadController@store',
	'as' => 'funcionalidades.store'
]);

Route::get('/funcionalidades/crear', [
	'uses' => 'FuncionalidadController@create',
	'as' => 'funcionalidades.crear'
]);

Route::get('/funcionalidades/{id}',[
	'uses' => 'FuncionalidadController@show',
	'as' => 'funcionalidades.detalle'
]);

Route::get('/funcionalidades/editar/{id}',[
	'uses' => 'FuncionalidadController@edit',
	'as' => 'funcionalidades.editar'
]);


Route::put('/funcionalidades/{id}',[
	'uses' => 'FuncionalidadController@update',
	'as' => 'funcionalidades.actualizar'
]);

Route::delete('/funcionalidades/{id}',[
	'uses' => 'FuncionalidadController@destroy',
	'as' => 'funcionalidades.eliminar'
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
