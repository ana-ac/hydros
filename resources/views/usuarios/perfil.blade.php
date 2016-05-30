@extends('header')

@section('css')
    <link href="/css/perfilUsuario.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Perfil del usuario {{ $usuario->nombre . ' :: ' . $usuario->email}}</h3>
            </div>
            
            <div class="panel-body">

                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://www.rebiun.org/PublishingImages/iconos/Grupo.png" class="img-circle img-responsive"> </div>

            <div class=" col-md-9 col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Nombre:</td>
                    <td>{{ $usuario->nombre }}</td>
                  </tr>
                  <tr>
                    <td>Apellidos:</td>
                    <td>{{ $usuario->apellidos  }}</td>
                  </tr>
                  <tr>
                    <td>Contraseña</td>
                    <td> ------ </td>
                  </tr>
                    <tr>
                    <td>Email</td>
                    <td><a href="mailto:{{ $usuario->email  }}">{{ $usuario->email  }}</a></td>
                  </tr>
                    <tr>
                        <td>Fecha alta</td>
                        <td>{{ $usuario->created_at  }}</td>
                   </tr>
                  <tr>
                    <td>Número de teléfono</td>
                    <td>{{ $usuario->telefono  }}</td>
                  </tr>
                  <tr>
                    <td>Tipo</td>
                    <td>{{ $usuario->tipo  }}</td>
                  </tr>
                  <tr>
                    <td>Fecha de alta</td>
                    @if($usuario->created_at != null)
  								    <td>{{ $usuario->created_at }}</td>
  						    	@else
  								    <td><span class="center" > - </span></td>
  							    @endif
							    </tr>
							    <tr>
							      <td>Estado</td>
  							    @if($usuario->estado == 1)
  							      <td><span class="label label-success">Activo</span></td>
  						      @else
  						        <td><span class="label label-warning">Inactivo</span></td>
  					        @endif
                  </tr>
                  
                  </tbody>
                </table>
                  
              </div>
                

            </div>
            
            <div class="panel-footer">
              <span class="pull-right">
                  <a href="{{ URL::route('usuarios.editar', [$usuario->id]) }}" data-original-title="Editar usuario" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                  <a data-original-title="Borrar usuario" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
              </span>
            </div>   
          </div>
          
        </div>
      </div>
    </div>
@endsection

@section('javascript')
    	<script src="js/perfilUsuario.js"></script>
@endsection
