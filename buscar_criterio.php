<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <!--08023F CED5D7 #000033-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="estilo-ipsopeb.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery8.js"></script>
	<script type="text/javascript" src="js/jpaginate-2.js"></script>
<title>I.P.SO.P.E.B</title>
<style>

.pagination {list-style:none; margin:10px 0px 0px 0px; padding:0px; clear:both;}
.pagination li{float:left; margin:4px;}
.pagination li a{   display:block; padding:4px 4px; color:#fff; background-color:#44b0dd; text-decoration:none;}
.pagination li a.active {border:1px solid #000; color:#000; background-color:#fff;}
.pagination li a.inactive {background-color:#eee; color:#777; border:1px solid #ccc;}
  
</style>
<script>
$(document).ready(function(){
    $("#content").jPaginate();                       
});
</script>

</head>


<body>
<?php
include_once ("conex.php"); 


		try {
				global $db;
				if (isset($criterio))    {
					$query ="select * from afiliados where nombre like '%$criterio%' or apellido like '%$criterio%' order by cedula";
				}

				elseif (isset($criterio2)) {
					$query ="select * from afiliados where cedula like '%$criterio2%' order by cedula";
				}
				elseif (isset($_POST)) {
					$query ="select * from afiliados order by cedula";
				}
				$rs = $db->Execute("$query");


				if ($rs->GetRows()){

				echo "<table width='100%' class='lista'>
				<thead>
				<tr>
					<td width='10%'>CEDULA</td>
					<td width='33%'>NOMBRE</td>
					<td width='33%'>APELLIDO</td>
					<td width='20%'>TELEFONO</td>
					<td  width='4%'><img class='btn-image' src='img/eye.png'></td>
				</tr>
				</thead></table>
				<div id='content'>";
				foreach ($rs as $row) {	
					echo "<table width='100%' class='lista'>
					<tr><td width='10%'>".$row["nacionalidad"].$row["cedula"]."</td>
						<td width='33%'>".$row["nombre"]."</td>
						<td width='33%'>".$row["apellido"]."</td>
						<td width='20%'>".$row["telefono"]."</td>
						<td align='center' width='4%'>
								<form action='ficha.php' method='post'>
										<input type='hidden' name='cedula' value='".$row["cedula"]."'>
										<input type='image' class='btn-image' src='img/eye.png'>
								</form>
						</td>

					</tr></table>";
				} echo "</div>";
			}
			else echo "<span class='fallida'>NO HAY RESULTADOS PARA EL CRITERIO INTRODUCIDO".$db->ErrorMsg()."</span>";
			} catch (Exception $e) {
				print_r("<span class='fallida'>ERROR AL PROCESAR LA busqueda".$db->ErrorMsg()."</span>");
			}

?>
</body>
</html>