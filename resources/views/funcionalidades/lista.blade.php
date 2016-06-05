@extends('admin/admin')


@section('content')

 @include('logs')
 @include('admin/titulo', array('titulo' => 'Funcionalidades', 'subtitulo' => 'listado', 'mensaje' 
 => 'En esta sección podrás acceder tanto al listado de las funcionalidades como su edición, detalle y eliminación.'))
 
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-primary filterable" id="style_div_users" >
	            <div class="panel-heading" id="header_users" >
	                <h3 class="panel-title"> Listado de Funcionalidades</h3></h3>
	                <div>
	                     <a href="{{ URL::to('funcionalidades/crear') }}" class="btn btn-primary btn-xs pull-right"><b>+</b> Nueva Funcionalidad</a>
	                </div>
	            </div>
	            
	            <table class="table">
	                <thead>
	                    <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha Alta</th>
                        <th>Fecha Modificación</th>
                        <th class="text-center">Action</th>
	                </thead>
	                <tbody>
	               	@foreach($funcionalidades as $funcionalidad)
			        <tr>
			            <td>{{ $funcionalidad->id }}</td>
                        <td>{{ $funcionalidad->nombre }}</td>
                        <td>{{ str_limit($funcionalidad->descripcion, $limit = 30, $end = '...') }}</td>
                        <td>{{ $funcionalidad->created_at }}</td>
                        <td >{{ $funcionalidad->updated_at }}</td>
                        <td  class="text-center">
                        	 {!! Form::open(array('class' => 'form-inline', 'method' => 'GET', 'route' => array('funcionalidades.editar', $funcionalidad->id))) !!}
                        	   		{!! Form::submit('Editar', array('class' => 'btn btn-success btn-xs')) !!}
                        	  {!! Form::close() !!}
                        	  
                        	   {!! Form::open(array('class' => 'form-inline', 'method' => 'GET', 'route' => array('funcionalidades.detalle', $funcionalidad->id))) !!}
                        	   		{!! Form::submit('Ver', array('class' => 'btn btn-info btn-xs')) !!}
                        	  {!! Form::close() !!}
                        	  
                        	  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('funcionalidades.eliminar', $funcionalidad->id))) !!}
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