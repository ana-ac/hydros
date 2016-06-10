<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Filesystem;
use hydros_final\funcionalidad as Funcionalidad;

use Storage;
use Illuminate\Http\Request;
use View;

class AplicacionesController extends Controller {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		if($id != 0){
			$funcionalidad = Funcionalidad::find($id); // Devuelve un Array asociativo con los campos [ 'id_funcionalidad' => 'nombre_funcionalidad']
			return redirect()->to(str_replace(array(' ','/'), '', $funcionalidad->nombre));
		}else{
			// Redireccionar al controlador correspondiente a la funcionalidad
			return redirect()->to('/ficheros');
		}
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
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
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
