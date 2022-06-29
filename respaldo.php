<?php
session_start();
include_once ("conex.php");
if (!isset($_SESSION["autenticado"]) or !isset($_SESSION["tipo"]) or !isset($_SESSION["usuario"])) {header("Location: index.php?error=2"); }
if (($_SESSION["tipo"]!="1")) {header("Location: index.php?error=3"); }
include_once ('header.php');
?>

<div id="contenido">

<FIELDSET>
	<legend><H4>RESPALDAR || RESTAURAR</H4></legend>
	<img  align="absmiddle" id="ajax_loader" src="img/ajax-loader6.gif" style=" display:none;"/>
	<div id='resultado'></div><br>

	<form action='operaciones.php' method='post' id='respaldar'>
	<table bgcolor="#b4b4b4" width='100%'>
		<tr><td width='50%'><label>generar respaldo sin comprimir:</label></td>
			<td>
				
					<input type='hidden' name='comprimir' value="sql">
					<input type='hidden' name='accion' value="RESPALDAR">
					<input type='submit' value='respaldar la base de datos(.sql)' class='btn btn-otro'>
				
			</td>
		</tr>
	</table>
	</form>


	<form action='operaciones.php' method='post' id='respaldar3'>
	<table bgcolor="#777777" width='100%'>
		<tr><td width='50%'><label>generar respaldo comprimido en gzip:</label></td>
			<td>	<input type='hidden' name='comprimir' value="gzip">
					<input type='hidden' name='accion' value="RESPALDAR">
					<input type='submit' value='respaldar la base de datos(.gzip)' class='btn btn-otro'>
				
			</td>
		</tr>
	</table>
	</form>

	<form action='operaciones.php' method='post' id='restaurar'>
	<table bgcolor="#b4b4b4"  width='100%'>
		<tr><td width='50%'><label>selecionar respaldo a restaurar:</label>
			
					<?php
						$directorio=opendir('respaldos/sql'); 
						$carpeta = @scandir('respaldos/sql');
						$num = count($carpeta);
						if ($num < 3){
						    echo "<br><br><span class='fallida'>no existen respaldos</span><br><br> ";
						} 
							    while ($archivo = readdir($directorio)){
									if (($archivo!='.') and ($archivo!='..')){
										echo "<br><input type='radio' name='archivo' value='respaldos/sql/$archivo'>";
										echo "$archivo"; 
									}
								}
							closedir($directorio);
					?> 
		</td>
			<td >	<input type='hidden' name='accion' value="RESTAURAR">
					<input type='hidden' name='comp' value="sql">
					<input type='submit' value='restaurar la base de datos(.sql)' class='btn btn-otro'>
				
			</td>
		</tr>
	</table>
	</form>

	<form action='operaciones.php' method='post' id='restaurar2'>
	<table bgcolor="#777777"  width='100%'>
		<tr><td width='50%'><label>selecionar respaldo a restaurar:</label>
			
					<?php
						$directorio=opendir('respaldos/gzip'); 
						$carpeta = @scandir('respaldos/gzip');
						$num = count($carpeta);
						if ($num < 3){
						    echo "<br><br><span class='fallida'>no existen respaldos</span><br><br> ";
						} 
							    while ($archivo = readdir($directorio)){
									if (($archivo!='.') and ($archivo!='..')){
										echo "<br><input type='radio' name='archivo' value='respaldos/gzip/$archivo'>";
										echo "$archivo"; 
									}
								}
						closedir($directorio);							
					?> 
		</td>
			<td >	<input type='hidden' name='accion' value="RESTAURAR">
					<input type='hidden' name='comp' value="gzip">
					<input type='submit' value='restaurar la base de datos(.gzip)' class='btn btn-otro'>
				
			</td>
		</tr>
	</table>
	</form>

</FIELDSET>
	<div id="resultado"></div>


</div><!--contenido-->
<?php
include('footer.php');
?>
