<?php

require_once "../controladores/perfil.controlador.php";
require_once "../modelos/perfil.modelo.php";

class AjaxPerfil{

	/*=============================================
	EDITAR PERFIL
	=============================================*/	

	public $idPerfil;

	public function ajaxEditarPerfil(){

		$item = "id";
		$valor = $this->idPerfil;

		$respuesta = ControladorPerfil::ctrMostrarPerfil($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR PERFIL
=============================================*/	
if(isset($_POST["idPerfil"])){

	$perfil = new AjaxPerfil();
	$perfil -> idPerfil = $_POST["idPerfil"];
	$perfil -> ajaxEditarPerfil();
}