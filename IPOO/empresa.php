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





// Ejercicio 2
// Ejemplo de arreglo de empleados
$empleados = array(
    array('nombre' => 'Juan Perez', 'sueldo' => 2000, 'antiguedad' => 5),
    array('nombre' => 'Maria Garcia', 'sueldo' => 2500, 'antiguedad' => 12),
    array('nombre' => 'Pedro Rodriguez', 'sueldo' => 3000, 'antiguedad' => 8)
);

// Arreglo para almacenar los sueldos de cada empleado
$sueldos_cobrar = array();

// Calcular sueldo a cobrar para cada empleado
foreach ($empleados as $empleado) {
    $sueldo_cobrar = $empleado['sueldo'];
    if ($empleado['antiguedad'] > 10) {
        $sueldo_cobrar += $empleado['sueldo'] * 0.5;
    } else {
        $sueldo_cobrar += $empleado['sueldo'] * 0.25;
    }
    // Agregar nombre del empleado y sueldo a cobrar al arreglo correspondiente
    $sueldos_cobrar[$empleado['nombre']] = $sueldo_cobrar;
}

// Imprimir arreglo con los sueldos a cobrar de cada empleado
print_r($sueldos_cobrar);
?>



