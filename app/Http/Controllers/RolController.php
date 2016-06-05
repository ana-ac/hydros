<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use hydros_final\rol as Rol;
use hydros_final\funcionalidad as Funcionalidad;
use View;
use Session;
use Carbon\Carbon;

use Illuminate\Http\Request;
use DB;

class RolController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$roles = Rol::all();
		return View::make('roles.lista')->with('roles',$roles);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		$rol = new Rol();
   		$funcionalidades = [''=>'Asocia una funcionalidad ...'] + Funcionalidad::lists('nombre', 'id');
   		 
   		$view = View::make('roles.crear');
   		$view->rol = $rol;
   		$view->funcionalidades = $funcionalidades;
   		return $view;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		
      	$rol = new Rol();
     	$validacion = $rol->validar(Input::all());
        if ($validacion->passes()) {
                
                // store
            
			 $rol->nombre = Input::get('nombre');
			 $rol->descripcion = Input::get('descripcion');
			 $rol->created_at = Carbon::now()->format('Y-m-d H:i:s');
			 $rol->save();
			 
			//$funcionalidades[] = Input::get('funcionalidades');
			foreach(Input::get('funcionalidades') as $funcionalidad){
				
				if($funcionalidad != ''){ // si el valor de funcionalidades no esta vacio añadimos un registro de relacion rol/funcionalidad
				 	$f = Funcionalidad::find($funcionalidad);
				 	$rol->funcionalidades()->save($f);
				}
			}
			
			 // redirect
            Session::flash('mensaje', 'El rol '. $rol->nombre .'ha sido creado correctamente!');
            return Redirect::to('roles');
			

        } else {
        	//$errores = $validacion->messages();
             return Redirect::to('roles/crear')
             	->withInput()
             	//->with('errores', $errores)
                ->withErrors($validacion);
        }
        
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		$rol = Rol::find($id);
		$funcAsc = array();
   		foreach($rol->funcionalidades as $funcionalidad){
   			$funcAsc[$funcionalidad->id] = $funcionalidad->nombre; 
   		}
		$view = View::make('roles.detalle');
   		$view->rol = $rol;
   		$view->funcionalidadesAsociadas = $funcAsc;
   		return $view;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
		$rol = Rol::find($id);
   		$funcionalidades = [''=>'Asocia una funcionalidad ...'] + Funcionalidad::lists('nombre', 'id');
   	
   		$funcAsc = array();
   		foreach($rol->funcionalidades as $funcionalidad){
   			$funcAsc[] = $funcionalidad->id; 
   		}
   		 
   		$view = View::make('roles.editar');
   		$view->rol = $rol;
   		$view->funcionalidades = $funcionalidades;
   		$view->funcionalidadesAsociadas = $funcAsc;
   		return $view;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id){
		
		$reglas = array( /* reglas que ha de cumplir*/
            'nombre'       => 'required',
            'descripcion'      => 'required'
        );
        
        $inputs = Input::all();
       	$validator = Validator::make($inputs, $reglas);
        
        if ($validator->fails()) {
            return Redirect::to('roles/editar/'. $id)
            	->withInput()
                ->withErrors($validator);
                
        } else {
        	
           	 $rol = Rol::find($id);
			 $rol->nombre = Input::get('nombre');
			 $rol->descripcion = Input::get('descripcion');
			 $rol->update();
				
			DB::table('Rol_Has_Funcionalidad')->where('rol', $id)->delete();
			 //$rol->funcionalidades()->delete();
			foreach(Input::get('funcionalidades') as $funcionalidad){

				if($funcionalidad != ''){ // si el valor de funcionalidades no esta vacio añadimos un registro de relacion rol/funcionalidad
					$f = Funcionalidad::find($funcionalidad);
				 	$rol->funcionalidades()->save($f);
				}
			}
			
            // redirect
            Session::flash('mensaje', 'El rol '. $rol->nombre .'ha sido editado correctamente!');
            return Redirect::to('roles');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		$rol = Rol::find($id);
   		$rol->delete();
   		return Redirect::to('roles')->with('mensaje', 'El Rol ' .$rol->nombre.' ha sido eliminado correctamente.');
	}

}
