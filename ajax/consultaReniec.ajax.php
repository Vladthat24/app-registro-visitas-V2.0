//archivo consulta_reniec.php
 
//Corregido varios programadores
//Creditos Programadores
//Lima-Peru
 
<?php
require 'webServiceReniec.php';
error_reporting(E_ALL ^ E_NOTICE);
   
$dni = $_POST['dni'];
 
//OBTENEMOS EL VALOR

$consulta = file_get_html('http://eldni.com/buscar-por-dni?dni='.$dni);
 
$datosnombres = array();

foreach($consulta->find('td') as $header) {
 $datosnombres[] = $header->plaintext;
}
//print_r($headlines);
 
 
//LA LOGICA DE LA PAGINAS ES APELLIDO PATERNO | APELLIDO MATERNO | NOMBRES
 
//$partes = explode("|", $consulta);
 
 
$datos = array(
        0 => $dni,
        1 => $datosnombres[0],
        2 => $datosnombres[1],
        3 => $datosnombres[2],
);
 
echo json_encode($datos);
 
?>
