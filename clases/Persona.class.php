<?php

require_once('../persistencia/ExistenciaUsuario.class.php');

class persona
{
    private $IDpersona;
	private $Nombre;
    private $Apellido;
    private $Cedula;
	private $Login;
    private $Password;
    private $Mail;
    private $IDrol; //tipos de funcionarios
    private $TipoLogin; //administrador, tecnico, invitado
	private $TipoPersona; //usuario, funcionario
    
    function __construct($idp='',$nom='', $ape='', $ced='', $log='', $pass='', $mai='',$idr='',$tlo='',$tpe='')
    {
        $this->IDpersona= $idp;
		$this->Nombre= $nom;
        $this->Apellido= $ape;
        $this->Cedula= $ced;
        $this->Login= $log;
        $this->Password= $pass;
        $this->Mail= $mai;
        $this->IDrol= $idr;
        $this->TipoLogin= $tlo;
        $this->TipoPersona= $tpe;
    }
    
    //Métodos set
    
    public function setIDpersona($idp)
    {
      $this->IDpersona= $idp;
    }
    
    public function setNombre($nom)
    {
      $this->Nombre= $nom;
    }
    
    public function setApellido($ape)
    {
      $this->Apellido= $ape;
    }
    
	public function setCedula($ced)
    {
      $this->Cedula= $ced;
    }
    
     public function setLogin($log)
    {
      $this->Login= $log;
    }

    public function setPassword($pass)
    {
      $this->Password= $pass;
    }
    
    public function setMail($mai)
    {
      $this->Mail= $mai;
    }

    public function setIDrol($idr)
    {
      $this->IDrol= $idr;
    }
    
 	public function setTipoLogin($tlo)
    {
      $this->TipoLogin= $tlo;
    }
    
	public function setTipoPersona($tpe)
    {
      $this->TipoPersona= $tpe;
    }
    // la profesora habia puesto una funcion del tipo set que era "habilitado"
    
    //Métodos get
    
    public function getIDpersona()
    {
      return $this->IDpersona;
    }
    
    public function getNombre()
    {
      return $this->Nombre;
    }
    
    public function getApellido()
    {
      return $this->Apellido;
    }
    
	public function getCedula()
    {
      return $this->Cedula;
    }
    
    public function getLogin()
    {
      return $this->Login;
    }

    public function getPassword()
    {
      return $this->Password;
    }
    
    public function getMail()
    {
      return $this->Mail;
    }

    public function getIDrol()
    {
      return $this->IDrol;
    }
    
 	public function getTipoLogin()
    {
      return $this->TipoLogin;
    }
    
	public function getTipoPersona()
    {
      return $this->TipoPersona;
    }
    
    //Otros Métodos
    
    //Devuelve true si el Login y el Password coinciden
    
    public function coincideLoginPassword($conex)
    {

        $pu= new ExistenciaUsuario;
		return $pu->coincideLoginPassword($this, $conex);
        
    }
	    //Otros Métodos
    public function altaPersona($conex)
    {
        $pu=new ExistenciaUsuario;
        return ($pu->altaPersona($this, $conex));
    }    
    
     
	public function consultaUno($conex)
    {
      $pu= new ExistenciaUsuario;
      $datos= $pu->consultaUno($this, $conex);
      return $datos;
    }
	
	public function consultaTodos($conex)
    {
      $pu= new ExistenciaUsuario;
      $datos= $pu->consultaTodos($this, $conex);
      return $datos;
    }
	
	public function consultaIDrol($conex)
	{
      $pu= new ExistenciaUsuario;
      return $pu->consultaIDrol($this, $conex);
    }
}

?>
