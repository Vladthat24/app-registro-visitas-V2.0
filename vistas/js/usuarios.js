/*=============================================
 SUBIENDO LA FOTO DEL USUARIO
 =============================================*/
$(".nuevFoto").change(function () {

    var imagen = this.files[0];

    /*=============================================
     VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
     =============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })

    }
})

/*=============================================
 EDITAR USUARIO
 =============================================*/
$(".tablas").on("click", ".btnEditarUsuario", function () {

    var idUsuario = $(this).attr("idUsuario");

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({

        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {


            console.log(respuesta["fecha"]);

            $("#editarTipoDocumento").val(respuesta["tipo_documento"]);
            $("#editarTipoDocumento").html(respuesta["tipo_documento"]);

            $("#editarDni").val(respuesta["num_documento"]);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarOficina").val(respuesta["oficina"]);
            $("#editarArea").val(respuesta["area"]);
            $("#editarCargo").val(respuesta["cargo"]);
            $("#editarCel").val(respuesta["cel"]);

            $("#editarSede").html(respuesta["sede"]);
            $("#editarSede").val(respuesta["sede"]);

            $("#editarPiso").html(respuesta["piso"]);
            $("#editarPiso").val(respuesta["piso"]);

            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);

            $("#editarUsuario").val(respuesta["usuario"]);

            $("#fotoActual").val(respuesta["foto"]);

            $("#passwordActual").val(respuesta["password"]);
            
            $("#editarFecha").val(respuesta["fecha"]);

            if (respuesta["foto"] != "") {

                $(".previsualizar").attr("src", respuesta["foto"]);

            }

        }

    });

})

/*=============================================
 ACTIVAR USUARIO
 =============================================*/
$(".tablas").on("click", ".btnActivar", function () {

    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({

        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            if (window.matchMedia("(max-width:767px)").matches) {

                swal({
                    title: "El usuario ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function (result) {
                    if (result.value) {

                        window.location = "usuarios";

                    }


                });

            }

        }

    })

    if (estadoUsuario == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario', 0);

    }

})

/*=============================================
 REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
 =============================================*/

$("#nuevUsuario").change(function () {

    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (respuesta) {

                $("#nuevUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                $("#nuevUsuario").val("");

            }

        }

    })
})

/*=============================================
 REVISAR SI EL DNI DEL USUARIO YA ESTÁ REGISTRADO
 =============================================*/
$("#num_documentoAtributo").change(function () {
    //$('#consultar').on('click', function () {
    $(".alert").remove();

    var dni = $('#num_documentoAtributo').val();
    var datos = new FormData();
    datos.append("validarDni", dni);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (respuesta) {

                $("#num_documentoAtributo").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                $("#num_documentoAtributo").val("");
                $("#nuevNombre").html("");

            }

        }

    })
});


/*=============================================
 ELIMINAR USUARIO
 =============================================*/
$(".tablas").on("click", ".btnEliminarUsuario", function () {

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");

    swal({
        title: '¿Está seguro de borrar el usuario?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=usuarios&idUsuario=" + idUsuario + "&usuario=" + usuario + "&fotoUsuario=" + fotoUsuario;

        }

    })

})
/*=============================================
 VALIDAR SOLO NUMERO EN DNI
 =============================================*/
$(function () {
    $(".num_documentoClase").keydown(function (event) {
        //alert(event.keyCode);
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
            return false;
        }
    });
});
/*=============================================
 VALIDAR SOLO NUMERO EN CEL 
 =============================================*/
//SOLO NUMEROS
$(function () {
    $(".celularClase").keydown(function (event) {
        //alert(event.keyCode);
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
            return false;
        }
    });
});


