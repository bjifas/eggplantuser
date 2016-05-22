<?php

class ExistenciaIncidente
{

    public function altaIncidente($param, $conex)
    {

        $fec = $param->getFecha();
        $hrs=$param->getHora();
        $idpr=$param->getIDpersonaReporta();
        $ide = $param->getIDequipo();
        $desc = $param->getDescripcion();
    //    $idpa = $param->getIDpersonaAsignado();

        $sql = "INSERT INTO incidente (Fecha,Hora,IDpersonaReporta,IDequipo,Descripcion) VALUES (:fecha, :hora, :idpersonareporta, :idequipo, :descripcion)";
      

		$result = $conex->prepare($sql);
		$result->execute(array(":fecha" => $fec, ":hora" => $hrs, ":idpersonareporta" => $idpr, ":idequipo" => $ide, ":descripcion" => $desc));
        
        
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
