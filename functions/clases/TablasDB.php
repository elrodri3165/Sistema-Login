<?php

class TablasBD{
    
    private $conexion;
    
    private $query;
    
    private $resultado;
    
    private $tabla;
    
    function __construct($tabla){
        
        $this ->conexion = New ClienteDB();
        
        $this-> tabla = $tabla;
        
        switch ($this->tabla){
                
            case 'compania';
            $this->Buscar();
            break;

            case 'rama';
            $this->Buscar();
            break;

            case 'tipo_vehiculo';
            $this->Buscar();
            break;

            case 'cobertura';
            $this->Buscar();
            break;

            case 'codigos_pas';
            $this->Buscar();
            break;

            case 'compania';
            $this->Buscar();
            break;
                
            case 'nombre_tarjeta';
            $this->Buscar();
            break;

            case 'states';
            $this->Buscarcities();
            break;

            case 'cliente';
            $this->Buscarcliente();
            break;
                
            return $this->resultado;
                
        }
    }
      
    private function Buscar(){
        
        $this-> query = "SELECT * FROM $this->tabla";
        
        $this-> resultado = $this -> Ejecutaquery();
        
        }

    private function Buscarcliente(){
        
        $this ->query = "SELECT * FROM $this->tabla ORDER BY apellido ASC, nombre ASC";
        
        $this->resultado = $this->Ejecutaquery();
       
        }

    private function Buscarcities(){
        
        $this->query = "SELECT * FROM $this->tabla ORDER BY name ASC";
        
        $this->Ejecutaquery();
        }


    private function Ejecutaquery(){
        
        $this-> resultado = $this -> conexion -> EjecutaqueryDB($this->query);
        
        return $this->resultado;
    }
    
    public function Resultados(){
        
        return $this->resultado;
        
    }
        
}