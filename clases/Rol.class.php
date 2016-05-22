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
    
    //M�todos set
    
    public function setIDrol($idr)
    {
      $this->IDrol= $idr;
    }
    
    public function setNombre($nom)
    {
      $this->Nombre= $nom;
    }
    


    //M�todos get
    
    public function getIDrol()
    {
      return $this->IDrol;
    }
    
    public function getNombre()
    {
      return $this->Nombre;
    }
   
   
    
    //Otros M�todos
  

	public function consultaTodos($conex)
    {
      $pu= new ExistenciaRol;
      $datos= $pu->consultaTodos($this, $conex);
      return $datos;
    }
	
}

?>
