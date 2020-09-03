/*=============================================
EDITAR ENTIDAD
=============================================*/
$(".tablas").on("click", ".btnEditarEntidad", function () {

	var idEntidad = $(this).attr("idEntidad");

	console.log("idEntidad", idEntidad);


	var datos = new FormData();
	datos.append("idEntidad", idEntidad);
	console.log(datos);

	$.ajax({
		url: "ajax/entidad.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#editarEntidad").val(respuesta["entidad"]);
			$("#idEntidad").val(respuesta["id"]);

		}

	})


})


/*=============================================
ELIMINAR ENTIDAD
=============================================*/
$(".tablas").on("click", ".btnEliminarEntidad", function () {

	var idEntidad = $(this).attr("idEntidad");

	swal({
		title: '¿Está seguro de borrar la entidad?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: '¡Si, borrar entidad!'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=entidad&idEntidad=" + idEntidad;

		}

	})

})