<?php 
class Viaje{
    private $codigo;
    private $destino;
    private $CantMaxP;
    private $importe;
    private $responsableV;
    private $pasajeros= [];
    

    public function __construct($codigo,$destino,$CantMaxP,$importe){ //no es necesario inicializar la coleccion de pasajeros 
        $this->codigo= $codigo; 
        $this->destino = $destino;
        $this->CantMaxP = $CantMaxP;
    }
    
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo) 
    {
        $this->codigo = $codigo;

        return $this;
    }


    public function getDestino()
    {
        return $this->destino;
    }

  
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }


    public function getCantMaxP()
    {
        return $this->CantMaxP;
    }


    public function setCantMaxP($CantMaxP)
    {
        $this->CantMaxP = $CantMaxP;

        return $this;
    }

    
    public function getImporte()
    {
        return $this->importe;
    }
 
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    public function getResponsableV()
    {
        return $this->responsableV;
    }
 
    public function setResponsableV($objResponsableV)
    {
        $this->responsableV = $objResponsableV;

        return $this;
    }
    //get no necesita parametros
    public function getPasajeros(){
        return $this->pasajeros;
    }

    public function setPasajeros($objPasajeros){
        $this->pasajeros = $objPasajeros;
    }

    public function verResponsable(){
        $stringResp= "";
        if($this->responsableV == null){
            $stringResp= "NO existe responsable de viaje cargado. \n";
        }else{
            $stringResp = "Nro empleado: ".$this->responsableV->getNroEmpleado().", Nro licencia: ".$this->responsableV->getNroLicencia().
            ", Nombre y apellido: ".$this->responsableV->getNombreResp(). " ".$this->responsableV->getApellidoResp()."\n";
        }

        return $stringResp;
    }

    public function __toString() {
        $str = "Informacion del viaje\n"."Codigo: ".$this->getCodigo(). " - destino: ".$this->getDestino(). " - Cant Max pasajeros: ".$this->getCantMaxP() ."\n Responsable del viaje => ".$this->verResponsable()." Lista de pasajeros:\n";

        foreach ($this->pasajeros as $pasajero) {
            $str .= "- " . $pasajero->getNombre() . " " . $pasajero->getApellido() ." DNI: ".$pasajero->getDocumento(). " (Telefono: " . $pasajero->getTelefono() .")\n";
        }
        return $str;
    }


    public function codigoNuevo($nuevo_Codigo)
    {
        $this->setCodigo($nuevo_Codigo);
        return "El codigo nuevo de {$this->getDestino()} es: {$this->getCodigo()}";
    }


    public function agregarPasajero($pasajero) {
        $agregaP= false;
        $coleccionPasaj= $this->getPasajeros();
        if(count($coleccionPasaj) < $this->getCantMaxP()) {
            $indice= $this->verificaExistencia($pasajero->getDocumento());
            if($indice == -1){
            $coleccionPasaj[]= $pasajero;
            $this->setPasajeros($coleccionPasaj);
            $agregaP= true;
        }
     } return $agregaP;
    }

    public function modificarDestino($destino) {
        $this->setDestino($destino);
        return "Destino modificado exitosamente.\n";
    }

    public function modificarMaxPasajeros($CantMaxP) {
        $this->setCantMaxP($CantMaxP);
        return "Cantidad máxima modificada exitosamente \n";
      }

    public function modificarPasajero($documento, $nuevoNombre, $nuevoApellido, $nuevoTelefono){
        $modificaP= false;
        $objetoPasajeros= $this->getPasajeros() ;
        $indice= $this->verificaExistencia($documento);
        // Recorremos la colección de pasajeros
        if($indice != -1 ){          // Si encontramos el pasajero con el documento buscado, actualizamos sus datos
            $objetoPasajeros[$indice]->setNombre($nuevoNombre);
            $objetoPasajeros[$indice]->setApellido($nuevoApellido);
            $objetoPasajeros[$indice]->setTelefono($nuevoTelefono);
            $modificaP= true;
        } 
         return $modificaP; 
      }

    //verifica si existe en array de pasajeros 
      public function verificaExistencia($documento){
        $indice= -1;
        $arrayPasajeros= $this->getPasajeros();
        $cantidadPasajeros= count($arrayPasajeros);
        $contador= 0;
        while($contador < $cantidadPasajeros && $indice == -1){
            if($arrayPasajeros[$contador]->getDocumento() == $documento){
                $indice= $contador;
                
            }$contador++;
         } 
        return $indice;
    
    }
      public function eliminarPasajero($documento){
        $eliminaP= false;
        $array= $this->getPasajeros();
        $indice= $this->verificaExistencia($documento);
              if ($indice != -1){
                unset($array[$indice]);
                
                  $this->setPasajeros($array);
                  $eliminaP= true;
              }
          return $eliminaP; 
      }

      public function agregarResponsableV($objResponsableV){
        /*La primera parte de la expresión verifica si la propiedad $responsableV de la clase Viaje
         ya está asignada a un objeto, es decir, si no es null.
        Si esto se cumple, se evalúa la segunda parte de la expresión, 
        */  
        $responsable= $this->getResponsableV();     
        if($responsable && ($responsable->getNroEmpleado() == $objResponsableV->getNroEmpleado())) {
            $rta= false;
        } else {
          $this->setResponsableV($objResponsableV);
          $rta= true;
        }
  
          return $rta;
}


public function hayPasajesDisponibles(){
    $hayLugar= null;
    $cantMaxPasajeros = $this->getCantMaxP();
    $pasajerosCargados = count($this->getPasajeros());
    if ($pasajerosCargados<$cantMaxPasajeros){
        $hayLugar=true;
    }else{
        $hayLugar=false;
    }
    return $hayLugar;
}

public function  venderPasaje($objPasajero){
    $importe = null;
    $hayLugar= $this->hayPasajesDisponibles();
    if($hayLugar){
        $importe= $this->getImporte();
        $incremento = $objPasajero->darPorcentajeIncremento();
        $importe = $importe * $incremento;
    }
    return $importe;
}


}


