@extends('app')

@section('css')
    	<link href="/css/listadoRoles.css" rel="stylesheet">
    	<link href="/css/filtrosUsuarios.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-primary filterable" id="style_div_users" >
	            <div class="panel-heading" id="header_users" >
	                <h3 class="panel-title"> Listado de Funcionalidades</h3></h3>
	                <div>
	                     <a href="/altaFuncionalidades" class="btn btn-primary btn-xs pull-right"><b>+</b> Nueva Funcionalidad</a>
	                </div>
	            </div>
	            <table class="table">
	                <thead>
	                    <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha Alta</th>
                        <th class="text-center">Action</th>
	                </thead>
	                <tbody>
	               	@foreach($funcionalidades as $funcionalidad)
			        <tr>
			            <td>{{ $funcionalidad->funcionalidad_id }}</td>
                        <td>{{ $funcionalidad->nombre }}</td>
                        <td>{{ $funcionalidad->created_at }}</td>
                        <td class="text-center"><a class='btn btn-info btn-xs' href="/edicionFuncionalidades"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
		        	</tr>
			        @endforeach
	                </tbody>
	            </table>
	        </div>

		</div>
	</div>
</div>
@endsection