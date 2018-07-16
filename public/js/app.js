function hacerCambio(divById, url) {
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        after: function() {

        },
        success: function(data) {

            $("#" + divById).html("");
            $("#" + divById).html(data);
        }
    });
}
var divPerfil = "";

function hacerCambiosPostAsy(datosPost, urlDes, div) {
    $.ajax({
        type: "POST", // la variable type guarda el tipo de la peticion GET,POST,..
        url: urlDes, //urlDes guarda la ruta hacia donde se hace la peticion
        data: datosPost, // data recive un objeto con la informacion que se enviara al servidor
        dataType: "html", // El tipo de datos esperados del servidor. Valor predeterminado: Intelligent Guess (xml, json, script, text, html).
        success: function(datos) { //success es una funcion que se utiliza si el servidor retorna informacion
            div.html(datos);
        }
    });
}

function actualizarDatosUsuario(url) {
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
        console.log(url);
        hacerCambiosPostAsy(post, url, $("#contadoresReg"));
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
        hacerCambiosPostAsy(post, url, $("#nada"));
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
        hacerCambiosPostAsy(post, url, $("#nada"));
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
        hacerCambiosPostAsy(post, url, $("#nada"));
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
        hacerCambiosPostAsy(post, url, $("#nada"));
    }
}

function agregarPregunta(iddiv, url) {
    var categoria_ = "";
    var seccion_ = "";
    var texto_ = "algo";
    var div = $("#" + iddiv);
    var finds = div.find("input");
    finds.each(function() {
        if ($(this).attr("name") == "categoria") { categoria_ = $(this).val(); }
        if ($(this).attr("name") == "seccion") { seccion_ = $(this).val(); }
    });
    if (categoria_ != "" && seccion_ != "") {
        post = {
            categoria: categoria_,
            seccion: seccion_,
            texto: texto_
        };
        hacerCambiosPostAsy(post, url, $("#nada"));
        console.log(post);
    }
}
