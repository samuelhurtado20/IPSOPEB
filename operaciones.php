	<script src="js/funciones.js" type="text/javascript"></script>

<?php
include_once ("conex.php"); 

	if(isset($_POST) && !empty($_POST)){
		// Verificamos las variables de acción
		switch ($_POST['accion']) {

			case 'REGISTRAR AFILIADO':
					sleep(3);
					$fecha_ingreso = fecha($fecha_ingreso);
					$fecha_nac = fecha($fecha_nac);
					try {
						global $db;

						$query ="insert into afiliados ( cedula, nacionalidad, nombre, apellido, jerarquia, empleado, fecha_ingreso, edo_civil, fecha_nac, sexo, direccion, telefono, discapacidad, comisaria) values 
						('$cedula', '$nacionalidad', '$nombre', '$apellido', '$jerarquia', '$empleado', '$fecha_ingreso', '$edo_civil', '$fecha_nac', '$sexo', '$direccion', '$telefono', '$discapacidad', '$comisaria')";
						$query2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), '$accion', '1',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($query);
						$db->Execute($query2);
						$db->CompleteTrans();

						echo "<span class='exito'>afiliacion procesada con exito</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>error en afiliacion, ".$db->ErrorMsg()."</span>");
					} 

			break;
			
			case 'ACTUALIZAR AFILIADO':
					sleep(3);
					$fecha_ingreso = fecha($fecha_ingreso);
					$fecha_nac = fecha($fecha_nac);
					try {
						global $db;
						$query = "update afiliados set nacionalidad = '$nacionalidad', cedula = '$cedula2', jerarquia = '$jerarquia', empleado = '$empleado', 
							nombre = '$nombre', fecha_ingreso = '$fecha_ingreso', edo_civil = '$edo_civil', apellido = '$apellido', fecha_nac = '$fecha_nac', sexo = '$sexo',
							direccion='$direccion', telefono = '$telefono', discapacidad = '$discapacidad', comisaria = '$comisaria' where cedula='$cedula'";
						$query2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), '$accion', '1',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($query);
						$db->Execute($query2);
						$db->CompleteTrans();
						echo "<span class='exito'>actualizacion procesada con exito</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>error al procesar la actualizacion ".$db->ErrorMsg()."</span>");
					} 
			break;

			case 'ELIMINAR AFILIADO':
					try {
						global $db;
						$query ="delete from afiliados where cedula='$cedula'";
						$query2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), '$accion', '1',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($query);
						$db->Execute($query2);
						$db->CompleteTrans();
						echo "<span class='exito'>afiliado eliminado con exito , todo su informacion quedo eliminada</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>error al eliminar el afiliado".$db->ErrorMsg()."</span>");
						}
			break;
			
			case 'REGISTRAR PRESTAMO':
					sleep(3);
					$fecha_solicitud = fecha($fecha_solicitud);

					try {
						global $db;
						$query ="insert into prestamos (cedula, fecha_solicitud, monto_s, monto_o, motivo1, motivo2, motivo3, motivo4, motivo5, motivo6, motivo7, documento1, documento2, documento3, documento4, documento5, documento6, documento7, descripcion) values 
						('$cedula2', '$fecha_solicitud', '$monto_s', '$monto_o', '$checkh1', '$checkh2', '$checkh3', '$checkh4', '$checkh5', '$checkh6', '$checkh7', '$documento1', '$documento2', '$documento3', '$documento4', '$documento5', '$documento6', '$otro', '$descripcion')";
						$query2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), '$accion', '1',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($query);
						$db->Execute($query2);
						$db->CompleteTrans();
						echo "<span class='exito'>prestamo procesado con exito</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>error al procesar el prestamo".$db->ErrorMsg()."</span>");
					} 
			break;


			case 'ACTUALIZAR PRESTAMO':
					sleep(3);
					$fecha_solicitud = fecha($fecha_solicitud);

					try {
						global $db;
						$query = "update prestamos set fecha_solicitud = '$fecha_solicitud', monto_s = '$monto_s', monto_o = '$monto_o', motivo1 = '$checkh1', 
							motivo2 = '$checkh2', motivo3 = '$checkh3', motivo4 = '$checkh4', motivo5 = '$checkh5', motivo6 = '$checkh6', motivo7 = '$checkh7',
							documento1 ='$documento1', documento2 = '$documento2', documento3 = '$documento3', documento4 = '$documento4', documento5 = '$documento5', 
							documento6 = '$documento6', documento7 = '$otro', descripcion = '$descripcion' where cedula='$cedula' and id_prestamo = '$id_prestamo'";
						$query2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), '$accion', '1',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($query);
						$db->Execute($query2);
						$db->CompleteTrans();
						echo "<span class='exito'>prestamo actualizado con exito</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>error al procesar la actualizacion del prestamo".$db->ErrorMsg()."</span>");
					} 
			break;

			case 'REGISTRAR AYUDA':
					sleep(3);
					$fecha_solicitud = fecha($fecha_solicitud);

					try {
						global $db;
						$query ="insert into ayudas (cedula, fecha_solicitud, monto_s, monto_o, motivo1, motivo2, motivo3, motivo4, motivo5, motivo6, motivo7, documento1, documento2, documento3, documento4, documento5, documento6, documento7, descripcion) values 
							('$cedula2', '$fecha_solicitud', '$monto_s', '$monto_o', '$checkh1', '$checkh2', '$checkh3', '$checkh4', '$checkh5', '$checkh6', '$checkh7', '$documento1', '$documento2', '$documento3', '$documento4', '$documento5', '$documento6', '$otro', '$descripcion')";
						$query2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), '$accion', '1',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($query);
						$db->Execute($query2);
						$db->CompleteTrans();
						echo "<span class='exito'>ayuda registrada con exito</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>error al procesar la ayuda".$db->ErrorMsg()."</span>");
					} 
			break;


			case 'ACTUALIZAR AYUDA':
					sleep(3);
					$fecha_solicitud = fecha($fecha_solicitud);

					try {
						global $db;
						$query = "update ayudas set fecha_solicitud = '$fecha_solicitud', monto_s = '$monto_s', monto_o = '$monto_o', motivo1 = '$checkh1', 
							motivo2 = '$checkh2', motivo3 = '$checkh3', motivo4 = '$checkh4', motivo5 = '$checkh5', motivo6 = '$checkh6', motivo7 = '$checkh7',
							documento1 ='$documento1', documento2 = '$documento2', documento3 = '$documento3', documento4 = '$documento4', documento5 = '$documento5', 
							documento6 = '$documento6', documento7 = '$otro', descripcion = '$descripcion' where cedula='$cedula' and id_ayuda = '$id_ayuda'";
						$query2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), '$accion', '1',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($query);
						$db->Execute($query2);
						$db->CompleteTrans();
						echo "<span class='exito'>prestamo actualizado con exito</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>error al procesar la actualizacion del prestamo".$db->ErrorMsg()."</span>");
					} 
			break;
			

			case 'BUSQUEDA':
						try {
							global $db;
							if (isset($criterio))    {
								$query ="select * from afiliados where nombre like '%$criterio%' or apellido like '%$criterio%' order by cedula";
							}

							elseif (isset($criterio2)) {
								$query ="select * from afiliados where cedula like '%$criterio2%' order by cedula";
							}
							elseif (isset($criterio3)) {
								$query ="select * from afiliados order by cedula";
							}
							$rs = $db->Execute("$query");

							if ($rs->GetRows()){

							echo "<table width='100%' class='lista'><thead>
							<tr><td width='10%'>CEDULA</td>
								<td>NOMBRE</td>
								<td>APELLIDO</td>
								<td>TELEFONO</td>
								<td  width='4%'><img width='18px' height='18px' align='absmiddle' src='img/eye.png' alt='VER' TITLE='VER PRESTAMO' /></td></tr></thead>";
							foreach ($rs as $row) {	
								echo "<tr><td>".$row["nacionalidad"].$row["cedula"]."</td><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td><td>".$row["telefono"]."<td>
								<img name='".$row['cedula']."' class='ver' width='18px' height='18px' align='absmiddle' alt='VER' TITLE='planilla afiliado' src='img/eye.png' /></td></tr>";
							}
						}
						else echo "<span class='fallida'>no hay resultados para el criterio introducido".$db->ErrorMsg()."</span>";
						} catch (Exception $e) {
							print_r("<span class='fallida'>error al procesar la busqueda".$db->ErrorMsg()."</span>");
						} 
			break;

			case 'EDITAR FAMILIAR':
						try {
							global $db;
							$query ="select * from familiares where id_f = '$id_f'";
							$rs = $db->Execute("$query"); ?>


								<label>NOMBRE Y APELLIDO</label><br>					
								<input type='text' name="nombref2" id='nombre1' placeholder="Nombre y Apellido" value="<?php echo $rs->fields['nombre_f']; ?>" class="solo-letras"><br><br>
								<label>PARENTESCO</label><br>					
								<select name="parentescof2" id="parentescof">
											<option VALUE="">...</option>
											<option <?php if ($rs->fields['parentesco']=='CONYUGE') echo "selected";?> VALUE="CONYUGE">CONYUGE</option>
											<option <?php if ($rs->fields['parentesco']=='HIJO')    echo "selected";?> VALUE="HIJO">HIJO</option>
											<option <?php if ($rs->fields['parentesco']=='HIJA')    echo "selected";?> VALUE="HIJA">HIJA</option>
											<option <?php if ($rs->fields['parentesco']=='MADRE')   echo "selected";?> VALUE="MADRE">MADRE</option>
											<option <?php if ($rs->fields['parentesco']=='PADRE')   echo "selected";?> VALUE="PADRE">PADRE</option>
											</select><br><br>
								<label>CEDULA DE IDENTIDAD</label><br>					
								<input type='text' name="cedulaf2" id='cedula1' class="numeric" maxlength="8" value="<?php echo $rs->fields['cedula_f']; ?>"><br><br>
								<label>FECHA DE NACIMIENTO</label><br>	<input type="hidden" name="id_f2" value="<?php echo $rs->fields['id_f']; ?>">				
								<input type='text' name="fecha_nac_f2" id='fecha_nac_f2' value="<?php echo $fecha_nac_f = fecha($rs->fields['fecha_nac_f']); ?>" readonly><br><br>

						<?php
						} catch (Exception $e) {
							print_r("<span class='fallida'>error al buscar familiar".$db->ErrorMsg()."</span>");
						} 

			break;
			
			case 'RESPALDAR':
				if ($comprimir=='sql'){
					$backupFile = 'respaldo' . date("d-m-Y-h-i-s") . '.sql';
					$command = "mysqldump -h127.0.0.1 -uroot -p18623532 --all-databases  > respaldos/sql/$backupFile";
				}
				
				if ($comprimir=='gzip'){
					$backupFile = 'respaldo' . date("d-m-Y-h-i-s") . '.sql.gz';
					$command = "mysqldump -h127.0.0.1 -uroot -p18623532 --all-databases | gzip > respaldos/gzip/$backupFile";
				}
				system($command,$resultado);
				if (!$resultado)
					print_r("<span class='exito'>se relalizo el respaldo con exito</span>");
				else print_r("<span class='fallida'>error al realizar el respaldo, ".$respaldo."</span><br>");



			break;


			case 'RESTAURAR':
				if ($comp=='sql'){
					$command = "mysql -h127.0.0.1 -uroot -p18623532 < $archivo";
					system($command,$resultado);
					if (!$resultado)
						print_r("<span class='exito'>se relalizo la restauracion con exito</span>");
					else print_r("<span class='fallida'>error al realizar la restauracion ".$respaldo."</span><br>");
				}
				if ($comp=='gzip'){
					system('cd respaldos/gzip');
					$command = "gunzip < $archivo | mysql -uroot -p18623532";
					system($command,$resultado);
					if (!$resultado)
						print_r("<span class='exito'>se relalizo la restauracion gzip con exito</span>");
					else print_r("<span class='fallida'>error al realizar la restauracion gzip ".$respaldo."</span><br>");
				}
				

			break;

			case 'REGISTRAR USUARIO':
					sleep(3);
					$username= $_POST['username'];
					$claveuser = $_POST['claveuser'];
					try { 
						if ($tipo_nivel=='1'){
						$query ="GRANT ALL PRIVILEGES ON *.* TO $username@127.0.0.1 IDENTIFIED BY '$claveuser' WITH GRANT OPTION";}
						
						elseif ($tipo_nivel=='2'){
						$query ="GRANT SELECT, INSERT, UPDATE, DELETE ON *.* TO $username@127.0.0.1 IDENTIFIED BY '$claveuser'";}
						
						elseif ($tipo_nivel=='3'){
						$query ="GRANT SELECT ON *.* TO $username@127.0.0.1 IDENTIFIED BY '$claveuser'";}
						
						if ($db->Execute("$query") === false) {
							print 'error al insertar usuario: '.$db->ErrorMsg().'<BR>';
							}

						echo "<span class='exito'>usuario registrado con exito</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>error al registra el usuario ".$db->ErrorMsg()."<span>");
					} 

			break;
			case 'RESET CLAVE':
					sleep(0);
					
					try {

						global $db;
						$reset= $_POST["reset"];
						$rs3 = $db->Execute("SET PASSWORD FOR '$reset'@'127.0.0.1' = PASSWORD('1234567')");
						$db->Execute("FLUSH PRIVILEGES ");
						echo "<span class='exito'>clave reiniciada con exito</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>no se pudo reiniciar la clave".$db->ErrorMsg()."</span>");
					} 
			break;
			case 'ACTUALIZAR ESTADO':
					try {
						global $db;
						$rs3 = $db->Execute("update ipsopeb.usuarios set estado = '$estado' where id_usuario='$id_user'");
						echo "<span class='exito'>estado cambiado</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>no se pudo cambiar el estado ".$db->ErrorMsg()."</span>");
					} 
			break;
			case 'CAMBIAR NIVEL':
					try {
						global $db;
						$id_user = $_POST['id_user'];
						if ($nivel=='1'){
							$rs3 = $db->Execute("update mysql.db set Select_priv ='Y', Insert_priv ='Y', Update_priv ='Y', Delete_priv ='Y', Grant_priv ='Y' WHERE User ='$id_user' and Db ='ipsopeb'");
						}
						elseif ($nivel=='2'){
							$rs3 = $db->Execute("update mysql.db set Select_priv ='Y', Insert_priv ='Y', Update_priv ='Y', Delete_priv ='Y', Grant_priv ='N' WHERE User ='$id_user' and Db ='ipsopeb'");
						}
						elseif ($nivel=='3') {
							$rs3 = $db->Execute("update mysql.db set Select_priv ='Y', Insert_priv ='N', Update_priv ='N', Delete_priv ='N', Grant_priv ='N' WHERE User ='$id_user' and Db ='ipsopeb'");
						}
						$db->Execute("FLUSH PRIVILEGES ");
						
						echo "<span class='exito'>nivel cambiado</span>";
					} catch (Exception $e) {
						print_r("<span class='fallida'>no se pudo cambiar el nivel ".$db->ErrorMsg()."</span>");
					} 
			break;

			case 'REGISTAR AYUDA':



			break;


			case 'ACTUALIZAR AYUDA':


			break;

			default:
				$mensajeError = "<span class='fallida'>OPERACION NO DISPONIBLE".$db->ErrorMsg()."</span>";
			break;
		}
	}
	else{
		$mensajeError = "<span class='fallida'>FALLO AL REALIZAR LA ACCION".$db->ErrorMsg()."</span>";
	}
	$db->Close();
?>