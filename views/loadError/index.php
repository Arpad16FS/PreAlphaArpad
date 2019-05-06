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

    <h1>Página de errores</h1>
    <p class="error"><?php echo $this->message ?></p>

    <?php
    require 'views/layouts/footer.php';
    ?>

</body>
</html>