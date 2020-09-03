/*=============================================
EDITAR PERFIL
=============================================*/
$(".tablas").on("click", ".btnEditarPerfil", function(){

	var idPerfil = $(this).attr("idPerfil");

	var datos = new FormData();
	datos.append("idPerfil", idPerfil);

	$.ajax({
		url: "ajax/perfil.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarPerfil").val(respuesta["perfil"]);
     		$("#idPerfil").val(respuesta["id"]);

     	}

	})


})


/*=============================================
ELIMINAR PERFIL
=============================================*/
$(".tablas").on("click", ".btnEliminarPerfil", function(){

	 var idPerfil = $(this).attr("idPerfil");

	 swal({
	 	title: '¿Está seguro de borrar la categoría?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar perfil!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=perfil&idPerfil="+idPerfil;

	 	}

	 })

})