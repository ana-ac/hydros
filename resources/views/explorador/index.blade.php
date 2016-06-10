<html>
    <head>
        <meta name="csrf_token" content="{{ csrf_token() }}" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/explorador/estilo.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" />

    </head>
    <body>
        <div id="navegacion">
            <div class="wrapper_position"></div>

            <span class="ruta_actual">
                <img class="icono_volver" src="{{ URL::asset('/imgs/explorador/logo_volver.png') }}" />
                <input id="path_actual" type="text" value="{{$directorioActual}}" readonly/>
                <
            </span>
                        
            <div class="detalle" id="destino">

                @foreach ($directorios as $nombre => $ruta) 
                    @if (is_array($ruta))
                        <div class="carpeta" > 
                            <span class="eliminar glyphicon glyphicon-remove" hidden></span> 
                            <img class="icono" src="{{ URL::asset('/imgs/explorador/logo_carpeta.png') }}" />
                            <span class="nombre">{{ $nombre }}</span>
                            <span class="ruta_oculta"> {{ $ruta[0] }} </span>
                        </div>
                    @else
                        <div class="fichero" > 
                            <span class="eliminar glyphicon glyphicon-remove" hidden></span>
                            <img class="icono" src="{{ URL::asset('imgs/explorador/logo_fichero.png') }}" />
                            <span class="nombre">{{ $nombre }}</span>
                            <span class="ruta_oculta"> {{ $ruta }} </span>
                        </div>
                    @endif
                    
                @endforeach   
                
                <div class="nueva btn btn-default " > 
                    <span class="ico glyphicon glyphicon-plus" ></span>
                    <span class="nombre">Crear Carpeta</span>
                </div>
            </div>
            
            <div class="wrapper_position"></div>
        </div>
        
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/explorador/navegacion.js') }}"></script>
    </body>
    
    <script>
        $(".nueva").click(function(e){
            
            var fichero = $("<div class='fichero'></div>");
            var imagen = $('<img class="icono" src="/imgs/explorador/logo_carpeta.png" />');
            var nombre = $('<input type="text" class="nombre" placeholder="Nueva Carpeta" />');
            
            $(fichero).append(imagen);
            $(fichero).append(nombre);
            $(".detalle").append(fichero);
            
            $(nombre).focus();
            $(fichero).append(nombre);
           $(nombre).keyup(function(e){
                // Si pulsa enter
                if(e.keyCode == 13)
                {   
                    var nombre = $(this).val();
                    
                    if(!nombre){
                        $(this).parent().remove();
                    }else{
                      nombre =  nombre.replace(" ", "");
                      nombre =  nombre.replace(/[^0-9a-zA-Z-]/g, '');
                    } 
                    
                   
                    location.href= "/ficheros/nuevo/"+ nombre;
                    
                }
                
                if(e.keyCode == 27)
                {   
                    $(this).parent().remove();
                }
            
           });
           
           $(nombre).focusout(function(e){
                $(this).parent().remove();

           });
                    
        });
        
        
        $('.eliminar').click(function(e){
            var nombre = $(this).siblings(".nombre").html();
            
            if(confirm("Quiere eliminar " +  nombre+ " ?")){
                location.href= "/ficheros/eliminar/"+ nombre;
            }
        });
                
    </script>
    
    
    
    
    
    
    
</html>

    