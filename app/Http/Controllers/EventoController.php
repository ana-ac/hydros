<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use hydros_final\evento as Evento;
use hydros_final\usuario as Usuario;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use View;
use Session;
use Carbon\Carbon;
use stdClass;

use Illuminate\Http\Request;

class EventoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getATodosEventos(){
		$usuario = Usuario::findByEmail('vadimvt@gmail.com');
		$eventos = Evento::where('usuario',$usuario->id)->get();

		$arrayObjects = array();
		foreach($eventos as $evento){
				$array = array();
			$array['nombre'] = $evento->nombre;
			$array['descripcion'] = $evento->descripcion;
			$array['FechaEvento'] = $evento->fecha_cumplimiento;
			$arrayObjects[] = $array;
		}
		return json_encode($arrayObjects);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		$evento = new Evento();
		$validacion = $evento->validar(Input::all());
		$usuario = Usuario::findByEmail(Input::get('usuario'));
		
		
		 if ($validacion->passes()) {
                
              // store
             $evento->nombre = Input::get('nombre');
			 $evento->descripcion = Input::get('descripcion');
			 $evento->created_at = Carbon::now()->format('Y-m-d H:i:s');
			 $evento->fecha_cumplimiento = Input::get('fechaEvento');
			 $evento->usuario = $usuario->id;
			 $evento->save();
			
            // redirect
            Session::flash('claseMensaje','info');
            //Session::flash('mensaje', 'El evento '. $evento->nombre .'ha sido creado correctamente!');
            return redirect()->back()->with('mensaje', 'El evento '.$evento->nombre.' ha sido creado correctamente!');
                
        } else {
        	//$errores = $validacion->messages();
        	Session::flash('error_code','0');
        	Session::flash('claseMensaje','danger');
             return redirect()->back()->withInput()->withErrors($validacion->messages());
       } 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		
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
