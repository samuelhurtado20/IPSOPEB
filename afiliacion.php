<?php
session_start();
include_once ("conex.php");
if (!isset($_SESSION["autenticado"]) or !isset($_SESSION["tipo"]) or !isset($_SESSION["usuario"])) {header("Location: index.php?error=2"); }
if (($_SESSION["tipo"]!="1") and ($_SESSION["tipo"]!="2") ) {header("Location: index.php?error=3"); }
include_once ('header.php');
?>

<div id="contenido">

<form method="post" action="operaciones.php" id="formulario">
<fieldset>
	<legend><h2>REGISTRAR AFILIADO</h2></legend>
	<table>
		<input type="hidden" name="accion" VALUE="REGISTRAR AFILIADO">
		<tr><td><label>CEDULA DE IDENTIDAD</label></td>
			<td><label>JERARQUIA</label></td>
			<td><label>CONDICION ACTUAL</label></td></tr>
		<tr><td><select name="nacionalidad" id="nacionalidad">
						<option value="V-">V-</option>
						<option value="E-">E-</option>
					</select>

					<input type='text' name='cedula' id='cedula' maxlength="8" CLASS="numeric"></td>
			<td><input type='text' name="jerarquia" id='jerarquia' value='Empleado Policial' maxlength="17" class="solo-letras"></td>
			<td><select name="empleado" id="empleado">
						<option VALUE="ACTIVO">ACTIVO</option>
						<option VALUE="JUBILADO">JUBILADO</option>
					</select></td></tr>

		<tr><td><label>NOMBRES</label></td>
			<td><label>FECHA DE INGRESO</label></td>
			<td><label>EDO. CIVIL</label></td></tr>
		<tr><td><input type='text' name='nombre' id='nombre' maxlength="25" class="solo-letras"></td>
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
			<td><input type='text' name="apellido" id='apellido' maxlength="25"  class="solo-letras"></td>
			<td><input type='text' name="fecha_nac" id='fecha_nac' readonly></td>
			<td><select name="sexo" id="sexo">
						<option VALUE="">...</option>
						<option VALUE="masculino">MASCULINO</option>
						<option VALUE="femenino">FEMENINO</option>
					</select></td>
		</tr>

		<tr><td colspan="3"><label>DIRECCION</label></td></tr>
		<tr><td colspan="3"><input type='text' name="direccion" id='direccion' class="largo" maxlength="80"></td></tr>		    
		    
		<tr><td><label>TELEFONO DE CONTACTO</label></td>
			<td><label>IMPEDIMENTO FISICO</label></td></tr>
		<tr><td><input type='text' name="telefono" id='telefono' maxlength="12" class="numeric"></td>
			<td><input type='text' name="discapacidad" id='discapacidad' maxlength="15" value="Ninguna"  class="solo-letras"></td></tr>

		<tr><td colspan="3"><label>COMISARIA DONDE TRABAJA</label></td></tr>
		<tr><td colspan="3"><input type='text' name="comisaria" id='comisaria' class="largo" maxlength="80"></td></tr>

		<tr><td COLSPAN="3">
			<input type='submit' value='guardar afiliado' class="btn btn-otro afiliacion">
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