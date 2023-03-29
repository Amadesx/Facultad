<?php
require_once 'TP1ViajeFeliz.php';

$viaje = new Viaje("", "", "");

while (true) {
    echo "Menu:\n";
    echo "1. Cargar información del viaje\n";
    echo "2. Modificar información del viaje\n";
    echo "3. Ver información del viaje\n";
    echo "4. Salir\n";
    $opcion = null;
    while (!in_array($opcion, array("1", "2", "3", "4"))) {
        echo "Ingrese una opción válida (1-4): ";
        $opcion = trim(fgets(STDIN));
    }
    switch ($opcion) {
        case "1":
            echo "Ingrese el código del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino del viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad máxima de pasajeros: ";
            $cant_max_pasajeros = trim(fgets(STDIN));
            $viaje = new Viaje($codigo, $destino, $cant_max_pasajeros);
            echo "Información del viaje cargada correctamente.\n";
            break;
        case "2":
            echo "Ingrese el nuevo código del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la nueva cantidad máxima de pasajeros: ";
            $cant_max_pasajeros = trim(fgets(STDIN));
            $viaje->setCodigo($codigo);
            $viaje->setDestino($destino);
            $viaje->setCantMaxPasajeros($cant_max_pasajeros);
            echo "Información del viaje modificada correctamente.\n";
            break;
        case "3":
            echo "Código del viaje: " . $viaje->getCodigo() . "\n";
            echo "Destino del viaje: " . $viaje->getDestino() . "\n";
            echo "Cantidad máxima de pasajeros: " . $viaje->getCantMaxPasajeros() . "\n";
            break;
        case "4":
            exit();
    }
}
