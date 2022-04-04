<?php

    require '../configCarro.php';
    require '../../../loginUsus/database.php';

    $db = new Database();
    $con = $db->connect();

    $json = file_get_contents('php://input');

    $datos = json_decode($json, true);

    print_r($datos);

    if(is_array($datos)){

        $id_transaccion = $datos['detalles'];
    }

?>