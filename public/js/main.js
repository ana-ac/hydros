/**
 * Created by Julio Mederos.
 */


var destino;

function main (){

    //Obtenemos una referencia al elemento donde se soltarán los ficheros
    destino = document.getElementById("destino");
    destino.addEventListener("dragenter", dragenter, false);
    destino.addEventListener("dragleave", dragleave, false);
    destino.addEventListener("dragover", dragover, false);
    destino.addEventListener("drop", drop, false);
}
/****************************************************************************************************************/
/*                                      Manejadores de eventos drag and drop                                    */
/****************************************************************************************************************/
function dragenter(e) {
    e.stopPropagation();
    e.preventDefault();
    e.target.style.backgroundColor = "lightgreen";
}

function dragleave(e) {
    e.stopPropagation();
    e.preventDefault();
    e.target.style.backgroundColor = "white";
}

function dragover(e) {
    e.stopPropagation();
    e.preventDefault();

}

function drop(e) {
     e.target.style.backgroundColor = "white";
//    e.target.style.backgroundColor = "lightskyblue";

    e.stopPropagation();
    e.preventDefault();

    /*Recuperamos los ficheros una vez hemos procedido a soltarlos sobre la zona deseada*/
    var dt = e.dataTransfer;
    var files = dt.files;

    console.log("Numero de ficheros arrastrados: " + files.length);

    /*
     File tiene tres atributos que contienen información util sobre el fichero.
     name   ----> Es de solo lectura y es el nombre del fichero sin ninguna información sobre el path.
     size   ----> Es de solo lectura y es el tamaño del fichero en bytes como un entero de 64-bit.
     type   ----> Es de solo lectura y contiene MIME type del fichero, o "" si el tipo no puede ser determinado.
     */

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        console.log(i + ". file.name: " + file.name + " file.size: " + file.size + " file.type: " + file.type);

        if(subidoPreviamente(file.name)){
            var conf = confirm("El fichero " + file.name + " fué subido previamente. \n  ¿Desea volver a subirlo ?");

            if(conf){
                var oldFile = document.getElementById(file.name);
                var oldPrg = document.getElementById("prg_txt_"+file.name);
                oldFile.removeAttribute("id");
                oldPrg.removeAttribute("id");
                subirFichero(files[i]);
            }

        }else{
            subirFichero(files[i]);
        }

    }

}
/****************************************************************************************************************/

/* Metodo para comprobar si existe un elemento con un "id" especifico en el html */
function subidoPreviamente(idFichero){
    var existe = document.getElementById(idFichero);

    if(existe){
        return true;
    }else{
        return false;
    }
}


/************************************************************************************/
/*                                      AJAX                                        */
/************************************************************************************/
/* Devuelve un objeto XHR segun el navegador*/
function XHR() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        return new XMLHttpRequest();
    } 
}

/* Asigna el valor del objto XHR a la variabel xhr de este script */
function createConnAjax() {
    xhr = XHR()
};
/************************************************************************************/

/* Procesador de respuesta cuando se envía un fichero */
function procesadorRespuestaFicheros(e){
var evento = e || window.event;

    if(evento.target.readyState == 4 && evento.target.status == 200){
        var response = evento.target.responseText;
        console.log(response);
    }

}

/* Metodo que permite parametrizar la peticion AJAX */
function processRequest(method, url, responseProcessor, fichero) {

    /* Creamos un nuevo objeto XHR cada vez que se solicita la subida de un fichero */
    var xhr = XHR();
    var frm = new FormData();
    frm.append("fichero", fichero);
    
    
    $('meta[name=csrf_token]').attr("content");
    
    //Creamos y añadimos un nuevo nodo a la zona de informacion. Mostramos visualmente informacion del fichero que estamos subiendo
    crearInfoElement(fichero);

    /* ****************************************************************************************** */
    /* Asignamos los manejadores de eventos para los eventos que lanza el objeto XHR  */
    xhr.addEventListener("readystatechange", responseProcessor);

    xhr.addEventListener("loadstart", function (e) {
        manejadorStart(e)
    });
    xhr.addEventListener("abort", function (e) {
        manejadorAbort(e)
    });
    /********************** ----------------------- *****************************************/
    /********************** Propios de los ficheros *****************************************/
    /********************** ----------------------- *****************************************/
    xhr.upload.addEventListener("progress", function (e) {
        manejadorProgress(e, fichero.name)
    });
    //xhr.timeout = 500; // Establecer en un tiempo corto para provocar el evento de arriba
    xhr.upload.addEventListener("timeout", function (e) {
        manejadorTimeOut(e)
    });
    xhr.upload.addEventListener("load", function (e) {
        manejadorLoad(e)
    });
    /********************** ----------------------- *****************************************/
    /* ****************************************************************************************** */
    var token = getMeta();

    xhr.open(method, url, true);
    xhr.setRequestHeader('X-CSRF-Token',token );
    xhr.send(frm);
}

function getMeta() { 
   var metas = document.getElementsByTagName('meta'); 

   for (var i=0; i<metas.length; i++) { 
      if (metas[i].getAttribute("name") == "csrf_token") { 
         return metas[i].getAttribute("content"); 
      } 
   } 

    return "";
} 

function subirFichero(fichero){
    processRequest("POST","/ficheros",procesadorRespuestaFicheros, fichero);
}

function crearInfoElement(fichero){
    var trInfo = document.createElement("tr");

    var tdName = document.createElement("td");
    var tdSize = document.createElement("td");
    var tdType = document.createElement("td");
    var tdProgress = document.createElement("td");
    var tdProgressTxt = document.createElement("td");

    var txtName = document.createTextNode(fichero.name);
    var txtSize = document.createTextNode(fichero.size);
    var txtType = document.createTextNode(fichero.type);

    tdName.appendChild(txtName);
    tdSize.appendChild(txtSize);
    tdType.appendChild(txtType);

    var prg = document.createElement("progress");
    prg.setAttribute("id",fichero.name);
    prg.setAttribute("value","0");
    prg.setAttribute("max","100");

    var prg_txt = document.createElement("span");
    prg_txt.setAttribute("id","prg_txt_"+fichero.name);
    prg_txt.appendChild(document.createTextNode("---"));

    tdProgress.appendChild(prg);
    tdProgressTxt.appendChild(prg_txt);

    trInfo.appendChild(tdName);
    trInfo.appendChild(tdSize);
    trInfo.appendChild(tdType);
    trInfo.appendChild(tdProgress);
    trInfo.appendChild(tdProgressTxt);

    var informacion = document.getElementById("informacion");
//    informacion.appendChild(trInfo);
}



/**********************************************************************/
function manejadorStart(e) {
    var evento = e || window.event;
    console.log("-------loadstart--------Se dispara al empezar a recibir datos del servidor.-----------");
}

function manejadorAbort(e) {
    var evento = e || window.event;
    console.log("------abort------Se produce al cancelar la transacción con el método abort() del objeto XMLHttpRequest ------------");
}

function manejadorProgress(e, idProgress) {
    var evento = e || window.event;
    console.log("------progress-------------------------");
    var porcentaje = (e.loaded * 100) / e.total;
    //console.log("e.lengthComputable " + e.lengthComputable + " e.loaded " + e.loaded + " e.total " + e.total + " porcentaje " + porcentaje); // Bytes
    console.log(idProgress + " " + Math.round(porcentaje));

    /* Actualizamos con este manejador el valor del elemento progress correspondiente al fichro que estamos subiendo */
    var progreso = document.getElementById(idProgress);
    progreso.value = Math.round(porcentaje);

    /* Actualizamos con este manejador el valor porcentual del elemento span correspondiente al fichero que estamos subiendo */
    var progreso_texto = document.getElementById("prg_txt_"+idProgress);
    progreso_texto.firstChild.nodeValue = progreso.value + " %";
}

function manejadorTimeOut(e) {
    var evento = e || window.event;
    console.log("------timeout.------ Se dispara si se cumple el plazo de la transacción expresado en la propiedad timeout del objeto XMLHttpRequest. -------------------");
}

function manejadorLoad(e) {
    var evento = e || window.event;
    console.log("------load-------Se dispara al finalizar la transacción.------------------");
     setTimeout('', 1000);
    // Se recarga la pagina, desde servidor
    location.reload(true);
}

/***************************************************************/


