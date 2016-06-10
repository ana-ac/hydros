<style>
    *{
        padding: 0;
        margin:0;
    }
    #navegacion {
        width: 100%;
        height: 100%;

        position: relative;
        overflow-y: auto;
    }
    
    .ruta_actual {
        width:100%;
        height:30px;
        position: absolute;
        top: 0;
        left: 0;
        border-bottom: 2px solid grey;
    }
    
    .ruta_actual input {
        width:100%;
        height:100%;
    }
    
    .detalle {
        width:100%;
        height: 90%;
        position:absolute;
        padding-top: 10px;
        top:30px;
    }
    
        .fichero, .carpeta{
            width: 100px;
            height: 100px;
            margin: 5px ;
            float: left;
            
            text-align: center;
            position: relative;
            overflow: none;
        }
        
        .fichero:hover, .carpeta:hover{
            background-color:grey;
        }
        
        .fichero{
            
        }
        
        .carpeta{
            
        }
            .icono{
                width: 80px;
                height: 80px;
                position: relative;
            }
            .nombre{
                position: absolute;
                bottom: 0px;
                left: 0px;
                width: 100px;
            }
        
        .seleccionado {
            border: 2px solid grey;
            padding-left: 10px;
        }
    
</style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

@section('css')

@endsection
@section('script')
    <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

@endsection
<div id="navegacion">
    <span class="ruta_actual">
        <input id="path_actual" type="text" value="{{ $directorioActual}}" readonly/>
    </span>
    <span class="detalle">
       @foreach ($directorios as $directorio) 
            @if (is_array($directorio))
                <div class="carpeta" > 
                    <img class="icono" src="{{ URL::asset('/imgs/explorador/logo_carpeta.png') }}" />
                    <span class="nombre"><?php 
                        $posicion = strrpos(key($directorio), "/")+1;
                        $devolver = substr(key($directorio) , $posicion);
                        echo $devolver ;
                    ?></span>
                </div>
            @else
                <div class="fichero" > 
                    <img class="icono" src="{{ URL::asset('imgs/explorador/logo_fichero.png') }}" />
                    <span class="nombre"><?php 
                        $posicion = strrpos($directorio, "/")+1;
                        $devolver = substr($directorio , $posicion);
                        echo $devolver ;
                    ?></span>
                </div>
            @endif
            
        @endforeach      
    </span>
</div>

<script>
    // Se pasan los directorios de servidor a cliente y se trabaja con ellos para obtener el subdirectorio
    var directorios = '{{ json_encode($directorios) }}';
    
    pintarDirectorio(directorios);
    
    // alert(directorios);
    
    /*  Pinta la estructura del directorio.
    *   Recibe como parametro un array asociativo
    */
    function pintarDirectorio(array){
        for(var key in array) {
          
            if( typeof key == 'object'){
                var carpeta  = $("<div></div>").attr("class","carpeta");
                alert();
                $(carpeta).append( $("<img></img>").attr( {class:"icono", src:"/imgs/explorador/logo_carpeta.png'"}) );
                
                var index = key.lastIndexOf("/"); // Recogemos la posicion del ultimo /
                var nombre = key.substring(index);
                
                $(carpeta).append( $("<span></span>").attr( "class", "nombre" ).text( nombre ) );
                
                $(".detalle").append(carpeta);
                
            }else{
                
               
            }
            
        }
    }
    
    
    $('.carpeta').dblclick(function(e){
        // Se crea la nueva ruta de fichero
        var ruta = $("#path_actual").val() +  $(this).find( "span" ).text() ;
        
        location.href= "ficheros/"+ ruta;
       
    });
    
    
</script>