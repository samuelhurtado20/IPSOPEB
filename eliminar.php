<?php include_once ("conex.php"); 

		try {
				global $db;
				$query ="delete from afiliados where cedula='$cedula'";
				$rs = $db->Execute("$query");
				echo "<span class='exito'>AFILIADO ELIMINADO CON EXITO, TODA LA INFORMACION ASOCIADA QUEDO ELIMINADA.</span>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>ERROR AL ELIMINAR EL AFILIADO".$db->ErrorMsg()."</span>");
				}
