    <?php
    require 'views/layouts/header.php';
    require 'views/layouts/navigation.php';
    ?>

<body>
    <h1>Modificar al empleado <?php /*$porEspacio = explode(" ", $this->empleado->nombre_empleado);*/ echo $this->empleado->porEspacio[1]; ?></h1>

    <div><?php echo $this->mensaje; ?></div>

    <form action="<?php echo constant('URL'); ?>consultarUsuario/actualizarEmpleado" method="POST">
        <p>
            <label for="id">Costo por hora</label>
            <input type="text" name="id" value="<?php echo $this->empleado->id; ?>" disabled>
        </p>

        <p>
            <label for="costo_hora">Costo por hora</label>
            <input type="text" name="costo_hora" value="<?php echo $this->empleado->costo_hora; ?>">
        </p>

        <p>
            <label for="nombre_empleado">Nombre</label>
            <input type="text" name="nombre_empleado" value="<?php echo $this->empleado->nombre_empleado; ?>" required>
        </p>

        <p>
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo" value="<?php echo $this->empleado->cargo; ?>">
        </p>

        <p>
            <input type="submit" value="Actualizar empleado">
        </p>
    </form>
</body>

    <?php
    require 'views/layouts/footer.php';
    ?>