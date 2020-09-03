<?php

    class ControladorReporteTicket{
	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrReporteTicket($fechaInicial, $fechaFinal){

		$tabla = "ticket";

		$respuesta = ModeloReporteTicket::mdlReporteTicket($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}

    }
