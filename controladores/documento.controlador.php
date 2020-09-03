<?php

class ControladorDocumento{

	/*=============================================
	CREAR DOCUMENTO
	=============================================*/

	static public function ctrCrearDocumento(){

		if(isset($_POST["nuevDocumento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevDocumento"])){

				$tabla = "Tap_TipoDocumento";

				$datos = $_POST["nuevDocumento"];

				$respuesta = ModeloDocumento::mdlIngresarDocumento($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Documento ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "documento";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Documento no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "documento";

							}
						})

			  	</script>';

			}

		}else{
			echo '<script>Error Controlador</script>';
		}

	}

	/*=============================================
	MOSTRAR DOCUMENTO
	=============================================*/

	static public function ctrMostrarDocumento($item, $valor){

		$tabla = "Tap_TipoDocumento";

		$respuesta = ModeloDocumento::mdlMostrarDocumento($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR DOCUMENTO
	=============================================*/

	static public function ctrEditarDocumento(){

		if(isset($_POST["editarDocumento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDocumento"])){

				$tabla = "Tap_TipoDocumento";

				$datos = array("tipo_documento"=>$_POST["editarDocumento"],
							   "id"=>$_POST["idDocumento"]);

				$respuesta = ModeloDocumento::mdlEditarDocumento($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Tipo de Documento ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "documento";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Tipo de Documento no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "documento";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR DOCUMENTO
	=============================================*/

	static public function ctrBorrarDocumento(){

		if(isset($_GET["idDocumento"])){

			$tabla ="Tap_TipoDocumento";
			$datos = $_GET["idDocumento"];

			$respuesta = ModeloDocumento::mdlBorrarDocumento($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El Tipo de Documento ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "documento";

									}
								})

					</script>';
			}
		}
		
	}
}
