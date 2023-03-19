<?php
// Ejercicio 1
// Ejemplo de estructura de arreglos asociativos
$datos = array(
    array("recaudado" => 1000, "costo" => 500), // Enero
    array("recaudado" => 2000, "costo" => 1000), // Febrero
    array("recaudado" => 1500, "costo" => 800), // Marzo
    // ... y así sucesivamente para los demás meses del año
);

$mesMayorGanancia = 1; // Suponemos que el mes con mayor ganancia es el primero (enero)
$mayorGanancia = $datos[0]["recaudado"] - $datos[0]["costo"]; // Calculamos la ganancia del primer mes

// Recorremos el arreglo de arreglos asociativos
for ($i = 1; $i < count($datos); $i++) {
    // Calculamos la ganancia del mes actual
    $ganancia = $datos[$i]["recaudado"] - $datos[$i]["costo"];
    
    // Si la ganancia del mes actual es mayor que la ganancia máxima encontrada hasta ahora,
    // actualizamos la variable $mesMayorGanancia y $mayorGanancia
    if ($ganancia > $mayorGanancia) {
        $mesMayorGanancia = $i + 1; // Sumamos 1 porque los meses empiezan en 1 (enero)
        $mayorGanancia = $ganancia;
    }
}

echo "El mes con mayor ganancia fue el mes número " . $mesMayorGanancia . " con una ganancia de $" . $mayorGanancia . ".";
?>
