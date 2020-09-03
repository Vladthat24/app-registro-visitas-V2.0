<?php

require_once "conexion.php";

class ModeloRegistro
{
    /* =============================================
      MOSTRAR RANGOS DE FECHA
      ============================================= */
    static public function mdlRangoFechasRegistro($tabla, $fechaInicial, $fechaFinal)
    {

        if ($fechaInicial == null) {
            /* var_dump("NULL"); */
            $stmt = Conexion::conectar()->prepare("SELECT Tap_RegistroVisita.id as id,
            (SELECT tipo_documento FROM Tap_TipoDocumento WHERE id=Tap_Funcionario.idtipo_documento) as TipoDocF,    
            Tap_Funcionario.num_documento as num_documento,
            Tap_Funcionario.nombre as nombre,
            Tap_Funcionario.cargo as cargo,
            (SELECT entidad FROM Tap_Entidad WHERE id=Tap_Funcionario.identidad) as ent_funcionario,
            Tap_RegistroVisita.motivo as motivo,
            Tap_RegistroVisita.servidor_publico as servidor_publico,
            Tap_RegistroVisita.area_oficina_sp as area_oficina_sp,
            Tap_RegistroVisita.cargo as cargo,
            FORMAT(CONVERT(date,Tap_RegistroVisita.fecha_ingreso),'dd/MM/yyyy') as fecha_ingreso,
			CONVERT(varchar(25), CAST(Tap_RegistroVisita.hora_ingreso as TIME),100) as hora_ingreso,
            FORMAT(Tap_RegistroVisita.fecha_salida,'dd/MM/yyyy') as fecha_salida,
            Tap_RegistroVisita.hora_salida as hora_salida,
            Tap_RegistroVisita.usuario as usuario  
            FROM $tabla left join Tap_Funcionario  on 
            Tap_RegistroVisita.idfuncionario=Tap_Funcionario.id 
            ORDER BY Tap_RegistroVisita.id DESC");

            $stmt->execute();

            return $stmt->fetchAll();

        } else if ($fechaInicial == $fechaFinal) {
            /* var_dump("ELSE IF"); */
            $stmt = Conexion::conectar()->prepare("SELECT Tap_RegistroVisita.id as id,
            (SELECT tipo_documento FROM Tap_TipoDocumento WHERE id=Tap_Funcionario.idtipo_documento) as TipoDocF,    
            Tap_Funcionario.num_documento as num_documento,
            Tap_Funcionario.nombre as nombre,
            Tap_Funcionario.cargo as cargo,
            (SELECT entidad FROM Tap_Entidad WHERE id=Tap_Funcionario.identidad) as ent_funcionario,
            Tap_RegistroVisita.motivo as motivo,
            Tap_RegistroVisita.servidor_publico as servidor_publico,
            Tap_RegistroVisita.area_oficina_sp as area_oficina_sp,
            Tap_RegistroVisita.cargo as cargo,
            FORMAT(CONVERT(date,Tap_RegistroVisita.fecha_ingreso),'dd/MM/yyyy') as fecha_ingreso,
			CONVERT(varchar(25), CAST(Tap_RegistroVisita.hora_ingreso as TIME),100) as hora_ingreso,
            FORMAT(Tap_RegistroVisita.fecha_salida,'dd/MM/yyyy') as fecha_salida,
            Tap_RegistroVisita.hora_salida as hora_salida,
            Tap_RegistroVisita.usuario as usuario  
            FROM $tabla left join Tap_Funcionario  on 
            Tap_RegistroVisita.idfuncionario=Tap_Funcionario.id 
            WHERE FORMAT(CONVERT(date,Tap_RegistroVisita.fecha_ingreso),'dd/MM/yyyy')
            like '%$fechaInicial%' ORDER BY Tap_RegistroVisita.id DESC");



            $stmt->execute();

            return $stmt->fetchAll();


        } else {
            /* var_dump("ELSE"); */
            $stmt = Conexion::conectar()->prepare("SELECT Tap_RegistroVisita.id as id,
            (SELECT tipo_documento FROM Tap_TipoDocumento WHERE id=Tap_Funcionario.idtipo_documento) as TipoDocF,    
            Tap_Funcionario.num_documento as num_documento,
            Tap_Funcionario.nombre as nombre,
            Tap_Funcionario.cargo as cargo,
            (SELECT entidad FROM Tap_Entidad WHERE id=Tap_Funcionario.identidad) as ent_funcionario,
            Tap_RegistroVisita.motivo as motivo,
            Tap_RegistroVisita.servidor_publico as servidor_publico,
            Tap_RegistroVisita.area_oficina_sp as area_oficina_sp,
            Tap_RegistroVisita.cargo as cargo,
            FORMAT(CONVERT(date,Tap_RegistroVisita.fecha_ingreso),'dd/MM/yyyy') as fecha_ingreso,
			CONVERT(varchar(25), CAST(Tap_RegistroVisita.hora_ingreso as TIME),100) as hora_ingreso,
            FORMAT(Tap_RegistroVisita.fecha_salida,'dd/MM/yyyy') as fecha_salida,
            Tap_RegistroVisita.hora_salida as hora_salida,
            Tap_RegistroVisita.usuario as usuario  
            FROM $tabla left join Tap_Funcionario  on 
            Tap_RegistroVisita.idfuncionario=Tap_Funcionario.id 
            ORDER BY Tap_RegistroVisita.id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    /* =============================================
      MOSTRAR REGISTRO
      ============================================= */

    static public function mdlMostrarRegistro($tabla, $item, $valor)
    {
        //CAPTURAR DATOS PARA EL EDIT EN EL FORMULARIO
        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT Tap_RegistroVisita.id as id,
            (SELECT tipo_documento FROM Tap_TipoDocumento WHERE id=Tap_Funcionario.idtipo_documento) as TipoDocF,    
            Tap_Funcionario.num_documento as num_documento,
            Tap_Funcionario.nombre as nombre,
            Tap_Funcionario.cargo as cargo,
            (SELECT entidad FROM Tap_Entidad WHERE id=Tap_Funcionario.identidad) as ent_funcionario,
            Tap_RegistroVisita.motivo as motivo,
            Tap_RegistroVisita.servidor_publico as servidor_publico,
            Tap_RegistroVisita.area_oficina_sp as area_oficina_sp,
            Tap_RegistroVisita.cargo as cargo,
            FORMAT(CONVERT(date,Tap_RegistroVisita.fecha_ingreso),'dd/MM/yyyy') as fecha_ingreso,
			CONVERT(varchar(25), CAST(Tap_RegistroVisita.hora_ingreso as TIME),100) as hora_ingreso,
            FORMAT(Tap_RegistroVisita.fecha_salida,'dd/MM/yyyy') as fecha_salida,
            Tap_RegistroVisita.hora_salida as hora_salida,
            Tap_RegistroVisita.usuario as usuario  
            FROM $tabla left join Tap_Funcionario  on 
            Tap_RegistroVisita.idfuncionario=Tap_Funcionario.id 
            ORDER BY Tap_RegistroVisita.id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    /* =============================================
      MOSTRAR CANTIDAD DE VISITAS
      ============================================= */

    static public function mdlCantidadRegistros($tabla, $item, $valor)
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
      REGISTRO DE TICKET
      ============================================= */

    static public function mdlIngresarRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idfuncionario,
        motivo,servidor_publico,area_oficina_sp,cargo,fecha_ingreso,hora_ingreso,usuario)
        VALUES (:idfuncionario,:motivo,:servidor_publico,:area_oficina_sp,:cargo,
        :fecha_ingreso,:hora_ingreso,:usuario)");

        $stmt->bindParam(":idfuncionario", $datos["idfuncionario"], PDO::PARAM_INT);
        $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
        $stmt->bindParam(":servidor_publico", $datos["servidor_publico"], PDO::PARAM_STR);
        $stmt->bindParam(":area_oficina_sp", $datos["area_oficina_sp"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":hora_ingreso", $datos["hora_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);



        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }


    /* =============================================
      REGISTRO DE VISITAS CUANDO EL USUARIO ES NUEVO
      ============================================= */

    static public function mdlIngresarRegistroIngresarFuncionario($tabla, $datos)
    {

        $stmt1 = Conexion::conectar()->prepare("INSERT INTO Tap_Funcionario
        (idtipo_documento,num_documento,nombre,identidad,
        cargo,fecha_registro) 
        VALUES (:idtipo_documento,:num_documento,:nombre,:identidad,
        :cargo,SYSDATETIME())");


        $stmt1->bindParam(":idtipo_documento", $datos["idtipo_documento"], PDO::PARAM_INT);
        $stmt1->bindParam(":num_documento", $datos["num_documento"], PDO::PARAM_STR);
        $stmt1->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt1->bindParam(":identidad", $datos["identidad"], PDO::PARAM_INT);
        $stmt1->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);


        $stmt1->execute();

        //OBTENER EL ULTIMO REGISTRO INSERTADO EN LA TABLA FUNCINCIONARIO
        $item2 = null;
        $valor2 = null;

        $ultimoRegistroFuncionario = ControladorFuncionario::ctrMostrarUltimoRegistroFuncionario($item2, $valor2);

        /* $ultimoRegistroFuncionario["num_documento"]; */
        foreach ($ultimoRegistroFuncionario as $key => $va) {
            $idfuncionario = $va["id"]; //ULTIMO REGISTRO 
        }


        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idfuncionario,
          motivo,servidor_publico,area_oficina_sp,cargo,fecha_ingreso,hora_ingreso,usuario)
          VALUES ($idfuncionario,:motivo,:servidor_publico,:area_oficina_sp,:cargo,
          :fecha_ingreso,:hora_ingreso,:usuario)");


        $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
        $stmt->bindParam(":servidor_publico", $datos["servidor_publico"], PDO::PARAM_STR);
        $stmt->bindParam(":area_oficina_sp", $datos["area_oficina_sp"], PDO::PARAM_STR);
        $stmt->bindParam(":cargo", $datos["cargo"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":hora_ingreso", $datos["hora_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);



        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      EDITAR TICKET
      ============================================= */

    static public function mdlEditarRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha_salida=:fecha_salida,hora_salida=:hora_salida WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha_salida", $datos["fecha_salida"], PDO::PARAM_STR);
        $stmt->bindParam(":hora_salida", $datos["hora_salida"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /* =============================================
      BORRAR TICKET
      ============================================= */

    static public function mdlEliminarRegistro($tabla, $datos)
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

    /* =============================================
      ACTUALIZAR TICKET
      ============================================= */

    static public function mdlActualizarRegistro($tabla, $item1, $valor1, $valor)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":id", $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
