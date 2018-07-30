/**
 * Funciones Generales para peticion ajax
 * 
 * */

/*
 * @param {div para colorcar el response de la url} divById 
 * @param {url donde se hace el GET} url 
 */
function hacerCambio(divById, url) {
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        success: function(data) {
            $("#" + divById).html("");
            $("#" + divById).html(data);
        }
    });
}
var divPerfil = "";

/**
 * 
 * @param {objetoPost} datosPost 
 * @param {Url del recurso} urlDes 
 * @param {div de la vista} div 
 */
function hacerCambiosPostAsy(datosPost, urlDes, div) {
    $.ajax({
        type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
        url: urlDes, //urlDes guarda la ruta hacia donde se hace la peticion
        data: datosPost, // data recive un objeto con la informacion que se enviara al servidor
        dataType: "html", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
        success: function(datos) { //success es una funcion que se utiliza si el servidor retorna informacion
            alert(datos);
            div.html(datos);
        }
    });
}



/**
 * 
 * @param {*} url 
 * @param {*} tituloPanel 
 */
function actualizarDatosUsuario(url, tituloPanel) {
    nombre_ = $("#nombre").val();
    apellido_ = $("#apellido").val();
    telefono_ = $("#telefono").val();
    email_ = $("#email").val();
    if (nombre_ != "" && apellido_ != "" && telefono_ != "" && email_ != "") {
        post = {
            nombre: nombre_,
            apellido: apellido_,
            email: email_,
            telefono: telefono_
        };
        hacerCambiosPostAsy(post, url, $("#perfil"));
        hacerCambio("TituloPanel", tituloPanel);

    }
}


function AgregarUsuario(url) {
    nombre_ = $("#nombre").val();
    apellido_ = $("#apellido").val();
    telefono_ = $("#telefono").val();
    email_ = $("#email").val();
    contrasena_ = $("#contrasena").val();

    if (nombre_ != "" && apellido_ != "" && telefono_ != "" && email_ != "" && contrasena_ != "") {
        post = {
            nombre: nombre_,
            apellido: apellido_,
            email: email_,
            telefono: telefono_,
            clave: contrasena_
        };



        hacerCambiosPostAsy(post, url, $("#contadoresReg"));


    }
}


function AgregarCliente(url) {
    nombre_ = $("#nombre").val();
    apellido_ = $("#apellido").val();
    telefono_ = $("#telefono").val();
    email_ = $("#email").val();
    contrasena_ = $("#contrasena").val();
    if (nombre_ != "" && apellido_ != "" && telefono_ != "" && email_ != "" && contrasena_ != "") {
        post = {
            nombre: nombre_,
            apellido: apellido_,
            email: email_,
            telefono: telefono_,
            clave: contrasena_
        };

        hacerCambiosPostAsy(post, url, $("#clienteReg"));
        hacerCambio("Controles", );
    }
}

function updateContador(iddiv, url) {
    var id_ = "";
    var nombre_ = "";
    var apellido_ = "";
    var telefono_ = "";
    var email_ = "";

    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "id") { id_ = $(this).val(); }
        if ($(this).attr("name") == "nombre") { nombre_ = $(this).val(); }
        if ($(this).attr("name") == "apellido") { apellido_ = $(this).val(); }
        if ($(this).attr("name") == "telefono") { telefono_ = $(this).val(); }
        if ($(this).attr("name") == "email") { email_ = $(this).val(); }
    });
    if (nombre_ != "" && apellido_ != "" && telefono_ != "" && email_ != "" && id_ != "") {
        post = {
            id: id_,
            nombre: nombre_,
            apellido: apellido_,
            email: email_,
            telefono: telefono_
        };
        
        hacerCambiosPostAsy(post, url, $("#contadoresReg"));
    }
}

function ValidarClave(url) {
    ClaveRegistro_ = $("#ClaveRegistro").val();
   

    if (ClaveRegistro_ != "") {
        post = {
            ClaveRegistro:ClaveRegistro_
        };
        console.log(post);
        hacerCambiosPostAsy(post, url, $("#registrar"));
    }
}

function updateCliente(iddiv, url) {
    var id_ = "";
    var nombre_ = "";
    var apellido_ = "";
    var telefono_ = "";
    var email_ = "";

    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "id") { id_ = $(this).val(); }
        if ($(this).attr("name") == "nombre") { nombre_ = $(this).val(); }
        if ($(this).attr("name") == "apellido") { apellido_ = $(this).val(); }
        if ($(this).attr("name") == "telefono") { telefono_ = $(this).val(); }
        if ($(this).attr("name") == "email") { email_ = $(this).val(); }
    });
    if (nombre_ != "" && apellido_ != "" && telefono_ != "" && email_ != "" && id_ != "") {
        post = {
            id: id_,
            nombre: nombre_,
            apellido: apellido_,
            email: email_,
            telefono: telefono_
        };
        hacerCambiosPostAsy(post, url, $("#clienteReg"));
    }
}




function EliminarUsuario(iddiv, url) {
    var id_ = "";
    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "id") { id_ = $(this).val(); }
    });
    if (id_ != "") {
        post = {
            id: id_
        };
        hacerCambiosPostAsy(post, url, $("#contadoresReg"));
    }

}

function EliminarCliente(iddiv, url) {
    var id_ = "";
    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "id") { id_ = $(this).val(); }
    });
    if (id_ != "") {
        post = {
            id: id_
        };
        hacerCambiosPostAsy(post, url, $("#clienteReg"));
    }

}

function agregarCategoria(iddiv, url) {
    var categoria_ = "";
    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "categoria") { categoria_ = $(this).val(); }
    });
    if (categoria_ != "") {
        post = {
            categoria: categoria_
        };
        hacerCambiosPostAsy(post, url, $("#categorias"));
    }
}

function actualizarCategoria(iddiv, url) {
    var categoria_ = "";
    var id_ = "";
    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "categoria") { categoria_ = $(this).val(); }
        if ($(this).attr("name") == "id") { id_ = $(this).val(); }
    });
    if (categoria_ != "") {
        post = {
            categoria: categoria_,
            id: id_
        };
        hacerCambiosPostAsy(post, url, $("#categorias"));
    }
}

function eliminarCategoria(iddiv, url) {
    var id_ = "";
    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "id") { id_ = $(this).val(); }
    });
    if (id_ != "") {
        post = {
            id: id_
        };
        hacerCambiosPostAsy(post, url, $("#categorias"));
    }
}

function agregarSeccion(iddiv, url) {
    var categoria_ = "";
    var seccion_ = "";
    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "categoria") { categoria_ = $(this).val(); }
        if ($(this).attr("name") == "seccion") { seccion_ = $(this).val(); }
    });
    if (categoria_ != "" && seccion_ != "") {
        post = {
            categoria: categoria_,
            seccion: seccion_
        };
        hacerCambiosPostAsy(post, url, $("#seccypre"));
    }
}

function actualizarSeccion(iddiv, url) {
    var nombre_ = "";
    var id_ = "";
    var div = $("#" + iddiv);
    var input = div.find("input");
    var select = div.find("select");
    input.each(function() {
        if ($(this).attr("name") == "nombre") { nombre_ = $(this).val(); }
    });
    select.each(function() {
        if ($(this).attr("name") == "seccion") { id_ = $(this).val(); }
    });
    if (nombre_ != "") {
        post = {
            seccion: nombre_,
            id: id_
        };
        hacerCambiosPostAsy(post, url, $("#seccypre"));
    }
}

function eliminarSeccion(iddiv, url) {
    var id_ = "";
    var div = $("#" + iddiv);
    var finds = div.find("select");
    finds.each(function() {
        if ($(this).attr("name") == "id") { id_ = $(this).val(); }
    });
    if (id_ != "") {
        post = {
            id: id_
        };
        hacerCambiosPostAsy(post, url, $("#seccypre"));
    }
}

function agregarPregunta(iddiv, url) {
    var categoria_ = "";
    var seccion_ = "";
    var div_ = "";
    var texto_ = "pregunta";
    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "categoria") { categoria_ = $(this).val(); }
        if ($(this).attr("name") == "seccion") { seccion_ = $(this).val(); }
        if ($(this).attr("name") == "divindex") { div_ = $(this).val(); }
    });
    if (categoria_ != "" && seccion_ != "") {
        post = {
            categoria: categoria_,
            seccion: seccion_,
            texto: texto_,
            div: div_
        };
        hacerCambiosPostAsy(post, url, $("#preguntas" + div_));
    }
}

function actualizarPregunta(iddiv, url) {
    var id_ = "";
    var div_ = "";
    var categoria_ = "";
    var seccion_ = "";
    var texto_ = "";
    var tipo_ = "";
    var soliarchivo_ = "";
    var obligatorio_ = "";
    var preguntaOpcional_ = "";

    var div = $("#" + iddiv);
    var inputs = div.find("input");
    var select = div.find("select");
    inputs.each(function() {
        if ($(this).attr("name") == "id") { id_ = $(this).val(); }
        if ($(this).attr("name") == "pregunta") { texto_ = $(this).val(); }
        if ($(this).attr("name") == "archivo") { soliarchivo_ = $('[name="archivo"]:checked').attr('value'); }
        if ($(this).attr("name") == "obligatorio") { obligatorio_ = $('[name="obligatorio"]:checked').attr('value'); }
        if ($(this).attr("name") == "preOpcional") { preguntaOpcional_ = $(this).val(); }
        if ($(this).attr("name") == "divid") { div_ = $(this).val(); }
    });
    select.each(function() {
        if ($(this).attr("name") == "categoria") { categoria_ = $(this).val(); }
        if ($(this).attr("name") == "seccion") { seccion_ = $(this).val(); }
        if ($(this).attr("name") == "tipo") { tipo_ = $(this).val(); }
    });
    if (texto_ != "" && soliarchivo_ != "" && obligatorio_ != "" && id_ != "" && categoria_ != "" && seccion_ != "" && tipo_ != "") {
        post = {
            id: id_,
            categoria: categoria_,
            seccion: seccion_,
            texto: texto_,
            tipo: tipo_,
            soliarchivo: soliarchivo_,
            obligatorio: obligatorio_,
            preguntaOpcional: preguntaOpcional_,
            div: div_
        };
        console.log(post);
        hacerCambiosPostAsy(post, url, $("#preguntas" + div_));
    }
}

function eliminarPregunta(iddiv, url) {
    var id_ = "";
    var div_ = "";
    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "id") { id_ = $(this).val(); }
        if ($(this).attr("name") == "divid") { div_ = $(this).val(); }
    });
    if (id_ != "") {
        post = {
            id: id_,
            div: div_
        };
        hacerCambiosPostAsy(post, url, $("#preguntas" + div_));
    }
}