<?php

class Conexion{
    protected $conexion;
    public $error;

    
    private function error(){
        $this->error = $this->conexion->connect_error;
        return $this->error;
    }
    
    public function __construct($servidor, $usuario, $clave, $base){
        if (!$this->_connect($servidor, $usuario, $clave, $base)){
			$this->error();
            return false;
		}
    }

    
    public function __destruct(){
            $this->conexion->close();
	}
    
    
    private function _connect($servidor, $usuario, $clave, $base){
        $this-> conexion = new mysqli ($servidor, $usuario, $clave, $base);
        if(!$this->conexion->connect_errno){
            $this->error();
            return false;
        }    
    }


    public function Subsanar($string){
        $this->conexion->set_charset('utf8');
        $string = $this ->conexion -> real_escape_string($string);
        return $string;
    }
    
    public function enviarQuery($query){
        $tipo = strtoupper(substr($query, 0.,6));
        
        if($tipo == 'SELECT'){
            $resultado = $this ->conexion->query($query);
            if(!$resultado){
                $this->error();
                return false;
            }else{
                if($resultado->num_rows==0){
                    $array_resultado=null;
                }else{
                    while ($fila = $resultado->fetch_assoc()){
                    $array_resultado[]=$fila;
                        }
                    }
                return $array_resultado;
                }   
        }
        
        else if($tipo== 'INSERT'){
            $resultado = $this ->conexion ->query($query);
            if(!$resultado){
                $this->error();
                return false;
            } else{
                return $this->conexion->insert_id;
            }
        
        }
        
        else if($tipo =='UPDATE' || $tipo == 'DELETE'){
            $resultado =$this ->conexion->query($query);
            if(!$resultado){
                $this->error();
                return false;
            }else{
                return $this->conexion->affected_rows;
            }
        }
        
        
    }    
}