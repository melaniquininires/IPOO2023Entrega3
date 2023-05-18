<?php

class ResponsableV{
    private $nroEmpleado;
    private $nroLicencia;
    private $nombreResp;
    private $apellidoResp;

    public function __construct($nroEmpleado,$nroLicencia,$nombreResp,$apellidoResp){
        $this->nroEmpleado= $nroEmpleado;
        $this->nroLicencia= $nroLicencia;
        $this->$nombreResp= $nombreResp;
        $this->apellidoResp= $apellidoResp;        
    }

    
    public function getNroEmpleado()
    {
        return $this->nroEmpleado;
    }


    public function setNroEmpleado($nroEmpleado)
    {
        $this->nroEmpleado = $nroEmpleado;

        return $this;
    }

 
    public function getNroLicencia()
    {
        return $this->nroLicencia;
    }

 
    public function setNroLicencia($nroLicencia)
    {
        $this->nroLicencia = $nroLicencia;

        return $this;
    }

    public function getNombreResp()
    {
        return $this->nombreResp;
    }

    public function setNombreResp($nombreResp)
    {
        $this->nombreResp = $nombreResp;

        return $this;
    }

    public function getApellidoResp()
    {
        return $this->apellidoResp;
    }

    public function setApellidoResp($apellidoResp)
    {
        $this->apellidoResp = $apellidoResp;

        return $this;
    }

    public function __toString()
    {
        return "Nro Empleado Responsable del viaje".$this->getNroEmpleado()."- Nro Licencia: ".$this->getNroLicencia()."- Nombre y Apellido: ".$this->getnombreResp()." ".$this->getApellidoResp()."\n";
    }



}