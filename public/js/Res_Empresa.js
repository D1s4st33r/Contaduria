$("#error").hide();
$("#id_usuario").hide();
$('#myModalRegistro').modal('show'); // show bootstrap modal




$(document).on('submit', '#registrar', function(e) {

    e.preventDefault();
    var formData = new FormData($('#registrar')[0]);

    ;
    $.ajax({

        method: 'post',
        url: base_url + 'Login/PostEmpresa',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,


        success: function(respuesta) {
            if (respuesta === "exito") {

                alert("Registros Guardados");
                $("#error").hide();
                $("#registrar")[0].reset();


            } else {
                $("#error").show();
                $("#myModal").show()
                console.log();
            }



        }




    });
});

$(document).on('submit', '#solicitud', function(e) {







    e.preventDefault();
    var formData = new FormData($('#solicitud')[0]);

    ;
    $.ajax({

        method: 'post',
        url: base_url + 'Login/ValidarRegistro',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,


        success: function(respuesta) {
            if (respuesta === "valida") {

                alert("Registros Guardados");
                $("#error").hide();
                $("#registrar")[0].reset();
                $('#myModalRegistro').modal('hide'); // show bootstrap modal


            } else {
                $("#error").show();
                $("#myModal").show()
                console.log();
            }



        }




    });


});