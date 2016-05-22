<?php


function conectar()
{
    try {
		$sqlserver = "sqlsrv:Server=192.168.1.11;Database=eggplantmusic";
	//	$Info = array( "Database"=>"eggplantmusic", "UID"=>"eggplantmusic", "PWD"=>"eggplantmusic");
	//	$conexion = sqlsrv_connect( $sqlserver, $Info) or die (print_r( sqlsvr_errors(),true));
		$conexion = new PDO($sqlserver, "eggplantmusic", "eggplantmusic");
		$conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
        //$conexion = new PDO('mysql:dbname=serviceit;host=192.168.1.43','usuarioconexion','aPT6KpTpjNv2eWzM');
        //$conexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        return($conexion);
    } catch (PDOException $e) {
		
       print "<p>Error: No puede conectarse con la base de datos.</p>\n";

      exit();
    }
}

function desconectar($conexion)
{
   sqlsrv_close($conexion);
}

?>
