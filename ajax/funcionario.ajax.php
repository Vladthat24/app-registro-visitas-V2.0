<?php


require_once "../controladores/funcionario.controlador.php";
require_once "../modelos/funcionario.modelo.php";

class AjaxFuncionario
{
  /* =============================================
      EDITAR FUNCIONARIO
      ============================================= */

  public $idFuncionario;

  public function ajaxEditarFuncionario()
  {

    $item = "id";
    $valor = $this->idFuncionario;

    $respuesta = ControladorFuncionario::ctrMostrarFuncionario($item, $valor);

    echo json_encode($respuesta);
  }

  /* =============================================
    VALIDAR NO REPETIR NOMBRE DEL FUNCIONARIO 
  ============================================= */

  public $validarFuncionario;

  public function ajaxValidarFuncionario()
  {

    $item = "num_documento";
    $valor = $this->validarFuncionario;

    $respuesta = ControladorFuncionario::ctrMostrarFuncionario($item, $valor);

    echo json_encode($respuesta);
  }
}

/* =============================================
  EDITAR FUNCIONARIO
  ============================================= */
if (isset($_POST["idFuncionario"])) {

  $editar = new AjaxFuncionario();
  $editar->idFuncionario = $_POST["idFuncionario"];
  $editar->ajaxEditarFuncionario();
}

/* =============================================
  VALIDAR NO REPETIR NOMBRE DE FUNCIONARIO
  ============================================= */

if (isset($_POST["validarFuncionario"])) {

  $valDni = new AjaxFuncionario();
  $valDni->validarFuncionario = $_POST["validarFuncionario"];
  $valDni->ajaxValidarFuncionario();
}
