<?php

require_once "../controladores/soporte.controlador.php";
require_once "../modelos/soporte.modelo.php";

class AjaxSoporte{

	/*=============================================
	EDITAR SOPORTE
	=============================================*/	

	public $idSoporte;

	public function ajaxEditarSoporte(){

		$item = "id";
		$valor = $this->idSoporte;

		$respuesta = ControladorSoporte::ctrMostrarSoporte($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR SOPORTE
=============================================*/	
if(isset($_POST["idSoporte"])){

	$soporte = new AjaxSoporte();
	$soporte -> idSoporte = $_POST["idSoporte"];
	$soporte ->ajaxEditarSoporte();
}
