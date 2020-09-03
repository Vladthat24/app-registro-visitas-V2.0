<?php

class ControladorSoporte{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearSoporte(){

		if(isset($_POST["nuevaSoporte"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaSoporte"])){

				$tabla = "soporte";

				$datos = $_POST["nuevaSoporte"];

				$respuesta = ModeloSoporte::mdlIngresarSoporte($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El informático ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "soporte";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Informático no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "soporte";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarSoporte($item, $valor){

		$tabla = "soporte";

		$respuesta = ModeloSoporte::mdlMostrarSoporte($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarSoporte(){

		if(isset($_POST["editarSoporte"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarSoporte"])){

				$tabla = "soporte";

				$datos = array("soporte"=>$_POST["editarSoporte"],
							   "id"=>$_POST["idSoporte"]);

				$respuesta = ModeloSoporte::mdlEditarSoporte($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El informático ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "soporte";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El informático no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "soporte";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarSoporte(){

		if(isset($_GET["idSoporte"])){

			$tabla ="soporte";
			$datos = $_GET["idSoporte"];

			$respuesta = ModeloSoporte::mdlBorrarSoporte($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El informático ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "soporte";

									}
								})

					</script>';
			}
		}
		
	}
}
