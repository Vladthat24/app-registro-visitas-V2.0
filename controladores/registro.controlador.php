<?php

class ControladorRegistro
{

  /*=============================================
	RANGO FECHAS
	=============================================*/

  static public function ctrRangoFechasRegistro($fechaInicial, $fechaFinal)
  {

    $tabla = "Tap_RegistroVisita";

    $respuesta = ModeloRegistro::mdlRangoFechasRegistro($tabla, $fechaInicial, $fechaFinal);

    return $respuesta;
  }

  /* =============================================
      MOSTRAR TICKET DE ACUERDO AL PERIL
      ============================================= */


  static public function ctrMostrarRegistro($item, $valor)
  {

    $tabla = "Tap_RegistroVisita";

    $respuesta = ModeloRegistro::mdlMostrarRegistro($tabla, $item, $valor);

    return $respuesta;
  }

  /* =============================================
      CREAR REGISTRO
   ============================================= */

  static public function ctrCrearRegistro()
  {

    if (isset($_POST["nuevDniVisitaFuncionario"])) {

      if ($_POST["nuevDniVisitaFuncionario"]) {

        date_default_timezone_set('America/Lima');

        $fecha = date('d-m-Y');
        $hora = date('H:i:s A');

        /* $fechaActual = $fecha . ' ' . $hora; */

        $tabla = "Tap_RegistroVisita";

        /*var_dump($_POST["nuevFechaSalida"], $_POST["nuevHoraSalida"]); */

        /*         $valor=$_POST["nuevIdFuncionario"];
        $item="id";
        $tabla="Tap_Funcionario";

        $funcionario=ModeloFuncionario::mdlMostrarFuncionario($tabla,$item,$valor);

        $idfuncionario=$funcionario["id"]; */



        if (!empty($_POST["nuevIdFuncionario"])) { //REGISTRO DE FORMA NORMAL

          echo "SI EXITE PERO HAY QUE EDITARLO SI MODIFICAN ALGUN CAMPO";

          var_dump($_POST["nuevIdFuncionario"]);

          $datos = array(

            "idfuncionario" => $_POST["nuevIdFuncionario"],
            "motivo" => $_POST["nuevMotivo"],
            "servidor_publico" => strtoupper($_POST["nuevNombreFuncionarioLocal"]),
            "area_oficina_sp" => strtoupper($_POST["nuevAreaOfFuncionarioLocal"]),
            "cargo" => strtoupper($_POST["nuevCargoFuncionarioLocal"]),
            "fecha_ingreso" => $fecha,
            "hora_ingreso" => $hora,
            "usuario" => $_POST["nuevUsuarioDigitador"]
          );

          $respuesta = ModeloRegistro::mdlIngresarRegistro($tabla, $datos);

          if ($respuesta == "ok") {

            echo '<script>
            
						swal({
							  type: "success",
							  title: "La visita ha sido registrado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "registro";

										}
									})

						</script>';
          } else {
            echo '<script>
            
          swal({
              type: "success",
              title: "Error al Registrar en la BDD, Comunicarse con el Administrador",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then((result) => {
                  if (result.value) {

                  

                  }
                })

          </script>';
          }
        } else { //REGISTRO CON UN INSERT NUEVO DEL FUNCIONARIO


          $tabla = "Tap_Entidad";

          $datos = $_POST["nuevEntidadFuncionario"];
          //SE INGRESA LA NUEVA ENTIDAD
          ModeloEntidad::mdlIngresarEntidad($tabla, $datos);


          //SE OBTIENE LA ENTIDAD INGRESADA 
          $item = null;
          $valor = null;
          $ultimoRegistroEntidad = ControladorEntidad::ctrMostrarUltimoRegistroEntidad($item, $valor);

          foreach ($ultimoRegistroEntidad as $key => $value) {
            $value["id"]; //ULTIMO REGISTRO 
          }

          echo "ULTIMO REGISTRO DE ENTIDAD";
          var_dump($value["id"]);
          echo "<hr>";


          //INGRESAR FUNCIONARIO Y RECUPERAR EL ULTIMO REGISTRO ID
          $datosfuncionario = array(

            "idtipo_documento" => $_POST["nuevTipoDocumento"],
            "num_documento" => $_POST["nuevDniVisitaFuncionario"],
            "nombre" => $_POST["nuevNombreFuncionario"],
            "cargo" => $_POST["nuevCargoFuncionario"],
            "identidad" => $value["id"],

            "motivo" => $_POST["nuevMotivo"],
            "servidor_publico" => strtoupper($_POST["nuevNombreFuncionarioLocal"]),
            "area_oficina_sp" => strtoupper($_POST["nuevAreaOfFuncionarioLocal"]),
            "cargo" => strtoupper($_POST["nuevCargoFuncionarioLocal"]),
            "fecha_ingreso" => $fecha,
            "hora_ingreso" => $hora,
            "usuario" => $_POST["nuevUsuarioDigitador"]
          );
          $tablaRegistro = "Tap_RegistroVisita";
          $respuesta = ModeloRegistro::mdlIngresarRegistroIngresarFuncionario($tablaRegistro, $datosfuncionario);


          if ($respuesta == "ok") {

            echo '<script>
            
						swal({
							  type: "success",
							  title: "La visita ha sido registrado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

                      
                      window.location = "registro";
										}
									})

						</script>';
          } else {
            echo '<script>
            
          swal({
              type: "success",
              title: "Error al Registrar en la BDD, Comunicarse con el Administrador",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then((result) => {
                  if (result.value) {

                    
                   
                  }
                })

          </script>';
          }
        }
      } else {

        echo '<script>

					swal({
						  type: "error",
						  title: "¡El Registro no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then((result) => {
							if (result.value) {

							window.location = "registro";

							}
						})

			  	</script>';
      }
    }
  }

  /* =============================================
      EDITAR REGISTRO
      ============================================= */

  static public function ctrEditarRegistro()
  {

    if (isset($_POST["editarIdRegistro"])) {


      if ($_POST["editarIdRegistro"]) {


        $tabla = "Tap_RegistroVisita";

        $dateformato = new DateTime($_POST["editarFechaSalida"]);

        $datos = array(

          "id" => $_POST["editarIdRegistro"],
          "fecha_salida" => $dateformato->format('d/m/Y'),
          "hora_salida" => $_POST["editarHoraSalida"]

        );



        $respuesta = ModeloRegistro::mdlEditarRegistro($tabla, $datos);

        if ($respuesta == "ok") {

          echo '<script>

						swal({
							  type: "success",
							  title: "El Registro ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then((result) => {
										if (result.value) {

										window.location = "registro";

										}
									})

						</script>';
        } else {
          echo '<script>

          swal({
              type: "success",
              title: "Error al Registrar la Visita, Contactar con el Administrador",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
              }).then((result) => {
                  if (result.value) {

                  window.location = "registro";

                  }
                })

          </script>';
        }
      } else {

        echo '<script>

					swal({
						  type: "error",
						  title: "¡El Registro no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then((result) => {
							if (result.value) {

							window.location = "registro";

							}
						})

			  	</script>';
      }
    }
  }

  /* =============================================
      BORRAR PRODUCTO
      ============================================= */

  static public function ctrEliminarRegistro()
  {

    if (isset($_GET["idRegistro"])) {

      $tabla = "Tap_RegistroVisita";
      $datos = $_GET["idRegistro"];

      $respuesta = ModeloRegistro::mdlEliminarRegistro($tabla, $datos);

      if ($respuesta == "ok") {

        echo '<script>

				swal({
					  type: "success",
					  title: "El Registro ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "registro";

								}
							})

				</script>';
      }
    }
  }

  /* =============================================
      REPORTE EXCEL
      ============================================= */
  public function ctrDescargarReporte()
  {

    if (isset($_GET["reporte"])) {

      $tabla = "Tap_RegistroVisita";

      if (isset($_GET["start_date"]) && isset($_GET["end_date"])) {


        /*         $d1 = DateTime::createFromFormat('Y-m-d', $_GET["start_date"]);
        $d2 = DateTime::createFromFormat('Y-m-d', $_GET["end_date"]);
        
        echo "---------------";
        $fechaInicial = $d1->format('d/m/Y');
        $fechaFinal = $d2->format('d/m/Y');
        var_dump($fechaInicial);
        var_dump($fechaFinal); */
        /*         echo "HOLA"; */
        /* var_dump($_GET["start_date"], $_GET["end_date"]); */

        $registro = ModeloRegistro::mdlRangoFechasRegistro($tabla, $_GET["start_date"], $_GET["end_date"]);
      } else {

        $fechaInicial = null;
        $fechaFinal = null;

        $registro = ModeloRegistro::mdlRangoFechasRegistro($tabla, $fechaInicial, $fechaFinal);
      }



      /*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

      $Name = $_GET["reporte"] . '.xls';

      header('Expires: 0');
      header('Cache-control: private');
      header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
      header("Cache-Control: cache, must-revalidate");
      header('Content-Description: File Transfer');
      header('Last-Modified: ' . date('D, d M Y H:i:s'));
      header("Pragma: public");
      header('Content-Disposition:; filename="' . $Name . '"');
      header("Content-Transfer-Encoding: binary");

      echo utf8_decode("<table border='0'> 

      <tr>
      <td style='font-weight:bold; boder:1px solid #eee;'>ITEM</td> 
      <td style='font-weight:bold; boder:1px solid #eee;'>TIPO DOCUMENTO</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>N° DOC DEL VISITANTE</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>NOMBRE DEL VISITANTE</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>CARGO DEL VISITANTE</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>ENTIDAD DEL VISITANTE</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>MOTIVO DE LA VISITA</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>FUNCIONARIO</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>AREA/OFICINA</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>CARGO</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>FECHA DE INGRESO</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>HORA DE INGRESO</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>FECHA DE SALIDA</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>HORA DE SALIDA</td>
          <td style='font-weight:bold; boder:1px solid #eee;'>DIGITADOR</td>
      </tr>");

      foreach ($registro as $row => $item) {

        echo utf8_decode("<tr>

        <td style='border:1px solid #eee;'>" . ($row + 1) . "</td>                      
                    <td style='border:1px solid #eee;'>" . $item["TipoDocF"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["num_documento"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["nombre"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["cargo"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["ent_funcionario"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["motivo"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["servidor_publico"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["area_oficina_sp"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["cargo"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["fecha_ingreso"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["hora_ingreso"] . "</td>
                    
                    <td style='border:1px solid #eee;'>" . $item["fecha_salida"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["hora_salida"] . "</td>
                    <td style='border:1px solid #eee;'>" . $item["usuario"] . "</td>
       </tr>");
      }
      echo "</table>";
    }
  }
}
