<?php

class ExistenciaEquipo
{
	/*
	
    public function altaIncidente($param, $conex)
    {

        $fec = $param->getFecha();
        $hrs=$param->getHora();
        $idpr=$param->getIDpersonaReporta();
        $ide = $param->getIDequipo();
        $desc = $param->getDescripcion();
        $idpa = $param->getIDpersonaAsignado();

        $sql = "INSERT INTO incidente (Fecha,Hora,IDpersonaReporta,IDequipo,Descripcion,IDpersonaAsignado) VALUES (:fecha, :hora, :idpersonareporta, :idequipo, :descripcion, :idpersonaasignado)";
      

		$result = $conex->prepare($sql);
		$result->execute(array(":fecha" => $fec, ":hora" => $hrs, ":idpersonareporta" => $idpr, ":idequipo" => $ide, ":descripcion" => $desc, ":idpersonaasignado" => $idpa));
        
        
        if($result)
        {
          return(true);
        }
        else
        {
          return(false);
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

	*/
	
		public function consultaTodosEquipo($param, $conex)
	{

        $sql = "SELECT * FROM equipo";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }
	

}
?>
