	<?php
	foreach($_POST as $nombre_campo => $valor){ 
	echo $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
	eval($asignacion);} 
	foreach($_GET as $nombre_campo => $valor){ 
	$asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
	eval($asignacion);} 



				if ($comprimir=='sql'){
					echo $backupFile = 'respaldo' . date("d-m-Y-h-i-s") . '.sql';
					$command = "mysqldump -h127.0.0.1 -u root -p18623532 --all-databases  > respaldos/sql/$backupFile";
				}
				
				if ($comprimir=='gzip'){
					$backupFile = 'respaldo' . date("d-m-Y-h-i-s") . '.sql.gz';
					$command = "mysqldump -h127.0.0.1 -u root -p18623532 --all-databases | gzip > respaldos/gzip/$backupFile";
				}
				exec($command,$resultado);
				if (isset($resultado))
					print_r("<span class='exito'>se relalizo el respaldo con exito</span>");
				else print_r("<span class='fallida'>error al realizar el respaldo, ".$respaldo."</span><br>");

				if ($comp=='sql'){
					$command = "mysql -h127.0.0.1 -u root -p18623532 < $archivo";
					exec($command,$resultado);
					if (isset($resultado))
						print_r("<span class='exito'>se relalizo la restauracion con exito</span>");
					else print_r("<span class='fallida'>error al realizar la restauracion ".$respaldo."</span><br>");
				}
				if ($comp=='gzip'){
					$command = "gz < $archivo | mysql -h127.0.0.1 -u root -p18623532";
					exec($command,$resultado);
					if (isset($resultado))
						print_r("<span class='exito'>se relalizo la restauracion gzip con exito</span>");
					else print_r("<span class='fallida'>error al realizar la restauracion gzip ".$respaldo."</span><br>");
				}
				



?> 