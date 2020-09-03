<?php

require_once "conexion.php";

class ModeloDistrito{

	/*=============================================
	CREAR DISTRITO
	=============================================*/

	static public function mdlIngresarDistrito($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(distrito) VALUES (:distrito)");

		$stmt->bindParam(":distrito", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR DISTRITO
	=============================================*/

	static public function mdlMostrarDistrito($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR DISTRITO
	=============================================*/

	static public function mdlEditarDistrito($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET distrito = :distrito WHERE id = :id");

		$stmt -> bindParam(":distrito", $datos["distrito"], PDO::PARAM_STR);
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
	BORRAR DISTRITO
	=============================================*/

	static public function mdlBorrarDistrito($tabla, $datos){

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

