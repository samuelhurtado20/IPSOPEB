<?php  
sleep(3);
	foreach($_POST as $nombre_campo => $valor){ 
	$asignacion = "\$" . $nombre_campo . "='" . strtoupper($valor) . "';"; 
	eval($asignacion);} 

		include_once('adodb5/adodb-exceptions.inc.php');
		include_once('adodb5/adodb.inc.php');
		$db = NewADOConnection('mysql');
		$db->Connect("127.0.0.1", "root", "18623532", "IPSOPEB");


		function fecha ($recibe){
			$format = explode("-", $recibe);
			$devuelve = $format[2]."-".$format[1]."-".$format[0];
			return $devuelve;
	}
$fecha_solicitud = fecha($fecha_solicitud);

		try {
				global $db;
				$query ="insert into prestamos (cedula, fecha_solicitud, monto_s, monto_o, motivo1, motivo2, motivo3, motivo4, motivo5, motivo6, motivo7, documento1,documento2,documento3,documento4,documento5,documento6,documento7, descripcion) values 
				('$cedula2', '$fecha_solicitud', '$monto_s', '$monto_o', '$checkh1', '$checkh2', '$checkh3', '$checkh4', '$checkh5', '$checkh6', '$checkh7', '$documento1', '$documento2', '$documento3', '$documento4', '$documento5', '$documento6', '$otro', '$descripcion')";
				$rs = $db->Execute("$query");
				echo "<span class='exito'>PRESTAMO PROCESADO CON EXITO</span>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>ERROR AL PROCESAR EL PRESTAMO".$db->ErrorMsg()."</span>");
			} 


?>