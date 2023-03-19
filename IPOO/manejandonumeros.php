<?php
// Ejercicio 1
// Dado un número N retornar su factorial.
function factorial($Numero) {
    $Factorial = 1;
    for($i = 1; $i <= $Numero; $i++) {
      $Factorial *= $i;
    }
    return $Factorial;
  }







// Ejercicio 2
// Dado un número N retornar verdadero si el número es par y falso en caso contrario.
function esPar($numero) {
    if ($numero % 2 == 0) {
      return true;
    } else {
      return false;
    }
  }









// Ejercicio 3
// Dado dos números N y M retornar verdadero si el número N es divisible por M y falso en caso contrario
function esDivisible($n, $m) {
    if ($n % $m == 0) {
        return true;
    } else {
        return false;
    }
}









// Ejercicio 4
//Dada un arreglo de números enteros, determinar los valores máximo y mínimo, y las posiciones en que éstos se encontraban en el arreglo
function encontrarValorMaxYMenor($arreglo) {
  // Inicio las variables de número máximo, mínimo y sus posiciones en 0
    $maximo = $arreglo[0];
    $minimo = $arreglo[0];
    $posicionMaximo = 0;
    $posicionMinimo = 0;
  // Luego aplico un for que recorre la variable "$arreglo" y busca el valor máximmo y minimo del arreglo, junto a su posición
    for ($i = 1; $i < count($arreglo); $i++) {
      if ($arreglo[$i] > $maximo) {
        $maximo = $arreglo[$i];
        $posicionMaximo = $i;
      } elseif ($arreglo[$i] < $minimo) {
        $minimo = $arreglo[$i];
        $posicionMinimo = $i;
      }
    }
  // y luego retorna en un arreglo con el valor máximo y mínimo con sus posiciones
    return array("maximo" => $maximo, "minimo" => $minimo, "pos_maximo" => $posicionMaximo, "pos_minimo" => $posicionMinimo);
  }
  




  


  // Ejercicio 5
  // Cree una función leerNombres, cuyo parámetro de entrada formal es una cantidad n de nombres (ciclo denido), que solicite a un usuario los n nombres y los almacene en un arreglo indexado. aa función debe retornar el arreglo indexado.
  function leerNombres($cantidadNombres){
    $nombres = array(); //crea un arreglo vacío
  
    for($i = 0; $i < $cantidadNombres; $i++){
      echo "Ingrese un nombre: ";
      $nombres = trim(fgets(STDIN));
      $nombres[] = $nombre; //agrega el nombre al final del arreglo
    }
  
    return $nombres; //retorna el arreglo indexado
  }







  
  // Ejercicio 6
  // Dado un número que se corresponde a un año calendario, retornar un arreglo con todos los años bisiestos menores al año ingresado.
  function añosBisiestos($año) {
    $bisiestos = array();
    for ($i = 1; $i < $año; $i++) {
        if (($i % 4 == 0 && $i % 100 != 0) || $i % 400 == 0) {
            $bisiestos[] = $i;
        }
    }
    return $bisiestos;
}






  
  // Ejercicio 7
  // Dado 2 arreglos A y B, de N y M elementos respectivamente. Construir un algoritmo que retorne un arreglo con los elementos de A mas los elementos de B.
  $a = array(1,2,3);
  $b = array(4,5,6);
  // la función "array_merge" combina arreglos
  $resultado = array_merge($a, $b);
  print_r(resultado);







  

  // Ejercicio 8
  // Dado 2 arreglos A y B, de N y M elementos respectivamente. Construir un algoritmo que retorne un arreglo con los elementos de A que no estan en B.
  $a = array(1,2,3,4,5);
  $b = array(3,5,7,9);
  // la función "array_merge" combina arreglos
  $resultado = array_merge($a, $b);
  // luego de combinarlos, resto el resultado con el arreglo b y quedaría el arreglo con los elementos de A que no están en B
  $resultadoFinal = array_diff($resultado, $b);
  print_r($resultadoFinal);


