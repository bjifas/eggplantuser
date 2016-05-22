<?php
session_start();
require_once('../clases/Usuario.class.php');
require_once('../logica/funciones.php');
?>
<link rel="stylesheet" type ="text/css" href="../estilos/estilos.css" />
<?php

//Obtiene los datos ingresados

//todo lo que venga por POST hay que limpiarlo con strip-tags  // sanitize

$mai=trim($_POST['NomUsuario']);
$pass=trim($_POST['PassUsuario']);
$_SESSION["mai"] = $mai;

$conex = conectar();
$u= new Usuario ('','','','','',$mai,$pass);

$ok=$u->coincideLoginPassword($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo " Bienvenid@ $mai";
        echo "</td>";
    echo "</tr>";
    echo "</table>";

     ?>

 
<script type="text/javascript"> window.open ('../presentacion/cargaMenu.php','_self',false) </script>
 

  <?php
}
else
{
   ?>
 <script language="javascript">
 
   window.alert("El Usuario o Password \n no es correcto.");
   window.location="../presentacion/indice.php";
 </script>
  <?php
  
}
desconectar($conex);
 
?>
