$('.icono_volver').click(function(e){
    // Se crea la nueva ruta de fichero
    var ruta =$('#path_actual').val() ;
    var index = ruta.lastIndexOf("/"); // Recogemos la posicion del ultimo /
    var nombre = ruta.substring(index+1);
    
    location.href= "/ficheros/_atras_"+ nombre;
});


// Abrir Carpeta
$('.carpeta').dblclick(function(e){
    // Se crea la nueva ruta de fichero
    var ruta = $(this).find(".nombre").text() ;
    location.href= "/ficheros/"+ ruta;
    
});

   

function getMeta() { 
   var metas = document.getElementsByTagName('meta'); 

   for (var i=0; i<metas.length; i++) { 
      if (metas[i].getAttribute("name") == "csrf_token") { 
         return metas[i].getAttribute("content"); 
      } 
   } 

    return "";
}

// Abrir fichero
$('.fichero').dblclick(function(e){
    var nombreFichero = $(this).find(".nombre").text();
    location.href = "/ficheros/abrir/" + nombreFichero;
});
     
