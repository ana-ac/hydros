$(document).ready(function(){ 
    $('#select_funcionalities_list').click(function(){
        //
        var funcionalidad_selected = $( "#funcionalidades option:selected" ).text();
        var lista = $('#list_funcionalities').text();
    
        $('#list_funcionalities').text(lista + funcionalidad_selected);
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