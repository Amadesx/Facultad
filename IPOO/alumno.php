<?php

// Definir la estructura del arreglo asociativo
$arregloFavorito = array(
    array('nrolegajo' => 123, 'codigoMateria' => 'MAT123', 'notaObtenida' => 7),
    array('nrolegajo' => 456, 'codigoMateria' => 'MAT123', 'notaObtenida' => 8),
    array('nrolegajo' => 789, 'codigoMateria' => 'FIS456', 'notaObtenida' => 9),
    array('nrolegajo' => 101, 'codigoMateria' => 'FIS456', 'notaObtenida' => 7),
    array('nrolegajo' => 102, 'codigoMateria' => 'FIS456', 'notaObtenida' => 8),
    array('nrolegajo' => 103, 'codigoMateria' => 'FIS456', 'notaObtenida' => 6)
);

// Función para obtener la cantidad de alumnos que rindieron una determinada materia
function cantidadAlumnosMateria($arreglo, $materia) {
    $cantidad = 0;
    foreach ($arreglo as $valor) {
        if ($valor['codigoMateria'] == $materia) {
            $cantidad++;
        }
    }
    return $cantidad;
}

// Función para obtener el porcentaje de alumnos que rindieron cada materia
function porcentajeAlumnosMateria($arreglo) {
    $materias = array_unique(array_column($arreglo, 'codigoMateria'));
    $porcentajes = array();
    foreach ($materias as $materia) {
        $cantidad = cantidadAlumnosMateria($arreglo, $materia);
        $porcentaje = round($cantidad / count($arreglo) * 100, 2);
        $porcentajes[$materia] = $porcentaje;
    }
    return $porcentajes;
}

// Función para obtener la información del alumno que mayor nota obtuvo por cada materia
function mejorAlumnoMateria($arreglo) {
    $mejores = array();
    $materias = array_unique(array_column($arreglo, 'codigoMateria'));
    foreach ($materias as $materia) {
        $mayorNota = 0;
        foreach ($arreglo as $valor) {
            if ($valor['codigoMateria'] == $materia && $valor['notaObtenida'] > $mayorNota) {
                $mayorNota = $valor['notaObtenida'];
                $mejorAlumno = $valor['nrolegajo'];
            }
        }
        $mejores[$materia] = $mejorAlumno;
    }
    return $mejores;
}

// Ejemplos de uso de las funciones
echo 'Cantidad de alumnos que rindieron MAT123: ' . cantidadAlumnosMateria($arregloFavorito, 'MAT123') . '<br>';
echo 'Porcentaje de alumnos que rindieron cada materia
