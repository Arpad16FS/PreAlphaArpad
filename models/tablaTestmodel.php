<?php

class TablaTestModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insertDB($datos){
        //Insertar datos en la BD
        try{
            $query = $this->db->connect()->prepare('INSERT INTO TABLE_TEST (MATRICULA, TEST) VALUES(:matricula, :test)');
            $query->execute(['matricula' => $datos['matricula'], 'test' => $datos['test']]);
            return true;
        } catch(PDOException $e){
            echo $e->getMessage();
            //echo "Empleado duplicado";
            return false;
        }
    }
}

?>