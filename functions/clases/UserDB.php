<?php

class UserDB{
    private $apellido;
    
    private $nombre;
    
    private $email;
    
    private $user;
    
    private $password;
    
    private $activo;
    
    private $ip;
    
    private $conexion;
    
    private $query;
    
    private $resultado;
    
    

    
    public function __construct($apellido, $nombre, $email, $user, $password){
        $this-> conexion = new ClienteDB();
        
        $this -> apellido = $apellido;
        
        $this -> nombre = $nombre;
        
        $this -> email = $email;
        
        $this -> user = $user;
        
        $this-> password = $password;
        
        $this -> activo = 0;
        
    }
    
    public function Registarusuario(){
        
        $this -> password = password_hash($this->password, PASSWORD_DEFAULT);
        
        $this ->query = "INSERT INTO `users`(`id_user`, `apellido`, `nombre`, `email`, `user`,`password`, `activo`) VALUES (null,'$this->apellido','$this->nombre','$this->email','$this->user','$this->password', '$this->activo')";
        
        $this-> resultado = $this ->Ejecutaquery();
        
        if($this->resultado){
            return true;
        }else{
            return false;
        }    
    }
    
    
    
    public function Buscarusuario(){
        
        $this->query = "SELECT password FROM users WHERE user='$this->user' AND activo=1";
        
        $this->resultado = $this ->Ejecutaquery();
        
        foreach ($this->resultado as $row){
            if (password_verify($this->password, $row['password'])){
            $this->Completarusuaruio();
            return true;
        }
        else{
        return false;
        }
    }
    }
    
    private function Completarusuaruio(){
        
        $this->ip = $_SERVER['REMOTE_ADDR'];
        
        $this->query = "UPDATE users SET `last_ip`='$this->ip' WHERE user='$this->user'";
        
        $this->resultado = $this ->Ejecutaquery();
        
        $this ->query = "SELECT * FROM users WHERE user='$this->user' AND activo=1";
        
        $this->resultado = $this ->Ejecutaquery();
        
        foreach ($this->resultado as $row){
            $this->apellido = $row['apellido'];
            
            $this->nombre = $row['nombre'];
            
            $this ->email = $row['email'];
            
            $this->password = $row['password'];
            
            $this->conexion = null;
            
            $this->query = null;
        
        }
          
    }
    
    private function Ejecutaquery(){
        
        $this-> resultado = $this -> conexion -> EjecutaqueryDB($this->query);
        
        return $this->resultado;
    }
    
    public function DevolverUserDB(){
        
        return $this->user;
    }
    
    
    
}