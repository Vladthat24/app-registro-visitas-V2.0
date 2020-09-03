<?php

require_once "conexion.php";

class ModeloDocumento{

	/*=============================================
	CREAR DOCUMENTO
	=============================================*/

	static public function mdlIngresarDocumento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo_documento,fecha_registro) VALUES (:tipo_documento,SYSDATETIME())");

		$stmt->bindParam(":tipo_documento", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR DOCUMENTO
	=============================================*/

	static public function mdlMostrarDocumento($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT id,tipo_documento,convert(date,fecha_registro) as fecha FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR DOCUMENTO
	=============================================*/

	static public function mdlEditarDocumento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo_documento = :tipo_documento WHERE id = :id");

		$stmt -> bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR DOCUMENTO
	=============================================*/

	static public function mdlBorrarDocumento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

