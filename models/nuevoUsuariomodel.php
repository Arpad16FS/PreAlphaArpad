<?php

class NuevoUsuarioModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insertDB($datos){
        //Insertar datos en la BD
        try{
            $query = $this->db->connect()->prepare('INSERT INTO REGISTRO_EMPLEADOS (COSTO_HORA, NOMBRE_EMPLEADO, CARGO) VALUES(:costo_hora, :nombre_empleado, :cargo)');
            $query->execute(['costo_hora' => $datos['costo_hora'], 'nombre_empleado' => $datos['nombre_empleado'], 'cargo' => $datos['cargo']]);
            return true;
        } catch(PDOException $e){
            //echo $e->getMessage();
            //echo "Empleado duplicado";
            return false;
        }
    }
}

?>