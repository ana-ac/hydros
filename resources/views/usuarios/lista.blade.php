@extends('header')

@section('css')
    	<link href="/css/filtrosUsuarios.css" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('logs')

	        <div class="panel panel-primary filterable" id="style_div_users" >
	            <div class="panel-heading" id="header_users" >
	                <h3 class="panel-title">Listado usuarios</h3>
	                <div class="pull-right">
	                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
	                </div>
	            </div>
	            <table class="table">
	                <thead>
	                    <tr class="filters">
	                        <th><input type="text" class="form-control" placeholder="id" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="nombre" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="apellidos" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="email" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="fecha alta" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="estado" disabled></th>
	                        <th><input type="text" class="form-control text-center" placeholder="Acción" disabled></th>
	                    </tr>
	                </thead>
	                <tbody>
					@foreach($usuarios as $usuario)
						<tr>
							<td>{{ $usuario->id }}</td>
							<td>{{ $usuario->nombre }} </td>
							<td>{{ $usuario->apellidos }}</td>
							<td>{{ $usuario->email }} </td>
							@if($usuario->created_at != null)
								<td>{{ $usuario->created_at }}</td>
							@else
								<td><span class="center" > - </span></td>
							@endif
							
							@if($usuario->estado == 1)
							    <td><span class="label label-success">Activo</span></td>
						    @else
						        <td><span class="label label-warning">Inactivo</span></td>
					        @endif
					         
					         <td  class="text-center">
                        	  {!! Form::open(array('class' => 'form', 'method' => 'GET', 'route' => array('usuarios.editar', $usuario->id ))) !!}
                        	   		{!! Form::submit('Editar', array('class' => 'btn btn-success btn-xs ')) !!}

                        	  {!! Form::close() !!}
                        	  
                        	   {!! Form::open(array('class' => 'form', 'method' => 'GET', 'route' => array('usuarios.detalle', $usuario->id ))) !!}
                        	   		{!! Form::submit('Ver', array('class' => 'btn btn-info btn-xs')) !!}
                        	  {!! Form::close() !!}
                        	  
                        	  {!! Form::open(array('class' => 'form', 'method' => 'DELETE', 'route' => array('usuarios.eliminar', $usuario->id ))) !!}
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

@section('javascript')
	<script src="js/filtrosUsuarios.js"></script>
@endsection