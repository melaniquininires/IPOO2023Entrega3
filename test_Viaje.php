<?php
include_once 'Viaje.php';
include_once 'Pasajero.php';
include_once 'ResponsableV.php';

$opcion = 0;
while($opcion != 10) {
  echo "-------- Menú --------\n";
  echo "1) Cargar información del viaje\n";
  echo "2) Modificar codigo del viaje\n";
  echo "3) Modificar destino del viaje\n";
  echo "4) Modificar cantidad maxima de pasajeros\n";
  echo "5) Agregar pasajero al viaje\n";
  echo "6) Modificar informacion de pasajero\n";
  echo "7) Eliminar un pasajero\n";
  echo "8) Agregar responsable del viaje \n";
  echo "9) Ver información del viaje\n";
  echo "10) Salir\n";
  echo "Ingrese una opción: ";
  $opcion = trim(fgets(STDIN));

  switch($opcion) {
    case 1:
      echo "Ingrese el código del viaje: ";
      $codigo = trim(fgets(STDIN));
      echo "Ingrese el destino del viaje: ";
      $destino = trim(fgets(STDIN));
      echo "Ingrese la cantidad máxima de pasajeros del viaje: ";
      $cant_max_pasajeros = trim(fgets(STDIN));
      echo "\n";
      $viaje= new Viaje($codigo, $destino, $cant_max_pasajeros);
      $viaje->setCodigo($codigo);
      $viaje->setDestino($destino);
      $viaje->setCantMaxP($cant_max_pasajeros);
      echo "¡Información del viaje cargada correctamente!\n";
      break;
    case 2:
        echo "Ingrese el nuevo codigo de viaje para su destino {$viaje->getDestino()}: ";
        $codigoNuevo = trim(fgets(STDIN));
        echo $viaje->codigoNuevo($codigoNuevo) . "\n";
        break;
    case 3:
        echo "Ingrese un nuevo destino del viaje: ";
        $destino= trim(fgets(STDIN));
        echo $viaje->modificarDestino($destino);
        break;
    case 4:
        echo "Ingrese nueva cantidad maxima de pasajeros: ";
        $maxPasajeros= trim(fgets(STDIN));
        echo $viaje->modificarMaxPasajeros($maxPasajeros);
        break;
    case 5:
        echo "Ingrese el nombre del pasajero: ";
        $nombre=trim(fgets(STDIN));
        echo "Ingrese el apellido del pasajero: ";
        $apellido= trim(fgets(STDIN));
        echo "Ingrese el telefono del pasajero: ";
        $telefono= trim(fgets(STDIN));
        echo "Ingrese el documento del pasajero: ";
        $documento= trim(fgets(STDIN));
        echo "Ingrese el numero de asiento: ";
        $nroAsiento= trim(fgets(STDIN));
        echo "Ingrese el numero de Ticket: ";
        $nroTicket= trim(fgets(STDIN));
        echo "Ingrese el tipo de pasajero: \n";
        echo "1- Estandar | 2- VIP | 3- Con necesidades especiales \n";
        $tipoPasajero= trim(fgets(STDIN));
        while($tipoPasajero> 3){
        switch($tipoPasajero){
            case 1:
                $objPersona= New Pasajero($nombre,$apellido,$telefono,$documento,$nroAsiento,$nroTicket);
                break;
            case 2:
                echo "Ingrese numero de viajero frecuente: ";
                $nroViajeroF= trim(fgets(STDIN));
                echo "Ingrese cantidad de millas: ";
                $cantMillas= trim(fgets(STDIN));
                $objPersona= New PasajeroVIP($nombre,$apellido,$telefono,$documento,$nroAsiento,$nroTicket,$nroViajeroF,$cantMillas);
                break;
            case 3:
                echo "El pasajero necesita silla de ruedas? S/N: ";
                $silladeR= trim(fgets(STDIN));
                if($sillader== "S"){
                    $sillaDeRuedas= true;
                }else{
                    $sillaDeRuedas= false;
                }
                echo "El pasajero necesita asistencia para embarque o desembarque? S/N: ";
                $asistencia=trim(fgets(STDIN));
                if($asistencia== "S"){
                    $asistenciaParaEoD= true;
                } else{
                    $asistenciaParaEoD= false;
                }
                echo "El pasajero tiene alguna dieta especial? S/N: ";
                $dieta= trim(fgets(STDIN));
                if($dieta== "S"){
                    $comidaEspecial= true;
                }else{
                    $comidaEspecial= false;
                }
                $objPersona= New PasajeroNecEspeciales($nombre,$apellido,$telefono,$documento,$nroAsiento,$nroTicket,$sillaDeRuedas,$asistenciaParaEoD,$comidaEspecial);
                break;
            default:
                echo "ERROR -> Opcion invalida ";

        }
    }
        
        //$objPersona= New Pasajero($nombre,$apellido,$telefono,$documento);
        $agregado= $viaje->agregarPasajero($objPersona);
        if($agregado){
            echo "Pasajero agregado correctamente! \n";
        }else{
            echo "ERROR, pasajero duplicado o se supera la cantidad maxima de pasajeros \n";
        }
        break;
    case 6:
        echo "Ingrese el documento del pasajero a modificar: ";
        $documentoABuscar= trim(fgets(STDIN));
        echo "Nuevo nombre del pasajero: ";
        $nuevoNombre= trim(fgets(STDIN));
        echo "Nuevo apellido del pasajero: ";
        $nuevoApellido= trim(fgets(STDIN));
        echo "Nuevo telefono del pasajero: ";
        $nuevoTelefono= trim(fgets(STDIN));
        $modificarPasaj= $viaje->modificarPasajero($documentoABuscar,$nuevoNombre,$nuevoApellido,$nuevoTelefono);
        if($modificarPasaj){
            echo "Pasajero modificado exitosamente \n";
        }else{
            echo "Pasajero no encontrado.\n";
        }
        break;
    case 7:
        echo "Ingrese el documento del pasajero que desea eliminar: ";
        $documento= trim(fgets(STDIN));
        $viaje->eliminarPasajero($documento);
        if ($viaje){
            echo "pasajero eliminado \n";
        } else{
            echo "error, pasajero no encontrado\n";
        }
        break;
    case 8:
        echo "Ingrese numero de empleado: ";
        $nroEmpleadoR= trim(fgets(STDIN));
        echo "Ingrese numero de licencia: ";
        $nroLicenciaR= trim(fgets(STDIN)); 
        echo "Ingrese nombre del responsable: ";
        $nombreR= trim(fgets(STDIN));
        echo "Ingrese apellido del responsable: ";
        $apellidoR= trim(fgets(STDIN));
        $objResponsable= new ResponsableV($nroEmpleadoR,$nroLicenciaR,$nombreR,$apellidoR);
        $verifica= $viaje->agregarResponsableV($objResponsable);
        if ($verifica){
          echo "Responsable añadido exitosamente.\n";
        }else{
          echo "--ERROR! Nro Empleado ya cargado.\n";
       }
       break;        
    case 9:
        echo $viaje->__toString();
        break;        
    case 10:
        echo "Saliendo...";
        exit();
    default:
        echo "Opcion invalida, intente nuevamente:  \n";

      
  }
}