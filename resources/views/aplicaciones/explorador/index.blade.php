<div id="navegacion container">
   
    <span class="ruta_actual">
         <img class="icono_volver" src="{{ URL::asset('/imgs/explorador/logo_volver.png') }}" />
        <input id="path_actual" type="text" value="{{$directorioActual}}" readonly/>
    </span>
                
    <span class="detalle" id="destino">

        @foreach ($directorios as $nombre => $ruta) 
            @if (is_array($ruta))
                <div class="carpeta" > 
                    <img class="icono" src="{{ URL::asset('/imgs/explorador/logo_carpeta.png') }}" />
                    <span class="nombre"> {{ $nombre }}</span>
                    <span class="ruta_oculta"> {{ $ruta[0] }} </span>
                </div>
            @else
                <div class="fichero" > 
                    <img class="icono" src="{{ URL::asset('imgs/explorador/logo_fichero.png') }}" />
                    <span class="nombre">{{ $nombre }}</span>
                    <span class="ruta_oculta"> {{ $ruta }} </span>
                </div>
            @endif
            
        @endforeach   
        
    </span>
    
</div>