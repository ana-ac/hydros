<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use hydros_final\usuario as Usuario;
use hydros_final\rol as Rol;
use Session;
use View;

use Illuminate\Http\Request;

class WorkspaceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		if(Session::has('usuario')){
			$emailUsuario = Session::get('usuario');
		}else{
			return redirect()->to('/');
		}
		
		$usuario = Usuario::findByEmail(Session::get('usuario'));
		$rol = Rol::find($usuario->rol);
		$view = View::make('vista_usuario');
   		$view->usuario = $usuario;
   		$view->rol = $rol;
   		
   		//var_dump($rol);
   		return $view;
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
