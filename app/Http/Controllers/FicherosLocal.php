<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use View;
use Session;
use stdClass;
use File;

class FicherosLocal extends Controller {
		
	public function index()
	{	
		Session::forget('directorioActual');
		Session::forget('directorioAnterior');
		

		if(Session::has('usuario')){
			$usu_email = Session::get('usuario');
			// $usu_email = "anahydros@gmail.com";
		}else{
			$usu_email = "anahydros@gmail.com";
		}
		
		$directorios = self::listarDirectorio($usu_email);
		
		Session::forget('directorioAnterior');
		Session::put('directorioAnterior' , $usu_email);
		Session::forget('directorioActual');
		Session::put('directorioActual', $usu_email);

		$view = View::make('explorador.index')->with(["directorios" => $directorios, "directorioActual" => $usu_email ]);
		$clase = new stdClass();
		$clase->vista = $view;
		$clase->directorios = $directorios;
		$clase->directorioActual = $usu_email;
		return $view;
	//	dd(json_encode($directorios));

	}
	
	public function show($dir)
	{	
		$usuario ='';
		$dirSesion = Session::get("directorioActual");
		
		// Comprobamos si la página fue refrescada
		$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
		
		// Si se refresca la pagina, se mantiene el directorio actual y se cargan los datos del mismo directorio
		if($pageWasRefreshed ) {
		   //do something because page was refreshed;
		   
		   	$directorios = self::listarDirectorio($dirSesion);
			$view = View::make('explorador.index')->with(["directorios" => $directorios, "directorioActual" => $dirSesion ]);
			return $view;
		} 
		
		// Compruebo si hay sesion de usuario 
		if(Session::has('usuario')){
			$usuario = Session::get('usuario');
			
			// Quitamos el exceso de slashs
			$dir = str_replace( '//', '/' ,$dir);
			
			// Miro si tiene directorio raiz del usuario  en sesion
			if(strpos($dir, $usuario) !== -1)	{
				
				// Comprobamos si se quiere volver atrás
				if(strpos($dir, '_atras_') !== FALSE){
					// Quitamos _atras_ de la peticion
					$dir = str_replace( '_atras_', '' ,$dir);
					
					// Compruebo si es directorio raiz
					if($dir == trim(str_replace('/', '',$usuario))){
						$dirActual = $dirSesion;
						
					}else{
						// Comprobamos si la petición se hace desde la misma carpeta
						if(($i = strrpos($dirSesion, $dir)) !== FALSE && substr($dirSesion, $i) == $dir){
						
							$dirActual = substr($dirSesion, 0 , $i);
							
						}else{
							$dirActual = $usuario;
					
						}
					}
				}else{
					// Compruebo si es directorio raiz
					if($dir == $usuario){
						
						$dirActual = $dirSesion;
					}else{
						$dirActual = $dirSesion . '/' . trim($dir);
	
					}
				}
					
				 $dirActual = str_replace( '//', '/' ,$dirActual);
				$dirActual = trim($dirActual, "/");
					// Listado el directorio
					$directorios = self::listarDirectorio($dirActual);
					
					Session::forget('directorioAnterior');
					Session::put('directorioAnterior', Session::get('directorioActual'));
					Session::forget('directorioActual');
					Session::put('directorioActual', $dirActual);	
					
					
					$view = View::make('explorador.index')->with(["directorios" => $directorios, "directorioActual" => $dirActual ]);
					return $view;
			/*		$clase = new stdClass;
					$clase->vista = $vista->render();
					$clase->directorios = $directorios;
					$clase->directorioActual = $dirActual;
					
					return json_encode($clase); */
					//return response()->json([ 'html' => $vista->render() ]);
			/*	}else{
					return "";
				} */
			}else{
				return "No estas accediendo a tu directorio personal.";

			}
		}else{
			return "No estas registrado!";

		}
	}
	
			
			// Devuevle array recursivo de todos los ficheros y directorios de la ruta especificada
			public function listarDirectorio($dir){
				$aws = Storage::disk('local');
				$dir = str_replace( '//', '/' ,$dir);
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
				
				$dir = str_replace( '//', '/' ,$dir);

				
				Session::forget('directorioAnterior');
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

		$directorio = Session::get('directorioActual') . '/' .$dir;
		$disk = Storage::disk('local');
		$disk->makeDirectory($dir);
		
	}
	
	
	public function abrir($fichero)
	{	
		$dir = Session::get('directorioActual');
		$dirFichero = $dir.'/'.$fichero;
		
		$disk = Storage::disk('local');
		
		if ($disk->exists($dirFichero)){
		   $contenidoFichero = $disk->get($dirFichero);
		   
		   return $contenidoFichero;
		}else{
			return "El recurso al que intenta acceder no existe.";
		}
		
		
	}
	
	public function crear($nombre)
	{	
		$dir = Session::get('directorioActual');
		$dirRaiz  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();

		$dirFichero = $dirRaiz . $dir.'/'.$nombre . '/';
		$dirFichero = str_replace('//','/',$dirFichero);
		
		if(!File::exists($dirFichero)){
			File::makeDirectory($dirFichero, 0777);
		}
		
		$directorios = self::listarDirectorio($dir);
			
		return View::make('explorador.index')->with(["directorios" => $directorios, "directorioActual" => $dir ]);

	}


	public function store(Request $request)	{	
		$fichero = $request->file('fichero'); // Recogemos los ficheros enviados por ajax
		
		$dirActual = Session::get('directorioActual');
		$dirRaiz  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
	
		$dirGuardar = $dirRaiz . '/' . $dirActual;
		$dirGuardar = str_replace( '//', '/' ,$dirGuardar);
		
		$nombreFichero = $fichero->getClientOriginalName();
		
		$fichero->move($dirGuardar , $nombreFichero);
		
     
		dd("FICHERO GUARDADO CON EXITO");
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
	public function eliminar($nombre)
	{	
		$dir = Session::get('directorioActual');
		$dirRaiz  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();

		$dirFichero = $dirRaiz . $dir.'/'.$nombre;
		$dirFichero = str_replace('//','/',$dirFichero);
		
		if(File::exists($dirFichero)){	
			if(is_dir($dirFichero)){
				File::deleteDirectory($dirFichero);
			}else{
				File::delete($dirFichero);
			}
		}
		
		$directorios = self::listarDirectorio($dir);
			
		return View::make('explorador.index')->with(["directorios" => $directorios, "directorioActual" => $dir ]);
	}

}
