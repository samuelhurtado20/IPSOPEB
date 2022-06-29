<?php
session_start();
include_once ("conex.php");
if (!isset($_SESSION["autenticado"]) or !isset($_SESSION["tipo"]) or !isset($_SESSION["usuario"])) {header("Location: index.php?error=2"); }
if (($_SESSION["tipo"]!="1")) {header("Location: index.php?error=3"); }
include_once ('header.php');
?>
<div id="contenido">

	<form action='operaciones.php' method='post' id="adduser">
<FIELDSET >
	<legend><H4>AGREGAR USUARIO</H4></legend>
	<table align='center'  width='70%'><input type="hidden" name="accion" VALUE="REGISTRAR USUARIO">
		<tr><td ><label>ALIAS / NICK DE USUARIO</label></td>
			<td ><label>NIVEL DE PERMISOS</label></td></tr>
		<tr><td ><label><input type='text' name='username' id='username'></label></td>
			<td >
	 			<select name='tipo_nivel' id='tipo_nivel'>
	 				<option value=""> ... </option>
	 				<option value='1'>ALTO  -1-</option>
	 				<option value='2'>MEDIO -2-</option>
	 				<option value='3'>BAJO  -3-</option>
	 			</select>
	 		</td></tr>
		
		<tr><td ><label>CLAVE O PASSWORD</label></td>
			<td ><label>CONFIRMAR CLAVE O PASSWORD</label></td></tr>
		<tr><td ><label><input type='password' name='clave' id='clave'></label><div class='confirmada'> </div></td>
			<td ><label><input type='password' name='claveuser' id='claveuser'></label></td></tr>
 		
 		<tr><td COLSPAN="2">
				<input type='submit' value='AGREGAR USUARIO' class="btn btn-otro adduser">
				<span id="resultado"></span>
				<img  align="absmiddle" id="ajax_loader" src="img/ajax-loader6.gif" style=" display:none;"/>			
			</td></tr>
	</table>
	

</FIELDSET>
	</form>
	<div id="consulta"></div>


</div><!--contenido-->
<?php
include_once ('footer.php');
?>
