<?php
require_once('Empresa.php');
require_once('ResponsableV.php');
require_once('Viaje.php');
require_once('Pasajero.php');
//Menu viaje
function opcionesViaje()
{

    $quedarseViaje = true;
    while ($quedarseViaje) {
        echo "Menu viaje.\n 1. Ver viajes.\n 2. Buscar viaje.\n 3. Modificar viaje.\n 4. Eliminar viaje.\n 5. Crear viaje\n 6. Salir\n";
        $selected = intval(trim(fgets(STDIN)));
        switch ($selected) {
            case '1':
                //ver viajes
                $arrayViajes = Viaje::listar();
                if (count($arrayViajes) == 0) {
                    echo "No hay viajes.\n";
                } else {
                    //print_r($arrayViajes);
                    $lista = "";
                    foreach ($arrayViajes as $key => $viaje) {
                        $strViaje = $viaje->__toString();
                        $lista .= $strViaje;
                    }
                    echo $lista;
                }
                break;

            case '2':
                //buscar viaje
                echo "Ingrese el número de viaje: \n";
                $idViaje = intval(trim(fgets(STDIN)));
                $objViaje = new Viaje();
                if($objViaje->buscar($idViaje)) {
                    echo $objViaje->__toString();
                } else {
                    echo "No se encontró dicho viaje.\n";
                }
                break;

            case '3':
                //modificar viaje
                echo "Ingrese el número de viaje: \n";
                $idViaje = intval(trim(fgets(STDIN)));
                $objViaje = new Viaje();
                if ($objViaje->buscar($idViaje)) {
                    echo $objViaje->__toString();
                    echo "Ingrese el destino: \n";
                    $vdestino = trim(fgets(STDIN));
                    if($vdestino != ''){
                        $objViaje->setVdestino($vdestino);
                    }
                    $quedar = true;
                    while ($quedar) {
                        echo "Ingrese cantidad maxima de pasajeros: \n";
                        $vcantmaxpasajeros = intval(trim(fgets(STDIN)));
                        if($vcantmaxpasajeros != 0){
                            $arrayPasajeros = Pasajero::listar("idviaje = $idViaje");
                            $cantidadVendidos = count($arrayPasajeros);
                            if($cantidadVendidos <= $vcantmaxpasajeros){
                                echo "Se han vendidos menos pasajes que la cantidad que desea ingresar.\n";
                                $objViaje->setCantMaxPasajeros($vcantmaxpasajeros);
                                $quedar = false;
                            }else{
                                echo "La cantidad mínima de asientos puede ser $cantidadVendidos.\n";
                            } 
                    }
                    
                        
                    }
                    $quedar = true;
                    while ($quedar) {
                        echo "Ingrese el id de una empresa existente: \n";
                        $idEmpresa = intval(trim(fgets(STDIN)));
                        $objEmpresa = new Empresa();
                        if (!$objEmpresa->buscar($idEmpresa)) {
                            echo "No existe dicha empresa.\n";
                        } else {
                            $quedar = false;
                        }
                    }
                    $objViaje->setIdempresaObj($objEmpresa);
                    $quedar = true;
                    while ($quedar) {
                        echo "Ingrese el numero de un responsable existente: \n";
                        $rnumeroempleado = intval(trim(fgets(STDIN)));
                        $objResponsable = new ResponsableV();
                        if (!$objResponsable->buscar($rnumeroempleado)) {
                            echo "No existe dicho empleado.\n";
                        } else {
                            $quedar = false;
                        }
                    }
                    $objViaje->setResponsableObj($objResponsable);
                    echo "Ingrese el importe: \n";
                    $vimporte = trim(fgets(STDIN));
                    if($vimporte != 0){
                        $objViaje->setVimporte($vimporte);
                    }
                    if($objViaje->modificar()){
                        echo "Se ha modificado correctamente el viaje.\n";
                    }else{
                        echo "Ha fallado la modificacion del viaje.\n";
                        echo $objViaje->getMensajeOp();
                    }
                } else {
                    echo "No se encontró dicho viaje.\n";
                    echo $objViaje->getMensajeOp();
                }
                break;

                case '4':
                    echo "Para eliminar un viaje, se eliminarán todos los pasajeros asociados.\n";
                    echo "Presione 1 para continuar, 2 para salir.\n";
                    $opcion = trim(fgets(STDIN));
                
                    if ($opcion == "1") {
                        echo "Ingrese el número de viaje: \n";
                        $idViaje = intval(trim(fgets(STDIN)));
                
                        $objViaje = new Viaje();
                        if ($objViaje->buscar($idViaje)) {
                            // Obtener lista de pasajeros del viaje
                            $condicion = "idviaje = " . $idViaje;
                            $arregloPasajeros = Pasajero::listar($condicion);
                
                            if (!empty($arregloPasajeros)) {
                                // Eliminar cada pasajero del viaje
                                foreach ($arregloPasajeros as $pasajero) {
                                    if ($pasajero->eliminar()) {
                                        echo "Pasajero eliminado: " . $pasajero->__toString() . "\n";
                                    } else {
                                        echo "No se pudo eliminar el pasajero: " . $pasajero->__toString() . "\n";
                                    }
                                }
                            }
                
                            // Eliminar el viaje
                            if ($objViaje->eliminar()) {
                                echo "El viaje se ha eliminado correctamente.\n";
                            } else {
                                echo "El viaje no ha podido eliminarse.\n";
                                echo $objViaje->getMensajeOp();
                            }
                        } else {
                            echo "No se encontró dicho viaje.\n";
                        }
                    } elseif ($opcion == "2") {
                        break;
                    } else {
                        echo "Opción inválida.\n";
                    }
                    break;
                

                case '5':
                    //crear viaje 
                    $quedarse = true;
                    while ($quedarse) {
                        echo "Ingrese el id del viaje: \n";
                        $idViaje = intval(trim(fgets(STDIN)));
                        $objViaje = new Viaje();
                        if($objViaje->buscar($idViaje)){
                            echo "El id de viaje ya esta utilizado.\n";
                            break; // Salir del bucle y volver al menú
                        }else{
                            $objViaje->setIdviaje($idViaje);
                            $quedarse = false;
                        }
                        echo "Ingrese el destino: \n";
                        $vdestino = trim(fgets(STDIN));
                        $objViaje->setVdestino($vdestino);
                        echo "Ingrese la cantidad máxima de pasajeros: \n";
                        $vcantmaxpasajeros = intval(trim(fgets(STDIN)));
                        $objViaje->setCantMaxPasajeros($vcantmaxpasajeros);
                        $quedarse = true;
                        while ($quedarse) {
                            echo "Ingrese el id de una empresa existente: \n";
                            $idEmpresa = intval(trim(fgets(STDIN)));
                            $objEmpresa = new Empresa();
                            if($objEmpresa->buscar($idEmpresa)){
                                $quedarse = false;
                                $objViaje->setIdempresaObj($objEmpresa);
                               
                            }else{
                                echo "Dicho id de empresa no existe.\n";
                            }
                        }
                        $quedarse = true;
                        while ($quedarse) {
                            echo "Ingrese el número de un responsable.\n";
                            //ver responsables
                            $arregloResponsables = ResponsableV::listar();
                                if (count($arregloResponsables) == 0) {
                                echo "No hay responsables.\n";
                            } else {
                            //print_r($arregloResponsables);
                            $lista = "";
                            foreach ($arregloResponsables as $key => $responsable) {
                            $strResponsable = $responsable->__toString();
                            $lista.= $strResponsable;
                                }
                            echo $lista;
                        }
                            $rnumeroempleado = intval(trim(fgets(STDIN)));
                            $objResponsable = new ResponsableV();
                            if(!$objResponsable->buscar($rnumeroempleado)){
                                echo "Dicho responsable no existe.\n";
                            }else{
                                $quedarse = false;
                                $objViaje->setResponsableObj($objResponsable);
                            }
                        }
                        echo "Ingrese el importe: \n";
                        $vimporte = trim(fgets(STDIN));
                        $objViaje->setVimporte($vimporte);
                        echo $objViaje->__toString();
                        if($objViaje->insertar()){
                            echo "El viaje se ha insertado.\n";
                        }else{
                            echo "El viaje no se ha insertado.\n";
                            echo $objViaje->getMensajeOp();
                        };
                    };
                    break;
                

            case '6':
                $quedarseViaje = false;
                break;

            default:
                
                break;
        }
    }
}
?>
