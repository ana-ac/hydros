@extends('app')

@section('css')
    <link href="/css/perfilUsuario.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="edit.html" >Editar usuario</A>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Perfil de usuario</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre:</td>
                        <td>Ana</td>
                      </tr>
                      <tr>
                        <td>Apellidos:</td>
                        <td>Arriaga coll</td>
                      </tr>
                      <tr>
                        <td>Alias</td>
                        <td>AnaAC</td>
                      </tr>
                   
                        <tr>
                            <td>Contraseña</td>
                            <td> ------ </td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td><a href="mailto:anahydros@gmail.com">anahydros@gmail.com</a></td>
                      </tr>
                        <tr>
                            <td>Fecha alta</td>
                            <td>2016-02-08</td>
                      </tr>
                        <tr>
                        <td>Fecha baja</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Número de teléfono</td>
                        <td>606675887
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">Mis Roles</a>
                  <a href="#" class="btn btn-primary">Mis Funcionalidades</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Enviar email" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Editar usuario" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
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
