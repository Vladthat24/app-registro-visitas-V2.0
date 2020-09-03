<?php

require_once "../controladores/documento.controlador.php";
require_once "../modelos/documento.modelo.php";

class AjaxDocumento{

	/*=============================================
	EDITAR DOCUMENTO
	=============================================*/	

	public $idDocumento;

	public function ajaxEditarDocumento(){

		$item = "id";
		$valor = $this->idDocumento;

		$respuesta = ControladorDocumento::ctrMostrarDocumento($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR DOCUMENTO
=============================================*/	
if(isset($_POST["idDocumento"])){

	$documento = new AjaxDocumento();
	$documento -> idDocumento = $_POST["idDocumento"];
	$documento -> ajaxEditarDocumento();
}