<?php
// Crear Conección
$connDB = mysqli_connect('localhost', 'root', '', 'ajaxtest');
/*if (!$connDB->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $connDB->error);
} else {
    printf("Current character set: %s\n", $connDB->character_set_name());
}*/
mysqli_set_charset($connDB,"utf8");

$query = 'SELECT * FROM users';

//Obtener resultado
$result = mysqli_query($connDB, $query);

//Sacar resultados
$theirUsers = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($theirUsers);