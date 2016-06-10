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
	'as' => 'register',
	'https' => true
]);

Route::post('alta', [
	'uses' => 'Auth\AuthController@postRegister',
	'as' => 'register',
	'https' => true
]);

//route of resources about userscontroller


									// USUARIOS USUARIOS USUARIOS

// LISTADO
Route::get('/usuarios', [
	'uses' => 'UsuarioController@index',
	'as' => 'usuarios.index' ,
	'https' => true
]);	

// ALTA
Route::get('/usuarios/crear', [
	'uses' => 'UsuarioController@create',
	'as' => 'usuarios.crear',
	'https' => true
]);
Route::post('/usuarios', [
	'uses' => 'UsuarioController@store',
	'as' => 'usuarios.store',
	'https' => true
]);
// PERFIL
Route::get('/usuarios/{id}',[
	'uses' => 'UsuarioController@show',
	'as' => 'usuarios.detalle',
	'https' => true
]);

// EDICION
Route::get('/usuarios/editar/{id}',[
	'uses' => 'UsuarioController@edit',
	'as' => 'usuarios.editar',
	'https' => true
]); 
Route::post('/usuarios/actualizar/{id}',[
	'uses' => 'UsuarioController@update',
	'as' => 'usuarios.actualizar',
	'https' => true
]);


// BAJA
Route::delete('/usuarios/{id}',[
	'uses' => 'UsuarioController@destroy',
	'as' => 'usuarios.eliminar',
	'https' => true
]);

//Route::controller('usuario', 'UsuarioController');


									// ROLES ROLES ROLES ROLES

Route::get('/roles', [
	'uses' => 'RolController@index',
	'as' => 'roles.index',
	'https' => true
]);

Route::post('/roles', [
	'uses' => 'RolController@store',
	'as' => 'roles.store',
	'https' => true
]);

Route::get('/roles/crear', [
	'uses' => 'RolController@create',
	'as' => 'roles.crear',
	'https' => true
]);

Route::get('/roles/{id}',[
	'uses' => 'RolController@show',
	'as' => 'roles.detalle',
	'https' => true
]);

Route::get('/roles/editar/{id}',[
	'uses' => 'RolController@edit',
	'as' => 'roles.editar',
	'https' => true
]);


Route::put('/roles/{id}',[
	'uses' => 'RolController@update',
	'as' => 'roles.actualizar',
	'https' => true
]);

Route::delete('/roles/{id}',[
	'uses' => 'RolController@destroy',
	'as' => 'roles.eliminar',
	'https' => true
]);


								// FUNCIONALIDADES FUNCIONALIDADES FUNCIONALIDADES

Route::get('/funcionalidades', [
	'uses' => 'FuncionalidadController@index',
	'as' => 'funcionalidades.index',
	'https' => true
]);

Route::post('/funcionalidades', [
	'uses' => 'FuncionalidadController@store',
	'as' => 'funcionalidades.store',
	'https' => true
]);

Route::get('/funcionalidades/crear', [
	'uses' => 'FuncionalidadController@create',
	'as' => 'funcionalidades.crear',
	'https' => true
]);

Route::get('/funcionalidades/{id}',[
	'uses' => 'FuncionalidadController@show',
	'as' => 'funcionalidades.detalle',
	'https' => true
]);

Route::get('/funcionalidades/editar/{id}',[
	'uses' => 'FuncionalidadController@edit',
	'as' => 'funcionalidades.editar',
	'https' => true
]);


Route::put('/funcionalidades/{id}',[
	'uses' => 'FuncionalidadController@update',
	'as' => 'funcionalidades.actualizar',
	'https' => true
]);

Route::delete('/funcionalidades/{id}',[
	'uses' => 'FuncionalidadController@destroy',
	'as' => 'funcionalidades.eliminar',
	'https' => true
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
Route::get('/workspace',[
	'uses' => 'WorkspaceController@index',
	'as' => 'workspace.index'
]);

Route::get('/workspacee',[
	'uses' => 'WorkspaceController@indexe',
	'as' => 'workspace.index'
]);



//Route::post('/login', 'LoginController@getLogin');
//Route::post('auth/login', 'Front@authenticate');
//Route::get('auth/logout', 'Front@logout');

//Route::get('custom_auth/login', 'CustomAuth@getLogin'); 
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');


// Carga Aplicaciones Json
Route::post('/aplicaciones/{idFuncionalidad}', [
	'uses' => 'AplicacionesController@index',
	'as' => 'aplicaciones.id'
]);


// Manejo de ficheros
Route::get('/ficheros', 'FicherosLocal@index');

Route::get('/ficheros/{dir}', [
	'uses' => 'FicherosLocal@show',
	'as' => 'ficheros.otro']);

Route::get('/ficheros/abrir/{fichero}', 'FicherosLocal@abrir');

Route::post('/ficheros' , [
	'uses' => 'FicherosLocal@store',
	'as' => 'ficheros.subir']);
	
Route::get('/ficheros/nuevo/{nombre}', 'FicherosLocal@crear');

Route::get('/ficheros/eliminar/{nombre}', 'FicherosLocal@eliminar');




//pruebas editor de texto

Route::get('/editordetexto', [
	'uses' => 'EditorController@index',
	'as' => 'aplicacion.editor'
]);

/*Route::get('/agenda', [
	'uses' => 'agendaController@index',
	'as' => 'aplicacion.agenda'
]);*/


Route::get('/agendacalendario', [
	'uses' => 'agendaController@index',
	'as' => 'aplicacion.agenda'
]);

Route::get('/agendacalendarioo', [
	'uses' => 'agendaController@indexe',
	'as' => 'aplicacion.agenda'
]);


//rutas eventos
Route::post('/eventos/crear', [
	'uses' => 'EventoController@store',
	'as' => 'eventos.crear'
]);

Route::post('/eventos', [
	'uses' => 'EventoController@getATodosEventos',
	'as' => 'eventos.get'
]);

