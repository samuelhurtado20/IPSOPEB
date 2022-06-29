<?php
session_start();
include_once ("conex.php");
if (!isset($_SESSION["autenticado"]) or !isset($_SESSION["tipo"]) or !isset($_SESSION["usuario"])) {header("Location: index.php?error=2"); }
if (($_SESSION["tipo"]!="1")) {header("Location: index.php?error=3"); }
include_once ('header.php');
?>

<div id="contenido">
	<table class='lista'>
					<thead><td>NOMBRE DEL USUARIO</td>
							<!--<td >PASSWORD</td>-->
				 			<td >NIVEL DE USUARIO</td>
							<td align="center">REINICIAR CLAVE</td>
							<td align="center">ESTADO</td>	
							<td align="center"><img width='18px' height='18px' align='absmiddle' src='img/delete.ico' alt='ELIMINAR' /></td>
					</thead>
<?php 
		try {
				global $db;
				$query2 ="select * FROM mysql.user where User != 'root'";
				$rs = $db->Execute("$query2");
				if ($rs->GetRows()){
				foreach ($rs as $row) { 
					?>

				  		<tr><td><?php echo $rs->fields['1']; ?></td>
				  			<!--<td ><td><?php echo $rs->fields['2']; ?></td>-->
				  			<td><?php 
									if (($rs->fields['6']=='Y') and ($rs->fields['13']=='Y'))
										echo "<span class='btn btn-success btn-mini nivel' id_user='".$rs->fields['id_usuario']."' name='2' title='Click para cambiar a MEDIO'>ALTO</span>";
									elseif (($rs->fields['6']=='Y') and ($rs->fields['13']=='N'))
										echo "<span class='btn btn-warning btn-mini nivel' id_user='".$rs->fields['id_usuario']."' name='3' title='Click para cambiar a BAJO'>MEDIO</span>";
									elseif (($rs->fields['6']=='N') and ($rs->fields['13']=='N'))
										echo "<span class='btn btn-danger btn-mini nivel' id_user='".$rs->fields['id_usuario']."' name='1' title='Click para cambiar a ALTO'>BAJO</span>";
								?></td>
							<td><?php 
									if ($rs->fields['clave']=='fcea920f7412b5da7be0cf42b8c93759')
										echo "<span class='btn-negro btn-mini' title='CLAVE ESTA REINICIADA'>REINICIADA</span>";
									else
										echo "<span class='btn btn-mio btn-mini reset' name='".$rs->fields['id_usuario']."' title='reiniciar clave del usuario'>REINICIAR</span>";

								?></td>

							<td align="center"><?php 
									if (($rs->fields['6']=='N') and ($rs->fields['13']=='N'))
										echo "<span class='btn btn-primary btn-mini change' id_user='".$rs->fields['id_usuario']."' name='0' title='CLICK PARA SUSPENDER'>ACTIVO</span>";
									elseif (($rs->fields['6']=='Y') and ($rs->fields['13']=='N'))
										echo "<span class='btn btn-danger btn-mini change'  id_user='".$rs->fields['id_usuario']."' name='1' title='CLICK PARA ACTIVAR'>SUSPENDIDO</span>";

								?></td>
							
							<td align="center"><img name="<?php echo $rs->fields['id_f']; ?>" class='borrar_f' width='18px' height='18px' align='center' alt='ELIMINAR' TITLE="ELIMINAR USUARIO" src='img/delete.ico' /></td>
						</tr>
			<?php	}
						}
				else echo "<tr><td colspan='4' class='fallida'>no hay usuarios registrados</td></tr>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>ERROR AL CONSULTAR USUARIOS</span>");
			}
?>
</table>
</div><!--contenido-->
<?php
include('footer.php');
?>