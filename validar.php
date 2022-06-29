<?php
ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 1);
session_start();
session_regenerate_id ();
include('adodb5/adodb.inc.php');
$db = &ADONewConnection('mysql'); 

$clave = $_POST['clave'];
$usuario= $_POST['usuario'];
if ($_SESSION['tmptxt'] == $_POST['tmptxt'])
{
	if ($db->Connect('127.0.0.1', $usuario , $clave))
		{
							
				    		$_SESSION["autenticado"] = "SI";
				     		$_SESSION["usuario"] = $usuario;
				     		$_SESSION["clave"] = $clave;
							$rs0 = $db->Execute("select * from mysql.user where User = '$usuario'");
							
					if (($rs0->fields['6']=='Y') and ($rs0->fields['13']=='Y')){ $_SESSION["tipo"] = '1'; }
				elseif (($rs0->fields['6']=='Y') and ($rs0->fields['13']=='N')){ $_SESSION["tipo"] = '2'; }
				elseif (($rs0->fields['6']=='N') and ($rs0->fields['13']=='N')){ $_SESSION["tipo"] = '3'; }
				     	    header ("Location: index.php");
		}
		else { 
    			header("Location: index.php?error=1");    
			}		
}

else { 
    	header("Location: index.php?error=5");    
	} 
?>