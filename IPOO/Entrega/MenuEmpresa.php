<?php
require_once('Empresa.php');
require_once('ResponsableV.php');
require_once('Viaje.php');
require_once('Pasajero.php');
//Menu empresa
function opciontesEmpresa()
{
    $quedarse = true;
    while ($quedarse) {
        echo "Menu empresa.\n 1. Ver empresas.\n 2. Buscar empresa.\n 3. Modificar empresa.\n 4. Eliminar empresa.\n 5. Cargar empresa.\n 6. Salir\n";
        $selected = intval(trim(fgets(STDIN)));
        switch ($selected) {
            case '1':
                //ver empresas
                $arregloEmpresas = Empresa::listar();
                if (count($arregloEmpresas) == 0) {
                    echo "No hay empresas cargadas.\n";
                } else {
                    //print_r($arregloEmpresas);
                    $lista = "";
                    foreach ($arregloEmpresas as $key => $empresa) {
                        $strEmpresa = $empresa->__toString();
                        $lista .= $strEmpresa;
                    }
                    echo $lista;
                }
                break;

            case '2':
                //buscar empresa
                echo "Ingrese el número de empresa: \n";
                $idempresa = intval(trim(fgets(STDIN)));
                $objEmpresa = new Empresa();
                if ($objEmpresa->buscar($idempresa)) {
                    echo $objEmpresa->__toString();
                } else {
                    echo "No existe la empresa.\n";
                }
                break;

            case '3':
                //modificar empresa
                echo "Ingrese el número de empresa: \n";
                $idempresa = intval(trim(fgets(STDIN)));
                $objEmpresa = new Empresa();
                if ($objEmpresa->buscar($idempresa)) {
                    echo $objEmpresa->__toString();
                    echo "Ingrese el nombre: \n";
                    $enombre = trim(fgets(STDIN));
                    echo "Ingrese la dirección: \n";
                    $edireccion = trim(fgets(STDIN));
                    $objEmpresa->setNombre($enombre);
                    $objEmpresa->setEdireccion($edireccion);
                    //if ($objEmpresa->cargarDatos($idempresa, $enombre, $edireccion)) {
                        if ($objEmpresa->modificar()) {
                            echo "Se ha modificado la empresa.\n";
                        } else {
                            echo "No se ha modificado la empresa.\n";
                            echo $objEmpresa->getMensajeOp();
                        }
                    /*} else {
                        echo "No se han ingresado los datos.\n";
                        echo $objEmpresa->getMensajeOp();
                    }*/
                } else {
                    echo "No existe la empresa.\n";
                }
                break;

                case '4':
                    echo "Para eliminar una empresa, se borrarán todos sus viajes relacionados.\n";
                    echo "Presione 1 para continuar, 2 para salir.\n";
                    $opcion = trim(fgets(STDIN));
                
                    if ($opcion == "1") {
                        $arregloEmpresas = Empresa::listar();
                        if (count($arregloEmpresas) == 0) {
                            echo "No hay empresas cargadas.\n";
                        } else {
                            $lista = "";
                            foreach ($arregloEmpresas as $key => $empresa) {
                                $strEmpresa = $empresa->__toString();
                                $lista .= $strEmpresa;
                            }
                            echo $lista;
                        }
                
                        echo "Ingrese el número de empresa: \n";
                        $idempresa = intval(trim(fgets(STDIN)));
                
                        $objEmpresa = new Empresa();
                        if ($objEmpresa->buscar($idempresa)) {
                            $condicion = "idempresa = " . $idempresa;
                            $arregloViajes = Viaje::listar($condicion);
                
                            if (!empty($arregloViajes)) {
                                foreach ($arregloViajes as $viaje) {
                                    if ($viaje->eliminar()) {
                                        echo "Viaje eliminado: " . $viaje->__toString() . "\n";
                                    } else {
                                        echo "No se pudo eliminar el viaje: " . $viaje->__toString() . "\n";
                                    }
                                }
                            }
                
                            if ($objEmpresa->eliminar()) {
                                echo "La empresa se ha eliminado.\n";
                            } else {
                                echo "La empresa no se ha podido eliminar.\n";
                                echo $objEmpresa->getMensajeOp();
                            }
                        } else {
                            echo "No existe la empresa.\n";
                        }
                
                        break;
                
                    } elseif ($opcion == "2") {
                        break;
                    } else {
                        echo "Opción inválida.\n";
                    }
                
            case '5':
                //cargar empresa
                $quedar = true;
                while ($quedar) {
                    echo "Ingrese el id de la empresa: \n";
                    $idEmpresa = intval(trim(fgets(STDIN)));
                    $objEmpresa = new Empresa();
                    if($objEmpresa->buscar($idEmpresa)){
                        echo "El id ya esta utilizado.\n";
                    }else{
                        $quedar = false;
                        $objEmpresa->setIdempresa($idEmpresa);
                    }
                }
                echo "Ingrese el nombre de la empresa: \n";
                $enombre = trim(fgets(STDIN));
                $objEmpresa->setNombre($enombre);
                echo "Ingrese la dirección de la empresa: \n";
                $edireccion = trim(fgets(STDIN));
                $objEmpresa->setEdireccion($edireccion);
                if($objEmpresa->insertar()){
                    echo "La empresa se ha insertado.\n";
                }else{
                    echo "La empresa no se ha podido insertar.\n";
                    echo $objEmpresa->getMensajeOp();
                }
                
                break;

            case '6':
                $quedarse = false;
                break;

            default:
                # code...
                break;
        }
    }
}
?>
