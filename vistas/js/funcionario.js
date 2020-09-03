
/*=============================================
 EDITAR FUNCIONARIO
 =============================================*/
$(".tablas").on("click", ".btnEditarFuncionario", function () {

    var idFuncionario = $(this).attr("idFuncionario");

    var datos = new FormData();
    datos.append("idFuncionario", idFuncionario);

    $.ajax({

        url: "ajax/funcionario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            var datosTipo_Documento = new FormData();
            datosTipo_Documento.append("idDocumento", respuesta["idtipo_documento"]);



            $.ajax({
                url: "ajax/documento.ajax.php",
                method: "POST",
                data: datosTipo_Documento,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    console.log("Documento", respuesta["id"]);

                    $("#editarTipoDocumento").val(respuesta["id"]);
                    $("#editarTipoDocumento").html(respuesta["tipo_documento"]);
                }

            })

            var datosEntidad = new FormData();
            datosEntidad.append("idEntidad", respuesta["identidad"]);
            $.ajax({
                url: "ajax/entidad.ajax.php",
                method: "POST",
                data: datosEntidad,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {

                    $("#editarEntidad").val(respuesta["id"]);
                    $("#editarEntidad").html(respuesta["entidad"]);
                }
            })

            $("#idFuncionario").val(respuesta["id"]);
            $("#editarDni").val(respuesta["num_documento"]);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarCargo").val(respuesta["cargo"]);


        }

    });

})


/*=============================================
 REVISAR SI EL DNI DEL USUARIO YA ESTÁ REGISTRADO
 =============================================*/
$(".validardni").change(function () {
    //$('#consultar').on('click', function () {
    /* $(".alert").remove(); */

    var dni = $('.validardni').val();
    
    var datos = new FormData();
    datos.append("validarDni", dni);

    $.ajax({
        url: "ajax/funcionario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (respuesta) {

                $(".validardni").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

                $(".validardni").val("");
                $("#nuevNombre").html("");

            }
            
        }

    })
});


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



