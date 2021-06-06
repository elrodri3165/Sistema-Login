<?php

class CheckuserDB{
    
    private $conexion;
    
    private $query;
    
    private $resultado;
    
    private $user;
    
    private $estado;
    
    
    function __construct(){
        
        $this-> conexion = new ClienteDB();
        
        $this -> user = $_SESSION['user']-> DevolverUserDB();
        
        $this->Checkuser();
        
        $this-> estado = 'ACTIVO';
        
    }
    
    
    
    public function Checkuser(){
        
    $ip = $_SERVER['REMOTE_ADDR'];
        
    $this ->query= "SELECT * FROM users WHERE user='$this->user' AND activo=1 AND last_ip='$ip'";
    
    $this-> Ejecutaquery();
   
    if ($this->resultado == true){
            return true;
        }
        else{
            session_destroy();
            $this->estado = 'INACTIVO';
            return false;
        }
    }
    
    private function Ejecutaquery(){
        
        $this-> resultado = $this -> conexion -> EjecutaqueryDB($this->query);
        
        return $this->resultado;
    }
    
    
    public function Devolverestado(){
        return $this->estado;
    }
    
    
}