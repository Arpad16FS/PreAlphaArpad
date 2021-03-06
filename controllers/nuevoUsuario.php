<?php
class NuevoUsuario extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
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

        $mensaje = "";

        if($this->model->insertDB([
            'costo_hora' => $costoHora,
            'nombre_empleado' => $nombreEmpleado,
            'cargo' => $cargo,
        ])){
            $mensaje = "Empleado creado";
        } else {
            $mensaje = "Empleado duplicado";
        }
        //$this->model->insertDB();

        $this->view->mensaje =  $mensaje;
        $this->render();
    }

    public function __destruct() {

    }
}
?>