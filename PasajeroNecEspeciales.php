<?php
include_once('Pasajero.php');
class PasajeroNecEspeciales extends Pasajero{
    private $sillaDeRuedas;
    private $asistenciaParaEoD;
    private $comidaEspecial;


    public function __construct($nombre,$apellido,$telefono,$documento,$nroAsiento,$nroTicket,$sillaDeRuedas, $asistenciaParaEoD,$comidaEspecial){
        parent::__construct($nombre,$apellido,$telefono,$documento,$nroAsiento,$nroTicket);
        $this->sillaDeRuedas= $sillaDeRuedas;
        $this->asistenciaParaEoD= $asistenciaParaEoD;
        $this->comidaEspecial= $comidaEspecial;
        
    }
    
    public function getSillaDeRuedas()
    {
        return $this->sillaDeRuedas;
    }


    public function setSillaDeRuedas($sillaDeRuedas)
    {
        $this->sillaDeRuedas = $sillaDeRuedas;

        return $this;
    }


    public function getAsistenciaParaEoD()
    {
        return $this->asistenciaParaEoD;
    }


    public function setAsistenciaParaEoD($asistenciaParaEoD)
    {
        $this->asistenciaParaEoD = $asistenciaParaEoD;

        return $this;
    }


    public function getComidaEspecial()
    {
        return $this->comidaEspecial;
    }


    public function setComidaEspecial($comidaEspecial)
    {
        $this->comidaEspecial = $comidaEspecial;

        return $this;
    }
/*
    public function verPasajeroEspecial(){
    
    }*/

    public function __toString(){
        $cadena= parent::__toString();
        $cadena.= "Utiliza silla de ruedas: ".$this->getSillaDeRuedas(). " - Necesita asistencia: ".$this->getAsistenciaParaEoD(). "Necesita comida especial: ". $this->getComidaEspecial(). "\n";
        return $cadena;
    }

    public function darPorcentajeIncremento(){

        $silla = $this->getSillaDeRuedas();
        $asistencia = $this->getAsistenciaParaEoD();
        $comida = $this->getComidaEspecial();
        if ($silla && $asistencia && $comida) {
            $incrememto = 1.30;
        }elseif($silla||$asistencia||$comida){
            $incrememto = 1.15;
        }
        return $incrememto;
    }
       
    
}