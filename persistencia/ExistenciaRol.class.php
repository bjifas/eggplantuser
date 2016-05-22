<?php

//// crear un metodo consultar todo para obtener los roles a mostrar
//// nos sirve para hacer el combobox del menu del rol administrador para asignarle rol a usuario nuevo

class ExistenciaRol
{

	public function consultaTodos($param, $conex)
	{
		//$log = trim($param->getLogin());
        $sql = "SELECT * FROM rol";
		
        $result = $conex->prepare($sql);
	    $result->execute();
		$resultados=$result->fetchAll();
       return $resultados;
    }
	
}
?>
