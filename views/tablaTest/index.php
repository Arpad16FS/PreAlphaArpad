<?php
require 'views/layouts/header.php';
require 'views/layouts/navigation.php';
?>

<body>
    <h1>Página para TESTEAR</h1>

    <div><?php echo $this->mensaje; ?></div>

    <form action="<?php echo constant('URL'); ?>tablaTest/registrarEmpleado" method="POST">
        <p>
            <label for="matricula">Matrícula</label>
            <input type="text" name="matricula" id="">
        </p>

        <p>
            <label for="test">texto TEST</label>
            <input type="text" name="test" id="" required>
        </p>

        <p>
            <input type="submit" value="Registrar nuevo empleado">
        </p>
    </form>
</body>

<?php
require 'views/layouts/footer.php';
?>