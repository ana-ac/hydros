<!DOCTYPE html>
<!-- HTML5 Hello world by kirupa - http://www.kirupa.com/html5/getting_your_feet_wet_html5_pg1.htm -->
<html lang="">

<head>
	<meta charset="utf-8">
	<title>HYDROS</title>
	<meta charset="UTF-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" />

<!-- estilo de ventana y ventas de aplicacion -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo_usuario.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo_ventana.css') }}">
	
<!-- libreria interact para drag and drop de ventana de aplicacion -->
	<script src="{{ URL::asset('js/interact/interact.js') }}" ></script>
	<script src="{{ URL::asset('js/ventana-aplicacion.js') }}" ></script>
	
<!--editor de texto enriquezido -->
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script src="{{ URL::asset('js/wysiwyg/wysiwyg.js') }}" ></script>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/wysiwyg/wysiwyg.css') }}">
	
<!-- fullcalendar -->
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.3/lang/es.js'></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.3/fullcalendar.css' />
<link rel='stylesheet' href='css/fullcalendar.css' />

<!--modal bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/modals.css') }}">
	
<!-- datapiker -->
<link href="{{ URL::asset('css/datatimepiker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">


  	@yield('css')
  	@yield('script')

</head>

<body>
	@include('logs')
	@if(Session::has('error_code'))
	<script>
	$('#basicModal').on('loaded.bs.modal', function (e) {
			  $('#basicModal').focus()
	})
	</script>
	@endif

											
		
	<!-- ventana de zona de trabajo-->
	<div id="ventana" id="inner-dropzone" class="dropzone" >
		
		
	</div>	
	
	<script>
		
		var ventana_aplicacion = $('<div><div/>').attr({
									    name: '0',
									    class: "ventana_aplicacion draggable resize-drag"
									});
		
		var navegacion = $('<div><div/>').attr({ class: "navegacion"});
			$(navegacion).append($('<span class="titulo">explorador</span>'));
			$(navegacion).append($('<img />').attr({
					class: "boton_cerrar"	,
					src: "images/ico_close.png",
					alt: "Botón Cerrar"
				}));
		var contenedor = $('<div><div/>').attr({ style: "top:5px", class: "embed-container contenedor"});
		$(contenedor).append($('<iframe><iframe/>').attr({ src: "/ficheros", class: "embed-responsive-item contenedor"}));
		
		$(ventana_aplicacion).append(navegacion);
		$(ventana_aplicacion).append(contenedor);
		
		$('#ventana').append(ventana_aplicacion);

	</script>
		
	<div id="barra_nav">
		<a href="{{ URL::to('/logout') }}" ><span id="barra_nav_menu">
			<span class="glyphicon glyphicon-log-out log-out" aria-hidden="true"><strong>Logout</strong></span>
		</span>
		</a>
		<div class="aplicacion" name="explorador" data-id="0" id="0" ><span class="glyphicon glyphicon-folder-open" ></span></div>
		@foreach($rol->funcionalidades as $funcionalidad)
			<div class="aplicacion" name="{{ $funcionalidad->nombre }}" data-id="{{$funcionalidad->id}}" id="{{$funcionalidad->id}}" ><span class="glyphicon {{$funcionalidad->icono}}" ></span></div>
		@endforeach

		<div id="barra_nav_hora">
			<span id="fecha"></span>
		</div>
	</div>
	<div id="fondo_barra_nav"></div>

</body>

<script type="text/javascript" src="{{ URL::asset('js/datatimepiker/bootstrap-datetimepicker.js') }}" charset="UTF-8" ></script>
<script type="text/javascript" src="{{ URL::asset('js/datatimepiker/locales/bootstrap-datetimepicker.es.js') }}" charset="UTF-8"></script>
	   
<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/explorador/navegacion.js') }}"></script>

<script>
		
	var aplicacionesActivas = new Array(); // array aplicaciones activas
		
	$(".aplicacion").click(function(event){
		var parent = $(event.target).parent();
		var idFuncionalidad = parent.get( 0 ).id;
		var nombre = parent.attr('name');
		
		//si la aplicacion no se encuentra en el array de aplicaciones activas llamamos a la función cargar ventana
		 if(!isInArray(idFuncionalidad, aplicacionesActivas)){
		       aplicacionesActivas.push(idFuncionalidad);
		       cargarVentana({"nombre": nombre , "recurso" : idFuncionalidad });
		 }
		 
	});
		
	function isInArray(value, array) {
	  return array.indexOf(value) > -1;
	}
		
	$('#datetimepicker1').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	
		
		// Cargará las ventanas de las funcionalidades, pasandole un array asoci como atributo
		function cargarVentana(datos){
			
			var ventana_aplicacion = document.createElement('div'); // creamos la ventana de la funcionalidad
			
			// añadimos los atributos a la ventana
			$(ventana_aplicacion).attr({
				class : "ventana_aplicacion draggable resize-drag",
				name  : datos.recurso
			});
			
			//ventana_aplicacion.style.top = '200px';
			//ventana_aplicacion.style.left = '200px';
			
			ventana_aplicacion.addEventListener('click',focusAplicacion ,true);
			
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
						alt: "Botón Cerrar"
					});
				
				botones_navegacion.push(boton_cerrar);
				
				// Añadimos los botones de la ventana de navegacion
				jQuery.each( botones_navegacion, function( i, val ) {
					$(navegacion).append(val);
				});
			
			var contenedor =  document.createElement('div');
			$(contenedor).attr("class", "contenedor");
			
			// Si es el navegador
			if(datos.recurso == 0){
				
			}else{
				
			
			// Se hace una peticion ajax al servidor para recibir el codigo de la aplicacion   https://api.jquery.com/jquery.get/
		    $.ajax({
			    type: "POST",
			    url: "/aplicaciones/" + datos.recurso,
			    //data: '{"id":"1"}', // se le puede pasar datos a la peticion ajax para que llegue al servidor
			    headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
			    contentType: "application/json; charset=utf-8",
			    dataType: "json",
			    success: function(data) {
			        
			        $(contenedor).append(data.vista);
			        //var objetoJson = data.parseJSON;
			        //alert(data);
			        console.log(data);
			        //$(head).append(data.require);
			        
			       
			        
			       if(data.id == 1){ // funcionalidad editor
		        	  tinymce.init({
					  selector: 'div.tinymce',
					  elemts : "wysiwyg",
					  width : "100%",
					  height : "350px",
					 menu: {
					    view: {title: 'Fichero', items: 'save'}
					  },
					  plugins: [
					    'advlist autolink lists link image charmap print preview anchor',
					    'searchreplace visualblocks code fullscreen',
					    'insertdatetime media table contextmenu paste code',
					    "autoresize"
					  ],
					  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
					  content_css: [
					    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
					    '//www.tinymce.com/css/codepen.min.css'
					  ]					
					  
					});
					
				}
				
				if(data.id == 2){ //funcionalidad calendario
				
					//si pulsan el boton de nuevo evento en el calendario
					document.getElementById('newEvento').addEventListener('click', nuevoEvento , false);
					
						var today = new Date();
							var dd = today.getDate();
							var mm = today.getMonth()+1; //January is 0!
							var yyyy = today.getFullYear();
							
						var fecha = yyyy + '/' + mm + '/' + dd;
						
						//vamos a realizar una llamada a jax anidada, ya que si la aplicacion devuelta es calendario/agenda peiremos los eventos que existan en la base de datos
						 $.ajax({
						    type: "POST",
						    url: "/eventos",
						    //data: '{"id":"1"}', // se le puede pasar datos a la peticion ajax para que llegue al servidor
						    headers: {
					            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					        },
						    contentType: "eventos/json; charset=utf-8",
						    dataType: "json",
						    success: function(data) {
						    	console.log(data);
						    }else: function(data){
						    	alert('no events ajax');
						    }
						
						
				        $('#calendar').fullCalendar({
						    header: {
						        left: 'prev,next today myCustomButton',
						        center: 'title',
						        right: 'month,agendaWeek,agendaDay'
						    },
				            defaultDate: fecha,
				            editable: true,
				           selectable: true,
				            eventLimit: true, // allow "more" link when too many events
				        });
					        
					}
  
			    },
			    error: function(data){
			        alert("AJAX REQUEST FAIL");
			    }
			});
		    
			}
		
			// Añadimos los elementos a la ventana de aplicacion
			$(ventana_aplicacion).append(navegacion); 
			$(ventana_aplicacion).append(contenedor); 
			
			
			//  Añadimos la ventana de la aplicacion al escritorio
			$("#ventana").append(ventana_aplicacion); 
			
			// Recogemos el alto de la barra de navegacion (height + padding-top + padding-bottom)
			var altoNavegacion = parseInt($('.navegacion').css('height').replace(/[^-\d\.]/g, '')) + parseInt($('.navegacion').css('padding-top').replace(/[^-\d\.]/g, '')*2)  ; 
			
			// Retocamos estilo (concretamente top) para que el cuerpo de la ventana este por debajo de la barra de navegacion
			$('.contenedor').css("top" , "45px")
			
			// Damos la accion onclick al boton cerrar
			$( ".boton_cerrar" ).click(function(e) {
				var vent_aplicacion = $(this).parent().parent().remove();
				var name = vent_aplicacion.attr('name');
				//tambien deberemos borrar el ide de funcionalidad en el array de aplicaiones activas
				var indice = aplicacionesActivas.indexOf(name);
				aplicacionesActivas.splice(indice,1);
				console.log(aplicacionesActivas);
			});	
			

		}
		
		function focusAplicacion(event){
			var objeto = event.target.parentNode;
			for(var i = 0; i < aplicacionesActivas.length; i++){
				var selector = "div[name='" + aplicacionesActivas[i] +"']";
				$(selector).removeClass("active");
				$(selector).css("z-index",'0');
			}
			var clases = $(objeto).attr("class") + " active";
			$(objeto).attr("class", clases)
		}
		
		
		setInterval(function(){
			
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();
			
			var fecha = dd + '/' + mm + '/' + yyyy;
			var hora = today.getHours() + ':' + today.getMinutes() + ':' + today.getSeconds();
			$('#fecha').html(hora + '<br>' + fecha);
		},1000);
	
		
		function nuevoEvento(event){  //haremos una petición ajax para crear el nuevo evento
			$('#basicModal').on('loaded.bs.modal', function (e) {
			  $('#basicModal').focus()
			})
		}
		
	</script>
</html>
