@extends('app')

@section('css')
    	<link href="/css/altaUsuario.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container " >
      <div class="col-xs-12 pagination-centered">

        
              
        <!-- <form method="post" action="altaUsuario"> -->
        {!! Form::open(['url' => 'altaUsuario' ]) !!}
          <br style="clear:both">
          <h3 style="margin-bottom: 25px; text-align: center;">Nuevo Usuario</h3>
          
            <div class="form-group">
              {!! Form::text('nombre', Input::old('nombre'), ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Nombre']  ) !!}
            </div>
            
            <div class="form-group">
              {!! Form::text('apellidos', Input::old('apellidos'), ['class' => 'form-control', 'id' => 'apellidos', 'placeholder' => 'Apellidos']  ) !!}
            </div>
            
            <div class="form-group">
              {!! Form::password('contraseña', Input::old('contraseña'), ['class' => 'form-control', 'id' => 'contraseña', 'placeholder' => 'Contraseña']  ) !!}
            </div>
           
            
            <div class="form-group ">
              {!! Form::email('email', Input::old('email'), ['class' => 'form-control required', 'id' => 'email', 'placeholder' => 'Email', 'required' => 'required']  ) !!}
            </div>
            
            <div class="form-group">
              {!! Form::text('telefono', Input::old('telefono'), ['class' => 'form-control', 'id' => 'telefono', 'placeholder' => 'Teléfono']  ) !!}
            </div>
            
            <div  class="form-group">
              {!! Form::select('tipo', ['0' => 'normal', '1' => 'administrador'], Input::old('tipo'), ['class' => 'form-control', 'placeholder' => 'Tipo de usuario']) !!}   <!-- http://laravel-recipes.com/recipes/163/creating-a-select-box-field -->
            </div>
             
            <div  class="form-group">
              {!! Form::select('rol', $roles, Input::old('rol'), ['placeholder' => 'Rol del usuario', 'class' => 'form-control']) !!}   <!-- http://laravel-recipes.com/recipes/163/creating-a-select-box-field -->
            </div>

              
        {!! Form::submit('Crear Usuario', array('class' => 'btn btn-primary pull-right','id' => 'submit')) !!}
        {!! link_to('listadoUsuarios', 'Cancelar', array('class' => 'btn btn-primary btn-danger ')) !!}
        {!! Form::close() !!}

      </div>
      @include('logs')
    </div>
@endsection

@section('javascript')
    	<script src="js/perfilUsuario.js"></script>
@endsection
