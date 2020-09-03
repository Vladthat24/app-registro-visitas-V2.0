<?php

require_once "../../controladores/plantilla.controlador.php";
require_once "../../controladores/usuarios.controlador.php";
require_once "../../controladores/registro.controlador.php";

require_once "../../modelos/usuarios.modelo.php";
require_once "../../modelos/registro.modelo.php";


$reporte = new ControladorRegistro();
$reporte -> ctrDescargarReporte();




