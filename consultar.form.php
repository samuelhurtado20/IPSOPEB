	<script src="js/valida.js" type="text/javascript"></script> 
	<script src="js/funciones.js" type="text/javascript"></script>
	<form class="formulario">
<FIELDSET class="formula">
	<legend><H4>CONSULTAR AFILIADOS</H4></legend>
	<table bgcolor="#b4b4b4">
		<tr><td width="30%"><label>CONSULTAR POR NOMBRE O APELLIDO:</label></td>
			<td width="30%"><label>CONSULTAR POR CEDULA:</label></td>
		</tr>
		<tr><td><label><input type='text' name="buscar" id="buscar" onkeypress="return soloLetras(event)"></label></td>
			<td><label><input type='text' name="buscar" id="b_cedula" class="numeric"></label></td>
		</tr>
	</table>
	<table bgcolor="#777777" width="100%"><tr><td><label><input type='button' value='LISTAR TODOS LOS AFILIADOS' class="submit" id="listar"></label></td></tr></table>

</FIELDSET>
	</form>
	<div id="consulta"></div>