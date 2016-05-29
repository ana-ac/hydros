<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use hydros_final\funcionalidad as Funcionalidad;
use View;
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
		return View::make('admin/listadoFuncionalidades')->with('funcionalidades',$funcionalidades);
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
		 $funcionalidad = new Funcionalidad();
		 $funcionalidad->nombre = Input::get('nombre');
		 $funcionalidad->descripcion = Input::get('descripcion');
		 $funcionalidad->created_at = Carbon::now()->format('Y-m-d H:i:s');
		 $funcionalidad->save();
		 return Redirect::to('listadoFuncionalidades')->with('notice', 'La funcionalidad ha sido creada correctamente.');
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
