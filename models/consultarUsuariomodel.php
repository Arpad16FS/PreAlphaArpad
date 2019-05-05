<?php

include_once 'models/empleado.php';

class ConsultarUsuarioModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getUser(){
        //$items = array();
        $items = [];

        try{
            $query = $this->db->connect()->query("SELECT * FROM registro_empleados");

            while($row = $query->fetch()){
                $item = new Empleado();
                $item->id = $row['id'];
                $item->costo_hora = $row['costo_hora'];
                $item->nombre_empleado = $row['nombre_empleado'];
                $item->cargo = $row['cargo'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function getById($idEmpleado){
        $item = new Empleado();

        $query = $this->db->connect()->prepare("SELECT * fROM registro_empleados WHERE id = :id");
        try{
            $query->execute(['id' => $idEmpleado]);

            while ($row = $query->fetch()){
                $item->id = $row['id'];
                $item->costo_hora = $row['costo_hora'];
                $item->nombre_empleado = $row['nombre_empleado'];
                $item->cargo = $row['cargo'];
            }

            //Obtener nobres segun son seprados por un espacio (" ")
            $item->porEspacio = explode(" ", $item->nombre_empleado);

            if(empty($item->porEspacio[1])){
                $item->porEspacio[1] = "No tiene segundo nombre/apellido";
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function updateUser($item){
        $query = $this->db->connect()->prepare("UPDATE registro_empleados SET costo_hora = :costo_hora, nombre_empleado = :nombre_empleado, cargo = :cargo WHERE id = :id");
        try {
            $query->execute([
                'id' => $item['id'],
                'costo_hora' => $item['costo_hora'],
                'nombre_empleado' => $item['nombre_empleado'],
                'cargo' => $item['cargo'],
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function deleteUser($id){
        $query = $this->db->connect()->prepare("DELETE FROM registro_empleados WHERE id = :id");
        try {
            $query->execute([
                'id' => $id,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>