<?php
class tablaTest extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render(){
        $this->view->render('tablaTest/index');
    }

    public function saludo(){
        echo "<p>Ejecutaste el método saludo</p>";
        $this->render();
    }

    function registrarEmpleado(){
        //Se obtienen los datos desde el controlador con el fin de poder hacer validación
        $matricula = $_POST['matricula'];
        $test = $_POST['test'];

        $mensaje = "";

        if($this->model->insertDB([
            'matricula' => $matricula,
            'test' => $test,
        ])){
            $mensaje = "Empleado creado";
        } else {
            $mensaje .= "Empleado duplicado";
        }
        //$this->model->insertDB();

        $this->view->mensaje =  $mensaje;
        $this->render();
    }

    public function __destruct() {

    }
}
?>