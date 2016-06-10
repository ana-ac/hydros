@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/altaRoles.css') }}" rel="stylesheet">
    	<!-- include ficheros para plugin iconpiker -->
    
<!-- Bootstrap-Iconpicker -->
<link rel="stylesheet" href="{{ URL::asset('bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}" />
@endsection

@section('content')

@include('logs')
@include('admin/titulo', array('titulo' => 'Funcionalidades', 'subtitulo' => 'alta', 'mensaje' 
 => 'podrás crear nuevas funcionalidades que se quieran desarrollar para nuevos perfiles profesionales.'))

<div class="container-fluid">
<div class="col-md-12">
     {!! Form::open(['url' => 'funcionalidades']) !!}
    <div class="form-area">  
        <div class="row">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Nueva Funcionalidad</h3>
                    <div class="col-md-6">
        				<div class="form-group">
        				    {!! Form::label('nombre_funcionalidad', 'Nombre de funcionalidad') !!}
    						 {!! Form::text('nombre', Input::old('nombre'), array('class' => 'form-control','id' => 'nombre','placeholder' => 'nombre')) !!}
    					</div>
    				</div>
    				<div class="col-md-6">
    					<div class="form-group" style="margin-top: 10px;">
    					    {!! Form::label('icono_funcionalidad', 'Icono asociado') !!}
    						<button name="icono" class="btn btn-success btn-lg" data-rows="4" data-cols="4" data-footer="false" data-iconset="glyphicon" data-icon="glyphicon-calendar" role="iconpicker"  ></button>
    					</div>
					</div>
					<div class="col-lg-12" >
                        <div class="form-group">
                          {!! Form::label('descripcion_funcionalidad', 'Descripción') !!}
                         {!! Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control','id' => 'descripcion','maxlength' => '140', 'rows' => '7')) !!}
                            <span class="help-block"><p id="characterLeft" class="help-block ">Usted ha pasado el limite de caracteres</p></span>                    
                        </div>
                    </div>
                    {!! Form::submit('Crear Funcionalidad', array('class' => 'btn btn-primary pull-right','id' => 'submit')) !!}
                    {!! Form::close() !!}
       </div>
    </div>
</div>

</div>

@endsection

@section('javascript')
    	<script src="{{ URL::asset('js/altaRoles.js') }}"></script>
    <!-- Bootstrap-Iconpicker Iconset for Glyphicon -->
<script type="text/javascript" src="{{ URL::asset('bootstrap-iconpicker/js/iconset/iconset-glyphicon.min.js') }}"></script>
<!-- Bootstrap-Iconpicker -->
<script type="text/javascript" src="{{ URL::asset('bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') }}"></script>
@endsection