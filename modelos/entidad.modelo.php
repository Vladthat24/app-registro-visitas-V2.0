<?php

require_once "conexion.php";

class ModeloEntidad{

	/*=============================================
	CREAR ENTIDAD
	=============================================*/

	static public function mdlIngresarEntidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(entidad,fecha_registro) VALUES (:entidad,SYSDATETIME())");

		$stmt->bindParam(":entidad", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ENTIDAD
	=============================================*/

	static public function mdlMostrarEntidad($tabla, $item, $valor){

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
	static public function mdlMostrarUltimoRegistroEntidad($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT TOP 1 * FROM $tabla ORDER BY id DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
    /* =============================================
      MOSTRAR CANTIDAD DE ENTIDAD
      ============================================= */

      static public function mdlCantidadEntidad($tabla, $item, $valor)
      {
          //CAPTURAR DATOS PARA EL EDIT EN EL FORMULARIO
          if ($item != null) {
  
              $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
  
              $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
  
              $stmt->execute();
  
              return $stmt->fetch();
          } else {
  
              $stmt = Conexion::conectar()->prepare("SELECT count(*) AS CANTIDAD FROM $tabla");
  
              $stmt->execute();
  
              return $stmt->fetchAll();
          }
  
          $stmt->close();
  
          $stmt = null;
      }
	/*=============================================
	EDITAR ENTIDAD
	=============================================*/

	static public function mdlEditarEntidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET entidad = :entidad WHERE id = :id");

		$stmt -> bindParam(":entidad", $datos["entidad"], PDO::PARAM_STR);
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
	BORRAR ENTIDAD
	=============================================*/

	static public function mdlBorrarEntidad($tabla, $datos){

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

