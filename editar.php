<?php
include('header.php');
include_once ("conex.php");
?>

<div id="contenido">
<?php 
		try {
				global $db;
				$query ="select * from afiliados where cedula = '$cedula'";
				$rs = $db->Execute("$query"); ?>
<form method="post" action="operaciones.php" id="afiliado-editar">
<fieldset>
	<legend><h2>EDITAR AFILIADO</h2></legend>
	<table>
		<tr><td><label>CEDULA DE IDENTIDAD</label></td>
			<td><label>JERARQUIA</label></td>
			<td><label>CONDICION ACTUAL</label></td></tr>
		<tr><td><select name="nacionalidad" id="nacionalidad">
						<option value="V-" <?php if ($rs->fields['nacionalidad']=='V-') echo "selected"; ?>  >V-</option>
						<option value="E-" <?php if ($rs->fields['nacionalidad']=='E-') echo "selected"; ?>  >E-</option>
					</select>
					<input type="hidden" name="cedula" VALUE="<?php echo $rs->fields['cedula']; ?>">
					<input type="hidden" name="accion" VALUE="ACTUALIZAR AFILIADO">
					<input type='text' name='cedula2' id='cedula' maxlength="8" CLASS="numeric" VALUE="<?php echo $rs->fields['cedula']; ?>"></td>
			<td><input type='text' name="jerarquia" id='jerarquia' VALUE="<?php echo $rs->fields['jerarquia']; ?>" maxlength="17" onkeypress="return soloLetras(event)"></td>
			<td><select name="empleado" id="empleado">
						<option VALUE="ACTIVO" <?php if ($rs->fields['empleado']=='ACTIVO') echo "selected"; ?>   >ACTIVO</option>
						<option VALUE="JUBILADO" <?php if ($rs->fields['empleado']=='JUBILADO') echo "selected"; ?> >JUBILADO</option>
					</select></td></tr>

		<tr><td><label>NOMBRES</label></td>
			<td><label>FECHA DE INGRESO</label></td>
			<td><label>EDO. CIVIL</label></td></tr>
		<tr><td><input type='text' name='nombre' id='nombre' maxlength="25" onkeypress="return soloLetras(event)" VALUE="<?php echo $rs->fields['nombre']; ?>"></td>
			<td><input type='text' name='fecha_ingreso' id='fecha_ingreso' readonly VALUE="<?php echo fecha($rs->fields['fecha_ingreso']); ?>"></td>
			<td><select name="edo_civil" id="edo_civil">
						<option VALUE="">...</option>
						<option VALUE="CASADO(A)"     <?php if ($rs->fields['edo_civil']=='CASADO(A)') echo "selected"; ?>>CASADO(A)</option>
						<option VALUE="SOLTERO(A)"    <?php if ($rs->fields['edo_civil']=='SOLTERO(A)') echo "selected"; ?>>SOLTERO(A)</option>
						<option VALUE="DIVORCIADO(A)" <?php if ($rs->fields['edo_civil']=='DIVORCIADO(A)') echo "selected"; ?>>DIVORCIADO(A)</option>
						<option VALUE="VIUDO(A)"      <?php if ($rs->fields['edo_civil']=='VIUDO(A)') echo "selected"; ?>>VIUDO(A)</option>
				</select></td></tr>

		<tr>
			<td><label>APELLIDOS</label></td>
			<td><label>FECHA DE NACIMIENTO</label></td>
			<td><label>SEXO</label></td></tr>
		<tr>
			<td><input type='text' name="apellido" id='apellido' maxlength="25" onkeypress="return soloLetras(event)" VALUE="<?php echo $rs->fields['apellido']; ?>"></td>
			<td><input type='text' name="fecha_nac" id='fecha_nac' readonly VALUE="<?php echo fecha($rs->fields['fecha_nac']); ?>"></td>
			<td><select name="sexo" id="sexo">
						<option VALUE="">...</option>
						<option VALUE="masculino" <?php if (strtoupper($rs->fields['sexo'])=='MASCULINO') echo "selected"; ?>>MASCULINO</option>
						<option VALUE="femenino"  <?php if (strtoupper($rs->fields['sexo'])=='FEMENINO') echo "selected"; ?>>FEMENINO</option>
					</select></td>
		</tr>

		<tr><td colspan="3"><label>DIRECCION</label></td></tr>
		<tr><td colspan="3"><input type='text' name="direccion" id='direccion' class="largo" maxlength="80" VALUE="<?php echo $rs->fields['direccion']; ?>"></td></tr>		    
		    
		<tr><td><label>TELEFONO DE CONTACTO</label></td>
			<td><label>IMPEDIMENTO FISICO</label></td></tr>
		<tr><td><input type='text' name="telefono" id='telefono' maxlength="12" class="numeric" VALUE="<?php echo $rs->fields['telefono']; ?>"></td>
			<td><input type='text' name="discapacidad" id='discapacidad' maxlength="15" value="Ninguna" onkeypress="return soloLetras(event)" VALUE="<?php echo $rs->fields['discapacidad']; ?>"></td></tr>

		<tr><td colspan="3"><label>COMISARIA DONDE TRABAJA</label></td></tr>
		<tr><td colspan="3"><input type='text' name="comisaria" id='comisaria' class="largo" maxlength="80" VALUE="<?php echo $rs->fields['comisaria']; ?>"></td></tr>

		<tr><td COLSPAN="3">
			<input type='submit' value='guardar cambios' class="btn btn-otro afiliacion">
			<span id="resultado"></span>
			<img  align="absmiddle" id="ajax_loader" src="img/ajax-loader6.gif" style=" display:none;"/>
			
		</td></tr>
</table>
</fieldset>
</form>

			<?php
			} catch (Exception $e) {
				print_r("<span class='fallida'>ERROR AL BUSCAR FAMILIAR".$db->ErrorMsg()."</span>");
			} 

?>
</div><!--contenido-->
<?php
include('footer.php');

?>