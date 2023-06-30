<?php
require_once('Empresa.php');
require_once('ResponsableV.php');
require_once('Viaje.php');
require_once('Pasajero.php');
//Menu pasajero
function opcionesPasajero()
{
    //Menu pasajero
    $quedarse = true;
    while ($quedarse) {
        echo "Menu pasajero.\n 1. Ver pasajeros.\n 2. Buscar pasajero.\n 3. Modificar pasajero.\n 4. Eliminar pasajero.\n 5. Cargar pasajero.\n 6. Salir\n";
        $selected = intval(trim(fgets(STDIN)));
        switch ($selected) {
            case '1':
                //ver pasajeros
                $arrayPasajeros = Pasajero::listar();
                if(count($arrayPasajeros) == 0){
                    echo "No hay pasajeros.\n";
                }else{
                    //print_r($arrayPasajeros);
                    $lista = "";
                    foreach ($arrayPasajeros as $key => $pasajero) {
                        $strPasajero = $pasajero->__toString();
                        $lista .= $strPasajero;   
                    }
                    echo $lista;
                }
                break;

            case '2':
                //buscar pasajero 
                echo "Ingrese el documento de un pasajero: \n";
                $dni = intval(trim(fgets(STDIN)));
                $objPasajero = new Pasajero();
                if ($objPasajero->buscar($dni)) {
                    echo $objPasajero->__toString();
                } else {
                    echo "No se encontró el pasajero.\n";
                }
                break;

            case '3':
                //Modificar pasajero 
                echo "Ingrese el documento de un pasajero: \n";
                $dni = intval(trim(fgets(STDIN)));
                $objPasajero = new Pasajero();
                if ($objPasajero->buscar($dni)) {
                    echo $objPasajero->__toString();
                    echo "Ingrese el nombre: \n";
                    $nombrePas = trim(fgets(STDIN));
                    if ($nombrePas != '') {
                        $objPasajero->setPnombre($nombrePas);
                    }
                    echo "Ingrese el apellido: \n";
                    $apellidoPas = trim(fgets(STDIN));
                    if ($apellidoPas != '') {
                        $objPasajero->setPapellido($apellidoPas);
                    }
                    echo "Ingrese el telefono: \n";
                    $telefonoPas = intval(trim(fgets(STDIN)));
                    if ($telefonoPas != '') {
                        $objPasajero->setPtelefono($telefonoPas);
                    }
                    $quedar = true;
                    while ($quedar) {
                        echo "Ingrese el id de un viaje existente: \n";
                        $idViaje = intval(trim(fgets(STDIN)));
                        $objViaje = new Viaje();
                        if ($objViaje->buscar($idViaje)) {
                            $arrayPasajeros = Pasajero::listar("idviaje = $idViaje");
                            $cantidadMaxAsientos = $objViaje->getCantMaxPasajeros();
                            $cantidadVendidos = count($arrayPasajeros);
                            if($cantidadVendidos < $cantidadMaxAsientos){
                                $objPasajero->setObjViaje($objViaje);
                                $quedar = false;
                                echo "Este viaje posee lugar.\n";
                            }else{
                                echo "Este viaje no posee lugar.\n";
                            }
                            
                        } else {
                            
                            echo "No existe dicho viaje.\n";
                        }
                    }
                    if ($objPasajero->modificar()) {
                        echo "Los datos se han modificado.\n";
                    } else {
                        echo "No se ha podido modificar.\n";
                    }
                } else {
                    echo "No se encontró el pasajero.\n";
                }
                break;

            case '4':
                //eliminar pasajero 
                echo "Ingrese el documento de un pasajero: \n";
                $dni = intval(trim(fgets(STDIN)));
                $objPasajero = new Pasajero();
                if ($objPasajero->buscar($dni)) {
                    if ($objPasajero->eliminar()) {
                        echo "El pasajero ha sido eliminado.\n";
                    } else {
                        echo "El pasajero no se ha podido eliminar.\n";
                    }
                } else {
                    echo "No se encontró el pasajero.\n";
                }
                break;

            case '5':
                //cargar un pasajero
                echo "Ingrese el dni: \n";
                $dni = intval(trim(fgets(STDIN)));
                $objPasajero = new Pasajero();
                if ($objPasajero->buscar($dni)) {
                    echo "Ese pasajero ya existe.\n";
                } else {
                    $objPasajero->setRdocumento($dni);
                    echo "Ingrese el nombre: \n";
                    $nombrePas = trim(fgets(STDIN));
                    $objPasajero->setPnombre($nombrePas);
                    echo "Ingrese el apellido: \n";
                    $apellidoPas = trim(fgets(STDIN));
                    $objPasajero->setPapellido($apellidoPas);
                    echo "Ingrese el telefono: \n";
                    $telefonoPas = intval(trim(fgets(STDIN)));
                    $objPasajero->setPtelefono($telefonoPas);
                    $quedar = true;
                    while($quedar){
                        echo "Ingrese el número de viaje existente: \n";
                        $idViaje = intval(trim(fgets(STDIN)));
                        $objViaje = new Viaje();
                        if($objViaje->buscar($idViaje)){
                            //consulta de cantidad de pasajeros
                            //$consultaCantidad = "SELECT rdocumento FROM pasajero WHERE idviaje = $idViaje";
                            $arrayPasajeros = Pasajero::listar("idviaje = $idViaje");
                            $cantidadVendidos = count($arrayPasajeros);
                            $cantidadMaxAsientos = $objViaje->getCantMaxPasajeros();
                            if($cantidadVendidos < $cantidadMaxAsientos){
                                //se puede cargar
                                echo "Este viaje posee lugar.\n";
                                $objPasajero->setObjViaje($objViaje);
                                $quedar = false;
                            }else{
                                echo "El viaje esta lleno.\n";
                            }
                            //carga
                            
                        }else{
                            echo "Dicho viaje no existe.\n";
                        }
                    }
                    if ($objPasajero->insertar()) {
                        echo "Se ha ingresado al pasajero.\n";
                    } else {
                        echo "No se ha podido ingresar al pasajero.\n";
                        echo $objPasajero->getMensajeOp();
                    }
                    
                }
                break;

            case '6':
                $quedarse = false;
                break;

            default:
                break;
        }
    }
}
?>