 var funcionalidades_Asociadas = new Array();

$(document).ready(function(){ 
    $('#select_funcionalities_list').click(function(){
        //
        var funcionalidad_selected = $( "#funcionalidades option:selected" ).text();
        funcionalidades_Asociadas.push(funcionalidad_selected);
        var lista = $('#list_funcionalities').text();
        var no_Array = true;
        for(var i = 0; i < funcionalidades_Asociadas.length; i++){
            if(funcionalidad_selected == funcionalidades_Asociadas[i])
                no_Array = false;
        }
        alert(no_Array);
        if(no_Array == false){
              $('#list_funcionalities').html(lista + '<br/>' + funcionalidad_selected);
        }
        
    });
    $('#characterLeft').text('140 caracteres');
    $('#descripcion').keydown(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('Usted ha sobre pasado el liite de caracteres permitidos!');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' caracteres');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });    
});