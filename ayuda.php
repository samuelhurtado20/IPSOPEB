<?php
session_start();
include_once ("conex.php");
if (!isset($_SESSION["autenticado"]) or !isset($_SESSION["tipo"]) or !isset($_SESSION["usuario"])) {header("Location: index.php?error=2"); }
if (($_SESSION["tipo"]!="1") and ($_SESSION["tipo"]!="2") ) {header("Location: index.php?error=3"); }
include_once ('header.php');
?>

<div id="contenido">

<FIELDSET>
	<legend><H4>AGREGAR AYUDA ECONOMICA</H4></legend>
	<form method="POST" action="ayuda.form.php" id="ayuda-cargar">
	<table bgcolor="#b4b4b4">
		<tr><td width="30%"><label>CEDULA DEL AFILIADO</label></td></tr>
		<tr><td><label><input type='text' name="cedula" class="numeric" id="buscar" maxlength="8" >
			<input type='submit' value='cargar datos' class="btn btn-otro ayuda-cargar" ></LABEL>
		</td>
		</tr>
	</table></form>

	<div id="planilla"></div>


</div><!--contenido-->
<?php
include('footer.php');

?>