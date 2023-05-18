<?php
include_once('Pasajero.php');
class PasajeroVIP extends Pasajero{
    private $nroViajeroFrecuente;
    private $cantMillas;


    public function __construct($nombre,$apellido,$telefono,$documento,$nroAsiento,$nroTicket,$nroViajeroFrecuente,$cantMillas){
        //invoco al constructor de Pasajero
        parent::__construct($nombre,$apellido,$telefono,$documento,$nroAsiento,$nroTicket);
        $this->nroViajeroFrecuente= $nroViajeroFrecuente;
        $this->cantMillas= $cantMillas;
        

    }

 
    public function getNroViajeroFrecuente()
    {
        return $this->nroViajeroFrecuente;
    }


    public function setNroViajeroFrecuente($nroViajeroFrecuente)
    {
        $this->nroViajeroFrecuente = $nroViajeroFrecuente;

        return $this;
    }

    public function getCantMillas()
    {
        return $this->cantMillas;
    }

    public function setCantMillas($cantMillas)
    {
        $this->cantMillas = $cantMillas;

        return $this;
    }

    public function __toString(){

        $cadena= parent::__toString();
        $cadena .= " Nro Viajero Frecuente: ".$this->getNroViajeroFrecuente(). " Cantidad de millas: ".$this->getCantMillas();
        return $cadena;        
    }


    public function darPorcentajeIncremento(){

        $incremento = 1.35;
        $millas = $this->getCantMillas();
        if($millas > 300){
            $millas = $millas*1.30;
            $this->setCantMillas($millas);
            echo $this->getCantMillas();
        }
        return $incremento;
       
    }

    
}