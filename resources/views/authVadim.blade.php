<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Daily UI - Day 1 Sign In</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/vadim/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/vadim/style.css">
		<link href="/css/listadoRoles.css" rel="stylesheet">
    	<link href="/css/filtrosUsuarios.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="top">
				<h1 id="title" class="hidden"><span id="logo">HYDROS</span></h1>
			</div>
	        <div class="panel panel-primary filterable" id="style_div_users" >
	            <div class="panel-heading" id="header_users" >
	                <h3 class="panel-title"> Listado de Roles</h3></h3>
	                <div>
	                     <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Nuevo Rol</a>
	                </div>
	            </div>
	            <table class="table">
	                <thead>
	                    <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha Alta</th>
                        <th class="text-center">Action</th>
	                </thead>
	                <tbody>
	                    <tr>
	                        <td>1</td>
                            <td>Básico</td>
                            <td>2016-02-05</td>
                            <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            	       </tr>
	                    <tr>
	                        <td>2</td>
                            <td>Administrativo</td>
                            <td>2016-30-04</td>
                            <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>

		</div>
	</div>
</div>
	<!--<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">HYDROS</span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password">
			<br/>
			<button type="submit">Sign In</button>
			<br/>
			<a href="#"><p class="small">Forgot your password?</p></a>
		</div>
	</div>-->
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>