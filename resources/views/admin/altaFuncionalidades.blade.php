@extends('app')

@section('css')
    	<link href="/css/altaRoles.css" rel="stylesheet">
@endsection

@section('content')
@if (count($errores) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> Ha ocurrido un problema...<br><br>
		<ul>
			@foreach ($errores as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

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
    	<script src="js/altaRoles.js"></script>
@endsection