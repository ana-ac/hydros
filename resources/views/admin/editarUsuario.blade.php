@extends('app')

@section('css')
    <link href="/css/perfilUsuario.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
      <div class="row">
 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Perfil de usuario</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

                <div class=" col-md-9 col-lg-9 "> 
                    <form method="POST" action="guardarCambiosUsuario">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <table class="table table-user-information">
                        <tbody>
                          <tr>
                            <td>Nombre:</td>
                            <td><input type="text" name="nombre" value="{{ $usuario->nombre or ''  }}" /></td>
                          </tr>
                          <tr>
                            <td>Apellidos:</td>
                            <td><input type="text" name="apellidos" value="{{ $usuario->apellidos or ''   }}" /></td>
                          </tr>
                          <tr>
                            <td>Contraseña</td>
                            <td><input type="password" name="contraseña" value="{{ $usuario->contraseña or ''   }}" /> </td>
                          </tr>
                            <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="{{ $usuario->email or ''   }}" /></td>
                          </tr>
                            <tr>
                                <td>Fecha alta</td>
                                <td><input type="text" name="telefono" value="{{ $usuario->created_at or ''   }}" readonly="readonly"/></td>
                           </tr>
                          <tr>
                            <td>Número de teléfono</td>
                            <td><input type="text" name="telefono" value="{{ $usuario->telefono or ''   }}" /></td>
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
