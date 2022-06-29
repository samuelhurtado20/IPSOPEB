<?php

		if (isset($_SESSION["autenticado"])!="SI")
			{
				echo "<table>
				<th> INICIAR SESION</th>";
		if (isset($_GET["error"]) && $_GET["error"]=="1"){ echo "<tr><td colspan=2 class=errorinicio>DATOS INCORRECTOS"; } 
		if (isset($_GET["error"]) && $_GET["error"]=="2"){ echo "<tr><td colspan=2 class=errorinicio>DEBE INICIAR SESION"; }
		if (isset($_GET["error"]) && $_GET["error"]=="4"){ echo "<tr><td colspan=2 class=errorinicio>USUARIO SUSPENDIDO"; }?>

			<form action="validar.php" method="post">
			<tr><td>Usuario:</tr><tr><td><input name="usuario" type="text"     size="15" maxlength="15" id="login" class="campo" autocomplete='off' /></tr>
			<tr><td>Clave:  </tr><td><input name="clave"  type="password" size="15" maxlength="15" id="pw"    class="campo" /></tr>
			<tr><td>Escribe los 6 caracteres:</tr><td><input name="tmptxt" type="text" id="tmptxt" /></tr>
			<tr><td><img aling=center src="captcha.php" width="100" height="30"></td></tr>
			
			<tr><td><input class='btndos btn-mio' value="ACCEDER AL SISTEMA" type="submit"> </tr>
			</form>
		</table>
						<?php
						} 
						elseif ($_SESSION["tipo"] =="1")  { 
							echo "<div id=usuario>SESION INICIADA POR:<BR> $_SESSION[usuario] <br>ACCESO: "; 
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
						<a class='btn btn-primary btn-mini' href                   ="adduser.php">AGREGAR USUARIO</a>
						<a class='btn btn-primary btn-mini' href                   ="adminusuarios.php">ADMINISTRAR USUARIOS</a>
						<a class='btn btn-primary btn-mini' href                   ="salir.php">CERRAR SESION</a>
						<?php
						} 
						elseif ($_SESSION["tipo"] =="2")  { 
							echo "<div id=usuario>SESION INICIADA POR:<BR> $_SESSION[usuario] <br>ACCESO: "; 
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
							echo "<div id=usuario>SESION INICIADA POR:<BR> $_SESSION[usuario] <br>ACCESO: "; 
									if     ($_SESSION['tipo']=='1') echo "ALTO";
									elseif ($_SESSION['tipo']=='2') echo "MEDIO";
									elseif ($_SESSION['tipo']=='3') echo "BAJO";
							echo "</div>";
						?>
						<a class='btn btn-primary btn-mini' href                   ="index.php">PAGINA PRINCIPAL</a>
						<a class='btn btn-primary btn-mini' href                   ="consulta.php">CONSULTAR AFILIADOS</a>
						<a class='btn btn-primary btn-mini' href                   ="salir.php">CERRAR SESION</a>
						<?php			}
						?>
