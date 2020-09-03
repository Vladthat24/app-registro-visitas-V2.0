/*=============================================
 EDITAR CATEGORIA
 =============================================*/
$(".tablas").on("click", ".btnEditarSoporte", function () {

    var idSoporte = $(this).attr("idSoporte");

    var datos = new FormData();
    datos.append("idSoporte", idSoporte);
//    console.log(idSoporte);

    $.ajax({
        url: "ajax/soporte.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
//            console.log(respuesta);
            $("#editarSoporte").val(respuesta["soporte"]);
            $("#idSoporte").val(respuesta["id"]);

        }

    })


})

/*=============================================
 ELIMINAR CATEGORIA
 =============================================*/
$(".tablas").on("click", ".btnEliminarSoporte", function () {

    var idSoporte = $(this).attr("idSoporte");

    swal({
        title: '¿Está seguro de borrar la categoría?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Informático!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=soporte&idSoporte=" + idSoporte;

        }

    })

})