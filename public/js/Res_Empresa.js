$("#error").hide();
$("#ClaveError").hide();
$("#id_usuario").hide();
$('#myModalRegistro').modal('show'); // show bootstrap modal




// $(document).on('submit', '#registrar', function(e)
// {  
//     e.preventDefault();
//     var formData = new FormData($('#registrar')[0]);
//      $.ajax({
//         method:'post',
//         url:base_url+'Login/PostEmpresa',
//         data:formData,
//         cache:false,
//         contentType:false,
//         processData:false,
//         success: function(respuesta){
//             if(respuesta==="exito"){
//                 alert("Registros Guardados");
//                 $("#error").hide();
//                 $("#registrar")[0].reset();
//             }
//             else{
//                 $("#error").show();
//             }
//         }
//      });
// });

// $(document).on('submit', '#registrarAdmin', function(e)
// { 
//     e.preventDefault();
//     var form = $('#registrarAdmin')[0]; // You need to use standard javascript object here
//     var formData = new FormData(form);
//     $.ajax({
//         url:base_url+'Login/PostEmpresa',
//         data: formData,
//         type: 'POST',
//         contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
//         processData: false, // NEEDED, DON'T OMIT THIS
//         // ... Other options like success and etc
//         success: function(respuesta){
//             if(respuesta==="exito"){
//                 alert("Registros Guardados");
//                 $("#error").hide();
//                 $("#registrarAdmin")[0].reset();
//             }
//             else{
//                 $("#error").show();
//             }
//         },error: function (request, status, error) {
//             alert(request.responseText);
//         }
//     });
    
// });

$(document).on('submit', '#solicitud', function(e)
{
    e.preventDefault();
    var formData = new FormData($('#solicitud')[0]); 
    $.ajax({
        method:'post',
        url:base_url+'Login/ValidarRegistro',
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success: function(respuesta)
        {
            if(respuesta==="valida")
            {
                alert("Clave validad");
                $('#myModalRegistro').modal('hide'); 
            }
            else{
                $("#ClaveError").show();
                console.log();
            }
        }
    });
});
