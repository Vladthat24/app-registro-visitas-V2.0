<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/documento.controlador.php";
require_once "controladores/perfil.controlador.php";
require_once "controladores/entidad.controlador.php";
require_once "controladores/funcionario.controlador.php";
require_once "controladores/registro.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/documento.modelo.php";
require_once "modelos/perfil.modelo.php";
require_once "modelos/entidad.modelo.php";
require_once "modelos/funcionario.modelo.php";
require_once "modelos/registro.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();






