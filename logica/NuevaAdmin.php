<?php
session_start();
require_once('../clases/Admin.class.php');
require_once('../logica/funciones.php');
?>
<link rel="stylesheet" type ="text/css" href="../estilos/estilos.css" />
<?php

//Obtiene los datos ingresados
$tus=trim($_POST['tus']);
//$felo=CURDATE();
$nomu=trim($_POST['nomu']);
$mus=trim($_POST['mus']);
$pus=trim($_POST['pus']);



$conex = conectar();
//$u= new Persona ('',$login,md5($pass));
$u= new Admin ($tus,'',$nomu,$mus,$pus);

$ok=$u->altaAdmin($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo "Se creo un nuevo Administrador: $nomu";
			echo " </br><a href=\"\presentacion\cargaMenu.php\" style='color: black'>Volver</a>";
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
// desconectar($conex);
 
?>
