<?php
session_start();
include_once ("conex.php");

		if (!isset($_SESSION["autenticado"]) or !isset($_SESSION["tipo"]) or !isset($_SESSION["usuario"])) {
				echo "<table class='sesion'>
				<th> INICIAR SESION</th>";
		if (isset($_GET["error"]) && $_GET["error"]=="1"){ echo "<tr><td colspan=2 class='fallida'>datos incorrectos"; } 
		if (isset($_GET["error"]) && $_GET["error"]=="2"){ echo "<tr><td colspan=2 class='fallida'>debe iniciar sesion"; }
		if (isset($_GET["error"]) && $_GET["error"]=="4"){ echo "<tr><td colspan=2 class='fallida'>usuario suspendido"; }
		if (isset($_GET["error"]) && $_GET["error"]=="5"){ echo "<tr><td colspan=2 class='fallida'>captcha no coincide"; }?>
		
			<form action="validar.php" method="post" id="sesion">
			<tr><td><label>Usuario:</label></tr><tr><td><input name="usuario" type="text"     size="15" maxlength="15" id="login" class="campo" autocomplete='off' /></tr>
			<tr><td><label>Clave:</label></tr><td><input name="clave"  type="password" size="15" maxlength="15" id="pw"    class="campo" /></tr>
			<tr><td><label>Escribe los 6 caracteres:</label></tr>
			<td><input name="tmptxt" type="text" id="tmptxt" autocomplete="off" value=<?php echo $_SESSION["tmptxt"]; ?> /></tr>
			<tr><td align='center'><img  src="captcha.php" width="100" height="30"></td></tr>
			
			<tr><td align='center'><input class='btn btn-primary btn-mini sesion' value="ACCEDER AL SISTEMA" type="submit"> </tr>
			</form>
		</table>
						<?php
						} 
						elseif ($_SESSION["tipo"] =="1")  { 
							echo "<div id='usuario'>USUARIO ACTUAL<BR>". $_SESSION["usuario"]. "<br>ACCESO: "; 
									if     ($_SESSION['tipo']=='1') echo "TOTAL";
									elseif ($_SESSION['tipo']=='2') echo "MEDIO";
									elseif ($_SESSION['tipo']=='3') echo "BAJO";
							echo "</div>";
						?>
						<a class='btn btn-primary btn-mini' href                   ="index.php">PAGINA PRINCIPAL</a>
						<a class='btn btn-primary btn-mini' href                   ="afiliacion.php">REGISTRAR AFILIADO</a>
						<a class='btn btn-primary btn-mini' href                   ="consulta.php">CONSULTAR AFILIADOS</a>
						<a class='btn btn-primary btn-mini' href                   ="prestamo.php">AGREGAR PRESTAMO</a>
						<a class='btn btn-primary btn-mini' href                   ="ayuda.php">AGREGAR AYUDA</a>
						<a class='btn btn-primary btn-mini' href                   ="adduser.php">AGREGAR USUARIO</a>
						<a class='btn btn-primary btn-mini' href                   ="adminuser.php">ADMINISTRAR USUARIOS</a>
						<a class='btn btn-primary btn-mini' href                   ="respaldo.php">RESPALDAR || RESTAURAR</a>
						<a class='btn btn-primary btn-mini' href                   ="salir.php">CERRAR SESION</a>
						<?php
						} 
						elseif ($_SESSION["tipo"] =="2")  { 
							echo "<div id='usuario'>USUARIO ACTUAL<BR>". $_SESSION["usuario"]. "<br>ACCESO: "; 
									if     ($_SESSION['tipo']=='1') echo "ALTO";
									elseif ($_SESSION['tipo']=='2') echo "MEDIO";
									elseif ($_SESSION['tipo']=='3') echo "BAJO";
							echo "</div>";
						?>
						<a class='btn btn-primary btn-mini' href                   ="index.php">PAGINA PRINCIPAL</a>
						<a class='btn btn-primary btn-mini' href                   ="afiliacion.php">REGISTRAR AFILIADO</a>
						<a class='btn btn-primary btn-mini' href                   ="consulta.php">CONSULTAR AFILIADOS</a>
						<a class='btn btn-primary btn-mini' href                   ="prestamo.php">AGREGAR PRESTAMO</a>
						<a class='btn btn-primary btn-mini' href                   ="ayuda.php">AGREGAR AYUDA</a>
						<a class='btn btn-primary btn-mini' href                   ="salir.php">CERRAR SESION</a>
						<?php
						} 
						elseif ($_SESSION["tipo"] =="3")  { 
							echo "<div id='usuario'>USUARIO ACTUAL<BR>". $_SESSION["usuario"]. "<br>ACCESO: "; 
									if     ($_SESSION['tipo']=='1') echo "ALTO";
									elseif ($_SESSION['tipo']=='2') echo "MEDIO";
									elseif ($_SESSION['tipo']=='3') echo "BAJO";
							echo "</div>";
						?>
						<a class='btn btn-primary btn-mini' href                   ="index.php">PAGINA PRINCIPAL</a>
						<a class='btn btn-primary btn-mini' href                   ="consulta.php">CONSULTAR AFILIADOS</a>
						<a class='btn btn-primary btn-mini' href                   ="salir.php">CERRAR SESION</a>
						<?php
						}
						?>
