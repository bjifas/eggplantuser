<?php
session_start();
require_once('../clases/Usuario.class.php');
require_once('../logica/funciones.php');
?>
<link rel="stylesheet" type ="text/css" href="../estilos/estilos.css" />
<?php

//Obtiene los datos ingresados
$nom=trim($_POST['nom']);
$ape=trim($_POST['ape']);
$ced=trim($_POST['ced']);
$log=trim($_POST['log']);
$pass=trim($_POST['pass']);
$mai=trim($_POST['mai']);
$idr=trim($_POST['idr']);

$conex = conectar();
//$u= new Persona ('',$login,md5($pass));
$u= new Persona ('',$nom,$ape,$ced,$log,$pass,$mai,$idr);

$ok=$u->altaPersona($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo "Se inserto usuario $log";
        echo "</td>";
    echo "</tr>";
    echo "</table>";

     ?>
<!--  <script language="javascript">
     location.href="../presentacion/cargaMenu.php";
 

 </script>  
-->
  <?php
}
else
{
   ?>
 <script language="javascript">
 
   window.alert("El Usuario o Password \n no es correcto.");
   location.href="../presentacion/indice.php";
 </script>
  <?php
  
}
desconectar($conex);
 
?>
