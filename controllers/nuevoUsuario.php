<?php
class NuevoUsuario extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('nuevoUsuario/index');
    }

    public function saludo(){
        echo "<p>Ejecutaste el método saludo</p>";
    }

    function registrarEmpleado(){
        //Se obtienen los datos desde el controlador con el fin de poder hacer validación
        $costoHora = $_POST['costo_hora'];
        $nombreEmpleado = $_POST['nombre_empleado'];
        $cargo = $_POST['cargo'];

        if($this->model->insertDB([
            'costo_hora' => $costoHora,
            'nombre_empleado' => $nombreEmpleado,
            'cargo' => $cargo,
        ])){
            echo "Empleado creado";
        }
        //$this->model->insertDB();
    }

    public function __destruct() {

    }
}