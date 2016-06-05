@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/listadoRoles.css') }}" rel="stylesheet">
    	<link href="{{ URL::asset('css/filtrosUsuarios.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('logs')
@include('admin/titulo', array('titulo' => 'Roles', 'subtitulo' => 'listado', 'mensaje' 
 => 'En esta sección podrás acceder tanto al listado de los roles como su edición, detalle y eliminación.'))
			
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-primary filterable" id="style_div_users" >
	            <div class="panel-heading" id="header_users" >
	                <h3 class="panel-title"> Listado de Roles</h3></h3>
	                <div>
	                     <a href="{{ URL::to('roles/crear') }}" class="btn btn-primary btn-xs pull-right"><b>+</b> Nuevo Rol</a>
	                </div>
	            </div>
	            <table class="table">
	                <thead>
	                    <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Fecha Alta</th>
                        <th>Fecha Modificación</th>
                        <th class="text-center">Acción</th>
	                </thead>
	                <tbody>
			        @foreach($roles as $rol)
			        <tr>
			        	<!--<td>{{ $rol->funcionalidad['nombre'] }}</td>-->
			            <td>{{ $rol->id }}</td>
                        <td>{{ $rol->nombre }}</td>
                        <td>{{ str_limit($rol->descripcion, $limit = 30, $end = '...') }}</td>
                        <td>{{ $rol->created_at }}</td>
                        <td>{{ $rol->updated_at }}</td>
                        <td class="text-center">
                        		{!! Form::open(array('class' => 'form-inline', 'method' => 'GET', 'route' => array('roles.editar', $rol->id))) !!}
                        	   		{!! Form::submit('Editar', array('class' => 'btn btn-success btn-xs')) !!}
                        	  {!! Form::close() !!}
                        	  
                        	  {!! Form::open(array('class' => 'form-inline', 'method' => 'GET', 'route' => array('roles.detalle', $rol->id))) !!}
                        	   		{!! Form::submit('Ver', array('class' => 'btn btn-info btn-xs')) !!}
                        	  {!! Form::close() !!}
                        	  
                        	   {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('roles.eliminar', $rol->id))) !!}
                        	   		{!! Form::submit('Eliminar', array('class' => 'btn btn-danger btn-xs')) !!}
                        	  {!! Form::close() !!}
                        </td>
		        	</tr>
			        @endforeach
	                </tbody>
	            </table>
	        </div>
	        

		</div>
	</div>
</div>
@endsection