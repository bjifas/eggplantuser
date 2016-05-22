
<?php
$sqlserver = "sqlsrv:Server=192.168.1.11;Database=eggplantmusic";
$conexion = new PDO($sqlserver, "eggplantmusic", "eggplantmusic");
$conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$sql = "SELECT * FROM Usuario";


$result = $conex->prepare($sql);
$result->execute();
$resultados=$result->fetchAll();
//       return $resultados;

echo $resultados[0][0];

?>