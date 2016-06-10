@extends('admin/admin')

@section('css')
    	<link href="{{ URL::asset('css/altaRoles.css') }}" rel="stylesheet">
    	<!-- Bootstrap-Iconpicker -->
<link rel="stylesheet" href="{{ URL::asset('bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}" />
@endsection

@section('content')

@include('logs')
@include('admin/titulo', array('titulo' => 'Funcionalidades', 'subtitulo' => 'edición', 'mensaje' 
 => 'podrás editar datos de alguna funcionalidad ya existente o añadir algunos extra.'))
 
 <div class="container-fluid">
<div class="col-md-12">
      {!! Form::open(array('url' => 'funcionalidades/' . $funcionalidad->id)) !!}
    <div class="form-area">  
        <div class="row">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Editar Funcionalidad {!! $funcionalidad->nombre !!}</h3>
                    <div class="col-md-6">
        				<div class="form-group">
        				    {!! Form::label('nombre_funcionalidad', 'Nombre de funcionalidad') !!}
    						{!! Form::text('nombre', $funcionalidad->nombre, array('class' => 'form-control','id' => 'nombre','placeholder' => 'nombre','readonly' => 'readonly')) !!}
    					</div>
    				</div>
    				<div class="col-md-6">
    					<div class="form-group" style="margin-top: 10px;">
    					    {!! Form::label('icono_funcionalidad', 'Icono asociado') !!}
    							<button name="icono" class="btn btn-success btn-lg" data-rows="4" data-cols="4" data-footer="false" data-iconset="glyphicon" data-icon="{{$funcionalidad->icono}}" role="iconpicker"  ></button>
    					</div>
					</div>
					<div class="col-lg-12" >
                        <div class="form-group">
                          {!! Form::label('descripcion_funcionalidad', 'Descripción') !!}
                          {!! Form::textarea('descripcion', $funcionalidad->descripcion , array('class' => 'form-control','id' => 'descripcion','maxlength' => '140', 'rows' => '7')) !!}
                            <span class="help-block"><p id="characterLeft" class="help-block ">Usted ha pasado el limite de caracteres</p></span>                    
                        </div>
                    </div>
                    
                     @if($funcionalidad->id)
                      {!! Form::hidden ('_method', 'PUT') !!}
                     @endif
                     
                   {!! Form::submit('Editar Funcionalidad', array('class' => 'btn btn-primary pull-right','id' => 'submit')) !!}
                         {!! link_to('/funcionalidades', 'Cancelar', array('class' => 'btn btn-primary btn-danger pull-left')) !!}
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