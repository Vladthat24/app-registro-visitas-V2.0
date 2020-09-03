<?php

class Conexion
{

	static public function conectar()
	{

		/* CONEXION CON EL HOSTING DIRIS LIMA SUR - MYSQL */

/*  		$link = new PDO(
			"mysql:host=localhost;dbname=dirislim_monitoreocovid19",
			"dirislim_7rhm9W9W",
			"VEDADWddlTECaEXj"
		);
		$link->exec("set names utf8");  */


/* CONEXION CON LA BASE DE DATOS LOCAL - MYSQL */

/* 		$link = new PDO(
			"mysql:host=localhost;dbname=dirislim_monitoreocovid19",
			"root",
			"");
		$link->exec("set names utf8"); */

/* CONEXION CON LA BASE DE DATOS LOCAL - SQL SERVER*/

		$link = new PDO('sqlsrv:Server=ETF_DESARROLLO;Database=dirislim_visita', 'sa', '1597531994');
		$link->exec("set names utf8");

		return $link;
	}
}
