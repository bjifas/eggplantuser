<?php

require_once('../persistencia/ExistenciaEquipo.class.php');

class Equipo
{
    private $IDequipo;
	private $Tipo;
    private $Marca;


    function __construct($ide='',$tipo='', $marca='')
    {
        $this->IDequipo= $ide;
		$this->Tipo= $tipo;
        $this->Marca= $marca;
    }
    
    //Métodos set
    
    public function setIDequipo($ide)
    {
      $this->IDequipo= $ide;
    }
    
    public function setTipo($tipo)
    {
      $this->Tipo= $tipo;
    }
    
    public function setMarca($marca)
    {
      $this->Marca= $marca;
    }
    
    //Métodos get
    
    public function getIDequipo()
    {
      return $this->IDequipo;
    }
    
    public function getTipo()
    {
      return $this->Tipo;
    }
    
    public function getMarca()
    {
      return $this->Marca;
    }
    
	
    //Otros Métodos
    
	public function consultaTodosEquipo($conex)
    {
      $pu= new ExistenciaEquipo;
      $datos= $pu->consultaTodosEquipo($this, $conex);
      return $datos;
    }
	
	
	/*
    public function altaIncidente($conex)
    {
        $pu=new ExistenciaIncidente;
        return ($pu->altaIncidente($this, $conex));
    }    
    
	
	public function consultaEstado($conex)
	{
      $pu= new ExistenciaEstado;
      return $pu->consultaEstado($this, $conex);
	  
    }

	*/
}
?>
