<?php

require_once("../models/model.funcionario.php");
session_start();

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    
    // $nombre     = $_POST["nombre"];
    // $apellidopa = $_POST["apellidopa"];
    // $apellidoma = $_POST["apellidoma"];
    // $puesto     = $_POST["puesto"];
    // $telefono   = $_POST["telefono"];
    // $casilla   = $_POST["casilla"];


    //print_r($_POST);
    //die();

    // guardar los datos recibidos del formulario en el objeto del modelo
    $funcionario->values[] = $_POST["nombre"];
    $funcionario->values[] = $_POST["apellidopa"];
    $funcionario->values[] = $_POST["apellidoma"];
    $funcionario->values[] = $_POST["puesto"];
    $funcionario->values[] = $_POST["telefono"];
    $funcionario->values[] = $_SESSION['usuario']->IdCas;




    if ($tipo == 'nuevo') {
       // $db->debug();
        $funcionario->insert();
       
        //header("location:../?page=adm-funcionario");
        header("location:../?page=operador-funcionario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $funcionario->update($id);
        //die();
        //header("location:../?page=adm-funcionario");
        header("location:../?page=operador-funcionario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $funcionario->deleteOne($id);
        //die();
       // header("location:../?page=adm-funcionario");
       header("location:../?page=operador-funcionario");
    }
}

?>