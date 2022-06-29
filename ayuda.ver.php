<?php
session_start();
include_once ("conex.php");
if (!isset($_SESSION["autenticado"]) or !isset($_SESSION["tipo"]) or !isset($_SESSION["usuario"])) {header("Location: index.php?error=2"); }
if (($_SESSION["tipo"]!="1") and ($_SESSION["tipo"]!="2") ) {header("Location: index.php?error=3"); }
include_once ('header.php');

include_once ("conex.php"); ?>
<div id="contenido">
<?php
		try {
				global $db;
				$query ="SELECT * FROM afiliados JOIN ayudas USING (cedula) WHERE cedula = '$cedula' AND id_ayuda = '$id_ayuda'";
				$rs = $db->Execute("$query");

				if ($rs->RecordCount()!=0){ ?>
<FIELDSET class="formula">
			<legend><h2>DETALLES DE LA AYUDA ECONOMICA</h2></legend>
	<form ACTION="operaciones.php" method="POST" id="prestamof">			
	<table width="100%">
		<tr><td><label>CEDULA DEL AFILIADO</label></td>
			<td><label>NOMBRE DEL AFILIADO</label></td>
			<td><label>APELLIDO DEL AFILIADO</label></td>
		</tr>

		<input type='hidden' name="cedula2" VALUE="<?php echo $rs->fields['cedula']; ?>">
		<input type='hidden' name="accion" VALUE="REGISTRAR PRESTAMO">

		<tr><td><label><input type='text' name="cedula"    VALUE="<?php echo $rs->fields['nacionalidad'].$rs->fields['cedula']; ?>" disabled></label></td>
			<td><label><input type='text' name="nombre"    VALUE="<?php echo $rs->fields['nombre']; ?>" disabled></label></td>
			<td><label><input type='text' name="apellido"  VALUE="<?php echo $rs->fields['apellido']; ?>" disabled></label></td>
		</tr>

		<tr><td><label>FECHA DE LA SOLICITUD</label></td>
			<td><label>MONTO SOLICITADO</label></td>
			<td><label>MONTO OTORGADO</label></td>
		</tr>
		<tr><td><label><input type='text' name="fecha_solicitud" id="fecha_solicitud" VALUE="<?php echo fecha($rs->fields['fecha_solicitud']); ?>" disabled></label></td>
			<td><label><input type='text' name="monto_s" id="monto_s" class="numeric" VALUE="<?php echo $rs->fields['monto_s']; ?>" disabled></label></td>
			<td><label><input type='text' name="monto_o" id="monto_o" class="numeric" VALUE="<?php echo $rs->fields['monto_o']; ?>" disabled></label></td>
		</tr>
		<tr><td colspan=3><label>MOTIVO DE LA SOLICITUD:</label></td></tr>
		<tr><td colspan=3>
<div id="format" align="center">    
	<input type="checkbox" id="check1" <?php if ($rs->fields['motivo1']!='') echo "CHECKED"; ?> disabled/><label for="check1">SALUD</label>    
	<input type="checkbox" id="check2" <?php if ($rs->fields['motivo2']!='') echo "CHECKED"; ?> disabled/><label for="check2">VIVIENDA</label>    
	<input type="checkbox" id="check3" <?php if ($rs->fields['motivo3']!='') echo "CHECKED"; ?> disabled/><label for="check3">EDUCACION</label>
	<input type="checkbox" id="check4" <?php if ($rs->fields['motivo4']!='') echo "CHECKED"; ?> disabled/><label for="check4">VARIOS</label>
	<input type="checkbox" id="check5" <?php if ($rs->fields['motivo5']!='') echo "CHECKED"; ?> disabled/><label for="check5">MEDICINAS</label>
	<input type="checkbox" id="check6" <?php if ($rs->fields['motivo6']!='') echo "CHECKED"; ?> disabled/><label for="check6">FUNEBRES</label>
	<input type="checkbox" id="check7" <?php if ($rs->fields['motivo7']!='') echo "CHECKED"; ?> disabled/><label for="check7">MERCADO</label>
</div>
		</td></tr>
		<input type='hidden' name="checkh1" id="checkh1" value="">
		<input type='hidden' name="checkh2" id="checkh2" value="">
		<input type='hidden' name="checkh3" id="checkh3" value="">
		<input type='hidden' name="checkh4" id="checkh4" value="">
		<input type='hidden' name="checkh5" id="checkh5" value="">
		<input type='hidden' name="checkh6" id="checkh6" value="">
		<input type='hidden' name="checkh7" id="checkh7" value="">

		<input type='hidden' name="documento1" id="documento1" value="">
		<input type='hidden' name="documento2" id="documento2" value="">
		<input type='hidden' name="documento3" id="documento3" value="">
		<input type='hidden' name="documento4" id="documento4" value="">
		<input type='hidden' name="documento5" id="documento5" value="">
		<input type='hidden' name="documento6" id="documento6" value="">
	<tr><td colspan=2 id="numero"><label>DESCRIPCION:</label></td>
		<td><label>DOCUMENTOS ANEXADOS</label></td></tr>
		<tr><td colspan=2> 
	<textarea COLS="55" ROWS="12" id="descripcion" name="descripcion" disabled><?php echo $rs->fields['descripcion']; ?></textarea>
		</td>
		<td>
	<input type="checkbox" id="document1" value="COPIA DE LA C.I"                <?php if ($rs->fields['documento1']!='') echo "CHECKED"; ?> disabled/><label>COPIA DE LA C.I</label><BR>
	<input type="checkbox" id="document2" value="COPIA ULTIMO RECIBO DE PAGO"    <?php if ($rs->fields['documento2']!='') echo "CHECKED"; ?> disabled/><label>COPIA ULTIMO RECIBO DE PAGO</label><BR>      
	<input type="checkbox" id="document3" value="INFORME O CONSTANCIA MEDICA"    <?php if ($rs->fields['documento3']!='') echo "CHECKED"; ?> disabled/><label>INFORME O CONSTANCIA MEDICA</label><BR>  
	<input type="checkbox" id="document4" value="CARTA DE SOLICITUD"             <?php if ($rs->fields['documento4']!='') echo "CHECKED"; ?> disabled/><label>CARTA DE SOLICITUD</label><BR> 
	<input type="checkbox" id="document5" value="PRESUPUESTO DE MATERIAL U OTRO" <?php if ($rs->fields['documento5']!='') echo "CHECKED"; ?> disabled/><label>PRESUPUESTO DE MATERIAL U OTRO</label><br>   
	<input type="checkbox" id="document6" value="SOLVENCIA"                      <?php if ($rs->fields['documento6']!='') echo "CHECKED"; ?> disabled/><label>SOLVENCIA</label><br>   
	<input type="checkbox" id="otro"      VALUE="OTRO"                           <?php if ($rs->fields['documento7']!='') echo "CHECKED"; ?> disabled/><label>OTRO: </label><br> <input type='text' name="otro" id="otro2" size="25" maxlength="25" VALUE="<?php echo $rs->fields['documento7']; ?>" disabled>  
	</td></tr>
</table></form> <?PHP } else echo "<br><br><span class='fallida'>NO HAY RESULTADOS PARA EL CRITERIO INTRODUCIDO".$db->ErrorMsg()."</span>";

			} catch (Exception $e) {
				print_r("<br><br><span class='fallida'>ERROR AL CONSULTAR AFILIADO".$db->ErrorMsg()."</span>");
				}
?>
</div><!--contenido-->
<?php
include('footer.php');

?>


