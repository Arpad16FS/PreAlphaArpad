<?php
require 'views/layouts/header.php';
require 'views/layouts/navigation.php';
?>

<body>
    <h1>Consultaro Empleados</h1>

    <div><?php echo $this->mensaje; ?></div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Costo por hora</th>
                <th>Nombre</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include_once 'models/empleado.php';
        foreach($this->empleados as $row){
            $empleado = new Empleado();
            $empleado = $row;
        //var_dump($this->empleados);
        ?>
            <tr>
                <td><?php echo $empleado->id;?></td>
                <td><?php echo $empleado->costo_hora;?></td>
                <td><?php echo $empleado->nombre_empleado;?></td>
                <td><?php echo $empleado->cargo;?></td>
                <td><a href="<?php echo constant('URL') . 'consultarUsuario/verEmpleado/' . $empleado->id ?>">Modificar</a></td>
                <td><a href="<?php echo constant('URL') . 'consultarUsuario/eliminarEmpleado/' . $empleado->id ?>">Eliminar</a></td>
            </tr>
        </tbody>
        <?php
        }
        ?>
        </table>
</body>

<?php
require 'views/layouts/footer.php';
?>