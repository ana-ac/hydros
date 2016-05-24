@extends('app')

@section('css')
    <link href="/css/perfilUsuario.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
      <div class="row">
 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
        @if ($errors->has())
            
            @foreach ($errors->all() as $error)
                <div class='bg-danger alert'>{{ $error }}</div>
            @endforeach
        @endif
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Crea nuevo usuario</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                    <form method="POST" action="guardarCambiosUsuario">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <table class="table table-user-information">
                        <tbody>
                          <tr>
                            <td>Nombre:</td>
                            <td><input type="text" name="nombre" value="" /></td>
                          </tr>
                          <tr>
                            <td>Apellidos:</td>
                            <td><input type="text" name="apellidos" value="" /></td>
                          </tr>
                          <tr>
                            <td>Contraseña</td>
                            <td><input type="password" name="contraseña" vvalue="" /></td>
                          </tr>
                            <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="" /></td>
                          </tr>
                          <tr>
                            <td>Número de teléfono</td>
                            <td><input type="text" name="telefono" value="" /></td>
                          </tr>
                        </tbody>
                      </table>
                  <input type="submit" value="Guardar" class="btn btn-primary btn-warning pull-right" />
                  <a href="#" class="btn btn-primary btn-danger ">Cancelar</a>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
@endsection

@section('javascript')
    	<script src="js/perfilUsuario.js"></script>
@endsection
