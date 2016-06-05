<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use hydros_final\funcionalidad as Funcionalidad;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use View;
use Session;
use Carbon\Carbon;

use Illuminate\Http\Request;

class FuncionalidadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$funcionalidades = Funcionalidad::all();
		return View::make('funcionalidades.lista')->with('funcionalidades',$funcionalidades);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		$funcionalidad = new Funcionalidad();
   		return View::make('funcionalidades.crear')->with('funcionalidad' ,$funcionalidad);
	}

	/**
	 * Store a newly created resource in storage.
	 **
	 * @return Response
	 */
	 
	public function store(){
		$funcionalidad = new Funcionalidad();
     	$validacion = $funcionalidad->validar(Input::all());
        if ($validacion->passes()) {
                
                // store
             $funcionalidad->nombre = Input::get('nombre');
			 $funcionalidad->descripcion = Input::get('descripcion');
			 $funcionalidad->created_at = Carbon::now()->format('Y-m-d H:i:s');
			 $funcionalidad->save();

            // redirect
            Session::flash('mensaje', 'La funcionalidad '. $funcionalidad->nombre .'ha sido creada correctamente!');
            return Redirect::to('funcionalidades');
                
        } else {
        	//$errores = $validacion->messages();
             return Redirect::to('funcionalidades/crear')
             	->withInput()
                ->withErrors($validacion->messages());
        }
        
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		$funcionalidad = Funcionalidad::find($id);
		
		$RolesAsc = array();
   		foreach($funcionalidad->roles as $rol){
   			$RolesAsc[$rol->id] = $rol->nombre; 
   		}
		$view = View::make('funcionalidades.detalle');
   		$view->funcionalidad = $funcionalidad;
   		$view->rolesAsociados = $RolesAsc;
   		return $view;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
		$funcionalidad = Funcionalidad::find($id);
   		return View::make('funcionalidades.editar')->with('funcionalidad', $funcionalidad);
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
            return Redirect::to('funcionalidades/editar/'. $id)
            	->withInput()
                ->withErrors($validator);
                
        } else {
        	
        	//echo 'actualizar funcionalidad ' . $id;
            // update
            //$funcionalidad_old = Funcionalidad::find($id);
           	 $funcionalidad = Funcionalidad::find($id);
			 $funcionalidad->nombre = Input::get('nombre');
			 $funcionalidad->descripcion = Input::get('descripcion');
			 $funcionalidad->updated_at = Carbon::now()->format('Y-m-d H:i:s');
			 $funcionalidad->update();

            // redirect
            Session::flash('mensaje', 'La funcionalidad '. $funcionalidad->nombre .'ha sido actualizada correctamente!');
            return Redirect::to('funcionalidades');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		$funcionalidad = Funcionalidad::find($id);
   		$funcionalidad->delete();
   		return Redirect::to('funcionalidades')->with('mensaje', 'La funcionalidad '.$funcionalidad->nombre.' ha sido eliminada correctamente.');
	}
 
}
