<?php

require_once('../persistencia/ExistenciaRol.class.php');

class rol
{
    private $IDrol;
	private $Nombre;

    function __construct($idr='',$nom='')
    {
        $this->IDrol= $idr;
		$this->Nombre= $nom;
    }
    
    //Métodos set
    
    public function setIDrol($idr)
    {
      $this->IDrol= $idr;
    }
    
    public function setNombre($nom)
    {
      $this->Nombre= $nom;
    }
    


    //Métodos get
    
    public function getIDrol()
    {
      return $this->IDrol;
    }
    
    public function getNombre()
    {
      return $this->Nombre;
    }
   
   
    
    //Otros Métodos
  

	public function consultaTodos($conex)
    {
      $pu= new ExistenciaRol;
      $datos= $pu->consultaTodos($this, $conex);
      return $datos;
    }
	
}

?>
