@extends('app')

@section('css')
    	<link href="/css/altaRoles.css" rel="stylesheet">
@endsection

@section('content')
   <div class="container">
<div class="col-md-5">
    <div class="form-area">  
        Form::open(array('action' => 'RolController@store'))
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Nuevo Rol</h3>
    				<div class="form-group">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
						Form::text ('nombre', $rol->nombre)
					</div>
					<div class="form-group">
						<select class="form-control" id="funcionalidades" name="funcionalidades">
						    @foreach($funcionalidades as $funcionalidad)
						        <option value="{{ $funcionalidad->funcionalidad_id }}">{{ $funcionalidad->nombre }}</option>
						    @endforeach
						</select>
					</div>
					
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="descripcion" placeholder="descripcion" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">Usted ha pasado el limite de caracteres</p></span>                    
                    </div>
            
        <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Añadir Rol</button>
        
    </div>
</div>
<div class="col-md-1" >
    <button id="select_funcionalities_list" style="margin-top: 163px;" class="btn btn-default btn-md"><span class="glyphicon glyphicon-chevron-right"></span></button>
</div>
<div class="col-md-5" >
     <div class="form-area" style="height: 458px;">  
       <h3 style="margin-bottom: 25px; text-align: center;">Funcionalidades asociadas</h3>
       <span id="list_funcionalities" ></span>
        <a href="/altaFuncionalidades"><button type="button" style="margin-top: 316px;" id="submit" name="funcionalidad" class="btn btn-primary pull-right">Añadir Funcionalidad</button></a>
    </div>
</div>
</div>
@endsection

@section('javascript')
    	<script src="js/altaRoles.js"></script>
@endsection