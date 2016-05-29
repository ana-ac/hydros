<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use hydros_final\Usuario as Usuario;
use hydros_final\rol as Rol;

use View;
use Input; 
use Carbon\Carbon;
use Session;
use Redirect;

use Illuminate\Http\Request;

class UsuarioController extends Controller {
	
	public function index(){
		$usuarios = Usuario::all(); // Recogemos todos los usuarios
		
		return View::make('admin.usuarios.listadoUsuarios')->with('usuarios', $usuarios);	
	
	}


	public function create()
	{
		$roles = Rol::lists('nombre', 'id'); // Devuelve un Array asociativo con los campos [ 'nombre_rol' => 'id_rol']
		
		return View::make('admin.usuarios.altaUsuario')->with('roles', $roles); // Creamos la vista altaUsuario pasandole el Array asociativo de Roles
	}


	public function store() {	
		// Creamos el usuario, después le añadimos los datos
		$usuario = new Usuario;
		// Campos obligatorios
		$usuario->email = Input::get('email');
		$usuario->tipo = Input::get('tipo');
		$usuario->rol = Input::get('rol');
		$usuario->contraseña = \Hash::make(Input::get('contraseña'));
		
		$usuario->nombre = Input::get('nombre');
		$usuario->apellidos = Input::get('apellidos');
		$usuario->telefono = Input::get('telefono');
		
		// Guardamos el usuario con sus datos y pillamos el estado del guardado
		try{
			$usuario->save();
			
			// Pasamos a la sesion los campos 'message' y 'class' con los datos a manejar
			Session::flash('mensaje','Guardado correctamente!');
			Session::flash('class', 'success');
		
			
		}catch(\Illuminate\Database\QueryException $e){			// http://stackoverflow.com/questions/26363271/laravel-check-for-constraint-violation
			// Controlamos la excepcion de BD
			
			if($e->errorInfo[1]==1452) 
			{
				Session::flash('mensaje','El usuario ' . $usuario->email . ' ya está registrado.');
				
			}
			elseif($e->errorInfo[1]==1062)// Violación de clave duplicada
			{
					Session::flash('mensaje','El usuario ' . $usuario->email . ' ya está registrado.');
			}
			else
			{
				Session::flash('mensaje','ERROR: ' . $e->errorInfo[1]  . '\n\n' . $e->errorInfo[2] );
			}
			
			Session::flash('class', 'danger');
			return redirect()->back()->withInput();
			
		}catch (Exception $e){
			// Pasamos a la sesion los campos 'message' y 'class' con los datos a manejar
			Session::flash('mensaje','Oops... ha ocurrido un error :(');
			Session::flash('class', 'danger');
			return redirect()->back()->withInput();
		}
		
		return redirect('altaUsuario');
		
	}
	
	
	

	public function show($email)
	{
		$usuario = Usuario::find($email);
		return View::make('admin.usuarios.perfilUsuario')->with('usuario', $usuario);
	
	}

	public function edit($email)
	{
		$usuario = Usuario::find($email);
		return View::make('admin.usuarios.editarUsuario')->with('usuario', $usuario);
	}

	public function update($id)
	{	
		
		// Buscamos al usuario con sus datos
		$usuario = Usuario::find($id);
		// Sobreescribimos los datos 
		$usuario->email = Input::get('email');
		$usuario->tipo = Input::get('tipo');
		$usuario->rol = Input::get('rol');
		$usuario->contraseña = \Hash::make(Input::get('contraseña'));
		
		$usuario->nombre = Input::get('nombre');
		$usuario->apellidos = Input::get('apellidos');
		$usuario->telefono = Input::get('email');
		
		// Guardamos el usuario con sus datos y pillamos el estado del guardado
		try{
			// Push para guardar los datos y sus relaciones 
			$usuario->push();
			
			// Pasamos a la sesion los campos 'message' y 'class' con los datos a manejar
			Session::flash('mensaje','Usuario ' . $usuario->email . ' guardado correctamente!');
			Session::flash('class', 'success');
		
			
		}catch (Exception $e){
			// Pasamos a la sesion los campos 'message' y 'class' con los datos a manejar
			Session::flash('mensaje','Oops... ha ocurrido un error :(');
			Session::flash('class', 'danger');
			return redirect()->back()->withInput();
		}
		
		return redirect('listadoUsuarios');
	}


	public function destroy($id)
	{	

		
		// Guardamos el usuario con sus datos y pillamos el estado del guardado
		try{
			$usuario = Usuario::where('id', $id)->delete();
			
			// Pasamos a la sesion los campos 'message' y 'class' con los datos a manejar
			Session::flash('mensaje', ' Eliminado correctamente!');
			Session::flash('class', 'success');
		
			
		}catch (Exception $e){
			// Pasamos a la sesion los campos 'message' y 'class' con los datos a manejar
			Session::flash('mensaje','Oops... ha ocurrido un error :(');
			Session::flash('class', 'danger');
			
		}
		$usuarios = Usuario::all(); 
		return redirect('listadoUsuarios');
	//	return View::make('admin/listadoUsuarios')->with('usuarios', $usuarios);
	
	
	} 

}
