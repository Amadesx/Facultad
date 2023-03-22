<?php
// Ejercicio $num1
// Definir los siguientes términos: objeto, clase , método, atributos.

// Objeto: Un objeto es una instancia de una clase, es decir, es una identidad que se crea a partir de una plantilla llamada molde,
// este objeto tiene un estado representado por sus atributos y métodos que van a tener todas esas variables que sean de ese tipo.

// Clase: Una clase es la plantilla o molde que define un conjunto de métodos y atributos comunes a todos los objetos que se crean apartir de ella.
// La clase es la estructura básica que define la forma en que se crean, utilizan y manipulan los objetos.

// Métodos: Un método es la funcion que se define a una clase y que puede ser invocada o ejecutada.

// Atributos: Los atributos son variables que se define en una clase que representa una propiedad o caracteristica de los objetos creados apartir de ella.



// Ejercicio 2
// Que diferencia existe entre: variable instancia e instancia de una clase. El significado es el mismo? Justificar.
// La variable instancia es una propiedad especifica de un objeto, mientras que la instancia de una clase es el objeto en si mismo. Las variables de instancia
// se utilizan para representar el estado o la informacion que se necesita almacenar en cada objeto, mientras que las instancias se utilizan para crear y manipular
// objetos individuales que tienen sus propias variables instancias y comportamiento definido por clase


// Ejercicio 3
// Clasificar las siguientes palabras como posibles candidatas a representar Clases (C), atributos (A) o métodos
// ( M):
// mouse (C)
// televisor (C)
// darCanalActual (M)
// configurarDespertador (M)
// reloj (C)
// mover (M)
// fechaNacimiento (A)
// encender (M)
// persona (C)
// darHoraActual (M)
// irCanalTv (M)
// fechaNacimiento (A)
// inalambrico (A)
// ponerHora (M)
// documento (A)
// darPosicionActual (M)



// Ejercicio 4
// Enumere 5 objetos con los que interactúa durante su rutina diaria. Enumere sus atributos y las acciones que realiza en la interacción con cada objeto.

// Computadora: (C)
    // Encender (M)
    // Windows 10 (A)

// Celular: (C)
    // Sacar foto (M)
    // Sistema operativo android (A)

// Microondas: (C)
    // Descongelar: (M)
    // Marca: (A)

// Puerta: (C)
    // Color: (A)
    // Abrir/Cerrar (M)

// Auto: (C)
    // Acelerar: (M)
    // Color: (A)




// Ejercicio 5
// Si tuviera que implementar la clase Persona, con qué atributos y métodos debería contar la clase. Diseñar la clase Persona con sus atributos y métodos.
// La clase: Persona
// Atributos: Edad, dni, altura
// Métodos: Hablar, correr




// Ejercicio 6
// Cuáles son los métodos que debemos encontrar implementados en una clase ?
// Los métodos que deberiamos encontrar en una clase son:
// $num1)$num2el método constructor
// 2) el método destructor
// 3) métodos de acceso
// 4) metodo _toString




// Ejercicio 7
// Cuál es la razón de implementar el método _ _toString() en una clase?
// La la razón de el método __toString se implementa es porque al momento de llamar la clase con un "echo" salta un error, con éste método lo que hacemos es
// transformarlo en un string para luego poder llamarlo en forma de éste.




// Ejercicio 8
// Cómo se denomina y con qué nombre debe implementarse en PHP, al método que se ejecuta cuando se crea una instancia de una clase?
// Se denomina el método constructor al momento de que un método se ejecuta cuando se crea una instancia de clase



// Ejercicio 9
// Cuando utilizamos $this como parámetro de un método, a que se esta referenciando ?
// el $this se usa para referenciar el valor del método en ese momento




// Ejercicio 10
// Para cada una de las siguientes clases implementar los métodos de acceso de cada una de las variables
// instancias , el método _ _toString() (que permite visualizar los valores que poseen las variables instancia) y por
// último, implementar la clase TestNombreClase para probar cada uno de los métodos implementados en cada
// clase.


//a) Diseñar e implementar la clase Calculadora que permite realizar las operaciones básicas: + , - , *, /

class Calculadora{
    private $num1;
    private $num2;

public function __construct($num1, $num2){
    $this->num1 = $num1;
    $this->num2 = $num2;
}
public function setnum1($num1){
    $this->num1 = $num1;
}
public function getnum1($num1){
    return $this->num1;
}
public function sumar(){
    return $this->num1 + $this->num2; 
}
public function restar(){
    return $this->num1 - $this->num2;

}
public function multiplicar(){
    return $this->num1 * $this->num2;
}
public function dividir(){
    return $this->num1 / $this->num2;
}
public function toString(){
    return "numero 1: " .$this->num1. "numero 2: " .$this->num2;
}
}
$numero= new Calculadora(1,3);
$numero->sumar();
echo "$numero";
