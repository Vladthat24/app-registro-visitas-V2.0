<?php

class Conexion
{

	static public function conectar()
	{

		/* CONEXION CON EL HOSTING DIRIS LIMA SUR - MYSQL */

/*  		$link = new PDO(
			"mysql:host=localhost;dbname=NOMBREDB",
			"USUARIO",
			"CONTRASEÑA"
		);
		$link->exec("set names utf8");  */


/* CONEXION CON LA BASE DE DATOS LOCAL - MYSQL */

/* 		$link = new PDO(
			"mysql:host=localhost;dbname=NOMBREDB",
			"root",
			"");
		$link->exec("set names utf8"); */

/* CONEXION CON LA BASE DE DATOS LOCAL - SQL SERVER*/

		$link = new PDO('sqlsrv:Server=NAMESERVER;Database=NOMBREDB', 'USUARIO', 'PASSWORD');
		$link->exec("set names utf8");

		return $link;
	}
}
