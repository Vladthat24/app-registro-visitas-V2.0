/*=============================================
EDITAR DISTRITO
=============================================*/
$(".tablas").on("click", ".btnEditarDistrito", function(){

	var idDistrito = $(this).attr("idDistrito");

	var datos = new FormData();
	datos.append("idDistrito", idDistrito);

	$.ajax({
		url: "ajax/distrito.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarDistrito").val(respuesta["distrito"]);
     		$("#idDistrito").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR DISTRITO
=============================================*/
$(".tablas").on("click", ".btnEliminarDistrito", function(){

	 var idDistrito = $(this).attr("idDistrito");

	 swal({
	 	title: '¿Está seguro de borrar la distrito?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar distrito!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=distrito&idDistrito="+idDistrito;

	 	}

	 })

})