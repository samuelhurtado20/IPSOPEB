<?php
session_start();
include_once ("conex.php");
if (!isset($_SESSION["autenticado"]) or !isset($_SESSION["tipo"]) or !isset($_SESSION["usuario"])) {header("Location: index.php?error=2"); }
include('header.php');
include_once ("conex.php");

		try {
				global $db;
				$query ="select * from afiliados where cedula='$cedula'";
				$rs = $db->Execute("$query");
				if ($rs->EOF){ 
					echo "<br><br><span class='fallida'>ERROR AL CONSULTAR AFILIADO".$db->ErrorMsg()."</span>";
					exit;
					 }
			} catch (Exception $e) {
				print_r("<span class='fallida'>ERROR AL CONSULTAR AFILIADO".$db->ErrorMsg()."</span>");
			} 



?>
<div id="contenido">
<div id="dialog-confirm" title="¿REALMENTE DESEA ELIMINAR EL FAMILIAR?" style="display: none;">    
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>¿ESTA SEGURO DE REALIZAR ESTA ACCION?, EL FAMILIAR QUEDARA ELIMINADO PERMANENTEMENTE</p>
</div>

<div id="dialog-prestamo" title="¿REALMENTE DESEA ELIMINAR EL PRESTAMO?" style="display: none;">    
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>¿ESTA SEGURO DE REALIZAR ESTA ACCION?, EL PRESTAMO QUEDARA ELIMINADO PERMANENTEMENTE</p>
</div>

<div id="dialog-ayuda" title="¿REALMENTE DESEA ELIMINAR LA AYUDA?" style="display: none;">    
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>¿ESTA SEGURO DE REALIZAR ESTA ACCION?, LA AYUDA QUEDARA ELIMINADA PERMANENTEMENTE</p>
</div>

<div id="dialog-afiliado" title="¿ELIMINAR AFILIADO?" style="display: none;">    
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>¿ESTA SEGURO DE REALIZAR ESTA ACCION?, EL AFILIADO QUEDARA ELIMINADO PERMANENTEMENTE, ASI COMO LOS FAMILIARES ASOCIADOS, LOS PRESTAMOS Y AYUDAS ECONIMICAS, Y DEMAS INFORMACION ASOCIADA.</p>
</div>
		<div id="agregarUser" Title="AGREGAR FAMILIAR" style="display: none;">
	    	<form action="" method="post" id="formUsers" name="formUsers">
					<label>NOMBRE Y APELLIDO</label><br>					
					<input type='text' name="nombref" id='nombre1' placeholder="Nombre y Apellido" onkeypress="return soloLetras(event)"><br><br>
					<label>PARENTESCO</label><br>					
					<select name="parentescof" id="parentescof">
								<option VALUE="">...</option>
								<option VALUE="CONYUGE">CONYUGE</option>
								<option VALUE="HIJO">HIJO</option>
								<option VALUE="HIJA">HIJA</option>
								<option VALUE="MADRE">MADRE</option>
								<option VALUE="PADRE">PADRE</option>
								</select><br><br>
					<label>CEDULA DE IDENTIDAD</label><br>					
					<input type='text' name="cedulaf" id='cedula1' class="numeric" maxlength="8"><br><br>
					<label>FECHA DE NACIMIENTO</label><br>					
					<input type='text' name="fecha_nac_f" id='fecha_nac_f' readonly><br><br>
			</form>
	    </div>




		<div id="editarf" Title="EDITAR FAMILIAR" style="display: none;">

	    </div>
<fieldset>
	<legend><h2>FICHA DEL AFILIADO</h2></legend>

	<table>
		<tr><td><label>CEDULA DE IDENTIDAD</label></td>
			<td><label>JERARQUIA</label></td>
			<td><label>EMPLEADO ACTUALMENTE</label></td>
		</td></tr>
		<tr><td><input type='text' name="nacionalidad" id="nacionalidad" VALUE="<?php echo $rs->fields['nacionalidad']; ?>" size="1" disabled>
				<input type='text' name='cedula' id='cedula' maxlength="8" CLASS="numeric" VALUE="<?php echo $rs->fields['cedula']; ?>" disabled></td>
			<td><input type='text' name="jerarquia" id='jerarquia' value='Empleado Policial' maxlength="17" onkeypress="return soloLetras(event)" VALUE="<?php echo $rs->fields['jerarquia']; ?>" disabled></td>
			<td><input type='text' id='empleado' VALUE="<?php echo $rs->fields['empleado']; ?>" disabled></td></tr>

		<tr><td><label>NOMBRES</label></td>
			<td><label>FECHA DE INGRESO</label></td>
			<td><label>EDO. CIVIL</label></td></tr>
		<tr><td><input type='text' name='nombre' id='nombre' maxlength="25" onkeypress="return soloLetras(event)" VALUE="<?php echo $rs->fields['nombre']; ?>" disabled></td>
			<td><input type='text' name='fecha_ingreso' id='fecha_ingreso' VALUE="<?php echo fecha($rs->fields['fecha_ingreso']); ?>" disabled></td>
			<td><input type='text' id='edo_civil' VALUE="<?php echo $rs->fields['edo_civil']; ?>" disabled></td></tr>

		<tr>
			<td><label>APELLIDOS</label></td>
			<td><label>FECHA DE NACIMIENTO</label></td>
			<td><label>SEXO</label></td></tr>
		<tr>
			<td><input type='text' name="apellido" id='apellido' maxlength="25" onkeypress="return soloLetras(event)" VALUE="<?php echo $rs->fields['apellido']; ?>" disabled></td>
			<td><input type='text' name="fecha_nac" id='fecha_nac' VALUE="<?php echo fecha($rs->fields['fecha_nac']); ?>" disabled></td>
			<td><input type='text' id='sexo' VALUE="<?php echo $rs->fields['sexo']; ?>" disabled></td>
		</tr>

		<tr><td colspan="3"><label>DIRECCION</label></td></tr>
		<tr><td colspan="3"><input type='text' VALUE="<?php echo $rs->fields['direccion']; ?>" disabled class="largo"></td></tr>		    
		    
		<tr><td><label>TELEFONO DE CONTACTO</label></td>
			<td><label>IMPEDIMENTO FISico</label></td></tr>
		<tr><td><input type='text' name="telefono" id='telefono' maxlength="12" class="numeric" VALUE="<?php echo $rs->fields['telefono']; ?>" disabled></td>
			<td><input type='text' name="discapacidad" id='discapacidad' maxlength="15" value="Ninguna" VALUE="<?php echo $rs->fields['discapacidad']; ?>" disabled></td></tr>

		<tr><td colspan="3"><label>COMISARIA DONDE TRABAJA</label></td></tr>
		<tr><td colspan="3"><input type='text' name="comisaria" id='comisaria' class="largo" maxlength="45" VALUE="<?php echo $rs->fields['comisaria']; ?>" disabled></td></tr>
	</table><br>
<?php if (($_SESSION["tipo"]=="1") or ($_SESSION["tipo"]=="2")) { ?> 
	<form action='editar.php' class='formu-btn' method='post'>
		<input type="hidden" name='cedula' value='<?php echo $cedula; ?>'>
		<input type='submit' value='editar afiliado' class="btn btn-otro" >
	</form>
	
	<form class='formu-btn'><input type='button' value='eliminar afiliado' id='borrar_a' class="btn btn-otro" name="<?php echo $cedula; ?>"></form>
	<form class='formu-btn'><input type='button' value='agregar familiar' id='agregar' class="btn btn-otro" name="<?php echo $cedula; ?>"></form>
	
	<form action='prestamo.form.php' class='formu-btn' method='post'>
		<input type="hidden" name='cedula' value='<?php echo $cedula; ?>'>
		<input type='submit' value='agregar prestamo' class="btn btn-otro" >
	</form>

	<form action='ayuda.form.php' class='formu-btn' method='post'>
		<input type="hidden" name='cedula' value='<?php echo $cedula; ?>'>
		<input type='submit' value='agregar ayuda' class="btn btn-otro" >
	</form>
<br><br>
<?php } ?>

	<h3>FAMILIARES AFILIADOS </h3> 
	<?php
					if (!empty($cedulaf) and !empty($nombref) and !empty($parentescof) and !empty($fecha_nac_f) and empty($update)){ $fecha_nac_f = fecha($fecha_nac_f);
		try {
				global $db;
				$reg_fam ="insert into familiares (cedula,nombre_f,parentesco,cedula_f,fecha_nac_f) values ('$cedula','$nombref','$parentescof','$cedulaf','$fecha_nac_f')";
				$reg_fam2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), 'REGISTRAR FAMILIAR', '1',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($reg_fam);
						$db->Execute($reg_fam2);
						$db->CompleteTrans();
				echo "<span class='exito'>afiliacion de familiar procesada con exito</span>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>error al procesar la afiliacion del familiar".$db->ErrorMsg()."</span>");
			} }
					if (!empty($update)){ $fecha_nac_f = fecha($fecha_nac_f);
		try {
				global $db;
				$editar_fam = "update familiares set nombre_f = '$nombref', parentesco = '$parentescof', cedula_f = '$cedulaf', fecha_nac_f = '$fecha_nac_f' where id_f='$id_f2'";
				$editar_fam2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), 'ACTUALIZAR FAMILIAR', '$id_f2',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($editar_fam);
						$db->Execute($editar_fam2);
						$db->CompleteTrans();
				echo "<span class='exito'>actualizacion de familiar exitosa</span>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>no se pudo actualizar familiar ".$db->ErrorMsg()."</span>");
			} }

				if (!empty($id_f)){
		try {
				global $db;
				$delete_fam ="delete from familiares where id_f='$id_f'";
				$delete_fam2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), 'ELIMINAR FAMILIAR', '$id_f',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($delete_fam);
						$db->Execute($delete_fam2);
						$db->CompleteTrans();
				echo "<span class='exito'>familiar eliminado</span>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>error al eliminar familiar".$db->ErrorMsg()."</span>");
				}
				}
	?>

	<table CLASS="lista" width="100%">

				<thead><td>NOMBRE Y APELLIDO</td>
				 			<td >PARENTESCO</td>
				 			<td >C.I.</td>
				 			<td >FECHA DE NACIMIENTO</td>
				 			<?php if (($_SESSION["tipo"]=="1") or ($_SESSION["tipo"]=="2")) { ?>
				 			<td align="center"><img width='18px' height='18px' align='absmiddle' src='img/lapiz.ico' alt='EDITAR' /></td>
				 			<td align="center"><img width='18px' height='18px' align='absmiddle' src='img/delete.ico' alt='ELIMINAR' /></td>
				 			<?php } ?>
				 </thead>
<?php		try {
				global $db;
				$query2 ="select * from familiares where cedula='$cedula'";
				$rs2 = $db->Execute("$query2");
				if ($rs2->GetRows()){
				foreach ($rs2 as $row) { $fecha_nac_f = fecha($rs2->fields['fecha_nac_f']);
					?>

				  		<tr><td><?php echo $rs2->fields['nombre_f']; ?></td>
							<td><?php echo $rs2->fields['parentesco']; ?></td>
							<td><?php echo $rs2->fields['cedula_f']; ?></td>
							<td><?php echo $fecha_nac_f; ?></td>
						<?php if (($_SESSION["tipo"]=="1") or ($_SESSION["tipo"]=="2")) { ?>
							<td align="center"><img name="<?php echo $rs2->fields['id_f']; ?>" class='editar_f btn-image' width='18px' height='18px' align='absmiddle' src='img/lapiz.ico' alt='EDITAR' TITLE="EDITAR FAMILIAR" /></td>
							<td align="center"><img name="<?php echo $rs2->fields['id_f']; ?>" class='borrar_f btn-image' width='18px' height='18px' align='center'    src='img/delete.ico' alt='ELIMINAR' TITLE="ELIMINAR FAMILIAR"  /></td>
						<?php } ?>
						</tr>
			<?php	}
						}
				else echo "<tr><td colspan='4' class='fallida'>el afiliado no posee prestamos registrados</td></tr>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>error al consultar prestamos</span>");
			}
?>
				</table>
<h3> PRESTAMOS ASOCIADOS</h3>

<?php

				if (!empty($id_prestamo)){
		try {
				global $db;
				$delete_pres ="delete from prestamos where id_prestamo='$id_prestamo'";
				$delete_pres2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), 'ELIMINAR PRESTAMO', '$id_prestamo',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($delete_pres);
						$db->Execute($delete_pres2);
						$db->CompleteTrans();
				echo "<span class='exito'>prestamo elminado</span>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>error al eliminar el prestamo ".$db->ErrorMsg()."</span>");
				}
				}


?>				 <table CLASS="lista" width="100%">
				 	<thead><td>FECHA DE SOLICI.</td>
				 			<td width='120px'>MONTO SOLICITADO</td>
				 			<td width='120px'>MONTO OTORGADO</td>
				 			<td width='220px'>MOTIVO DE LA SOLICITUD</td>
				 			<td align="center"><img width='18px' height='18px' align='absmiddle' src='img/eye.png' alt='VER' TITLE="VER" /></td>
				 			<?php if (($_SESSION["tipo"]=="1") or ($_SESSION["tipo"]=="2")) { ?>
				 			<td align="center"><img width='18px' height='18px' align='absmiddle' src='img/lapiz.ico' alt='EDITAR' TITLE="EDITAR" /></td>
				 			<td align="center"><img width='18px' height='18px' align='absmiddle' src='img/delete.ico' alt='ELIMINAR' TITLE="ELIMINAR" /></td>
				 			<?php } ?>
				 	</thead>
<?php		try {
				global $db;
				$query2 ="select * from prestamos where cedula='$cedula' ORDER BY fecha_solicitud";
				$rs2 = $db->Execute("$query2");
				if ($rs2->GetRows()){
				foreach ($rs2 as $row) { $fecha_solicitud = fecha($rs2->fields['fecha_solicitud']);
					?>

				  		<tr><td><?php echo $fecha_solicitud; ?></td>
							<td><?php echo $rs2->fields['monto_s']; ?> BS.</td>
							<td><?php echo $rs2->fields['monto_o']; ?> BS.</td>
							<td><?php echo $rs2->fields['motivo1']." ".$rs2->fields['motivo2']." ".$rs2->fields['motivo3']." ".$rs2->fields['motivo4']." ".$rs2->fields['motivo5']." ".$rs2->fields['motivo6']." ".$rs2->fields['motivo7']; ?></td>
							<td align="center">
								<form action='prestamo.ver.php' method='post' id="ver-prestamo">
										<input type="hidden" name='cedula' value='<?php echo $cedula; ?>'>
										<input type="hidden" name='id_prestamo' value='<?php echo $rs2->fields['id_prestamo']; ?>'>
										<input type="image" class='btn-image' src="img/eye.png">
								</form>
							</td>
							<?php if (($_SESSION["tipo"]=="1") or ($_SESSION["tipo"]=="2")) { ?>
							<td align="center">
								<form action='prestamo.editar.php' method='post' id="editar-prestamo">
										<input type="hidden" name='cedula' value='<?php echo $cedula; ?>'>
										<input type="hidden" name='id_prestamo' value='<?php echo $rs2->fields['id_prestamo']; ?>'>
										<input type="image" class='btn-image' src="img/lapiz.ico">
								</form>
							</td>				 			

							<td align="center"><img name="<?php echo $rs2->fields['id_prestamo']; ?>" class="borrar_p f btn-image" width='18px' height='18px' align='absmiddle' src='img/delete.ico' alt='ELIMINAR' TITLE="ELIMINAR PRESTAMO" /></td>
						<?php } ?>
						</tr>
			<?php	}
						}
				else echo "<tr><td colspan='4' class='fallida'>el afiliado no posee prestamos afiliados</td></tr>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>error al consultar prestamos</span>");
			}
?>
			</table>












			<h3>AYUDAS ECONOMICAS</h3>

<?php

				if (!empty($id_ayuda)){
		try {
				global $db;
				$delete_ayudas ="delete from ayudas where id_ayuda='$id_ayuda'";
				$delete_ayudas2 ="insert into transacciones (id_t, usuario, accion, id_afectado, fecha_accion) VALUES (NULL , CURRENT_USER(), 'EDITAR FAMILIAR', '$id_ayuda',CURRENT_TIMESTAMP)";

						$db->StartTrans();
						$db->Execute($delete_ayudas);
						$db->Execute($delete_ayudas2);
						$db->CompleteTrans();
				echo "<span class='exito'>AYUDA ELIMINADA</span>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>ERROR AL ELIMINAR LA AYUDA".$db->ErrorMsg()."</span>");
				}
				}


?>				 <table CLASS="lista" width="100%">
				 	<thead><td>FECHA DE SOLICI.</td>
				 			<td width='120px'>MONTO SOLICITADO</td>
				 			<td width='120px'>MONTO OTORGADO</td>
				 			<td width='220px'>MOTIVO DE LA SOLICITUD</td>
				 			<td align="center"><img width='18px' height='18px' align='absmiddle' src='img/eye.png' alt='VER' TITLE="VER" /></td>
				 			<?php if (($_SESSION["tipo"]=="1") or ($_SESSION["tipo"]=="2")) { ?>
				 			<td align="center"><img width='18px' height='18px' align='absmiddle' src='img/lapiz.ico' alt='EDITAR' TITLE="EDITAR" /></td>
				 			<td align="center"><img width='18px' height='18px' align='absmiddle' src='img/delete.ico' alt='ELIMINAR' TITLE="ELIMINAR" /></td>
				 			<?php } ?>
				 	</thead>
<?php		try {
				global $db;
				$query2 ="select * from ayudas where cedula='$cedula' ORDER BY fecha_solicitud";
				$rs2 = $db->Execute("$query2");
				if ($rs2->GetRows()){
				foreach ($rs2 as $row) { $fecha_solicitud = fecha($rs2->fields['fecha_solicitud']);
					?>

				  		<tr><td><?php echo $fecha_solicitud; ?></td>
							<td><?php echo $rs2->fields['monto_s']; ?> BS.</td>
							<td><?php echo $rs2->fields['monto_o']; ?> BS.</td>
							<td><?php echo $rs2->fields['motivo1']." ".$rs2->fields['motivo2']." ".$rs2->fields['motivo3']." ".$rs2->fields['motivo4']." ".$rs2->fields['motivo5']." ".$rs2->fields['motivo6']." ".$rs2->fields['motivo7']; ?></td>
							<td align="center">
								<form action='ayuda.ver.php' method='post' id="ver-prestamo">
										<input type="hidden" name='cedula' value='<?php echo $cedula; ?>'>
										<input type="hidden" name='id_ayuda' value='<?php echo $rs2->fields['id_ayuda']; ?>'>
										<input type="image" class='btn-image' src="img/eye.png">
								</form>
							</td>
							<?php if (($_SESSION["tipo"]=="1") or ($_SESSION["tipo"]=="2")) { ?>
							<td align="center">
								<form action='ayuda.editar.php' method='post' id="editar-prestamo">
										<input type="hidden" name='cedula' value='<?php echo $cedula; ?>'>
										<input type="hidden" name='id_ayuda' value='<?php echo $rs2->fields['id_ayuda']; ?>'>
										<input type="image" class='btn-image' src="img/lapiz.ico">
								</form>
							</td>
				 			<td align="center"><img name="<?php echo $rs2->fields['id_ayuda']; ?>"  class='borrar_a f btn-image' width='18px' height='18px' align='absmiddle' src='img/delete.ico' alt='ELIMINAR' TITLE="ELIMINAR AYUDA" /></td>
							<?php } ?>
						</tr>
			<?php	}
						}
				else echo "<tr><td colspan='4' class='fallida'>EL AFILIADO NO POSEE AYUDAS REGISTRADAS</td></tr>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>ERROR AL CONSULTAR LAS AYUDAS</span>");
			}
?>
			</table>
			
		<tr><td COLSPAN="3"></td></tr>
</table>
</fieldset>
</div><!--contenido-->
<?php
include('footer.php');

?>