<?php
class ConsultarUsuario extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->empleados = [];
        $this->view->mensaje = "No hay mensaje";
    }

    function render(){
        $empleados = $this->model->getUser();
        $this->view->empleados = $empleados;
        $this->view->render('consultarUsuario/index');
    }

    function verEmpleado($param = null){
        //var_dump($param);
        $idEmpleado = $param[0];
        $empleado = $this->model->getById($idEmpleado);

        //Evitar que se pueda modificar la parte del id que debe ser deshabilitada
        session_start();
        $_SESSION['id_verEmpleado'] = $empleado->id;

        $this->view->empleado = $empleado;
        $this->view->render('consultarUsuario/detalle');

        //$this->view->mensaje = "";
    }

    function actualizarEmpleado(){
        session_start();
        $id = $_SESSION['id_verEmpleado'];
        $costo_hora = $_POST['costo_hora'];
        $nombre_empleado = $_POST['nombre_empleado'];
        $cargo = $_POST['cargo'];

        unset($_SESSION['id_verEmpleado']);

        if ($this->model->updateUser(['id' => $id, 'costo_hora' => $costo_hora, 'nombre_empleado' => $nombre_empleado, 'cargo' => $cargo])){
            // Actualizar Exito
            $empleado = new Empleado();
            $empleado->id = $id;
            $empleado->costo_hora = $costo_hora;
            $empleado->nombre_empleado = $nombre_empleado;
            $empleado->cargo = $cargo;

            $this->view->empleado = $empleado;
            $this->view->mensaje = "Se actualizó el empleado exitosamente";
        } else {
            // Actualizar Error
            $this->view->mensaje = "Error al actualizar empleado";
        }
        $this->view->render('consultarUsuario/detalle');

    }

    function eliminarEmpleado($param = null){
        $idEmpleado = $param[0];

        if ($this->model->deleteUser($idEmpleado)){
            // Actualizar Exito
            $this->view->mensaje = "Se eliminó el empleado exitosamente";
        } else {
            // Actualizar Error
            $this->view->mensaje = "Error al intentar eliminar empleado";
        }
        $this->render();
    }


    public function __destruct() {

    }
}
?>