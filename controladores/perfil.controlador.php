<?php

class ControladorPerfil{

	/*=============================================
	CREAR PERFIL
	=============================================*/

	static public function ctrCrearPerfil(){

		if(isset($_POST["nuevPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevPerfil"])){

				$tabla = "Tap_Perfil";

				$datos = $_POST["nuevPerfil"];

				$respuesta = ModeloPerfil::mdlIngresarPerfil($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Perfil ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "perfil";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La Perfil no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "perfil";

							}
						})

			  	</script>';

			}

		}else{
			echo '<script>Error Controlador</script>';
		}

	}

	/*=============================================
	MOSTRAR PERFIL
	=============================================*/

	static public function ctrMostrarPerfil($item, $valor){
	
		$tabla = "Tap_Perfil";

		$respuesta = ModeloPerfil::mdlMostrarPerfil($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR PERFIL
	=============================================*/

	static public function ctrEditarPerfil(){

		if(isset($_POST["editarPerfil"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPerfil"])){

				$tabla = "Tap_Perfil";

				$datos = array("perfil"=>$_POST["editarPerfil"],
							   "id"=>$_POST["idPerfil"]);

				$respuesta = ModeloPerfil::mdlEditarPerfil($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Tipo de Perfil ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "perfil";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Tipo de Perfil no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "perfil";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR PERFIL
	=============================================*/

	static public function ctrBorrarPerfil(){

		if(isset($_GET["idPerfil"])){

			$tabla ="Tap_Perfil";
			$datos = $_GET["idPerfil"];

			$respuesta = ModeloPerfil::mdlBorrarPerfil($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El Tipo de Perfil ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "perfil";

									}
								})

					</script>';
			}
		}
		
	}
}
