@extends('app')

@section('css')
    	<link href="/css/filtrosUsuarios.css" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	        <div class="panel panel-primary filterable" id="style_div_users" >
	            <div class="panel-heading" id="header_users" >
	                <h3 class="panel-title">Busqueda parametrizada de Usuarios</h3>
	                <div class="pull-right">
	                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
	                </div>
	            </div>
	            <table class="table">
	                <thead>
	                    <tr class="filters">
	                        <th><input type="text" class="form-control" placeholder="id" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="nombre" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="apellidos" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="email" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="fecha alta" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="fecha baja" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="estado" disabled></th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td>1</td>
	                        <td>vadim</td>
	                        <td>Turcanu</td>
	                        <td>vadimhydros@gmail.com</td>
	                        <td>2016-08-05</td>
	                        <td class="center"> - </td>
	                        <td><span class="label label-success">Active</span></td>
	                    </tr>
	                    <tr>
	                        <td>2</td>
	                        <td>ana</td>
	                        <td>arriaga</td>
	                        <td>anahydros@gmail.com</td>
	                        <td>2016-01-05</td>
	                       	<td>2016-11-05</td>
	                        <td><span class="label label-warning">Hold</span></td>
	                    </tr>
	                    <tr>
	                        <td>3</td>
	                        <td>juan</td>
	                        <td>serbos</td>
	                        <td>j.serbos@gmail.com</td>
	                        <td>2016-03-05</td>
	                         <td><span class="center" > - </span></td>
	                        <td><span class="label label-success">Active</span></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>

		</div>
	</div>
</div>

@endsection

@section('javascript')
	<script src="js/filtrosUsuarios.js"></script>
@endsection