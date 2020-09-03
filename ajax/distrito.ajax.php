<?php

require_once "../controladores/distrito.controlador.php";
require_once "../modelos/distrito.modelo.php";

class AjaxDistrito{

	/*=============================================
	EDITAR DISTRITO
	=============================================*/	

	public $idDistrito;

	public function ajaxEditarDistrito(){

		$item = "id";
		$valor = $this->idDistrito;

		$respuesta = ControladorDistrito::ctrMostrarDistrito($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR DISTRITO
=============================================*/	
if(isset($_POST["idDistrito"])){

	$categoria = new AjaxDistrito();
	$categoria -> idDistrito = $_POST["idDistrito"];
	$categoria -> ajaxEditarDistrito();
}
