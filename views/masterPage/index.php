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

    <h1>Botones de colores</h1>
    <button class="button-blue" id="blueBtn" disabled>Botón azul</button>
    <button class="button-default" id="btnEnabler">Habilitar botón azul</button>
    <button class="button-green" id="greenBtn">Botón verde</button>

    <div id="animalList"></div>

    <hr>

    <?php echo $this->mensaje; ?>

    <h2>GET form</h2>
    <form method="GET" action="scripts/process.php">
        <input type="text" name="yourName"></input>
        <input type="submit" value="Enviar"></input>
    </form>

    <h2>AJAX GET form</h2>
    <form id="getForm">
        <input type="text" name="yourName" id="yourName1"></input>
        <input type="submit" value="Enviar"></input>
    </form>

    <h2>POST form</h2>
    <form method="POST" action="scripts/process.php">
        <input type="text" name="yourName"></input>
        <input type="submit" value="Enviar"></input>
    </form>

    <h2>AJAX POST form</h2>
    <form id="postForm" accept-charset="utf-8">
        <input type="text" name="yourName" id="yourName2"></input>
        <input type="submit" value="Enviar"></input>
    </form>

    <button class="button-red" id="redBtn">Botón rojo</button>

    <div id="usersList">RewriteRule ^([^/]+)/? index.php?url=$1 [L,QSA]</div>

    <script src="scripts/colorBtnData.js"></script>

    <?php
    require 'views/layouts/footer.php';
    ?>

</body>
</html>