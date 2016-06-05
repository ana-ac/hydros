@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/listadoRoles.css') }}" rel="stylesheet">
    	<link href="{{ URL::asset('css/filtrosUsuarios.css') }}" rel="stylesheet">
@endsection

@section('content')

 @include('logs')
 @include('admin/titulo', array('titulo' => 'Funcionalidades', 'subtitulo' => 'detalle', 'mensaje' 
 => 'puedes ver la información de la información elegida'))
			
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-primary filterable" id="style_div_users" >
	            <div class="panel-heading" id="header_users" >
	                <h3 class="panel-title"> Detalle Funcionalidad {{ $funcionalidad->nombre }}</h3>
	            </div>
	            <table class="table">
	                <tbody>
			        <tr>
			            <td>ID</td>
			            <td>{{ $funcionalidad->id }}</td>
			        </tr>
			        <tr>
			           <td>Nombre</td>
			           <td>{{ $funcionalidad->nombre }}</td> 
			        </tr>
			         <tr>
			             <td>Descripción</td>
			             <td>{{ $funcionalidad->descripcion }}</td>
			         </tr>
			         <tr>
			             <td>Roles Asociados</td>
			            <td>{!! Form::select('rolesAsociados',$rolesAsociados,'' ,array('size' => 'S' , 'name'=>'rolesAsociados', 'class' => 'form-control','id' => 'rolesAsociados')) !!}</td>
			         </tr>
			         <tr>
			             <td>Fecha Alta</td>
			             <td>{{ $funcionalidad->created_at }}</td>
			         </tr>
			         <tr>
			             <td>Última Modificación</td>
			             <td>{{ $funcionalidad->updated_at }}</td>
			         </tr>
			         <tr>
			             
			         </tr>
	                </tbody>
	            </table>
            
	        </div>
	        
		</div>
			<div class="col-md-8 col-md-offset-2 text-center">
	        	    	{!! Form::open(array('class' => 'form-inline', 'method' => 'GET', 'route' => array('funcionalidades.editar', $funcionalidad->id))) !!}
            	   		{!! Form::submit('Editar', array('class' => 'btn btn-primary text-center')) !!}
            	  {!! Form::close() !!}
	        	</div>
	</div>
</div>
@endsection