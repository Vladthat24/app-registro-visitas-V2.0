<?php

require_once "conexion.php";

class ModeloReporteTicket
{
    /*=============================================
	RANGO FECHAS
	=============================================*/

    static public function mdlReporteTicket($tabla, $fechaInicial, $fechaFinal)
    {

        if ($fechaInicial == null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();


        } else if ($fechaInicial == $fechaFinal) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%' ORDER BY id DESC");

            $stmt->bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();

        } else {


            $fechaActual = new DateTime();

            $fechaActual->add(new DateInterval("P1D"));

            $fechaActualMasUno = $fechaActual->format("Y-m-d");


            $fechaFinal2 = new DateTime($fechaFinal);

            $fechaFinal2->add(new DateInterval("P1D"));

            $fechaFinalMasUno = $fechaFinal2->format("Y-m-d");


            if ($fechaFinalMasUno == $fechaActualMasUno) {

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ORDER BY id DESC");
            } else {


                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id DESC");
            }

            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
}
