<?php
session_start();
include_once ("conex.php");
if (!isset($_SESSION["autenticado"]) or !isset($_SESSION["tipo"]) or !isset($_SESSION["usuario"])) {header("Location: index.php?error=2"); }
include('header.php');
?>

<div id="contenido">

<FIELDSET>
	<legend><H4>CONSULTAR AFILIADOS</H4></legend>
	<table bgcolor="#b4b4b4">
		<tr><td width="30%"><label>CONSULTAR POR NOMBRE O APELLIDO:</label></td>
			<td width="30%"><label>CONSULTAR POR CEDULA:</label></td>
		</tr>
		<tr>
			<td>
				<form action='buscar_criterio.php' id="b-nombre" method='post'>
					<input type='text' name='criterio' class="solo-letras" id='criterio'>
					<input type='submit' src='img/ver.ico' value='buscar' class='btn btn-otro b-nombre'>
				</form>

		</td>
			<td>
				<form action='buscar_criterio.php' id="b-cedula" method='post'>
					<input type='text' name='criterio2' class="numeric" id='criterio2'>
					<input type='submit' src='img/ver.ico' value='buscar' class='btn btn-otro b-cedula'>
				</form>
			</td>
		</tr>
	</table>
	<table bgcolor="#777777" width="100%">
		<tr>
			<td>
				<form action='buscar_criterio.php' id="listar" method='post'>
					<input type='hidden' name='criterio3' value='listar' class="numeric">
					<input type='submit' value='listar todos los afiliados' class='btn btn-otro listar'>
				</form>
			</td>
		</tr>
	</table>

</FIELDSET>
	<div id="resultado"></div>


</div><!--contenido-->
<?php
include('footer.php');
?>
