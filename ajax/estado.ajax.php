<?php

require_once "../controladores/estado.controlador.php";
require_once "../modelos/estado.modelo.php";

class AjaxEstado{

	/*=============================================
	EDITAR ESTADO
	=============================================*/	

	public $idEstado;

	public function ajaxEditarEstado(){

		$item = "id";
		$valor = $this->idEstado;

		$respuesta = ControladorEstado::ctrMostrarEstado($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR ESTADO
=============================================*/	
if(isset($_POST["idEstado"])){

	$estado = new AjaxEstado();
	$estado -> idEstado = $_POST["idEstado"];
	$estado -> ajaxEditarEstado();
}
