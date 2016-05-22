<?php

class ExistenciaUsuario
{
        //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
    public function altaPersona($param, $conex)
    {
        //Obtiene los datos del objeto $param
//        $idp=$param->getIDpersona();
        $nom= $param->getNombre();
        $ape = $param->getApellido();
        $ced=$param->getCedula();
        $log=$param->getLogin();
        $pass = $param->getPassword();
        $mai = $param->getMail();
        $idr = $param->getIDrol();
//        $tlo = $param->getTipoLogin();
//        $tpe = $param->getTipoPersona();	
		
		//Encripto la password uso un salt y un hash
		
		$salt = '34a@$#aA9823$';
		//$pass= hash('sha512', $salt . $pass);
        
        //Genera la sentencia a ejecutar
		//La sql ES UN EJEMPLO LE FALTA todos los campos, depende de sus atributos
        $sql = "INSERT INTO persona (Login,Password,Nombre,Apellido,Cedula,Mail,IDrol) VALUES (:login, :password, :nombre, :apellido, :cedula, :mail, :idrol)";
      

		$result = $conex->prepare($sql);
		$result->execute(array(":login" => $log, ":password" => $pass, ":nombre" => $nom, ":apellido" => $ape, ":cedula" => $ced, ":mail" => $mai, ":idrol" => $idr));
        
        
        //Para saber si ocurrió un error
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
        }
    }

     

   //Devuelve true si el login coincide con la password
   public function coincideLoginPassword($param, $conex)
   {
        //Obtiene los datos del objeto $param
        $log= trim($param->getLogin());
        $pass= trim($param->getPassword());
		//Vuelvo a encriptar la clave incluyendo el salt
		
		$salt = '34a@$#aA9823$';
//		$pass= hash('sha512', $salt . $pass);
		
        $sql = "SELECT * FROM persona WHERE Login=:login AND Password=:password";
		
        $result = $conex->prepare($sql);
		$result->execute(array(":login" => $log, ":password" => $pass));
        //Obtiene el registro de la tabla Usuario 

        if($result->rowCount()==0)
        {
       		
			return false;
        }
        else
        {
        	
          	return true;
        }
    }


    
	public function consultaUno($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
        $sql = "SELECT * FROM persona WHERE Login=:login";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":login" => $log));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }

	public function consultaTodos($param, $conex)
   {
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
        $sql = "SELECT Nombre, Apellido, Login, IDrol FROM persona";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":login" => $log));
		$resultados=$result->fetchAll();
       

       return $resultados;
    }
	

		public function consultaIDPersona($param, $conex)
	{ 
		$login= trim($param->getLogin());
		$sql = "SELECT IDpersona FROM persona WHERE Login=:login";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":login" => $login));
		$resultados= $result->fetchAll();
		return $resultados;
	}	
	
	
	
	
	
	public function consultaIDrol($param, $conex)
	{
//        $idp= trim($param->getIDpersona());   
		$log= trim($param->getLogin());
		$sql = "SELECT IDrol FROM persona WHERE Login=:login";
		
		$result = $conex->prepare($sql);
		$result->execute(array(":login" => $log));
		return $result->fetchAll();
	}
}
?>
