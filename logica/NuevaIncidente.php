<?php
session_start();
require_once('../clases/Incidente.class.php');
require_once('../clases/Persona.class.php');
require_once('../logica/funciones.php');
?>
<link rel="stylesheet" type ="text/css" href="../estilos/estilos.css" />
<?php

//Obtiene los datos ingresados

$conex = conectar();

$usr= new Persona ('','','','',$_SESSION["login"]);
$IDPersona=$usr->consultaIDPersona($conex);

$idpr = $IDPersona[0][0];
$fec=trim($_POST['fec']);
$hrs=trim($_POST['hrs']);
$ide=trim($_POST['ide']);
$desc=trim($_POST['desc']);



$conex = conectar();
$i= new Incidente ('',$fec,$hrs,$idpr,$ide,$desc);
$ok=$i->altaIncidente($conex);

if ($ok)

{
    echo "<table  align='center' >";
    echo "<tr height='400'>";
        echo "<td class='leyenda'>";
            echo "Se inserto el Incidente: $desc";
			echo " </br><a href=\"\ServiceIT\presentacion\cargaMenu.php\" style='color: black'>Volver</a>";
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
desconectar($conex);
 
?>
