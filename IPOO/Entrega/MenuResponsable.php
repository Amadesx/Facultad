<?php
require_once('Empresa.php');
require_once('ResponsableV.php');
require_once('Viaje.php');
require_once('Pasajero.php');
//Menu responsable
function opcionesResponsable()
{
    //Menu responsable 

    $quedarse = true;
    while ($quedarse) {
        echo "Menu responsable.\n 1. Ver responsables.\n 2. Buscar responsable.\n 3. Modificar responsable.\n 4. Eliminar responsable.\n 5. Crear responsable\n 6. Salir\n";
        $selected = intval(trim(fgets(STDIN)));
        switch ($selected) {
            case '1':
                //ver responsables
                $arregloResponsables = ResponsableV::listar();
                if (count($arregloResponsables) == 0) {
                    echo "No hay responsables.\n";
                } else {
                    //print_r($arregloResponsables);
                    $lista = "";
                    foreach ($arregloResponsables as $key => $responsable) {
                        $strResponsable = $responsable->__toString();
                        $lista .= $strResponsable;
                    }
                    echo $lista;
                }
                break;

            case '2':
                //buscar responsable
                echo "Ingrese el número de empleado: \n";
                $rnumero = intval(trim(fgets(STDIN)));
                $objResponsable = new ResponsableV();
                if ($objResponsable->buscar($rnumero)) {
                    echo $objResponsable->__toString();
                } else {
                    echo "No se ha encontrado al responsable.\n";
                }
                break;

            case '3':
                //modificar responsable
                echo "Ingrese el número de empleado: \n";
                $rnumero = intval(trim(fgets(STDIN)));
                $objResponsable = new ResponsableV();
                if ($objResponsable->buscar($rnumero)) {
                    echo $objResponsable->__toString();
                    echo "Ingrese el número de licencia: \n";
                    $rnumlicencia = intval(trim(fgets(STDIN)));
                    if ($rnumlicencia != '') {
                        $objResponsable->setNumLicencia($rnumlicencia);
                    }
                    echo "Ingrese el nombre: \n";
                    $rnombre = trim(fgets(STDIN));
                    if ($rnombre != '') {
                        $objResponsable->setNombre($rnombre);
                    }
                    echo "Ingrese el apellido: \n";
                    $rapellido = trim(fgets(STDIN));
                    if ($rapellido != '') {
                        $objResponsable->setApellido($rapellido);
                    }
                    if ($objResponsable->modificar()) {
                        echo "Se han modificado los datos.\n";
                    } else {
                        echo "No se han podido modificar los datos.\n";
                    }
                } else {
                    echo "No se ha encontrado al responsable.\n";
                }
                break;

            case '4':
                //eliminar responsable
                echo "Ingrese el número de empleado: \n";
                $rnumero = intval(trim(fgets(STDIN)));
                $objResponsable = new ResponsableV();
                if ($objResponsable->buscar($rnumero)) {
                    if ($objResponsable->eliminar()) {
                        echo "Se ha eliminado al responsable.\n";
                    } else {
                        echo "No se ha podido eliminar.\n";
                        echo $objResponsable->getMensajeOp();
                    }
                } else {
                    echo "No se ha encontrado al responsable.\n";
                }
                break;

            case '5':
                //crear responsable 
                echo "Ingrese el número de empleado: \n";
                $rnumero = intval(trim(fgets(STDIN)));
                $objResponsable = new ResponsableV();
                if ($objResponsable->buscar($rnumero)) {
                    echo "Ese numero de empleado ya existe.\n";
                } else {
                    $objResponsable->setNumEmpleado($rnumero);
                    echo "Ingrese el número de licencia: \n";
                    $rnumlicencia = intval(trim(fgets(STDIN)));
                    $objResponsable->setNumLicencia($rnumlicencia);
                    echo "Ingrese el nombre: \n";
                    $rnombre = trim(fgets(STDIN));
                    $objResponsable->setNombre($rnombre);
                    echo "Ingrese el apellido: \n";
                    $rapellido = trim(fgets(STDIN));
                    $objResponsable->setApellido($rapellido);
                    if ($objResponsable->insertar()) {
                        echo "El responsable ha sido cargado.\n";
                    } else {
                        echo "El responsable no ha sido cargado1.\n";
                        echo $objResponsable->getMensajeOp();
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