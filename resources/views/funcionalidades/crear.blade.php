@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/altaRoles.css') }}" rel="stylesheet">
@endsection

@section('content')

@include('logs')
@include('admin/titulo', array('titulo' => 'Funcionalidades', 'subtitulo' => 'alta', 'mensaje' 
 => 'podrás crear nuevas funcionalidades que se quieran desarrollar para nuevos perfiles profesionales.'))

<div class="container">
<div class="col-md-12">
     {!! Form::open(['url' => 'funcionalidades']) !!}
    <div class="form-area">  
        <form role="form">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Nueva Funcionalidad</h3>
    
    				<div class="form-group">
						 {!! Form::text('nombre', Input::old('nombre'), array('class' => 'form-control','id' => 'nombre','placeholder' => 'nombre')) !!}
					</div>
					
                    <div class="form-group">
                     {!! Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control','id' => 'descripcion','maxlength' => '140', 'rows' => '7')) !!}
                        <span class="help-block"><p id="characterLeft" class="help-block ">Usted ha pasado el limite de caracteres</p></span>                    
                    </div>
                    
                    {!! Form::submit('Crear Funcionalidad', array('class' => 'btn btn-primary pull-right','id' => 'submit')) !!}
                    {!! Form::close() !!}
        </form>
    </div>
</div>

</div>

@endsection

@section('javascript')
    	<script src="{{ URL::asset('js/altaRoles.js') }}"></script>
@endsection