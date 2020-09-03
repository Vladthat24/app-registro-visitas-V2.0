<?php

class ControladorFuncionario
{
    /* =============================================
      REGISTRO DE FUNCIONARIO
      ============================================= */

    static public function ctrCrearFuncionario()
    {

        if (isset($_POST["nuevNombre"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["dni"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevNombre"])
            ) { 

                $tabla = "Tap_Funcionario";

                $datos = array(

                    "idtipo_documento" => $_POST["nuevTipoDocumento"],
                    "num_documento" => $_POST["dni"],
                    "nombre" => $_POST["nuevNombre"],
                    "identidad" => $_POST["nuevEntidad"],
                    "cargo" => $_POST["nuevCargo"]
                );

                $respuesta = ModeloFuncionario::mdlIngresarFuncionario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({

						type: "success",
						title: "¡El Funcionario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "funcionario";

						}

					});
				

					</script>';
                } else {
                    echo '<script>

					swal({

						type: "success",
						title: "¡Error al Crear un Funcionario, Contactar con el Administrador!",
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
						title: "¡El Funcionario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
						window.location = "funcionario";

						}

					});
				

				</script>';
            }
        }
    }

    /* =============================================
      REGISTRO DE FUNCIONARIO
      ============================================= */

    static public function ctrCrearFuncionarioVisita()
    {

        if (isset($_POST["nuevNombre"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["dni"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevNombre"])
            ) {

                $tabla = "Tap_Funcionario";

                $datos = array(

                    "idtipo_documento" => $_POST["nuevTipoDocumento"],
                    "num_documento" => $_POST["dni"],
                    "nombre" => $_POST["nuevNombre"],
                    "identidad" => $_POST["nuevEntidad"],
                    "cargo" => $_POST["nuevCargo"],
                );

                $respuesta = ModeloFuncionario::mdlIngresarFuncionario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
  
                      $("#modalAgregarRegistro").modal("show");
                        

                      </script>';
                } else {
                    echo '<script>
  
                      swal({
  
                          type: "success",
                          title: "¡Error al Crear un Funcionario, Contactar con el Administrador!",
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
                          title: "¡El Funcionario no puede ir vacío o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
  
                      }).then(function(result){
  
                          if(result.value){
                          
                          window.location = "funcionario";
  
                          }
  
                      });
                  
  
                  </script>';
            }
        }
    }

    /* =============================================
      MOSTRAR FUNCIONARIO
      ============================================= */

    static public function ctrMostrarFuncionario($item, $valor)
    {

        $tabla = "Tap_Funcionario";

        $respuesta = ModeloFuncionario::MdlMostrarFuncionario($tabla, $item, $valor);

        return $respuesta;
    }

    
    /* =============================================
      MOSTRAR FUNCIONARIO
      ============================================= */

      static public function ctrMostrarUltimoRegistroFuncionario($item, $valor)
      {
  
          $tabla = "Tap_Funcionario";
  
          $respuesta = ModeloFuncionario::mdlMostrarUltimoRegistroFuncionario($tabla, $item, $valor);
  
          return $respuesta;
      }



    /* =============================================
      EDITAR FUNCIONARIO
      ============================================= */

    static public function ctrEditarFuncionario()
    {

        if (isset($_POST["editarNombre"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])
            ) {

                $tabla = "Tap_Funcionario";

                $datos = array(


                    "id" => $_POST["idFuncionario"],
                    "idtipo_documento" => $_POST["editarTipoDocumento"],
                    "num_documento" => $_POST["editarDni"],
                    "nombre" => $_POST["editarNombre"],
                    "identidad" => $_POST["editarEntidad"],
                    "cargo" => $_POST["editarCargo"],

                );
                var_dump($datos);
                $respuesta = ModeloFuncionario::mdlEditarFuncionario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El funcionario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "funcionario";

									}
								})

					</script>';
                } else {
                    echo '<script>

					swal({

						type: "success",
						title: "¡Error al Crear un Funcionario, Contactar con el Administrador!",
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
						  title: "¡El funcionario no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
                                console.log(result);
							window.location = "funcionario";

							}
						})

			  	</script>';
            }
        }
    }

    /* =============================================
      BORRAR FUNCIONARIO
      ============================================= */

    static public function ctrBorrarFuncionario()
    {

        if (isset($_GET["idFuncionario"])) {

            $tabla = "Tap_Funcionario";
            $datos = $_GET["idFuncionario"];

            $respuesta = ModeloFuncionario::mdlBorrarFuncionario($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El funcionario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){

								if (result.value) {

								window.location = "funcionario";

						    }
                        }
                    )

				</script>';
            }
        }
    }
}
