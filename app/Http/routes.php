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

Route::get('/admin', function(){
	return View::make('admin/admin');
});


/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// routes of autentication
Route::get('login', [
	'uses' => 'Auth\AuthController@showLogin',
	'as' => 'login'
]);

Route::post('login', [
	'uses' => 'Auth\AuthController@postLogin',
	'as' => 'login'
]);

Route::get('logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as' => 'logout'
]);*/


					
// routes of register
Route::get('alta', [
	'uses' => 'AuthController@showLogin',
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

// ALTA
Route::get('/usuarios/crear', [
	'uses' => 'UsuarioController@create',
	'as' => 'usuarios.crear'
]);
Route::post('/usuarios', [
	'uses' => 'UsuarioController@store',
	'as' => 'usuarios.store'
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
Route::post('/usuarios/actualizar/{id}',[
	'uses' => 'UsuarioController@update',
	'as' => 'usuarios.actualizar'
]);
/* Route::put('/usuarios/{id}',[
	'uses' => 'UsuarioController@update',
	'as' => 'usuarios.actualizar'
]);*/



// BAJA
Route::delete('/usuarios/{id}',[
	'uses' => 'UsuarioController@destroy',
	'as' => 'usuarios.eliminar'
]);

//Route::controller('usuario', 'UsuarioController');


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


/*
// Login
Route::get('/login', [
	'uses' => 'AuthController@showLogin',
	'as' => 'login' 
]);

Route::post('/login', [
	'uses' => 'AuthController@postLogin',
	'as' => 'login'
]);

*/
// Logeado
Route::get('/workspace', function(){
	return View::make('vista_usuario');
});


Route::get('/login', 'LoginController@getLogin');
//Route::post('auth/login', 'Front@authenticate');
//Route::get('auth/logout', 'Front@logout');

//Route::get('custom_auth/login', 'CustomAuth@getLogin'); 
Route::post('/login', 'LoginController@postLogin');


// Carga Aplicaciones Json
Route::post('/aplicaciones/prueba', [
	'uses' => 'AplicacionesController@prueba',
	'as' => 'aplicaciones.prueba'
]);


// Prueba ficheros
Route::get('/ficheros', 'Ficheros@index');
