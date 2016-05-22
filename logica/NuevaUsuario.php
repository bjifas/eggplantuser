<?php
session_start();
require_once('../clases/Usuario.class.php');
require_once('../logica/funciones.php');
?>
<link rel="stylesheet" type ="text/css" href="../estilos/estilos.css" />
<?php

//Obtiene los datos ingresados
$idu=trim($_POST['idu']);
$nom=trim($_POST['nom']);
$ape=trim($_POST['ape']);
$fnac=trim($_POST['fnac']);
$tel=trim($_POST['tel']);
$mai=trim($_POST['mai']);
$pass=trim($_POST['pass']);
$tipo=trim($_POST['tipo']);
$sex=trim($_POST['sex']);


$conex = conectar();
//$u= new Persona ('',$login,md5($pass));
$u= new Usuario ($idu,$nom,$ape,$fnac,$tel,$mai,$pass,$tipo,$sex);

$ok=$u->altaUsuario($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo "Se creo un nuevo Administrador: $nom";
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
