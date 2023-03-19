<?php
// Ejercicio 1
// Dada una cadena de caracteres terminada en punto retornar la cantidad de letras que contiene la cadena.
function contarLetras($cadena) {
    $longitud = strlen($cadena) - 1; // Restamos 1 para excluir el punto
    return $longitud;
  }






  


// Ejercicio 2
// Dado un texto terminado en / y un caracter, determinar cuántas veces aparece ese caracter en la cadena
$texto = "Este es un ejemplo de texto terminado en /";
$caracter = "e";
$ocurrencias = substr_count($texto, $caracter);
echo "El carácter '".$caracter."' aparece ".$ocurrencias." veces en el texto.";










// Ejercicio 3
// Dada 2 cadenas cadena1 y cadena2 retornar verdadero si cadena2 se encuentra en cadena1 y falso en caso contrario.
function cadenaComparacion($cadena1, $cadena2) {
    // la función "strpos" encuentra la posición de la primera ocurrencia de un substring en un string
    if (strpos($cadena1, $cadena2) !== false) {
        return true;
    } else {
        return false;
    }
}










// Ejercicio 4
// Dada una cadena retornar su longitud sin utilizar la función count de PHP.
function obtenerLongitud($cadena) {
    $longitud = 0;
    for ($i = 0; isset($cadena[$i]); $i++) {
        $longitud++;
    }
    return $longitud;
}

// Ejercicio 5
// Dada 2 cadenas cadena1 y cadena2 retornar la cadena de mayor longitud, invocar al método implementado para el inciso anterior

function compararCadenas($longitud1, $longitud2, $cadena1, $cadena2) {
    if ($longitud1 > $longitud2) {
        return $cadena1;
    } else {
        return $cadena2;
    }
}

$cadena1 = "holaMundo";
$cadena2 = "holaQueridoMundo";
$longitud1 = obtenerLongitud($cadena1);
$longitud2 = obtenerLongitud($cadena2);
$resultado = compararCadenas($longitud1, $longitud2, $cadena1, $cadena2);
echo "La cadena con mayor longitud es: " . $resultado;


