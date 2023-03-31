<?php
// La clase viaje tiene los atributos privados $codigo, $destino, $cant_max_pasajeros y $pasajeros. $codigo y $destino son de tipo string, $cant_max_pasajeros es de tipo entero y por ultiumo $pasajeros es
// un array que almacena la informacion de cada pasajero.
class Viaje {
    private $codigo;
    private $destino;
    private $cant_max_pasajeros;
    private $pasajeros = array();

    // Inicializo los valores de $codigo, $destino y $cant_max_pasajeros.
    public function __construct($codigo, $destino, $cant_max_pasajeros) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cant_max_pasajeros = $cant_max_pasajeros;
    }

    // Devuelve el valor del atributo
    public function getCodigo() {
        return $this->codigo;
    }

    // Modifica el valor del atributo
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    // Devuelve el valor del atributo
    public function getDestino() {
        return $this->destino;
    }

    // Modifica el valor del atributo
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    // Devuelve el valor del atributo
    public function getCantMaxPasajeros() {
        return $this->cant_max_pasajeros;
    }

    // Este método establece el número máximo de pasajeros que el transporte puede llevar y lo almacena
    public function setCantMaxPasajeros($cant_max_pasajeros) {
        $this->cant_max_pasajeros = $cant_max_pasajeros;
    }

    // Este método devuelve un array con todos los pasajeros del viaje
    public function getPasajeros() {
        return $this->pasajeros;
    }

    // Este método establece una lista de pasajeros
    public function setPasajeros($pasajeros) {
        $this->pasajeros = $pasajeros;
    }

    // Este método agrega un nuevo pasajero a la lista de pasajeros, el nuevo pasajero se representa como un array asociativo con claves de "nombre", "apellido" y "dni"
    // si se agrega correctamente el método devuelve "true", sino devuelve "false"
    public function agregarPasajero($nombre, $apellido, $dni) {
        if (count($this->pasajeros) < $this->cant_max_pasajeros) {
            $pasajero = array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "dni" => $dni
            );
            array_push($this->pasajeros, $pasajero);
            return true;
        } else {
            return false;
        }
    }
    
    // Este método elimina un pasajero de la lista de pasajeros según su dni. Busca al pasajero correspondiente en la lista de pasajeros y lo elimina. Si se elimina correctamente, devuelve "true", sino devuelve "false"
    public function eliminarPasajero($dni) {
        foreach ($this->pasajeros as $key => $pasajero) {
            if ($pasajero["dni"] == $dni) {
                unset($this->pasajeros[$key]);
                return true;
            }
        }
        return false;
    }


    public function __toString(){
        $pasajeros_arreglo = array();
        foreach ($this->pasajeros as $pasajero) {
            $pasajeros_arreglo[] = $pasajero["nombre"]. " " . $pasajero["apellido"]. " (" . $pasajero["dni"]. ")". " ,"; 
    }
        $pasajero_string = implode(", ". $pasajero_arreglo);
        return " Viaje a :  " .$this->destino. "  /Codigo:  " .$this->codigo. "  /Con los siguientes pasajeros: ". $pasajeros_string;

}
}