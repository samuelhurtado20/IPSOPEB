<?php
include('header.php');

include_once ("conex.php"); ?>
<div id="contenido">
<?php
		try {
				global $db;
				$query ="select * from afiliados where cedula='$cedula'";
				$rs = $db->Execute("$query");

				if ($rs->RecordCount()=='0'){ echo "<br><br><span class='fallida'>no hay resultados para el criterio introducido ".$db->ErrorMsg()."</span>"; } 
				else { ?>


<FIELDSET>
			<legend><h2>AGREGAR PRESTAMO</h2></legend>
	<form ACTION="operaciones.php" method="POST" id="prestamo-nuevo">			
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
		<tr><td><label><input type='text' name="fecha_solicitud" id="fecha_solicitud" readonly></label></td>
			<td><label><input type='text' name="monto_s" id="monto_s" class="monto"></label></td>
			<td><label><input type='text' name="monto_o" id="monto_o" class="monto"></label></td>
		</tr>
		<tr><td colspan=3><label>MOTIVO DE LA SULICITUD:</label></td></tr>
		<tr><td colspan=3>
<div id="format" align="center">    
	<input type="checkbox" id="check1"  /><label for="check1">SALUD</label>    
	<input type="checkbox" id="check2"  /><label for="check2">VIVIENDA</label>    
	<input type="checkbox" id="check3"  /><label for="check3">EDUCACION</label>
	<input type="checkbox" id="check4"  /><label for="check4">VARIOS</label>
	<input type="checkbox" id="check5"  /><label for="check5">MEDICINAS</label>
	<input type="checkbox" id="check6"  /><label for="check6">FUNEBRES</label>
	<input type="checkbox" id="check7"  /><label for="check7">MERCADO</label>
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
	<textarea COLS="55" ROWS="12" id="descripcion" name="descripcion"></textarea>
		</td>
		<td>
	<input type="checkbox" id="document1" value="COPIA DE LA C.I"/><label>COPIA DE LA C.I</label><BR>
	<input type="checkbox" id="document2" value="COPIA ULTIMO RECIBO DE PAGO"/><label>COPIA ULTIMO RECIBO DE PAGO</label><BR>      
	<input type="checkbox" id="document3" value="INFORME O CONSTANCIA MEDICA"/><label>INFORME O CONSTANCIA MEDICA</label><BR>  
	<input type="checkbox" id="document4" value="CARTA DE SOLICITUD"/><label>CARTA DE SOLICITUD</label><BR> 
	<input type="checkbox" id="document5" value="PRESUPUESTO DE MATERIAL U OTRO"/><label>PRESUPUESTO DE MATERIAL U OTRO</label><br>   
	<input type="checkbox" id="document6" value="SOLVENCIA"/><label>SOLVENCIA</label><br>   
	<input type="checkbox" id="otro"      VALUE="OTRO" /><label>OTRO: </label><br> <input type='text' name="otro" id="otro2" size="25" maxlength="25" readonly>  
	</td></tr>
		<tr><td COLSPAN="3">
			<input type='submit' value='guardar prestamo' class="btn btn-otro prestamo-nuevo">
			<span id="resultado"></span>
			<img  align="absmiddle" id="ajax_loader" src="img/ajax-loader6.gif" style=" display:none;"/>
			
		</td></tr>
</table></form> <?PHP }

			} catch (Exception $e) {
				print_r("<br><br><span class='fallida'>error al realizar la consulta".$db->ErrorMsg()."</span>");
				}
?>
</div><!--contenido-->
<?php
include('footer.php');

?>
