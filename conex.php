	<?php
	foreach($_POST as $nombre_campo => $valor){ 
	$asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
	eval($asignacion);} 
	foreach($_GET as $nombre_campo => $valor){ 
	$asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
	eval($asignacion);} 

		function fecha ($recibe){
			$format = explode("-", $recibe);
			$devuelve = $format[2]."-".$format[1]."-".$format[0];
			return $devuelve;
	}

		include('adodb5/adodb-exceptions.inc.php');
		include('adodb5/adodb.inc.php');
		$db = NewADOConnection('mysql');
		$conex = $db->Connect("127.0.0.1", "root", "18623532", "ipsopeb");
	?>