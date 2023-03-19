<?php
// Declaración del arreglo asociativo
$arregloFavorito = array(
  array("nrolegajo" => 1234, "codigoMateria" => "MAT001", "notaObtenida" => 8),
  array("nrolegajo" => 5678, "codigoMateria" => "MAT001", "notaObtenida" => 7),
  array("nrolegajo" => 1234, "codigoMateria" => "FIS001", "notaObtenida" => 9),
  array("nrolegajo" => 5678, "codigoMateria" => "FIS001", "notaObtenida" => 6),
  array("nrolegajo" => 9101, "codigoMateria" => "MAT001", "notaObtenida" => 9),
  array("nrolegajo" => 9101, "codigoMateria" => "FIS001", "notaObtenida" => 7),
);

// Función para obtener la cantidad de alumnos que rindieron una materia
function cantidadAlumnos($arregloFavorito, $materia) {
  $cantidad = 0;
  foreach ($arregloFavorito as $valor) {
    if ($valor["codigoMateria"] == $materia) {
      $cantidad++;
    }
  }
  return $cantidad;
}

// Función para obtener el porcentaje de alumnos que rindieron cada materia
function porcentajeAlumnos($arregloFavorito) {
  $materias = array_unique(array_column($arregloFavorito, 'codigoMateria'));
  $resultado = array();
  foreach ($materias as $materia) {
    $cantidad = cantidadAlumnos($arregloFavorito, $materia);
    $porcentaje = $cantidad / count($arregloFavorito) * 100;
    $resultado[$materia] = $porcentaje;
  }
  return $resultado;
}

// Función para obtener la información del alumno que obtuvo la mayor nota por cada materia
function mayorNota($arregloFavorito) {
  $materias = array_unique(array_column($arregloFavorito, 'codigoMateria'));
  $resultado = array();
  foreach ($materias as $materia) {
    $notas = array();
    foreach ($arregloFavorito as $valor) {
      if ($valor["codigoMateria"] == $materia) {
        array_push($notas, $valor["notaObtenida"]);
      }
    }
    $mayorNota = max($notas);
    foreach ($arregloFavorito as $valor) {
      if ($valor["codigoMateria"] == $materia && $valor["notaObtenida"] == $mayorNota) {
        $resultado[$materia] = $valor;
      }
    }
  }
  return $resultado;
}

// Función para obtener la cantidad de alumnos que aprobaron una materia con nota mayor o igual a 7
function cantidadAprobados($arregloFavorito, $materia) {
  $cantidad = 0;
  foreach ($arregloFavorito as $valor) {
    if ($valor["codigoMateria"] == $materia && $valor["notaObtenida"] >= 7) {
      $cantidad++;
    }
  }
  return $cantidad;
}

//
