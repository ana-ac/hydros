@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/listadoRoles.css') }}" rel="stylesheet">
    	<link href="{{ URL::asset('css/filtrosUsuarios.css') }}" rel="stylesheet">
    	<!-- Bootstrap-Iconpicker -->
<link rel="stylesheet" href="{{ URL::asset('bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}" />
<style>
	.popover{
		display:none !important;
	}
</style>
@endsection

@section('content')

 @include('logs')
 @include('admin/titulo', array('titulo' => 'Funcionalidades', 'subtitulo' => 'detalle', 'mensaje' 
 => 'puedes ver la información de la información elegida'))

<div class="container-fluid">
	 <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Detalle funcionalidad {{ $funcionalidad->nombre }}</h3>
                         <a href="{{ URL::to('funcionalidades/editar/' . $funcionalidad->id ) }}" ><span class="texto" >Editar</span><span class="glyphicon glyphicon-pencil icono" ></span></a>
                    </div>
                    <div class="panel-body">
                        
                        <table id="datosTabla" >
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
				             <td>Roles Asociadas</td>
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
				         	<td>Icono de funcionalidad</td>
				         	<td>
				         		<button name="icono" class="btn btn-success btn-lg" data-rows="4" data-cols="4" data-footer="false" data-iconset="glyphicon" data-icon="{{ $funcionalidad->icono }}" role="iconpicker"  ></button>
				         	</td>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       
@endsection

@section('javascript')
<script type="text/javascript" src="{{ URL::asset('bootstrap-iconpicker/js/iconset/iconset-glyphicon.min.js') }}"></script>
<!-- Bootstrap-Iconpicker -->
<script type="text/javascript" src="{{ URL::asset('bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') }}"></script>

@endsection