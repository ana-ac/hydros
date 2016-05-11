@extends('app')

@section('css')
    	<link href="/css/altaRoles.css" rel="stylesheet">
@endsection

@section('content')
   <div class="container">
<div class="col-md-12">
    <div class="form-area">  
        <form role="form">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;"> Editar Funcionalidad ... </h3>
    				<div class="form-group">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
					</div>
					
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="descripcion" placeholder="descripcion" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">Usted ha pasado el limite de caracteres</p></span>                    
                    </div>
            
            <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Actualizar Funcionalidad</button>
        </form>
    </div>
</div>

</div>
@endsection

@section('javascript')
    	<script src="js/altaRoles.js"></script>
@endsection