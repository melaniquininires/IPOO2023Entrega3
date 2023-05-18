<?php
class Pasajero{
    private $nombre;
    private $apellido;
    private $telefono;
    private $documento;
    private $nroAsiento;
    private $nroTicket;

public function __construct($nombre,$apellido,$telefono,$documento,$nroAsiento,$nroTicket){
    $this->nombre= $nombre;
    $this->apellido= $apellido;
    $this->telefono= $telefono;
    $this->documento= $documento;
    $this->nroAsiento= $nroAsiento;
    $this->nroTicket= $nroTicket;

}

    public function getNombre()
    {
        return $this->nombre;
    }

   
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    public function getApellido()
    {
        return $this->apellido;
    }


    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    
    public function gettelefono()
    {
        return $this->telefono;
    }

    
    public function settelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    
    public function getDocumento()
    {
        return $this->documento;
    }

    
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }


    public function getNroAsiento()
    {
        return $this->nroAsiento;
    }


    public function setNroAsiento($nroAsiento)
    {
        $this->nroAsiento = $nroAsiento;

        return $this;
    }

    
    public function getNroTicket()
    {
        return $this->nroTicket;
    }


    public function setNroTicket($nroTicket)
    {
        $this->nroTicket = $nroTicket;

        return $this;
    }


    public function __toString(){
        return "Nombre: ". $this->getNombre(). " Apellido: ". $this->getApellido() . " Telefono: ". $this->gettelefono(). " Nro de Documento: ". $this->getDocumento()." Nro Asiento: ".$this->getNroAsiento(). "Nro ticket: ".$this->getNroTicket(). "\n";
    }


    public function darPorcentajeIncremento(){
       $incremento = 1.10;
        return $incremento;
    }

}