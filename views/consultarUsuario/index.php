<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>assets/css/style.css"> <!-- Se solicita que la url regrese a la consante especìficada (con el fin de recibir siempre de la misma raíz el CSS) -->
    <title>pre Alpha Árpád</title>
</head>
<body>

    <?php
    require 'views/layouts/navigation.php';
    ?>

    <h1>Consultaro Empleados</h1>

    <div><p id="respuesta"><?php echo $this->mensaje; ?></p></div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Costo por hora</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Cargo</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody id="tbody-empleados">
            <?php
            include_once 'models/empleado.php';
            foreach($this->empleados as $row){
                $empleado = new Empleado();
                $empleado = $row;
                //var_dump($this->empleados);
            ?>
            <tr id="fila-<?php echo $empleado->id; ?>">
                <td><?php echo $empleado->id;?></td>
                <td><?php echo $empleado->costo_hora;?></td>
                <td><?php echo $empleado->nombre_empleado;?></td>
                <td><?php echo $empleado->cargo;?></td>
                <td><a href="<?php echo constant('URL') . 'consultarUsuario/verEmpleado/' . $empleado->id; ?>">Modificar</a></td>
                <td><button class="btnEliminar" data-id="<?php echo $empleado->id; ?>">Eliminar</button></td>
                <!--td><a href="<?php/* echo constant('URL') . 'consultarUsuario/eliminarEmpleado/' . $empleado->id */?>">Eliminar</a></td-->
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <?php
    require 'views/layouts/footer.php';
    ?>

    <script src="<?php echo constant('URL'); ?>assets/js/consultaAjax.js"></script>
</body>
</html>