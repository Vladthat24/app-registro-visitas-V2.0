<?php

class ControladorDistrito{

	/*=============================================
	CREAR DISTRITO
	=============================================*/

	static public function ctrCrearDistrito(){

		if(isset($_POST["nuevaDistrito"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDistrito"])){

				$tabla = "distrito";

				$datos = $_POST["nuevaDistrito"];

				$respuesta = ModeloDistrito::mdlIngresarDistrito($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La distrito ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "distrito";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El distrito no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "distrito";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR DISTRITO
	=============================================*/

	static public function ctrMostrarDistrito($item, $valor){

		$tabla = "distrito";

		$respuesta = ModeloDistrito::mdlMostrarDistrito($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR DISTRITO
	=============================================*/

	static public function ctrEditarDistrito(){

		if(isset($_POST["editarDistrito"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDistrito"])){

				$tabla = "distrito";

				$datos = array("distrito"=>$_POST["editarDistrito"],
							   "id"=>$_POST["idDistrito"]);

				$respuesta = ModeloDistrito::mdlEditarDistrito($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El distrito ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "distrito";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El distrito no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "distrito";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR DISTRITO
	=============================================*/

	static public function ctrBorrarDistrito(){

		if(isset($_GET["idDistrito"])){

			$tabla ="distrito";
			$datos = $_GET["idDistrito"];

			$respuesta = ModeloDistrito::mdlBorrarDistrito($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El distrito ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "distrito";

									}
								})

					</script>';
			}
		}
		
	}
}
