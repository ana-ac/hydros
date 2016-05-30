<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use hydros_final\usuario as Usuario;
use View;
use Input; 
use Carbon\Carbon;

use Illuminate\Http\Request;

class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$usuarios = Usuario::all(); 
		return View::make('admin/listadoUsuarios')->with('usuarios', $usuarios);	
	
	}


	public function create()
	{
		return View::make('admin/altaUsuario');
	}


	public function store()
	{	
		// Se guardan los valores que se han pasado por parametro para usarlos 
		// en .blade {{ old('valor') }}
		Input::flash(); 
		
		$errores = array();
		
		$email = Input::get('email');
		$tipo = Input::get('tipo');
		
		// Comprobamos si email o tipo no están vacíos
		if(strlen(trim($email, " "))==0){
			$errores[] .= "El campo email es obligatorio.";
		}
		if(strlen(trim($tipo, " "))==0){
			$errores[] .= "El campo tipo es obligatorio.";

		}
		
		// Cortamos el flujo devolviendo la vista con los errores
		if(count($errores)>0){
			return View::make('admin/altaUsuario')->with('errors', $errores);	
		}
		
	
		// Comprobamos si existe en la bd la clave (que es el email)
		if(Usuario::where("email", $email )!=null){
			$errores[] .= "La clave(email) " . $email . " ya existe en la BD.";
			return View::make('admin/altaUsuario')->with('errors', $errores);
		}
	
		// Creamos el usuario con sus datos
		$usuario = new Usuario;
		$usuario->email = Input::get('email');
		$usuario->tipo = Input::get('tipo');
		
		$usuario->nombre = Input::get('nombre');
		$usuario->apellidos = Input::get('apellidos');
		$usuario->telefono = Input::get('email');
		$usuario->contraseña = \Hash::make(Input::get('contraseña'));
		$usuario->rol = Input::get('rol');
		$usuario->created_at = Carbon::now()->format('Y-m-d H:i:s');
			
		
		try{	
			// Escribimos los datos en la bd
			if ($usuario->push()){
					$usuarios = Usuario::all(); 
					return View::make('admin/listadoUsuarios')->with('usuarios', $usuarios);
		    } else{
				$errores[] .= "Error en la escritura de datos";
			
		    }
		    
		} catch(Illuminate\Database\QueryException $e){
			$errores[] .= "Error con la BD";

		}
		
		if(count($errores)>0){
			return View::make('admin/altaUsuario')->with('errors', $errores);	
		}
		
		return $this->index();
	}
	
	
	

	public function show($id)
	{
		$usuario = Usuario::where('usuario_id', $id)->first();
		return View::make('admin/perfilUsuario')->with('usuario', $usuario);
	
	}

	public function edit($id)
	{
		$usuario = Usuario::where('usuario_id', $id)->first();
		return View::make('admin/editarUsuario')->with('usuario', $usuario);
	}

	public function update()
	{	
		Input::flash();
		
		$errores = array();
		
		$email = Input::get('email');
		$tipo = Input::get('tipo');
		
		// Comprobamos si email o tipo no están vacíos
		if(strlen(trim($email, " "))==0){
			$errores[] .= "El campo email es obligatorio.";
		}
		if(strlen(trim($tipo, " "))==0){
			$errores[] .= "El campo tipo es obligatorio.";

		}
		
		$usuario = Usuario::where('email', $email)->first();
		
		$usuario->telefono = Input::get('email');
		$usuario->tipo = Input::get('tipo');

		$usuario->nombre = Input::get('nombre');
		$usuario->apellidos = Input::get('apellidos');
		$usuario->contraseña = \Hash::make(Input::get('contraseña'));
		$usuario->rol = Input::get('rol');
		
		$usuario->push();
		
		$this->show($usuario->id);
	}


	public function destroy($id)
	{
		Usuario::where('usuario_id', $id)->delete();
		
		$usuarios = Usuario::all(); 
		return View::make('admin/listadoUsuarios')->with('usuarios', $usuarios);
	
	
	}

}
