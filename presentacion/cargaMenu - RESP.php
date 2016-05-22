<?php
///dudas: el objeto $u se pasa de una pagina a la otra?
	////NO, los objetos de borran de memoria cuando se sale del php, no se pasan de .php, se crean cada vez que se necesiten, es mas, hay una función destruct que debería de destruir dicho objeto.
	
///como traemos todos los valores del objeto si lo creamos con login (como nutris el objeto con lo que traes desde la base)
		//persistencia de usuario, en una funcipon que tenga un select con los datos del usuario, llamo la función y lo almaceno, pero todavía no es necesario

///necesitamos limpiar variable de sesion cuando volvemos al inicio?
	///la cerramos con un botón que llama a logout.php y ese llama a indice.php

	////Para que tenemos ExitenciaUsuario en la carpeta clases????? le cambie el nombnre

session_start();
require_once('../clases/Usuario.class.php');
require_once('../clases/Cancion.class.php');
require_once('../clases/Admin.class.php');
require_once('../clases/Genero.class.php');
require_once('../logica/funciones.php');
?>
<link rel="stylesheet" type ="text/css" href="../estilos/estilos.css" />
<?php

//Obtiene los datos ingresados
$conex = conectar();
$u= new Admin ('','','',$_SESSION["mai"]);

$Tipo=$u->consultaTipoAdmin($conex);
$rol = $Tipo[0][0];


if ($rol == "SuperAdmin" ){
?>
			<h1><u>Menu de Super Administradores</u></h1>
			<br>
			<h2>Alta de Adminstradores</h2>
		<br>
		<form action='../logica/NuevaAdmin.php' method="POST">
			Ingrese su Nombre: <input type='text' value='' name='nomu'></input><br>
			Ingrese su Mail: <input type='email' value='' name='mus'></input><br>
			Ingrese su Password: <input type='password' value='' name='pus'></input><br>
			Ingrese su Tipo: <select name='tus'>
								<option value="SuperAdmin"> Super Admin</option>
								<option value="PlaylAdmin"> Admin de Playlists</option>
								<option value="TicketAdmin"> Admin de Tickets</option>
								<option value="MusicAdmin"> Admin de Música</option>
								</select><br>
<!--			Ingrese su Sexo: <select name='sex'>
								<option value="M"> Masculino</option>
								<option value="F"> Femenino</option>
								</select><br>
-->
			
			<br><input type='submit' value='Alta de Admin'>
		</form>
		<br><br><a href="logout.php" style='color: black;' >Cerrar Sesión<a/>
		
<?php


//el combo box hay que modificarlo para que levante los datos desde la base de datos, hay que crear una clase rol y la persistencia de rol
//El punto dos del rol de Administrador lo resolvemos con el combo box asignandole a un usuario un rol

//	$todos=$u->consultaTodos($conex);
//
//	for ($i=0; $i < count($todos); $i++){
//
//		echo $todos[$i]["Apellido"]." ".$todos[$i]["Nombre"]." ".$todos[$i]["Login"]." ".$todos[$i]["IDrol"]."<br>";
//		}

	}
	elseif ($rol == "MusicAdmin"){
		?>
			<h1><u>Menu de Administradores de Música</u></h1><br>
			<h2>Alta de Música</h2><br>
			<h4>Complete los datos sobre la canción:</h4>
			<form action='../logica/NuevaCancion.php' method="POST">
			Ingrese ID de Canción: <input type='int' value='' name='idc'></input><br>
			Ingrese el Nombre: <input type='text' value='' name='nom'></input><br>
			Ingrese la Duración: <input type='time' value='' name='dur'></input><br>
			Ingrese la Ruta del Archivo: <input type='text' value='' name='ruta'></input><br>
			
			<?php
            $g = new Genero();
            $datos_g=$g->consultaTodosGenero($conex);
            $Cuenta=count($datos_g);
		?>
            <tr>
            	<td class="literal">Seleccione Género:</td>
               	<td >
                	<select name="idg" class="cuadroentrada" id="idg">
						<option value="00">Géneros</option>
						<?php
							for ($i=0;$i<$Cuenta;$i++)
								{
							?>
								<option value="<?php echo $datos_g[$i][0]?>"  ><?php echo $datos_g[$i][1]?> // <?php echo $datos_g[$i][2]?></option>
							<?php
								}
						?>
					</select>
               </td>
               </tr>
				<br>
		
			<br><input type='submit'>
			</form>
		
		
			<br><br><a href="logout.php" style='color: black;' >Cerrar Sesión<a/>
			<?php
		}
	elseif ($rol == 3){
			echo "Sos coordinador";
			?>
			<br><br><a href="logout.php" style='color: black;' >Cerrar Sesión<a/>
			<?php
		}
		
		else{
			echo "El usuario no tiene permisos sobre esta herramienta<br>";
			echo 'Haga click <a href="../presentacion/indice.php">aqui</a> para volver al login.';
			?>
			<br><br><a href="logout.php" style='color: black;' >Cerrar Sesión<a/>
			<?php
			}

			
// desconectar($conex);
 
?>