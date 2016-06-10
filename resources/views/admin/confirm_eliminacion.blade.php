<!-- CONFIRMAR ELIMINAR -->
<script>
    $('form[method="POST"]').submit(function() {
        if( $("input[type='submit']").val() == 'Eliminar' || $("input[name='_method']").val() == 'DELETE'){
            return confirm("¿Quiere eliminar el elemento?"); 
        }
    });
    
    $('.alert-dismissable').delay( 6000 ).slideUp(1000);

</script>