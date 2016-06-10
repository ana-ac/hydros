@extends('admin/admin')

@section('css')
    <link href="{{ URL::asset('css/perfilUsuario.css') }}" rel="stylesheet">
@endsection

@section('content')

 @include('logs')
@include('admin/titulo', array('titulo' => 'Usuario', 'subtitulo' => 'detalle', 'mensaje' 
 => 'puedes ver la información del usuario elegido'))
 
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Perfil del usuario {{ $usuario->nombre . ' :: ' . $usuario->email}}</h3>
              
              
            </div>
            
            <div class="panel-body">


            <div class=" col-md-9 "> 
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://www.rebiun.org/PublishingImages/iconos/Grupo.png" class="img-circle img-responsive"> </div>

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
                        <td>	
                          @if($usuario->created_at != null)
              								{{ $usuario->created_at }}
              						@else
              								 - 
              						@endif
              					</td>
                   </tr>
                  <tr>
                    <td>Número de teléfono</td>
                    <td>{{ $usuario->telefono  }}</td>
                  </tr>
                  <tr>
                    <td>Tipo</td>
                    <td>
                      @if($usuario->tipo == 0)
      								    <span class="label label-success">Normal</span>
      							    @else
      								     <span class="label label-warning">Administrador</span>
      						      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Roll</td>
                    <td>{{ $roles[$usuario->rol ]}}</td>
  						    </tr>
							    
                
                  </tbody>
                </table>
                  
              </div>
                

            </div>
            
            <div class="panel-footer">
              <a href="{{ URL::route('usuarios.editar', [$usuario->id]) }}" data-original-title="Editar usuario" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>

              <span class="pull-right">
                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('usuarios.eliminar', $usuario->id ))) !!}
                   {!! Form::submit('Eliminar') !!}
                {!! Form::close() !!}
              </span>
            </div>   
          </div>
          
        </div>
      </div>
    </div>
@endsection

@section('javascript')
    	<script src="{{ URL::asset('js/perfilUsuario.js') }}"></script>
@endsection
