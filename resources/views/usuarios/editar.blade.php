@extends('admin/admin')

@section('css')
    <link href="{{ URL::asset('css/perfilUsuario.css') }}" rel="stylesheet">
@endsection

@include('logs')
 @include('admin/titulo', array('titulo' => 'Usuarios', 'subtitulo' => 'edición', 'mensaje' 
  => 'podrás editar los datos personales del usuario elegido'))

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
      <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Editando el perfil del usuario {{ $usuario->nombre .' :: ' }} {{ $usuario->email }}</h3>
          </div>
          
          {!! Form::open(['url' => '/usuarios/actualizar/'.$usuario->id  , 'method' => 'post' ])  !!}
          <div class="panel-body">
            <div class="col-md-3 col-lg-3 " align="center"> 
              <img alt="User Pic" src="http://www.rebiun.org/PublishingImages/iconos/Grupo.png" class="img-circle img-responsive"> 
            </div>
            
            <div class=" col-md-9 col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
              <div class=" col-md-9 col-lg-9 ">
                  <br style="clear:both">
                  
                  <tr>
                    <td>Nombre:</td>
              				<td><span class="form-group">
                        {!! Form::text('nombre', $usuario->nombre, ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Nombre']  ) !!}
                      </span></td>
                  </tr>
                  <tr>
                    <td>Apellidos:</td>
                      <td><span class="form-group">
                        {!! Form::text('apellidos', $usuario->apellidos, ['class' => 'form-control', 'id' => 'apellidos', 'placeholder' => 'Apellidos']  ) !!}
                      </span></td>
                  </tr>   
                  <tr>
                    <td>Contraseña:</td>
                    <td><span class="form-group">
                        {!! Form::password('contraseña', $usuario->password, ['class' => 'form-control', 'id' => 'contraseña', 'placeholder' => 'Contraseña']  ) !!}
                    </span></td>
                  </tr>
                  <tr>    
                    <td>Email:</td>
                      <td><span class="form-group ">
                        {!! Form::email('email', $usuario->email , ['class' => 'form-control required', 'id' => 'email', 'placeholder' => 'Email', 'required' => 'required', 'readonly']  ) !!}
                      </span></td>
                  </tr>
                  <tr>    
                    <td>Número de teléfono:</td>
                      <td><span class="form-group">
                        {!! Form::text('telefono', $usuario->telefono, ['class' => 'form-control', 'id' => 'telefono', 'placeholder' => 'Teléfono']  ) !!}
                      </span></td>
                  </tr>
                  <tr>  
                    <td>Tipo de usuario:</td>
                     <td><span  class="form-group">
                        {!! Form::select('tipo', ['0' => 'normal', '1' => 'administrador'], $usuario->tipo , ['class' => 'form-control', 'placeholder' => 'Tipo de usuario']) !!}   <!-- http://laravel-recipes.com/recipes/163/creating-a-select-box-field  -->
                      </span></td>
                  </tr>
                  <tr>     
                    <td>Rol de usuario:</td>
                      <td><span  class="form-group">
                        {!! Form::select('rol', $roles, $usuario->rol , ['placeholder' => 'Rol del usuario', 'class' => 'form-control']) !!}   <!-- http://laravel-recipes.com/recipes/163/creating-a-select-box-field  -->
                      </span></td>
                  </tr>     
            </div>
                   
          </div>
                
            </tbody>
          </table> 
        </div>
        
        <div class="panel-footer">

          {!! Form::submit('Guardar', array('class' => 'btn btn-primary pull-right','id' => 'submit')) !!}
          
          {!! link_to('usuarios', 'Cancelar', array('class' => 'btn btn-primary btn-danger ')) !!}
        </div>
        {!! Form::close() !!}
            
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
    	<script src="{{ URL::asset('js/perfilUsuario.js') }}"></script>
@endsection
