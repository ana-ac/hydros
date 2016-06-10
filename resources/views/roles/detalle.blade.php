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
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Detalle rol {{ $rol->nombre }}</h3>
                         <a href="{{ URL::to('roles/editar/' . $rol->id ) }}" ><span class="texto" >Editar</span><span class="glyphicon glyphicon-pencil icono" ></span></a>
                    </div>
                    <div class="panel-body">
                        
                        <table id="datosTabla" >
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection