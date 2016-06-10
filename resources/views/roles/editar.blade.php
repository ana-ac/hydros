@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/altaRoles.css') }}" rel="stylesheet">
@endsection

@section('content')

 @include('logs')
@include('admin/titulo', array('titulo' => 'Roles', 'subtitulo' => 'edición', 'mensaje' 
 => 'podrás editar datos de algun rol ya existente o añadir algunos extra.'))
 
 <div class="container-fluid">
<div class="col-md-12">
     {!! Form::open(array('url' => 'roles/' . $rol->id)) !!}
    <div class="form-area">  
        <div class="row">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Editar Rol {!! $rol->nombre !!}</h3>
                    <div class="col-md-6">
        				<div class="form-group">
        				    {!! Form::label('nombre_rol', 'Nombre del rol') !!}
    						 {!! Form::text('nombre', $rol->nombre, array('class' => 'form-control','id' => 'nombre','placeholder' => 'nombre')) !!}
    					</div>
    				</div>
    				<div class="col-md-6">
    					<div class="form-group">
    					    {!! Form::label('funcionalidades_asociadas', 'Funcionalidades') !!}
    						{!! Form::select('funcionalidades',$funcionalidades, $funcionalidadesAsociadas ,array('size' => 'S' , 'multiple'=>'multiple','name'=>'funcionalidades[]', 'class' => 'form-control','id' => 'funcionalidades')) !!}
    					</div>
					</div>
					<div class="col-lg-12" >
                        <div class="form-group">
                          {!! Form::label('descripcion_rol', 'Descripción') !!}
                          {!! Form::textarea('descripcion', $rol->descripcion, array('class' => 'form-control','id' => 'descripcion','maxlength' => '140', 'rows' => '7')) !!}
                            <span class="help-block"><p id="characterLeft" class="help-block ">Usted ha pasado el limite de caracteres</p></span>                    
                        </div>
                    </div>
                   {!! Form::submit('Editar Rol', array('class' => 'btn btn-primary pull-right','id' => 'submit')) !!}
                        {!! link_to('/roles', 'Cancelar', array('class' => 'btn btn-primary btn-danger pull-left')) !!}
                    {!! Form::close() !!}
       </div>
    </div>
</div>

</div>

@endsection

@section('javascript')
    	<script src="{{ URL::asset('js/altaRoles.js') }}"></script>
@endsection