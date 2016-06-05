<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>HYDROS - login</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="css/login/style.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom Stylesheet -->
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	
	<script>
		function setCookie(c_name, value, exdays) {
		    var exdate = new Date();
		    exdate.setDate(exdate.getDate() + exdays);
		    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
		    document.cookie = c_name + "=" + c_value;
		}
	
	    function getCookie(c_name) {
	        var i, x, y, ARRcookies = document.cookie.split(";");
	        for (i = 0; i < ARRcookies.length; i++) {
	            x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
	            y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
	            x = x.replace(/^\s+|\s+$/g, "");
	            if (x == c_name) {
	                return unescape(y);
	            }
	        }
	    }
	
	    function DeleteCookie(name) {
	            document.cookie = name + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
	        }
	        
	        
	    $(window).load(function () {
			 //if IsRefresh cookie exists
			 var IsRefresh = getCookie("IsRefresh");
			 if (IsRefresh != null && IsRefresh != "") {
			    //cookie exists then you refreshed this page(F5, reload button or right click and reload)
			    //SOME CODE
			    DeleteCookie("IsRefresh");
			 }
			 else {
			    //cookie doesnt exists then you landed on this page
			    // cargamos <link rel="stylesheet" href="css/login/animate.css"> si es la primera vez que entramos
				$("<link/>", {
				   rel: "stylesheet",
				   type: "text/css",
				   href: "css/login/animate.css"
				}).appendTo("head");		    
			    setCookie("IsRefresh", "true", 1);
			 }
		});
		
		
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
</head>

<body>
	<div id="background"></div>
	<div class="container ">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Hydr <span>OS</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			{!! Form::open(['url' => '/login', 'method' => 'post' ]) !!}
				
	            <div class="form-group">
        			<label for="email">Correo Electrónico</label><br/>	
	              	{!! Form::text('email', Input::old('email'), ['class' => 'form-control', 'id' => 'email' , 'required' => 'required']  ) !!}
	            </div>
			
				 <div class="form-group">
        			<label for="password">Contraseña</label><br/>	
	              	{!! Form::password('password', null, ['class' => 'form-control', 'id' => 'password', 'required' => 'required']  ) !!}
	            </div>
				
				{!! Form::submit('Entrar', array('class' => 'btn btn-primary ','id' => 'submit')) !!}
			{!! Form::close() !!}
			@include('logs')
		</div>
	</div>
</body>



</html>