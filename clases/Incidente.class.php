<?php

require_once('../persistencia/ExistenciaIncidente.class.php');

class Incidente
{
    private $IDincidente;
	private $Fecha;
    private $Hora;
    private $IDpersonaReporta;
	private $IDequipo;
    private $Descripcion;
    private $IDpersonaAsignado;

    function __construct($idi='',$fec='', $hrs='', $idpr='', $ide='', $desc='', $idpa='')
    {
        $this->IDincidente= $idi;
		$this->Fecha= $fec;
        $this->Hora= $hrs;
        $this->IDpersonaReporta= $idpr;
        $this->IDequipo= $ide;
        $this->Descripcion= $desc;
        $this->IDpersonaAsignado= $idpa;
    }
    
    //Métodos set
    
    public function setIDincidente($idi)
    {
      $this->IDincidente= $idi;
    }
    
    public function setFecha($fec)
    {
      $this->Fecha= $fec;
    }
    
    public function setHora($hrs)
    {
      $this->Hora= $hrs;
    }
    
	public function setIDpersonaReporta($idpr)
    {
      $this->IDpersonaReporta= $idpr;
    }
    
     public function setIDequipo($ide)
    {
      $this->IDequipo= $ide;
    }

    public function setDescripcion($desc)
    {
      $this->Descripcion= $desc;
    }
    
    public function setIDpersonaAsignado($idpa)
    {
      $this->IDpersonaAsignado= $idpa;
    }

    //Métodos get
    
    public function getIDincidente()
    {
      return $this->IDincidente;
    }
    
    public function getFecha()
    {
      return $this->Fecha;
    }
    
    public function getHora()
    {
      return $this->Hora;
    }
    
	public function getIDpersonaReporta()
    {
      return $this->IDpersonaReporta;
    }
    
    public function getIDequipo()
    {
      return $this->IDequipo;
    }

    public function getDescripcion()
    {
      return $this->Descripcion;
    }
    
    public function getIDpersonaAsignado()
    {
      return $this->IDpersonaAsignado;
    }

    //Otros Métodos
    
	
    public function altaIncidente($conex)
    {
        $pu=new ExistenciaIncidente;
        return ($pu->altaIncidente($this, $conex));
    }    
    
	public function consultaTodos($conex)
    {
      $pu= new ExistenciaIncidente;
      $datos= $pu->consultaIncidente($this, $conex);
      return $datos;
    }
	
	public function consultaEstado($conex)
	{
      $pu= new ExistenciaEstado;
      return $pu->consultaEstado($this, $conex);
	  
    }
}
?>
