<?php

class ClienteDB{
    
    protected $conexion;
    
    function __construct(){
        $this ->conexion = new Conexion(SERVIDOR, USUARIO, CLAVE, BASE);
    }
    
    public function EjecutaqueryDB($query){   
        return $this->conexion ->enviarQuery($query);
    }

    public function Subsanastring($string){
        return $this-> conexion ->Subsanar($string);
    }
}