@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/filtrosUsuarios.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('logs')
@include('admin/titulo', array('titulo' => 'Usuarios', 'subtitulo' => 'listado', 'mensaje' 
=> 'Binevenido al panel de administración! podrás ver un menú a la izquierda de la pantalla en el cual podrás investigar todas las posibilidades que tienes para manejar a tu antojo esta plataforma. Disfruta y mucha suerte!!'))

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

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
	                        <th><input type="text" class="form-control text-center" placeholder="id" disabled></th>
	                        <th><input type="text" class="form-control text-center" placeholder="nombre" disabled></th>
	                        <th><input type="text" class="form-control text-center" placeholder="apellidos" disabled></th>
	                        
	                        <th><input type="text" class="form-control text-center" placeholder="telefono" disabled></th>

	                        <th><input type="text" class="form-control text-center" placeholder="email" disabled></th>
	                        <th><input type="text" class="form-control text-center" placeholder="fecha alta" disabled></th>
	                        
							<th><input type="text" class="form-control text-center" placeholder="rol" disabled></th>

	                        <th><input type="text" class="form-control text-center nofilters" placeholder="estado" disabled></th>
	                        <th><input type="text" class="form-control text-center nofilters" placeholder="Acción" disabled></th>
	                    </tr>
	                </thead>
	                <tbody>
					@foreach($usuarios as $usuario)
						<tr>
							<td class="text-center"  >{{ $usuario->id }}</td>
							<td class="text-center" >{{ $usuario->nombre }}</td>
							<td class="text-center" >{{ $usuario->apellidos }}</td>
							<td class="text-center" >{{ $usuario->telefono }}</td>
							<td class="text-center" >{{ $usuario->email }}</td>
							<td class="text-center" >
								@if($usuario->created_at != null)
									{{ $usuario->created_at }}
								@else
									 - 
								@endif
							</td>
							<td class="text-center" >{{ $usuario->rol }}</td>
							<td class="text-center" >
								@if($usuario->estado == 1)
								    <span class="label label-success">Activo</span>
							    @else
								     <span class="label label-warning">Inactivo</span>
						        @endif
					         </td>
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
	<script src="{{ URL::asset('js/filtrosUsuarios.js') }}"></script>
@endsection