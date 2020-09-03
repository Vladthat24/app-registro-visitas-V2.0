/*=============================================
EDITAR DOCUMENTO
=============================================*/
$(".tablas").on("click", ".btnEditarDocumento", function(){

	var idDocumento = $(this).attr("idDocumento");

	var datos = new FormData();
	datos.append("idDocumento", idDocumento);

	$.ajax({
		url: "ajax/documento.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarDocumento").val(respuesta["tipo_documento"]);
     		$("#idDocumento").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR DOCUMENTO
=============================================*/
$(".tablas").on("click", ".btnEliminarDocumento", function(){

	 var idDocumento = $(this).attr("idDocumento");

	 swal({
	 	title: '¿Está seguro de borrar la categoría?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar documento!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=documento&idDocumento="+idDocumento;

	 	}

	 })

})