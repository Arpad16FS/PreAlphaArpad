<?php

class BasicoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function encuestaDB($datos){
        //Actualizar datos en la BD
        try{
            $query = $this->db->connect()->prepare('UPDATE basico_encuesta SET votos = votos + 1 WHERE opcion = :opcion');
            $query->execute(['opcion' => $datos['lenguaje']]);
            return true;
        } catch(PDOException $e){
            echo $e->getMessage();
            //echo "Empleado duplicado";
            return false;
        }
    }

    public function resultadosDB(){
        return $this->db->connect()->query('SELECT * FROM basico_encuesta');
    }

    public function totalVotos(){
        $query = $this->db->connect()->query('SELECT SUM(votos) AS votos_totales FROM basico_encuesta');
        $votosTotales = $query->fetch(PDO::FETCH_OBJ)->votos_totales;
        return $votosTotales;
    }

    public function porcentajeVotos($votos){
        //return round(($votos / $this->$votosTotales) * 100, 0);
        return round(($votos / $this->totalVotos()) * 100);
    }
}

?>