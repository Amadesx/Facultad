<?php
require_once('MenuResponsable.php');
require_once('MenuEmpresa.php');
require_once('MenuViaje.php');
require_once('MenuPasajero.php');


//Creacion e insert de una empresa
$objEmpresa1 = new Empresa();
$objEmpresa1->cargarDatos(1, 'EMPRESA1', '123');
if ($objEmpresa1->insertar()) {
    echo "Se inserto la empresa.\n";
} else {
    echo "No se insertó la empresa.\n";
    echo $objEmpresa1->getMensajeOp();
};


//Crear nueva empresa
$objEmpresa2 = new Empresa();
$objEmpresa2->cargarDatos(2, 'EMPRESA2', '345');
if ($objEmpresa2->insertar()) {
    echo "Se inserto la empresa.\n";
} else {
    echo "No se insertó la empresa.\n";
    echo $objEmpresa2->getMensajeOp();
};


//Crear otra empresa
$objEmpresa3 = new Empresa();
$objEmpresa3->cargarDatos(3, 'EMPRESA3', '999');
if ($objEmpresa3->insertar()) {
    echo "Se inserto la empresa.\n";
} else {
    echo "No se insertó la empresa.\n";
    echo $objEmpresa3->getMensajeOp();
};


//Crear responsable
$objResponsable1 = new ResponsableV();
$objResponsable1->cargarDatos(1, 12345, 'EL MALDITO', 'RESPONSABLE');
if ($objResponsable1->insertar()) {
    echo "Se inserto el responsable.\n";
} else {
    echo $objResponsable1->getMensajeOp();
};


//Se inserta viaje
$objViaje1 = new Viaje();
$objViaje1->cargarDatos(1, 'zapala', 1, $objEmpresa2, $objResponsable1, 1500);

if ($objViaje1->insertar()) {
    echo "Se inserto el viaje.\n";
} else {
    echo $objViaje1->getMensajeOp();
};


//Inicio del menu general
function opcionesMenu()
{
    //Menu inicial
    echo "Menu general.\n 1. Menu pasajero\n 2. Menu responsable\n 3. Menu viaje\n 4. Menu empresa.\n 5. Salir\n";
}

$salidaGeneral = true;
while ($salidaGeneral) {
    opcionesMenu();
    $selected = intval(trim(fgets(STDIN)));
    switch ($selected) {
        case '1':
            //pasajero
            opcionesPasajero();
            break;

        case '2':
            //responsable 
            opcionesResponsable();
            break;

        case '3':
            //viaje
            opcionesViaje();
            break;

        case '4':
            //empresa 
            opciontesEmpresa();
            break;

        case '5':
            $salidaGeneral = false;
            break;

        default:
            break;
    }
}