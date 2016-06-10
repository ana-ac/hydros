<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use View;
use Session;
use stdClass;

class FicherosController extends Controller {
	
	public function index()
	{	
		Session::forget('directorioActual');
		Session::forget('directorioAnterior');
		
		$aws = Storage::disk('s3');

		if(Session::has('usuario')){
			$usu_email = Session::get('usuario');
			// $usu_email = "anahydros@gmail.com";
		}else{
			$usu_email = "anahydros@gmail.com";
		}
		
		$directorios = self::listarDirectorio($usu_email);
	
		Session::put('directorioAnterior' , $usu_email);
		Session::put('directorioActual', $usu_email);

	/*	$view = View::make('explorador.index')->with(["directorios" => $directorios, "directorioActual" => $usu_email ]);
		$clase = new stdClass();
		$clase->vista = $view;
		$clase->directorios = $directorios;
		$clase->directorioActual = $usu_email;
		return $view;
	//	dd(json_encode($directorios));*/
	
		$view = View::make('aplicaiones.explorador.index')->with(["directorios" => $directorios, "directorioActual" => $usu_email ]);
		$clase = new stdClass();
		$clase->vista = $view->render();
		$clase->directorios = $directorios;
		$clase->directorioActual = $usu_email;
		$clase->id = '0';
		$clase->script = ['js/main.js', 'js/explorador/navegacion.js' ];
		return json_encode($clase);

	}
	
	public function show()
	{	
		$data = $_POST['data']; 
		dd($data);
		$usuario = '';
		$dirSesion = Session::get("directorioActual");

		$aws = Storage::disk('s3');

		// Compruebo si hay sesion de usuario 
		if(Session::has('usuario')){
			$usuario = Session::get('usuario');

			// Miro si es directorio raiz de usuario sesion
			if(strpos($dir, $usuario) !== -1)	{
				// Compruebo si el directorio coincide con el de sesion
				$dirActual = $dirSesion . '/' . trim($dir);
		
				// Listado el directorio
				$directorios = self::listarDirectorio($dirActual);
					dd($directorios);
				Session::put('directorioAnterior', Session::get('directorioActual'));
				Session::forget('directorioActual');
				Session::put('directorioActual', $dirActual);	

				$vista =  View::make('explorador.index')->render();
				$clase = new stdClass;
				$clase->vista = $vista;
				$clase->directorios = $directorios;
				$clase->directorioActual = $dirActual;
				
				return json_encode($clase);
				//return response()->json([ 'html' => $vista->render() ]);
			}else{
				return "No estas accediendo a tu directorio personal.";

			}
		}else{
			return "No estas registrado!";

		}
	//	dd(json_encode($directorios));
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// Devuevle array recursivo de todos los ficheros y directorios de la ruta especificada
	public function listarDirectorio($dir){
		$aws = Storage::disk('s3');
		
		Session::set('directorioAnterior' , Session::get('directorioActual'));

		
		// Recogemos todos los directorios que cuelguen de $dir
		$directorios = $aws->directories($dir);
		$ficheros = $aws->files($dir);
	
		$devolver = array(); // Array global para devolver
		
		// Si tiene ficheros
		if(!empty($ficheros)){
			// Guardamos los ficheros que haya podido recoger
			foreach($ficheros as $fichero){
				$posicion = strripos ($fichero, '/')+1;
				$nombre = substr($fichero, $posicion);
				
				$devolver[$nombre] = $fichero ;
			}
		}
		
		// Si tiene directorios
		if(!empty($directorios)){
			// Recorremos cada uno para ver si tiene contenido 
			foreach($directorios as $carpeta){
			//	$x =  $this->listarDirectorio($d);
				$posicion = strripos ($carpeta, '/') +1 ;
				$nombre = substr($carpeta, $posicion);
				
				$devolver[$nombre] = [$carpeta];
			}
			
		}
		Session::put('directorioAnterior', Session::get('directorioActual'));
		
		Session::forget('directorioActual');
		Session::put('directorioActual', $dir);
		//$vista = View::make('explorador.index')->with(["directorios" => $directorios, "directorioActual" => $dir ])->render();
		return( $devolver );
		
	}

	/**
	 * Crea el directorio en la ruta $dir
	 * 
	 */
	public function crearDirectorio($dir)
	{
		$aws = Storage::disk('s3');
		$aws->makeDirectory($dir);
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
