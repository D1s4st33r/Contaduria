$("#error").hide();
$(document).on('submit', '#registrar', function(e)
{
     
        e.preventDefault();
        var formData = new FormData($("#registrar")[0]);
        console.log( $( this ).serialize() );
     $.ajax({

        method: 'post',
        url: this.serialize,
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success: function(respuesta){
            alert(respuesta);
        }


     });
});