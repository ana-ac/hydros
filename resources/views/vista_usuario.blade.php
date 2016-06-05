<!DOCTYPE html>
<!-- HTML5 Hello world by kirupa - http://www.kirupa.com/html5/getting_your_feet_wet_html5_pg1.htm -->
<html lang="">

<head>
	<meta charset="utf-8">
	<title>HYDROS</title>
	<meta charset="UTF-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo_usuario.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo_ventana.css') }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<!-- libreria interact para drag and drop de ventana de aplicacion -->
	<script src="{{ URL::asset('js/interact/interact.js') }}" ></script>
	<script src="{{ URL::asset('js/ventana-aplicacion.js') }}" ></script>
	<!-- tinyMCE , wysiwyg para editor de texto enriquezido -->
	<!-- <link rel="apple-touch-icon" href="//mindmup.s3.amazonaws.com/lib/img/apple-touch-icon.png" />
    <link rel="shortcut icon" href="http://mindmup.s3.amazonaws.com/lib/img/favicon.ico" >
    <link href="external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="{{ URL::asset('js/wysiwyg/hotkeys.js') }}"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="external/google-code-prettify/prettify.js"></script>
	<link href="index.css" rel="stylesheet">
    <script src="bootstrap-wysiwyg.js"></script>
  	<script>
  		$('#editor').wysiwyg();
  	</script>-->
  	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script src="{{ URL::asset('js/wysiwyg/wysiwyg.js') }}" ></script>
  	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/wysiwyg/wysiwyg.css') }}">

</head>

<script type="text/javascript">


</script>

<body onload="" >

		<div id="ventana" id="inner-dropzone" class="dropzone" >
			
			
			<div class="ventana_aplicacion draggable resize-drag">
				<div class="navegacion">
					<img class="boton_cerrar" src="images/ico_close.png" alt="Botón Cerrar">
				</div>
				<div class="contenedor">
					<textarea ></textarea>
				</div>
			</div>
		  		<!--<div id="yes-drop" class="draggable resize-drag ventana_aplicacion drag-drop">
		  			<div id="editor"></div>
		  		</div>-->
		  		
		  		
		</div>
		
	<!--<div id="ventana">
		<div class="ventana_aplicacion">
			<div class="navegacion">
				<img class="boton_cerrar" src="images/ico_close.png" alt="Botón Cerrar">
			</div>
			<div class="contenedor">
				<h1>Ventana de aplicacion</h1>

			</div>

		</div>
	</div>-->

	<div id="barra_nav">
		<span id="barra_nav_menu">
			<img src="images/ico_menu.png" alt="Botón Menú">
		</span>
		<div class="aplicacion explorador_ficheros" ><img src="{{ URL::asset('imgs/funcionalidades/explorador.png') }}" /></div>
		<div class="aplicacion"><img src="{{ URL::asset('imgs/funcionalidades/editor.png') }}" /></div>
		<div class="aplicacion"><img src="{{ URL::asset('imgs/funcionalidades/calendario.png') }}" /></div>

		<span id="barra_nav_hora">
			1:08<br>02/05/2016
		</span>
	</div>
	<div id="fondo_barra_nav"></div>

</body>
	<script>
		$( ".explorador_ficheros" ).click(function() {
			cargarVentana({"nombre": "Explorador" });
		});
		
		
		// Cargará las ventanas de las funcionalidades, pasandole un array asoci como atributo
		function cargarVentana(datos){
			
			var ventana_aplicacion = document.createElement('div'); // creamos la ventana de la funcionalidad
			$(ventana_aplicacion).attr("class","ventana_aplicacion draggable resize-drag");		// añadimos los atributos a la ventana http://api.jquery.com/attr/#attr-attributes
			
			// creamos la Navegacio de la ventana
			var navegacion = document.createElement('div');
			$(navegacion).attr("class", "navegacion");
			$(navegacion).append("<span class='titulo'>" + datos.nombre + "</span>");
			
				// array de botones (cerraar, maximizar, minimizar)
				var botones_navegacion = new Array();
				
				var boton_cerrar = document.createElement('img');
					$(boton_cerrar).attr({
						class: "boton_cerrar",
						src: "images/ico_close.png",
						alt: "Botón Cerrar",
						onClick: "cerrarVentana(this)"
					});
				
				botones_navegacion.push(boton_cerrar);
				
				// Añadimos los botones de la ventana de navegacion
				jQuery.each( botones_navegacion, function( i, val ) {
					$(navegacion).append(val);
				});
			
			var contenedor =  document.createElement('div');
			$(contenedor).attr("class", "contenedor");
			
			// Se hace una peticion ajax al servidor para recibir el codigo de la aplicacion   https://api.jquery.com/jquery.get/
		    $.ajax({
			    type: "POST",
			    url: "/aplicaciones/prueba",
			    //data: '{"id":"1"}',
			    headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
			    contentType: "application/json; charset=utf-8",
			    dataType: "json",
			    success: function(data) {
			    	
			        $(contenedor).append("<h1>" + data.datos + "</h1>");
			        
			    },
			    error: function(data){
			        alert("AJAX REQUEST FAIL");
			    }
			});
		    
		
			// Añadimos los elementos a la ventana de aplicacion
			$(ventana_aplicacion).append(navegacion); 
			$(ventana_aplicacion).append(contenedor); 
			
			
			//  Añadimos la ventana de la aplicacion al escritorio
			$("#ventana").append(ventana_aplicacion); 
			
			// Recogemos el alto de la barra de navegacion (height + padding-top + padding-bottom)
			var altoNavegacion = parseInt($('.navegacion').css('height').replace(/[^-\d\.]/g, '')) + parseInt($('.navegacion').css('padding-top').replace(/[^-\d\.]/g, '')*2)  ; 
			
			// Retocamos estilo (concretamente top) para que el cuerpo de la ventana este por debajo de la barra de navegacion
			$('.contenedor').css({top: altoNavegacion})
			
			// Damos la accion onclick al boton cerrar
			$( ".boton_cerrar" ).click(function(e) {
				$(this).parent().parent().remove();
			});	

		}
		
		// Cuando la ventana gana el foco se pone delante
		$(".ventana_aplicacion").focus(function(e) {
			this.css({zIndex: 500})
		});
		
		$(".ventana_aplicacion").focusout(function(e) {
			this.css({zIndex: 10})
		});
		
		// Boton cerrar ventana	
		$( ".boton_cerrar" ).click(function(e) {
				$(this).parent().parent().remove();
		});	

		// Quitamos drag and drop en el elemento .contenedor de la ventana_aplicacion
	</script>
</html>
