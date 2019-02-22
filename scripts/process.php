<?php

//Conección a la Base de Datos
$connDB = mysqli_connect('localhost', 'root', '', 'ajaxtest');
/*if (!$connDB->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $connDB->error);
} else {
    printf("Current character set: %s\n", $connDB->character_set_name());
}*/
mysqli_set_charset($connDB,"utf8");

echo "Procesando...";

//Validar variable GET
if (isset($_GET["yourName"])){
    echo 'GET: tu nombre es: ' . $_GET["yourName"];
}

//Validar variable POST
if (isset($_POST["yourName"])){
    $theirName = mysqli_real_escape_string($connDB, $_POST["yourName"]);
    echo 'POST: tu nombre es: ' . $_POST["yourName"];

    $query = "INSERT INTO users(theirName) VALUES('$theirName')";

    if (mysqli_query($connDB, $query)){
        echo 'Usuario añadido exitosamente';
    } else{
        echo "ERROR: " . mysqli_error($connDB);
    }
}