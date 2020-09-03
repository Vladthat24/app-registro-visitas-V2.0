<?php

class ControladorEntidad
{

	/*=============================================
	CREAR ENTIDAD
	=============================================*/

	static public function ctrCrearEntidad()
	{

		if (isset($_POST["nuevEntidad"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevEntidad"])) {

				$tabla = "Tap_Entidad";

				$datos = $_POST["nuevEntidad"];

				$respuesta = ModeloEntidad::mdlIngresarEntidad($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La Entidad ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "entidad";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La entidad no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "entidad";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	CREAR ENTIDAD VISITA REGISTRO
	=============================================*/

	static public function ctrCrearEntidadVisita()
	{

		if (isset($_POST["nuevEntidadVisita"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevEntidadVisita"])) {

				$tabla = "Tap_Entidad";

				$datos = $_POST["nuevEntidad"];

				$respuesta = ModeloEntidad::mdlIngresarEntidad($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La Entidad ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "registro";

									}
								})

					</script>';
					
				}else {
                    echo '<script>
  
                      swal({
  
                          type: "success",
                          title: "¡Error al Crear un Entidad, Contactar con el Administrador!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
  
                      }).then(function(result){
  
  
                      });
                  
  
                      </script>';
                }
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La entidad no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "entidad";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR ENTIDAD
	=============================================*/

	static public function ctrMostrarEntidad($item, $valor)
	{

		$tabla = "Tap_Entidad";

		$respuesta = ModeloEntidad::mdlMostrarEntidad($tabla, $item, $valor);

		return $respuesta;
	}

	
	/*=============================================
	MOSTRAR ENTIDAD
	=============================================*/

	static public function ctrMostrarUltimoRegistroEntidad($item, $valor)
	{

		$tabla = "Tap_Entidad";

		$respuesta = ModeloEntidad::mdlMostrarUltimoRegistroEntidad($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR ENTIDAD
	=============================================*/

	static public function ctrEditarEntidad()
	{

		if (isset($_POST["editarEntidad"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEntidad"])) {

				$tabla = "Tap_Entidad";

				$datos = array(
					"entidad" => $_POST["editarEntidad"],
					"id" => $_POST["idEntidad"]
				);

				$respuesta = ModeloEntidad::mdlEditarEntidad($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La entidad ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "entidad";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La entidad no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "entidad";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	BORRAR ENTIDAD
	=============================================*/

	static public function ctrBorrarEntidad()
	{

		if (isset($_GET["idEntidad"])) {

			$tabla = "Tap_Entidad";
			$datos = $_GET["idEntidad"];

			$respuesta = ModeloEntidad::mdlBorrarEntidad($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "La entidad ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "entidad";

									}
								})

					</script>';
			}
		}
	}
}
