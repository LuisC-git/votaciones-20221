<?php

require_once("../models/model.casilla.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    // print_r($_POST);
    // die();

    // guardar los datos del formulario en el modelo
    $casilla->values[] = $_POST["colonia"];
    $casilla->values[] = $_POST["tipos"];
    $casilla->values[] = $_POST["longitud"];
    $casilla->values[] = $_POST["latitud"];
    $casilla->values[] = $_POST["calle"];
    $casilla->values[] = $_POST["numero"];
    $casilla->values[] = $_POST["codigo"];
    $casilla->values[] = $_POST["seccion"];
    $casilla->values[] = $_POST["horaInc"];
    $casilla->values[] = $_POST["horaFin"];
    $casilla->values[] = $_POST["municipio"];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $casilla->insert();
        //die();
        //header("location:../?page=adm-casilla");
        header("location:../?page=operador-casilla");

    } elseif ($tipo == 'actualizar') {
       // $db->debug();
        $casilla->update($id);
       // die();
        //header("location:../?page=adm-casilla");
        header("location:../?page=operador-casilla");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $casilla->deleteOne($id);
        //die();
        //header("location:../?page=adm-casilla");
        header("location:../?page=operador-casilla");
    }
}

?>