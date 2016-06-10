<?php namespace hydros_final\Http\Controllers;

use hydros_final\Http\Requests;
use hydros_final\Http\Controllers\Controller;
use hydros_final\funcionalidad as Funcionalidad;

use Illuminate\Http\Request;
use View;
use stdClass;

class EditorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$view = View::Make('aplicaciones.editordetexto.index')->render();
		//$require = View::Make('aplicaciones.editordetexto.require')->render();
		$clase = new stdClass();
		$clase->vista = $view;
		$clase->id = '1';
		$clase->script = ['//cdn.tinymce.com/4/tinymce.min.js', 'js/wysiwyg/wysiwyg.js' ];
		$clase->css = ['js/wysiwyg/wysiwyg.js'];
			
		return json_encode($clase);
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
