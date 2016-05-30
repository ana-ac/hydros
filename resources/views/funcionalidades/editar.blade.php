@extends('header')

@section('css')
    	<link href="/css/altaRoles.css" rel="stylesheet">
@endsection

@section('content')
@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> Ha ocurrido un problema...<br><br>
		<ul>
			@foreach ($errors as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
<div class="container">
<div class="col-md-12">
    <div class="form-area"> 
    {!! Form::open(array('url' => 'funcionalidades/' . $funcionalidad->id)) !!}
        <form role="form">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;"> Editar Funcionalidad {!! $funcionalidad->nombre !!} </h3>
    				<div class="form-group">
						 {!! Form::text('nombre', $funcionalidad->nombre, array('class' => 'form-control','id' => 'nombre','placeholder' => 'nombre')) !!}
					</div>
					
                    <div class="form-group">
                    {!! Form::textarea('descripcion', $funcionalidad->descripcion , array('class' => 'form-control','id' => 'descripcion','maxlength' => '140', 'rows' => '7')) !!}
                        <span class="help-block"><p id="characterLeft" class="help-block ">Usted ha pasado el limite de caracteres</p></span>                    
                    </div>
                    
                    @if($funcionalidad->id)
                      {!! Form::hidden ('_method', 'PUT') !!}
                     @endif
            
             {!! Form::submit('Actualizar Funcionalidad', array('class' => 'btn btn-primary pull-right','id' => 'submit')) !!}
             {!! Form::close() !!}
        </form>
    </div>
</div>

</div>
@endsection

@section('javascript')
    	<script src="js/altaRoles.js"></script>
@endsection