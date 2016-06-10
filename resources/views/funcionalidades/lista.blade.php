@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/listadoRoles.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('logs',array('clase' => Session::get('claseMensaje')))
 @include('admin/titulo', array('titulo' => 'Funcionalidades', 'subtitulo' => 'listado', 'mensaje' 
 => 'En esta sección podrás acceder tanto al listado de las funcionalidades como su edición, detalle y eliminación.'))
 
<div class="container-fluid">
	  <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Listado Funcionalidades</h3>
                        <a href="{{ URL::to('funcionalidades/crear') }}" ><span class="texto" >Nuevo</span><span class="glyphicon glyphicon-plus-sign icono" ></span></a>
                    </div>
                    <div class="panel-body">
                        
                        <table id="datosTabla" >
	                        	<thead>
		                    <th style="width:6%;" >ID</th>
	                        <th style="width: 20%;" >Nombre</th>
	                        <th>Descripcion</th>
	                        <th>Fecha Alta</th>
	                        <th>Fecha Modificación</th>
	                        <th style="width:20%;" class="text-center">Acción</th>
		                </thead>
		                	@foreach($funcionalidades as $funcionalidad)
					        <tr>
					        
					             <td>{{ $funcionalidad->id }}</td>
		                        <td>{{ $funcionalidad->nombre }}</td>
		                        <td>{{ str_limit($funcionalidad->descripcion, $limit = 30, $end = '...') }}</td>
		                        <td>{{ $funcionalidad->created_at }}</td>
		                        <td >{{ $funcionalidad->updated_at }}</td>
		                        <td class="text-center" id="accion">
		                        {!! Form::open(array('class' => 'form-inline', 'method' => 'GET', 'route' => array('funcionalidades.editar', $funcionalidad->id))) !!}
	                        	   		{!! Form::submit('Editar') !!}
	                        	  {!! Form::close() !!}
	                        	  
	                        	   {!! Form::open(array('class' => 'form-inline', 'method' => 'GET', 'route' => array('funcionalidades.detalle', $funcionalidad->id))) !!}
	                        	   		{!! Form::submit('Ver') !!}
	                        	  {!! Form::close() !!}
	                        	  
	                        	  {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('funcionalidades.eliminar', $funcionalidad->id))) !!}
	                        	   		{!! Form::submit('Eliminar') !!}
	                        	  {!! Form::close() !!}
		                        </td>
				        	</tr>
				        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection