
function hacerCambio(divById ,url)
{
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        after: function(){

        },
        success: function(data){

            $("#"+divById).html("");
            $("#"+divById).html(data);
        }
    });
}
var divPerfil ="";
function hacerCambiosPostAsy(datosPost,urlDes,div)
{
    $.ajax({
        type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
        url:urlDes, //urlDes guarda la ruta hacia donde se hace la peticion
        data:datosPost, // data recive un objeto con la informacion que se enviara al servidor
        dataType: "html" ,// El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
        success: function(datos){ //success es una funcion que se utiliza si el servidor retorna informacion
             div.html(datos);

        }
    });
}


function actualizarDatosUsuario(url)
{
   nombre_ = $("#nombre").val();
   apellido_ = $("#apellido").val();
   telefono_ = $("#telefono").val();
   email_ = $("#email").val();
    if(nombre_ != "" && apellido_ != "" && telefono_ != "" && email_ !="" )
    {
        post = {
            nombre:nombre_,
            apellido:apellido_,
            email:email_,
            telefono:telefono_
        };
        hacerCambiosPostAsy(post,url,$("#perfil"));
       
    }
    
}
