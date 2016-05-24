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
	                <h3 class="panel-title"> Listado de Roles</h3></h3>
	                <div>
	                     <a href="/altaRoles" class="btn btn-primary btn-xs pull-right"><b>+</b> Nuevo Rol</a>
	                </div>
	            </div>
	            <table class="table">
	                <thead>
	                    <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Fecha Alta</th>
                        <th class="text-center">Acción</th>
	                </thead>
	                <tbody>
			        @foreach($roles as $rol)
			        <tr>
			            <td>{{ $rol->rol_id }}</td>
                        <td>{{ $rol->nombre }}</td>
                        <td>{{ str_limit($rol->descripcion, $limit = 30, $end = '...') }}</td>
                        <td>{{ $rol->created_at }}</td>
                        <td class="text-center"><a class='btn btn-info btn-xs' href="/edicionRoles"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
		        	</tr>
			        @endforeach
	                </tbody>
	            </table>
	        </div>

		</div>
	</div>
</div>
@endsection