<?php
require_once('BaseDatos.php');
require_once('Empresa.php');
require_once('ResponsableV.php');
class Viaje
{
    private $idviaje;
    private $vdestino;
    private $cantMaxPasajeros;
    private $idempresaObj; //voy a guardar un objeto
    private $responsableObj; //voy a guardar un objeto
    private $vimporte;
    private $coleccionPasajeros;
    private $mensajeOp;
    static $mensajeFallo = '';

    public function __construct()
    {
        $this->idviaje = '';
        $this->vdestino = '';
        $this->cantMaxPasajeros = '';
        $this->idempresaObj = '';
        $this->responsableObj = '';
        $this->vimporte = '';
        $this->coleccionPasajeros = [];
    }

    public function cargarDatos($idviaje, $vdestino, $cantMaxPasajeros, $idempresaObj, $responsableObj, $vimporte)
    {
        $this->setIdviaje($idviaje);
        $this->setVdestino($vdestino);
        $this->setCantMaxPasajeros($cantMaxPasajeros);
        $this->setIdempresaObj($idempresaObj);
        $this->setResponsableObj($responsableObj);
        $this->setVimporte($vimporte);

    }

    public function getIdviaje()
    {
        return $this->idviaje;
    }
    public function setIdviaje($idviaje)
    {
        $this->idviaje = $idviaje;
    }
    public function getVdestino()
    {
        return $this->vdestino;
    }
    public function setVdestino($vdestino)
    {
        $this->vdestino = $vdestino;
    }
    public function getCantMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros)
    {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }
    public function getIdempresaObj()
    {
        return $this->idempresaObj;
    }
    public function setIdempresaObj($idempresaObj)
    {
        $this->idempresaObj = $idempresaObj;
    }
    public function getResponsableObj()
    {
        return $this->responsableObj;
    }
    public function setResponsableObj($responsableObj)
    {
        $this->responsableObj = $responsableObj;
    }
    public function getVimporte()
    {
        return $this->vimporte;
    }
    public function setVimporte($vimporte)
    {
        $this->vimporte = $vimporte;
    }
    public function getMensajeOp()
    {
        return $this->mensajeOp;
    }
    public function setMensajeOp($mensajeOp)
    {
        $this->mensajeOp = $mensajeOp;
    }
    public function getMensajeFallo()
    {
        return $this->mensajeFallo;
    }
    public function setMensajeFallo($mensajeFallo)
    {
        $this->mensajeFallo = $mensajeFallo;
    }
    public static function getColeccionPasajeros()
    {
        return Viaje::$coleccionPasajeros;
    }
    public static function setColeccionPasajeros($coleccionPasajeros)
    {
        Viaje::$coleccionPasajeros = $coleccionPasajeros;
    }

    public function __toString()
    {
        $empresaObj = $this->getIdempresaObj();
        $empresa = $empresaObj->getIdempresa();
        $responsableObj = $this->getResponsableObj();
        $responsable = $responsableObj->getNumEmpleado();
        $str = "
        ID: {$this->getIdviaje()}.\n
        Destino: {$this->getVdestino()}.\n
        Asientos: {$this->getCantMaxPasajeros()}.\n
        Empresa: $empresa.\n
        Responsable: $responsable.\n
        Importe:$ {$this->getVimporte()}.\n";
        return $str;
    }

    public function buscar($idviaje)
    {
        $base = new BaseDatos();
        $consultaViaje = "SELECT * FROM viaje WHERE idviaje = $idviaje";
        $respuesta = false;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaViaje)) {
                if ($row2 = $base->Registro()) {
                    $this->cargarDatos(
                        $idviaje,
                        $row2['vdestino'],
                        $row2['vcantmaxpasajeros'],
                        null,
                        // Dejar en null por ahora, se establecerá más adelante si la búsqueda tiene éxito
                        null, // Dejar en null por ahora, se establecerá más adelante si la búsqueda tiene éxito
                        $row2['vimporte'],

                    );

                    // Ahora establecer los objetos Empresa y ResponsableV si la búsqueda tiene éxito
                    $objEmpresa = new Empresa();
                    if ($objEmpresa->buscar($row2['idempresa'])) {
                        $this->setIdempresaObj($objEmpresa);
                    }

                    $objResponsable = new ResponsableV();
                    if ($objResponsable->buscar($row2['rnumeroempleado'])) {
                        $this->setResponsableObj($objResponsable);
                    }

                    $respuesta = true;
                }
            } else {
                $this->setMensajeOp($base->getError());
            }
        } else {
            $this->setMensajeOp($base->getError());
        }
        return $respuesta;
    }


    public static function listar($condicion = '')
    {
        $arregloViajes = null;
        $base = new BaseDatos();
        $consultaViaje = "SELECT * FROM viaje ";

        if ($condicion != '') {
            $consultaViaje .= ' WHERE ' . $condicion;
        }

        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaViaje)) {
                $arregloViajes = [];
                while ($row2 = $base->Registro()) {
                    $viaje = new Viaje();
                    $viaje->cargarDatos(
                        $row2['idviaje'],
                        $row2['vdestino'],
                        $row2['vcantmaxpasajeros'],
                        null,  // Dejar en null por ahora, se establecerá más adelante si la búsqueda tiene éxito
                        null, // Dejar en null por ahora, se establecerá más adelante si la búsqueda tiene éxito
                        $row2['vimporte'],

                    );

                    // Ahora establecer los objetos Empresa y ResponsableV si la búsqueda tiene éxito
                    $objEmpresa = new Empresa();
                    if ($objEmpresa->buscar($row2['idempresa'])) {
                        $viaje->setIdempresaObj($objEmpresa);
                    }

                    $objResponsable = new ResponsableV();
                    if ($objResponsable->buscar($row2['rnumeroempleado'])) {
                        $viaje->setResponsableObj($objResponsable);
                    }

                    array_push($arregloViajes, $viaje);
                }
            } else {
                Viaje::setMensajeFallo($base->getError());
            }
        } else {
            Viaje::setMensajeFallo($base->getError());
        }

        return $arregloViajes;
    }

    public function insertar()
    {
        $base = new BaseDatos();
        $respuesta = false;
        $objEmpresa = $this->getIdempresaObj();
        $idEmpresa = $objEmpresa->getIdempresa();
        //echo $idEmpresa;
        $objResponsable = $this->getResponsableObj();
        $numResponsable = $objResponsable->getNumEmpleado();
        //echo $numResponsable;
        $consultaInsertar = "INSERT INTO viaje VALUES ({$this->getIdviaje()}, '{$this->getVdestino()}', {$this->getCantMaxPasajeros()}, $idEmpresa, $numResponsable, {$this->getVimporte()})";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaInsertar)) {
                $respuesta = true;
            } else {
                $this->setMensajeOp($base->getError());
            }
        } else {
            $this->setMensajeOp($base->getError());
        }
        return $respuesta;
    }

    public function modificar()
    {
        $respuesta = false;
        $base = new BaseDatos();
        $objEmpresa = $this->getIdempresaObj();
        $idEmpresa = $objEmpresa->getIdempresa();
        $objResponsable = $this->getResponsableObj();
        $numResponsable = $objResponsable->getNumEmpleado();
        $consultaModifica = "UPDATE viaje SET vdestino = '{$this->getVdestino()}', vcantmaxpasajeros = {$this->getCantMaxPasajeros()}, idempresa = $idEmpresa, rnumeroempleado = $numResponsable, vimporte = {$this->getVimporte()} WHERE idviaje = {$this->getIdviaje()}";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consultaModifica)) {
                $respuesta = true;
            } else {
                $this->setMensajeOp($base->getError());
            }
        } else {
            $this->setMensajeOp($base->getError());
        }
        return $respuesta;
    }

    public function eliminar()
    {
        $base = new BaseDatos();
        $respuesta = false;

        // Obtener todos los pasajeros relacionados con el viaje
        $consultaPasajeros = "SELECT rdocumento FROM pasajero WHERE idviaje = {$this->getIdviaje()}";
        if ($base->Iniciar()) {
            $resultadoPasajeros = $base->Ejecutar($consultaPasajeros);
            if ($resultadoPasajeros) {
                // Eliminar cada pasajero relacionado
                while ($filaPasajero = $base->Registro()) {
                    $pasajero = new Pasajero();
                    $pasajero->setRdocumento($filaPasajero['rdocumento']);
                    if (!$pasajero->eliminar()) {
                        $this->setMensajeOp($pasajero->getMensajeOp());
                        return $respuesta;
                    }
                }
            } else {
                $this->setMensajeOp($base->getError());
                return $respuesta;
            }

            // Una vez eliminados los pasajeros, eliminar el viaje
            $consultaElimina = "DELETE FROM viaje WHERE idviaje = {$this->getIdviaje()}";
            if ($base->Ejecutar($consultaElimina)) {
                $respuesta = true;
            } else {
                $this->setMensajeOp($base->getError());
            }
        } else {
            $this->setMensajeOp($base->getError());
        }

        return $respuesta;
    }


}