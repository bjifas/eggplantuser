<?php
session_start();
require_once('../clases/Cancion.class.php');
//require_once('../clases/Persona.class.php');
require_once('../logica/funciones.php');
?>
<link rel="stylesheet" type ="text/css" href="../estilos/estilos.css" />
<?php

//Obtiene los datos ingresados

$conex = conectar();

// $usr= new Persona ('','','','',$_SESSION["login"]);
// $IDPersona=$usr->consultaIDPersona($conex);

$idc =trim($_POST['idc']);
$nom=trim($_POST['nom']);
$dur=trim($_POST['dur']);
$ruta=trim($_POST['ruta']);
$idg=trim($_POST['idg']);



$conex = conectar();
$c= new Cancion ($idc,$nom,$dur,$ruta,'','',$idg);
$ok=$c->altaCancion($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo "Se inserto la cancion: $nom";
			echo " </br><a href=\"\presentacion\cargaMenu.php\" style='color: black'>Volver</a>";
        echo "</td>";
    echo "</tr>";
    echo "</table>";

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
