@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/filtrosUsuarios.css') }}" rel="stylesheet">
    	<link href="{{ URL::asset('css/listadoRoles.css') }}" rel="stylesheet">
		<style>
		
			#nuevo span{top:5% !important;}
			span.texto{right:14% !important;}
			span.icono{right:11% !important;}
		</style>
@endsection

@section('content')

@include('admin/titulo', array('titulo' => 'Usuarios', 'subtitulo' => 'listado', 'mensaje' 
=> 'Binevenido al panel de administración! podrás ver un menú a la izquierda de la pantalla en el cual podrás investigar todas las posibilidades que tienes para manejar a tu antojo esta plataforma. Disfruta y mucha suerte!!'))

<div class="container-fluid">
	@include('logs')

	<div class="row">
		<div class="col-lg-12">

	        <div class="panel panel-primary filterable" id="style_div_users" >
	            <div class="panel-heading" id="header_users" >
	                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Listado usuarios</h3>
	                <div class="pull-right">
						<a href="{{ URL::to('usuarios/crear') }}" id="nuevo" ><span class="texto" >Nuevo</span><span class="glyphicon glyphicon-plus-sign icono" ></span></a>
	                    <button style="margin-top: -13px;" class="btn btn-default btn-md btn-filter "><span class="glyphicon glyphicon-filter "></span> Filtrar</button>
	                </div>
	            </div>
	            <div class="panel-body">
	            
		            <table id="datosTabla">
		                <thead>
		                    <tr class="filters">
		                        <th style="width:6%;"><input type="text" class="form-control text-center" placeholder="Id" disabled></th>
		                        <th style="width: 10%;"><input type="text" class="form-control text-center" placeholder="Nombre" disabled></th>
		                        <th><input type="text" class="form-control text-center" placeholder="Apellidos" disabled></th>
		                        
		                        <th><input type="text" class="form-control text-center" placeholder="Teléfono" disabled></th>
	
		                        <th style="width: 15%;"><input type="text" class="form-control text-center" placeholder="Email" disabled></th>
		                        <th><input type="text" class="form-control text-center" placeholder="Fecha Alta" disabled></th>
		                        
								<th><input type="text" class="form-control text-center" placeholder="Rol" disabled></th>
	
		                        <th><input type="text" class="form-control text-center nofilters" placeholder="Tipo" disabled></th>
		                        <th style="width:20%;" class="text-center"><input type="text" class="form-control text-center nofilters" placeholder="Acción" disabled></th>
		                    </tr>
		                </thead>
		                <tbody>
						@foreach($usuarios as $usuario)
							<tr>
								<td class="text-center"  >{{ $usuario->id }}</td>
								<td class="text-center" >{{ $usuario->nombre }}</td>
								<td class="text-center" >{{ $usuario->apellidos }}</td>
								<td class="text-center" >{{ $usuario->telefono }}</td>
								<td class="text-center" ><b>{{ $usuario->email }}</b></td>
								<td class="text-center" >
									@if($usuario->created_at != null)
										{{ $usuario->created_at }}
									@else
										 - 
									@endif
								</td>
								<td class="text-center" >{{ $roles[$usuario->rol ]}}</td>
								<td class="text-center" >
									@if($usuario->tipo == 0)
									    <span class="label label-success">Normal</span>
								    @else
									     <span class="label label-warning">Administrador</span>
							        @endif
						         </td>
						         <td  class="text-center" id="accion">
	                        	  {!! Form::open(array('class' => 'form-inline', 'method' => 'GET', 'route' => array('usuarios.editar', $usuario->id ))) !!}
	                        	   		{!! Form::submit('Editar') !!}
	                        	  {!! Form::close() !!}
	                        	  
                          	      {!! Form::open(array('class' => 'form-inline', 'method' => 'GET', 'route' => array('usuarios.detalle', $usuario->id ))) !!}
	                        	   		{!! Form::submit('Perfil' )!!}
	                        	  {!! Form::close() !!}
	                        	  
	                        	  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('usuarios.eliminar', $usuario->id ))) !!}
	                        	   		{!! Form::submit('Eliminar') !!}
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
	
</div>


@endsection

@section('javascript')
	<script src="{{ URL::asset('js/filtrosUsuarios.js') }}"></script>
@endsection