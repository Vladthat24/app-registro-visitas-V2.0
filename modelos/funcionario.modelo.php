<?php

require_once "conexion.php";

class ModeloFuncionario
{
    /* =============================================
      MOSTRAR FUNCIONARIO
      ============================================= */

    static public function mdlMostrarFuncionario($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id desc");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT Tap_Funcionario.id,Tap_TipoDocumento.tipo_documento as tipo_documento,
             num_documento, nombre,(select entidad from Tap_Entidad where id=identidad) as entidad,cargo,convert(date,Tap_Funcionario.fecha_registro)as 
             fecha_registro FROM $tabla inner join Tap_TipoDocumento on 
             Tap_Funcionario.idtipo_documento=Tap_TipoDocumento.id ORDER BY Tap_Funcionario.id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }



    static public function mdlMostrarUltimoRegistroFuncionario($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id desc");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT TOP 1 * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }


        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      MOSTRAR CANTIDAD DE FUNCIONARIO
      ============================================= */

      static public function mdlCantidadFuncionario($tabla, $item, $valor)
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





    /* =============================================
      REGISTRO DE FUNCIONARIO
      ============================================= */

    static public function mdlIngresarFuncionario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
        (idtipo_documento,num_documento,nombre,identidad,
        cargo,fecha_registro) 
        VALUES (:idtipo_documento,:num_documento,:nombre,:identidad,
        :cargo,SYSDATETIME())");


        $stmt->bindParam(":idtipo_documento", $datos["idtipo_documento"], PDO::PARAM_INT);
        $stmt->bindParam(":num_documento", $datos["num_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":identidad", $datos["identidad"], PDO::PARAM_INT);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      EDITAR FUNCIONARIO
      ============================================= */

    static public function mdlEditarFuncionario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idtipo_documento=:idtipo_documento,
        num_documento=:num_documento,nombre = :nombre,identidad= :identidad,cargo=:cargo,
        fecha_registro=SYSDATETIME() WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":idtipo_documento", $datos["idtipo_documento"], PDO::PARAM_INT);
        $stmt->bindParam(":num_documento", $datos["num_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":identidad", $datos["identidad"], PDO::PARAM_INT);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);



        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      ACTUALIZAR FUNCIONARIO
      ============================================= */

    static public function mdlActualizarFuncionario($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      BORRAR FUNCIONARIO
      ============================================= */

    static public function mdlBorrarFuncionario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
