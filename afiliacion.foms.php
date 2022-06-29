<?php
session_start();
include_once ("conex.php");
if (!isset($_SESSION["autenticado"]) or !isset($_SESSION["tipo"]) or !isset($_SESSION["usuario"])) {header("Location: index.php?error=2"); }
if (($_SESSION["tipo"]!="1") and ($_SESSION["tipo"]!="2") ) {header("Location: index.php?error=3"); }
include_once ('header.php');
?>
<div id="contenido">
<form method="post" action="reg_afiliado.php" class="formulario" id="formulario">
<fieldset>
	<legend><h2>REGISTRAR AFILIADO</h2></legend>
	<table>
		<tr><td><label>CEDULA DE IDENTIDAD</label></td>
			<td><label>JERARQUIA</label></td>
			<td><label>EMPLEADO ACTUALMENTE</label></td></tr>
		<tr><td><select name="nacionalidad" id="nacionalidad">
						<option value="V-">V-</option>
						<option value="E-">E-</option>
					</select>
					<input type='text' name='cedula' id='cedula' maxlength="8" CLASS="numeric"></td>
			<td><input type='text' name="jerarquia" id='jerarquia' value='Empleado Policial' maxlength="17" onkeypress="return soloLetras(event)"></td>
			<td><select name="empleado" id="empleado">
						<option VALUE="si">SI</option>
						<option VALUE="no">NO</option>
					</select></td></tr>

		<tr><td><label>NOMBRES</label></td>
			<td><label>FECHA DE INGRESO</label></td>
			<td><label>EDO. CIVIL</label></td></tr>
		<tr><td><input type='text' name='nombre' id='nombre' maxlength="25" onkeypress="return soloLetras(event)"></td>
			<td><input type='text' name='fecha_ingreso' id='fecha_ingreso' readonly></td>
			<td><select name="edo_civil" id="edo_civil">
						<option VALUE="">...</option>
						<option VALUE="CASADO(A)">CASADO(A)</option>
						<option VALUE="SOLTERO(A)">SOLTERO(A)</option>
						<option VALUE="DIVORCIADO(A)">DIVORCIADO(A)</option>
						<option VALUE="VIUDO(A)">VIUDO(A)</option>
				</select></td></tr>

		<tr>
			<td><label>APELLIDOS</label></td>
			<td><label>FECHA DE NACIMIENTO</label></td>
			<td><label>SEXO</label></td></tr>
		<tr>
			<td><input type='text' name="apellido" id='apellido' maxlength="25" onkeypress="return soloLetras(event)"></td>
			<td><input type='text' name="fecha_nac" id='fecha_nac' readonly></td>
			<td><select name="sexo" id="sexo">
						<option VALUE="">...</option>
						<option VALUE="masculino">MASCULINO</option>
						<option VALUE="femenino">FEMENINO</option>
					</select></td>
		</tr>

		<tr><td colspan="3"><label>DIRECCION</label></td></tr>
		<tr><td colspan="3"><input type='text' name="direccion" id='direccion' class="largo" maxlength="60"></td></tr>		    
		    
		<tr><td><label>TELEFONO DE CONTACTO</label></td>
			<td><label>IMPEDIMENTO FISICO</label></td></tr>
		<tr><td><input type='text' name="telefono" id='telefono' maxlength="12" class="numeric"></td>
			<td><input type='text' name="discapacidad" id='discapacidad' maxlength="15" value="Ninguna" onkeypress="return soloLetras(event)"></td></tr>

		<tr><td colspan="3"><label>COMISARIA DONDE TRABAJA</label></td></tr>
		<tr><td colspan="3"><input type='text' name="comisaria" id='comisaria' class="largo" maxlength="45"></td></tr>

		<tr><td colspan="3"><h3>AFILIACION DE FAMILIARES</h3></td></tr>
		<tr><td colspan="3">
				 <table><tr><td><label>NOMBRE Y APELLIDO</label></td>
				 			<td><label>PARENTESCO</label></td>
				 			<td><label>C.I.</label></td>
				 			<td><label>FECHA DE NACIMIENTO</label></td></tr>

						<tr><td><input type='text' name="nombre1" id='nombre1' onkeypress="return soloLetras(event)"></td>
							<td><select name="parentesco1" id="parentesco1">
								<option VALUE="">...</option>
								<option VALUE="CONYUGE">CONYUGE</option>
								<option VALUE="HIJO">HIJO</option>
								<option VALUE="HIJA">HIJA</option>
								<option VALUE="MADRE">MADRE</option>
								<option VALUE="PADRE">PADRE</option>
								</select></td>
							<td><input type='text' name="cedula1" id='cedula1' class="numeric" maxlength="8"></td>
							<td><input type='text' name="fecha_nac_1" id='fecha_nac_1' readonly></td>
						</tr>

						<tr><td><input type='text' name="nombre2" id='nombre2' onkeypress="return soloLetras(event)"></td>
							<td><select name="parentesco2" id="parentesco2">
								<option VALUE="">...</option>
								<option VALUE="CONYUGE">CONYUGE</option>
								<option VALUE="HIJO">HIJO</option>
								<option VALUE="HIJA">HIJA</option>
								<option VALUE="MADRE">MADRE</option>
								<option VALUE="PADRE">PADRE</option>
								</select></td>
							<td><input type='text' name="cedula2" id='cedula2'  class="numeric" maxlength="8"></td>
							<td><input type='text' name="fecha_nac_2" id='fecha_nac_2' readonly></td>
						</tr>

						<tr><td><input type='text' name="nombre3" id='nombre3' onkeypress="return soloLetras(event)"></td>
							<td><select name="parentesco3" id="parentesco3">
								<option VALUE="">...</option>
								<option VALUE="CONYUGE">CONYUGE</option>
								<option VALUE="HIJO">HIJO</option>
								<option VALUE="HIJA">HIJA</option>
								<option VALUE="MADRE">MADRE</option>
								<option VALUE="PADRE">PADRE</option>
								</select></td>
							<td><input type='text' name="cedula3" id='cedula3'  class="numeric" maxlength="8"></td>
							<td><input type='text' name="fecha_nac_3" id='fecha_nac_3' readonly></td>
						</tr>

						<tr><td><input type='text' name="nombre4" id='nombre4' onkeypress="return soloLetras(event)"></td>
							<td><select name="parentesco4" id="parentesco4">
								<option VALUE="">...</option>
								<option VALUE="CONYUGE">CONYUGE</option>
								<option VALUE="HIJO">HIJO</option>
								<option VALUE="HIJA">HIJA</option>
								<option VALUE="MADRE">MADRE</option>
								<option VALUE="PADRE">PADRE</option>
								</select></td>
							<td><input type='text' name="cedula4" id='cedula4'  class="numeric" maxlength="8"></td>
							<td><input type='text' name="fecha_nac_4" id='fecha_nac_4' readonly></td>
						</tr>

						<tr><td><input type='text' name="nombre5" id='nombre5' onkeypress="return soloLetras(event)"></td>
							<td><select name="parentesco5" id="parentesco5">
								<option VALUE="">...</option>
								<option VALUE="CONYUGE">CONYUGE</option>
								<option VALUE="HIJO">HIJO</option>
								<option VALUE="HIJA">HIJA</option>
								<option VALUE="MADRE">MADRE</option>
								<option VALUE="PADRE">PADRE</option>
								</select></td>
							<td><input type='text' name="cedula5" id='cedula5' class="numeric" maxlength="8"></td>
							<td><input type='text' name="fecha_nac_5" id='fecha_nac_5' readonly></td>
						</tr>

				</table>
		</td></tr>
		<tr><td COLSPAN="3">
			<input type='submit' value='GUARDAR AFILIADO' class="submit" id="formu">
			<span id="resultado"></span>
			<img  align="absmiddle" id="ajax_loader" src="img/ajax-loader6.gif" style=" display:none;"/>
			
		</td></tr>
</table>
</fieldset>
</form>
</div><!--contenido-->
<?php
include('footer.php');

?>
