<?php

require_once "../controladores/registro.controlador.php";
require_once "../modelos/registro.modelo.php";

class AjaxRegistro
{
  /* =============================================
      EDITAR TICKET
      ============================================= */

  public $idRegistro;

  public function ajaxEditarRegistro()
  {


    $item = "id";
    $valor = $this->idRegistro;
    $item2 = null;
    $valor2 = null;

    $respuesta = ControladorRegistro::ctrMostrarRegistro($item, $valor, $item2, $valor2);
    echo json_encode($respuesta);
  }
}


/* =============================================
  EDITAR TICKET
  ============================================= */

if (isset($_POST["idRegistro"])) {

  $editarRegistro = new AjaxRegistro();
  $editarRegistro->idRegistro = $_POST["idRegistro"];
  $editarRegistro->ajaxEditarRegistro();
}
