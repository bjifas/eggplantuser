<?php

class ExistenciaAdmin
{
        //param es un objeto de tipo Usuario
    //conex es una variable de tipo conexion
    public function altaAdmin($param, $conex)
    {
        //Obtiene los datos del objeto $param
//        $idp=$param->getIDpersona();

		$tus=$param->getTipo_Usr_Sist();
//      $felo=$param->getFech_Login_Usr_Sist();
		$felo=date("Y-m-d");
        $nomu=$param->getNombre_Usr_Sist();
        $mus=$param->getMail_Usr_Sist();
        $pus=$param->getPass_Usr_Sist();
	
		
		//Encripto la password uso un salt y un hash
		
		$salt = '34a@$#aA9823$';
		//$pass= hash('sha512', $salt . $pass);
        
        //Genera la sentencia a ejecutar
		//La sql ES UN EJEMPLO LE FALTA todos los campos, depende de sus atributos
        $sql = "INSERT INTO Usr_Sistema (Tipo_Usr_Sist, Fech_Login_Usr_Sist, Nombre_Usr_Sist, Mail_Usr_Sist, Pass_Usr_Sist) VALUES (:tipousr, :fecha, :nombre, :mail, :pass)";
      

		$result = $conex->prepare($sql);
		$result->execute(array(":tipousr" => $tus, ":fecha" => $felo, ":nombre" => $nomu, ":mail" => $mus, ":pass" => $pus));

        
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
   public function coincideLoginAdmin($param, $conex)
   {
        //Obtiene los datos del objeto $param
        $mail= trim($param->getMail_Usr_Sist());
        $pass= trim($param->getPass_Usr_Sist());

		//Vuelvo a encriptar la clave incluyendo el salt
		
		$salt = '34a@$#aA9823$';
//		$pass= hash('sha512', $salt . $pass);
		
        $sql = "SELECT * FROM Usr_Sistema WHERE Mail_Usr_Sist=:Mail_Usr_Sist AND Pass_Usr_Sist=:Pass_Usr_Sist";

        $result = $conex->prepare($sql);
		$result->execute(array(':Mail_Usr_Sist' => $mail, ':Pass_Usr_Sist' => $pass));
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
		$mai= trim($param->getMail());
        $sql = "SELECT * FROM Usuario WHERE Mail=:mail";
		
        $result = $conex->prepare($sql);
	    $result->execute(array(":mail" => $mai));
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
	
	public function consultaTipoAdmin($param, $conex)
	{
		$mai= trim($param->getMail_Usr_Sist());
		$sql = "SELECT Tipo_Usr_Sist FROM Usr_Sistema WHERE Mail_Usr_Sist=:mail";
		$result = $conex->prepare($sql);
		$result->execute(array(":mail" => $mai));
		return $result->fetchAll();
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
