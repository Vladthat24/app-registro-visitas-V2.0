<?php

require_once "../controladores/entidad.controlador.php";
require_once "../modelos/entidad.modelo.php";

class AjaxEntidad{

	/*=============================================
	EDITAR ENTIDAD
	=============================================*/	

	public $idEntidad;

	public function ajaxEditarEntidad(){

		$item = "id";
		$valor = $this->idEntidad;

		$respuesta = ControladorEntidad::ctrMostrarEntidad($item, $valor);

		echo json_encode($respuesta);

	}

		/*=============================================
	BUSCAR ENTIDAD
	=============================================*/	

	public $entidad;

	public function ajaxBuscarEntidad(){

		$item = "entidad";
		$valor = $this->entidad;

		$respuesta = ControladorEntidad::ctrMostrarEntidad($item, $valor);

		echo json_encode($respuesta);

	}
}


/*=============================================
EDITAR ENTIDAD
=============================================*/	
if(isset($_POST["idEntidad"])){

	$entidad = new AjaxEntidad();
	$entidad -> idEntidad = $_POST["idEntidad"];
	$entidad -> ajaxEditarEntidad();
}

/*=============================================
BUSCAR ENTIDAD
=============================================*/	
if(isset($_POST["entidad"])){

	$entidad = new AjaxEntidad();
	$entidad -> entidad = $_POST["entidad"];
	$entidad -> ajaxBuscarEntidad();
}
