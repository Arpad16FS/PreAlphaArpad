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

    <h1>Página para crear nuevos usuarios</h1>

    <div><?php echo $this->mensaje; ?></div>

    <form action="<?php echo constant('URL'); ?>nuevoUsuario/registrarEmpleado" method="POST">
        <p>
            <label for="costo_hora">Costo por hora</label>
            <input type="text" name="costo_hora" id="">
        </p>

        <p>
            <label for="nombre_empleado">Nombre</label>
            <input type="text" name="nombre_empleado" id="" required>
        </p>

        <p>
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo" id="">
        </p>

        <p>
            <input type="submit" value="Registrar nuevo empleado">
        </p>
    </form>

    <?php
    require 'views/layouts/footer.php';
    ?>

</body>
</html>