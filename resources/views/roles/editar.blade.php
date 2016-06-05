@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/altaRoles.css') }}" rel="stylesheet">
@endsection

@section('content')

 @include('logs')
@include('admin/titulo', array('titulo' => 'Roles', 'subtitulo' => 'edición', 'mensaje' 
 => 'podrás editar datos de algun rol ya existente o añadir algunos extra.'))
 
   <div class="container">
<div class="col-md-5">
    <div class="form-area">  
    
      {!! Form::open(array('url' => 'roles/' . $rol->id)) !!}
        <form role="form">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Editar Rol {!! $rol->nombre !!} </h3>
    				<div class="form-group">
					     {!! Form::text('nombre', $rol->nombre, array('class' => 'form-control','id' => 'nombre','placeholder' => 'nombre')) !!}
					</div>
					<div class="form-group">
						 {!! Form::select('funcionalidades',$funcionalidades, $funcionalidadesAsociadas ,array('size' => 'S' , 'multiple'=>'multiple','name'=>'funcionalidades[]', 'class' => 'form-control','id' => 'funcionalidades')) !!}
					</div>
					
                    <div class="form-group">
                    {!! Form::textarea('descripcion', $rol->descripcion, array('class' => 'form-control','id' => 'descripcion','maxlength' => '140', 'rows' => '7')) !!}
                        <span class="help-block"><p id="characterLeft" class="help-block ">Usted ha pasado el limite de caracteres</p></span>                    
                    </div>
                    
                     @if($rol->id)
                      {!! Form::hidden ('_method', 'PUT') !!}
                     @endif
            
        {!! Form::submit('Editar Rol', array('class' => 'btn btn-primary pull-right','id' => 'submit')) !!}
        {!! Form::close() !!}
        </form>
    </div>
</div>
<div class="col-md-1" >
    <button style="margin-top: 163px;" class="btn btn-default btn-md"><span class="glyphicon glyphicon-chevron-right"></span></button>
</div>
<div class="col-md-5" >
     <div class="form-area" style="height: 458px;">  
       <h3 style="margin-bottom: 25px; text-align: center;">Funcionalidades asociadas</h3>
        <a href="{{ URL::to('funcionalidades/crear') }}"><button type="button" style="margin-top: 316px;" id="submit" name="funcionalidad" class="btn btn-primary pull-right">Añadir Funcionalidad</button></a>
    </div>
</div>
</div>
@endsection

@section('javascript')
    	<script src="{{ URL::asset('js/altaRoles.js') }}"></script>
@endsection