<?php

@session_start();
require_once "../controladores/ticket.controlador.php";
require_once "../modelos/ticket.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

require_once "../controladores/estado.controlador.php";
require_once "../modelos/estado.modelo.php";

require_once "../controladores/soporte.controlador.php";
require_once "../modelos/soporte.modelo.php";

require_once "../controladores/distrito.controlador.php";
require_once "../modelos/distrito.modelo.php";

require_once "../controladores/documento.controlador.php";
require_once "../modelos/documento.modelo.php";

class TablaTicket
{
  /* =============================================
      MOSTRAR LA TABLA DE TICKET
      ============================================= */

  public function mostrarTablaTicket()
  {
    $item = null;
    $valor = null;
    $item2 = "id_estado";
    $valor2 = 4;
    $ticket = ControladorTicketInactivo::ctrMostrarTicket($item, $valor, $item2, $valor2);

    if (count($ticket) == 0) {

      echo '{"data": []}';

      return;
    }

    $datosJson = '{
		  "data": [';

    for ($i = 0; $i < count($ticket); $i++) {

      /* =============================================
                  TRAEMOS LA IMAGEN
                  ============================================= */

      $imagen = "<a href='" . $ticket[$i]["imagen"] . "' onclick='windows.open()'><img src='" . $ticket[$i]["imagen"] . "' width='40px'></a>";

      /* =============================================
                  TRAEMOS LA CATEGORIA
                  ============================================= */

      $item = "id";
      $valor = $ticket[$i]["id_categoria"];

      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

      /* =============================================
                  TRAEMOS ESTADO
      ============================================= */
      $item = "id";
      $valor = $ticket[$i]["id_estado"];

      $estado = ControladorEstado::ctrMostrarEstado($item, $valor);
      $estado2 = "<div type='button' class='btn btn btn-success valorestado' valorestado='" . $estado["estado"] . "'>" . $estado["estado"] . "</div>";
      /* =============================================
                  TRAEMOS DISTRITO
      ============================================= */
      $item = "id";
      $valor = $ticket[$i]["id_distrito"];

      $distrito = ControladorDistrito::ctrMostrarDistrito($item, $valor);
      $distrito2 = "<div type='button'>" . $distrito["distrito"] . "</div>";
      /* =============================================
       TRAEMOS TIPO DE DOCUMENTO
      ============================================= */
      $item = "id";
      $valor = $ticket[$i]["id_documento"];

      $documento = ControladorDocumento::ctrMostrarDocumento($item, $valor);

      /* =============================================
                  TOMA MUESTRA
      ============================================= */

      $muestra_paciente2 = "<div type='button' muestra_paciente='" . $ticket[$i]["muestra_paciente"] . "'>" . $ticket[$i]["muestra_paciente"] . "</div>";


      /* =============================================
                  TRAEMOS LAS ACCIONES
        ============================================= */

      /*   $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirTicket' idTicket='" . $ticket[$i]["id"] . "'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarTicket' idTicket='" . $ticket[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarTicket'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarTicket' idTicket='" . $ticket[$i]["id"] . "' codigo='" . $ticket[$i]["codigo"] . "' imagen='" . $ticket[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>"; */
      $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirTicket' idTicket='" . $ticket[$i]["id"] . "'><i class='fa fa-print'></i></button><button class='btn btn-warning btnEditarTicket' idTicket='" . $ticket[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarTicket'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarTicket' idTicket='" . $ticket[$i]["id"] . "' codigo='" . $ticket[$i]["codigo"] . "' imagen='" . $ticket[$i]["imagen"] . "'><i class='fa fa-times'></i></button></div>";



      $datosJson .= '[
        "' . ($i + 1) . '",
                          "' . $botones . '",    
                          "' . $estado2 . '",
                          "' . $ticket[$i]["fecha"] . '",

                          "' . $documento["documento"] . '",
                          "' . $ticket[$i]["dni"] . '",
                          "' . $ticket[$i]["nombre_paciente"] . '",
                          "' . $ticket[$i]["edad_paciente"] . '",
                          "' . $ticket[$i]["direccion_paciente"] . '",
                          "' . $ticket[$i]["distrito_paciente"] . '",
                          "' . $distrito2 . '",
                          "' . $ticket[$i]["telefono_paciente"] . '",
                          "' . $ticket[$i]["comoAB_paciente"] . '",
                          "' . $muestra_paciente2 . '",


                          "' . $categorias["categoria"] . '",
                          "' . $ticket[$i]["codigo"] . '",
                          "' . $ticket[$i]["descripcion_paciente"] . '",

                          "' . $ticket[$i]["FechaSintomas"] . '",
                          "' . $ticket[$i]["Sintomas"] . '",
                          "' . $ticket[$i]["Enfermedad"] . '",
                          "' . $ticket[$i]["Tos"] . '",
                          "' . $ticket[$i]["DolorGarganta"] . '",
                          "' . $ticket[$i]["Fiebre"] . '",
                          "' . $ticket[$i]["fiebre_num"] . '",
                          "' . $ticket[$i]["SecrecionNasal"] . '",
                          "' . $ticket[$i]["OtroSintomas"] . '",
                          "' . $ticket[$i]["Viaje"] . '",
                          "' . $ticket[$i]["pais_viaje"] . '",
                          "' . $ticket[$i]["NumeroViaje"] . '",
                          "' . $ticket[$i]["ContactoPersonaSospechosa"] . '",
                          "' . $ticket[$i]["DatosPersonaSospechosa"] . '",
                          "' . $ticket[$i]["CelPersonaSospechosa"] . '",

                          "' . $ticket[$i]["nombre"] . '",
                          "' . $imagen . '"

      ],';
    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson .= '] 

 }';

    echo $datosJson;
  }
}

/* =============================================
  ACTIVAR TABLA DE PRODUCTOS
  ============================================= */
$activarTicket = new TablaTicket();
$activarTicket->mostrarTablaTicket();
