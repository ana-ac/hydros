@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/listadoRoles.css') }}" rel="stylesheet">
    	<link href="{{ URL::asset('css/filtrosUsuarios.css') }}" rel="stylesheet">
@endsection

@section('content')

 @include('logs')
@include('admin/titulo', array('titulo' => 'Roles', 'subtitulo' => 'detalle', 'mensaje' 
 => 'puedes ver la información del rol elegido'))
 
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-primary filterable" id="style_div_users" >
	            <div class="panel-heading" id="header_users" >
	                <h3 class="panel-title"> Detalle Rol {{ $rol->nombre }}</h3>
	            </div>
	            <table class="table">
	                <tbody>
			        <tr>
			            <td>ID</td>
			            <td>{{ $rol->id }}</td>
			        </tr>
			        <tr>
			           <td>Nombre</td>
			           <td>{{ $rol->nombre }}</td> 
			        </tr>
			         <tr>
			             <td>Descripción</td>
			             <td>{{ $rol->descripcion }}</td>
			         </tr>
			         <tr>
			             <td>Funcionalidades Asociadas</td>
			            <td>{!! Form::select('funcionalidades',$funcionalidadesAsociadas,'' ,array('size' => 'S' , 'name'=>'funcionalidades', 'class' => 'form-control','id' => 'funcionalidades')) !!}</td>
			         </tr>
			         <tr>
			             <td>Fecha Alta</td>
			             <td>{{ $rol->created_at }}</td>
			         </tr>
			         <tr>
			             <td>Última Modificación</td>
			             <td>{{ $rol->updated_at }}</td>
			         </tr>
			         <tr>
			             
			         </tr>
	                </tbody>
	            </table>
            
	        </div>
	        
		</div>
			<div class="col-md-8 col-md-offset-2 text-center">
	        	    	{!! Form::open(array('class' => 'form-inline', 'method' => 'GET', 'route' => array('roles.editar', $rol->id))) !!}
            	   		{!! Form::submit('Editar', array('class' => 'btn btn-primary text-center')) !!}
            	  {!! Form::close() !!}
	        	</div>
	</div>
</div>
@endsection