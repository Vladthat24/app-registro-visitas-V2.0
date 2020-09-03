<?php

class ControladorEstado{

	/*=============================================
	CREAR ESTADO
	=============================================*/

	static public function ctrCrearEstado(){

		if(isset($_POST["nuevaEstado"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaEstado"])){

				$tabla = "estado";

				$datos = $_POST["nuevaEstado"];

				$respuesta = ModeloEstado::mdlIngresarEstado($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "estado";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estado";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR ESTADO
	=============================================*/

	static public function ctrMostrarEstado($item, $valor){

		$tabla = "estado";

		$respuesta = ModeloEstado::mdlMostrarEstado($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR ESTADO
	=============================================*/

	static public function ctrEditarEstado(){

		if(isset($_POST["editarEstado"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEstado"])){

				$tabla = "estado";

				$datos = array("estado"=>$_POST["editarEstado"],
							   "id"=>$_POST["idEstado"]);

				$respuesta = ModeloEstado::mdlEditarEstado($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "estado";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estado";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR ESTADO
	=============================================*/

	static public function ctrBorrarEstado(){

		if(isset($_GET["idEstado"])){

			$tabla ="estado";
			$datos = $_GET["idEstado"];

			$respuesta = ModeloEstado::mdlBorrarEstado($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "estado";

									}
								})

					</script>';
			}
		}
		
	}
}
